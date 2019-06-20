// blank controller
frontend.controller('ViewBnPharmacynewController', ViewBnPharmacynewController);

function ViewBnPharmacynewController($scope, $http, $sce) {

    $scope.trustAsHtml = $sce.trustAsHtml;

    var pharmacynew_id = document.getElementsByName('pharmacynew_id')[0].value;
        
        $http
        .get(window.location.origin+"/service/api/view/pharmacynew/" + pharmacynew_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        
        .then(function(response){
            
            data = response.data.pharmacynewservice;
            
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

        $http
        .get(window.location.origin+"/medical-department/api/view/pharmacynew/" + pharmacynew_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.pharmacynewdepartment;
            $('#department_id').kendoDropDownList({
                optionLabel   : "বিভাগ নির্বাচন করুন",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                index: 0
            });

            $('#medical_specialist_id').kendoDropDownList({
                optionLabel   : "ডাক্তার নির্বাচন করুন",
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
                optionLabel   : "ডাক্তার নির্বাচন করুন",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                index: 0
            });
        };

        $scope.getMedicalSpecialist = function() 
        {
            var value = $("#department_id").data("kendoDropDownList").value();

            $http
            .get(window.location.origin+"/medical-specialist/api/view/pharmacynew/" + value + "/" + pharmacynew_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){
                data = response.data.pharmacynewmedicalspecialist;
                $('#medical_specialist_id').kendoDropDownList({
                    optionLabel   : "ডাক্তার নির্বাচন করুন",
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
            .get(window.location.origin+"/pharmacynew/pharmacynew-doctor/api/list/" + value + "/" + pharmacynew_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })

            .then(function(response) {
                $scope.doctors = response.data;
            });
    
        };
        
        $scope.getPharmacynewService = function() 
        {
            var value = $("#service_id").data("kendoDropDownList").value();
         console.log("azam" + value);
            $http
            .get(window.location.origin+"/pharmacynew/pharmacynew-service/api/list/" + pharmacynew_id + "/" + value, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })

            .then(function(response) {
                $scope.services = response.data;
            });
    
        };

        
}