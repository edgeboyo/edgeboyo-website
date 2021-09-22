<?php
	include("mysql_connect.php");
	$mysqli = msi_init();
	$qr = "INSERT INTO `Notes` (`Note`) VALUES ('" . $_POST["textToAdd"] . "')";
	$result = $mysqli->query($qr);
	header("Location: index.php");
?>