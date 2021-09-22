<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

session_start();
$_SESSION['retMes'] = "Unknown";

if (file_exists($target_file)) {
    unlink($target_file);
}
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $_SESSION['retMes'] = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
} else {
    $_SESSION['retMes'] = "Sorry, there was an error uploading your file.";
}
header("Location: fileserver.php");
?>
