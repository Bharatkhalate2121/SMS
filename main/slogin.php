<?php
  include('database_connection.php');
  $log=0;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM students WHERE s_email='$email' AND s_Password='$pass'";
    $result = mysqli_query($conn, $sql);
    $numrow = mysqli_num_rows($result);
    // echo $numrow;
    if ($numrow > 0) {
        $row = mysqli_fetch_row($result);
        echo "loged";
        
        $sql1 = "SELECT * FROM `class` WHERE id='$row[5]'";
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_row($result1);
        session_start();
        $_SESSION['s_log'] = true;
        $_SESSION['s_id'] = $row[0];
        $_SESSION['s_name'] = $row[2];
        $_SESSION['s_class'] = $row1[1];
        $_SESSION['s_cid'] = $row[5];
        // echo $_SESSION['t_class'];
        header('Location: msg.php');
    } else {
      $log=1;
    }
}
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- ===== Iconscout CSS ===== -->
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="loginstyle.css" />

    <title>Login & Registration Form</title>
</head>

<body>
<?php

session_start();
// include "nav.php";

?>
  <div class="container">
  <div class="forms">
    <div class="form login">
      <a href="index.php"><img src="cross.svg" alt="" style="object-fit:contain;height:30px;float:right"></a>
      <span class="title">Student Login</span>
        <form action="" method="POST">
          <div class="input-field">
            <!-- <label class="form-label">Email address</label> -->
            <input type="email"class="form-control"  placeholder="Enter your email" name="email" required>
            <i class="uil uil-envelope icon"></i>
          </div>
          <div class="input-field">               
            <!-- <label  class="form-label">Password</label> -->
            <input type="password" class="form-control password" placeholder="Enter your password" name="pass"required>
            <i class="uil uil-lock icon"></i>
            <i class="uil uil-eye-slash showHidePw"></i>
          </div>
          <button type="submit" class="input-field button" style="background-color: #4070f4"><b>SUBMIT</b></button>
          <!-- <div class="input-field button">
              <input type="button" value="Signup" />
            </div> -->
        </form>
        <?php
          if($log==1){
            echo'<h1 align="center" style="color: red;">Wrong User Id or Password</h1>';
          }
        ?>
        <div class="login-signup">
            <span class="text"
              >Not a member?
              <a href="register.php" class="text">Signup Now</a>
             
            </span>
          </div>
    </div>
       <!-- Registration Form -->
       <div class="form signup">
          <span class="title">Registration</span>

          <form action="contact.php" method="post">
            <div class="input-field">
              <input type="text" id="name" name="name" placeholder="Enter your name" required />
              <i class="uil uil-user"></i>
            </div>
            <div class="input-field">
              <input type="text" id="email" name="email" placeholder="Enter your email" required />
              <i class="uil uil-envelope icon"></i>
            </div>         
            <div class="input-field">
              <input
		    id="pswrd"
		    name="pswrd"
                type="password"
                class="password"
                placeholder="Create password"
                required
              />
              <i class="uil uil-lock icon"></i>
              <i class="uil uil-eye-slash showHidePw"></i>
            </div>
            <br> 

<div >
 <h4> Gender</h4>
<input type="radio" id="fml" name="gen" value="male">

   <label for="fml">Male</label><br>
<input type="radio" id="fml" name="gen" value="female">
<label for="fml">Female</label><br>           
</div>




<?php
$host="localhost";
$user="root";
$db="sms";
$pass="";
$conn =mysqli_connect($host,$user,$pass,$db);
if ($conn) {

echo'successs';
}
else{
echo'fail';
    die();
}
?>
<select name="student_class" id="student_class" class="form-control">
                    <option value="">Select Class</option>
<?php
              $q1 = "SELECT * FROM class";
              $query1 = mysqli_query($conn, $q1);
              while ($result = mysqli_fetch_array($query1)) {
                echo '
                <option value="' . $result["id"] . '">' . $result["name"] . '</option>';
              }?>

            </select>
                  <span id="error_student_grade_id" class="text-danger"></span>

            <div class="input-field button">
              <input type="submit" value="Signup"  id="submit" name="submit" />
            </div>
          </form>

          <div class="login-signup">
            <span class="text"
              >Already a member?
              <a href="#" class="text login-link">Login Now</a>
            </span>
          </div>
        </div>

  </div>
</div>

<script src="loginscript.js"></script>
</body>
</html>
