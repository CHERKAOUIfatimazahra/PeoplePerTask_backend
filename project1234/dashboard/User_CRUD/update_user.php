<?php

require './../data_connection/database.php';
$id = $_POST['update_id'];
$new_name = $_POST['update_name'];
$new_skills = $_POST['update_password'];
$new_info = $_POST['update_email'];
$new_email = $_POST['update_info'];

$updateQuery = "UPDATE Freelancers SET SKILLS = '$new_skills' , NameFreelancer = '$new_name' WHERE Freelance_ID = '$id'";

mysqli_query($con, $updateQuery);

$updateQuery_2 = "UPDATE users SET email = '$new_email' , OtherRelevantInformation = '$new_info' WHERE UserID = (Select UserID from Freelancers where Freelance_ID = '$id')";

$res = mysqli_query($con, $updateQuery_2);

if($res)
        header("location: ./../freelancers.php");
?>