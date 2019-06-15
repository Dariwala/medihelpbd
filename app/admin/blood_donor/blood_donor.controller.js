blood_donor.controller('BloodDonorController', BloodDonorController);

function BloodDonorController($scope, $http) {

	 var blood_donor_id = document.getElementsByName('blood_donor_id')[0].value;
    console.log(blood_donor_id);

    $http
        .get(window.location.origin+"/district/api/blood-donor/get-selected-district/" + blood_donor_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.districts;
            selected_district = response.data.selected_district;

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
        .get(window.location.origin+"/district/api/blood-donor/get-selected-subdistrict/" + blood_donor_id, {
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


        $scope.blood_donor_phone_no = [];

        $scope.AppendPhone = function() {
            console.log("ok");
            $scope.blood_donor_phone_no.push('');
        }

        $scope.RemovePhone = function(index) {
            $scope.blood_donor_phone_no.splice(index, 1);
        }


        $scope.blood_donor_email_ad = [];

        $scope.AppendEmail = function () {
            $scope.blood_donor_email_ad.push('');
        }

        $scope.RemoveEmail = function (index) {
            $scope.blood_donor_email_ad.splice(index, 1);
        }


        $http
        .get(window.location.origin+"/blood-donar/api/phone/" + blood_donor_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.blood_donor_phone_no = response.data;
            $scope.blood_donor_phone = $scope.blood_donor_phone_no[0].blood_donor_phone_no;
            $scope.blood_donor_phone_no.splice(0, 1);//zero number index aga print korano hoise,
                                                    //ty zero ta remove  kore loop guray 1 teke prinrt
        });


        $http
        .get(window.location.origin+"/blood-donar/api/email/" + blood_donor_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.blood_donor_email_ad = response.data;
            $scope.blood_donor_email = $scope.blood_donor_email_ad[0].blood_donor_email_ad;
            $scope.blood_donor_email_ad.splice(0, 1);
        });


}