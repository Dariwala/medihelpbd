// blank controller
gym.controller('GymServiceController', GymServiceController);

function GymServiceController($scope, $http) {


    // var gym_id = document.getElementsByName('gym_id')[0].value;
    // console.log(gym_id);

    
        $http
        .get(window.location.origin+"/service/api/list", {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data;
            data2=[];
            $('#service_id').kendoDropDownList({
                optionLabel   : "Select Category",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                filter: "contains",
                index: 0
            });

            $('#subservice_id').kendoDropDownList({
                optionLabel   : "Select Sub Service",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data2,
                dataType: "jsonp",
                index: 0
            });

            // var dropdownlist = $("#subservice_id").data("kendoDropDownList");
            //     dropdownlist.value(selected_service);

        });


        $scope.getSubservice = function() 
        {
            var value = $("#service_id").data("kendoDropDownList").value();
            console.log(value);

            $http
            .get(window.location.origin+"/service/sub-service/api/list/" + value, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){
                data = response.data;
                console.log(data);
                $('#subservice_id').kendoDropDownList({
                    optionLabel   : "Select Sub-service",
                    dataTextField: "text",
                    dataValueField: "value",
                    dataSource: data,
                    dataType: "jsonp",
                    filter: "contains",
                    index: 0
                });

            });
            
    
        }

}