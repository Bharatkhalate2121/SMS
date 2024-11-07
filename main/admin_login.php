<?php
  include('database_connection.php');
  $log=0;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM `admin` WHERE `email`='$email' AND `Password`='$pass'";
    $result = mysqli_query($conn, $sql);
    $numrow = mysqli_num_rows($result);
    if ($numrow > 0) {
        $row = mysqli_fetch_row($result);
        echo "loged";
        session_start();
        $_SESSION['a_log'] = true;
        $_SESSION['a_id'] = $row[0];
        $_SESSION['a_name'] = $row[1];
        $_SESSION['a_email'] = $row[2];
        header('Location: dashboard.php');
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
      <span class="title">Admin Login</span>
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
              <a href="#" class="text">Signup Now</a>
             
            </span>
          </div>
    </div>
  </div>
</div>
<script src="loginscript.js"></script>
</body>
</html>
