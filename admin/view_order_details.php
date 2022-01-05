<?php
    require 'db.php';
    $tuid = $_GET['tuid'];
    $i = 1;
    $exec = mysqli_query($con,"select * from food_order where userid = $tuid");
    
?>
<html>
    <head>
            <meta charset="utf-8">
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
  <a class="flex-sm-fill text-sm-center nav-link active" href="index.php">Home</a>
  <a class="flex-sm-fill text-sm-center nav-link" href="view_takeaway_order.php">Booked Order</a>
  <a class="flex-sm-fill text-sm-center nav-link" href="view_completed_order.php">Completed Order</a>
  <a class="flex-sm-fill text-sm-center nav-link" href="view_cancelled_order.php">Cancelled Order</a>
</nav>
        <div class="empty">
        </div>
        <h2> Order Details </h2>
        <div class="table-responsive">
            <table class="table">
                <tr> 
                    <th>No</th>
                    <th>Name </th>
                    <th>Description </th>
                    <th> Quantity </th>
                </tr>
                <?php    
                    $item = 0;
                    while($row = mysqli_fetch_array($exec)){
                        $pid = $row['mid'];
                        $ex1 = mysqli_query($con,"select * from menu where mid =$pid ");
                        while($r = mysqli_fetch_array($ex1)){
                    
                ?>
                <tr>
                    <td><?php echo $i; $i++; ?></td>
                    <td><?php echo $r['name']; ?></td>
                    <td><?php echo $r['description']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                        </tr>
                <?php
                    }
                    $item = $row['quantity'] + $item;
                }
                ?>
                <tr>
                        <th colspan="2"></th>
                        <th> Total Items </th>
                        <td><?php echo $item; ?></td>
                </tr>
            </table>
        </div>
    </body>
</html>