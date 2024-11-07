<?php
include 'con.php';
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