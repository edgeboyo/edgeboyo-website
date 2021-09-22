<?php
$target_dir = "uploads/";
$target_file = $target_dir . $_POST["filename"];

echo $_POST["filename"];
echo " removed<br>";
unlink($target_file);
die("<a href='fileserver.php'>GO BACK</a>");
?>
