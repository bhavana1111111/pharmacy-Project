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
<?php
if (isset($_GET['pro_id'])) {
	$pro_id=$_GET['pro_id'];
	$get_product="select* from products where product_id='$pro_id'";
	$run_product=mysqli_query($con, $get_product);
	$row_product=mysqli_fetch_array($run_product);
	$p_cat_id=$row_product['p_cat_id'];
	$p_title=$row_product['product_title'];
	$p_price=$row_product['product_price'];
	
	$p_desc=$row_product['product_desc'];
	$p_img1=$row_product['product_img1'];
	$p_img2=$row_product['product_img2'];
	$get_p_cat="select * from product_categories where p_cat_id='$p_cat_id'";
	$run_p_cat=mysqli_query($con, $get_p_cat);
	$row_p_cat=mysqli_fetch_array($run_p_cat);
	$p_cat_id=$row_p_cat['p_cat_id'];
	$p_cat_title=$row_p_cat['p_cat_title'];
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

	<div id="content">
	<div class="container">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="personal_care.php">Shop</a></li>
				<li><a href="personal_care.php?p_cat=<?php echo $p_cat_id;?>"></a><?php echo $p_cat_title?></li> 
				<li><?php echo $p_title?></li>
				<li>Product Details</li>
			</ul>
		</div><!--col md end-->
	</div>
</div>

<div class="container">
	<div class="row" id="productmain">
		<div class="col-sm-6">
			<div id="mainimage">
				<div id="myCarousel" class="carousel slide" data-ride="carousel"><!-- Indicators -->
  					<ol class="carousel-indicators">
   					 <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
   					 <li data-target="#myCarousel" data-slide-to="1"></li>
  					</ol>

 							 <!-- Wrapper for slides -->
  					<div class="carousel-inner">
    					<div class="item active"><img src="images/<?php echo $p_img1?>"></div>
						<div class="item"><img src="images/<?php echo $p_img2?>"></div>
  					</div>

  								<!-- Left and right controls -->
					  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="right carousel-control" href="#myCarousel" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right"></span>
					    <span class="sr-only">Next</span>
					  </a>
					</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="box">
				<h1 class="text-center"><?php echo $p_title ?></h1>
				<?php 
					addCart();
				 ?>
				<div class="box-same-height">
					<h4><b>Description</b></h4>
					<p><?php echo $p_desc;?></p>
				</div>
				<br>
				<p class="price"><h4><b>INR <?php echo $p_price;?></b></h4></p>
				<form action="detail.php?add_cart=<?php echo $pro_id ?>" method="post" class="form-horizontal">
					<div class="form-group">
						<label class="col-md-5 control-label">Product Qty</label>
						<div class="col-md-7">
							<select name="product_qty" class="form-control"><option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option></select>
						</div>
					</div><br><hr>
						<p class="text-center buttons">
							<button class="btn btn-primary" type="submit"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
						</p>
				</form>
			</div>
		</div>
	</div>
</div>
<div>	
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