<?php
include('includes/connection.php');

// make the action when user click on Save Button
if (isset($_POST['add'])) {

    // get image data
    $image_name = $_FILES['category_image']['name'];
    $tmp_name   = $_FILES['category_image']['tmp_name'];
    $path       = 'images/category_image/';

    // move image to folder
    move_uploaded_file($tmp_name, $path . $image_name);


    // Take Data From Web Form 
    $category    = $_POST['category_name'];


    $query = "update category set category_name = '$category', category_img = '$path$image_name'
            
where category_id = {$_GET['id']}";

    mysqli_query($conn, $query);
    header("location:manage_category.php");
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
                        <div class="card-header">Manage Category</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Update Category</h3>
                            </div>
                            <hr>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                    <input id="cc-pament" name="category_name" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Category Image</label>
                                    <input id="cc-pament" name="category_image" type="file" class="form-control">
                                </div>



                        </div>
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="add" style="background-color:#4FBFA8;">
                                <span id="payment-button-amount">Update</span>
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