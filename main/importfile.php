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
	<?php
     session_start();
	include 'nav.php';
	
	?>
	<body>

	<div class="container md-5 col-6 d-flex justify-content-center" style="margin-top: 50px;">

		<form class="" action="" method="post" enctype="multipart/form-data">
			<input type="file" name="excel" required value="">
			<button type="submit" name="import">Import</button>
		</form>
		
		<?php
		if(isset($_POST["import"])){
			$fileName = $_FILES["excel"]["name"];
			$fileExtension = explode('.', $fileName);
      $fileExtension = strtolower(end($fileExtension));
			$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

			$targetDirectory = "uploads/" . $newFileName;
			move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

			error_reporting(0);
			ini_set('display_errors', 0);

			require 'excelReader/excel_reader2.php';
			require 'excelReader/SpreadsheetReader.php';

			$reader = new SpreadsheetReader($targetDirectory);
			foreach($reader as $key => $row){
				$roll = $row[0];
				$name = $row[1];
				$gender = $row[2];
				$dob = $row[3];
				$class = $row[4];
				$mob = $row[5];
				$mail = $row[6];
				$pass = $row[7];
				$img = $row[8];

				$sql="INSERT INTO `students` (`s_id`, `s_roll`, `s_name`, `s_gender`, `s_dob`, `s_class`, `s_mobile`, `s_email`, `s_password`, `s_image`) VALUES (NULL, '$roll', '$name', '$gender', '$dob', '$class', '$mob', '$mail', '$pass', '$img')";
				$result=mysqli_query($conn,$sql);
			}

			if($result)
			{
			echo
			"
			<script>
			alert('Succesfully Imported');
			document.location.href = '';
			</script>
			";
			}
		}
		?>
		</div>

		<script src="js/bootstrap.bundle.min.js"></script>

	</body>
</html>
