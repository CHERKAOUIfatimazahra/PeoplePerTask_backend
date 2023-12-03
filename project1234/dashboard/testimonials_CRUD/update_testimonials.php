<?php

require './../data_connection/database.php';
$id = htmlspecialchars(trim($_POST['update_id']));
$comment = htmlspecialchars(trim($_POST['update_Comment']));
$userID = htmlspecialchars(trim($_POST['update_UserID']));

$updateQuery = "UPDATE Testimonials SET Comment = '$comment' , UserID = '$userID' WHERE ID_Temoignage = '$id'";

$res = mysqli_query($con, $updateQuery);

if($res)
        header("location: ./../testimonial.php");
?>