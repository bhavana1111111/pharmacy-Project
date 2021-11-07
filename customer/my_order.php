<div class="box">
	<center><h1>My Order</h1><p>If you have any questions, Please feel free to<a href="../contactus.php"> Contact us</a></p></center>
	<hr>
	<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Sr No.</th>
					<th>Product Name</th>
					<th>Due Amount</th>
					<th>Invoice number</th>
					<th>Quantity</th>
					<th>Order Date</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$customer_session=$_SESSION['customer_email'];
					$get_customer="select * from customers where customer_email='$customer_session'";
					$run_cust=mysqli_query($con, $get_customer);
					$row_cust=mysqli_fetch_array($run_cust);
					$customer_id=$row_cust['customer_id'];
					$get_order="select * from customer_order where customer_id='$customer_id'";
					$get_ord="select * from pending_order where customer_id='$customer_id'";
					$run_order=mysqli_query($con, $get_order);
					$run_ord=mysqli_query($con, $get_ord);
					$i=0;
					while ($row_order=mysqli_fetch_array($run_order)) {
						$order_id=$row_order['order_id'];
						$pro_title=$row_order['product_title'];
						$order_due_amount=$row_order['due_amount'];
						$order_invoice=$row_order['invoice_no'];
						$order_qty=$row_order['qty'];
						$order_date=substr($row_order['order_date'],0,11);
						$i++;
				?>
				<tr>
					<td><?php echo $i ?></td>
					<td><?php echo $pro_title ?></td>
					<td><?php echo $order_due_amount ?></td>
					<td><?php echo $order_invoice ?></td>
					<td><?php echo $order_qty ?></td>
					<td><?php echo $order_date ?></td>
					
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>