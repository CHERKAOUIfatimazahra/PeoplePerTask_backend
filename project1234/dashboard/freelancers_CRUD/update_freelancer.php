<?php

require './../data_connection/database.php';
$id = htmlspecialchars(trim($_POST['update_id']));
$new_name = htmlspecialchars(trim($_POST['update_name']));
$new_skills = htmlspecialchars(trim($_POST['update_skills']));
$new_info = htmlspecialchars(trim($_POST['update_info']));
$new_email = htmlspecialchars(trim($_POST['update_email']));

$updateQuery = "UPDATE Freelancers SET SKILLS = '$new_skills' , NameFreelancer = '$new_name' WHERE Freelance_ID = '$id'";

mysqli_query($con, $updateQuery);

$updateQuery_2 = "UPDATE users SET email = '$new_email' , OtherRelevantInformation = '$new_info' WHERE UserID = (Select UserID from Freelancers where Freelance_ID = '$id')";

$res = mysqli_query($con, $updateQuery_2);

if($res)
        header("location: ./../freelancers.php");
?>