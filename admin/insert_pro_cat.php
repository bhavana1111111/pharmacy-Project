<?php
include ("includes/db.php");
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
else
{

?>
<!DOCTYPE html>
<html>
<head>
	<title>Inser Product Category</title>
	<!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script> -->
</head>
<body>
    <div class="row">
    <div class="col-lg-2">
        
    </div>
    <div class="col-lg-10">
         <h1 class="page-header">Insert Product Category</h1>
         <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i>  Dashboard/ Insert Product Category</li>
         </ol>
    </div>
</div>
    <div class="row">
        <div class="col-lg-3">
        
        </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa a-money fa-w"></i>Insert Product Category</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Category</label><div class="col-md-6">
                        <select name="cat" class="form-control" required><option>Select Categories</option>
                            <?php 
                                $get_cats="select * from categories";
                                $run_cats=mysqli_query($con,$get_cats);
                                while($row=mysqli_fetch_array($run_cats))
                                {
                                    $id=$row['cat_id'];
                                    $cat_title=$row['cat_title'];
                                    echo "<option value='$id'> $cat_title  </option>";
                                    
                                }

                            ?>
                        </select></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Category Title</label><div class="col-md-6">
                        <input type="text" name="p_cat_title" class="form-control" required></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Description</label><div class="col-md-6">
                        <textarea name="p_cat_desc" class="form-control"></textarea></div>
                    </div>
                    <div class="form-group"><div class="col-md-6">
                       <input type="submit" name="submit" value="submit_now" class="btn btn-primary form-control"> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        
    </div>
</div>

<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $p_cat_title=$_POST['p_cat_title'];
    $cat=$_POST['cat'];
    $p_cat_desc=$_POST['p_cat_desc'];
    $inset_product="insert into product_categories (category, p_cat_title, p_cat_desc) values('$cat','$p_cat_title','$p_cat_desc')";
    $run_product=mysqli_query($con,$inset_product);
    if ($run_product) {
        echo "<script>alert('New product Category has been inserted successfully!!')</script>";
        echo "<script>window.open('admin_index.php?view_pro_cat')</script>";
    }
}
?>


<?php

}
?>