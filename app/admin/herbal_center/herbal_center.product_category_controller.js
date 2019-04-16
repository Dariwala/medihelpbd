// blank controller
herbal_center.controller('HerbalCenterProductCategoryController', HerbalCenterProductCategoryController);

function HerbalCenterProductCategoryController($scope, $http) {


    

    
        $http
        .get(window.location.origin+"/product-category/api/list", {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data;
            data2=[];

            $('#product_category_id').kendoDropDownList({
                optionLabel   : "Select Cateory",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                index: 0
            });

            $('#product_subcategory_id').kendoDropDownList({
                optionLabel   : "Select Sub-Category",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data2,
                dataType: "jsonp",
                index: 0
            });

            

        });


        $scope.getProductSubcategory = function() 
        {
            var value = $("#product_category_id").data("kendoDropDownList").value();
            console.log(value);

            $http
            .get(window.location.origin+"/product-category/sub-category/api/list/" + value, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){
                data = response.data;
                console.log(data);
                $('#product_subcategory_id').kendoDropDownList({
                    optionLabel   : "Select Sub-Category",
                    dataTextField: "text",
                    dataValueField: "value",
                    dataSource: data,
                    dataType: "jsonp",
                    index: 0
                });

            });
            
    
        }

}