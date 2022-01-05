<?php
    require 'db.php';
    date_default_timezone_set('Asia/Kolkata');
    $query = "select * from banquet_booking_user where status = 1 order by booking_date DESC";
    $exec = mysqli_query($con,$query);
?>
<html>
    <head>
            <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="/images/favicon-icon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="/images/apple-touch-icon.png">
    <title>Banquet Booked Order</title>
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
        </style>
    </head>
    <body>    
    
    <nav class="nav nav-pills flex-column flex-sm-row">
          <a class="flex-sm-fill text-sm-center nav-link active" href="admin-panel.php">Home</a>
          <a class="flex-sm-fill text-sm-center nav-link" href="view_banquet_book.php">Booked Order</a>
          <a class="flex-sm-fill text-sm-center nav-link" href="view_completed_order.php">Completed Order</a>
          <a class="flex-sm-fill text-sm-center nav-link" href="view_cancelled_order.php">Cancelled Order</a>
    </nav>
        <div class="src">
            <form method="post" action="#">
                <label>Select Date to find order</label>
                <input type="date" name="d" style="margin-right: 10px;"/> OR
                <input type="text" name="user" placeholder="Enter Booking Name" style="margin-left: 10px;"/>
                <input type="submit" name="src" value="Search"/>
            </form>
        </div>
        <div class="empty">
        </div>
        
        <?php
            if(isset($_POST['src'])){
                
                $date = $_POST['d'];
                $name = $_POST['user'];
                $query = mysqli_query($con,"select * from banquet_booking_user where (date = '$date ' OR name = '$name') AND status = 1 ");
                if(mysqli_num_rows($query) > 0){
        ?>  
        <h2> Searched Order </h2>
        <div class="table-responsive">
            <table class="table">
              <thead>
                  <tr> 
                    <th>No</th>
                    <th>Name </th>
                    <th>E-Mail </th>
                    <th>Mobile</th>
                    <th>Address </th>
                    <th> Reason </th>
                    <th>Booked Date & Time</th>
                    <th>Time</th>
                    <th>End Time</th>
                    <th>Date</th>
                    <th>Plan</th>
                    <th>Menu </th>
                    <th>No. Of Person</th>
                    <th>Extra Service</th>
                    <th>Total Bill </th>
                    <th>Remaining Payment </th>
                    <th>Update </th>
                    <th>View Menu</th>
                    <th>Cancel Booking </th>
                    <th>Complete Payment </th>
                </tr>
              </thead> 
              <tbody>
            <?php
                    while($r = mysqli_fetch_array($query)){
                     
                        $mbid = $r['mbid'];
                        $query1 = "select * from banquet_plans where mbid= $mbid";
                        $exec1 =mysqli_query($con,$query1);
                        $r1 = mysqli_fetch_array($exec1);
                
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
                    <td><?php echo $r1['plan_name']; ?></td>
                    <td>₹ <?php echo $r['menu_plan'];?></td>
                    <td><?php echo $r['person']; ?></td>
                    <td><?php echo $r['extra_services']; ?></td>
                    <td>₹ <?php echo number_format($r['total_bill']); ?></td>
                    <td>₹ <?php echo number_format($r['remaining_payment']); ?></td>
                    <td><a href="update_banquet_user.php?Bbid=<?php echo $r['Bbid']; ?>"> Update </a></td>
                    <td><a href="view_banquet_menu.php?Bbid=<?php echo $r['Bbid']; ?>">View </a></td>
                    <td><a href="delete_banquet_user.php?Bbid=<?php echo $r['Bbid']; ?>"> Delete </a></td>
                    <td><a href="complete_banquet_pay.php?Bbid=<?php echo $r['Bbid']; ?>"> Pay </a></td>
                </tr>
        
        <?php 
                    }}
                    else{
                        echo '<h2>No Booking On Selected Date '.date('d/m/Y',strtotime($date)).'</h2>';
                    }
            }
            else
            {
        ?>
        <h2> Booked Order </h2>
        <div class="table-responsive">
            <table class="table">
              <thead>
                  <tr> 
                    <th>No</th>
                    <th>Name </th>
                    <th>E-Mail </th>
                    <th>Mobile</th>
                    <th>Address </th>
                    <th> Reason </th>
                    <th>Booked Date & Time</th>
                    <th>Time</th>
                    <th>End Time</th>
                    <th>Date</th>
                    <th>Plan</th>
                    <th>Menu </th>
                    <th>No. Of Person</th>
                    <th>Extra Service</th>
                    <th>Total Bill </th>
                    <th>Remaining Payment </th>
                    <th>Update </th>
                    <th>View Menu</th>
                    <th>Cancel Booking </th>
                    <th>Complete Payment </th>
                </tr>
              </thead> 
              <tbody>
                <?php   
                    while($r = mysqli_fetch_array($exec))
                    {
                        $mbid = $r['mbid'];
                        $query1 = "select * from banquet_plans where mbid= $mbid";
                        $exec1 =mysqli_query($con,$query1);
                        $r1 = mysqli_fetch_array($exec1);
                
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
                    <td><?php echo $r1['plan_name']; ?></td>
                    <td>₹ <?php echo $r['menu_plan'];?></td>
                    <td><?php echo $r['person']; ?></td>
                    <td><?php echo $r['extra_services']; ?></td>
                    <td>₹ <?php echo number_format($r['total_bill']); ?></td>
                    <td>₹ <?php echo number_format($r['remaining_payment']); ?></td>
                    <td><a href="update_banquet_user.php?Bbid=<?php echo $r['Bbid']; ?>"> Update </a></td>
                    <td><a href="view_banquet_menu.php?Bbid=<?php echo $r['Bbid']; ?>">View </a></td>
                    <td><a href="delete_banquet_user.php?Bbid=<?php echo $r['Bbid']; ?>"> Delete </a></td>
                    <td><a href="complete_banquet_pay.php?Bbid=<?php echo $r['Bbid']; ?>"> Pay </a></td>
                </tr>
                <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </body>
</html>