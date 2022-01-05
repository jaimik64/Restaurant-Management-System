<?php
    require 'db.php';
    
    $mid = $_GET['mid'];

    $exec = mysqli_query($con,"delete from menu where mid = $mid ");

    if($exec)
        header("location:view_menu.php");
    else    
        echo mysqli_error($con);
?>