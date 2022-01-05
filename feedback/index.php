<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Site Metas -->
    <title>Feedback Form - Yajman Restaurant and Banquet</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon-icon.png" type="image/x-icon">
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


    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--Feedback Styleshhet -->
    <link rel="stylesheet" href="css/emoji_feedback.css" >
    <style>
        .rating-star input{
            display:none;
        }
        .terrible{ background-image: url('https://yajmanrestaurant.com/images/1star.jpg'); }
        .moderate{ background-image: url('https://yajmanrestaurant.com/images/2star.jpg'); }  
        .bad{ background-image: url('https://yajmanrestaurant.com/images/3star.jpg'); }
        .good{ background-image: url('https://yajmanrestaurant.com/images/4star.jpg'); }
        .excellent{ background-image: url('https://yajmanrestaurant.com/images/5star.jpg'); }

    </style>

</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.html">
					<img src="images/logo-y.jpg" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="takeaway.html">Takeaway</a></li>
						<li class="nav-item"><a class="nav-link" href="banquet.html">Banquet</a></li>
						<li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->

	<div style="padding:70px;">
	</div>

	<!-- Start Contact -->
	<div class="contact-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2 style="color:#b13476">Your Feedback Is Valuable To Us</h2>
						<p>Please spare a minute to give your feedback.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<form id="contactForm" method="post" action="#">
						<div class="row">
							<div class="col-md-12 p-2">
								<div class="form-group">
									<span class="field-title" style="font-size:26px"> Your Name (optional) </span>
									<input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
									<div class="help-block with-errors"></div>
								</div>
							</div>

							<div class="col-md-12 p-2">
								<div class="form-group">

										<span class="field-title" style="font-size:26px"> How well you are satisfied with our services ? </span>
										<div class="row text-center">
											<table class="col-lg-10 col-sm-12 col-md-12 table-responsive table-borderless">
											  <thead>
											    <tr>
											            <th scope="col" colspan="2"> <input type="radio" id="terrible" name="rating" value="terrible"> <label class="ratingcard terrible" for="terrible"></label></th>
														<th scope="col" colspan="2"> <input type="radio" id="bad" name="rating" value="bad">  <label class="ratingcard bad" for="bad"></label></th>
														<th scope="col" colspan="2"> <input type="radio" id="moderate" name="rating" value="moderate"> <label class="ratingcard moderate" for="moderate"></label></th>
														<th scope="col" colspan="2"> <input type="radio" id="good" name="rating" value="good"> <label class="ratingcard good" for="good"></label></th>
														<th scope="col" colspan="2"> <input type="radio" id="excellent" name="rating" value="excellent"> <label class="ratingcard excellent" for="excellent"></label></th>
											        
											   </tr>
											  </thead>
											</table>
										</div>

								</div>
							</div>
							<div class="col-md-12 p-2">
								<div class="form-group">
									<span class="field-title" style="font-size:26px"> Your Review for Yajman Restaurant & Banquet</span>
									<textarea class="form-control" id="message" placeholder="Your Review" name="comment" rows="4"></textarea>
									<div class="help-block with-errors"></div>
								</div>
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
						<a class="btn btn-lg btn-circle btn-outline-new-white" style="font-size:15px; padding:22px; border-radius:35px; width:200px;" href="index.html">Visit our Website</a>
					</div>
			</div>

		</div>
	</div>
	<!-- End Contact -->
	<?php
	    date_default_timezone_set('Asia/Kolkata');
	    if(isset($_POST['submit'])){
	        $rating = $_POST['rating'];
	        $name = $_POST['name'];
	        $comment = $_POST['comment'];
	        
	        if($rating != ''){
	            require 'db.php';
	            $today = date('Y-m-d H:i:s');
	            $q = mysqli_query($con,"insert into feedback(name,date,feedback,comments) values('$name','$today','$rating','$comment')");
	            if($q)
	                echo '<script>alert("Thank You, For Your Feedback");</script>';
	           else
	                echo '<script>alert("Submit Again");</script>';
	        }
	    }
	?>

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
						<p class="company-name">Rights Reserved. &copy; 2020 <a href="./index.html">&nbsp;Yajman Restaurant & Banquet</a> <br>Managed By 'J The Vision' Group</p>
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
