<!DOCTYPE html>
<html>

<head>
    <title>Simple Blog App</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="include/bootstrap5/css/bootstrap.min.css">

</head>

<body>

    <?php @include('include/header.php') ?>

    <div class="post-container">
        <h2>Latest Posts</h2>

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
            echo "0 results";
        }
        $con->close();
        ?>
    </div>

</body>

</html>