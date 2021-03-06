// blank controller
frontend.controller('ViewBnHomeopathicController', ViewBnHomeopathicController);

function ViewBnHomeopathicController($scope, $http, $sce) {

    $scope.trustAsHtml = $sce.trustAsHtml;

    var homeopathic_id = document.getElementsByName('homeopathic_id')[0].value;


        $http
        .get(window.location.origin+"/service/api/view/homeopathic/" + homeopathic_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        
        .then(function(response){
            
            data = response.data.homeopathicservice;
            
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
        .get(window.location.origin+"/medical-department/api/view/homeopathic/" + homeopathic_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.homeopathicdepartment;
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
            .get(window.location.origin+"/medical-specialist/api/view/homeopathic/" + value + "/" + homeopathic_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){
                data = response.data.homeopathicmedicalspecialist;
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
            .get(window.location.origin+"/homeopathic/homeopathic-doctor/api/list/" + value + "/" + homeopathic_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })

            .then(function(response) {
                $scope.doctors = response.data;
            });
    
        };

        $scope.getHomeopathicService = function() 
        {
            var value = $("#service_id").data("kendoDropDownList").value();
            
            $http
            .get(window.location.origin+"/homeopathic/homeopathic-service/api/list/" + homeopathic_id + "/" + value, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })

            .then(function(response) {
                $scope.services = response.data;
            });
    
        };

        
}