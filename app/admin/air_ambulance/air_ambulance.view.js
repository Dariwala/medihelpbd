// blank controller
air_ambulance.controller('ViewAirAmbulanceController', ViewAirAmbulanceController);

function ViewAirAmbulanceController($scope, $http, $sce) {

    $scope.trustAsHtml = $sce.trustAsHtml;

    var airambulance_id = document.getElementsByName('airambulance_id')[0].value;

    $http
        .get(window.location.origin+"/service/api/view/air-ambulance/" + airambulance_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.airambulanceservice;
            $('#service_id').kendoDropDownList({
                optionLabel   : "Select Category",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                index: 0
            });

            var dropdownlist = $("#service_id").data("kendoDropDownList");

        });
    
    $scope.getSubServiceDropDown = function() 
    {
        
        $('#subservice_id').kendoDropDownList({
         optionLabel   : "Select Subservice",
        });
    };

    $scope.getSubservice = function() 
    {
        var value = $("#service_id").data("kendoDropDownList").value();

        $http
        .get(window.location.origin+"/service/sub-service/api/view/airambulance/" + value + "/" + airambulance_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.addictionsubservice;
            $('#subservice_id').kendoDropDownList({
                optionLabel   : "Select Subservice",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                index: 0
            });

        });
        

    };

    $scope.getAirAmbulanceService = function() 
    {
        var value = $("#service_id").data("kendoDropDownList").value();
        
        $http
        .get(window.location.origin+"/air-ambulance/air-ambulance-service/api/list/" + airambulance_id + "/" + value, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })

        .then(function(response) {
            $scope.services = response.data;
        });

    };
        
}