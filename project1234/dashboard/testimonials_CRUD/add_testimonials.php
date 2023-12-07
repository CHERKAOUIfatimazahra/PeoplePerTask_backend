<?php
session_start();
include './../data_connection/database.php';

if (!isset($_SESSION['UserID'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment = htmlspecialchars(trim($_POST['Comment']));
    $userId = $_SESSION['UserID'];

    $insertUserQuery = "INSERT INTO Testimonials (Comment, UserID) VALUES (?, ?)";
    $stmt = mysqli_prepare($con, $insertUserQuery);

    mysqli_stmt_bind_param($stmt, "si", $comment, $userId);
    $res = mysqli_stmt_execute($stmt);

    if ($res) {
        header("location: ./../testimonial.php");
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>