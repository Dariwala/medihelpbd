// blank controller
foreignmedical.controller('ForeignmedicalDoctorController', ForeignmedicalDoctorController);

function ForeignmedicalDoctorController($scope, $http) {


    // var foreignmedical_id = document.getElementsByName('foreignmedical_id')[0].value;
    // console.log(foreignmedical_id);

    
        $http
        .get(window.location.origin+"/medical-department/api/list", {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data;
            data2=[];
            $('#department_id').kendoDropDownList({
                optionLabel   : "Select Department",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                index: 0
            });

            $('#medical_specialist_id').kendoDropDownList({
                optionLabel   : "Select Doctor",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data2,
                dataType: "jsonp",
                index: 0
            });

            // var dropdownlist = $("#service_id").data("kendoDropDownList");
            //     dropdownlist.value(selected_service);

        });


        $scope.getDoctor = function() 
        {
            // console.log('ok');
            var value = $("#department_id").data("kendoDropDownList").value();

            $http
            .get(window.location.origin+"/medical-specialist/api/list/" + value, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){
                data = response.data;
                console.log(data);
                $('#medical_specialist_id').kendoDropDownList({
                    optionLabel   : "Select Doctor",
                    dataTextField: "text",
                    dataValueField: "value",
                    dataSource: data,
                    dataType: "jsonp",
                    index: 0
                });

            });
            
    
        }

}