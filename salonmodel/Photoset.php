<?php 
	  include './dbDetails.php';
      $section=$_GET["photonumber"];
      $photonumber=$_GET["category"];
      $cutoff=$_GET["cutoff"];
      $flexibility=$_GET["flexibility"];
      $flexibleSQL="Select PhotoID from primarymarks where Category=".$section."  AND Marks>=".$cutoff;
      $strictSQL="Select PhotoID from primarymarks ORDER BY Category  where Category=".$section."  LIMIT".$cutoff;

     
      echo $flexibleSQL;
      echo  $strictSQL;
	
     if($flexibility=='flexible'){

     }
     else{

     }
	  

	  


     closeCon($con);


	 ?>

