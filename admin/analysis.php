<?php
    require 'db.php';
    date_default_timezone_set('Asia/Kolkata');
?>
<html>
    <head>
            <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    <link rel="shortcut icon" href="/images/favicon-icon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="/images/apple-touch-icon.png">
    <title>Feedback Analysis</title>
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
				position: fixed;
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
                top: 5%;
            }
        </style>
    </head>
    <body>    
    
    <nav class="nav nav-pills flex-column flex-sm-row">
  <a class="flex-sm-fill text-sm-center nav-link active" href="view_feedback.php">Back</a>
  <a class="flex-sm-fill text-sm-center nav-link" href="analysis.php">Analysis</a>
</nav>
        <div class="empty">
        </div>
        <h2 style="top: 5%;"> Feedback Analysis </h2>
        <h3>Received Feedback Of
        <?php
            $q = mysqli_query($con,"Select count(id) from feedback");
            $w2 = mysqli_fetch_array($q);
            echo $w2[0];
        ?> People
        </h3>
        <h3 style="margin-bottom: 3%; text-align: center;">Overall Feedback : 
            <?php 
                    $terrible = mysqli_query($con,"select count(feedback) from feedback where feedback='terrible'");
                    $r = mysqli_fetch_array($terrible);
                    $t = $r[0];
                    
                    $bad = mysqli_query($con,"select count(feedback) from feedback where feedback='bad'");
                    $r1 = mysqli_fetch_array($bad);
                    $b = $r1[0];
                    
                    $moderate = mysqli_query($con,"select count(feedback) from feedback where feedback='moderate'");
                    $r2 = mysqli_fetch_array($moderate);
                    $m = $r2[0];
                    
                    $good = mysqli_query($con,"Select  count(feedback) from feedback where feedback='good'");
                    $r3 = mysqli_fetch_array($good);
                    $g = $r3[0];
                    
                    $excellent = mysqli_query($con,"select count(feedback) from feedback where feedback='excellent'");
                    $r4 = mysqli_fetch_array($excellent);
                    $e = $r4[0];
                    
                    $avg = ($t + $b + $m + $g + $e) / 5;
                    echo $avg;
            ?></h3>
        <center><div class="table-responsive">
            <table>
              <thead>
                  <tr> 
                    <th>Feedback Type </th>
                    <th>Feedback Received</th>
                </tr>
              </thead> 
              <tbody>
                  <?php 
                        $e = mysqli_query($con,"select count(feedback) from feedback where feedback='excellent'");
                        while($r = mysqli_fetch_array($e)){
                  ?>
                <tr>
                    <td>Excellent</td>
                    <td><?php echo $r[0]; ?></td>
                </tr>
                <?php
                    }
                ?>
                <?php 
                        $e = mysqli_query($con,"select count(feedback) from feedback where feedback='Good'");
                        while($r = mysqli_fetch_array($e)){
                  ?>
                <tr>
                    <td>Good</td>
                    <td><?php echo $r[0]; ?></td>
                </tr>
                </tr>
                <?php
                    }
                ?>
                <?php 
                        $e = mysqli_query($con,"select count(feedback) from feedback where feedback='moderate'");
                        while($r = mysqli_fetch_array($e)){
                  ?>
                <tr>
                    <td>Moderate</td>
                    <td><?php echo $r[0]; ?></td>
                </tr>
                </tr>
                <?php
                    }
                ?>
                <?php 
                        $e = mysqli_query($con,"select count(feedback) from feedback where feedback='bad'");
                        while($r = mysqli_fetch_array($e)){
                  ?>
                <tr>
                    <td>Bad</td>
                    <td><?php echo $r[0]; ?></td>
                </tr>
                </tr>
                <?php
                    }
                ?>
                <?php 
                        $e = mysqli_query($con,"select count(feedback) from feedback where feedback='terrible'");
                        while($r = mysqli_fetch_array($e)){
                  ?>
                <tr>
                    <td>Terrible</td>
                    <td><?php echo $r[0]; ?></td>
                </tr>
                </tr>
                <?php
                    }
                ?>
                </tbody>
            </table></center>
            
            <script>
                function confirm(){
                    if(confirm("Do You Really Want to Delete It?")){
                        return true;
                    }
                    return false;
                }
            </script>
        </div>
    </body>
</html>