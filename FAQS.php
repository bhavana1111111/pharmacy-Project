<?php
include("includes/db.php");
include("functions/functions.php");

?>
<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</script>
<style type="text/css">
	
	#up1
	{
		margin-left:center;
		

	}
	hr
	{	 border-top: 1px solid black;

	}
	p
	{
		font-size: 18px;
		color: #9b9b9b;
		padding: 10px 0;
		line-height: 30px;
	}



</style>
</head>
<body>
<div id="top">		<!--top--->
		<div class="container">		<!--container--->
			<!-- <dir class="col-md-6 offer">
				<a href="#" class="btn btn-success btn-sm">
					<?php 
					//if (!isset($_SESSION['customer_email'])) 
					{
						//echo "Welcome Guest";
					}
					//else
					{
						//echo "Welcome: ".$_SESSION['customer_email']."";
					} ?>
				</a>
				<a href="#">Shopping Cart Total price: INR <?php totalPrice(); ?>, Total item:  <?php item(); ?></a>
			</dir> -->
			<div class="col-md-6">
				<ul class="menu">
					<li>
						<a href="cust_reg.php">Register</a>
					</li>
					<li>
						<?php
							if (!isset($_SESSION['customer_email'])) {
								echo "<a href='checkout.php'>My Account</a>";
							}
							else
							{
								echo "<a href='customer/my_account.php?my_order'>My Account</a>";
							}
						?>
					</li>
					<li>
						<a href="cart.php">Goto Cart</a>
					</li>
					<li>
						<?php
							if (!isset($_SESSION['customer_email'])) {
								echo "<a href='../checkout.php'>Login</a>";
							}
							else
							{
								echo "<a href='../logout.php'>Logout</a>";
							}

						?>
					</li>
				</ul>
				
			</div>
		</div>
	</div>		<!--top end--->
	<div class="navbar navbar-default" id="navbar"> <!----navbar default start-->
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand home" href="index.php">
					<img src="images/pharma.png" class="hidden-xs">
					<img src="images/pharm.png" class="visible-xs">		<!---logo img--->
				</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
					<span class="sr-only">
						Toggle Navigation
					</span>
					<i class="fa fa-align-justify"></i>
				</button>
				<button type="button" class="navbar-toggle" data-toggle="navbar-toggle" data-target="#search">
					<span class="sr-only">
						
					</span>
					<i class="fa fa-search">
						
					</i>
				</button>
			</div>
			<div class="navbar-collapse collapse" id="navigation"><!---navbar collapse start--->
				<div class="padding-nav">
					<ul class="nav navbar-nav navbar-left">
						<li class="active">
							<a href="index.php">Home</a>
						</li>
						<li class="active">
							<a href="order_medi.php">Order Medicines</a>
						</li>
						<li class="active">
							<a href="health_prod.php">Healthcare Products</a>
						</li>
						<li class="active">
							<a href="diagnostic.php">Diagnostic Test</a>
						</li>
					</ul>
				</div>
				<a href="cart.php" class="btn btn-primary navbar-btn right">
					<i class="fa fa-shopping-cart"></i>
					<span>
						<?php item(); ?> items in cart!!
					</span>
				</a>
				<div class="navbar-collapse collapse-right">
					<button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#">
						<span class="sr-only">
							Toggle Search
						</span>
						<i class="fa fa-search"></i>
					</button>
				</div><!---navbar collapse end-->
				<div class="collapse clearfix" id="search">
					<form class="navbar-form" method="get" action="result.php">
						<div class="input-group">
							<input type="text" name="user_query" placeholder="search" class="form-control" required>
							<span>
								<button type="submit" value="search" class="btn btn-primary">
								<i class="fa fa-search"></i>
							</button>
						</span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>  <!---end of navbar--->

	
	
	<div class="col-md-12" id="up1">
		
	<div class="col-md-12"><h1>Frequently Asked Questions</h1><hr><p>We've tried to make using and searching Healthcode as simple and efficient as possible - and we'll keep refining the features and processes as we find better ways to help you get maximum benefit from the site. Please check the following FAQ's for possible answers to your queries.</p></div><br><br><br><br><br>

	<div class="col-md-12" ><h1>What are your hours of operation?</h1><hr><p>Our website is open 24 hours a day, 7 days a week. Call Centre support is available from Monday to Saturday, 08:30 am to 09:00 pm IST and on Sunday's From 09:00 am - 05:00 pm IST.</p></div><br><br><br><br>
<br>
	
<div class="col-md-12"><h1>How do I contact Pharmacists at HealthCode?</h1><hr><p>To contact our pharmacists online, you can send your questions by using either “Ask Our Pharmacist Your Questions” option available in all the drug information pages or by completing the form in the Contact Us section where “Ask Our Pharmacist Your Questions” should be selected. It’s a free service!</p></div>
<br><br><br><br><br>


<div class="col-md-12"><h1>Do you accept any Insurance Plans?</h1><hr><p>No, we do not accept any insurance plans. However, we can provide invoice and receipt towards your order to claim your insurance. But, in most cases, you will find our low-priced medications to be of great value compared with that of your insurance plan.</p></div><br><br><br><br><br>

<div class="col-md-12"><h1>Is it safe to use my credit/debit card at HealthCode?</h1><hr><p>Yes. HealthCode uses third-party payment processing services to process all credit/debit card payment transactions. These payment intermediaries are PCI-compliant, which is the most stringent level of certification standard that ensures all cardholders’ data is stored, processed and transmitted securely by using the industry standard encryption technology.</p></div>
<br><br><br><br><br>

<div class="col-md-12"><h1>What information do you need from me to process my order as fast as possible?</h1><hr><p>In order to process your order quickly, we need the following details from you:

Your billing/shipping information
Your payment details.</p></div>
<br><br><br><br><br>

<div class="col-md-12"><h1>Are all your product prices quoted in Indian Rupees?</h1><hr><p>Yes, all product prices quoted in our website are in Indian Rupees.</p></div>
<br><br><br><br><br>

<div class="col-md-12"><h1>How long will it take to deliver my order?</h1><hr><p>Delivery times may vary depending on the delivery location as well as the type of product you order.</p></div>
<br><br><br><br><br>

<div class="col-md-12"><h1>Is it possible to cancel my order after it has been charged?</h1><hr><p>No, you cannot cancel your order once your payment has been processed.</p></div>
<br><br><br><br><br>


</div>
</body>
</html>