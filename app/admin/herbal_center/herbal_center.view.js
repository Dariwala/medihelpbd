// blank controller
herbal_center.controller('ViewHerbalCenterController', ViewHerbalCenterController);

function ViewHerbalCenterController($scope, $http ,$sce) {

    $scope.trustAsHtml = $sce.trustAsHtml;

    var herbal_center_id = document.getElementsByName('herbal_center_id')[0].value;
    
    $http
        .get(window.location.origin+"/product-category/api/view/herbal-center/" + herbal_center_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.herbalcenterproductcategory;
            $('#product_category_id').kendoDropDownList({
                optionLabel   : "Select Product Category",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                index: 0
            });

            var dropdownlist = $("#product_category_id").data("kendoDropDownList");

        });

        

        $scope.getproductSubCategoryDropDown = function() 
        {
            
            $('#product_subcategory_id').kendoDropDownList({
             optionLabel   : "Select Product Subcategory",
            });
        };



        $scope.getSubProductCategory = function() 
        {
            var value = $("#product_category_id").data("kendoDropDownList").value();

            $http
            .get(window.location.origin+"/product-category/product-subcategory/api/view/herbal-center/" + value + "/" + herbal_center_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){
                data = response.data.herbalcenterproductcategory;
                $('#product_subcategory_id').kendoDropDownList({
                    optionLabel   : "Select Product Subcategory",
                    dataTextField: "text",
                    dataValueField: "value",
                    dataSource: data,
                    dataType: "jsonp",
                    index: 0
                });

            });
            
    
        };

        $scope.getHerbalCenterProduct = function() 
        {

            console.log('break');
            $http
            .get(window.location.origin+"/herbal-center/herbal-center-product/api/list/" + herbal_center_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })

            .then(function(response) {
                $scope.products = response.data;
            });
    
        };

     $http
        .get(window.location.origin+"/service/api/view/herbal-center/" + herbal_center_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.herbalcenterservice;
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
            .get(window.location.origin+"/service/sub-service/api/view/herbal-center/" + value + "/" + herbal_center_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){
                data = response.data.herbalcentersubservice;
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

        $scope.getHerbalCenterService = function() 
        {
            var value = $("#service_id").data("kendoDropDownList").value();
            
            console.log('break');

            $http
            .get(window.location.origin+"/herbal-center/herbal-center-service/api/list/" + herbal_center_id + "/" + value, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })

            .then(function(response) {
                $scope.services = response.data;
            });
    
        };


        $http
        .get(window.location.origin+"/medical-department/api/view/herbal-center/" + herbal_center_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.herbalcenterdepartment;
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
            .get(window.location.origin+"/medical-specialist/api/view/herbal-center/" + value + "/" + herbal_center_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){
                data = response.data.herbalcentermedicalspecialist;
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
            .get(window.location.origin+"/herbal-center/herbal-center-doctor/api/list/" + value + "/" + herbal_center_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })

            .then(function(response) {
                $scope.doctors = response.data;
            });
    
        };

        
}