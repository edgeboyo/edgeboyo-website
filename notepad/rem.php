<?php
    if($_POST["passcode"] != "jimbo"){
        header("Location: index.php");
    }
    else {
        include("mysql_connect.php");
        $mysqli = msi_init();
        //echo $_POST["removeAll"];
        if($_POST["removeAll"] == "bigREM"){
            $result = $mysqli->query("TRUNCATE TABLE Notes");
        }
        else if ($_POST["removeAll"] == "smallREM"){
            //echo $_POST["IDtoRemove"];
            $result = $mysqli->query("DELETE FROM Notes WHERE ID = " . $_POST["IDtoRemove"]);
        }
        //$result = $mysqli->query("TRUNCATE TABLE Notes");
        header("Location: index.php");
    }
?>