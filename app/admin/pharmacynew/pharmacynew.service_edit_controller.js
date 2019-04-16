// blank controller
blood_bank.controller('BloodBankServiceEditController', BloodBankServiceEditController);

function BloodBankServiceEditController($scope, $http) {


    var blood_bank_service_id = document.getElementsByName('blood_bank_service_id')[0].value;
    console.log(blood_bank_service_id);

    $http
        .get(window.location.origin+"/service/api/blood-bank/get-selected-service/" + blood_bank_service_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.services;
            selected_service = response.data.selected_service;
            console.log(data);
            $('#service_id').kendoDropDownList({
                optionLabel   : "Select District",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                index: 0
            });

            var dropdownlist = $("#service_id").data("kendoDropDownList");
                dropdownlist.value(selected_service);

        });


        $http
        .get(window.location.origin+"/service/api/blood-bank/get-selected-subservice/" + blood_bank_service_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            selected_subservice = response.data.selected_subservice;
            data = response.data.subservices;
            $('#subservice_id').kendoDropDownList({
                optionLabel   : "Select Sub-District",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                index: 0
            });

            var dropdownlist = $("#subservice_id").data("kendoDropDownList");
                dropdownlist.value(selected_subservice);

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
                    index: 0
                });

            });
            
    
        }

}