<div class="container">
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
					<p><?php echo $p_desc ?></p>
				</div>
				<br>
				<p class="price"><h4><b>INR <?php echo $p_price;?></b></h4></p>
				<!-- <div class="box-same-height">
					<h4 style="font-weight: bold;">Features & Details</h4><br>
					<label>Brand: <a href="index.php">Clean & Clear</a></label><br>
					<label>Manufacured by: Johnson & Johnson</label>
				</div> -->
				<br><hr>
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
							<button class="btn btn-primary" type="submit"><i class="fa fa-shopping-cart"></i>
								<?php
								if (!isset($_SESSION['customer_email'])) {
									echo "<a href='checkout.php'>Add to Cart</a>";
								}
								else
								{
									echo "<a href='cart.php?'>Add to cart</a>";
								}
								?>
							</button>
						</p>
				</form>
			</div>
		</div>
	</div>
</div>
