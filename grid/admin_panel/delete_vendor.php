
<?php

    session_start();
    if(!isset($_SESSION["set"]) && $_SESSION["set"] != "true")
    {
        header('location:index.php');
    }
    else
    {
        require_once("connection.php");
        $Id = $_GET["id"];
        $delete = "DELETE FROM `user` WHERE id = '$Id'";
        mysqli_query($conn,$delete);
        header("location:manage_vendor.php");
    }

?>
