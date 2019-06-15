blood_bank.controller('BloodBankController', BloodBankController);

function BloodBankController($scope, $http) {

	 var blood_bank_id = document.getElementsByName('blood_bank_id')[0].value;
    console.log(blood_bank_id);

    $http
        .get(window.location.origin+"/district/api/blood-bank/get-selected-district/" + blood_bank_id, {
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
        .get(window.location.origin+"/district/api/blood-bank/get-selected-subdistrict/" + blood_bank_id, {
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


        $scope.blood_bank_phone_no = [];

        $scope.AppendPhone = function() {
            console.log("ok");
            $scope.blood_bank_phone_no.push('');
        }

        $scope.RemovePhone = function(index) {
            $scope.blood_bank_phone_no.splice(index, 1);
        }


        $scope.blood_bank_email_ad = [];

        $scope.AppendEmail = function () {
            $scope.blood_bank_email_ad.push('');
        }

        $scope.RemoveEmail = function (index) {
            $scope.blood_bank_email_ad.splice(index, 1);
        }


        $http
        .get(window.location.origin+"/blood-bank/api/phone/" + blood_bank_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.blood_bank_phone_no = response.data;
            $scope.blood_bank_phone = $scope.blood_bank_phone_no[0].blood_bank_phone_no;
            $scope.blood_bank_phone_no.splice(0, 1);//zero number index aga print korano hoise,
                                                    //ty zero ta remove  kore loop guray 1 teke prinrt
        });


        $http
        .get(window.location.origin+"/blood-bank/api/email/" + blood_bank_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.blood_bank_email_ad = response.data;
            $scope.blood_bank_email = $scope.blood_bank_email_ad[0].blood_bank_email_ad;
            $scope.blood_bank_email_ad.splice(0, 1);
        });




}