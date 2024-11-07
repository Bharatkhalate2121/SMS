<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
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
    <div class="container active">
      <div class="forms">
        <!-- <div class="form login">
        <a href="index.php"><img src="cross.svg" alt="" style="object-fit:contain;height:30px;float:right"></a>
          <span class="title">Login</span>

          <form action="" method="POST">
            <div class="input-field">
              <input type="text" placeholder="Enter your email" required />
              <i class="uil uil-envelope icon"></i>
            </div>
            <div class="input-field">
              <input
                type="password"
                class="password"
                placeholder="Enter your password"
                required
              />
              <i class="uil uil-lock icon"></i>
              <i class="uil uil-eye-slash showHidePw"></i>
            </div>

            <div class="checkbox-text">
              <div class="checkbox-content">
                <input type="checkbox" id="logCheck" />
                <label for="logCheck" class="text">Remember me</label>
              </div>

              <a href="#" class="text">Forgot password?</a>
            </div>

            <div class="input-field button">
              <input type="button" value="Login" />
            </div>
          </form>

          <div class="login-signup">
            <span class="text"
              >Not a member?
              <a href="#" class="text signup-link">Signup Now</a>
            </span>
          </div>
        </div> -->

        <!-- Registration Form -->
        <div class="form signup">
          <span class="title">Registration</span>

          <form action="contactteach.php" method="post">
            <div class="input-field">
              <input type="text" id="name" name="name" placeholder="Enter your name" required />
              <i class="uil uil-user"></i>
            </div>
            <div class="input-field">
              <input type="email" id="email" name="email" placeholder="Enter your email" required />
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

 <div class="input-field">
              <input type="text"
		    id="addr"
		    name="addr"
       
                placeholder="Enter address"
                required
              />
<i class="uil uil-envelope icon"></i>
</div>

<br>


<?php
$host="localhost";
$user="root";
$db="sms";
$pass="";
$conn =mysqli_connect($host,$user,$pass,$db);
if ($conn) {

// echo'Courses: '; 
}
else{
echo'fail';
    die();
}
?>
<select name="student_class" id="student_class" class="form-control">
                    <option value="">Select Course</option>
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
              <a href="login.php" class="text login-link">Login Now</a>
            </span>
          </div>
        </div>
      </div>
    </div>

    <script src="script.js"></script>
  </body>
</html>
