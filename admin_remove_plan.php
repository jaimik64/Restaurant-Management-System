<?php
    require 'db.php';
    
    $mid = $_GET['mbid'];

    $exec = mysqli_query($con,"delete from banquet_plans where mbid = $mid ");

    if($exec)
        header("location:admin_display_plan.php");
    else    
        echo mysqli_error($con);
?>