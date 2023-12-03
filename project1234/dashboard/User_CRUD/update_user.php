<?php

require './../data_connection/database.php';

$id = htmlspecialchars(trim($_POST['update_id']));
$new_name = htmlspecialchars(trim($_POST['update_name']));
$new_password = htmlspecialchars(trim($_POST['update_password']));
$new_info = htmlspecialchars(trim($_POST['update_email']));
$new_img = htmlspecialchars(trim($_POST['update_img']));
$new_email = htmlspecialchars(trim($_POST['update_info']));

$updateQuery = "UPDATE Freelancers SET SKILLS = '$new_password' , NameFreelancer = '$new_name' WHERE Freelance_ID = '$id'";

mysqli_query($con, $updateQuery);

$updateQuery_2 = "UPDATE users SET email = '$new_email', user_img = '$new_img', OtherRelevantInformation = '$new_info' WHERE UserID = (Select UserID from Freelancers where Freelance_ID = '$id')";

$res = mysqli_query($con, $updateQuery_2);

if($res)
        header("location: ./../users.php");
?>