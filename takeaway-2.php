<?php
	session_start();
	date_default_timezone_set('Asia/Kolkata');
	
	if(isset($_SESSION['cart'])){
	       //print_r($_SESSION['cart']);
	}
	else{
	    header("location:takeaway.php");
	}
	if(count($_SESSION['cart']) > 0){}
	else{
	    header("location:takeaway.php");
	}
	if(isset($_SESSION['exit'])){
	    header("location: takeaway.php");
	}
?>
<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    
    <link rel="shortcut icon" href="images/favicon-icon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Site Metas -->
    <title>Yajman Restaurant and Banquet</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Menu Items -->
    <link rel="stylesheet" href="css/menu.css" >
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
		<link rel="stylesheet" href="css/c-items.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">


    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.php">
					<img src="images/logo-y.jpg" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
						<li class="nav-item active"><a class="nav-link" href="takeaway.php">Takeaway</a></li>
						<li class="nav-item"><a class="nav-link" href="banquet.php">Banquet</a></li>
						<li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->

    <div style="padding:70px;">
	</div>

	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="content-wrap-1">
			    <a href="takeaway.php"><i class="fa fa-utensils icon1" style="color: #b13476; border: 2px solid #b13476"></i></a>
					<a href="takeaway-1.php"><i class="fa fa-cart-plus icon1" style="color: #b13476; border: 2px solid #b13476"></i></a>
			    <a href="takeaway-2.php"><i class="fas fa-user-circle icon1" style="color: #b13476; border: 2px solid #b13476"></i></a>

    	</div>
		</div>
		</div>
	</div>
	<!-- Products Section -->
    <section class="second-sect">
        <div class="main-section-categ">
            <div class="main-section-container">
                <div class="heading-title text-center">
                    <h1 style="margin-bottom:0px; font-size: 32px; color: #b13476">Order Confirmation</h1>
										<p>Please fill below details to book the order.</p>
				</div>
            </div>
        </div>
    </section>
   
            <div style="padding-top:40px; padding-left: 40px; padding-right: 40px; font-size:60px; text-align:center">
        		<h1> Enter Personal Details <h1>
        	</div>
        	<?php   
            	require 'db.php';
            	$total = $_SESSION['total'];
        
            ?>
            <!-- Personal Details -->
            <div class="contact-box">
        			<div class="container">
        				<div class="row">
        					<div class="col-lg-12">
        						<form id="contactForm" method="post" action="#">
        							<div class="row">
        								<div class="col-md-12">
        									<span class="field-title" > Enter Name : </span>
        									<div class="form-group">
        										<input type="text" class="form-control" id="name" name="uname" placeholder="Name " required data-error="Please Enter Name">
        										<div class="help-block with-errors"></div>
        									</div>
        								</div>
        								<div class="col-md-12">
        									<span class="field-title"> Enter Email-id : </span>
        									<div class="form-group">
        										<input type="email" placeholder="Enter Email-id" id="mail" class="form-control" name="e-mail" required data-error="Please Enter Mail-Id">
        										<div class="help-block with-errors"></div>
        									</div>
        								</div>
        								<div class="col-md-12">
        									<span class="field-title"> Enter Mobile No : </span>
        									<div class="form-group">
                                                <input type="tel" placeholder="84690 00683" id="mobile" class="form-control" name="mobile_no" required data-error="Please Enter Mobile No">
        										<div class="help-block with-errors"></div>
        									</div>
                                        </div>
        								<div class="col-md-12">
        									<span class="field-title"> Enter Address Details : </span>
        									<div class="form-group">
        										<input type="text" placeholder="Address Here" id="" class="form-control" name="u_address" required data-error="Please Enter Address">
        										<div class="help-block with-errors"></div>
        									</div>
                                        </div>
                                        <div class="col-md-12">
        									<span class="field-title"> Takeaway / Pickup Time : </span>
        									<div class="form-group">
        										<input type="time" placeholder="Select Time" id="time" class="form-control" name="b-time" required data-error="Please Enter Time">
        										<div class="help-block with-errors"></div>
        									</div>
        								</div>
                                        <div class="col-md-12">
        									<span class="field-title"> Total Bill (Inclusive Of Tax): </span>
        									<div class="form-group">
        										<input type="text"  id="" class="form-control" name="total" readonly value="<?php $tx = $total + (($total * 5) / 100); echo number_format($tx,2) ; ?>" style="background-color: #d9d9d9; border: 1px solid black;">
        										<div class="help-block with-errors"></div>
        									</div>
        								</div>
        								<div class="col-md-12">
        									<div class="submit-button text-center">
        										<input type="submit" class="btn btn-common" id="checkAvability" name="submit" value="Place Order" />
        										<div id="msgSubmit" class="h3 text-center hidden"></div>
        										<div class="clearfix"></div>
        									</div>
        								</div>
        								</div>
        							</div>
        						</form>
					</div>
				</div>
			</div>
		</div>

		<?php   
			require 'db.php';
			if(isset($_POST['submit']))
			{
			    if(count($_SESSION['cart']) > 0 ){
    				$name = $_POST['uname'];
    				$mail = $_POST['e-mail'];
    				$mob = $_POST['mobile_no'];
    				$address = $_POST['u_address'];
    				$total = $_POST['total'];
    				$time = $_POST['b-time'];
    				$today = date('Y-m-d H:i:s');
            
                    if(($time >= '10:30:00' && $time <= '15:30:00') || ($time >= '19:00:00' && $time <= '23:00:00'))
                    {
                        
                        if($name != '' && $mail != '' && $mob != '' && $address != '' && $total != '' && $time != '')
                        {
    				    
        					$q = "insert into takeaway_user (name,email,mobile_no,address,date_time,total_bill,status,time_of_delivery,payment_mode)
        						  values('$name','$mail','$mob','$address','$today','$total',0,'$time','cash') ";
        					
        					$exec = mysqli_query($con,$q);
    					
        					if($exec)
        					{
        						
        						$exec2 = mysqli_query($con,"select max(tuid) from takeaway_user");
        						$r = mysqli_fetch_array($exec2);
        						$tid = $r[0];
        						foreach($_SESSION['cart'] as $keys => $value)
        						{
        							$pid = $value['product_id'];
        							$quantity = $value['item_quantity'];
        							$o_type = 'takeaway';
        							
        							$q1 = "insert into food_order(userid,mid,quantity,order_type) values($tid,$pid,'$quantity','$o_type')";
        							$e = mysqli_query($con,$q1);
        							
        							if(!($e)){
        							   // email($tid,$mail);
        							}
        							else
        								echo mysqli_error($con);
        						}
        			            //session_destroy();
        			            //unset($_SESSION['cart']);
        			            email($tid,$mail);
        					}
        					else
        						echo mysqli_error($con);
                        }	
    				}
                ?>
				<div class="text-center" style="margin-top: 2%;">
    							    <h2 class="text-warning">
    								    <strong id="showResvered">
    								    <?php 
			                                }
			}
                                         ?>
                                        </strong>
    							    </h2>
    						    </div>
			
		<?php
		    function email($tid , $mail)
			{
                require 'db.php';
                $query = mysqli_query($con,"select * from takeaway_user where tuid = $tid");
                $to = $mail;
                $subject = 'Takeaway - Yajman Restaurant & Banquet';
               
                while($r = mysqli_fetch_array($query)){
                    $name = $r['name'];
                    $date = $r['date_time'];
                    $pick = $r['time_of_delivery'];
                    $total = $r['total_bill'];
                    
                    $message =  '
                    <!DOCTYPE html>
                    <html lang="en">
                      <head>
                        <meta charset="UTF-8" />
                        <title>Food Order Details : Yajman Restaurant</title>
                      </head>
                    
                      <body>
                        <head>
                           <title>Food Order Details : Yajman Restaurant</title>
                          <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
                          <meta content="width=device-width" name="viewport" />
                          <style type="text/css">
                            @font-face {
                                font-family: &#x27;
                    
                                font-weight: 700;
                                font-style: normal;
                                src: local(&#x27; Postmates Std Bold&#x27; ), url(https://s3-us-west-1.amazonaws.com/buyer-static.postmates.com/assets/email/postmates-std-bold.woff) format(&#x27; woff&#x27; );
                            }
                    
                            @font-face {
                                font-family: &#x27;
                                Postmates Std&#x27;
                                ;
                                font-weight: 500;
                                font-style: normal;
                                src: local(&#x27; Postmates Std Medium&#x27; ), url(https://s3-us-west-1.amazonaws.com/buyer-static.postmates.com/assets/email/postmates-std-medium.woff) format(&#x27; woff&#x27; );
                            }
                    
                            @font-face {
                                font-family: &#x27;
                                Postmates Std&#x27;
                                ;
                                font-weight: 400;
                                font-style: normal;
                                src: local(&#x27; Postmates Std Regular&#x27; ), url(https://s3-us-west-1.amazonaws.com/buyer-static.postmates.com/assets/email/postmates-std-regular.woff) format(&#x27; woff&#x27; );
                            }
                          </style>
                          <style media="screen and (max-width: 680px)">
                            @media screen and (max-width: 680px) {
                              .page-center {
                                padding-left: 0 !important;
                                padding-right: 0 !important;
                              }
                    
                              .footer-center {
                                padding-left: 20px !important;
                                padding-right: 20px !important;
                              }
                            }
                          </style>
                        </head>
                    
                        <body>
                          <table
                            cellpadding="0"
                            cellspacing="0"
                            style="
                              width: 100%;
                              height: 100%;
                              background-color: #f4f4f5;
                              text-align: center;
                            "
                          >
                            <tbody>
                              <tr>
                                <td style="text-align: center">
                                  <table
                                    align="center"
                                    cellpadding="0"
                                    cellspacing="0"
                                    id="body"
                                    style="
                                      background-color: #fff;
                                      width: 100%;
                                      max-width: 680px;
                                      height: 100%;
                                    "
                                  >
                                    <tbody>
                                      <tr>
                                        <td>
                                          <table
                                            align="center"
                                            cellpadding="0"
                                            cellspacing="0"
                                            class="page-center"
                                            style="
                                              text-align: left;
                                              padding-bottom: 16px;
                                              width: 100%;
                                              padding-left: 103px;
                                              padding-right: 103px;
                                            "
                                          >
                                            <tbody>
                                              <tr>
                                                <td
                                                  style="
                                                    padding-top: 24px;
                                                    display: flex;
                                                    justify-content: center;
                                                  "
                                                >
                                                  <img
                                                    src="https://thewebmate.in/yajman-01/emails/logo-y.jpg"
                                                    style="width: 184px; height: 62px"
                                                  />
                                                </td>
                                              </tr>
                                              <tr>
                                                <td
                                                  colspan="2"
                                                  style="
                                                    padding-top: 45px;
                                                    -ms-text-size-adjust: 100%;
                                                    -webkit-font-smoothing: antialiased;
                                                    -webkit-text-size-adjust: 100%;
                                                    color: #000000;
                                                    font-family: "Postmates Std",
                                                    "Helvetica", -apple-system,
                                                    BlinkMacSystemFont, "Segoe UI",
                                                    "Roboto", "Oxygen", "Ubuntu",
                                                    "Cantarell", "Fira Sans", "Droid Sans",
                                                    "Helvetica Neue"
                                                      sans-serif;
                                                    font-size: 35px;
                                                    text-align: center;
                                                    font-smoothing: always;
                                                    font-style: normal;
                                                    font-weight: 600;
                                                    letter-spacing: -2.6px;
                                                    line-height: 52px;
                                                    mso-line-height-rule: exactly;
                                                    text-decoration: none;
                                                  "
                                                >
                                                  Thank you for your order !
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table
                                            align="center"
                                            cellpadding="0"
                                            cellspacing="0"
                                            style="width: 100%"
                                          >
                                            <tbody>
                                              <tr>
                                                <td style="padding-top: 24px; padding-bottom: 24px">
                                                  <img
                                                    src="https://yajmanrestaurant.com/images/takeaway.jpg"
                                                    style="width: 65%; border-radius: 20px"
                                                  />
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table
                                            align="center"
                                            cellpadding="0"
                                            cellspacing="0"
                                            class="page-center"
                                            style="
                                              text-align: left;
                                              padding-bottom: 72px;
                                              width: 100%;
                                              padding-left: 103px;
                                              padding-right: 103px;
                                            "
                                          >
                                            <tbody>
                                              <tr>
                                                <td colspan="2">
                                                  <table
                                                    cellpadding="0"
                                                    cellspacing="0"
                                                    style="width: 100%"
                                                  >
                                                    <tbody>
                                                      <tr>
                                                        <td
                                                          style="
                                                            padding-top: 24px;
                                                            max-width: 100px;
                                                            padding-right: 24px;
                                                          "
                                                        >
                                                          <img
                                                            src="https://f0.pngfuel.com/png/724/795/envelope-logo-png-clip-art.png"
                                                            style="
                                                              max-width: 88px;
                                                              border-radius: 44px;
                                                            "
                                                          />
                                                        </td>
                                                        <td
                                                          style="
                                                            padding-top: 24px;
                                                            -ms-text-size-adjust: 100%;
                                                            -ms-text-size-adjust: 100%;
                                                            -webkit-font-smoothing: antialiased;
                                                            -webkit-text-size-adjust: 100%;
                                                            color: #000000;
                                                            font-family: "Postmates Std",
                                                              "Helvetica", -apple-system,
                                                              BlinkMacSystemFont, "Segoe UI",
                                                              "Roboto", "Oxygen", "Ubuntu",
                                                              "Cantarell", "Fira Sans", "Droid Sans",
                                                              "Helvetica Neue", sans-serif;
                                                            font-size: 18px;
                                                            font-smoothing: always;
                                                            font-style: normal;
                                                            font-weight: 400;
                                                            letter-spacing: -0.48px;
                                                            line-height: 32px;
                                                            mso-line-height-rule: exactly;
                                                            text-decoration: none;
                                                            vertical-align: middle;
                                                            width: 100%;
                                                          "
                                                        >
                                                          <span style="font-weight: 600;">Dear '.$name.',</span>
                                                          please take delivery of your food order from Yajman
                                                          Restaurant on <b>'.date('d/m/Y',strtotime($date)).' '.date('h:i:s A',strtotime($pick)).'</b>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                  <table
                                                    cellpadding="0"
                                                    cellspacing="0"
                                                    style="
                                                      font-size: 14px;
                                                      margin: 0px auto;
                                                      border-collapse: collapse;
                                                      margin-top: 50px;
                                                    "
                                                    width="100%"
                                                  >
                                                  <tbody>
                                                    <tr>
                                                     <td  align="left"
                                                     style="
                                                       font-weight: 600;
                                                       margin: 0;
                                                       vertical-align: top;
                                                       padding-left: 20px;
                                                       border-top-left-radius: 10px;
                                                       border-bottom-left-radius: 10px;
                                                       border: 0px solid;
                                                     "> Name  </td>
                                                     <td  align="left"
                                                     style="
                                                       font-weight: 600;
                                                       margin: 0;
                                                       vertical-align: top;
                                                       padding-left: 20px;
                                                       border-top-left-radius: 10px;
                                                       border-bottom-left-radius: 10px;
                                                       border: 0px solid;
                                                     "> Price </td>
                                                     <td  align="left"
                                                     style="
                                                       font-weight: 600;
                                                       margin: 0;
                                                       vertical-align: top;
                                                       padding-left: 20px;
                                                       border-top-left-radius: 10px;
                                                       border-bottom-left-radius: 10px;
                                                       border: 0px solid;
                                                     "> Quantity </td>
                                                     <td  align="left"
                                                     style="
                                                       font-weight: 600;
                                                       margin: 0;
                                                       vertical-align: top;
                                                       padding-left: 20px;
                                                       border-top-left-radius: 10px;
                                                       border-bottom-left-radius: 10px;
                                                       border: 0px solid;
                                                     ">Total Price </td>
                                                    </tr>
                                                    ';
                                                    $bill = mysqli_query($con,"select * from food_order where userid = $tid");
                                        
                                                    while($r1 = mysqli_fetch_array($bill)){
                                                        $quantity = $r1['quantity'];
                                                        $mid = $r1['mid'];
                                                        $menu = mysqli_query($con,"select * from menu where mid = $mid");
                                                      
                                                        while($r2 = mysqli_fetch_array($menu))
                                                        {
                                                          $price = $r2['price'];
                                                          $message .= '<tr
                                                          style="
                                                            margin: 0;
                                                            border-radius: 20px;
                                                            border: 0px solid rgba(0, 0, 0, 0.212);
                                                            height: 20px;
                                                            width: 100%;
                                                            background-color: #fde1ff;
                                                          ">
                                                        <td align="left"
                                                          style="
                                                            font-weight: 600;
                                                            margin: 0;
                                                            vertical-align: top;
                                                            padding-left: 20px;
                                                            border-top-left-radius: 10px;
                                                            border-bottom-left-radius: 10px;
                                                            border: 0px solid;
                                                          ">'.
                                                          $r2['name'].'
                                                          </td>
                                                          <td
                                                          align="center"
                                                          style="margin: 0; vertical-align: top" >'.
                                                          $price.'
                                                          </td>
                                                          <td
                                                            align="center"
                                                            style="margin: 0; vertical-align: top" >'.
                                                            $quantity.'
                                                         </td>
                                                          <td
                                                            align="right"
                                                            style="
                                                              margin: 0;
                                                              vertical-align: top;
                                                              border-top-right-radius: 10px;
                                                              padding-right: 20px;
                                                              border-bottom-right-radius: 10px;
                                                            " >₹ '.
                                                            number_format(($quantity * $price)).'
                                                          </td>
                                                      </tr>';
                                                        }
                                                    }
                                                  
                                                 $message .= '</tbody>                                    
                                                </table>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td
                                                  colspan="2"
                                                  style="padding-top: 48px; padding-bottom: 48px"
                                                >
                                                  <table
                                                    cellpadding="0"
                                                    cellspacing="0"
                                                    style="width: 100%"
                                                  >
                                                    <tbody>
                                                      <tr>
                                                        <td
                                                          style="
                                                            width: 100%;
                                                            height: 1px;
                                                            max-height: 1px;
                                                            background-color: #e1e4eb;
                                                          "
                                                        ></td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td
                                                  colspan="2"
                                                  style="
                                                    -ms-text-size-adjust: 100%;
                                                    -webkit-font-smoothing: antialiased;
                                                    -webkit-text-size-adjust: 100%;
                                                    color: #000000;
                                                    font-family: "Postmates Std",
                                                    "Helvetica", -apple-system,
                                                    BlinkMacSystemFont, "Segoe UI",
                                                    "Roboto", "Oxygen", "Ubuntu",
                                                    "Cantarell", "Fira Sans", "Droid Sans",
                                                    "Helvetica Neue",
                                                      sans-serif;
                                                    font-size: 30px;
                                                    text-align:center;
                                                    font-smoothing: always;
                                                    font-style: normal;
                                                    font-weight: 500;
                                                    letter-spacing: -0.78px;
                                                    line-height: 40px;
                                                    mso-line-height-rule: exactly;
                                                    text-decoration: none;
                                                  "
                                                >
                                                  Total Payable Bill : ₹ '.$total.'
                                                </td>
                                              </tr>
                                              <tr>
                                                <td
                                                  colspan="2"
                                                  style="padding-top: 48px; padding-bottom: 48px"
                                                >
                                                  <table
                                                    cellpadding="0"
                                                    cellspacing="0"
                                                    style="width: 100%"
                                                  >
                                                    <tbody>
                                                      <tr>
                                                        <td
                                                          style="
                                                            width: 100%;
                                                            height: 1px;
                                                            max-height: 1px;
                                                            background-color: #e1e4eb;
                                                          "
                                                        ></td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  <table
                                                    cellpadding="0"
                                                    cellspacing="0"
                                                    style="width: 100%"
                                                  >
                                                    <tbody>
                                                      <tr>
                                                        <td style="padding-right: 25px">
                                                          <img
                                                            src="https://d1pgqke3goo8l6.cloudfront.net/5ehc9vX9QQOff6gVsgah_start.png"
                                                            style="
                                                              max-width: 16px;
                                                              padding-top: 3px;
                                                              vertical-align: top;
                                                            "
                                                          />
                                                        </td>
                                                        <td
                                                          style="
                                                            -ms-text-size-adjust: 100%;
                                                            -ms-text-size-adjust: 100%;
                                                            -webkit-font-smoothing: antialiased;
                                                            -webkit-text-size-adjust: 100%;
                                                            color: #9095a2;
                                                            font-family: "Postmates Std",
                                                            "Helvetica", -apple-system,
                                                            BlinkMacSystemFont, "Segoe UI",
                                                            "Roboto", "Oxygen", "Ubuntu",
                                                            "Cantarell", "Fira Sans", "Droid Sans",
                                                            "Helvetica Neue", sans-serif;
                                                            font-size: 16px;
                                                            font-smoothing: always;
                                                            font-style: normal;
                                                            font-weight: 400;
                                                            letter-spacing: -0.24px;
                                                            line-height: 24px;
                                                            mso-line-height-rule: exactly;
                                                            text-decoration: none;
                                                            vertical-align: top;
                                                            width: 100%;
                                                            min-width: 225px;
                                                          "
                                                        >
                                                          <span
                                                            style="font-weight: 600; color: #000000"
                                                            >'.$name.'</span
                                                          ><br />'.
                                                          $r['email'].'<br />
                    
                                                          +91 '.$r['mobile_no'].'
                                                        </td>
                                                      </tr>
                                                      <tr>
                                                        <td
                                                          style="
                                                            padding-top: 10px;
                                                            vertical-align: top;
                                                          "
                                                        >
                                                        <a href="https://maps.app.goo.gl/utNeRhF8oLHwJB9F7" target="_blank">
                                                          <img
                                                            src="https://d1pgqke3goo8l6.cloudfront.net/KYzSiQPnSgSDHn2bv34U_Pin.png"
                                                            style="max-width: 16px"
                                                          />
                                                          </a>
                                                        </td>
                                                        <td
                                                          style="
                                                            -ms-text-size-adjust: 100%;
                                                            -ms-text-size-adjust: 100%;
                                                            -webkit-font-smoothing: antialiased;
                                                            -webkit-text-size-adjust: 100%;
                                                            color: #9095a2;
                                                            font-family: "Postmates Std",
                                                            "Helvetica", -apple-system,
                                                            BlinkMacSystemFont, "Segoe UI",
                                                            "Roboto", "Oxygen", "Ubuntu",
                                                            "Cantarell", "Fira Sans", "Droid Sans",
                                                            "Helvetica Neue", sans-serif;
                                                            font-size: 16px;
                                                            font-smoothing: always;
                                                            font-style: normal;
                                                            font-weight: 400;
                                                            letter-spacing: -0.24px;
                                                            line-height: 24px;
                                                            mso-line-height-rule: exactly;
                                                            text-decoration: none;
                                                            vertical-align: top;
                                                            width: 100%;
                                                            padding-top: 8px;
                                                            min-width: 225px;
                                                          "
                                                        >
                                                          <span
                                                            style="font-weight: 600; color: #000000"
                                                            >Yajman Restaurant & Banquet</span
                                                          ><br />
                                                          Yajman Restaurant, Dharm Nagar 2, Sabarmati, Ahmedabad
                    
                                                          <br />
                                                          +91 84690 00683, +91 81281 41047the
                                                          <br />
                                                            <a href="mailto:restaurantyajman@gmail.com" target="_blank"><span
                                                              style="font-weight: 500; color: #9095a2; text-decoration: none;"
                                                              >restaurantyajman@gmail.com </span></a>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <!-- <table cellpadding="0" cellspacing="0"
                                                                style="text-align: center; width: 100%; background-color: #000000; padding: 40px; margin-bottom: 100px; max-width: 540px; margin-left: auto; margin-right: auto;">
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            style="color: #ffffff; font-family: "Postmates Std",
                                                                            "Helvetica", -apple-system,
                                                                            BlinkMacSystemFont, "Segoe UI",
                                                                            "Roboto", "Oxygen", "Ubuntu",
                                                                            "Cantarell", "Fira Sans", "Droid Sans",
                                                                            "Helvetica Neue"; font-size: 32px; font-weight: 400; letter-spacing: 0; line-height: 35px; vertical-align: top; padding-bottom: 15px; text-align: center">
                                                                            Give $100 Get $100</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="color: #ffffff; font-family: "Postmates Std",
                                                                            "Helvetica", -apple-system,
                                                                            BlinkMacSystemFont, "Segoe UI",
                                                                            "Roboto", "Oxygen", "Ubuntu",
                                                                            "Cantarell", "Fira Sans", "Droid Sans",
                                                                            "Helvetica Neue"; font-size: 18px; font-weight: 400; letter-spacing: 0; line-height: 21px; vertical-align: top; padding-bottom: 30px; text-align: center">
                                                                            Share your code and give $100 in delivery fee credit to your
                                                                            friends.</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="color: #ffffff; font-family: "Postmates Std",
                                                                            "Helvetica", -apple-system,
                                                                            BlinkMacSystemFont, "Segoe UI",
                                                                            "Roboto", "Oxygen", "Ubuntu",
                                                                            "Cantarell", "Fira Sans", "Droid Sans",
                                                                            "Helvetica Neue"; font-size: 72px; font-weight: 600; letter-spacing: 0; vertical-align: top; padding-bottom: 45px; text-transform: uppercase; word-break: break-all">
                                                                            RGE1</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="vertical-align: top;">
                                                                            <a href="#"
                                                                                style="display: block; background-color: #00cc99; width: 100%; max-width: 300px; color: #ffffff; font-family: "Postmates Std",
                                                                                "Helvetica", -apple-system,
                                                                                BlinkMacSystemFont, "Segoe UI",
                                                                                "Roboto", "Oxygen", "Ubuntu",
                                                                                "Cantarell", "Fira Sans", "Droid Sans",
                                                                                "Helvetica Neue"; font-size: 12px; font-weight: 600; letter-spacing: 0.7px; line-height: 56px; text-decoration: none; vertical-align: top; border-radius: 28px; text-transform: uppercase; text-align: center; margin-left: auto; margin-right: auto"
                                                                                universal="true" target="_blank">Share Code</a>
                                                                        </td>
                                                                    </tr>
                                                                </tbody
                                                            </table> -->
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <table
                                    align="center"
                                    cellpadding="0"
                                    cellspacing="0"
                                    id="footer"
                                    style="
                                      background-color: #b13476;
                                      width: 100%;
                                      max-width: 680px;
                                      height: 100%;
                                    "
                                  >
                                    <tbody>
                                      <tr>
                                        <td>
                                          <table
                                            align="center"
                                            cellpadding="0"
                                            cellspacing="0"
                                            class="footer-center"
                                            style="
                                              text-align: left;
                                              width: 100%;
                                              padding-left: 103px;
                                              padding-right: 103px;
                                            "
                                          >
                                            <tbody>
                                              <tr>
                                                <td
                                                  colspan="2"
                                                  style="
                                                    padding-top: 72px;
                                                    padding-bottom: 24px;
                                                    width: 100%;
                                                  "
                                                >
                                                  <span
                                                    style="
                                                      color: white;
                                                      font-size: 26px;
                                                      font-weight: 900;
                                                    "
                                                    >Yajman Restaurant & Banquet</span
                                                  >
                                                </td>
                                              </tr>
                                              <tr>
                                                <td
                                                  colspan="2"
                                                  style="padding-top: 24px; padding-bottom: 48px"
                                                >
                                                  <table
                                                    cellpadding="0"
                                                    cellspacing="0"
                                                    style="width: 100%"
                                                  >
                                                    <tbody>
                                                      <tr>
                                                        <td
                                                          style="
                                                            width: 100%;
                                                            height: 1px;
                                                            max-height: 1px;
                                                            background-color: #eaecf2;
                                                            opacity: 0.19;
                                                          "
                                                        ></td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td
                                                  style="
                                                    -ms-text-size-adjust: 100%;
                                                    -ms-text-size-adjust: 100%;
                                                    -webkit-font-smoothing: antialiased;
                                                    -webkit-text-size-adjust: 100%;
                                                    color: #e1e1e1;
                                                    font-family: "Postmates Std",
                                                    "Helvetica", -apple-system,
                                                    BlinkMacSystemFont, "Segoe UI",
                                                    "Roboto", "Oxygen", "Ubuntu",
                                                    "Cantarell", "Fira Sans", "Droid Sans",
                                                    "Helvetica Neue",
                                                      sans-serif;
                                                    font-size: 16px;
                                                    font-smoothing: always;
                                                    font-style: normal;
                                                    font-weight: 400;
                                                    letter-spacing: 0;
                                                    line-height: 24px;
                                                    mso-line-height-rule: exactly;
                                                    text-decoration: none;
                                                    vertical-align: top;
                                                    width: 100%;
                                                  "
                                                >
                                                  If you have any questions or concerns, we are here
                                                  to help.
                                                  <a
                                                    data-click-track-id="7157"
                                                    href="mailto:restaurantyajman@gmail.com"
                                                    style="font-weight: 600; color: #fff"
                                                    target="_blank"
                                                    >Contact Us Now</a
                                                  >
                                                </td>
                                              </tr>
                                              <tr>
                                                <td style="height: 72px"></td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </body>
                      </body>
                    </html>'; 
    }
            $to = $mail;
            $subject = "Takeaway Confirmation - Yajman Restaurant & Banquet";
            $headers = "MIME-Version: 1.0" . "\r\n";
          	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
			$headers .= 'From: <takeaway_yajman@yajmanrestaurant.com>' . "\r\n";
			$headers .= 'Cc: <restaurantyajman@gmail.com>' . "\r\n";

          
          
			if (mail($to,$subject,$message,$headers)) {
			    echo "<script>alert('Order Booked');</script>";
			    echo "<script>alert('Mail Sent.if you did not receive, check spam folder '); </script>";
			    if(1){
			        session_destroy();
			        //header("location:takeaway.php");
			        $_SESSION['exit'] = '1';
			    }
			}
			else {
              echo "<script>alert('Oops!, Mail Not sent');</script>";
            }

    	}
		?>
	<div style="padding:100px;">
	</div>

	<!-- Start Contact info -->
	<div class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md-4 arrow-right">
					<i class="fa fa-volume-control-phone"></i>
					<div class="overflow-hidden">
						<h4>Phone</h4>
						<p class="lead">
							84690 00683, &nbsp;
							81281 41047
						</p>
					</div>
				</div>
				<div class="col-md-4 arrow-right">
					<i class="fa fa-envelope"></i>
					<div class="overflow-hidden">
						<h4>Email</h4>
						<p class="lead">
							restaurantyajman@gmail.com
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-map-marker"></i>
					<div class="overflow-hidden">
						<h4>Location</h4>
						<p class="lead">
							Yajman Restaurant, Dharm Nagar II, Sabarmati, Ahmedabad.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact info -->

	<!-- Start Footer -->
	<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<h3>Managed By</h3>
					<p>
					<img src="./images/j-logo.png" height="80px" width="80px" style="border-radius:12px">
					<span style="padding:8px">'J The Vision' Group </span>
					</p>
					<ul style="padding:10px">
						<li style="color:white"> Restaurant </li>
						<li style="color:white"> Banquet </li>
						<li style="color:white"> Marraige Hall Booking </li>
						<li style="color:white"> Architect & Home Design </li>

				</div>
				<div class="col-lg-4 col-md-6">
					<h3>Contact information</h3>
					<p class="lead">Yajman Restaurant, Dharm Nagar II, Sabarmati, Ahmedabad, Gujarat 380005</p>
					<p class="lead"><a href="tel:8469000683">84690 00683,</a> &nbsp;<a href="tel:8128141047">81281 41047</a></p>
					<p><a href="mailto:restaurantyajman@gmail.com"> restaurantyajman@gmail.com</a></p>
				</div>
				<div class="col-lg-4 col-md-6">
					<h3>Opening hours</h3>
					<p><span class="text-color">Banquet Timing :</span> 8AM to 11PM</p>
					<p><span class="text-color">Restaurant (Takeaway) :</span> 10:30AM - 3:30PM, 7PM - 11PM</p>
				</div>
			</div>
		</div>

		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">Rights Reserved. &copy; 2020 <a href="./index.php">&nbsp;Yajman Restaurant & Banquet</a> <br>Managed By 'J The Vision' Group<br>Developed By <a href="https://thewebmate.in" target="_blank">Webmate Web Services</a></p>
					</div>
				</div>
			</div>
		</div>

	</footer>
	<!-- End Footer -->


	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
