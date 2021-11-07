<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
else
{
?>
<?php
if(isset($_GET['edit_p_cat']))
{
	$edit_p_cat_id=$_GET['edit_p_cat'];
	$get_p="select * from product_categories where p_cat_id='$edit_p_cat_id'";
	$run_edit=mysqli_query($con,$get_p);
	$row_edit=mysqli_fetch_array($run_edit);
		$p_cat_id=$row_edit['p_cat_id'];
		$p_cat_title=$row_edit['p_cat_title'];
		$p_cat_desc=$row_edit['p_cat_desc'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Product</title>
	 <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
</head>
<body>
    <div class="row">
    <div class="col-lg-2">
        
    </div>
    <div class="col-lg-10">
         <h1 class="page-header">Edit Product Categories</h1>
         <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i>  Dashboard/ Edit Product Category</li>
         </ol>
    </div>
</div>
    <div class="row">
        <div class="col-lg-3">
        
        </div>
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money fa-w"></i>Edit Product Category</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Category Title</label>
                        <div class="col-md-6">
                        	<input type="text" name="p_cat_title" class="form-control" value="<?php echo $p_cat_title; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Description</label><div class="col-md-6">
                        <textarea name="p_cat_desc" class="form-control" rows="6" cols="19"><?php echo $p_cat_desc; ?></textarea></div>
                    </div>
                    <div class="form-group"><div class="col-md-6">
                       <input type="submit" name="update" value="update_now" class="btn btn-primary form-control"> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
if (isset($_POST['update'])) {
    $p_cat_title=$_POST['p_cat_title'];
    $p_cat_desc=$_POST['p_cat_desc'];
    $update_product="update product_categories set p_cat_title='$p_cat_title', p_cat_desc='$p_cat_desc' where p_cat_id='$p_cat_id'";
    $run_product=mysqli_query($con,$update_product);
    if ($run_product) {
        echo "<script>alert('product category edited successfully!!')</script>";
        echo "<script>window.open('admin_index.php?view_pro_cat')</script>";
    }
}
?>
<?php
}
?>