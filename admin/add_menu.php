<?php
	if(isset($_POST['submit']))
	{
		require 'db.php';

		$name = $_POST['name'];
		$desc = $_POST['description'];
		$priority = $_POST['priority'];
		$restaurant = $_POST['restaurant'];
		$takeaway  = $_POST['takeaway'];
		$type = $_POST['type'];
		$price = $_POST['price'];

		//$filename = $_FILES['img']['name'];
		//$temp_file = $_FILES['img']['tmp_name'];

		//$folder = "menu/".$filename;
		//move_uploaded_file($temp_file,$folder);
		
		$cat_id = mysqli_query($con,"select cid from category where name='$type'");
		$r5 = mysqli_fetch_array($cat_id);
		$tid = $r5[0];
		
			if($name != '' && $price != '' && ($priority == 1 || $priority == 2 || $priority == 3 || $priority == 4 || $priority == 5 ) && ($takeaway == 'YES' || $takeaway == 'NO') && ($restaurant == 'YES' || $restaurant == 'NO') )
			{
				$query = "insert into menu (name,image,	description,priority, restaurant_show,takeaway_show,price,type)
						values('$name','','$desc',$priority,'$restaurant','$takeaway',$price,$tid)";
				$exec = mysqli_query($con,$query);
	
				if(!($exec)){
					echo myslqi_error($con);
				}
				else{
				    //header("location:view_menu.php");
				    echo '1';
				}
			}
			
			else{
				echo 'Enter Correct Value';
			}
 	}
?>
<html>
   	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="/images/favicon-icon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="/images/apple-touch-icon.png">
    <title>Add Menu Item</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
		   <h2> Add New Plan</h2>
   		<form enctype="multipart/form-data" method="post" action="#">
			<div class="form-group">
				<label>Product Name</label>
				<input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Product name" required />
			</div>   
			<div class="form-group">
				<label>Price</label>
				<input type="text" class="form-control" id="exampleInputEmail1" name="price" placeholder="Price" required />
			</div>
			   
			<div class="form-group">
				<label>Description</label>
				<input type="text" class="form-control" id="exampleInputEmail1" name="description" placeholder="Description" />
			</div>
   			<div class="form-group">
			    <select name = "type" class="custom-select d-block form-control" required>
    				<option disabled selected>Select Type/ Category </option>
    				<?php
    				    require 'db.php';
    				    $cat = mysqli_query($con,"select * from category ");
    				    while($r = mysqli_fetch_array($cat)){
    				?>
    				<option> <?php echo $r['name']; ?> </option>
    				<?php } ?>
			    </select>
			</div>
			<div class="form-group">
			    <select name = "priority" class="custom-select d-block form-control" required>
    				<option disabled selected>Set Priority </option>
    				<option> 1 </option>
    				<option> 2 </option>
    				<option> 3 </option>
    				<option> 4 </option>
    				<option> 5 </option>
			    </select> 
			</div>
			<div class="form-group">
			    <select name = "restaurant" class="custom-select d-block form-control" required>
    				<option disabled selected>Set Visible to restaurant</option>
    				<option> YES </option>
    				<option> NO </option>
    			</select> 	
			</div>
			<div class="form-group">
    			 <select name = "takeaway" class="custom-select d-block form-control" required>
    				<option disabled selected>Set Visible to takeaway</option>
    				<option> YES </option>
    				<option> NO </option>
			    </select>
			</div>
   			<button style="margin-left: 45%;" class="btn btn-primary" name="submit">Add Plan</button>
   		</form>
   	</body>
</html>
