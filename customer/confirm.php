<?php
session_start();
if (!isset($_SESSION['customer_email'])) {
	echo "<script>window.open('../checkout.php', '_self')</script>";
}
else
{
	include("includes/db.php");
	include("functions/functions.php");
	if(isset($_GET['order_id']))
	{
		$order_id=$_GET['order_id'];
	}
}
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
				<li><a href="my_account.php">My Account</a></li>
				<li><a href="confirm.php">Confirm Payment</a></li>
			</ul>
		</div><!--col md end-->
		<div class="col-md-3">
			<?php
				include("includes/sidebar.php");
			?>
		</div>
		<div class="col-md-9">
			<div class="box">
				<h1 align="center">Please Confirm your payment</h1>
				<form action="confirm.php?update_id=<?php echo $order_id ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Invoice Number</label>
						<input type="text" class="form-control" name="invoice_number" required>
					</div>
					<div class="form-group">
						<label>Amount</label>
						<input type="text" class="form-control" name="amount" required>
					</div>
					<div class="form-group">
						<label>Select Payyment Mode</label>
						<select class="form-control" name="payment_mode"><option>Bank transfer</option>
								<option>PayPal</option>
								<option>Payyoumoney</option>
								<option>PayTM</option></select>
					</div>
					<div class="form-group">
						<label>Transaction Number</label>
						<input type="text" class="form-control" name="trfr_number" required>
					</div>
					<div class="form-group">
						<label>Payment Date</label>
						<input type="date" class="form-control" name="date" required>
					</div>
					<div class="text-center">
						<button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">
							Confirm Payment
						</button>
					</div>
				</form>
				<?php
					if (isset($_POST['confirm_payment'])) {
						$update_id=$_GET['update_id'];
						$invoice_no=$_POST['invoice_no'];
						$amount=$_POST['amount'];
						$trfr_number=$_POST['trfr_number'];
						$date=$_POST['date'];
						$complete="Complete";
						$insert="insert into payments (invoice_id, amount, payment_mode, ref_no, payment_date) 
						values('$invoice_no','$amount','$payment_mode','$trfr_number','$date')";
						$run_insert=mysqli_query($con, $insert);
						$update_q="update customer_order set order_status='$complete' where order_id='$update_id'";
						$run_insert=mysqli_query($con, $update_q);
						$update_p="update pending_order set order_status='$complete' where order_id='$update_id'";
						$run_insert=mysqli_query($con, $update_p);
						echo "<script>alert('Your order has been recieved!!')</script>";
						echo "<script>window.open('my_account.php?order','_self')</script>";
					}
				?>
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
