homeopathic.controller('HomeopathicController', HomeopathicController);

function HomeopathicController($scope, $http) {

	 var homeopathic_id = document.getElementsByName('homeopathic_id')[0].value;
    console.log(homeopathic_id);

    $http
        .get(window.location.origin+"/district/api/homeopathic/get-selected-district/" + homeopathic_id, {
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
        .get(window.location.origin+"/district/api/homeopathic/get-selected-subdistrict/" + homeopathic_id, {
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


        $scope.homeopathic_phone_no = [];

        $scope.AppendPhone = function () {
            $scope.homeopathic_phone_no.push('');
        }

        $scope.RemovePhone = function (index) {
            $scope.homeopathic_phone_no.splice(index, 1);
        }


        $scope.homeopathic_email_ad = [];

        $scope.AppendEmail = function () {
            $scope.homeopathic_email_ad.push('');
        }

        $scope.RemoveEmail = function (index) {
            $scope.homeopathic_email_ad.splice(index, 1);
        }


        $http
        .get(window.location.origin+"/homeopathic/api/phone/" + homeopathic_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.homeopathic_phone_no = response.data;
            $scope.homeopathic_phone = $scope.homeopathic_phone_no[0].homeopathic_phone_no;
            $scope.homeopathic_phone_no.splice(0, 1);//zero number index aga print korano hoise,
                                                    //ty zero ta remove  kore loop guray 1 teke prinrt
        });


        $http
        .get(window.location.origin+"/homeopathic/api/email/" + homeopathic_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.homeopathic_email_ad = response.data;
            $scope.homeopathic_email = $scope.homeopathic_email_ad[0].homeopathic_email_ad;
            $scope.homeopathic_email_ad.splice(0, 1);
        });




}