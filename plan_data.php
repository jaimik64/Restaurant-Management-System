<?php 
   require 'db.php';

   $name = $_POST['plan'];
   $price = $_POST['price'];
   $feature = $_POST['feature'];
  
   $filename = $_FILES["image1"]["name"];
   $temp_file = $_FILES["image1"]["tmp_name"];

   $folder = "plan_image/".$filename;


   move_uploaded_file($temp_file,$folder);
   
   if($name != '' && $price != '' && $feature != '' && $filename != '')
   {
   		$query = "insert into banquet_plans(feature_list,plan_name,price,img) values('$feature','$name','$price','$folder')";
   		$exec = mysqli_query($con,$query);
   		
   		if($exec)
   		   header("location:admin_display_plan.php");
   		else 
             echo mysqli_error($con);
   }
   
?>