<?php
$host="localhost";
$user="root";
$db="sms";
$pass="";
$conn =mysqli_connect($host,$user,$pass,$db);
if ($conn) {
	header("Location: slogin.php");
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
      $student_gender= $_POST['gen'];
	$student_dob=null;
      $student_class=$_POST['student_class'];
	$student_mobo=null; 

	$student_email = $_POST['email'];
	$student_password = $_POST['pswrd'];
$destinationfile=null;
	$sql_query = "INSERT INTO `students`( `s_roll`, `s_name`, `s_gender`, `s_dob`, `s_class`, `s_mobile`, `s_email`, `s_password`, `s_image`) VALUES ('$student_roll','$student_name','$student_gender','$student_dob','$student_class','$student_mobo','$student_email','$student_password','$destinationfile')";
			

	if (mysqli_query($conn, $sql_query)) {
		echo "User registered successfully";
	}
	else
	{
		echo "error: " . $sql . "" . mysqli_error($conn);
	}
	mysqli_close($conn);	
}
?> 