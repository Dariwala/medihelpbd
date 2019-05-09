pharmacy.controller('PharmacyController', PharmacyController);

function PharmacyController($scope, $http) {

	 var pharmacy_id = document.getElementsByName('pharmacy_id')[0].value;
    console.log(pharmacy_id);

    $http
        .get(window.location.origin+"/district/api/pharmacy/get-selected-district/" + pharmacy_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.districts;
            selected_district = response.data.selected_district;
            console.log("ok");
            $('#district_id').kendoDropDownList({
                optionLabel   : "Select District",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                index: 0
            });

            var dropdownlist = $("#district_id").data("kendoDropDownList");
                dropdownlist.value(selected_district);

        });


        $http
        .get(window.location.origin+"/district/api/pharmacy/get-selected-subdistrict/" + pharmacy_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.subdistricts;
            selected_subdistrict = response.data.selected_subdistrict;
            $('#subdistrict_id').kendoDropDownList({
                optionLabel   : "Select Sub-District",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                index: 0
            });

            var dropdownlist = $("#subdistrict_id").data("kendoDropDownList");
                dropdownlist.value(selected_subdistrict);

        });


        $scope.getSubdistrict = function() 
        {
            var value = $("#district_id").data("kendoDropDownList").value();

            $http
            .get(window.location.origin+"/district/sub-district/api/list/" + value, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){
                data = response.data;
                console.log("ok");
                $('#subdistrict_id').kendoDropDownList({
                    optionLabel   : "Select Sub-District",
                    dataTextField: "text",
                    dataValueField: "value",
                    dataSource: data,
                    dataType: "jsonp",
                    index: 0
                });

            });
            
    
        };


        $scope.pharmacy_phone_no = [];

        $scope.AppendPhone = function () {
            $scope.pharmacy_phone_no.push('');
        }

        $scope.RemovePhone = function (index) {
            $scope.pharmacy_phone_no.splice(index, 1);
        }


        $scope.pharmacy_email_ad = [];

        $scope.AppendEmail = function () {
            $scope.pharmacy_email_ad.push('');
        }

        $scope.RemoveEmail = function (index) {
            $scope.pharmacy_email_ad.splice(index, 1);
        }


        $http
        .get(window.location.origin+"/pharmacy/api/phone/" + pharmacy_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.pharmacy_phone_no = response.data;
            $scope.pharmacy_phone = $scope.pharmacy_phone_no[0].pharmacy_phone_no;
            $scope.pharmacy_phone_no.splice(0, 1);//zero number index aga print korano hoise,
                                                    //ty zero ta remove  kore loop guray 1 teke prinrt
        });


        $http
        .get(window.location.origin+"/pharmacy/api/email/" + pharmacy_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.pharmacy_email_ad = response.data;
            $scope.pharmacy_email = $scope.pharmacy_email_ad[0].pharmacy_email_ad;
            $scope.pharmacy_email_ad.splice(0, 1);
        });




}