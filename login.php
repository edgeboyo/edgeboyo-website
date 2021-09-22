<?php
    include 'mysql_connect.php';
    $back = "<a href='login.html'>GO BACK</a>";
    $mysqli = msi_init();
    $qr = "SELECT * FROM Users WHERE";
    $qr = $qr . ' CLEARED = 1 AND USER = "' . $_POST["username"] . '"';
    $result = $mysqli->query($qr);
    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        $passhash = crypt($_POST["passin"], "twelvepageessayofunknownorigin");
        if($passhash == $row["PASSHASH"]){
            $date = date('Y-m-d', time());
            $qr = 'INSERT INTO Allowed_IP VALUES ("' . $_SERVER['REMOTE_ADDR'] . '", "' . $date . '")';
            $mysqli->query($qr);
            header("Location: fileserver.php");
            die("We did the do!");
        }
        die("Password incorrect! " . $back);
    }
    die("Not a cleared username! " . $back);
?>
