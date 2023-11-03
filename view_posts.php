<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>View Posts</title>




</head>

<body>
    <?php @include('include/header.php') ?>
    <link rel="stylesheet" href="include/bootstrap5/css/bootstrap.min.css">

    <div class="post-container">
        <h2>View Posts</h2>

        <?php

        include('include/connection.php');

        if ($con->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $sql = "SELECT * FROM posts";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo '<div class="post">';
                echo '<h3>' . $row["title"] . '</h3>';
                echo '<p>' . $row["content"] . '</p>';
                echo '</div>';
            }
        } else {
            echo "No more Blog To Show";
        }
        $con->close();
        ?>
    </div>

</body>

</html>