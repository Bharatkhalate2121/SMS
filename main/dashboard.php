<?php require 'database_connection.php'; ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="js/bootstrap.min.css">
    <title>SMS</title>
  </head>
  <style>
        /* Custom CSS styling */
        body {
            background-color: #f8f9fa;
        }

        .dashboard {
            padding: 20px;
        }

        .cards {
            margin-top: 50px;
        }

        .card__items {
            padding: 20px;
            border-radius: 10px;
            color: white;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .card__items:hover {
            background-color: rgba(0, 0, 0, 0.1);
        }

        .card__items--blue {
            background-color: #007bff;
        }

        .card__items--rose {
            background-color: #ff3366;
        }

        .card__items--gradient {
            background: linear-gradient(to right, #ff7e5f, #feb47b);
        }

        .card__students,
        .card__Course,
        .card__users {
            display: inline-block;
            flex-direction: column;
            align-items: center;
            gap: 5px;
        }

        .card__nbr-students,
        .card__nbr-course {
            margin-top: 15px;
        }

        .h5 {
            font-size: 35px;
        }

        @media (max-width: 768px) {
            .card__items {
                margin-bottom: 20px;
            }
        }
        
        h1 {
            text-align: center;
            margin-top: 50px;
        }

        p {
            text-align: center;
            font-size: 18px;
        }

        .student-count {
            display: inline-block;
            font-size: 48px;
            font-weight: bold;
            color: #007bff;
            margin-top: 20px;
            text-align: center;
            margin-left: 540px;
        }
    </style>
	<?php
     session_start();
	include 'nav.php';
	
	?>
	<body>

	
    <main class="dashboard d-flex">
        <!-- start sidebar -->

        <?php 
            include "database_connection.php";
          
            $nbr_students = $conn->query("SELECT * FROM students");
          
            $nbr_students = $nbr_students->num_rows;
            $nbr_cours = $conn->query("SELECT * FROM `class` ORDER BY `name` ASC");
           
           
            $nbr_cours = $nbr_cours->num_rows;
            $nbr_teachers = $conn->query("SELECT * FROM teachers");
            $nbr_teachers = $nbr_teachers->num_rows;



        ?>
        <!-- end sidebar -->

        <!-- start content page -->
        <div class="container-fluid px">
        <?php 
        ?>
            <div class="cards row gap-3 justify-content-center mt-5">
                <div class=" card__items card__items--blue col-md-3 position-relative">
                    <div class="card__students d-flex flex-column gap-2 mt-3">
                        <i class="far fa-graduation-cap h3"></i>
                        <span>Students</span>
                    </div>
                    <div class="card__nbr-students">
                        <span class="h5 fw-bold nbr"><?php echo $nbr_students; ?></span>
                    </div>
                </div>

                <div class=" card__items card__items--rose col-md-3 position-relative">
                    <div class="card__Course d-flex flex-column gap-2 mt-3">
                        <i class="fal fa-bookmark h3"></i>
                        <span>Course</span>
                    </div>
                    <div class="card__nbr-course">
                        <span class="h5 fw-bold nbr"><?php echo $nbr_cours; ?></span>
                    </div>
                </div>

              
                <div class="card__items card__items--gradient col-md-3 position-relative">
                    <div class="card__users d-flex flex-column gap-2 mt-3">
                        <i class="fal fa-user h3"></i>
                        <span>Teachers</span>
                    </div>
                    <br>
                    <span class="h5 fw-bold nbr"><?php echo $nbr_teachers; ?></span>
                </div>
                <div class="card__items card__items--gradient col-md-3 position-relative">
                    <div class="card__users d-flex flex-column gap-2 mt-3">
                        <i class="fal fa-user h3"></i>
                        <span><a href="/feedback/mainpage.php"> Feedback</a></span>
                    </div>
                    <br>
                    
                </div>
            </div>

        </div>
        <!-- end contentpage -->
    </main>
    <script src="../js/script.js"></script>
    
    <h1>Number of Students Studied</h1>
    <p>The total number of students studied on our website is:</p>
    <span class="student-count"> <center>9,745</center></span>
    <h1>Number of Techers teched</h1>
    <p>The total number of teachers teached on our website is:</p>
    <span class="student-count"> <center>9,98</center></span>
	</body>
</html>
