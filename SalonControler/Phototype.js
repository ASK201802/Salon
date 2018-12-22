 var app=angular.module("juryPrimary",[]);
  app.controller("jurycontroller",["$scope","$http","$sce",function($scope,$http,$sce)
  {
  	$scope.flexopt="flexible";
  	getPhotoType();
    //setIframeURL();



    $scope.setIframeURL=function setIframeURL()
    {
      console.log("iframe::::");
    $scope.iframeURL=$sce.trustAsResourceUrl("http://localhost/Salon/slide.html#?photonumber="+$scope.photoNumber+"&category="+$scope.Section.Category+"&cutoff="+$scope.cutoffMarks+"&flexibility="+$scope.flexopt);
    console.log("iframe::::"+$scope.iframeURL);
    }
  	
  	function getPhotoType()
  	{
  	$http.get("../salonmodel/CompetionType.php").then(function(response){ console.log(response.data);$scope.photos=response.data;});
    }

    $scope.calculatePercentnCutoff=function(photoNumber,section,flexopt){
    	console.log(photoNumber);
    	console.log(section);
     console.log( flexopt);
     
    	$scope.section=section;
    	$scope.photoNumber=photoNumber;
      if((section!=undefined)&&(flexopt!=undefined))
    	 $http.get("../salonmodel/PercentnCutoff.php",{params:{Section:section,photonumber:photoNumber,option:flexopt}}).then(function(response){console.log(response.data.percent); $scope.cutoffMarks=response.data.cutoff;$scope.photoPercentage=response.data.percent;});
    }

     $scope.calculateNumbernCutoff=function(photoPercent,section,flexopt){
    	console.log(photoPercent);
    	console.log(section);
    $http.get("../salonmodel/NumbernCutoff.php",{params:{Photopercent:photoPercent,Section:section,option:flexopt}}).then(function(response){console.log("here"); $scope.photoNumber=response.data.number; $scope.cutoffMarks=response.data.cutoff;});
     }

     $scope.calculateNumbernPercent=function(photoCutoff,section,flexopt){
     	console.log(section);
    	console.log(photoCutoff);
    	$http.get("../salonmodel/NumbernPercent.php",{params:{Section:section,cutoff:photoCutoff,option:flexopt}}).then(function(response){ console.log(response.data); $scope.photoNumber=response.data.number;$scope.photoPercentage=response.data.percent;});
    }


  
  }]);