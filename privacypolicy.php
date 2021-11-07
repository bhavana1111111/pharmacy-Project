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
		<!-- 	<dir class="col-md-6 offer">
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
		
	<div class="col-md-12"><h2>Privacy Policy</h2><hr><p>HealthCode cares about you and knows that you care how your information is used and or may be used or shared. By visiting https://HealthCode.in/, you are accepting and consenting to the practices described in this Privacy Policy. This policy is issued by Axelia Solutions Private Limited.

This document is an electronic record in terms of Information Technology Act, 2000 and rules there under as applicable and the amended provisions pertaining to electronic records in various statutes as amended by the Information Technology Act, 2000. This electronic record is generated by a computer system and does not require any physical or digital signatures.

This document is published in accordance with the provisions of Rule 3 (1) of the Information Technology (Intermediaries guidelines) Rules, 2011 that require publishing the rules and regulations, privacy policy and Terms of Use for access or usage of www.HealthCode.in website and its mobile applications.

By using this Website, you agree to the terms and conditions of this Privacy Policy. If you do not agree with the Terms and Conditions of this Privacy Policy, please do not proceed further to use this Website. This Privacy Policy is subject to change at any time without notice. To make sure you are aware of any changes, please review this policy periodically. This Privacy Policy is incorporated into and subject to the Terms of Use.

For the purpose of this Privacy Policy, wherever the context so requires "You" or "User" shall mean any natural or legal person who has agreed to become a buyer on the Website by providing Personal Information (defined below) while registering on the Website as a registered User using the computer systems..</p></div><br><br><br><br><br>

	<div class="col-md-12" ><h3>1.What Personal Information About You Does Healthcode collect?</h1><p>The information we learn from customers helps us personalise and continuously improve your experience at HealthCode. Your information so collected may be used to assist retailers in handling orders, delivery through your agent and ancillary services, process payments, communicate with you about orders, products, services and promotional offers, update our records and generally maintain your accounts with us. We also use this information to improve our platform, prevent or detect fraud or abuses of our website and enable third parties to carry out technical, logistical or other functions on our behalf.Automatic Information: We receive and store certain types of information whenever you interact with us. For example, we obtain certain types of information when your Web browser accesses HealthCode.in or advertisements and other content served by or on behalf of HealthCode.in on other Web sites. Click here (OS type and version, App version, Device brand, Browser and its version details, User Agent) to see examples of the information we receive. We may also receive/store information about your location and your mobile device, including a unique identifier for your device. We may use this information for internal analysis and to provide you with location-based services, such as advertising, search results, and other personalized content.</p></div><br><br><br><br>
<br>
	
<div class="col-md-12"><h3>2. How Secure Is Information About Me?</h3><hr><p>We maintain electronic, physical and procedural safeguards in connection with the collection, storage and disclosure of personal information (including sensitive personal information). Our security procedures mean that we may occasionally request proof of identity before we disclose personal information to you.
We work to protect the security of your information during transmission by using Secure Sockets Layer (SSL) software, which encrypts information you input in addition to maintaining security of your information as per the International Standard IS/ISO/IEC 27001 on "Information Technology Security Techniques Information Security Management System-Requirements".</p></div>
<br><br><br><br><br>


<div class="col-md-12"><h3>3. What Information Can I Access?</h3><hr><p>HealthCode.in gives you access to a broad range of information about Your account and Your interactions with HealthCode.in for the limited purpose of viewing and, in certain cases, modifying, deleting information provided to HealthCode. You have the option to opt-out of optional services such as receiving promotional materials etc. and should You desire to opt-in to such services at the time of signing up You can choose do so.
This list will change as our website evolves.</p></div>

<div class="col-md-12"><h3>4.Are Children Allowed to Use HealthCode.in?</h3><hr><p>Use of HealthCode.in is available only to persons who can form a legally binding contract under the Indian Contract Act, 1872. If you are a minor i.e. under the age of 18 years, you may use HealthCode.in only with the involvement of a parent or guardian.</p></div>


</div>
</body>
</html>