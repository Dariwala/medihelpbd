// blank controller
frontend.controller('ViewBnGymController', ViewBnGymController);

function ViewBnGymController($scope, $http, $sce) {

    $scope.trustAsHtml = $sce.trustAsHtml;

    var gym_id = document.getElementsByName('gym_id')[0].value;

     $http
        .get(window.location.origin+"/service/api/view/gym/" + gym_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.gymservice;
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
            .get(window.location.origin+"/service/sub-service/api/view/gym/" + value + "/" + gym_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){
                data = response.data.gymsubservice;
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

        $scope.getGymService = function() 
        {
            var value = $("#service_id").data("kendoDropDownList").value();
            
            console.log('break');
            
            $http
            .get(window.location.origin+"/gym/gym-service/api/list/" + gym_id + "/" + value, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })

            .then(function(response) {
                $scope.services = response.data;
            });
    
        };


        $http
        .get(window.location.origin+"/medical-department/api/view/gym/" + gym_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.gymdepartment;
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
            .get(window.location.origin+"/medical-specialist/api/view/gym/" + value + "/" + gym_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){
                data = response.data.gymmedicalspecialist;
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
            .get(window.location.origin+"/gym/gym-doctor/api/list/" + value + "/" + gym_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })

            .then(function(response) {
                $scope.doctors = response.data;
            });
    
        };

        
}