<?php
include('admin/includes/connection.php');

// make the action when user click on Save Button
if (isset($_POST['register'])) {

    // get image data
    $image_name = $_FILES['user_image']['name'];
    $tmp_name   = $_FILES['user_image']['tmp_name'];
    $path       = 'images/admin_image/';

    // move image to folder
    move_uploaded_file($tmp_name, $path . $image_name);


    // Take Data From Web Form 
    $email    = $_POST['user_email'];
    $password = $_POST['user_password'];
    $fullname = $_POST['user_fullname'];

    $query = "insert into users(user_email,user_password,fullname,image)
              values('$email','$password','$fullname','$path$image_name')";
    mysqli_query($conn, $query);
    header("location:index.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Fontfaces CSS-->
    <link href="admin/css/font-face.css" rel="stylesheet" media="all">
    <link href="admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="admin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="admin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="admin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link rel="shortcut icon" href="admin/images/icon/logoteal.png">

    <!-- Main CSS-->
    <link href="admin/css/theme.css" rel="stylesheet" media="all">
    <style>
        #regbtn {
            background-color: #4FBFA8;
        }
    </style>
</head>

<body class="animsition">
    <div class="page-wrapper" style="background-color:#4FBFA8;">
        <div class="page-content--bge3" style="background-color:#4FBFA8;">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="register.php">
                                <!-- <img src="admin/images/icon/newlogo.png" alt="CoolAdmin"> -->
                                <h3>Sign Up</h3>
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="user_fullname" placeholder="Enter Your Full Name" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="user_email" placeholder="example@gmail.com" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="user_password" placeholder="Enter Your Password" required="required">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Your Image</label>
                                    <input id="cc-pament" name="user_image" type="file" class="form-control" required="required">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree" required="required">Agree the terms and policy
                                    </label>
                                </div>
                                <button id="regbtn" class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="register">register</button>
                                <div class="social-login-content">
                                    <div class="text-center">
                                        <a class="btn btn-primary" href="distribution/index.php" role="button">I am a guest</a>
                                    </div>
                                </div>
                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="index.php">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="background-color:#4FBFA8;">
        <div class="col-md-12">
            <div class="copyright">
                <p style="font-size: medium;">Copyright © 2020 Orange Coding Academy Trainees. All rights reserved.</p>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="admin/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="admin/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="admin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="admin/vendor/slick/slick.min.js">
    </script>
    <script src="admin/vendor/wow/wow.min.js"></script>
    <script src="admin/vendor/animsition/animsition.min.js"></script>
    <script src="admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="admin/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="admin/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="admin/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="admin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="admin/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="admin/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="admin/js/main.js"></script>

</body>

</html>
<!-- end document-->