<?php
    session_start();
    date_default_timezone_set('Asia/Kolkata');
    require 'db.php';
    
    $count = 0;
    $takeaway = 0;
    
    if(isset($_POST['login'])){
        if($_POST['uname'] == 'yajmanre' && $_POST['pass'] == 'yajman!123'){
             $_SESSION['admin'] = 'yajmanre';  
        }
        else{
            echo 'Enter Correct User Details';
        }
    }
    
    $q = mysqli_query($con,"select * from banquet_booking_user");
    $today = date('Y-m-d');
    while($r = mysqli_fetch_array($q)){
        //$date = strtotime($r['booking_date']);
        $book_date = date('Y-m-d',strtotime($r['booking_date']));
        if(strcmp($today,$book_date) == 0){
            $count++;   
        }
    }
    $q2 = mysqli_query($con,"select * from takeaway_user where status = 0");
    while($r1 = mysqli_fetch_array($q2)){
       $takeaway_date = date('Y-m-d',strtotime($r1['date_time']));
       if(strcmp($today,$takeaway_date) == 0){
         $takeaway++;
       }
    }
    
?>  
<html>
    <head>
         <meta charset="utf-8">
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.2/js/umd/util.js"></script>   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="/images/favicon-icon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="/images/apple-touch-icon.png">
    <title>Admin Home Page</title>
        <meta http-equiv="Refresh" content="60">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <script type="text/javascript">
function load()
{
setTimeout("window.open(self.location, '_self');", 60000);
}
</script>
<body onload="load()">

    <div class="toast" role="alert"  data-autohide="false">
        <div class="toast-header">
           <img src="bell.png" class="rounded mr-2" alt="..." height="20px" width="20px">
           <strong class="mr-auto">Banquet Order Received</strong>
           <small>1 mins ago</small>
           <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
           </button>
       </div>
       <div class="toast-body">
           <b><?php echo $count; ?></b> Order Received
           <p><a href="view_banquet_book.php">View Order </a></p>
       </div>
    </div>
    <div class="toast" role="alert"  data-autohide="false">
      <div class="toast-header">
           <img src="bell.png" class="rounded mr-2" alt="..." height="20px" width="20px">
           <strong class="mr-auto">Takeaway Order Received</strong>
           <small>1 mins ago</small>
           <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
           </button>
      </div>
      <div class="toast-body">
           <b><?php echo $takeaway; ?></b> Order Received
           <p><a href="view_takeaway_order.php">View Order </a></p>
      </div>
    </div>
       <div class="card text-center">
          <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
              <li class="nav-item">
                <a class="nav-link active" href="view_banquet_book.php">View Book</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin_display_plan.php">View Plans</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="view_banquet_menu_plan.php">View Banquet Menu Plan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/banquet.php"  >Book Banquet</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="view_menu.php"  >View Menu</a>
              </li>              
              <li class="nav-item">
                <a class="nav-link" href="view_takeaway_order.php"  >View Takeaway Order</a>
              </li>              
              <li class="nav-item">
                <a class="nav-link" href="view_feedback.php"  >View Feedback</a>
              </li>
              
            </ul>
          </div>
          <div class="card-body">
            <a href="view_banquet_book.php" class="btn btn-primary">View</a>
          </div>
        </div>
        
<script>
    var count = <?php echo $count; ?>;
    if(count > 0){
        $('.toast').toast('show');
    }
    else {
       $('.toast').toast('show');
     }
     var takeaway = <?php echo $takeaway; ?>;
     
     if(takeaway > 0){
         $('#toast').toast('show');
     }
     else{
         $('#toast').toast('show');
     }
</script>
    </body>
</html>