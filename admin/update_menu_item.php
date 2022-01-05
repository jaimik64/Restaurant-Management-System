<?php
    require 'db.php';
    $id = $_GET['mid'];
    
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $priority = $_POST['prio'];
        $desc = $_POST['description'];
        $rs = $_POST['restaurant_show'];
        $ts = $_POST['takeaway_show'];
        
        
        //echo $name."<br/>".$price."<br/>".$priority."<br/>".$desc."<br/>".$rs."<br/>".$ts."<br/>";
        if($name != '' && $price != '' && $priority != '' && $rs != '' && $ts != ''){
            if($ts == 'YES' || $ts == 'NO' && $rs == 'YES' || $rs == 'NO'){

                $q = "update menu set name='$name' , description = '$desc' ,price = $price , priority = $priority  , restaurant_show = '$rs' , takeaway_show = '$ts'  where mid = $id";
                
                $exe = mysqli_query($con,$q);
                if($exe)  header("location:view_menu.php");
                
                else echo mysqli_error($con);
            }
        }
    }
    $q = mysqli_query($con,"select * from menu where mid =$id");
    while($r = mysqli_fetch_array($q)){
?><html>
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    <link rel="shortcut icon" href="/images/favicon-icon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="/images/apple-touch-icon.png">
    <title>Update Menu Item</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style>
            h2{
                padding: 10px; 
                text-align: center;
            }
            .form-group{
                margin-right: 20%;
                margin-left: 20%;
            }
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
        </style>
    </head>

    <body>
         <nav class="nav nav-pills flex-column flex-sm-row">
  <a class="flex-sm-fill text-sm-center nav-link active" href="view_menu.php">Back to Main Page</a>
</nav>
        <h2> Update Menu Details </h2>
        <form method="post" action="#">
            <div class="form-group">
                <label> Name </label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="<?php echo $r['name']; ?>">
            </div>    
            <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="price" value="<?php echo $r['price']; ?>" >
            </div>
            <div class="form-group">
                <label>Description </label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="description" value="<?php echo $r['description']; ?>" >
            </div>
            <div class="form-group">
                <label>Priority </label>
                <input type="number" max="5" min="1" name="prio" class="form-control" value="<?php echo $r['priority']; ?>" />
            </div>
            <div class="form-group">
                <label>Restaurant Show</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="restaurant_show" value="<?php echo $r['restaurant_show']; ?>" max="1000" min="50" />
            </div>
            <div class="form-group">
                <label>Takeaway Show</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="takeaway_show" value="<?php echo $r['takeaway_show']; ?>" />
            </div>
            <center>
                <button type="submit" name= "submit" class="btn btn-primary">Update</button> 
           </center>
        </form>
        <?php } ?>
    </body>
</html>
