<div class="box">
	<center><h1>Do you really want to delete your acoount?</h1></center>
	<form action="" method="post">
		<center><input type="submit" name="yes" value="Yes, I want to delete" class="btn btn-danger">
		<input type="submit" name="no" value="No, I don't want to delete" class="btn btn-primary"></center>
	</form>
</div>
<?php
	$c_email=$_SESSION['customer_email'];
	if (isset($_POST['yes'])) {
		$delete_q="delete from customers where customer_email='$c_email'";
		$run_q=mysqli_query($con, $delete_q);
		if ($run_q) {
			session_destroy();
			echo "<script>alert('Your Account has been deleted!!')</script>";
			echo "<script>window.open('../index.php','_self')</script>";
		}
	}
?>