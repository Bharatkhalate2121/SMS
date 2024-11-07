<html>
<head>
<?php include 'con.php';?>
<style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            margin-top: 20px;
        }
    </style>
</head>

<body>
<form method="post" enctype="multipart/form-data" >
<input type="text" name="name" id="name" required>
<input type="file" name="file" id="file" required>
<input type="submit" name="submit" value="submit">
</form>


<?php
//include 'con.php';
echo"upload logic";

if(isset($_POST["submit"]))
{
        $temp = explode(".", $_FILES["file"]["name"]);
        $newfilename = $_POST['name'];
        $destinationfile = 'test/' . $newfilename;
	$sql_query = "INSERT INTO `fname`( `name`) VALUES ('$newfilename')";
	try {
	 mysqli_query($conn, $sql_query);
	}
	catch(Exception $e) {
  	echo '<script>alert("Filename already exists. Try with another name.");</script>';
        exit();
	}

    // Move the uploaded file to the destination directory
    move_uploaded_file($_FILES["file"]["tmp_name"], $destinationfile);

$fileContent = file_get_contents($destinationfile);

$hash = hash('sha256', $newfilename);

 // Split the file content into three parts
    $fileLength = strlen($fileContent);
    $fileParts = [];
    if ($fileLength > 0) {
    $partLength = ceil($fileLength / 3);
    $fileParts[] = substr($fileContent, 0, $partLength);
    $fileParts[] = substr($fileContent, $partLength, $partLength);
    $fileParts[] = substr($fileContent, $partLength * 2);
}
    // Create three output files and write the file parts to them
    $outputFile1 = fopen('test1/'.$hash . '.txt', 'w');
    fwrite($outputFile1, $fileParts[0]);
    fclose($outputFile1);

    $outputFile2 = fopen('test2/'.$hash . '.txt', 'w');
    fwrite($outputFile2, $fileParts[1]);
    fclose($outputFile2);

    $outputFile3 = fopen('test3/'.$hash . '.txt', 'w');
    fwrite($outputFile3, $fileParts[2]);
    fclose($outputFile3);
    unlink($destinationfile);
    echo '<script>alert("File uploaded successfully.");</script>';
    
    // Generate the hash of the first output file
   // $outputFile1Content = file_get_contents('test1/output1.txt');
   // $hash = hash('sha256', $outputFile1Content);
    
    // Move the output file with the hash to another folder
   // $newFilePath = 'test1/' . $hash . '.txt';
   // rename('test1/output1.txt', $newFilePath);

}

?>

<form method="post" enctype="multipart/form-data">
    <select name="filename" required>
        <option value="" disabled selected>Select File</option>
        <?php
        $query = "SELECT name FROM fname";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
            echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
        }
        ?>
    </select>
    <input type="submit" name="download" value="Download">
</form>
            }
if (isset($_POST["download"])) {

$filename=$_POST['name'];
echo $filename;

$joinedFile = fopen('joined.txt', 'w');

// Open each part file and append its content to the joined file
$part1 = fopen('output1.txt', 'r');
fwrite($joinedFile, fread($part1, filesize('output1.txt')));
fclose($part1);

$part2 = fopen('output2.txt', 'r');
fwrite($joinedFile, fread($part2, filesize('output2.txt')));
fclose($part2);

$part3 = fopen('output3.txt', 'r');
fwrite($joinedFile, fread($part3, filesize('output3.txt')));
fclose($part3);

// Close the joined file handle
fclose($joinedFile);

  
    $filename = $_POST["filename"];
    $filepath = 'test/' . $filename;
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        readfile($filepath);
        exit;
    }
}
          ?>

</body>
</html>






