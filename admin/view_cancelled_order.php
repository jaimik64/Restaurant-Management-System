<?php
    require 'db.php';
    date_default_timezone_set('Asia/Kolkata');
    $query = "select * from banquet_booking_user  where status = 3 order by date DESC";
    $exec = mysqli_query($con,$query);
    if($exec){
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="/images/favicon-icon.png" type="image/x-icon">
        <link rel="apple-touch-icon" href="/images/apple-touch-icon.png">
        <title>View Cancelled Order</title>
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
            h2{
                text-align: center;
                padding: 10px;
            }.empty{
                padding: 10px;
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
        <div class="empty">
        </div>
        <h2> Cancelled Order </h2>
        <div class="table-responsive">
            <table class="table">
                <tr> 
                    <th>BBID</th>
                    <th>Name </th>
                    <th>email </th>
                    <th>phone</th>
                    <th>Address </th>
                    <th>Reason </th>
                    <th>Booked Date & Time</th>
                    <th>Time</th>
                    <th>End Time</th>
                    <th>Date</th>
                    <th>Extra Service</th>
                    <th>Total Bill </th>
                    <th>Remaining Payment </th>
                </tr>
                <?php   
                while($r = mysqli_fetch_array($exec))
                {
                    $t = date('h:i a',strtotime($r['time']));
                    $e = date('h:i a',strtotime($r['end_time']));
                ?>
                <tr>
                    <td><?php echo $r['Bbid']; ?></td>
                    <td><?php echo $r['name']; ?></td>
                    <td><?php echo $r['email']; ?></td>
                    <td><?php echo $r['phone']; ?></td>
                    <td><?php echo $r['address']; ?></td>
                    <td><?php echo $r['reason_to_book']; ?></td>
                    <td><?php echo date('d/m/Y h:i:s A',strtotime($r['booking_date'])); ?></td>
                    <td><?php echo $t; ?></td>
                    <td><?php echo $e; ?></td>
                    <td><?php echo date('d/m/Y',strtotime($r['date'])); ?></td>
                    <td><?php echo $r['extra_services']; ?></td>
                    <td><?php echo number_format($r['total_bill']); ?></td>
                    <td><?php echo number_format($r['remaining_payment']); ?></td>
                </tr>
                <?php
                        }   
                    }
                    else
                        echo mysqli_error($con);
                ?>
            </table>
        </div>
</body>
</html>
