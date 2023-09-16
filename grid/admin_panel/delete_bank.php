<?php

    require_once("connection.php");
    $Id = $_GET["id"];
    $delete = "DELETE FROM `add_bank` WHERE id = '$Id'";
    mysqli_query($conn,$delete);
    header("location:manage_bank.php");

?>
