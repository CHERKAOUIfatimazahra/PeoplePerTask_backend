<?php
require './../data_connection/database.php';

$comment = $_POST['Comment'];
$userId = $_POST['UserID'];

$insertUserQuery = "INSERT INTO Testimonials (Comment, UserID) 
VALUES ('$comment', '$userId')";

$res = mysqli_query($con, $insertUserQuery);

if ($res)
    header("location: ./../testimonial.php");

mysqli_close($con);
?>