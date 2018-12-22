
	<?php 
	  include './dbDetails.php';
    $section=$_GET["Section"];
	  $Percentage=$_GET["Photopercent"];
	  $flexibility=$_GET["option"];
	  $number=0;
	  $cutoff=0;
	  $resultArray=array();
	  $FlexiblePhotosArray=array();

	 /* echo "section".$section;
	  echo  "Percentage".$Percentage;
	  echo "flexibility".$flexibility;*/


	  $totalPhotoSQL="Select count(PhotoID) from marks where Category='".$section."'";
	  $cutoffnumberSQL="";
	  $cutoffflexiblenumberSQL="";



	  $con=openCon();
	   $result=$con->query($totalPhotoSQL);
	   $totalNumberPhotosArray=$result->fetch_assoc();
	   $totalNumberPhotos=$totalNumberPhotosArray['count(PhotoID)'];//code for retriving number
	   
	   mySqli_free_result($result);

	   closeCon($con);


	   	$number =round(($totalNumberPhotos/100)*$Percentage);
	   	$cutoffnumberSQL="Select  Marks from marks where Category='".$section."' ORDER BY Marks Desc LIMIT ". $number;

	   	$con=openCon();
	   $result=$con->query($cutoffnumberSQL) or die($con->error);
	   if($result->num_rows>0){
	   	
	   	$rowindex=0;
      while($row = $result->fetch_assoc()){
      	 $strictSQLArray[]= $row;
      	 $cutoff=$strictSQLArray[$rowindex]['Marks'];
      	$rowindex++;
      	 	}
      	
      }

	   if($flexibility=="flexible"){
         $cutoffflexiblenumberSQL= "Select count(PhotoID) from marks where (Category='".$section."') AND (Marks>=".$cutoff.")";
          $result=$con->query($cutoffflexiblenumberSQL);
      $FlexiblePhotosArray=$result->fetch_assoc();
      $number=$FlexiblePhotosArray['count(PhotoID)'];


	   }
	   


	    $resultArray['cutoff']=$cutoff;
	    $resultArray['number']=$number;

	echo json_encode($resultArray);
      
	  





	 ?>

