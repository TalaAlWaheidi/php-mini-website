<?php
include('includes/connection.php');

// make the action when user click on Save Button
if (isset($_POST['addproduct'])) {

    // get image data
    $image_name = $_FILES['product_image']['name'];
    $tmp_name   = $_FILES['product_image']['tmp_name'];
    $path       = 'images/product_image/';

    // move image to folder
    move_uploaded_file($tmp_name, $path . $image_name);


    // Take Data From Web Form 
    $productName           = $_POST['product_name'];
    $productDescription    = $_POST['product_description'];
    $productPrice          = $_POST['product_price'];


    $query = "update product set product_name = '$productName',product_description = '$productDescription', product_image = '$path$image_name', product_price = '$productPrice'
            
where product_id = {$_GET['id']}";
    mysqli_query($conn, $query);
    header("location:manage_product.php");
}

?>
<?php include('includes/admin_header.php'); ?>

<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Manage Product</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Update Product</h3>
                            </div>
                            <hr>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Product Name</label>
                                    <input id="cc-pament" name="product_name" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Product Description</label>
                                    <input id="cc-pament" name="product_description" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Product Image</label>
                                    <input id="cc-pament" name="product_image" type="file" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Product Price</label>
                                    <input id="cc-pament" name="product_price" type="text" class="form-control">
                                </div>



                        </div>
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="addproduct" style="background-color:#4FBFA8;">
                                <span id="payment-button-amount">Update Product</span>
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End MAIN CONTENT-->

<?php include('includes/admin_footer.php'); ?>