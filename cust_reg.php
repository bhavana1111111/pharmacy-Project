<?php
session_start();
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
				<a href="#">Shopping Cart Total price: INR <?php totalPrice(); ?>, Total item:  <?php item(); ?></a>
			</dir>
			<div class="col-md-6">
				<ul class="menu">
					<li>
						<a href="cust_reg.php">Register</a>
					</li>
					<li>
						<a href="my_account.php">My Account</a>
					</li>
					<li>
						<a href="cart.php">Goto Cart</a>
					</li>
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
						4 items in cart!!
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

	<div id="content">
	<div class="container">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="cust_reg.php">Registration</a></li>
			</ul>
		</div><!--col md end-->
		
		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<center><h2>Customer Registration</h2></center>
				</div><!--box header end-->
				<form action="cust_reg.php" method="post" enctype="multipart/form-data"><div class="form-group">
					<label>Customer Name</label>
					<input type="text" name="c_name" class="form-control" required>
					</div>
					<div class="form-group">
					<label>Customer Email</label>
					<input type="email" name="c_email" class="form-control" required>
					</div>
					<div class="form-group">
					<label>Customer Password</label>
					<input type="password" name="c_password" class="form-control" required>
					</div>
					<div class="form-group">
					<label>Contact Number</label>
					<input type="number" name="c_contact" class="form-control" required>
					</div>
					<div class="form-group">
					<label>Customer Image</label>
					<input type="file" name="c_image" class="form-control" required>
					</div>
					<div class="text-center">
					<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-user-md"></i>   Register</button>
					</div>
				</form>
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
	if (isset($_POST['submit'])) {
		$c_name=$_POST['c_name'];
		$c_email=$_POST['c_email'];
		$c_password=$_POST['c_password'];
		$c_contact=$_POST['c_contact'];
		$c_image=$_FILES['c_image']['name'];
		$c_tmp_image=$_FILES['c_image']['tmp_name'];
		$c_ip=getUserIP();
		move_uploaded_file($c_tmp_image, "customer/cust_images/$c_image");
		$insert_customer="insert into customers (customer_name, customer_email, customer_pass, customer_contact, customer_image, customer_ip) values('$c_name','$c_email','$c_password','$c_contact','$c_image','$c_ip')";
		
		if (strlen($c_contact) < 10 OR strlen($c_contact) > 10) {
			echo "<script>alert('Please check your contact number!!')</script>";
			echo "<script>window.open('cust_reg.php', '_self')</script>";
		}
		else
		{
			$run_customer=mysqli_query($con, $insert_customer);
		}
		$sel_cart="select * from cart where ip_add='$c_ip'";
		$run_cart=mysqli_query($con, $sel_cart);
		$check_cart=mysqli_num_rows($run_cart);
		if ($check_cart>0) {
			$_SESSION['customer_email']=$c_email;
			echo "<script>alert('You have been register successfully!!')</script>";
			echo "<script>window.open('checkout.php', '_self')</script>";
		}
		else
		{
			$_SESSION['customer_email']=$c_email;
			echo "<script>alert('You have been register successfully!!')</script>";
			echo "<script>window.open('index.php', '_self')</script>";
		}
	}


?>