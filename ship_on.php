<?php
session_start();
if (!isset($_SESSION['customer_email'])) {
	echo "<script>window.open('checkout.php', '_self')</script>";
}
else
{
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
</head>
<body>
<div id="top">		<!--top--->
		<div class="container">		<!--container--->
			<dir class="col-md-6 offer">
				<a href="#" class="btn btn-success btn-sm">
					<?php 
					if (!isset($_SESSION['customer_email'])) 
					{
						echo "Welcome Guest";
					}
					else
					{
						echo "Welcome: ".$_SESSION['customer_email']."";
					} ?>
				</a>
				<!-- <a href="#">Shopping Cart Total price: INR <?php totalPrice(); ?>, Total item:  <?php item(); ?></a> -->
			</dir>
			<div class="col-md-6">
				<ul class="menu">
					<li>
						<?php
							if (!isset($_SESSION['customer_email'])) {
								echo "<a href='checkout.php'>Login</a>";
							}
							else
							{
								echo "<a href='logout.php'>Logout</a>";
							}

						?>
					</li>
				<!-- 	<li>
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
					</li> -->
					
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
				<!-- <a href="cart.php" class="btn btn-primary navbar-btn right">
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
				</div> --><!---navbar collapse end-->
				<!-- <div class="collapse clearfix" id="search">
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
				</div> -->
			</div>
		</div>
	</div>  <!---end of navbar--->

	<div id="content">
	<div class="container">
		<!-- <div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="contactus.php">Contact Us</a></li>
			</ul>
		</div> --><!--col md end-->
		<div class="col-md-2"></div>
		<div class="col-md-8">
	<div class="box" id="order-summery">
		<div class="box-header">
			<h3>Shipping Details</h3>
		</div>
		<p class="text-muted">Kindly enter your address details.</p>
		<div>
			<form action="ship_on.php" method="post"><div class="form-group">
					<label>Contact:</label>
					<input type="number" name="ship_contact" maxlength="10" class="form-control" required>
					</div>
					<div class="form-group">
					<label>Destination Add:</label>
					<textarea name="ship_add" class="form-control" required></textarea>
					</div>
					<div class="form-group">
					<label>City</label>
					<input type="text" name="ship_city" class="form-control" required>
					</div>
					<div class="form-group">
					<label>Pin Code</label>
					<input type="number" name="ship_pin" maxlength="6" class="form-control" required>
					</div>
					<div class="text-center">
						<button type="submit" name="submit">Submit</button>
					</div>
				</form>
		</div>
	</div>
</div>
	</div>
</div>


	<br>
<hr class="hidden-md hidden-lg hidden-sm">
<?php
include("includes/footer.php");
?>
	<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!--brand slide-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
</body>
</html>

<?php
	$customer_session=$_SESSION['customer_email'];
	$get_customer="select * from customers where customer_email='$customer_session'";
	$run_cust=mysqli_query($con, $get_customer);
	$row_cust=mysqli_fetch_array($run_cust);
	$customer_id=$row_cust['customer_id'];
	$ip_add=getUserIP();
	//$pending="pay offline";
	$status="paid online";
	//$invoice_no=mt_rand();
	$select_cart="select * from cart where ip_add='$ip_add'";
	$run_cart=mysqli_query($con, $select_cart);
	
	if (isset($_POST['submit'])) {
		
		$ship_contact=$_POST['ship_contact'];
		$ship_add=$_POST['ship_add'];
		$ship_city=$_POST['ship_city'];
		$ship_pin=$_POST['ship_pin'];
		$insert_customer="insert into shipping_detail(customer_id, ship_contact, ship_add, ship_city, ship_pin, status) values('$customer_id','$ship_contact','$ship_add','$ship_city','$ship_pin','$status')";
		$run_customer=mysqli_query($con, $insert_customer);
		if ($run_customer) {
        echo "<script>alert('details inserted successfully!!')</script>";
        echo "<script>window.open('pay_process.php')</script>";
    }
	}


?>

<?php
}
?>