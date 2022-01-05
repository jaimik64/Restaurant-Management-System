<?php
    require 'db.php';
    date_default_timezone_set('Asia/Kolkata');
    $id = $_GET['Bbid'];
    
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
          <a class="flex-sm-fill text-sm-center nav-link active" href="view_banquet_book.php">Back</a>
    </nav>
        <div class="empty">
        </div>
         <?php 
               $q2 = mysqli_query($con,"select * from banquet_booking_user where Bbid = $id");
              
              
               while($r1 = mysqli_fetch_array($q2)){
                    $price = $r1['menu_plan'];

                    $q1 = mysqli_query($con,"select * from  banquet_menu where booking_id = $id AND price = $price");
                    if(mysqli_num_rows($q1) > 0){
        ?>
        <h2>Banquet Menu Item </h2>
        <div class="table-responsive">
            <table class="table">
              <thead>
                  <tr>
                    <th>Banquet Booking UserID</th>
                    <th>Banquet Booking Username</th>
                    <th>Menu </th>
                    <th>Price </th>
                    <th>Description</th>
                </tr>
              </thead> 
              <?php  while($r = mysqli_fetch_array($q1)){     ?>
                <tr>
                    <td><?php echo $r1['Bbid']; ?></td>
                    <td><?php echo $r1['name'];  ?></td>
                    <td><?php echo $r['details']; ?></td>
                    <td><?php echo $r['price']; ?></td>
                    <td><?php echo $r['description']; ?></td>
                </tr>
                <?php }   ?>
            </table>
        </div>
        <?php } 
            else if(mysqli_num_rows($q1) == 0){
                $q = mysqli_query($con, "select * from banquet_menu_plan where price = $price");
        ?>
        
        <h2>Banquet Menu Item </h2>
        <div class="table-responsive">
            <table class="table">
              <thead>
                  <tr>
                    <th>Banquet Booking UserID</th>
                    <th>Banquet Booking Username</th>
                    <th>Menu </th>
                    <th>Price </th>
                </tr>
              </thead> 
              <?php  while($r = mysqli_fetch_array($q)){     ?>
                <tr>
                    <td><?php echo $r1['Bbid']; ?></td>
                    <td><?php echo $r1['name'];  ?></td>
                    <td><?php echo $r['menu']; ?></td>
                    <td><?php echo $r['price']; ?></td>
                </tr>
                <?php }  } } ?>
            </table>
        </div>
    </body>
</html>