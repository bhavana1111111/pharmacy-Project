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
		
	<div class="col-md-12"><h1>Terms And Conditions</h1><hr><p>This document is an electronic record in terms of Information Technology Act, 2000 and rules there under as applicable and the amended provisions pertaining to electronic records in various statutes as amended by the Information Technology Act, 2000. This electronic record is generated by a computer system and does not require any physical or digital signatures.
	This document is published in accordance with the provisions of Rule 3 (1) of the Information Technology (Intermediaries guidelines) Rules, 2011 that require publishing the rules and regulations, privacy policy and Terms of Use for access or usage of www.healthcode.in website and its mobile applications.</p></div><br><br><br><br><br>

	<div class="col-md-12" ><h1>Product & Service</h1><hr><p>The Website is a platform that facilitates the online requisition by the user for purchase of medicines and wellness / health related products and services offered by Company's various registered third-party/ies (third-parties shall for the purpose of this Terms, include without limitation third party licensed retail pharmacies, third-party labs) ("Products and Services"). The sale & purchase / transaction between the registered third-parties and You, of Products and Services, facilitated by the requisition placed by You on the Website shall be governed by these Terms. Company is not and cannot be a party to or save as except as may be provided in these Terms of Use, control in any manner, any transaction between You and the third-parties.
Company further reserves the right to change or modify these Terms of Use or any policy or guidelines of the Website including the Privacy Policy, at any time and in its sole discretion. Any changes or modifications made will be effective immediately upon posting the revisions on the Website and You waive any right You may have to receive specific notice of such changes or modifications. Your continued use of the Website will confirm Your acceptance of such changes or modifications.</p></div><br><br><br><br>
<br>
	
<div class="col-md-12"><h1>Eligibility Of Use</h1><hr><p>Use of the Website is available only to persons who can form legally binding contracts under Indian Contract Act, 1872. Persons who are "incompetent to contract" within the meaning of the Indian Contract Act, 1872 including without limitation minors, un-discharged insolvents etc. are not eligible to use the Website. The Products shall also not available to any Users suspended or removed from the company’s system for any reason whatsoever. If You do not conform to the above qualification, You will not be permitted to put a requisition for the Products through the Website. By accessing and using this Website, You represent that You are of legal age to form a binding contract and are not a person barred from receiving services under the laws as applicable in India. Notwithstanding the foregoing, if You are below the age of eighteen (18) years, You may avail the services provided by the Website, through Your legal guardian in accordance with the applicable laws.
Company reserves the right to terminate your membership and / or refuse to provide you with access to the Website if it is brought to Company’s notice or if it is discovered that you are under the age of 18 years.
Company reserves the right to refuse access to use the services offered at the Website to new Users or to terminate access granted to existing Users at any time without according any reasons for doing so and You shall have no right to object to the same.
You shall not have more than one active Account on the Website. Additionally, You are prohibited from selling, trading, or otherwise transferring Your Account to another party.</p></div>
<br><br><br><br><br>


<div class="col-md-12"><h1>User Account,Password and Security</h1><hr><p>Use of the Website is available only to persons who can form legally binding contracts under Indian Contract Act, 1872. Persons who are "incompetent to contract" within the meaning of the Indian Contract Act, 1872 including without limitation minors, un-discharged insolvents etc. are not eligible to use the Website. The Products shall also not available to any Users suspended or removed from the company’s system for any reason whatsoever. If You do not conform to the above qualification, You will not be permitted to put a requisition for the Products through the Website. By accessing and using this Website, You represent that You are of legal age to form a binding contract and are not a person barred from receiving services under the laws as applicable in India. Notwithstanding the foregoing, if You are below the age of eighteen (18) years, You may avail the services provided by the Website, through Your legal guardian in accordance with the applicable laws.</p></div>

</div>
</body>
</html>