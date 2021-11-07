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
<style type="text/css">

.search-box
{
	border: 1px solid #555555;
	height: 170px;
	width: 700px;
	border-radius: 15px;
	background-color: #;
}
.search-text
{
	text-align: center;
	font-size: 25px;
	color: #555555;
}
.searchh-text
{
	padding-left: 170px;
	font-size: 25px;
	color: #555555;
}
.main{
	margin: 0px;
	font-family: sans-serif;
	padding-left: 150px;
	top: 50%;
	margin-left: 20px;
	
}
#input-search
{
	height: 40px;
	width: 300px;
	border-radius: 50px;
	padding: 0px 10px;
}
.search-btn
{
	background-color: rgb(79, 191, 168);
	height: 40px;
	width: 60px;
	border-radius: 50px;
	font-size: 20px;
}

@media(max-width: 991px)
{
	.search-box{
		/*font-size: 12px;*/
		text-align: center;
	}
}

.top ul.menu
{
	padding-top: 5px;
	margin: 0;
	text-align: center;
	font-size: 16px;
	list-style: none;
}

.top ul.menu > li{
	display: inline-block;
}

@media(max-width: 991px)
{
	.top ul.menu
	{
		text-align: center;
	}
}

.top ul.menu > li + li:before{
	content: "|\00a0";
	padding: 0 5px;
	color: #555555;
}
/*brand style*/
 .carousel {
    margin-top: 20px;

}
.item .thumb {
    width: 33.2%;
    height: 200px;
    cursor: pointer;
    float: left;
}
.item .thumb img {
    width: 100%;
    height: 200px;
    margin: 2px;
}
.item img {
    width: 200%;    
}



/* style end*/
</style>
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
						 items in cart!!
					</span>
				</a><!---navbar collapse end-->
			</div>
		</div>
	</div>  <!---end of navbar--->

<div id="content">
	<div class="container">
			<!--col md end-->
		<div class="searchh-text">
			<p>Order Medicine</p>
		</div>
		<div>
			<div class="col-md-2 col-sm-4"></div>
			<div class="col-md-8 col-sm-4 search-box">
				<br>
				<div class="top">
					<ul class="menu">
						<li><i class="fa fa-users"></i> Assured Services</li>
						<li><i class="fa fa-cart-arrow-down"></i>  Many Products</li>
						<li><i class="fa fa-shield"></i>  Secure and Safe</li>
					</ul>
				</div>
				<br>
				<div class="search-text">
					<p>Search here for Medicines or Healthcare Products</p>
				</div>
				<form action="order_medi.php" method="post">
					<div class="main">
						<input id="input-search" type="text" name="search" placeholder="search here..">
						<button class="search-btn" type="submit" value="search"><i class="fa fa-search"></i></button>
					</div>
					<br>
				</form>
				<br>
				<hr>
			</div>
			<div class="col-md-2 col-sm-4"></div>
			<div><br></div>
			<hr>
			<br>
		</div>
		<div><hr></div>
		<?php
			if (isset($_POST['search']))
			 {
				$searchq=$_POST['search'];
				$searchq=preg_replace("#[^0-9a-z]#i", "", $searchq);
				$query=mysqli_query($con,"select * from products where product_title LIKE '%$searchq%' OR product_keyword LIKE '%$searchq%'") or die("Product not found");
				$count=mysqli_num_rows($query);
				if ($count>0) 
				{
					//$output='There was no search result!!';
					while ($abc=mysqli_fetch_array($query)) 
					{
						$pro_id=$abc['product_id'];
						$pro_title=$abc['product_title'];
						$pro_price=$abc['product_price'];
						$pro_img1=$abc['product_img1'];
						echo "<div class='col-md-4 col-sm-6 center-responsive'>
									<div class='product'><a href='detail.php?pro_id=$pro_id'><img src='images/$pro_img1' class='img-responsive'></a>
										<div class='text'><h3><a href='detail.php?pro_id=$pro_id'>$pro_title</a></h3>
										<p class='price'>INR $pro_price</p>
										<p class='buttons'><a href='detail.php?pro_id=$pro_id' class='btn btn-default'>Details</a>
										<a href='detail.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add to Cart</a></p>
										</div>
									</div>
								</div>";
					}
				}
			}
			else
			{
				$abc='There was no search result!!';
			}
		?>
	</div>
</div>
<br>
<hr class="hidden-md hidden-lg hidden-sm">

<!--end slide-->
<hr>
<br>
<div id="advantage">
	<div class="container">
		<div class="same-height-row">
			<div class="col-sm-4">
				<div class="box-same-height">
					<div class="icon">
						<img src="images/qa1.png">
					</div>
					<br>
					<h4>Assure Quality</h4><br>
					<p>pharmacies allow customers to pick from a range of branded to generic medicines, education is important for customers to make the right choice for themselves.</p>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="box-same-height">
					<div class="icon">
						<img src="images/verify1.png">
					</div>
					<br>
					<h4>Secure & Verified</h4><br>
					<p>Customer data is fiercely protected by online portals, this ensures that the customer is not unnecessarily accosted with invasive communication which may damage the relationship between the online portal and the customer.</p>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="box-same-height">
					<div class="icon">
						<img src="images/rsz.png">
					</div>
					<br>
					<h4>Easy to Access</h4><br>
					<p>Customer experience being paramount, most online pharmacies sell drugs online through a few simple steps, that any customer with access to internet could follow. The other side of accessibility is also empowerment.</p>
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
}
?>