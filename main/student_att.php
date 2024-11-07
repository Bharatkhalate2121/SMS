
<?php
  session_start();
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat</title>
  <link rel="stylesheet" href="js/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
</head>
<body>
<?php

include "nav.php";
if ($user_dd==0) {
  header('Location: student.php');
}
else if ($user_dd==1) {
  header('Location: attendance.php');
}
else if ($user_dd==2) {
  // header('Location: msg.php');
  $class_name=$_SESSION['s_class'];
  $class_id=$_SESSION['s_cid'];
  $user_id=$_SESSION['s_id'];
}
else {
  header('Location: index.php');
}
?>

<?php
$stu_sql="SELECT * FROM `students` WHERE `s_id` = '$user_id'";
$res_stu=mysqli_query($conn,$stu_sql);
$row=mysqli_fetch_assoc($res_stu);

echo '


<div class="container mt-3">
<section class="section about-section gray-bg" id="about">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="about-text go-to">
                            <h3 class="dark-color">About Me</h3>
                            <h6 class="theme-color lead">'.$row['s_name'].'</h6>

                                <div class="row about-list">
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>Birthday</label>
                                        <p>'.$row['s_dob'].'</p>
                                    </div>
                                    <div class="media">
                                        <label>Age</label>
                                        <p>';
                                        
                                        $date=$row['s_dob'];
$from = new DateTime($date);
$to   = new DateTime('today');
echo $from->diff($to)->y.'
                                       
                                        
                                      Yr</p>
                                    </div>
                                    <div class="media">
                                        <label>class</label>
                                        <p>';

                                        $q1 = "SELECT * FROM students";
              $query1 = mysqli_query($conn, $q1);
              $result = mysqli_fetch_array($query1);
                 $s_class=$result["s_class"];
                $q2 = "SELECT * FROM class WHERE id ='$s_class'";
                $query2 = mysqli_query($conn, $q2);
                $result1 = mysqli_fetch_array($query2);
                  echo '<td>' . $result1["name"] . '</td>'.'
                
                                        
                                        
                                        </p>
                                    </div>
                                    <div class="media">
                                        <label>Gender</label>
                                        <p>'.$row['s_gender'].'</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>E-mail</label>
                                        <p>'.$row['s_email'].'</p>
                                    </div>
                                    <div class="media">
                                        <label>Phone</label>
                                        <p>'.$row['s_mobile'].'</p>
                                    </div>
                                    <div class="media">
                                        <label>Roll_no</label>
                                        <p>'.$row['s_roll'].'</p>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-avatar">
                            <img src="'.$row['s_image'].'" title="" alt="">
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </section>
</div>
';
?>

<?php
 $stu_allatt_sql = "SELECT * FROM `attendance` WHERE student_id='$user_id'";
 $result_stu_allatt=mysqli_query($conn,$stu_allatt_sql);
 $num_stu_allatt=mysqli_num_rows($result_stu_allatt);
 
 $stu_pre_sql="SELECT * FROM `attendance` WHERE `student_id` = '$user_id' AND `attendance_status` = 'Present'";
 $result_stu_att=mysqli_query($conn,$stu_pre_sql);
 $num_stu_att=mysqli_num_rows($result_stu_att);
 $att_per =$num_stu_att/$num_stu_allatt*100;

echo'
<div class="container">
<h2>Your Attendance</h2>
<div class="progress" style="height: 30px;">
  <div class="progress-bar progress-bar-striped" role="progressbar" style="width: '.$att_per.'%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">'.$att_per.'%</div>
</div>
</div>';
?>

<div class="container" style="margin-top:30px">
  <div class="card">
  	<div class="card-header text-white bg-dark">
      <div class="row">
        <div class="col-md-9">Attendance List</div>
        <div class="col-md-3" align="right">

        </div>
      </div>
    </div>

    
  	<div class="card-body">
  		<div class="table-responsive">
        <span id="message_operation"></span>
        <table class="table table-bordered table-dark" id="attendance_table">
          <thead>
            <tr>
              <th>Student Name</th>
              <th>Roll Number</th>
              <th>Class</th>
              <th>Attendance Status</th>
              <th>Attendance Date</th>
            </tr>
          </thead>
          <tbody>
          <?php
              $q1 = "SELECT * FROM `attendance` WHERE student_id='$user_id' ORDER BY `attendance`.`attendance_date` ASC ";
              $query1 = mysqli_query($conn, $q1);
              while ($result = mysqli_fetch_array($query1))
               {
                $student_id=$result["student_id"];
                $q2 = "SELECT * FROM students WHERE s_id='$student_id'";
                
                $query2 = mysqli_query($conn, $q2);
                while ($result1 = mysqli_fetch_array($query2)) {
                  echo '<tr><td>' . $result1["s_name"] . '</td>';
                  echo '<td>' . $result1["s_roll"] . '</td>';
                }
                echo '
                <td>' . $class_name. '</td>
                <td>' . $result["attendance_status"] . '</td>
                <td>' . $result["attendance_date"] . '</td></tr>';
                
                }
   ?>
          </tbody>
        </table>
  		</div>
  	</div>
  </div>
</div>
<?php
include "footer.php";
?>
</body>
</html>
<script src="js/jquery.min.js"></script>
<!-- <script src="js/bootstrap.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>

$(document).ready(function() {
    $('#attendance_table').DataTable();
} );
</script>
</body>
</html>