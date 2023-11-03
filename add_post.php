<?php
session_start();
include('include/connection.php');

if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit;
}

if (isset($_POST['title']) && isset($_POST['content'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];


    $sql = "INSERT INTO posts (title, content) VALUES (?, ?)";
    $query = $con->prepare($sql);
    $query->bind_param("ss", $title, $content);

    if ($query->execute() === TRUE) {
        header('Location: view_posts.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <?php @include('include/header.php') ?>
    <link rel="stylesheet" href="include/bootstrap5/css/bootstrap.min.css">
    <title>Add Post</title>

</head>

<body>

    <div class="add-post-form">
        <h2>Add Post</h2>
        <form method="post" action="add_post.php">
            <input type="text" name="title" placeholder="Title" required><br>
            <textarea name="content" placeholder="Content" rows="10" required></textarea><br>
            <input type="submit" value="Submit">
        </form>
    </div>

</body>

</html>