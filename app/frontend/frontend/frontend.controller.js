frontend.controller('FrontendController', FrontendController);

function FrontendController($scope, $http) {
    
        $scope.sub_directory=0;
        var directoryType = [
            {
                text:"24 Hours Pharmacy",
                value:7,
            },

            {
                text:"Addiction Rehabilitation Center",
                value:12,
            },
            
            {
                text:"Air Ambulance",
                value:2,
            },
            
            {
                text:"Ambulance",
                value:1,
            },

            {
                text:"Beauty Parlour & Spa",
                value:13,
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
                text:"Doctors Panel",
                value:8,
            },
            
            {
                text:"Eye Bank",
                value:5,
            },

            {
                text:"Foreign Medical Information Center",
                value:14,
            },

            {
                text:"Gym",
                value:15,
            },
            
            {
                text:"Health Care Center",
                value:6,
            },

            {
                text:"Herbal Medicine Center",
                value:9,
            },

            {
                text:"Homeopathic Medicine Center",
                value:16,
            },

            {
                text:"Optical Shop",
                value:17,
            },

            {
                text:"Pharmacy",
                value:18,
            },

            {
                text:"Physiotherapy & Rehabilitation Center",
                value:19,
            },
            
            {
                text:"Skin Care & Laser Center",
                value:11,
            },
            
            {
                text:"Vaccination Center",
                value:10,
            },

            {
                text:"Yoga Center",
                value:20,
            },

        ];

             
            var data = [];
            data = directoryType;

    $http
        .get(window.location.origin+"/district/api/list", {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.districts;
            
            $('#district_id').kendoDropDownList({ 
                optionLabel: "Select District",
                dataTextField: "text",
                dataValueField: "value",
                //cascadeFrom: "directoryType",
                dataSource: data,
                sort:{field:"text", dir:"desc"},
                dataType: "jsonp",
                filter: "contains",
                /*popup: {
                    appendTo: $("#districtDropdownDiv")
                },*/
                index: 0
            });

            $('#directoryType').kendoDropDownList({
                optionLabel: "Select Service Provider",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: directoryType,
                sort:{field:"text", dir:"desc"},
                dataType: "jsonp",
                filter: "contains",
                index: 0
            });
            
            // var dropdownlist = $("#district_id").data("kendoDropDownList");
            // dropdownlist.value(selected_district);

        });

        $scope.getDistrict = function() 
        {
            var value           = $("#directoryType").data("kendoDropDownList").value();
            var subDistrict     = $("#subdistrict_id").data("kendoDropDownList").value();
            
            if (value == 4){
                
                if(subDistrict > 0){
                    
                    $scope.sub_directory=1;
                    $http
                    .get(window.location.origin+"/blood-donar/api/all?subDistrict=" + subDistrict, {
                        transformRequest: angular.identity,
                        headers: {'Content-Type': undefined, 'Process-Data': false}
                    })
                    .then(function(response){
                        data = response.data;
                        $('#sub_directoryType').kendoDropDownList({
                            optionLabel   : "Select Group",
                            dataTextField: "blood_group",
                            dataValueField: "id",
                            dataSource: data,
                            dataType: "jsonp",
                            filter: "contains",
                            index: 0
                        });
    
                    });
                    
                }else{
                    
                    $scope.sub_directory=1;
                    $http
                    .get(window.location.origin+"/blood-donar/api/all", {
                        transformRequest: angular.identity,
                        headers: {'Content-Type': undefined, 'Process-Data': false}
                    })
                    .then(function(response){
                        data = response.data;
                        $('#sub_directoryType').kendoDropDownList({
                            optionLabel   : "Select Group",
                            dataTextField: "blood_group",
                            dataValueField: "id",
                            dataSource: data,
                            dataType: "jsonp",
                            filter: "contains",
                            index: 0
                        });
    
                    });
                    
                }
            }
            else if (value == 8){
                
                if(subDistrict > 0){
                    
                    $scope.sub_directory=1;
                    $http
                    .get(window.location.origin+"/medical-specialist/api/all?subDistrict=" + subDistrict, {
                        transformRequest: angular.identity,
                        headers: {'Content-Type': undefined, 'Process-Data': false}
                    })
                    .then(function(response){
                        data = response.data;
                        $('#sub_directoryType').kendoDropDownList({
                            optionLabel   : "Select Department",
                            dataTextField: "medical_specialist_name",
                            dataValueField: "id",
                            dataSource: data,
                            dataType: "jsonp",
                            filter: "contains",
                            index: 0
                        });
    
                    });
                    
                }else{
                    
                    $scope.sub_directory=1;
                    $http
                    .get(window.location.origin+"/medical-specialist/api/all", {
                        transformRequest: angular.identity,
                        headers: {'Content-Type': undefined, 'Process-Data': false}
                    })
                    .then(function(response){
                        data = response.data;
                        $('#sub_directoryType').kendoDropDownList({
                            optionLabel   : "Select Department",
                            dataTextField: "medical_specialist_name",
                            dataValueField: "id",
                            dataSource: data,
                            dataType: "jsonp",
                            filter: "contains",
                            index: 0
                        });
    
                    });
                    
                }
            }
            else if (value == 6){
                
                if(subDistrict > 0){
                    
                    $scope.sub_directory=1;
                    $http
                    .get(window.location.origin+"/hospital/api/service/all?subDistrict=" + subDistrict, {
                        transformRequest: angular.identity,
                        headers: {'Content-Type': undefined, 'Process-Data': false}
                    })
                    .then(function(response){
                        data = response.data;
                        $('#sub_directoryType').kendoDropDownList({
                            optionLabel   : "Select Category",
                            dataTextField: "hospital_subname",
                            dataValueField: "id",
                            dataSource: data,
                            dataType: "jsonp",
                            filter: "contains",
                            autoBind: false,
                            index: 0
                        });
    
                    });
                    
                }else{
                    
                    $scope.sub_directory=1;
                    $http
                    .get(window.location.origin+"/hospital/api/service/all", {
                        transformRequest: angular.identity,
                        headers: {'Content-Type': undefined, 'Process-Data': false}
                    })
                    .then(function(response){
                        data = response.data;
                        $('#sub_directoryType').kendoDropDownList({
                            optionLabel   : "Select Category",
                            dataTextField: "hospital_subname",
                            dataValueField: "id",
                            dataSource: data,
                            dataType: "jsonp",
                            filter: "contains",
                            autoBind: false,
                            index: 0
                        });
    
                    }); 
                    
                }
            }
            else{
                $scope.sub_directory=0;
            }
            
        }

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
                    optionLabel   : "Select Sub-District",
                    dataTextField: "text",
                    dataValueField: "value",
                    dataSource: data,
                    dataType: "jsonp",
                    filter: "contains",
                    index: 0
                });

            });
            
    
        }

        $('#subdistrict_id').kendoDropDownList({
            optionLabel   : "Select Sub-District",
            index: 0
        });

}