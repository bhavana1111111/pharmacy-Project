<?php

$db=mysqli_connect("localhost","root","","pharma project");

// product categories
function getPCats()
{
	global $db;
	$get_p_cats="select * from product_categories";
	$run_p_cats=mysqli_query($db,$get_p_cats);
	while ($row_p_cats=mysqli_fetch_array($run_p_cats)) {
		$p_cat_id=$row_p_cats['p_cat_id'];
		$p_cat_title=$row_p_cats['p_cat_title'];
		echo "<li><a href='personal_care.php?p_cat=$p_cat_id'> $p_cat_title </a></li>";
	}
}

// categories
function getCats()
{
	global $db;
	$get_cat="select * from categories";
	$run_cat=mysqli_query($db,$get_cat);
	while ($row_cat=mysqli_fetch_array($run_cat)) {
		$cat_id=$row_cat['cat_id'];
		$cat_title=$row_cat['cat_title'];
		echo "<li><a href='personal_care.php?cat_id=$cat_id'> $cat_title </a></li>";
	}
}
//categories product
function getPcatPro()
{
	global $db;
	if (isset($_GET['p_cat'])) {
		$p_cat_id=$_GET['p_cat'];
		$get_p_cat="Select * from product_categories where p_cat_id='$p_cat_id'";
		$run_p_cat=mysqli_query($db, $get_p_cat);
		$row_p_cat=mysqli_fetch_array($run_p_cat);
		$p_cat_title=$row_p_cat['p_cat_title'];
		$p_cat_desc=$row_p_cat['p_cat_desc'];
		$get_product="select * from products where p_cat_id='$p_cat_id'";
		$run_product=mysqli_query($db,$get_product);
		$count=mysqli_num_rows($run_product);
		if ($count==0) {
			echo "<div class='box'><h1>Product found in this category</h1></div>";
		}
		else
		{
			echo "<div class='box'><h1>$p_cat_title</h1><p>$p_cat_desc</p></div>";
		}
		while ($row_products=mysqli_fetch_array($run_product)) {
			$pro_id=$row_products['product_id'];
			$pro_title=$row_products['product_title'];
			$pro_price=$row_products['product_price'];
			$pro_img1=$row_products['product_img1'];
			echo "<div class='col-md-4 col-sm-6 center-responsive'>
				<div class='product'><a href='detail.php?pro_id=$pro_id'><img src='images/$pro_img1' class='img-responsive'></a>
					<div class='text'><h3><a href='detail.php?pro_id=$pro_id'>$pro_title</a></h3>
						<p class='price'>$pro_price</p>
						<p class='buttons'><a href='detail.php?pro_id=$pro_id' class='btn btn-default'>Details</a>
						<a href='detail.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add to Cart</a></p>
					</div>
				</div>
			</div>";
		}
	}
}


//get categories
function getCatPro()
{
	global $db;
	if (isset($_GET['cat_id'])) {
		$cat_id=$_GET['cat_id'];
		$get_cat="Select * from categories where cat_id='$cat_id'";
		$run_cats=mysqli_query($db, $get_cat);
		$row_cat=mysqli_fetch_array($run_cats);
		$cat_title=$row_cat['cat_title'];
		$cat_desc=$row_cat['cat_desc'];
		$get_products="select * from products where cat_id='$cat_id'";
		$run_product=mysqli_query($db,$get_products);
		$count=mysqli_num_rows($run_product);
		if ($count==0) {
			echo "<div class='box'><h1>Product found in this category</h1></div>";
		}
		else
		{
			echo "<div class='box'><h1>$cat_title</h1><p>$cat_desc</p></div>";
		}
		while ($row_products=mysqli_fetch_array($run_product)) {
			$pro_id=$row_products['product_id'];
			$pro_title=$row_products['product_title'];
			$pro_price=$row_products['product_price'];
			$pro_img1=$row_products['product_img1'];
			echo "<div class='col-md-4 col-sm-6 center-responsive'>
				<div class='product'><a href='detail.php?pro_id=$pro_id'><img src='images/$pro_img1' class='img-responsive'></a>
					<div class='text'><h3><a href='detail.php?pro_id=$pro_id'>$pro_title</a></h3>
						<p class='price'>$pro_price</p>
						<p class='buttons'><a href='detail.php?pro_id=$pro_id' class='btn btn-default'>Details</a>
						<a href='detail.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add to Cart</a></p>
					</div>
				</div>
			</div>";
		}
	}
}
