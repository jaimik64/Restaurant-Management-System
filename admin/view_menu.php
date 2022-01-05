<?php
    require 'db.php';
?>
<html>
    <head>
            <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <link rel="shortcut icon" href="/images/favicon-icon.png" type="image/x-icon">
        <link rel="apple-touch-icon" href="/images/apple-touch-icon.png">
        
        <title>Menu</title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
            .empty{
                padding: 10px;
            }
            h2{
                padding: 10px;
                text-align: center;
            }
        </style>
    </head>
    <body>    
    
    <nav class="nav nav-pills flex-column flex-sm-row">
  <a class="flex-sm-fill text-sm-center nav-link active" href="admin-panel.php">Home</a>
  <a class="flex-sm-fill text-sm-center nav-link" href="add_menu.php">Add Menu</a>
  <a class="flex-sm-fill text-sm-center nav-link" href="add_category.php" >Add Category</a>
</nav>
        <div class="empty">
        </div>
        <h2> Menu Details </h2>
        <div class="table-responsive">
            <table class="table">
			<tr>
				<th>NO </th>
				<th>Image</th>
				<th>Category Name</th>
				<th>Total Products</th>
				<th>View</th>
				<th>Update</th>
			</tr>
			<?php	
				require 'db.php';
				$i = 1 ;
				$exec = mysqli_query($con,"select * from category");

				while($r = mysqli_fetch_array($exec))
				{
				    $id = $r['cid'];
				    $q2 = "select * from menu where type = $id ";
				    $e = mysqli_query($con,$q2);
				    
				  
			?>
			<tr>
				<td><?php echo $i; $i++; ?></td>
				<td><img src="<?php echo $r['img']; ?>"  height = "200" width="200" alt="Image Not Available"/></td>
				<td><?php echo $r['name']; ?></td>
				<td><?php     echo mysqli_num_rows($e);  ?></td>
				<td><a href="view_menu_item.php?type=<?php echo $id; ?>">View</a></td>
				<td><a href="update_category.php?type=<?php echo $id; ?>" >Update</a></td>
			</tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </body>
</html>