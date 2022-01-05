<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
<link rel="stylesheet" href="styles1.css" />
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

	
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

    <!--[if lt IE 9] -->
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
    <!-- Cart Script -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<style>
		table th{
    	  background-color: #efefef;
		}
		table, th, tr, td{
			text-align: center;
			padding: 5px;
			border-collapse : collapse;
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
						<li class="nav-item active"><a class="nav-link" href="takeaway.php">Takeaway</a></li>
						<li class="nav-item"><a class="nav-link" href="banquet.php">Banquet</a></li>
						<li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->

	<div style="padding:60px;">
	</div>

	<!-- Start Gallery -->
	<div class="gallery-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Gallery</h2>
						<p>Food Dishes and Banquet Designs at a glance.</p>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12 text-center">
					<h2 style="color:#b13476"> <b><u>Food Dishes </b></u></h2>
				</div>
			</div>
			<div class="tz-gallery">
				<div class="row">
					<div class="col-sm-12 col-md-4 col-lg-4">
						<a class="lightbox" href="images/gallery-img-01.jpg">
							<img class="img-fluid" src="images/gallery-img-01.jpg" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="images/gallery-img-02.jpg">
							<img class="img-fluid" src="images/gallery-img-02.jpg" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="images/gallery-img-03.jpg">
							<img class="img-fluid" src="images/gallery-img-03.jpg" alt="Gallery Images">
						</a>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- End Gallery -->


	<!-- Start Services -->
	<div id="services">
		<div class="container-fluid p-5" style="background-color:#dcdcdc; border-top:3px solid #b13476; border-bottom:3px solid #b13476;">
			<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Our Services </h2>
						<h2 style="color : #b13476">Takeaway Orders & Banquet Hall</h2>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 text-center" style="border-right:2px solid black">
					<div class="inner-column" style="text-align: center;">
						<p>Takeaway Orders Service is available at our restaurant. </p>
						<a class="btn btn-lg btn-circle btn-outline-new-white" href="takeaway.php">Order Now</a>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 text-center" >
					<div class="inner-column" style="text-align: center;">
						<p>Attractive Banquet Hall for all your ceremonies. </p>
						<a class="btn btn-lg btn-circle btn-outline-new-white" href="banquet.php">Book Now</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<!-- End Services -->

    <!-- Retieve Menu Details & Cart -->
    <?php
			require 'db.php';

			if (isset($_POST["add"])){
                if (isset($_SESSION["cart"])){
					$item_array_id = array_column($_SESSION["cart"],"product_id");
					if (!in_array($_GET["id"],$item_array_id)){
						$count = count($_SESSION["cart"]);

						$item_array = array(
							'product_id' => $_GET["id"],
							'item_name' => $_POST["hidden_name"],
							'product_price' => $_POST["hidden_price"],
							'item_quantity' => $_POST["quantity"],
						);
						$_SESSION["cart"][$count] = $item_array;
						print_r($_SESSION['cart']);
						echo '<script>window.location="#cart-1"</script>';
					}else{
						echo '<script>alert("Product is already Added to Cart")</script>';
						echo '<script>window.location="takeaway.php"</script>';
					}
				}else{
					$item_array = array(
						'product_id' => $_GET["id"],
						'item_name' => $_POST["hidden_name"],
						'product_price' => $_POST["hidden_price"],
						'item_quantity' => $_POST["quantity"],
					);
					$_SESSION["cart"][0] = $item_array;
				}
			}

			if (isset($_GET["action"])){
				if ($_GET["action"] == "delete"){
					foreach ($_SESSION["cart"] as $keys => $value){
						if ($value["product_id"] == $_GET["id"]){
							unset($_SESSION["cart"][$keys]);
							echo '<script>alert("Product has been Removed...!")</script>';
							echo '<script>window.location="takeaway.php"</script>';
						}
					}
				}
			}
	?>

    <div class="container" style="width: 100%">
        <h2 style="margin-top:2%;"> Menu Items</h2>
        <?php
            $query = "SELECT * FROM menu ORDER BY priority ASC ";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0) {
				//while($row = mysqli_fetch_array($result)){
            ?>

					<div class="cards-section">
						<?php while($row = mysqli_fetch_array($result)){ ?>
                        <form method="post" action="takeaway.php?action=add&id=<?php echo $row['mid']; ?>">		
								<div class="pro-card" id="card-1">
									<div class="imgBx">
										<img src="" />
									</div>
									<div class="contentBx">
										<h2 style="text-align: center;padding: 2%;"> <?php echo $row['name']; ?></h2>
										<div class="count-items">
											<h3>Price :</h3>
											<span><?php echo $row['price']; ?></span>
										</div>
										<div class="quan-count">
											<button  data-itemid="<?php echo $row['mid']; ?>" class="plus-btn additem" value="+"> + </button>
											<div class="counter">
											<input type="number" id="<?php echo 'item'.$row['mid']; ?>" name="quantity" class="form-control input-number" value="1" min="1" max="10" readonly>
											</div>
											<button  id="minus" data-minitemid="<?php echo $row['mid']; ?>" class="min-btn minusitem"> - </button>
										</div>
										<input type="hidden" name="hidden_name" value="<?php echo $row['name']; ?>">
                                		<input type="hidden" name="hidden_price" value="<?php echo $row['price']; ?>">
									</div>
                                	<input type="submit" name="add" style="margin-top: 5px;background: #b13476;" class="btn btn-success" value="Add to Cart">
								</div>
						</form>  
						<?php } } ?>
					</div>
					
