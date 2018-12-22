
	<?php 
	  include './dbDetails.php';
	  $section=$_GET["Section"];
	  $photonumber=$_GET["photonumber"];
	  $flexibility=$_GET["option"];
	  $totalNumberPhotosSQL="Select count(PhotoID) from marks where Category='".$section."'";
	  $FlexiblePhotosSQL="";
	  $FlexiblePhotosArray=array();
	  $FlexiblePhotosNumber=0;

	  $totalNumberPhotos="";
	  $totalNumberPhotosArray=array();
      $flexiSQLpercent="";
      $strictSQLpercent="";
      $flexiSQLCutoff="";
      $strictSQLArray=array();
      $strictSQLCutoff="Select  Marks from marks where Category='".$section."' ORDER BY Marks Desc LIMIT ". $photonumber;
      $cutoff="";
      $percent="";
      $resultArray=array();
     


	  

	  $con=openCon();
	   $result=$con->query($totalNumberPhotosSQL);
	   $totalNumberPhotosArray=$result->fetch_assoc();
	   $totalNumberPhotos=$totalNumberPhotosArray['count(PhotoID)'];//code for retriving number
	   
	   mySqli_free_result($result);



	   closeCon($con);
	   $con=openCon();
	   $result=$con->query($strictSQLCutoff) or die($con->error);
	   if($result->num_rows>0){
	   	
	   	$rowindex=0;
      while($row = $result->fetch_assoc()){
      	 $strictSQLArray[]= $row;
      	 $cutoff=$strictSQLArray[$rowindex]['Marks'];
      	$rowindex++;
      	 	}
      	
      }

    
	   
	   /*print_r($strictSQLArray[0]);
	   $obj=$strictSQLArray[0];
	   print_r($strictSQLArray[0]['Marks']);*/


	  	   

		mySqli_free_result($result);



	   closeCon($con);
	   $con=openCon();

	  if($flexibility==="flexible"){
	  	$FlexiblePhotosSQL="Select count(PhotoID) from marks where (Category='".$section."') AND (Marks>=".$cutoff.")";
      
       $result=$con->query($FlexiblePhotosSQL);
      $FlexiblePhotosArray=$result->fetch_assoc();
      $FlexiblePhotosNumber=$FlexiblePhotosArray['count(PhotoID)'];
     
      $percent=($FlexiblePhotosNumber/$totalNumberPhotos)*100;


	  }
	  else{
        $percent=($photonumber/$totalNumberPhotos)*100;
       


	  }
	$resultArray['percent']=$percent;
	$resultArray['cutoff']=$cutoff;
      
	

	  echo json_encode($resultArray);
	   
     
	  


closeCon($con);


	 ?>

