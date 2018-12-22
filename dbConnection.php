<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
     include 'dbDetails.php';
     echo "Connection start";
      $con=openCon();
     echo "Connection is successful";
     closeCon($con);





	 ?>

</body>
</html>