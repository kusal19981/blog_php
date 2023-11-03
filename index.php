<?php
session_start();
include('include/connection.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username = ? and password = ?";
    $query = $con->prepare($sql);
    $query->bind_param("ss", $username, $password);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows == 1) {
        $_SESSION['admin'] = true;
        header('Location: home.php');
        exit;
    } else {
        echo "Invalid credentials";
    }

    $con->close();
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="include/bootstrap5/css/bootstrap.min.css">

</head>

<body>

    <div class="login-panel">
        <h2 class="admin">Admin Login</h2>
        <form class="admin" method="post" enctype="multipart/form-data">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" name="submit" value="Login">
        </form>
    </div>

</body>

</html>