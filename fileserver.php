<!DOCTYPE html>
<html>
<head>
<title>PRI1</title>
</head>
<body>
<h1>Testing grounds!</h1>

<a href='uploads/'>DUMP</a><br>

<?php
    include 'mysql_connect.php';
    session_start();
    if(isset($_SESSION['retMes'])){
	echo "<p>" . $_SESSION['retMes'] . "</p>";
	$_SESSION['retMes'] = NULL;
    }
    $mysqli = msi_init();
    $date = date('Y-m-d', time());
    $qry="DELETE FROM Allowed_IP WHERE LOG_DAY < \"" . $date . "\"";
    $result = $mysqli->query($qry);
    $qry="SELECT * FROM Allowed_IP";
    $result = $mysqli->query($qry);
    $flag = 0;
    while($row = $result->fetch_assoc()){
        if ($_SERVER['REMOTE_ADDR'] == $row["IP"]){
			echo '<h3>Add a new file!</h3>';
			echo "<form action='upload.php' method='post' enctype='multipart/form-data'>
					Select file to upload:
					<input type='file' name='fileToUpload' id='fileToUpload'>
					<input type='submit' value='Upload file' name='submit'>
				</form><br/>";
			echo '<h3>Remove file!</h3>';
            echo '<form action="delete.php" method="post" enctype="multipart/form-data">
                    Input file name:
                    <input type="text" name="filename"><br>
                    <input type="submit" value="Remove file" name="submit">
                </form>';
            $flag=1;
            break;
        }
        echo "<br>";
    }
    if($flag == 0){
        echo '<a href="login.html">GOTO LOGIN</a>';
    }
?>
    
<br> <br>
<?php
    $mysqli = msi_init();
    $qry="SELECT * FROM Allowed_IP";
    $result = $mysqli->query($qry);
    if ($result->num_rows==0){
        echo "No users logged in.";
    }
    else{
        echo "Logged users:<br>";
        while($row = $result->fetch_assoc()){
            echo $row["IP"];
            if ($row["IP"] == $_SERVER['REMOTE_ADDR']){
                echo " (YOU!)";
            }
            echo "<br>";
        }
    }
?>
<br> <br>
</body>
</html>

<!--HI-->
