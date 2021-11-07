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
		 <h1 class="page-header">view Categories</h1>
		 <ol class="breadcrumb">
		 	<li class="active">
		 		<i class="fa fa-dashboard"></i>  Dashboard / View Categories</li>
		 </ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-10">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-money fa-fw"></i>View Categories</h3>
			</div><!--panel heading end-->
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>number</th>
								<th>Category Title</th>
								<th>Cat Id</th>
								<th>Category Description</th>
								<th>Category Delete</th>
								<th>Category Edit</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$i=0;
								$get_cat="select * from categories";
								$run_cats=mysqli_query($con,$get_cat);
								while ($row_cats=mysqli_fetch_array($run_cats)) 
								{
									$cat_id=$row_cats['cat_id'];
									$cat_title=$row_cats['cat_title'];
									$cat_desc=$row_cats['cat_desc'];
									$i++;
								
							?>
							
							<tr>
								<td><?php echo $i ?></td>
								<td><?php echo $cat_title; ?></td>
								<td><?php echo $cat_id; ?></td>
								<td width="300"><?php echo $cat_desc ?></td>
								<td><a href="admin_index.php?delete_cat=<?php echo $cat_id ?>"><i class="fa fa-trash-o"></i>Delete Category</a></td>
								<td><a href="admin_index.php?edit_cat=<?php echo $cat_id ?>"><i class="fa fa-pencil"></i>Edit Category</a></td>
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