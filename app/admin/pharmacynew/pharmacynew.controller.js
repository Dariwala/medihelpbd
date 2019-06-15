pharmacynew.controller('PharmacynewController', PharmacynewController);

function PharmacynewController($scope, $http) {

	 var pharmacynew_id = document.getElementsByName('pharmacynew_id')[0].value;
    console.log(pharmacynew_id);

    $http
        .get(window.location.origin+"/district/api/pharmacynew/get-selected-district/" + pharmacynew_id, {
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
        .get(window.location.origin+"/district/api/pharmacynew/get-selected-subdistrict/" + pharmacynew_id, {
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


        $scope.pharmacynew_phone_no = [];

        $scope.AppendPhone = function () {
            $scope.pharmacynew_phone_no.push('');
        }

        $scope.RemovePhone = function (index) {
            $scope.pharmacynew_phone_no.splice(index, 1);
        }


        $scope.pharmacynew_email_ad = [];

        $scope.AppendEmail = function () {
            $scope.pharmacynew_email_ad.push('');
        }

        $scope.RemoveEmail = function (index) {
            $scope.pharmacynew_email_ad.splice(index, 1);
        }


        $http
        .get(window.location.origin+"/pharmacynew/api/phone/" + pharmacynew_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.pharmacynew_phone_no = response.data;
            $scope.pharmacynew_phone = $scope.pharmacynew_phone_no[0].pharmacynew_phone_no;
            $scope.pharmacynew_phone_no.splice(0, 1);//zero number index aga print korano hoise,
                                                    //ty zero ta remove  kore loop guray 1 teke prinrt
        });


        $http
        .get(window.location.origin+"/pharmacynew/api/email/" + pharmacynew_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.pharmacynew_email_ad = response.data;
            $scope.pharmacynew_email = $scope.pharmacynew_email_ad[0].pharmacynew_email_ad;
            $scope.pharmacynew_email_ad.splice(0, 1);
        });




}