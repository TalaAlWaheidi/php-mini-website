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
    $productCat            = $_POST['category_name'];


    $query = "insert into product(product_name,product_description,product_image,product_price,category_name)
              values('$productName','$productDescription','$path$image_name','$productPrice','$productCat')";
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
                                <h3 class="text-center title-2">Create Product</h3>
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
                                <select id="select" class="form-control" name="category_name">
                                    <?php
                                    $query  = "select * from category";
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo " <option> {$row['category_name']} </option>";
                                    }
                                    ?>
                                </select>
                        </div>
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="addproduct" style="background-color:#4FBFA8;">
                                <span id="payment-button-amount">Add Product</span>
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row m-t-30">
                <div class="col-md-12">
                    <!-- DATA TABLE-->
                    <div class="table-responsive m-b-40">
                        <table class="table table-borderless table-data3">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Product Description</th>
                                    <th>Product Price</th>
                                    <th>Category</th>
                                    <th>Product Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query  = "select * from product";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>{$row['product_id']}</td>";
                                    echo "<td>{$row['product_name']}</td>";
                                    echo "<td>{$row['product_description']}</td>";
                                    echo "<td>{$row['product_price']}</td>";
                                    echo "<td>{$row['category_name']}</td>";
                                    echo "<td><img src='{$row['product_image']}' width='200' height='260'></td>";
                                    echo "<td><a href='edit_product.php?id={$row['product_id']}' class='btn btn-primary'>Edit</a></td>";
                                    echo "<td><a href='delete_product.php?id={$row['product_id']}' class='btn btn-danger'>Delete</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End MAIN CONTENT-->

<?php include('includes/admin_footer.php'); ?>