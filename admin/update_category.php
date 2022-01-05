<?php
	if(isset($_POST['submit']))
	{
		require 'db.php';
        $id = $_GET['type'];
        
       $n = $_POST['name'];
       $filename = $_FILES["image1"]["name"];
       $temp_file = $_FILES["image1"]["tmp_name"];
    
       $folder = "menu_img/".$filename;
    
        if($n != '' && $folder != ''){
            
            move_uploaded_file($temp_file,$folder);
            $q = "update category set name = '$n' , img = '$folder' where cid = $id";
            $ex = mysqli_query($con,$q);
            if($ex){
                header("location:view_menu.php");
            }
            else{
                echo mysqli_error($con);
            }
        }
  
	
 	}
?>
<html>
   	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="/images/favicon-icon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="/images/apple-touch-icon.png">
    <title>Update Category</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<style>
			.form-group{
				margin-left:20%;
				margin-right:20%;
			}
			.custom-file{
                margin-right: 20%;
                margin-left: 20%;
            }
			h2{
				text-align: center;
				padding-bottom: 5%;
				padding-top: 2%;	
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
   	</head>
   	<body>
   	     <nav class="nav nav-pills flex-column flex-sm-row">
  				<a class="flex-sm-fill text-sm-center nav-link active" href="view_menu.php">Back</a>
		  </nav>
		   <h2> Update Category Details</h2>
   		<form enctype="multipart/form-data" method="post" action="#">
   		    <?php
   		        require 'db.php';
   		        $id = $_GET['type'];
   		        $q = mysqli_query($con,"select * from category where cid = $id");
   		        
   		        while($r = mysqli_fetch_array($q)){
   		    ?>
			<div class="form-group">
				<label>Category Name</label>
				<input type="text" class="form-control" id="exampleInputEmail1" name="name" value="<?php echo $r['name']; ?>" placeholder="Product name" required />
			</div>   
			   <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="image1" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>
   			<button style="margin-left: 45%;" class="btn btn-primary" name="submit">Add Plan</button>
   			<?php } ?>
   		</form>
   	</body>
</html>
