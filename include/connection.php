<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog_app";
$port = 3308;

$con = mysqli_connect("localhost", "root", "", "blog_app", 3308);
if (mysqli_connect_errno()) {
    echo "Connection Fail" . mysqli_connect_error();
}
