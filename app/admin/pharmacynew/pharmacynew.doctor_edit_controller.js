// blank controller
pharmacynew.controller('PharmacynewDoctorEditController', PharmacynewDoctorEditController);

function PharmacynewDoctorEditController($scope, $http) {

    var pharmacynew_doctor_id = document.getElementsByName('pharmacynew_doctor_id')[0].value;

    console.log(pharmacynew_doctor_id);

    $http
        .get(window.location.origin+"/medical-department/api/pharmacynew/get-selected-department/" + pharmacynew_doctor_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.departments;
            selected_department = response.data.selected_department;

            $('#department_id').kendoDropDownList({
                optionLabel   : "Select Department",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                index: 0
            });



            var dropdownlist = $("#department_id").data("kendoDropDownList");
                dropdownlist.value(selected_department);

        });


        $http
        .get(window.location.origin+"/medical-specialist/api/pharmacynew/get-selected-medical-specialist/" + pharmacynew_doctor_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            selected_Medical_specialist = response.data.selected_Medical_specialist;
            data = response.data.medical_specialists;
            $('#medical_specialist_id').kendoDropDownList({
                optionLabel   : "Select Doctor",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                index: 0
            });

            var dropdownlist = $("#medical_specialist_id").data("kendoDropDownList");
                dropdownlist.value(selected_Medical_specialist);

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