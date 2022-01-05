<?php
    require 'db.php';
    date_default_timezone_set('Asia/Kolkata');
    
    $today = date('Y-m-d');

    $query = "select * from takeaway_user order by date_time DESC";
    $exec = mysqli_query($con,$query);
?>
<html>
    <head>
            <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    <link rel="shortcut icon" href="/images/favicon-icon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="/images/apple-touch-icon.png">
    <title>Takeaway Previous Order</title>
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
  <a class="flex-sm-fill text-sm-center nav-link" href="view_takeaway_order.php">Booked Order</a>
  <a class="flex-sm-fill text-sm-center nav-link" href="view_takeaway_complete_order.php">Completed Order</a>
  <a class="flex-sm-fill text-sm-center nav-link" href="view_takeaway_cancelled_order.php">Cancelled Order</a>
  <a class="flex-sm-fill text-sm-center nav-link" href="view_previous_order.php">View Old Order</a>
</nav>
        <div class="empty">
        </div>
        <h2> Previous Order </h2>
        <div class="table-responsive">
            <table class="table">
                <tr> 
                    <th>No</th>
                    <th>Name </th>
                    <th>E-Mail </th>
                    <th>Mobile</th>
                    <th>Address </th>
                    <th>Date </th>
                    <th>Pickup Time</th>
                    <th>Total Bill</th>
                    <th>Payment Mode</th>
                    <th>Status</th>
                    <th>View Order </th>
                </tr>
                <?php   
                    while($r = mysqli_fetch_array($exec))
                    {
                        $tid = $r['tuid'];
                ?>
                <tr>
                    <td><?php echo $r['tuid']; ?></td>
                    <td><?php echo $r['name']; ?></td>
                    <td><?php echo $r['email']; ?></td>
                    <td><?php echo $r['mobile_no']; ?></td>
                    <td><?php echo $r['address']; ?></td>
                    <td><?php echo date('d/m/Y',strtotime($r['date_time'])); ?></td>
                    <td><?php echo date('h:i:s a',strtotime($r['time_of_delivery'])); ?></td>
                    <td><?php echo $r['total_bill']; ?></td>
                    <td><?php echo $r['payment_mode']; ?></td>
                    <td><?php if($r['status'] == 0) echo 'Confirmed, Not Picked Up'; else if($r['status'] == 1) echo 'Order Cancelled'; else if($r['status'] == 2) echo 'Order Completed';  ?></td>
                    <td><a href="view_order_details.php?tuid=<?php echo $r['tuid']; ?>" > View </a></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </body>
</html>