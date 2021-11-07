<?php
include ("includes/db.php");
?>
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
		 <h1 class="page-header">Dashboard</h1>
		 <ol class="breadcrumb">
		 	<li class="active">
		 		<i class="fa fa-dashboard"></i>  Dashboard</li>
		 </ol>
	</div>
</div>
<!-- row end -->
<div class="row">
	<div class="col-lg-4">
		
	</div>
	<div class="col-lg-2 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3"><i class="fa fa-tasks fa-5x"></i></div><!--end of col xs 3-->
					<div class="col-xs-9 text-right">
						<div class="huge">
							<?php echo $count_pro ?>
						</div>
						<div>
							Product
						</div>
					</div><!--col xs 9 end-->
				</div>
			</div><!--panel heading end-->
			<a href="admin_index.php?view_product">
				<div class="panel-footer">
					<span class="pull-left">
						View Details
					</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div><!--panel footer end-->
			</a>
		</div><!--panel primary end-->
	</div><!--col lg 3 end-->
	<div class="col-lg-2 col-md-6">
		<div class="panel panel-yellow">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3"><i class="fa fa-shopping-cart fa-5x"></i></div><!--end of col xs 3-->
					<div class="col-xs-9 text-right">
						<div class="huge">
							<?php echo $count_p_cat ?>
						</div>
						<div>
							Product categories
						</div>
					</div><!--col xs 9 end-->
				</div>
			</div><!--panel heading end-->
			<a href="admin_index.php?view_pro_cat">
				<div class="panel-footer">
					<span class="pull-left">
						View Details
					</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div><!--panel footer end-->
			</a>
		</div><!--panel yellow end-->
	</div><!--col lg 3 end-->
	<div class="col-lg-2 col-md-6">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3"><i class="fa fa-support fa-5x"></i></div><!--end of col xs 3-->
					<div class="col-xs-9 text-right">
						<div class="huge">
							<?php echo $count_order ?>
						</div>
						<div>
							Orders
						</div>
					</div><!--col xs 9 end-->
				</div>
			</div><!--panel heading end-->
			<a href="admin_index.php?view_order">
				<div class="panel-footer">
					<span class="pull-left">
						View Details
					</span>
					<span class="pull-right">
						<i class="fa fa-arrow-circle-right"></i>
					</span>
					<div class="clearfix"></div>
				</div><!--panel footer end-->
			</a>
		</div><!--panel primary end-->
	</div><!--col lg 3 end-->
</div>
<!-- end div -->
<div class="row">
	<div class="col-lg-3">
		
	</div>
	<div class="col-lg-8">
		<div class="panel panel-primary">
			<div class="panel-heading"><h3 class="panel-title"><i class="fa fa-money fa-fw"></i>New Orders</h3></div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>Order No.:</th>
								<th>Customer Email:</th>
								<th>Invoice No.:</th>
								<th>Product Name:</th>
								<th>Qty:</th>
								<th>Total:</th>
								<th>Date:</th>
								<th>Status:</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$i=0;
								$get_order="select * from customer_order order by 1 DESC LIMIT 0,5";
								$run_order=mysqli_query($con,$get_order);
								while ($row_order=mysqli_fetch_array($run_order)) 
								{
									$order_id=$row_order['order_id'];
									$customer_id=$row_order['customer_id'];
									$product_title=$row_order['product_title'];
									$invoice_no=$row_order['invoice_no'];
									$qty=$row_order['qty'];
									$total=$row_order['due_amount'];
									$order_date=$row_order['order_date'];
									$order_status=$row_order['order_status'];
									$i++;
								
							?>
							<tr>
								<td><?php echo $i ?></td>
								<td><?php 
										$get_cust="select * from customers where customer_id='$customer_id'";
										$run_cust=mysqli_query($con, $get_cust);
										$row_customer=mysqli_fetch_array($run_cust);
										$customer_email=$row_customer['customer_email'];
										echo $customer_email;
								 	?></td>
								<td><?php echo $invoice_no ?></td>
								<td><?php echo $product_title ?></td>
								<td><?php echo $qty ?></td>
								<td><?php echo $total ?></td>
								<td><?php echo $order_date ?></td>
								<td><?php echo $order_status ?></td>
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>
				</div><!--table rsponsive end-->
				<div class="text-right">
					<a href="admin_index.php?view_order">View all orders<i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
	</div><!--col lg 8 end--->
</div>
<?php
}
?>