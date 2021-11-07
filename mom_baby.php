<?php
include("includes/db.php");
include("functions/functions.php");
session_start();
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

<div id="content">
	<div class="container">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li>Shop</li>
				<li>Mother & Baby Care</li>
			</ul>
		</div><!--col md end-->
		<div class="col-md-3">
			<?php
				include("includes/sidebar_mb.php");
			?>
		</div>
		<div class="col-md-9">
		<div class="row">
			<?php

			if(!isset($_GET['p_cat']))
			{
				if (!isset($_GET['cat_id'])) {
					
				$per_page=6;
				if (isset($_GET['page'])) {
					$page=$_GET['page'];

				}
				else
				{
					$page=1;
				}
				$start_from=($page-1) * $per_page;
				$get_product="select * from products where cat_id=7 order by 1 DESC LIMIT $start_from, $per_page";
				$run_pro=mysqli_query($con, $get_product);
				while($row=mysqli_fetch_array($run_pro))
				{
					$pro_id=$row['product_id'];
					$pro_title=$row['product_title'];
					$pro_price=$row['product_price'];
					
					$pro_img1=$row['product_img1'];
					echo "<div class='col-md-4 col-sm-6 center-responsive'>
						<div class='product'><a href='detail.php?pro_id=$pro_id'><img src='images/$pro_img1' class='img-responsive'></a>
							<div class='text'><h3><a href='detail.php?pro_id=$pro_id'>$pro_title</a></h3>
							<p class='price'>INR $pro_price</p>
							<p class='buttons'>
							<a href='detail.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add to Cart</a></p>
							</div>
						</div>
					</div>";
				}
			?>
		</div>

		<center>
			<ul class="pagination">
				<?php
				$query="select * from products where cat_id=7";
				$result=mysqli_query($con, $query);
				$total_record=mysqli_num_rows($result);
				$total_pages=ceil($total_record / $per_page);
				//echo "<li><a href='personal_care.php?page=1'>". '..'."</a></li>";
				for($i=1; $i<=$total_pages; $i++)
				{
					echo "<li><a href='mom_baby.php?page=".$i."'>".$i."</a></li>";
				};
				echo "<li><a href='mom_baby.php?page=$total_pages'>". 'Last Page'."</a></li>";
				}
			}
				?>
			</ul>
		</center>
		<div class="row">
			<?php
				getPcatPro();
				getCatPro();
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