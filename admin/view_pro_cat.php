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
		 <h1 class="page-header">view Product Categories</h1>
		 <ol class="breadcrumb">
		 	<li class="active">
		 		<i class="fa fa-dashboard"></i>  Dashboard / View Product Categories</li>
		 </ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-10">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-money fa-fw"></i>View Product Categories</h3>
			</div><!--panel heading end-->
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>Product Category Id</th>
								<th>Product Category Title</th>
								<th>Category</th>
								<th>Product Category Description</th>
								<th>Product Category Delete</th>
								<th>Product Category Edit</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$i=0;
								$get_p_cat="select * from product_categories";
								$run_p_cats=mysqli_query($con,$get_p_cat);
								while ($row_p_cats=mysqli_fetch_array($run_p_cats)) 
								{
									$p_cat_id=$row_p_cats['p_cat_id'];
									$p_cat_title=$row_p_cats['p_cat_title'];
									$cat_id=$row_p_cats['category'];
									$p_cat_desc=$row_p_cats['p_cat_desc'];
									$i++;
								
							?>
							
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $p_cat_title; ?></td>
								<td><?php echo $cat_id; ?></td>
								<td width="300"><?php echo $p_cat_desc ?></td>
								<td><a href="admin_index.php?delete_p_cat=<?php echo $p_cat_id ?>"><i class="fa fa-trash-o"></i>Delete Product Category</a></td>
								<td><a href="admin_index.php?edit_p_cat=<?php echo $p_cat_id ?>"><i class="fa fa-pencil"></i>Edit Product Category</a></td>
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