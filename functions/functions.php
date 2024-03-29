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
function getNCats()
{
	global $db;
	$get_n_cat="select * from product_categories where category=6";
	$run_n_cat=mysqli_query($db,$get_n_cat);
	while ($row_n_cat=mysqli_fetch_array($run_n_cat)) {
		$cat_n_id=$row_n_cat['p_cat_id'];
		$cat_n_title=$row_n_cat['p_cat_title'];
		echo "<li><a href='nutri_vit.php?p_cat=$cat_n_id'> $cat_n_title </a></li>";
	}
}

function getACats()
{
	global $db;
	$get_n_cat="select * from product_categories where category=2";
	$run_n_cat=mysqli_query($db,$get_n_cat);
	while ($row_n_cat=mysqli_fetch_array($run_n_cat)) {
		$cat_n_id=$row_n_cat['p_cat_id'];
		$cat_n_title=$row_n_cat['p_cat_title'];
		echo "<li><a href='ayurveda.php?p_cat=$cat_n_id'> $cat_n_title </a></li>";
	}
}

function getMCats()
{
	global $db;
	$get_n_cat="select * from product_categories where category=7";
	$run_n_cat=mysqli_query($db,$get_n_cat);
	while ($row_n_cat=mysqli_fetch_array($run_n_cat)) {
		$cat_n_id=$row_n_cat['p_cat_id'];
		$cat_n_title=$row_n_cat['p_cat_title'];
		echo "<li><a href='mom_baby.php?p_cat=$cat_n_id'> $cat_n_title </a></li>";
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










function getUserIP()
{
	switch (true) {
		case (!empty($_SERVER['HTTP_X_REAL_IP'])): return $_SERVER['HTTP_X_REAL_IP'];
		case (!empty($_SERVER['HTTP_CLIENT_IP'])): return $_SERVER['HTTP_CLIENT_IP'];
		case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])): return $_SERVER['HTTP_X_FORWARDED_FOR'];
		
		default: return $_SERVER['REMOTE_ADDR'];//for getting user ip start
	}
}

//Add to cart
function addCart()
{
	global $db;
	if (isset($_GET['add_cart'])) {
		$ip_add=getUserIP();
		$p_id=$_GET['add_cart'];
		$product_qty=$_POST['product_qty'];
		$check_product="select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
		$run_check=mysqli_query($db, $check_product);
		if (mysqli_num_rows($run_check)>0) {
			echo "<script>alert('This product is already added in cart')</script>";
			echo "<script>window.open('detail.php?pro_id=$p_id','_self')</script>";
		}
		else
		{
			$query="insert into cart(p_id,ip_add,qty) values('$p_id','$ip_add','$product_qty')";
			$run_query=mysqli_query($db,$query);
			echo "<script>window.open('detail.php?pro_id=$p_id','_self')</script>";
		}
	}
}

//Item count
function item(){
	global $db;
	$ip_add=getUserIP();
	$get_item="select * from cart where ip_add='$ip_add'";
	$run_item=mysqli_query($db, $get_item);
	$count=mysqli_num_rows($run_item);
	echo $count;

}

//Total price
function totalPrice()
{
	global $db;
	$ip_add=getUserIP();
	$total=0;
	$select_cat="select * from cart where ip_add='$ip_add'";
	$run_cart=mysqli_query($db, $select_cat);
	while ($record=mysqli_fetch_array($run_cart)) {
		$pro_id=$record['p_id'];
		$pro_qty=$record['qty'];
		$get_price="select * from products where product_id='$pro_id'";
		$run_price=mysqli_query($db, $get_price);
		while ($row=mysqli_fetch_array($run_price)) {
			$sub_total=$row['product_price'] * $pro_qty;
			$total +=$sub_total;
		}
	}
	echo $total;
}
?>
