<?php
  include('database_connection.php');
  $log=0;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM teachers WHERE t_email='$email' AND t_Password='$pass'";
    $result = mysqli_query($conn, $sql);
    $numrow = mysqli_num_rows($result);
    // echo $numrow;
    if ($numrow > 0) {
        $row = mysqli_fetch_row($result);
        echo "loged";
        // logedarray(7) { [0]=> string(1) "1" [1]=> string(11) "Amar gangji" [2]=> string(1) "2" [3]=> string(7) "soalpur" [4]=> string(29) "teacher_upload/1624778065.png" [5]=> string(14) "amar@gmail.com" [6]=> string(8) "pass@123" }
        $sql1 = "SELECT * FROM `class` WHERE id='$row[2]'";
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_row($result1);
        session_start();
        $_SESSION['t_log'] = true;
        $_SESSION['t_id'] = $row[0];
        $_SESSION['t_name'] = $row[1];
        $_SESSION['t_class'] = $row1[1];
        $_SESSION['t_cid'] = $row[2];
        // echo $_SESSION['t_class'];
        header('Location: d2.php');
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
      <span class="title">Instructor Login</span>
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
              <a href="registert.php" class="text">Signup Now</a>
             
            </span>
          </div>
    </div>
  </div>
</div>
<script src="loginscript.js"></script>
</body>
</html>








