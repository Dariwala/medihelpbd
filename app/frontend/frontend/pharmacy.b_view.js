// blank controller
frontend.controller('ViewBnPharmacyController', ViewBnPharmacyController);

function ViewBnPharmacyController($scope, $http ,$sce) {

    $scope.trustAsHtml = $sce.trustAsHtml;
    
    var pharmacy_id = document.getElementsByName('pharmacy_id')[0].value;
    
    $http
        .get(window.location.origin+"/service/api/view/pharmacy/" + pharmacy_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        
        .then(function(response){
            data = response.data.pharmacyservice;
            
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
        .get(window.location.origin+"/product-category/api/view/pharmacy/" + pharmacy_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.pharmacyproductcategory;
            $('#product_category_id').kendoDropDownList({
                optionLabel   : "পণ্য বিভাগ নির্বাচন করুন",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                filter: "contains",
                index: 0
            });

            var dropdownlist = $("#product_category_id").data("kendoDropDownList");

        });

        

        $scope.getproductSubCategoryDropDown = function() 
        {
            
            $('#product_subcategory_id').kendoDropDownList({
             optionLabel   : "পণ্য উপবিভাগ নির্বাচন করুন",
            });
        };



        $scope.getSubProductCategory = function() 
        {
            var value = $("#product_category_id").data("kendoDropDownList").value();

            $http
            .get(window.location.origin+"/product-category/product-subcategory/api/view/pharmacy/" + value + "/" + pharmacy_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){
                data = response.data.pharmacyproductsubcategory;
                $('#product_subcategory_id').kendoDropDownList({
                    optionLabel   : "পণ্য উপবিভাগ নির্বাচন করুন",
                    dataTextField: "text",
                    dataValueField: "value",
                    dataSource: data,
                    dataType: "jsonp",
                    filter: "contains",
                    index: 0
                });

            });
            
    
        };
        
        
        $scope.getServiceDropDown = function() 
        {
            $('#service_id').kendoDropDownList({
             optionLabel   : "পরিসেবা নির্বাচন করুন",
            });
        };
        
        $scope.getSubservice = function() 
        {
            var value = $("#service_id").data("kendoDropDownList").value();
           
            $http
            .get(window.location.origin+"/service/sub-service/api/view/pharmacy/" + value + "/" + pharmacy_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){
                data = response.data.pharmacysubservice;
                console.log(data);
                $('#service_id').kendoDropDownList({
                    optionLabel   : "উপপরিসেবা নির্বাচন করুন",
                    dataTextField: "text",
                    dataValueField: "value",
                    dataSource: data,
                    dataType: "jsonp",
                    filter: "contains",
                    index: 0
                });

            });
            
    
        };
        
        
        $scope.getPharmacyService = function() 
        {
            var value = $("#service_id").data("kendoDropDownList").value();
           
            $http
            .get(window.location.origin+"/pharmacy/pharmacy-service/api/list/" + pharmacy_id + "/" + value, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })

            .then(function(response) {
                $scope.services = response.data;
            });
    
        };
        

        $scope.getPharmacyProduct = function() 
        {
            var value = $("#product_subcategory_id").data("kendoDropDownList").value();
            console.log(value);
            $http
            .get(window.location.origin+"/pharmacy/pharmacy-product/api/list/" + value + "/" + pharmacy_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })

            .then(function(response) {
                $scope.products = response.data;
            });
    
        };


        $http
        .get(window.location.origin+"/medical-department/api/view/pharmacy/" + pharmacy_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.pharmacydepartment;

            $('#department_id').kendoDropDownList({
                optionLabel   : "বিভাগ নির্বাচন করুন",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                filter: "contains",
                index: 0
            });

            $('#medical_specialist_id').kendoDropDownList({
                optionLabel   : "ডাক্তার নির্বাচন করুন",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                filter: "contains",
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
                filter: "contains",
                index: 0
            });
        };

        $scope.getMedicalSpecialist = function() 
        {
            var value = $("#department_id").data("kendoDropDownList").value();

            $http
            .get(window.location.origin+"/medical-specialist/api/view/pharmacy/" + value + "/" + pharmacy_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){
                data = response.data.pharmacymedicalspecialist;
                $('#medical_specialist_id').kendoDropDownList({
                    optionLabel   : "ডাক্তার নির্বাচন করুন",
                    dataTextField: "text",
                    dataValueField: "value",
                    dataSource: data,
                    dataType: "jsonp",
                    filter: "contains",
                    index: 0
                });

            });
            
    
        };

        

        $scope.getDoctor = function() 
        {
            var value = $("#medical_specialist_id").data("kendoDropDownList").value();

            $http
            .get(window.location.origin+"/pharmacy/pharmacy-doctor/api/list/" + value + "/" + pharmacy_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })

            .then(function(response) {
                $scope.doctors = response.data;
            });
    
        };

        
}