<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
else
{

?>
<div class="row">
	<div class="col-lg-2">
		
	</div>
	<div class="col-lg-10">
		 <h1 class="page-header">view Products</h1>
		 <ol class="breadcrumb">
		 	<li class="active">
		 		<i class="fa fa-dashboard"></i>  Dashboard / View Product</li>
		 </ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-10">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-money fa-fw"></i>View Products</h3>
			</div><!--panel heading end-->
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>Product Id</th>
								<th>Product Title</th>
								<th>Product Image</th>
								<th>Product Price</th>
								<!-- <th>Product sold</th> -->
								<th>Product keyword</th>
								<th>Product Date</th>
								<th>Product Delete</th>
								<th>Product Edit</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$i=0;
								$get_product="select * from products";
								$run_p=mysqli_query($con,$get_product);
								while ($row=mysqli_fetch_array($run_p)) 
								{
									$pro_id=$row['product_id'];
									$product_title=$row['product_title'];
									$product_img1=$row['product_img1'];
									$product_price=$row['product_price'];
									$product_keyword=$row['product_keyword'];
									$date=$row['date'];
									$i++;
								
							?>
							
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $product_title ?></td>
								<td><img src="../images/<?php echo $product_img1 ?>" width="70" height="70"></td>
								
								<td><?php echo $product_price ?></td>
								<td><?php echo $product_keyword ?></td>
								<td><?php echo $date ?></td>
								<td><a href="admin_index.php?delete_product=<?php echo $pro_id ?>"><i class="fa fa-trash-o"></i>Delete Product</a></td>
								<td><a href="admin_index.php?edit_product=<?php echo $pro_id ?>"><i class="fa fa-pencil"></i>Edit Product</a></td>
							</tr>
							<?php	} ?>
						</tbody>
					</table>
				</div><!--table rsponsive end-->
			</div>
		</div><!--panel primary end-->
	</div><!--col lg 3 end-->
</div>
<?php

}
?>