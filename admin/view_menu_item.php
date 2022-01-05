<?php
    require 'db.php';
?>
<html>
    <head>
            <meta charset="utf-8">
            
    <link rel="shortcut icon" href="/images/favicon-icon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="/images/apple-touch-icon.png">
    
    <title>Menu Items</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
  <a class="flex-sm-fill text-sm-center nav-link active" href="view_menu.php">Back</a>
  <a class="flex-sm-fill text-sm-center nav-link" href="add_menu.php">Add Menu</a>
</nav>
        <div class="empty">
        </div>
        <?php 
            $id = $_GET['type'];
            $q = mysqli_query($con,"select name from category where cid = $id");
            $r = mysqli_fetch_array($q);
            $n = $r[0];
        ?>
        <h2> <?php echo $n; ?> Details </h2>
        <div class="table-responsive">
            <table class="table">
			<tr>
				<th>NO </th>
				<th>Name</th>
				<th>Description</th>
				<th>Show Restaurant</th>
				<th>Show Takeaway</th>
				<th>Priority</th>
				<th>Price</th>
				<th>Update</th>
			</tr>
			<?php	
				//require 'db.php';
				$i = 1 ;
				$id = $_GET['type'];
				$exec = mysqli_query($con,"select * from menu where type= $id");

				while($r = mysqli_fetch_array($exec))
				{
				    $id = $r['cid'];
				    $q2 = "select * from menu where type = $id ";
				    $e = mysqli_query($con,$q2);
				    $prio = $r['priority'];
				    
				  
			?>
			<tr>
				<td><?php echo $i; $i++; ?></td>
				<td><?php echo $r['name']; ?></td>
				<td><?php echo $r['description'];   ?></td>
				<td><?php echo $r['restaurant_show']; ?></td>
				<td><?php echo $r['takeaway_show']; ?></td>
				<td><?php if($prio == 1) echo 'Highest'; else if($prio == 2) echo 'High'; else if($prio == 3) echo 'Medium'; else if($prio == 4) echo 'Low'; else if($prio == 5) echo 'Lowest'; ?></td>
				<td><?php echo $r['price']; ?></td>
				<td><a href="update_menu_item.php?mid=<?php echo $r['mid']; ?>">Update</a></td>
			</tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </body>
</html>