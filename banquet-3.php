<?php
	session_start();
	date_default_timezone_set('Asia/Kolkata');
	if(isset($_SESSION['date']) && isset($_SESSION['time']) && isset($_SESSION['slot']) && isset($_SESSION['menu']) && isset($_SESSION['no'])){   
	}
	else{
	    header("location:banquet.php");
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
						<li class="nav-item"><a class="nav-link" href="takeaway.php">Takeaway</a></li>
						<li class="nav-item active"><a class="nav-link" href="banquet.php">Banquet</a></li>
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
				<div class="content-wrap-2">
			    <a href="banquet.php"><i class="fa fa-shopping-cart icon1" style="color: #b13476;"></i> </a>
			    <a href="banquet-1.php"><i class="fa fa-calendar-alt icon1" style="color: #b13476;"></i> </a>
			    <a href="banquet-2.php"><i class="fas fa-user-circle icon1" style="color: #b13476;"></i> </a>
    	</div>
		</div>
		</div>
	</div>





  <!-- Products Section -->
    <section class="second-sect">
        <div class="main-section-categ">
            <div class="main-section-container">
                <div class="heading-title text-center">
                    <h1 style="margin-bottom:0px; font-size: 32px; color: #b13476">User Details</h1>
										<p>Fill up your details and confirm your booking</p>
                </div>

								<div class="heading-title text-center">
                    <h1 style="margin-bottom:0px; font-size: 20px;"><b> NOTE : </b> You will receive an email (on below entered email) as a confirmation of your order booking. </h1>
                </div>

              </div>
					</div>
    </section>


		<div class="contact-box">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<form id="contactForm" method="post" action="#">
							<div class="row">
								<div class="col-md-12">
									<span class="field-title" > Enter Name : </span>
									<div class="form-group">
										<input type="text" class="form-control" id="b-name" name="b-name" placeholder="Enter Name" required data-error="Please Enter Name">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<span class="field-title"> Enter Email ID : </span>
									<div class="form-group">
										<input type="email" placeholder="Enter Email ID" id="b-email" class="form-control" name="b-email" required data-error="Please Enter Email ID">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<span class="field-title" > Enter Mobile Number : </span>
									<div class="form-group">
										<input type="phone" class="form-control" id="b-phone" name="b-phone" placeholder="Enter Phone Number" required data-error="Please Phone Number">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<span class="field-title" > Enter Address : </span>
									<div class="form-group">
										<input type="address" class="form-control" id="b-address" name="b-address" placeholder="Enter Address" required data-error="Please Address">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<span class="field-title" > Reason for booking (make it a dropdown menu) : </span>
									<div class="form-group">
										<select class="custom-select d-block form-control" id="n-reason" required data-error="Please Select No. of Slots" name="reason">
											<option disabled selected>Select Reason to Book*</option>
											<option value="Event">Event</option>
											<option value="Engagement">Engagement</option>
											<option value="Wedding">Wedding</option>
											<option value="Rituals">Rituals</option>
											<option value="Meeting">Meeting</option>
											<option value="Seminar">Seminar</option>
										</select>
										<div class="help-block with-errors"></div>									
									</div>
								</div>
							</div>
								<div class="row p-5">
									<div class="col-6 text-center">
										<div class="submit-button text-center">
											<a href="banquet-1.php"><button class="btn btn-common" id="submit" type="submit">Prev</button></a>
										</div>
									</div>
									<div class="col-6 text-center">
										<div class="submit-button text-center">
											<button class="btn btn-common" id="submit" type="submit" name="submit">Submit</button>
											<div id="msgSubmit" class="h3 text-center hidden"></div>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>

						</form>
							</div>
						</div>
					<div class="row p-2">
							<div class="col-12 submit-button text-center">
								<a class="btn btn-lg btn-circle btn-outline-new-white" style="font-size:15px; padding:16px; border-radius:8px; width:170px;" href="index.php">Back to Home</a>
							</div>
					</div>
				</div>
			</div>


		<div style="padding:50px;" >
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
					<p><span class="text-color">Restaurant (Takeaway) : </span> 10:30AM - 3:30PM, 7PM - 11PM</p>
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

	<!--php code -->

	<?php
		
		if(isset($_POST['submit']) && isset($_SESSION['time']) && isset($_SESSION['date']) && isset($_SESSION['slot']) && isset($_SESSION['no']) && isset($_SESSION['menu'])){
			require 'db.php';

			$bid = $_SESSION['id']; //banquet plan id
			$date = $_SESSION['date'];
			$time = $_SESSION['time'];
			$slot = $_SESSION['slot'];
			$name = $_POST['b-name'];
			$mail = $_POST['b-email'];
            $mob = $_POST['b-phone'];
            $person = $_SESSION['no'];
            $menu = $_SESSION['menu'];
			$address = $_POST['b-address'];
			$reason = $_POST['reason'];
			$booked_date = date('Y-m-d H:i:s');
			
			$t = strtotime($time);
			$time = date('H:i:s',$t); // starting time of plan with second

			$endtime = strtotime($time) + ($slot*60*60);
			$end_time =  date('H:i:s',$endtime); //ending time of plan

			$query = "select * from banquet_plans where mbid=".$bid; //retrieve banquet_plans details
			$exec = mysqli_query($con,$query);
			if($exec){
				$r = mysqli_fetch_array($exec);
				$price = $r['price']; // banquet_price details 
			}
			else{
				echo mysqli_error($con);
			}
			
			$total = ($price * $slot) + ($person * $menu);
 
			$query2 = "insert into banquet_booking_user(name,email,phone,address,reason_to_book,time,date,extra_services,total_bill,remaining_payment,status,no_of_slots,mbid,end_time,person,menu_plan,booking_date)
                values('$name','$mail','$mob','$address','$reason','$time','$date','','$total','$total',1,'$slot','$bid','$end_time',$person,$menu,'$booked_date')";
			$exec2 = mysqli_query($con,$query2);
			if($exec2) {
				echo '<script>alert("Congratulations!! Banquet Hall Booked. Manager will contact you soon!")</script>';
				//generate email
				//header("location:home.html");
				$q = mysqli_query($con,"select Bbid from banquet_booking_user where time = '$time' AND date = '$date' AND no_of_slots = '$slot' AND end_time = '$end_time' AND total_bill = '$total' AND name = '$name' AND status = 1 AND booking_date = '$booked_date'");
				while($r4 = mysqli_fetch_array($q)){
				$bbid = $r4['Bbid'];
                email($mail,$bbid,$menu);
                session_destroy();
				}
			}
			else{
				echo mysqli_error($con);
			}
		
		}
        else{
            //header("location:home.html");
        }
	?>

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
    <!-- <script src="js/contact-form-script.js"></script> -->
    <script src="js/custom.js"></script>
</body>
</html>
<?php 

    function email($email , $bbid, $menu){
            require 'db.php';            
            $to = $email;
			$subject = "Banquet Booking Confirmation - Yajman Restaurant & Banquet";
			$exec = mysqli_query($con,"select * from banquet_booking_user where Bbid = $bbid"); 
            while($r= mysqli_fetch_array($exec))
            {   
                    $name = $r['name'];
                    $plan = $r['mbid'];
                    $slot = $r['no_of_slots'];
                    $total = $r['total_bill'];
                    $extra = $r['extra_services'];
                    
                $exec1 = mysqli_query($con,"select * from banquet_plans where mbid = $plan");
                while($r1 = mysqli_fetch_array($exec1))
                {
                        $plan_name = $r1['plan_name'];
                        $price = $r1['price'];
                        $feture_list = $r1['feature_list'];
                        $message = '<html>
    <head style="margin: 0;">

    <!--[if gte mso 9]><xml>
    <o:OfficeDocumentSettings>
    <o:AllowPNG/>
    <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
    </xml><![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" style="margin: 0;">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" style="margin: 0;">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" style="margin: 0;">
    <title style="margin: 0;">Banquet Confirmation</title>

    <!--[if gte mso 9]>
    <style>
    #tableForOutlook {
    width:600px;
    }
    .space{ display:none !important;}
    </style>
    <![endif]-->
    </head>

    <body style="background-color: #f0f0f1; font-family: "Avenir Next", "Avenir", open sans, Helvetica; margin: 0; padding: 0;">
        <table border="0" cellpadding="0" cellspacing="0" style="margin: 0;" width="100%">
            <tbody>
                <tr style="margin: 0;">
                    <td align="center" style="margin: 0; vertical-align: top;" valign="top">
                        <table cellpadding="0" cellspacing="0" class="wrapper" style="margin: 10px auto 0px auto; max-width: 600px; min-width: 300px;" width="100%">
                            <tbody>
                                <tr style="margin: 0;">
                                    <td style="margin: 0; vertical-align: top;">
                                        <table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" style="margin: 0;" width="100%">
                                            <tbody>
                                                <tr style="margin: 0;">
                                                    <td style="margin: 0; vertical-align: top;" width="10">&nbsp;</td>
                                                    <td style="margin: 0; vertical-align: top;">
                                                        <table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" style="margin: 0px 0px 14px 0px;" width="100%">
                                                            <tbody>
                                                                <tr style="margin: 0;">
                                                                    <td style="margin: 0; vertical-align: top;">
                                                                        <table cellpadding="0" cellspacing="0" style="margin: 0;" width="100%">
                                                                            <tbody>
                                                                                <tr class="content" style="margin: 0;">
                                                                                    <td style="margin: 0; vertical-align: top;">
                                                                                        <table cellpadding="0" cellspacing="0" style="margin: 0;" width="100%">
                                                                                            <tbody>
                                                                                                <tr style="margin: 0;">
                                                                                                    <td height="10" style="margin: 0; vertical-align: top;">
                                                                                                        &nbsp;</td>
                                                                                                </tr>
                                                                                                <tr style="margin: 0;">
                                                                                                    <td align="center" style="margin: 0; vertical-align: top;">
                                                                                                        <span class="sg-image" data-imagelibrary="%7B%22width%22%3A%2274px%22%2C%22height%22%3A%2232%22%2C%22alt_text%22%3A%22logo%22%2C%22alignment%22%3A%22%22%2C%22border%22%3A0%2C%22src%22%3A%22cid%3AblackLogo%22%2C%22link%22%3A%22https%3A//www.joinhoney.com%22%2C%22classes%22%3A%7B%22sg-image%22%3A1%7D%7D"><a href="#" style="margin: 0;"><img alt="logo" border="0" height="32" src="https://yajmanrestaurant.com/images/logo-y.jpg" style="margin: 0px; vertical-align: top; width:200px; height: 75px;" width="74px"></a></span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr style="margin: 0;">
                                                                                                    <td height="10" style="margin: 0; vertical-align: top;">
                                                                                                        &nbsp;</td>
                                                                                                </tr>
                                                                                                <tr style="margin: 0;">
                                                                                                    <td align="center" style="margin: 0; vertical-align: top;">
                                                                                                        <span class="sg-image" data-imagelibrary="%7B%22width%22%3A%22100%25%22%2C%22height%22%3A%22auto%22%2C%22alt_text%22%3A%22honeygold%22%2C%22alignment%22%3A%22%22%2C%22border%22%3A0%2C%22src%22%3A%22cid%3AheaderCompLg%22%2C%22classes%22%3A%7B%22sg-image%22%3A1%7D%7D"><img alt="honeygold" height="auto" src="https://yajmanrestaurant.com/images/banquet_final.jpg" style="height: auto; margin: 0; max-width: 580px; vertical-align: top; width: 70%;border-radius: 20px;" width="100%"></span>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr style="margin: 0;">
                                                                                                    <td height="40" style="margin: 0; vertical-align: top;">
                                                                                                        &nbsp;</td>
                                                                                                </tr>
                                                                                                <tr style="margin: 0;">
                                                                                                    <td style="margin: 0; vertical-align: top;">
                                                                                                        <table bgcolor="#ffffff" cellpadding="0" cellspacing="0" class="content-wrapper" style="margin: 0; padding: 0px 45px;" width="100%">
                                                                                                            <tbody>
                                                                                                                <tr style="margin: 0;">
                                                                                                                    <td colspan="3" height="20" style="margin: 0; vertical-align: top;">
                                                                                                                        &nbsp;
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr style="margin: 0;">
                                                                                                                    <td align="center" style="margin: 0; vertical-align: top;">
                                                                                                                        <table cellpadding="0" cellspacing="0" style="margin: 0; max-width: 417px;" width="100%">
                                                                                                                            <tbody>
                                                                                                                                <tr style="margin: 0;">
                                                                                                                                    <td align="center" colspan="2" style="margin: 0; vertical-align: top;">
                                                                                                                                        <div class="text2" style="color: #9711a3; font-family: "AvenirNext-DemiBold", "Avenir", open sans, Helvetica; font-size: 28px; font-weight: 900; line-height: 1.6; margin: 0; padding: 0;">
                                                                                                                                            Banquet
                                                                                                                                            Booking
                                                                                                                                            Confirmation
                                                                                                                                        </div>
                                                                                                                                        <div class="text3" style="color: #292a2a; font-family:  "AvenirNext-DemiBold", "Avenir", open sans, Helvetica; font-size: 20px; line-height: 1.6; margin: 0; padding: 0;">
                                                                                                                                            Order
                                                                                                                                            Details
                                                                                                                                            for
                                                                                                                                            <b>'.
                                                                                                                                        $name
                                                                                                                                        .'</b>
                                                                                                                                        </div>
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                                <tr height="25" style="height: 25px; margin: 0;">
                                                                                                                                </tr>
                                                                                                                            </tbody>
                                                                                                                        </table>
                                                                                                                        <table cellpadding="0" cellspacing="0" style="font-size: 14px; margin: 0px auto;border-collapse: ;" width="100%">
                                                                                                                            <tbody>
                                                                                                                            
                                                                                                                            <tr style="margin: 0;border-radius: 12px;border: 1px solid rgba(0, 0, 0, 0.212);height: 20px;width: 100%;background-color: #fde1ff;">

                                                                                                                                    <td align="left" style="font-weight: 600; margin: 0; vertical-align: top;padding-left: 20px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;border: 0px solid ;">
                                                                                                                                        Banquet Booked For
                                                                                                                                    </td>
                                                                                                                                    <td align="center" style="margin: 0; vertical-align: top;">
                                                                                                                                        '.
                                                                                                                                        date('d/m/Y',strtotime($r['date']))
                                                                                                                                        .'
                                                                                                                                    </td>
                                                                                                                                    <td align="right" style="margin: 0; vertical-align: top;border-top-right-radius: 10px;padding-right: 20px; border-bottom-right-radius: 10px;">
                                                                                                                                        
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                                <tr style="margin: 0;border-radius: 12px;border: 1px solid rgba(0, 0, 0, 0.212);height: 20px;width: 100%;background-color: #fde1ff;">

                                                                                                                                    <td align="left" style="font-weight: 600; margin: 0; vertical-align: top;padding-left: 20px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;border: 0px solid ;">
                                                                                                                                        Banquet Timing
                                                                                                                                    </td>
                                                                                                                                    <td align="center" style="margin: 0; vertical-align: top;">
                                                                                                                                        '.
                                                                                                                                        date('h:i:s A',strtotime($r['time']))
                                                                                                                                        .'
                                                                                                                                    </td>
                                                                                                                                    <td align="right" style="margin: 0; vertical-align: top;border-top-right-radius: 10px;padding-right: 20px; border-bottom-right-radius: 10px;">
                                                                                                        
                                                                                                                                        '.date('h:i:s A',strtotime($r['end_time'])).'
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                                
                                                                                                                                <tr style="margin: 0;border-radius: 12px;border: 1px solid rgba(0, 0, 0, 0.212);height: 20px;width: 100%;"></tr>

                                                                                                                                <tr  style="margin: 0;border-radius: 12px;border: 1px solid rgba(0, 0, 0, 0.212);height: 20px;width: 100%;">
                                                                                                                                    <td></td>
                                                                                                                                    <td align="center" style="font-weight: 600;margin:0; vertical-align: top; ">Booked Plan Details </td>
                                                                                                                                </tr>
                                                                                                                                <tr style="margin: 0;border-radius: 12px;border: 1px solid rgba(0, 0, 0, 0.212);height: 20px;width: 100%;"></tr>
                                                                                                                                <tr style="margin: 0;border-radius: 12px;border: 1px solid rgba(0, 0, 0, 0.212);height: 20px;width: 100%;background-color: #fde1ff;">

                                                                                                                                    <td align="left" style="font-weight: 600; margin: 0; vertical-align: top;padding-left: 20px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;border: 0px solid ;">
                                                                                                                                        '.$plan_name.'
                                                                                                                                    </td>
                                                                                                                                    <td align="center" style="margin: 0; vertical-align: top;">
                                                                                                                                        '.
                                                                                                                                        $feture_list
                                                                                                                                        .'
                                                                                                                                    </td>
                                                                                                                                    <td align="right" style="margin: 0; vertical-align: top;border-top-right-radius: 10px;padding-right: 20px; border-bottom-right-radius: 10px;">
                                                                                                                                        ₹
                                                                                                                                        '.number_format($slot * $price).'
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                                <tr style="margin: 0;border-radius: 12px;border: 1px solid rgba(0, 0, 0, 0.212);height: 20px;width: 100%;background-color: #fde1ff;">

                                                                                                                                    <td align="left" style="font-weight: 600; margin: 0; vertical-align: top;padding-left: 20px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;border: 0px solid ;">
                                                                                                                                        Food Billing 
                                                                                                                                    </td>
                                                                                                                                    <td align="center" style="margin: 0; vertical-align: top;">
                                                                                                                                        ₹ '.
                                                                                                                                        $r['menu_plan'].' * '.$r['person']
                                                                                                                                        .'
                                                                                                                                    </td>
                                                                                                                                    <td align="right" style="margin: 0; vertical-align: top;border-top-right-radius: 10px;padding-right: 20px; border-bottom-right-radius: 10px;">
                                                                                                                                        ₹
                                                                                                                                        '.number_format($r['menu_plan'] * $r['person']).'
                                                                                                                                    </td>
                                                                                                                                </tr>';
                                                                                                                                $concat = mysqli_query($con, "select * from banquet_menu_plan where price = $menu");
                                                                                                                                if(mysqli_num_rows($concat) > 0){
                                                                                                                                    
                                                                                                                                    while($r5 = mysqli_fetch_array($concat)){
                                                                                                                                        
                                                                                                                                        $between_msg = '<tr style="margin: 0;border-radius: 12px;border: 1px solid rgba(0, 0, 0, 0.212);height: 20px;width: 100%;background-color: #fde1ff;">
        
                                                                                                                                            <td align="left" style="font-weight: 600; margin: 0; vertical-align: top;padding-left: 20px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;border: 0px solid ;">
                                                                                                                                                Food Plan 
                                                                                                                                            </td>
                                                                                                                                            <td align="center" colspan="2" style="margin: 0; vertical-align: top;">
                                                                                                                                                 '.
                                                                                                                                                $r5['menu']
                                                                                                                                                .'
                                                                                                                                            </td>
                                                                                                                                        </tr>';    
                                                                                                                                    }
                                                                                                                                    
                                                                                                                                }
                                                                                                                                if($total > (($price * $slot) + ($r['menu_plan'] * $r['person'])))
                                                                                                                                {   $message.'
                                                                                                                                
                                                                                                                                <tr style="margin: 0;border-radius: 20px;border: 0px solid rgba(0, 0, 0, 0.212);height: 20px;width: 100%;background-color: #fde1ff;">

                                                                                                                                    <td align="left" style="font-weight: 600; margin: 0; vertical-align: top;padding-left: 20px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;border: 0px solid ;">
                                                                                                                                        '.$extra.'
                                                                                                                                    </td>
                                                                                                                                    <td align="center" style="margin: 0; vertical-align: top;">
                                                                                                                                    

                                                                                                                                    </td>
                                                                                                                                    <td align="right" style="margin: 0; vertical-align: top;border-top-right-radius: 10px;padding-right: 20px; border-bottom-right-radius: 10px;">
                                                                                                                                        ₹
                                                                                                                                        '.($total - ($price * $slot)).'
                                                                                                                                    </td>

                                                                                                                                </tr>';
                                                                                                                        
                                                                                                                                }
                                                                                                                                else{
                                                                                                                                    $message;
                                                                                                                                }
                                                                                                                    
                                                                                                                    $end_message = '</tbody>
                                                                                                                        </table>

                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr style="margin: 0;">
                                                                                                    <td colspan="3" height="20" style="margin: 0; vertical-align: top;">
                                                                                                        &nbsp;</td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr style="margin: 0;">
                                                                                    <td align="center" style="margin: 0; vertical-align: top;">
                                                                                        <table style="background-color: #feffea; border-top: 1px solid #d8d8d8; margin: 0; text-align: center; width: 60%;" width="60%">
                                                                                            <tbody>
                                                                                                <tr height="20" style="height: 20px; margin: 0;">
                                                                                                </tr>
                                                                                                <tr style="margin: 0;">
                                                                                                    <td class="text4" style="color: #292a2a; font-family:  "AvenirNext-DemiBold", "Avenir", open sans, Helvetica; font-size: 18px; font-weight: bold; line-height: 1.6; margin: 0; padding: 0; vertical-align: top;">
                                                                                                        Total (Inclusive of Taxes):  ₹ '.number_format($total).'
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr height="10" style="height: 10px; margin: 0;">
                                                                                                </tr>
                                                                                                <tr style="margin: 0;">
                                                                                                    <td style="font-size: 14px; margin: 0; vertical-align: top;">
                                                                                                        <a href="#" style="color: #292a2a; margin: 0;">Managed
                                                                                                            By Yajman
                                                                                                            Restaurant &amp; Banquet
                                                                                                        </a>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr height="25" style="height: 25px; margin: 0;">
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                        <table cellpadding="0" cellspacing="0" style="margin: 0; padding-top: 40px; width: 80%;">
                                                                                            <tbody>
                                                                                                <tr style="margin: 0;">
                                                                                                    <td align="left" colspan="2" style="margin: 0; vertical-align: top;">
                                                                                                        <div class="text3" style="color: #292a2a; font-family:  "AvenirNext-DemiBold", "Avenir", open sans, Helvetica; font-size: 14px; line-height: 1.6; margin: 0; padding: 0;">
                                                                                                            Congratulations!
                                                                                                            <b>'.$name.'</b>,
                                                                                                            your
                                                                                                            booking for banquet is
                                                                                                            confirmed
                                                                                                            by
                                                                                                            Yajman
                                                                                                            Banquet.
                                                                                                        </div>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr height="25" style="height: 25px; margin: 0;">
                                                                                                </tr>
                                                                                            </tbody>                                                                                    
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr height="25" style="height: 25px; margin: 0;">
                                                                </tr>

                                                                <tr style="margin: 0;">

                                                                </tr>
                                                                <tr style="margin: 0;">

                                                                </tr>
                                                                <tr style="margin: 0;">

                                                                </tr>
                                                                <tr style="margin: 0;">

                                                                </tr>
                                                                <tr style="margin: 0;">

                                                                </tr>
                                                                <tr style="margin: 0;">

                                                                </tr>
                                                                <tr height="30" style="height: 30px; margin: 0;">
                                                                </tr>
                                                                <tr align="center" style="margin: 0;">

                                                                </tr>
                                                                <tr height="30" style="height: 30px; margin: 0;">
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td class="hide-mobile" style="margin: 0; vertical-align: top;" width="10">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <table border="0" cellpadding="0" cellspacing="0" style="margin: 0;" width="100%">
            <tbody>
                <tr class="footer" style="margin: 0;">
                    <td align="center" style="margin: 0; text-align: center; vertical-align: top;">
                        <table cellpadding="0" cellspacing="0" class="content-wrapper" style="margin: 0; padding: 0px 45px; font-family:  "AvenirNext-DemiBold", "Avenir", "open sans", "Helvetica";font-size: 10px;line-height: 1.6;color: #9fa0a4; text-align: center;" width="100%">
                            <tbody>
                                <tr style="margin: 0;">

                                </tr>
                            </td>
                                </tr>
                                <tr height="15" style="height: 15px">
                                </tr>
                                <tr>
                                    <td style="font-family: "AvenirNext-DemiBold", "Avenir", "open sans", "Helvetica";">Sent with
                                        Care from Yajman Restaurant</td>
                                </tr>
                                <tr>
                                    <td style="font-family: "AvenirNext-DemiBold", "Avenir", "open sans", "Helvetica";">Yajman Restaurant, Dharm Nagar 2, Sabarmati, Ahmedabad</td>
                                    <td height="28" style="height: 38px; margin: 0;vertical-align: top;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <a href="tel:+918469000683" target="_blank"><td style="font-family: "AvenirNext-DemiBold", "Avenir", "open sans", "Helvetica"; color:#b13476;">Any Queries? Ring your phone to : <br>+91 84690 00683, +91 81281 41047</a></td>
                                    <td height="28" style="height: 38px; margin: 0;vertical-align: top;">&nbsp;</td>


                                </tr>
                                <tr>
                                    <a href="https://yajmanrestaurant.com" target="_blank"><td style="font-family: "AvenirNext-DemiBold", "Avenir", "open sans", "Helvetica"; color:#b13476;">Visit our Website : yajmanrestaurant.com</a></td>
                                </tr>
                                <tr height="15" style="height: 15px">
                                </tr>

                                <tr style="margin: 0;">
                                    <td height="30" style="height: 30px; margin: 0;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>';
             
            $headers = "MIME-Version: 1.0" . "\r\n";
          	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
			$headers .= 'From: <banquet_yajman@yajmanrestaurant.com>' . "\r\n";
			$headers .= 'Cc: <restaurantyajman@gmail.com>' . "\r\n";

          
          
			if (mail($to,$subject,$message.$between_msg.$end_message,$headers)) {
			    echo "<script>alert('Check Mail. Please Check Spam Folder if you did not receive mail.');</script>";
            } else {
              echo "<script>alert('Oops!, Mail Not sent');</script>";
            }
             }
            }}
?>