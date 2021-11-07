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
				
			</dir>
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
					<!-- <li>
						<a href="cart.php">Goto Cart</a>
					</li> -->
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
				<!-- <a href="cart.php" class="btn btn-primary navbar-btn right">
					<i class="fa fa-shopping-cart"></i>
					<span>
						<?php item(); ?> items in cart!!
					</span>
				</a> -->
				<!-- <div class="navbar-collapse collapse-right">
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
<div class="container">
	
<form action="pay_process.php" method="post">
<div class="col-lg-12">
	<div class="panel panel-primary">
		<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-money fa-fw"></i>New Orders</h3></div>
		<div class="panel-body">
<div class="table-responsive">
<table class="table table-bordered table-hover table-striped">
	<thead>
		<tr>
			<th>Customer Email:</th>
			<th>Invoice No.:</th>
			<th>Product Name:</th>
			<th>Qty:</th>
			<th>Total:</th>
			<th>Date:</th>
			<th>Pay:</th>
		</tr>
	</thead>
	<tbody>
		<!-- <?php
			if (isset($_GET['order_id'])) {
				$order_id=$_GET['order_id'];
					$customer_session=$_SESSION['customer_email'];
					$get_customer="select * from customers where customer_email='$customer_session'";
					$run_cust=mysqli_query($con, $get_customer);
					$row_cust=mysqli_fetch_array($run_cust);
					$customer_email=$row_cust['customer_email'];

					$get_order="select * from pending_order where order_id='$order_id'";
					$run_order=mysqli_query($con,$get_order);
					$row_order=mysqli_fetch_array($run_order);
				
				$product_title=$row_order['product_title'];
				$invoice_no=$row_order['invoice_no'];
				$qty=$row_order['qty'];
				$total=$row_order['due_amount'];
				$order_date=$row_order['order_date'];
			}
		?>
		<tr>
			<td><?php 
					echo $customer_email;
			 	?></td>
			<td><?php echo $invoice_no; ?></td>
			<td><?php echo $product_title; ?></td>
			<td><?php echo $qty; ?></td>
			<td><?php echo $total; ?></td>
			<td><?php echo $order_date; ?></td>
			<td><button type="submit" class="btn btn-primary btn-sm">Pay Online</button></td>
		</tr>
		 -->
			<?php
							// if (isset($_GET['order_id'])) {
							// 	$order_id=$_GET['order_id'];
								$cid=$_SESSION["cid0"];
								$get_order="select * from pending_order where customer_id=$cid";
								$run_order=mysqli_query($con,$get_order);
								while ($row_order=mysqli_fetch_array($run_order)) 
								{
									$order_id=$row_order['order_id'];
									$customer_id=$row_order['customer_id'];
									$product_title=$row_order['product_title'];
									$invoice_no=$row_order['invoice_no'];
									//$product_id=$row_order['product_id'];
									$qty=$row_order['qty'];
									$order_date=$row_order['order_date'];
									$due_amount=$row_order['due_amount'];
									//$order_status=$row_order['order_status'];
									// $get_product="select * from products where product_id='$product_id'";
									// $run_products=mysqli_query($con, $get_product);
									// $row_products=mysqli_fetch_array($run_products);
									// $i++;
								
							?>
							<tr>
								<!-- <td><?php echo $i ?></td> -->
								<td><?php 
										$get_cust="select * from customers where customer_id='$customer_id'";
										$run_cust=mysqli_query($con, $get_cust);
										$row_customer=mysqli_fetch_array($run_cust);
										$customer_email=$row_customer['customer_email'];
										echo $customer_email;
								 	?></td>
								<td><?php echo $invoice_no ?></td>
								<td><?php echo $product_title ?></td>
								<td><?php echo $qty ?></td>
								<td><?php echo $due_amount ?></td>
								<td><?php echo $order_date ?></td>
								<td><a href="payment_form/payment.html" class="btn btn-primary">Checkout</a></td>
								<!-- <td><?php 
								if ($order_status=='pending') 
								{
									echo $order_status='pending';
								}
								else
								{
									echo $order_status='complete';
								} ?></td> -->
							</tr>
							<?php
								}
							// }
							?>
	</tbody>
</table>
</div>
</div></div></div>
</form>
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

}
?>
