<head>
	<title>Notepad</title>
</head>
<body style="background-color: white">
<?php
	include("mysql_connect.php");
	$mysqli = msi_init();
	$qr = "SELECT * FROM Notes";
	$result = $mysqli->query($qr);
	while($row = $result->fetch_assoc()){
        $word = $row['Note'];
        echo $row["ID"] . ") <a href='" . $word . "'>" . $row["Note"] . "</a><br><br>";
	}
	echo "End notes!";
?>
<br>
<dir> Insert new note! </dir>
<form action='insert.php' method='post' enctype='multipart/form-data'>
    Select note to add:
    <input type='text' name='textToAdd' id='textToAdd'>
    <input type='submit' value='Upload file' name='submit'>
</form>

<br>

<h5> DATA REMOVAL!</h5>

<form action="rem.php" method='post'>
	Input master password: <br>
	<input type='password' name='passcode' id='passcode'> <br>
	Input ID to remove: <br>
	<input type='text' name='IDtoRemove' id='IDtoRemove'> <br>
	<input type='hidden' name='removeAll' value='smallREM'>
	<input type='checkbox' name='removeAll' value='bigREM'> Remove all data <br>
	<input type='submit' value="Submit">
</form>

</body>

