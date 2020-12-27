<?php
ob_start();
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
    <title>Login</title>

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
    #logbtn{
        background-color: #4FBFA8;
    }
</style>
</head>

<body class="animsition">
    <div class="page-wrapper" style="background-color:#4FBFA8;">
        <div class="page-content--bge5" style="background-color:#4FBFA8;">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="index.php">
                                <!-- <img src="admin/images/icon/newlogo.png" alt="CoolAdmin"> -->
                                <h3>Login</h3>
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="example@gmail.com" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Enter Your Password" required="required">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <a href="#">Forgotten Password?</a>
                                    </label>
                                </div>
                                <button id="logbtn" class="au-btn au-btn--block au-btn--green m-b-20" name="login" type="submit">sign in</button>
                                <div class="social-login-content">
                                    <div class="text-center">
                                        <a class="btn btn-primary" href="distribution/index.php" role="button">I am a guest</a>
                                    </div>
                                </div>
                            </form>
                            <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="register.php">Sign Up Here</a>
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

    <!-- Jquery JS -->
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
<?php
session_start();
include('includes/connection.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE 	admin_email = '$username' AND admin_password = '$password' ";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_fetch_array($result);
    if (isset($check)) {
        $_SESSION['id'] = $check['admin_id'];
        header('Location:admin/index.php');
        die;
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE 	user_email = '$username' AND user_password = '$password' ";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_fetch_array($result);
    if (isset($check)) {
        $_SESSION['id'] = $check['user_id'];
        header('Location:distribution/index.php');
        die;
    }
}
?>

