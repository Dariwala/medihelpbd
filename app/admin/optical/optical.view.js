// blank controller
optical.controller('ViewOpticalController', ViewOpticalController);

function ViewOpticalController($scope, $http, $sce) {

    $scope.trustAsHtml = $sce.trustAsHtml;

    var optical_id = document.getElementsByName('optical_id')[0].value;


        $http
        .get(window.location.origin+"/service/api/view/optical/" + optical_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        
        .then(function(response){
            
            data = response.data.opticalservice;
            
            $('#service_id').kendoDropDownList({
                optionLabel   : "Select Category",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                filter: "contains",
                index: 0
            });

            var dropdownlist = $("#service_id").data("kendoDropDownList");

        });

        $http
        .get(window.location.origin+"/medical-department/api/view/optical/" + optical_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.opticaldepartment;
            $('#department_id').kendoDropDownList({
                optionLabel   : "Select Department",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                index: 0
            });

            var dropdownlist = $("#department_id").data("kendoDropDownList");

        });

        $scope.getMedicalSpecialistDropDown = function() 
        {
            
            $('#medical_specialist_id').kendoDropDownList({
             optionLabel   : "Select Doctor",
            });
        };

        $scope.getMedicalSpecialist = function() 
        {
            var value = $("#department_id").data("kendoDropDownList").value();

            $http
            .get(window.location.origin+"/medical-specialist/api/view/optical/" + value + "/" + optical_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){
                data = response.data.opticalmedicalspecialist;
                $('#medical_specialist_id').kendoDropDownList({
                    optionLabel   : "Select Doctor",
                    dataTextField: "text",
                    dataValueField: "value",
                    dataSource: data,
                    dataType: "jsonp",
                    index: 0
                });

            });
            
    
        };

        $scope.getDoctor = function() 
        {
            var value = $("#medical_specialist_id").data("kendoDropDownList").value();

            $http
            .get(window.location.origin+"/optical/optical-doctor/api/list/" + value + "/" + optical_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })

            .then(function(response) {
                $scope.doctors = response.data;
            });
    
        };

        $scope.getOpticalService = function() 
        {
            var value = $("#service_id").data("kendoDropDownList").value();
            
            $http
            .get(window.location.origin+"/optical/optical-service/api/list/" + optical_id + "/" + value, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })

            .then(function(response) {
                $scope.services = response.data;
            });
    
        };

        
}