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
<style type="text/css">
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

/*search btn style*/
/*
.search-box
{
	border: 1px solid #e7e7e7;
	position: absolute;
	top: 55%;
	left: 70%;
	transform: translate(-60%,-50%);
	background: none;
	height: 38px;
	border-radius: 40px;
	padding: 10px;
	justify-content: center;
	text-align-last: center;

}
.search-box:hover > #input-search
{
	width: 220px;
	padding: 0 2px;
}
.search-box:hover > .search-btn
{
	background: white;
}
.search-btn
{

	margin-top: -10px;
	margin-right: -10px;
	float: right;
	display: inline-block;
	justify-content: center;
	align-items: center;
	background-color: rgb(79, 191, 168);
	height: 40px;
	width: 40px;
	border-radius: 50%;
	font-size: 20px;

}

#input-search
{
	border: none;
	background: none;
	outline: none;
	float: left;
	padding: 0;
	color: white;
	font-size: 16px;
	transition: 0.4s;
	line-height: 30px;
	width: 0px;
}*/

</style>

<!--brand slider--->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!---end slider-->	
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
	</div>	
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
					<!-- <div id="main" class="navbar-toggle" data-toggle="navbar-toggle">
						<input id="input-search" type="text" name="search" placeholder="search here..">
						<button class="search-btn" type="submit" value="search"><i class="fa fa-search"></i></button>
					</div> -->
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
				<!-- <div class="navbar-collapse collapse-left left">
					<button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#">
						<span class="sr-only">
							Toggle Search
						</span>
						<i class="fa fa-search"></i>
					</button>
						<form action="" method="post">
						<div class="search-box">
							<input id="input-search" type="text" name="search" placeholder="search here..">
							<button class="search-btn" type="submit" value="search"><i class="fa fa-search"></i></button>
						</div>
						<br>
						</form>
				</div> --><!---navbar collapse end-->
				
			</div>
		</div>
	</div>  <!---end of navbar--->
	<div class="container" id="slider">
		<div class="col-md-12">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="admin/slider_img/bg_1.jpg">
    </div>

    <div class="item">
      <img src="admin/slider_img/hero_1.jpg">
    </div>

    <div class="item">
      <img src="admin/slider_img/slide1.jpg">
    </div>
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
	</div><!--slider container end--->
<div id="advantage">
	<div class="container">
		<div class="same-height-row">
			<div class="col-sm-4">
				<div class="box-same-height">
					<div class="icon">
						<img src="admin/rsz_medicine.png">
					</div>
					<h3><a href="order_medi.php">Order medicines</a></h3>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="box-same-height">
					<div class="icon">
						<img src="admin/rsz_products.png">
					</div>
					<h3><a href="health_prod.php">Healthcare Products</a></h3>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="box-same-height">
					<div class="icon">
						<img src="admin/rsz_doctor.png">
					</div>
					<h3><a href="#">Dignostic Test</a></h3>
				</div>
			</div>
		</div>
	</div>
</div>	<!--end of advantage-->

<div id="thumb">
	<div class="box">
		<div class="container">
			<div class="col-md-12">
				<h2>Best selling products</h2>
			</div>
		</div>
	</div>
</div>


<!--thumbnail start-->
<div class="container">
  <div class="row">
    <div class="col-md-3 col-sm-6">
      <div class="thumbnail">
        <a href="personal_care.php" target="_blank">
        	<img src="images/healthcare1.jpg" class="image" style="width:100%">
  <div class="middle">
    <div class="text">Personal Healthcare!!</div>
  </div>
        </a>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="thumbnail">
        <a href="nutri_vit.php" target="_blank">
        	<img src="images/vitamin.jpg" class="image" style="width:100%">
  <div class="middle">
    <div class="text">Nutrition&Vitamins!!</div>
  </div>
        </a>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="thumbnail">
        <a href="ayurveda.php" target="_blank">
        	<img src="images/ayurveda.jpg" class="image" style="width:100%">
  <div class="middle">
    <div class="text">Ayurveda Care!!</div>
  </div>
        </a>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="thumbnail">
        <a href="mom_baby.php" target="_blank">
        	<img src="images/rsz_mom.jpg" class="image" style="width:100%">
  <div class="middle">
    <div class="text">Mother&Baby HealthCare!!</div>
  </div>
        </a>
      </div>
    </div>
  </div>
</div>

<div id="thumb">
	<div class="box">
		<div class="container">
			<div class="col-md-12">
				<h2>You can also order by calling us on +918724603179</h2>
			</div>
		</div>
	</div>
</div>

<!--brand slide-->

<div class="container">
        <div class="row">
            <div class="col-sm-12">
                
                <div class="clearfix">
                    <div id="thumbcarousel" class="carousel slide" data-interval="12000" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div data-target="#car" data-slide-to="0" class="thumb"><a href=""><img src="admin/brand_img/resized/healthvit_logo1.jpg"></a></div>
                                <div data-target="#car" data-slide-to="1" class="thumb"><a href=""><img src="admin/brand_img/resized/himalaya_logo1.jpg"></a></div>
                                <div data-target="#car" data-slide-to="2" class="thumb"><a href=""><img src="admin/brand_img/resized/horlicks_logo1.jpg"></a></div>
                            </div>
                            <div class="item">
                                <div data-target="#car" data-slide-to="4" class="thumb"><a href=""><img src="admin/brand_img/resized/json_logo.jpg"></a></div>
                                <div data-target="#car" data-slide-to="5" class="thumb"><a href=""><img src="admin/brand_img/resized/kapiva_logo1.jpg"></a></div>
                                <div data-target="#car" data-slide-to="6" class="thumb"><a href=""><img src="admin/brand_img/resized/mama_logo1.jpg"></a></div>
                            </div>
                        </div>
                        <a class="left carousel-control" href="#thumbcarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#thumbcarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
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

 