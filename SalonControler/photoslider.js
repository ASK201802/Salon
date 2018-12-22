'use strict';
angular.module('example366', ['ngAnimate', 'ngTouch'])
  .controller('MainCtrl', ["$scope","$http",/*"$locationprovider",*/"$location",function($scope,$http/*,$locationprovider*/,$location) {
   // $locationProvider.html5Mode(true);
     $scope.photonum= $location.search().photonumber;
   console.log("photonumbr::::"+$scope.photonum);
    $scope.section= $location.search().category;
   console.log("section::::"+$scope.section);
   $scope.cutoff= $location.search().cutoff;
   console.log("cutoff::::"+$scope.cutoff);
   $scope.flex=$location.search().flexibility;
   console.log("flex:::"+$scope.flex);

    // Set of Photos
    $scope.photos = [
        {src: "../img/eyes.jpg", desc: "Image 01",id:"eyes1",},
        {src: "../img/machine.jpg", desc:"Image 02",id:"machine1"},
        {src: "../img/Animal.jpg", desc:"Image 03",id:"animal1"}
        
    ];
     $scope.records = [
        "Alfreds Futterkiste",
        "Berglunds snabbköp",
        "Centro comercial Moctezuma",
        "Ernst Handel",
    ];

    $scope.category="Monochrome";//as off now the code is hardcoded
    

    console.log("Inside photo slider");
    // initial image index
    $scope._Index = 0;
    // if a current image is the same as requested image
    $scope.isActive = function (index) {
        return $scope._Index === index;
    };
    // show prev image
    $scope.showPrev = function () {
        console.log("previous");
        $scope._Index = ($scope._Index > 0) ? --$scope._Index : $scope.photos.length - 1;
    };
    // show next image
    $scope.showNext = function () {
        $scope._Index = ($scope._Index < $scope.photos.length - 1) ? ++$scope._Index : 0;
    };
    // show a certain image
    $scope.showPhoto = function (index) {
        $scope._Index = index;
    };
    $scope.submitNumber = function () {
        console.log($scope.number);
        if (($scope.number<=0)||($scope.number===undefined))
         {
            alert("please provide valid number");
            return;
         }
         console.log($scope.photos[$scope._Index]);
        console.log("number submitted");
        $scope.Id=$scope.photos[$scope._Index].id;
        $scope.category="Monochrome";//as off now the code is hardcoded
       console.log($scope.category);
       $http.get("../salonmodel/SendNumber.php",{params:{Category:$scope.category,Number:$scope.number,Id:$scope.Id}}).then( );
        
        $scope._Index = ($scope._Index > 0) ? --$scope._Index : $scope.photos.length - 1;
        console.log("../salonmodel/SendNumber.php?Category="+$scope.category+"&Number="+$scope.number+"&Id="+$scope.Id);
        
    };
}]);