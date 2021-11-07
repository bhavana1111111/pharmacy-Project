<?php
include("includes/db.php");
$customer_email=$_SESSION['customer_email'];
$get_customer="select * from customers where customer_email='$customer_email'";
$run_cust=mysqli_query($con, $get_customer);
$row_cust=mysqli_fetch_array($run_cust);
$customer_id=$row_cust['customer_id'];
$customer_name=$row_cust['customer_name'];
$customer_email=$row_cust['customer_email'];
$customer_contact=$row_cust['customer_contact'];
$customer_image=$row_cust['customer_image'];
?>

<div class="box">
	<form action="edit_act.php" method="POST" enctype="multipart/form-data">
	<center><h1>Edit your Account</h1></center>
	<div class="form-group">
		<label>Customer Name</label>
		<input type="text" name="c_name" value="<?php echo $customer_name; ?>" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Customer Email</label>
		<input type="email" name="c_email" value="<?php echo $customer_email; ?>" class="form-control" required>
	</div>
		<!-- <div class="form-group">
		<label>Customer Password</label>
		<input type="password" name="c_password" value="<?php echo $customer_pass; ?>" class="form-control" required>
		</div> -->
	<div class="form-group">
		<label>Contact Number</label>
		<input type="number" name="c_contact" value="<?php echo $customer_contact; ?>" class="form-control" required>
	</div>
	<div class="form-group">
		<label>Customer Image</label>
		<input type="file" name="c_image" class="form-control">
		<img src="cust_images/<?php echo $customer_image; ?>">
	</div>
	<div class="text-center">
		<button name="update" class="btn btn-primary"><i class="fa fa-user-md"></i>  Update Now</button>
	</div>
	</form>
</div>

<?php
	if (isset($_POST['update'])) 
	{
		$update_id=$customer_id;
		$c_name=$_POST['c_name'];
		$c_email=$_POST['c_email'];
		$c_contact=$_POST['c_contact'];
		$c_image=$_FILES['c_image']['name'];
		$c_tmp_image=$_FILES['c_image']['tmp_name'];
		move_uploaded_file($c_tmp_image, "cust_images/$c_image");
		$update_customer="update customers set customer_name='$c_name', customer_email='$c_email', customer_contact='$c_contact', customer_image='$c_image' where customer_id='$update_id'";

		if ($c_image!='') 
        {
            $up_img1="update customers set c_image='$c_image' where customer_id='$update_id'";
            $run=mysqli_query($con,$up_img1);
        }

		if (strlen($c_contact) < 10 OR strlen($c_contact) > 10) {
			echo "<script>alert('Please check your contact number!!')</script>";
			echo "<script>window.open('../logout.php', '_self')</script>";
		}
		
		$run_customer=mysqli_query($con, $update_customer);
		if ($run_customer) {
			echo "<script>alert('Your details Updated!!')</script>";
			echo "<script>window.open('../logout.php', '_self')</script>";
		}
	}
?>