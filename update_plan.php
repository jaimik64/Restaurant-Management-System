<?php
    require 'db.php';

    $id = $_GET['mbid'];

    $exec = mysqli_query($con,"select * from banquet_plans where mbid = $id");

    if(mysqli_num_rows($exec))
    {    
?>
<html>
        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="images/favicon-icon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <title>Update Banquet Plan</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </head>
        <style>
            h2{
                padding: 10px; 
                text-align: center;
            }
            .form-group{
                margin-right: 20%;
                margin-left: 20%;
            }
            .custom-file{
                margin-right: 20%;
                margin-left: 20%;
            }
            .nav{
				background-color: blue;
				color: white;
				font-size: 24px;
				width: 100%;
			}
			.nav a{
				color: white;
				font-size: 24px;
				text-decoration: none;
				padding : 10px;
			}
        </style>

        <?php   
            while($r = mysqli_fetch_array($exec))
            {  
        ?>
        <body>
            <nav class="nav nav-pills flex-column flex-sm-row">
  				<a class="flex-sm-fill text-sm-center nav-link active" href="/admin_display_plan.php">Back</a>
  				<a class="flex-sm-fill text-sm-center nav-link" href="/admin_plan.html">Add Plan</a>
		  </nav>
            <h2> Update Plan Details </h2>
            <form method="post" action="#" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Plan Name </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="plan" value="<?php echo $r['plan_name']; ?>" required />
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="price" value="<?php echo $r['price']; ?>" required />
                </div>
                <div class="form-group">
                    <label>Feature List</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="feature" value="<?php echo $r['feature_list']; ?>" required /><br>
                </div>
                <div class="form-group">
                    <img src="<?php echo $r['img']; ?>" class="img-fluid" alt="Responsive image">
                    <p> <b>Note : </b> Current Image</p>
                </div>
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="image1" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>
                <button style="margin-left:40%;" type="submit" name="update" value="Update Plan"  class="btn btn-primary"> Update plan </button>
                <?php   
                                    }
                }
                ?>
           </form>
        <?php

            if(isset($_POST['update']))
            {
                    
                $name = $_POST['plan'];
                $price = $_POST['price'];
                $feature = $_POST['feature'];

                if(isset($_FILES['image1']['name']) && ($_FILES['image1']['name'] != "")){
                    $filename = $_FILES['image1']['name'];
                    $temp_file = $_FILES['image1']['tmp_name'];                   

                    $folder = "plan_image/".$filename;
                    
                    $exec1 = mysqli_query($con,"select * from banquet_plans where mbid = $id");
                    while($r = mysqli_fetch_array($exec1)){
                        $f = $r['img'];

                        if($f != $folder)
                        {
                            move_uploaded_file($temp_file,$folder);
                            $exec2 = mysqli_query($con,"update banquet_plans set plan_name = '$name', price = $price, feature_list = '$feature',img = '$folder' where mbid = $id");

                            if($exec2)
                                echo '<script>alert("Plan Updated")</script>';
                            else
                                echo mysqli_error($con);
                        }
                    }
                }
                else{
                    $exec2 = mysqli_query($con,"update banquet_plans set plan_name = '$name', price = $price, feature_list = '$feature' where mbid = $id");
                    
                    if($exec2)  
                        echo '<script>alert("Plan Updated")</script>';
                    else
                        echo mysqli_error($con);
                }     
            }
        ?>
        </body>
</html>