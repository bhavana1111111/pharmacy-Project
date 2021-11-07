<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
else
{
?>
<?php

if(isset($_GET['delete_p_cat']))
{
	$delete_p_cat_id=$_GET['delete_p_cat'];
	$delete_pro="delete from product_categories where p_cat_id='$delete_p_cat_id'";
	$run_delete=mysqli_query($con,$delete_pro);
	if($run_delete)
	{
		echo "<script>alert('your 1 product has been deleted')</script>";
		echo "<script>window.open('admin_index.php?view_pro_cat','_self')</script>";
	}
}
?>

<?php } ?>