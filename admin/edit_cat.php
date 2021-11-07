<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
else
{
?>
<?php
if(isset($_GET['edit_cat']))
{
	$edit_id=$_GET['edit_cat'];
	$get="select * from categories where cat_id='$edit_id'";
	$run_edit=mysqli_query($con,$get);
	$row_edit=mysqli_fetch_array($run_edit);
		$cat_id=$row_edit['cat_id'];
		$cat_title=$row_edit['cat_title'];
		$cat_desc=$row_edit['cat_desc'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Category</title>
	 <!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script> -->
</head>
<body>
    <div class="row">
    <div class="col-lg-2">
        
    </div>
    <div class="col-lg-10">
         <h1 class="page-header">Edit Categories</h1>
         <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i>  Dashboard/ Edit Category</li>
         </ol>
    </div>
</div>
    <div class="row">
        <div class="col-lg-3">
        
        </div>
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money fa-w"></i>Edit Category</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Category Title</label>
                        <div class="col-md-6">
                        	<input type="text" name="cat_title" class="form-control" value="<?php echo $cat_title; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Category Description</label><div class="col-md-6">
                        <textarea name="cat_desc" class="form-control" rows="6" cols="19"><?php echo $cat_desc; ?></textarea></div>
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
    $cat_title=$_POST['cat_title'];
    $cat_desc=$_POST['cat_desc'];
    $update_product="update categories set cat_title='$cat_title', cat_desc='$cat_desc' where cat_id='$cat_id'";
    $run_product=mysqli_query($con,$update_product);
    if ($run_product) {
        echo "<script>alert('Category edited successfully!!')</script>";
        echo "<script>window.open('admin_index.php?view_cat')</script>";
    }
}
?>
<?php
}
?>