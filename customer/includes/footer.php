<div id="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<h4>
					Pages
				</h4>
				<ul>
					<li><a href="cart.php">Shopping Cart</a></li>
					<li><a href="contact.php">Contact Us</a></li>
					<li><a href="shop.php">Products</a></li>
					<li><a href="../checkout.php">My Account</a></li>
				</ul>
				<hr class="hidden-md hidden-lg hidden-sm">
			</div> <!--call md ending-->
			<div class="col-md-3 col-sm-6">
				<h4>Top Product Brands</h4>
				<ul>
					<?php
						$get_p_cats="select * from categories";
						$run_p_cats=mysqli_query($con, $get_p_cats);
						while ($row_p_cat=mysqli_fetch_array($run_p_cats)) {
							$p_cat_id=$row_p_cat['cat_id'];
							$p_cat_title=$row_p_cat['cat_title'];
							echo "<li><a href='personal_care.php?p_cat_id'> $p_cat_title </a></li>";
						}
					?>
				</ul>
				<hr class="hidden-md hidden-lg">
			</div>
			<div class="col-md-3 col-sm-6">
				<h4>Need help?</h4>
				<ul>
					<li><a href="../privacypolicy.php">Privacy Policy</a></li>
					<li><a href="../terms.php">Term & Condition</a></li>
					<li><a href="../FAQS.php">FAQ</a></li>
				</ul>
				<hr class="hidden-md hidden-lg">
			</div>
			<div class="col-md-3 col-sm-6">
				<h4>Follow Us</h4>
				<p class="social">
				<ul>
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-youtube"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
				</ul>
				</p>
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