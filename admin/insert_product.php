<?php
namespace Phppot;
use Phppot\CountryState;
require_once __DIR__ . '/Model/CountryStateCity.php';
$countryStateCity = new CountryStateCity();
$countryResult = $countryStateCity->getAllCountry();
?>

<?php
if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
else
{
}
?>
<html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
<script src="./vendor/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="./assets/js/ajax-handler.js" type="text/javascript"></script>

<!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->

<!-- jQuery library -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 -->
<!-- <script src="jquery.js"></script> -->
</head>
<body>
    <div class="row">
    <div class="col-lg-2">
        
    </div>
    <div class="col-lg-10">
         <h1 class="page-header">Insert Product</h1>
         <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i>  Dashboard/ Insert Product</li>
         </ol>
    </div>
</div>
    <div class="row">
        <div class="col-lg-3">
        
        </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa a-money fa-w"></i>Insert Product</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Title</label>
                        <input type="text" name="product_title" class="form-control" required>
                    </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Categories</label><br /> 
                            <select name="country"
                                id="country-list" class="form-control" onChange="getState(this.value);">
                                <option value disabled selected>Select Categories</option>
                                    <?php
                                    foreach ($countryResult as $country) {
                                        ?>
                                <option value="<?php echo $country["cat_id"]; ?>"><?php echo $country["cat_title"]; ?></option>
                                    <?php
                                    }
                                    ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Categories</label><br /> 
                            <select name="state" class="form-control" id="state-list">
                                <option>Select Product Category</option>
                            </select>
                        </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Image1</label>
                        <input type="file" name="product_img1" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Image2</label>
                        <input type="file" name="product_img2" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Price</label>
                        <input type="text" name="product_price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product keyword</label>
                        <input type="text" name="product_keywords" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Product Description</label>
                        <textarea name="product_desc" class="form-control" rows="6" cols="19"></textarea>
                    </div>
                    <div class="form-group">
                       <input type="submit" name="submit" value="insert_product" class="btn btn-primary form-control"> 
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        
    </div>
</div>
<script type="text/javascript">
    functions change_category()
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.open("GET","ajax.php?categories="+document.getElementById("categoriesdd").value,false);
        xmlhttp.send(null);
        alert(xmlhttp.responseText);
        document.getElementById("product_categories").innerHTML=xmlhttp.responseText;

    }
</script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $product_title=$_POST['product_title'];
    $product_cat=$_POST['country'];
    $cat=$_POST['state'];
    $product_price=$_POST['product_price'];
    $product_desc=$_POST['product_desc'];
    $product_keywords=$_POST['product_keywords'];
    $product_img1=$_FILES['product_img1']['name'];
    $product_img2=$_FILES['product_img2']['name'];
    $temp_name1=$_FILES['product_img1']['tmp_name'];
    $temp_name2=$_FILES['product_img2']['tmp_name'];
    move_uploaded_file($temp_name1, "images/$product_img1");   
    move_uploaded_file($temp_name2, "images/$product_img2");
    $inset_product="insert into products(cat_id, p_cat_id, date, product_title, product_img1, product_img2, product_price, product_desc, product_keyword) values('$cat','$product_cat',NOW(),'$product_title','$product_img1','$product_img2','$product_price','$product_desc','$product_keywords')";
    $run_product=mysqli_query($con,$inset_product);
    if ($run_product) {
        echo "<script>alert('product inserted successfully!!')</script>";
        echo "<script>window.open('admin_index.php?view_product')</script>";
    }
}
?>