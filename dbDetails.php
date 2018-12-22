<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<<?php 
	  function openCon(){
       $dbhost="127.0.0.1";
       $dbuser="root";
       $dbpass="";
       $db="salondb";


        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
        return $conn;
	  }


	  function closeCon($conn){
	  	$conn->close();
      
	  }





	 ?>

</body>
</html>>