<?php
    require 'db.php';
    date_default_timezone_set('Asia/Kolkata');
    
    $id = $_GET['id'];
    
    if(isset($_POST['add'])){
        if($_POST['name'] != '' && $_POST['detail'] != '' && $_POST['price'] != ''){
            $name = $_POST['name'];
            $detail = $_POST['detail'];
            $price = $_POST['price'];
                
            $q = mysqli_query($con, "update banquet_menu_plan set name = '$name', menu = '$detail', price = '$price' where id = $id");
            if($q)
            {
                header("location:view_banquet_menu_plan.php");
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
    <title>Add Banquet Menu Plan</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" src="extensions/fixed-columns/bootstrap-table-fixed-columns.css">
        <link rel="stylesheet" href= "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"		integrity= "sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" /> 
    	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"			integrity= "sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"	crossorigin="anonymous"> 
    	</script> 
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"> 
    	</script> 
    	<script src= "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity= "sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"	crossorigin="anonymous"> </script>
        <script src="extensions/fixed-columns/bootstrap-table-fixed-columns.js"></script>
    <style>
			@import url('https://fonts.googleapis.com/css?family=Titillium+Web');
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
        	*{
            	font-family: 'Titillium Web', sans-serif;
        	}
			table, th, tr, td{
				text-align: center;
				padding: 5px;
				border-collapse : collapse;
			}
			table tr{
			    overflow: scroll;
			}
			table th{
				background-color: #efefef;
			}
			h1{
				text-align: center;
			}
			a{
				text-decoration: none;
			}
            a :: hover{
                text-decoration: underline;
            }
            
            h2{
                padding: 10px;
                text-align: center;
            }
            .empty{
                padding: 10px;
            }
            .src{
                text-align: center;
                padding: 10px; 
            }
            .men
            {
                width: 95%;
                margin: 3%;
            }
        </style>
    </head>
    <body>    
    
    <nav class="nav nav-pills flex-column flex-sm-row">
          <a class="flex-sm-fill text-sm-center nav-link active" href="admin-panel.php">Home</a>
          <a class="flex-sm-fill text-sm-center nav-link" href="view_banquet_book.php">Booked Order</a>
          <a class="flex-sm-fill text-sm-center nav-link" href="view_completed_order.php">Completed Order</a>
          <a class="flex-sm-fill text-sm-center nav-link" href="view_cancelled_order.php">Cancelled Order</a>
    </nav>
       
       <div class="men">
           <h2> Update Plan </h2>
           <?php 
            require 'db.php';
                $q = mysqli_query($con, "select * from banquet_menu_plan where id = $id");
                $r = mysqli_fetch_array($q);
            ?>
            <form method="post" action="#">
                <div class="form-group">
                    <label>Plan Name </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="<?php echo $r['name']; ?>" required>
                </div>    
                <div class="form-group">
                    <label for="exampleInputEmail1">Plan Details</label>
                    <textarea name="detail" class="form-control" id="exampleInputEmail1" required><?php echo $r['menu'];  ?></textarea>
                </div>
                <div class="form-group">
                    <label>Price  </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="price" value="<?php echo $r['price']; ?>" required>
                </div>
                <center><button class="btn btn-primary" name="add">Update</button></center>
            </form>
       </div>
        
    </body>
</html>
