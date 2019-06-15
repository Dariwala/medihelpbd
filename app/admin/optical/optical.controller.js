optical.controller('OpticalController', OpticalController);

function OpticalController($scope, $http) {

	 var optical_id = document.getElementsByName('optical_id')[0].value;
    console.log(optical_id);

    $http
        .get(window.location.origin+"/district/api/optical/get-selected-district/" + optical_id, {
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
        .get(window.location.origin+"/district/api/optical/get-selected-subdistrict/" + optical_id, {
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


        $scope.optical_phone_no = [];

        $scope.AppendPhone = function () {
            $scope.optical_phone_no.push('');
        }

        $scope.RemovePhone = function (index) {
            $scope.optical_phone_no.splice(index, 1);
        }


        $scope.optical_email_ad = [];

        $scope.AppendEmail = function () {
            $scope.optical_email_ad.push('');
        }

        $scope.RemoveEmail = function (index) {
            $scope.optical_email_ad.splice(index, 1);
        }


        $http
        .get(window.location.origin+"/optical/api/phone/" + optical_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.optical_phone_no = response.data;
            $scope.optical_phone = $scope.optical_phone_no[0].optical_phone_no;
            $scope.optical_phone_no.splice(0, 1);//zero number index aga print korano hoise,
                                                    //ty zero ta remove  kore loop guray 1 teke prinrt
        });


        $http
        .get(window.location.origin+"/optical/api/email/" + optical_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.optical_email_ad = response.data;
            $scope.optical_email = $scope.optical_email_ad[0].optical_email_ad;
            $scope.optical_email_ad.splice(0, 1);
        });




}