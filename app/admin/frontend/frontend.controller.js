frontend.controller('FrontendController', FrontendController);

function FrontendController($scope, $http) {

    //  var eye_bank_id = document.getElementsByName('eye_bank_id')[0].value;
    // console.log(eye_bank_id);

        var directoryType = [{
            text:"Ambulance",
            value:1,
        },
        {
            text:"Airambulance",
            value:2,
        },
        {
            text:"Blood Bank",
            value:3,
        },
        {
            text:"Blood Donor",
            value:4,
        },
        {
            text:"Eye Bank",
            value:5,
        },
        {
            text:"Hospital",
            value:6,
        },
        {
            text:"Pharmacy",
            value:7,
        },
        {
            text:"Medical Specialist",
            value:8,
        },
        {
            text:"Herbal Center",
            value:9,
        },
        {
            text:"Vaccine Point",
            value:10,
        },
        {
            text:"Skin Care & Laser Center",
            value:11,
        }

        ];
            data = directoryType;
            //selected_district = response.data.selected_district;

            $('#directoryType').kendoDropDownList({
                optionLabel   : "Select directoryType",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: data,
                dataType: "jsonp",
                index: 0
            });

            var dropdownlist = $("#directoryType").data("kendoDropDownList");
               // dropdownlist.value(selected_district);





    $http
        .get(window.location.origin+"/district/api/list", {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.districts;
            //selected_district = response.data.selected_district;

            $('#district_id').kendoDropDownList({
                optionLabel   : "Select District",
                dataTextField: "text",
                dataValueField: "value",
                //cascadeFrom: "directoryType",
                dataSource: data,
                dataType: "jsonp",
                index: 0
            });

            var dropdownlist = $("#district_id").data("kendoDropDownList");
               // dropdownlist.value(selected_district);

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
                $('#subdistrict_id').kendoDropDownList({
                    optionLabel   : "Select Subdistrict",
                    dataTextField: "text",
                    dataValueField: "value",
                    dataSource: data,
                    dataType: "jsonp",
                    index: 0
                });

            });
            
    
        };

        $('#subdistrict_id').kendoDropDownList({
            optionLabel   : "Select Subdistrict",
            index: 0
        });




}