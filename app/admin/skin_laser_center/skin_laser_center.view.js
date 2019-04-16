// blank controller
skin_laser_center.controller('ViewSkinLaserCenterController', ViewSkinLaserCenterController);

function ViewSkinLaserCenterController($scope, $http, $sce) {

    $scope.trustAsHtml = $sce.trustAsHtml;

    var skin_laser_center_id = document.getElementsByName('skin_laser_center_id')[0].value;

     $http
        .get(window.location.origin+"/service/api/view/skin-laser-center/" + skin_laser_center_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.skinlasercenterservice;
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
            .get(window.location.origin+"/service/sub-service/api/view/skin-laser-center/" + value + "/" + skin_laser_center_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){
                data = response.data.skinlasercentersubservice;
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

        $scope.getSkinLaserCenterService = function() 
        {
            
            var value = $("#service_id").data("kendoDropDownList").value();
            console.log('break');
            $http
            .get(window.location.origin+"/skin-laser-center/skin-laser-center-service/api/list/" + skin_laser_center_id + "/" + value, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })

            .then(function(response) {
                $scope.services = response.data;
            });
    
        };


        $http
        .get(window.location.origin+"/medical-department/api/view/skin-laser-center/" + skin_laser_center_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.skinlasercenterdepartment;
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
            .get(window.location.origin+"/medical-specialist/api/view/skin-laser-center/" + value + "/" + skin_laser_center_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){
                data = response.data.skinlasercentermedicalspecialist;
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
            .get(window.location.origin+"/skin-laser-center/skin-laser-center-doctor/api/list/" + value + "/" + skin_laser_center_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })

            .then(function(response) {
                $scope.doctors = response.data;
            });
    
        };

        
}