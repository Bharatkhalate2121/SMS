<?php
$host="localhost";
$user="root";
$db="sms";
$pass="";
$conn =mysqli_connect($host,$user,$pass,$db);
if ($conn) {
	header("Location: login.php");
}
else{
echo'fail';
    die();
}

if (isset($_POST['submit'])) {
       $student_roll=null;
	$student_name = $_POST['name'];
	//$lname = $_POST['lname'];
	//$contry = $_POST['contry'];
	//$subject = $_POST['subject'];
      $student_gender= $_POST['addr'];
	//$student_dob=null;
      $student_class=$_POST['student_class'];
	$student_mobo=null; 

	$student_email = $_POST['email'];
	$student_password = $_POST['pswrd'];
$destinationfile=null;
	$sql_query = "INSERT INTO `teachers`( `t_name`, `t_class`,`t_address`,`t_image`, `t_email`, `t_password`) VALUES ('$student_name','$student_class','$student_gender','$destinationfile','$student_email','$student_password')";
			

	if (	) {
		echo "User registered successfully";
	}
	else
	{
		echo "error: " . $sql . "" . mysqli_error($conn);
	}
	mysqli_close($conn);	
}
?> 