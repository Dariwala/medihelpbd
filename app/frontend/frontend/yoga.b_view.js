// blank controller
frontend.controller('ViewBnYogaController', ViewBnYogaController);

function ViewBnYogaController($scope, $http, $sce) {

    $scope.trustAsHtml = $sce.trustAsHtml;

    var yoga_id = document.getElementsByName('yoga_id')[0].value;

     $http
        .get(window.location.origin+"/service/api/view/yoga/" + yoga_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.yogaservice;
            $('#service_id').kendoDropDownList({
                optionLabel   : "ধরণ নির্বাচন করুন",
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
             optionLabel   : "উপপরিসেবা নির্বাচন করুন",
            });
        };



        $scope.getSubservice = function() 
        {
            var value = $("#service_id").data("kendoDropDownList").value();

            $http
            .get(window.location.origin+"/service/sub-service/api/view/yoga/" + value + "/" + yoga_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){
                data = response.data.yogasubservice;
                $('#subservice_id').kendoDropDownList({
                    optionLabel   : "উপপরিসেবা নির্বাচন করুন",
                    dataTextField: "text",
                    dataValueField: "value",
                    dataSource: data,
                    dataType: "jsonp",
                    index: 0
                });

            });
            
    
        };

        $scope.getYogaService = function() 
        {
            var value = $("#service_id").data("kendoDropDownList").value();
            
            console.log('break');
            
            $http
            .get(window.location.origin+"/yoga/yoga-service/api/list/" + yoga_id + "/" + value, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })

            .then(function(response) {
                $scope.services = response.data;
            });
    
        };


        $http
        .get(window.location.origin+"/medical-department/api/view/yoga/" + yoga_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.yogadepartment;
            $('#department_id').kendoDropDownList({
                optionLabel   : "বিভাগ নির্বাচন করুন",
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
            });
        };

        $scope.getMedicalSpecialist = function() 
        {
            var value = $("#department_id").data("kendoDropDownList").value();

            $http
            .get(window.location.origin+"/medical-specialist/api/view/yoga/" + value + "/" + yoga_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){
                data = response.data.yogamedicalspecialist;
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
            .get(window.location.origin+"/yoga/yoga-doctor/api/list/" + value + "/" + yoga_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })

            .then(function(response) {
                $scope.doctors = response.data;
            });
    
        };

        
}