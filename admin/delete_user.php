<?php
include('includes/connection.php');

$query = "delete from users where user_id = {$_GET['id']}";

mysqli_query($conn, $query);

header("location:manage_admin.php");


?>