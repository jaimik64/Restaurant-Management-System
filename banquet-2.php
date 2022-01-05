<?php
	session_start();
	if(isset($_SESSION['menu']) && isset($_SESSION['no']) && isset($_GET['mbid'])){}
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
			    <a href="banquet.php"> <i class="fa fa-shopping-cart icon1" style="color: #b13476; border: 2px solid #b13476"></i></a>
			    <a href="banquet-1.php"><i class="fa fa-calendar-alt icon1" style="color: #b13476; border: 2px solid #b13476"></i></a>
			    <a href="banquet-2.php"><i class="fas fa-user-circle icon1" style="color: black; border: 2px solid black"></i></a>
    		</div>
			</div>
		</div>
	</div>




  <!-- Products Section -->
    <section class="second-sect">
        <div class="main-section-categ">
            <div class="main-section-container">
                <div class="heading-title text-center">
                    <h1 style="margin-bottom:0px; font-size: 32px; color: #b13476">Slot Booking</h1>
					<p>Choose date, time and slot as per your choice.</p>
                </div>

				<div class="heading-title text-center">
                    <h1 style="margin-bottom:0px; font-size: 20px;"><b> NOTE : </b> You can choose only those slots which are not pre-booked. And Price mentioned previosly is per slot. </h1>
				</div>
			</div>
		</div>
    </section>


		<div class="contact-box">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<form id="contactForm1">
							<div class="row">
								<div class="col-md-12">
									<span class="field-title" > Select Date : </span>
									<div class="form-group">
										<input type="date" class="form-control" id="b-date" name="b-date"  placeholder="Select Date" data-error="Please Enter Date" required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<span class="field-title"> Select Starting Time : </span>
									<?php 
									    date_default_timezone_set('Asia/Kolkata'); 
									    $today = date('d-m-Y');
									?>
									<div class="form-group">
										<input type="time" placeholder="Select Time" id="time" class="form-control" step="3600" min="<?php echo $today; ?>" max="22:00" name="b-time" required data-error="Please Enter Time">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="col-md-12">
									<span class="field-title"> Select No. of Slots : (1 slot is of 1 hour)</span>
									<div class="form-group">
										<select class="custom-select d-block form-control" id="n-slots" onchange="findENdtime()" required data-error="Please Select No. of Slots" name="slot">
										  <option disabled selected>Select No. of Slots*</option>
										  <option value="1">1</option>
										  <option value="2">2</option>
										  <option value="3">3</option>
										  <option value="4">4</option>
										  <option value="5">5</option>
										</select>
										<div class="help-block with-errors"></div>
									</div>
                                </div>
								<div class="col-md-12">
									<span class="field-title"> Ending Time : </span>
									<div class="form-group">
										<input type="text" placeholder="Ending TIme" id="end_time" class="form-control" name="b-etime" value="4:00PM" readonly style="background-color: #d9d9d9; border: 1px solid black;">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<script>
									let s_time = document.querySelector('#time');
									let slot = document.querySelector('#n-slots');
		
									function findENdtime() {
										let str = $('#time').val();
										let hour = str.split(":");
										let e_time = $('#n-slots').val();
										let hr = Number(hour[0]) + Number(e_time);
										let min = Number(hour[1]);
										let finalEndTime = hr.toString() + ':' + min.toString();
										
										if(finalEndTime < '12:0' && finalEndTime >= '00:0'){
										    switch(finalEndTime){
										        case '08:0':
										            $('#end_time').val("08:00" + " AM");
										            break;
										        case '09:0':
										            $('#end_time').val("09:00" + " AM");
										            break;
										        case '10:0':
										            $('#end_time').val("10:00"+ " AM");
										            break;
										        case '11:0':
										            $('#end_time').val("11:00" + " AM");
										            break;
										      default:
										            $('#end_time').val(finalEndTime + " PM");
										    }
										}
										else if(finalEndTime < '24:0' && finalEndTime >= '12:0'){
										    switch(finalEndTime){
										        case '12:0':
										            $('#end_time').val("12:00" + " PM");
										            break;
										        case '13:0':
										            $('#end_time').val("01:00" + " PM");
										            break;
										        case '14:0':
										            $('#end_time').val("02:00" + " PM");
										            break;
										        case '15:0':
										            $('#end_time').val("03:00" + " PM");
										            break;
										        case '16:0':
										            $('#end_time').val("04:00" + " PM");
										            break;
										        case '17:0':
										            $('#end_time').val("05:00" + " PM");
										            break;
										        case '18:0':
										            $('#end_time').val("06:00" + " PM");
										            break;
										       case '19:0':
										            $('#end_time').val("07:00" + " PM");
										            break;
										       case '20:0':
										            $('#end_time').val("08:00" + " PM");
										            break;
										       case '21:0':
										           $('#end_time').val("09:00" + " PM");
										           break;
										        case '22:0':
										            $('#end_time').val('10:00' + " PM");
										            break;
										       case '23:0':
										           $('#end_time').val('11:00' + " PM");
										           break;
										       default:
										            $('#end_time').val(finalEndTime + " PM");  
										    }
										   // $('#end_time').val(finalEndTime + " PM");
										}
									}
								</script>
								<div class="col-md-12">
									<div class="submit-button text-center">
										<input type="submit" class="btn btn-common" id="checkAvability" name="submit" value="Check Availability"/>
										<div id="msgSubmit" class="h3 text-center hidden"></div>
										<div class="clearfix"></div>
									</div>
								</div>
								</div>
							</div>
						</form>
						
						<div class="text-center">
							<h2 class="text-warning">
								<strong id="showResvered"></strong>
							</h2>
						</div>
                        
					</div>
					<div class="row p-4">
							<div class="col-6 submit-button text-center">
								<a class="btn btn-lg btn-circle btn-outline-new-white" style="font-size:17px; padding:16px; border-radius:8px; width:130px;" href="banquet.php">Prev</a>
							</div>
							<div id = "so-nexttobutton">

							</div>	
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


	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- ALL PLUGINS -->
	
	<script>
			const newdate = new  Date();

			if (newdate.getDate() <= 9) {
					document.getElementById("b-date").min = `${newdate.getFullYear()}-${newdate.getMonth() + 1}-0${newdate.getDate()}` ;
			} else {
				document.getElementById("b-date").min = `${newdate.getFullYear()}-${newdate.getMonth() + 1}-0${newdate.getDate()}` ;
			}
			$('#checkAvability').click(function (e) { 
				e.preventDefault();
				const mbid = "<?php echo $_GET['mbid']; ?>";
				const bbid = document.getElementById('b-date').value;
				const btime = document.getElementById('time').value;
				const slot = document.getElementById('n-slots').value;
				
					var slotdata = [];
				slotdata.push(mbid);
				slotdata.push(bbid);
				slotdata.push(btime);
				slotdata.push(slot);
			
				var convertedtoJSON = JSON.stringify(slotdata);			
				let xhr = new XMLHttpRequest();
				let url = "check-avability.php";
			
				xhr.open("POST", url, true);
			
				xhr.setRequestHeader("Content-Type", "application/json");
			
				xhr.onreadystatechange = function () {
					if (xhr.readyState === 4 && xhr.status === 200) {
						const response = xhr.response;
						
						document.getElementById('showResvered').innerHTML = response;
						if(response == 'Yes, Slot is available'){
							let res = '';
							res += '<div class="col-6 submit-button text-center">';
							res += 	'<a class="btn btn-lg btn-circle btn-outline-new-white" style="font-size:17px; padding:16px; border-radius:8px; width:130px;" href="banquet-3.php" >Next</a>';
							res += '</div>';
							$('#so-nexttobutton').html(res);
				
						}
						else{
							$('#so-nexttobutton').html('');
						}
					}
				};
				var data = convertedtoJSON;
				xhr.send(data);
				
			});
	</script>

	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