<script>
$(document).on('click', '.additem', function(e){
		e.preventDefault();
		const mid = $(this).data('itemid');
		const id = '#item' + mid;
		const getval = $(id).val();
		$(id).val(Number(getval) + 1);
	});
	$(document).on('click', '.minusitem', function(e){
		e.preventDefault();
		const mid = $(this).data('minitemid');
		const id = '#item' + mid;
		const getval = $(id).val();
		if (getval > 0) {
			$(id).val(Number(getval) - 1);
		}
	});
</script>
        <div style="clear: both"></div>
        <form method = "post" action="takeaway-1.php">
            <h3 class="title2">Shopping Cart Details</h3>
            <div class="table-responsive">
                <table class="table" id="cart-1">
                <tr>
                    <th width="30%">Product Name</th>
                    <th width="10%">Quantity</th>
                    <th width="13%">Price Details</th>
                    <th width="10%">Total Price</th>
                    <th width="17%">Remove Item</th>
                </tr>

                <?php
                    if(!empty($_SESSION["cart"])){
                        $total = 0;
                        foreach ($_SESSION["cart"] as $key => $value) {
                            ?>
                            <tr>
                                <td><?php echo $value["item_name"]; ?></td>
                                <td><?php echo $value["item_quantity"]; ?></td>
                                <td><?php echo $value["product_price"]; ?> &#8377;</td>
                                <td>
                                    <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?> &#8377;</td>
                                <td><a href="takeaway.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                            class="text-danger">Remove Item</span></a></td>

                            </tr>
                            <?php
                            $total = $total + ($value["item_quantity"] * $value["product_price"]);
                        }
                            ?>
                            <tr>
                                <td colspan="3" align="right" style="text-align: right; padding-right:7%;">Total</td>
                                <td align="right"> <?php echo number_format($total, 2); ?> &#8377;</td>
                                <td></td>
                            </tr>
                            <?php
                        }
                        $_SESSION['total'] = $total;
                    ?>
                </table>
            </div>
            <div class="col-md-12">
                <div class="submit-button text-center">
                    <input type="submit" class="btn btn-common" id="checkAvability" name="submit" value="Personal Details" />
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                </div>
			</div>
            </form>

    </div>
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
