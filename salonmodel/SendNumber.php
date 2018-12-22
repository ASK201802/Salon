                 
	<?php 
	  include './dbDetails.php';

	 $Category=$_GET["Category"];
	 $Number=$_GET["Number"];
	 $Id=$_GET["Id"];

     $part1="INSERT INTO";
	 $part2=" `individualmarks`(`PhotoID`,`Category`, `Jury1Marks`, `Jury2Marks`, `Jury3Marks`)";
	 $part3=" VALUES ('".$Id."','".$Category."',".$Number.",0,0)";
	 $NewEntrysql=$part1.$part2.$part3;
	 $CheckExistSQL="SELECT * FROM individualmarks WHERE PhotoID='".$Id."'";
     $MarksName="`Jury1Marks`";
	 $UpdateSQL="UPDATE `individualmarks` SET ".$MarksName."=".$Number." WHERE PhotoID='".$Id."'";
	 $number=0;


	 
	 echo "check exist::::".$CheckExistSQL;
     echo "category".$Category;
     echo "Number".$Number;
     echo "Id".$Id;
	  $con=openCon();
	  $result=mysqli_query($con,$CheckExistSQL);
	  $rowcount=mysqli_num_rows($result);
	  
	  if ($rowcount==0)
	  $con->query( $NewEntrysql);
	  else
	 $con->query( $UpdateSQL);

	  

	  


     closeCon($con);


	 ?>

