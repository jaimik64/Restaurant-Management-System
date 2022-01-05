<?php
  require 'db.php';
  
  $query = "select * from banquet_plans order by price";
  $exec = mysqli_query($con,$query);
  if($exec)
  {
?>
<html>
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="images/favicon-icon.png" type="image/x-icon">
        <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
        <title>Banquet Plans</title>
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
				padding: 10px;
				border-collapse : collapse;
			}
			.title2{
				text-align: center;
				color: #66afe9;
				background-color: #efefef;
				padding: 2%;
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
				text-align:center;
				padding: 10px;

			}
		</style>  
	</head>
	<body>
		  <nav class="nav nav-pills flex-column flex-sm-row">
  				<a class="flex-sm-fill text-sm-center nav-link active" href="/admin/admin-panel.php">Home</a>
  				<a class="flex-sm-fill text-sm-center nav-link" href="/admin_plan.html">Add Plan</a>
		  </nav>
        <div class="empty">
        </div>
        <h2> Plan Details </h2>
        <div class="table-responsive">
            <table class="table">
                <tr> 
					<th> No </th>
					<th> Plan Name </th>
				  	<th> Price </th>
				  	<th> Features </th>
				  	<th> Image </th>
				  	<th> Update </th>
				  	<th> Delete </th>
                </tr>
				<?php   
					$i = 1;
                    while($r = mysqli_fetch_array($exec))
                    {
                ?>
                <tr>
					<td><?php echo $i; $i++; ?></td>
                    <td><?php echo $r['plan_name']; ?></td>
                    <td><?php echo number_format($r['price']); ?></td>
                    <td><?php echo $r['feature_list']; ?></td>
                    <td><img src='<?php echo $r['img']; ?>' height='200' width= '200' /></td>   
                    <td><a href="update_plan.php?mbid=<?php echo $r['mbid']; ?>"> Update Plan </a></td>
                    <td><a href="admin_remove_plan.php?mbid=<?php echo $r['mbid']; ?>"> Remove Plan </a></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
<?php
   
 }
 else
 {
   echo "error";
 }
?>
