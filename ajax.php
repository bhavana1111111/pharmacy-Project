<?php
include ("includes/db.php");
if (isset($_POST['id'])) {
	$cat_id=$_POST['cat_id'];
	$query=mysqli_query($con, "select * from product_categories where category='$cat_id'");
	while ($row=mysqli_fetch_array($query)) {
		$cat_id=$row['cat_id'];
		$product_title=$row['p_cat_title'];
		echo "<option value='$cat_id'>$product_title</option>";
	}
}
?>