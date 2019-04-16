// blank controller
frontend.controller('ViewBnAirAmbulanceController', ViewBnAirAmbulanceController);

function ViewBnAirAmbulanceController($scope, $http, $sce) {

    $scope.trustAsHtml = $sce.trustAsHtml;
    
    var air_ambulance_id = document.getElementsByName('air_ambulance_id')[0].value;
    
     $http
        .get(window.location.origin+"/service/api/view/air-ambulance/" + air_ambulance_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.airambulanceservice;
          
            $('#service_id').kendoDropDownList({
                optionLabel   : "ধরণ নির্বাচন করুন",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                filter: "contains",
                index: 0
            });

            var dropdownlist = $("#service_id").data("kendoDropDownList");

        });

        

        $scope.getServiceDropDown = function() 
        {
            $('#service_id').kendoDropDownList({
             optionLabel   : "Select Service",
            });
        };



        $scope.getSubservice = function() 
        {
            var value = $("#service_id").data("kendoDropDownList").value();
      
            $http
            .get(window.location.origin+"/service/sub-service/api/view/air-ambulance/" + value + "/" + air_ambulance_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){
                data = response.data.airambulancesubservice;
                $('#service_id').kendoDropDownList({
                    optionLabel   : "Select Subservice",
                    dataTextField: "text",
                    dataValueField: "value",
                    dataSource: data,
                    dataType: "jsonp",
                    filter: "contains",
                    index: 0
                });

            });
            
    
        };

        $scope.getAirAmbulanceService = function() 
        {
            var value = $("#service_id").data("kendoDropDownList").value();
            
            $http
            .get(window.location.origin+"/air-ambulance/air-ambulance-service/api/list/" + air_ambulance_id + "/" + value, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })

            .then(function(response) { console.log(response.data);
                $scope.services = response.data;
            });
    
        };    
        
    
}