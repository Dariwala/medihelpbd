foreignmedical.controller('ForeignmedicalController', ForeignmedicalController);

function ForeignmedicalController($scope, $http) {

	 var foreignmedical_id = document.getElementsByName('foreignmedical_id')[0].value;
    console.log(foreignmedical_id);

    $http
        .get(window.location.origin+"/district/api/foreignmedical/get-selected-district/" + foreignmedical_id, {
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
        .get(window.location.origin+"/district/api/foreignmedical/get-selected-subdistrict/" + foreignmedical_id, {
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


        $scope.foreignmedical_phone_no = [];

        $scope.AppendPhone = function () {
            $scope.foreignmedical_phone_no.push('');
        }

        $scope.RemovePhone = function (index) {
            $scope.foreignmedical_phone_no.splice(index, 1);
        }


        $scope.foreignmedical_email_ad = [];

        $scope.AppendEmail = function () {
            $scope.foreignmedical_email_ad.push('');
        }

        $scope.RemoveEmail = function (index) {
            $scope.foreignmedical_email_ad.splice(index, 1);
        }


        $http
        .get(window.location.origin+"/foreignmedical/api/phone/" + foreignmedical_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.foreignmedical_phone_no = response.data;
            $scope.foreignmedical_phone = $scope.foreignmedical_phone_no[0].foreignmedical_phone_no;
            $scope.foreignmedical_phone_no.splice(0, 1);//zero number index aga print korano hoise,
                                                    //ty zero ta remove  kore loop guray 1 teke prinrt
        });


        $http
        .get(window.location.origin+"/foreignmedical/api/email/" + foreignmedical_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.foreignmedical_email_ad = response.data;
            $scope.foreignmedical_email = $scope.foreignmedical_email_ad[0].foreignmedical_email_ad;
            $scope.foreignmedical_email_ad.splice(0, 1);
        });




}