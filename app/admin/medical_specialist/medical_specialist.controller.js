medical_specialist.controller('MedicalSpecialistController', MedicalSpecialistController);

function MedicalSpecialistController($scope, $http) {

	 var medical_specialist_id = document.getElementsByName('medical_specialist_id')[0].value;
    console.log(medical_specialist_id);

    $http
        .get(window.location.origin+"/district/api/medical-specialist/get-selected-district/" + medical_specialist_id, {
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
        .get(window.location.origin+"/district/api/medical-specialist/get-selected-subdistrict/" + medical_specialist_id, {
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


        $scope.medical_specialist_phone_no = [];

        $scope.AppendPhone = function() {
            console.log("ok");
            $scope.medical_specialist_phone_no.push('');
        }

        $scope.RemovePhone = function(index) {
            $scope.medical_specialist_phone_no.splice(index, 1);
        }


        $scope.medical_specialist_email_ad = [];

        $scope.AppendEmail = function () {
            $scope.medical_specialist_email_ad.push('');
        }

        $scope.RemoveEmail = function (index) {
            $scope.medical_specialist_email_ad.splice(index, 1);
        }


        $http
        .get(window.location.origin+"/medical-specialist/api/phone/" + medical_specialist_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.medical_specialist_phone_no = response.data;
            $scope.medical_specialist_phone = $scope.medical_specialist_phone_no[0].medical_specialist_phone_no;
            $scope.medical_specialist_phone_no.splice(0, 1);//zero number index aga print korano hoise,
                                                    //ty zero ta remove  kore loop guray 1 teke prinrt
        });


        $http
        .get(window.location.origin+"/medical-specialist/api/email/" + medical_specialist_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.medical_specialist_email_ad = response.data;
            $scope.medical_specialist_email = $scope.medical_specialist_email_ad[0].medical_specialist_email_ad;
            $scope.medical_specialist_email_ad.splice(0, 1);
        });




}