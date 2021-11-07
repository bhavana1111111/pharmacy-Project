<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
else
{
?>
<?php
if(isset($_GET['edit_product']))
{
	$edit_id=$_GET['edit_product'];
	$get_p="select * from products where product_id='$edit_id'";
	$run_edit=mysqli_query($con,$get_p);
	$row_edit=mysqli_fetch_array($run_edit);
		$p_id=$row_edit['product_id'];
		$p_title=$row_edit['product_title'];
		$p_cat=$row_edit['p_cat_id'];
		$cat=$row_edit['cat_id'];
		$p_img1=$row_edit['product_img1'];
		$p_img2=$row_edit['product_img2'];
		$p_price=$row_edit['product_price'];
		$p_desc=$row_edit['product_desc'];
		$p_keyword=$row_edit['product_keyword'];
}
		$get_p_cat="select * from product_categories where p_cat_id='$p_cat'";
		$run_p_cat=mysqli_query($con,$get_p_cat);
		$row_p_cat=mysqli_fetch_array($run_p_cat);
		$p_cat_title=$row_p_cat['p_cat_title'];
		$get_cat="select * from categories where cat_id='$cat'";
		$run_cat=mysqli_query($con, $get_cat);
		$row_cat=mysqli_fetch_array($run_cat);
		$cat_title=$row_cat['cat_title'];

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
         <h1 class="page-header">Edit Product</h1>
         <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i>  Dashboard/ Edit Product</li>
         </ol>
    </div>
</div>
    <div class="row">
        <div class="col-lg-3">
        
        </div>
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money fa-w"></i>Edit Product</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Title</label>
                        <div class="col-md-6">
                        	<input type="text" name="product_title" class="form-control" value="<?php echo $p_title; ?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Category</label><div class="col-md-6">
                        <select name="cat" class="form-control">
                            <option value="<?php echo $cat; ?>"><?php echo $cat_title; ?></option>
                            <?php 
                                $get_cat="select * from categories";
                                $run_cat=mysqli_query($con,$get_cat);
                                while($row_cat=mysqli_fetch_array($run_cat))
                                {
                                    $cat_id=$row_cat['cat_id'];
                                    $cat_title=$row_cat['cat_title'];
                                    echo "<option value='$cat_id'> $cat_title  </option>";
                                    
                                }

                            ?>
                        </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Categories</label><div class="col-md-6">
                        <select name="product_cat" class="form-control"><option value="<?php echo $p_cat; ?>"><?php echo $p_cat_title; ?></option>
                            <?php 
                                $get_p_cats="select * from product_categories";
                                $run_p_cats=mysqli_query($con,$get_p_cats);
                                while($row_p_cats=mysqli_fetch_array($run_p_cats))
                                {
                                    $p_cat_id=$row_p_cats['p_cat_id'];
                                    $p_cat_title=$row_p_cats['p_cat_title'];
                                    echo "<option value='$p_cat_id'> $p_cat_title  </option>";
                                    
                                }

                            ?>
                        </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Image1</label><div class="col-md-6">
                        <input type="file" name="product_img1" class="form-control">
                        <img src="../images/<?php echo $p_img1; ?>" width="70" height="70"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Image2</label><div class="col-md-6">
                        <input type="file" name="product_img2" class="form-control">
                        <img src="../images/<?php echo $p_img2; ?>" width="70" height="70"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Price</label><div class="col-md-6">
                        <input type="text" name="product_price" class="form-control" value="<?php echo $p_price; ?>"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product keyword</label><div class="col-md-6">
                        <input type="text" name="product_keywords" class="form-control" value="<?php echo $p_keyword; ?>"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Description</label><div class="col-md-6">
                        <textarea name="product_desc" class="form-control" rows="6" cols="19"><?php echo $p_desc; ?></textarea></div>
                    </div>
                    <div class="form-group"><div class="col-md-6">
                       <input type="submit" name="update" value="update_product" class="btn btn-primary form-control"> </div>
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
    $product_title=$_POST['product_title'];
    $product_cat=$_POST['product_cat'];
    $cat=$_POST['cat'];
    $product_price=$_POST['product_price'];
    $product_desc=$_POST['product_desc'];
    $product_keywords=$_POST['product_keywords'];
    $product_img1=$_FILES['product_img1']['name'];
    $product_img2=$_FILES['product_img2']['name'];
    $temp_name1=$_FILES['product_img1']['tmp_name'];
    $temp_name2=$_FILES['product_img2']['tmp_name'];
    move_uploaded_file($temp_name1, "images/$product_img1");   
    move_uploaded_file($temp_name2, "images/$product_img2");
    $update_product="update products set cat_id='$cat', p_cat_id='$product_cat', date=NOW(), product_title='$product_title', product_price='$product_price', product_desc='$product_desc', product_keyword='$product_keywords' where product_id='$p_id'";
        if ($product_img1!='') 
        {
            $up_img1="update products set product_img1='$product_img1' where product_id='$p_id'";
            $run=mysqli_query($con,$up_img1);
        }
        if ($product_img2!='') 
        {
            $up_img2="update products set product_img2='$product_img2' where product_id='$p_id'";
            $run=mysqli_query($con,$up_img2);
        }
    $run_product=mysqli_query($con,$update_product);
    if ($run_product) {
        echo "<script>alert('product edited successfully!!')</script>";
        echo "<script>window.open('admin_index.php?view_product')</script>";
    }

}
?>
<?php
}
?>