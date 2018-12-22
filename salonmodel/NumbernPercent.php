
	<?php 
	  include './dbDetails.php';
	  $section=$_GET["Section"];
	  $cutoff=$_GET["cutoff"];
     $totalNumberPhotos=0;
     $Number=0;
      $percent=0;
      $resultArray=array();
      $totalNumberPhotosSQL="Select count(PhotoID) from marks where Category='".$section."'";
      $PhotosSQL="Select count(PhotoID) from marks where (Category='".$section."') AND (Marks>=".$cutoff.")";
       $con=openCon();
        $result=$con->query($totalNumberPhotosSQL);
	   $totalNumberPhotosArray=$result->fetch_assoc();
	   $totalNumberPhotos=$totalNumberPhotosArray['count(PhotoID)'];//code for retriving number
	   
	   mySqli_free_result($result);



	   closeCon($con);
	   $con=openCon();
        $result=$con->query($PhotosSQL);
      $PhotosArray=$result->fetch_assoc();
      $Number=$PhotosArray['count(PhotoID)'];
     
      $percent=($Number/$totalNumberPhotos)*100;
      

      $resultArray['percent']=$percent;
	$resultArray['number']=$Number;

	echo json_encode($resultArray);
	  





	 ?>

