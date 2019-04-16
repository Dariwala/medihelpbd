frontend.controller('FrontendBnController', FrontendBnController);

function FrontendBnController($scope, $http) {

        var directoryType = [
        {
            text:"২৪ আউয়ারস্ ফার্মেসী",
            value:7,
        },

        {
            text:"অপটিক্যাল সপ",
            value:17,
        },
        
        {
            text:"আই ব্যাংক",
            value:5,
        },

        {
            text:"অ্যাডিকশন রিহ্যাবিলিটেশন সেন্টার",
            value:12,
        },
        
        {
            text:"অ্যাম্বুলেন্স",
            value:1,
        },

        {
            text:"ইয়োগা সেন্টার",
            value:20,
        },
        
        {
            text:"এয়ার অ্যাম্বুলেন্স",
            value:2,
        },

        {
            text:"জিম",
            value:15,
        },
        
        {
            text:"ডক্টরস্ প্যানেল",
            value:8,
        },

        {
            text:"ফরেন মেডিক্যাল ইনফরমেশন সেন্টার",
            value:14,
        },

        {
            text:"ফার্মেসী",
            value:18,
        },

        {
            text:"ফিজিওথেরাপি অ্যান্ড রিহ্যাবিলিটেশন সেন্টার",
            value:19,
        },

        {
            text:"বিউটি পার্লার এবং স্পা",
            value:13,
        },
        
        {
            text:"ব্লাড ব্যাংক",
            value:3,
        },
        
        {
            text:"ব্লাড ডোনার",
            value:4,
        },
        
        {
            text:"ভ্যাকসিনেশন সেন্টার",
            value:10,
        },
        
        {
            text:"স্কিন কেয়ার অ্যান্ড লেজার সেন্টার",
            value:11,
        },
        
        {
            text:"হারবাল মেডিসিন সেন্টার",
            value:9,
        },
        
        {
            text:"হেল্‌থ কেয়ার সেন্টার",
            value:6,
        },

        {
            text:"হোমিওপ্যাথিক মেডিসিন সেন্টার",
            value:16,
        },

        ];

    $http
        .get(window.location.origin+"/district/api/list", {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            data = response.data.districts;
            //selected_district = response.data.selected_district;

            $('#district_id').kendoDropDownList({
                optionLabel   : "জেলা নির্বাচন করুন",
                dataTextField: "text",
                dataValueField: "value",
                //cascadeFrom: "directoryType",
                dataSource: data,
                dataType: "jsonp",
                filter: "contains",
                index: 0
            });

            $('#directoryType').kendoDropDownList({
                optionLabel   : "সেবা প্রদানকারী নির্বাচন করুন",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: directoryType,
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
            
            if (value==4) {
                
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
                            optionLabel   : "শ্রেনী নির্বাচন করুন ",
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
                            optionLabel   : "শ্রেনী নির্বাচন করুন ",
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
            else if (value==8) {
                
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
                            optionLabel   : "বিভাগ নির্বাচন করুন",
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
                            optionLabel   : "বিভাগ নির্বাচন করুন",
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
            else if (value==6) {
                
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
                            optionLabel   : "ধরণ নির্বাচন করুন",
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
                            optionLabel   : "ধরণ নির্বাচন করুন",
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
                    optionLabel   : "উপজেলা নির্বাচন করুন",
                    dataTextField: "text",
                    dataValueField: "value",
                    dataSource: data,
                    dataType: "jsonp",
                    filter: "contains",
                    index: 0
                });

            });
            
    
        };

        $('#subdistrict_id').kendoDropDownList({
            optionLabel   : "উপজেলা নির্বাচন করুন",
            index: 0
        });

}