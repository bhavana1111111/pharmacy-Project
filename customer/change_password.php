<?php
include("includes/db.php");

?>

<div class="box">
	<form action="" method="POST" enctype="multipart/form-data">
	<center><h3>Change your Password</h3></center>
	<div class="form-group">
		<label>Enter your Current Password</label>
		<input type="password" name="old_password" class="form-control" required>
		</div>
		<div class="form-group">
		<label>Enter new Password</label>
		<input type="password" name="new_password" class="form-control" required>
		</div>
		<div class="form-group">
		<label>Confirm new password</label>
		<input type="password" name="c_n_password" class="form-control" required>
		</div>
		<div class="text-center">
		<button type="submit" name="update" class="btn btn-primary"><i class="fa fa-user-md"></i>  Update Now</button>
		</div>
	</form>
</div>

<?php
if (isset($_POST['update'])) {
	$c_email=$_SESSION['customer_email'];
	$old_password=$_POST['old_password'];
	$new_password=$_POST['new_password'];
	$c_n_password=$_POST['c_n_password'];
	$select_cust="select * from customers where customer_email='$c_email' AND customer_pass='$old_password'";
	$run_q=mysqli_query($con, $select_cust);
	$check_old_pass=mysqli_num_rows($run_q);
	if ($check_old_pass==0) {
		echo "<script>alert('Your current password is not valid try again!!')</script>";
		exit();
	}
	if ($new_password!=$c_n_password) {
		echo "<script>alert('Your new password does not match with confirm password!!')</script>";
		exit();
	}
	$update_q="update customers set customer_pass='$new_password' where customer_email='$c_email'";
	$run_q=mysqli_query($con, $update_q);
	echo "<script>alert('Your password has changed!!')</script>";
	echo "<script>window.open('my_account.php?my_order')</script>";
}


?>