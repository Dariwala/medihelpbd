// blank controller
blank.controller('BlankController', BlankController);

function BlankController($scope, $http) {

    // retriving data for table
    $http
        .get(get_url)
        .then(function(response){
            console.log(response.data.blank)
        });

    //object array
    $scope.blank_array = {
        blank_id:[],
        blank_name:[],
        blank_description:[]
    };

    // adding dynamic fields
    $scope.AddDynamicFileds = function () {

       // 
    }

    // removing dynamic fields
    $scope.RemoveDynamicFileds = function (index) {

        //
    }

    // viewing blank details
    $scope.ViewBlankDetails = function (blank_id) {
        
        //
    }

    // adding blank items
    $scope.AddBlank = function(){

        // data objet for sending form data with post request
        var data = {
            blank_id: $scope.blank_id,
            blank_name: $scope.blank_name,
            blank_description: $scope.blank_description
        };


        $http
            .post(post_url,data)
            .success(function(response){
                console.log(response);
            })
            .error(function(response){
                console.log(response);
            })

        // clearing fields
        $scope.ClearData();
    }

    // clearing data function
    $scope.ClearData = function () {
        
        //
    }

    // deleting blank items
    $scope.DeleteAlumni = function (blank_id) {

        $http
            .get(delete_url)
            .success(function(response){
                console.log(response);
            })
            .error(function(response){
                console.log(response);
            })

    }
}