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
		 <h1 class="page-header">view Order</h1>
		 <ol class="breadcrumb">
		 	<li class="active">
		 		<i class="fa fa-dashboard"></i>  Dashboard / View Order</li>
		 </ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-10">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-money fa-fw"></i>View Order</h3>
			</div><!--panel heading end-->
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>Order No.:</th>
								<th>Customer Email:</th>
								<th>Invoice No.:</th>
								<th>Product Name:</th>
								<th>Product Qty:</th>
								<th>Order Date:</th>
								<th>Total Amount:</th>
								<th>Order Status:</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$i=0;
								$get_order="select * from pending_order";
								$run_order=mysqli_query($con,$get_order);
								while ($row_order=mysqli_fetch_array($run_order)) 
								{
									$order_id=$row_order['order_id'];
									$customer_id=$row_order['customer_id'];
									$product_title=$row_order['product_title'];
									$invoice_no=$row_order['invoice_no'];
									$product_id=$row_order['product_id'];
									$qty=$row_order['qty'];
									$order_date=$row_order['order_date'];
									$due_amount=$row_order['due_amount'];
									$order_status=$row_order['order_status'];
									$get_product="select * from products where product_id='$product_id'";
									$run_products=mysqli_query($con, $get_product);
									$row_products=mysqli_fetch_array($run_products);
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
								<td bgcolor="yellow"><?php echo $invoice_no ?></td>
								<td><?php echo $product_title ?></td>
								<td><?php echo $qty ?></td>
								<td><?php echo $order_date ?></td>
								<td><?php echo $due_amount ?></td>
								<td><?php 
								if ($order_status=='pending') 
								{
									echo $order_status='pending';
								}
								else
								{
									echo $order_status='complete';
								} ?></td>
							</tr>
							<?php
								}
							?>
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