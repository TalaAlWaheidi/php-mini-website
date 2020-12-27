<?php
include('includes/connection.php');

// make the action when user click on Save Button
if(isset($_POST['submit'])){
    
    // get image data
    $image_name = $_FILES['admin_image']['name'];
    $tmp_name   = $_FILES['admin_image']['tmp_name'];
    $path       = 'images/admin_image/';
    
    // move image to folder
    move_uploaded_file($tmp_name,$path.$image_name);


    // Take Data From Web Form 
    $email    = $_POST['admin_email'];
    $password = $_POST['admin_password'];
    $fullname = $_POST['admin_fullname'];

    $query = "insert into admin(admin_email,admin_password,fullname, image)
              values('$email','$password','$fullname','$path$image_name')";
    mysqli_query($conn,$query); 
    header("location:manage_admin.php");  
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
                        <div class="card-header">Manage Admin</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Create Admin</h3>
                            </div>
                            <hr>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Admin Email</label>
                                    <input id="cc-pament" name="admin_email" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Admin Password</label>
                                    <input id="cc-pament" name="admin_password" type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Admin Fullname</label>
                                    <input id="cc-pament" name="admin_fullname" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Admin Image</label>
                                    <input id="cc-pament" name="admin_image" type="file" class="form-control">
                                </div>



                            </div>
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit" style="background-color:#4FBFA8;">
                                    <span id="payment-button-amount">Create</span>                
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
                                    <th>Admin Email</th>
                                    <th>Full Name</th>
                                    <th>Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $query  = "select * from admin";
                            $result = mysqli_query($conn,$query);
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td>{$row['admin_id']}</td>";
                                echo "<td>{$row['admin_email']}</td>";
                                echo "<td>{$row['fullname']}</td>";
                                echo "<td><img src='{$row['image']}' width='200' height='260'></td>";
                                echo "<td><a href='edit_admin.php?id={$row['admin_id']}' class='btn btn-primary'>Edit</a></td>";
                                echo "<td><a href='delete_admin.php?id={$row['admin_id']}' class='btn btn-danger'>Delete</a></td>";
                                echo "</tr>";
                            }
                             ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE-->
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
                                    <th>User Email</th>
                                    <th>Full Name</th>
                                    <th>Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $query  = "select * from users";
                            $result = mysqli_query($conn,$query);
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td>{$row['user_id']}</td>";
                                echo "<td>{$row['user_email']}</td>";
                                echo "<td>{$row['fullname']}</td>";
                                echo "<td><img src='{$row['image']}' width='200' height='260'></td>";
                                echo "<td><a href='edit_user.php?id={$row['user_id']}' class='btn btn-primary'>Edit</a></td>";
                                echo "<td><a href='delete_user.php?id={$row['user_id']}' class='btn btn-danger'>Delete</a></td>";
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


<!-- ///////////////////////////////////////////////////////////////////////////////////// -->




<?php include('includes/admin_footer.php'); ?>