// blank controller
pharmacynew.controller('PharmacynewProductEditController', PharmacynewProductEditController);

function PharmacynewProductEditController($scope, $http) {



    var pharmacynew_product_id = document.getElementsByName('pharmacynew_product_id')[0].value;
    

    $http
        .get(window.location.origin+"/product-category/api/pharmacynew/get-selected-product-category/" + pharmacynew_product_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.product_categories;
            selected_product_category = response.data.selected_product_category;
            console.log(data);
            $('#product_category_id').kendoDropDownList({
                optionLabel   : "Select Category",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                index: 0
            });

            var dropdownlist = $("#product_category_id").data("kendoDropDownList");
                dropdownlist.value(selected_product_category);

        });


        $http
        .get(window.location.origin+"/product-category/api/pharmacynew/get-selected-product-subcategory/" + pharmacynew_product_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            selected_product_subcategory = response.data.selected_product_subcategory;
            data = response.data.product_subcategories;
            $('#product_subcategory_id').kendoDropDownList({
                optionLabel   : "Select Sub-Category",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                index: 0
            });

            var dropdownlist = $("#product_subcategory_id").data("kendoDropDownList");
                dropdownlist.value(selected_product_subcategory);

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