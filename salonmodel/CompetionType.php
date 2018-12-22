
	<?php 
	  include './dbDetails.php';
     $sql="select Category from category";
     $category=array();
      $con=openCon();

    $result= $con->query($sql);
    if($result->num_rows>0){
      while($row = $result->fetch_assoc()){
      	$category[]= $row;
      	
      }


     
    }


     closeCon($con);
       $json_response = json_encode($category);
      echo $json_response;
      
	  





	 ?>

