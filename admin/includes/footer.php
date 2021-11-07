
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<style type="text/css">
#footer{
	background: #e0e0e0;
	padding: 20px 0;
	width: 100%;
}
#footer ul{
	padding-left: 0;
	list-style: none;
}
#footer ul a{
	color: #999999;
	padding: 20px 0;
}

#copyright{
	background: #a6a6a6;
	color: #555555;
	padding: 20px;
	font-size: 18px;
}
#copyright p{
	text-align: center;
}
		
#footer .so{
text-align: left;
}

#footer .so a{
	margin: 0 10px 0 0;
	color: #fff;
	display: inline-block;
	width: 30px;
	height: 30px;
	border-radius: 15px;
	line-height: 30px;
	font-size: 15px;
	text-align: center;
	transform: all 0.2s ease-out;
	vertical-align: bottom;
	background-color: #555555;
}


/*
#footer .social-menu ul{
position: absolute;
top: 50%;
left: 50%;
padding: 0;
margin: 0;
transform: translate(-50%, -50%);
display: flex;
}

.social-menu ul li{
	list-style: none;
	margin: 0 15px;
}

#footer .social-menu ul li .fa{
	font-size: 30px;
	line-height: 60px;
	transition: .6s;
	color: #000;
}
#footer .social-menu ul li a{
	position: relative;
	display: inline-block;
	width: 60px;
	height: 60px;
	border-radius: 50%;
	background-color: #fff;
	text-align: center;
	transition: .6s;
	box-shadow: 0 5px 4px rgba(0,0,0,.5);
}
#footer .social-menu ul li a:hover{
	transform: translate(0, -10px);
}
*/
	</style>
</head>

	<div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<h4>
					Pages
				</h4>
				<ul>
					<li><a href="cart.php">Shopping Cart</a></li>
					<li><a href="contactus.php">Contact Us</a></li>
					<li><a href="healthcare.php">Products</a></li>
					<li><a href="my_account.php">My Account</a></li>
				</ul>
				<hr class="hidden-md hidden-lg hidden-sm">
			</div> <!--call md ending-->
			<div class="col-md-3 col-sm-6">
				<h4>Top Product Brands</h4>
				<ul>
					<?php
						$get_p_cats="select * from product_categories";
						$run_p_cats=mysqli_query($con, $get_p_cats);
						while ($row_p_cat=mysqli_fetch_array($run_p_cats)) {
							$p_cat_id=$row_p_cat['p_cat_id'];
							$p_cat_title=$row_p_cat['p_cat_title'];
							echo "<li><a href='personal_care.php?p_cat_id'> $p_cat_title </a></li>";
						}
					?>
				</ul>
				<hr class="hidden-md hidden-lg">
			</div>
			<div class="col-md-3 col-sm-6">
				<h4>Need help?</h4>
				<ul>
					<li><a href="#">Privacy Policy</a></li>
					<li><a href="#">Term & Condition</a></li>
					<li><a href="#">FAQ</a></li>
				</ul>
				<hr class="hidden-md hidden-lg">
			</div>
			<div class="col-md-3 col-sm-6">
				<h4>Follow Us</h4>
				<div class="so">
					<ul>
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-instagram"></i></a>
						<a href="#"><i class="fa fa-youtube"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-google-plus"></i></a>
					</ul>
				</div>
				<hr class="hidden-md hidden-lg">
			</div>
		</div>
	</div>
</div><!---footer end-->
<div id="copyright">
	<div class="container">
		<div class="col-md-12">
			<p>
				&copy;2020 HealthCode. All Rights Reserved
			</p>
		</div>
	</div>
</div>
