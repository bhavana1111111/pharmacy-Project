<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
else
{

?>
<nav class="navbar navbar-inverse navbar-fixed-top" style="background: black">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">
				Toggle Navigation
			</span>
			<span class="icon-bar">
				
			</span>
			<span class="icon-bar">
				
			</span>
			<span class="icon-bar">
				
			</span>
			<span class="icon-bar">
				
			</span>
		</button>
		<a href="index.php?dashboard" class="navbar-brand">Admin Panel</a>
	</div>
	<ul class="nav navbar-right top-nav">
		<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  <?php echo $admin_name ?></a>

			<ul class="dropdown-menu">
			<li><a href="index.php?user_profile"><i class="fa fa-fw fa-user"></i>  <?php echo $admin_id ?></a></li>
			<li><a href="index.php?view_product"><i class="fa fa-fw fa-envelope"></i>Product
				<span class="batch">  <?php echo $count_pro ?></span></a></li>
			<li><a href="index.php?view_customer"><i class="fa fa-fw fa-users"></i>Customer
				<span class="batch">  <?php echo $count_cust ?></span></a></li>
			<li><a href="index.php?pro_cat"><i class="fa fa-fw fa-gear"></i>Product Categories
				<span class="batch">  <?php echo $count_p_cat ?></span></a></li>
			<li class="divider"></li>
			<li><a href="logout.php">Logout<i class="fa fa-fw fa-power-off"></i></a></li>
			</ul>
		</li>
	</ul><!--end navbar right-->
<div class="collapse navbar-collapse navbar-ex1-collapse">
	<ul class="nav navbar-nav sidebar-nav"> 
		<li><a href="admin_index.php?dashboard"><i class="fa fa-fw fa-dashboard"></i>Dashboard</a></li>
		<li><a href="#" data-toggle="collapse" data-target="#products"><i class="fa fa-fw fa-table"></i>Product</a><i class="fa fa-fw fa-caret-down"></i>
			<ul id="products" class="collapse">
				<li><a href="admin_index.php?insert_product">Insert Product</a></li>
				<li><a href="admin_index.php?view_product">View Product</a></li>
			</ul>
		</li>
		<li><a href="#" data-toggle="collapse" data-target="#product_cat"><i class="fa fa-fw fa-table"></i>Products Categories</a><i class="fa fa-fw fa-caret-down"></i>
			<ul id="product_cat" class="collapse">
				<li><a href="admin_index.php?insert_pro_cat">Insert Product Categories</a></li>
				<li><a href="admin_index.php?view_pro_cat">View Product Categories</a></li>
			</ul>
		</li>
		<li><a href="#" data-toggle="collapse" data-target="#category"><i class="fa fa-fw fa-table"></i>Categories</a><i class="fa fa-fw fa-caret-down"></i>
			<ul id="category" class="collapse">
				<li><a href="admin_index.php?insert_cat">Insert Categories</a></li>
				<li><a href="admin_index.php?view_cat">View Categories</a></li>
			</ul>
		</li><!--end here-->
		<li><a href="admin_index.php?view_payments"><i class="fa fa-fw fa-pencil"></i>View Payments</a></li>
	</ul>
</div>
</nav>

<?php
}
?>