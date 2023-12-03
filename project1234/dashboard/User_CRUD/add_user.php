<?php
require './../data_connection/database.php';

$name = htmlspecialchars(trim($_POST['name']));
$password = md5(trim($_POST['password']));
$email = htmlspecialchars(trim($_POST['email']));
$img = htmlspecialchars(trim($_POST['img']));
$info = htmlspecialchars(trim($_POST['relevant_info']));

$insertUserQuery = "INSERT INTO users (UserName, Password, email, user_img,OtherRelevantInformation) 
VALUES ('$name','$password', '$email' , '$img' , '$info')";


mysqli_query($con, $insertUserQuery);

$userId = mysqli_insert_id($con);
    
$insertFreelancerQuery = "INSERT INTO Freelancers (NameFreelancer , SKILLS, UserID) 
VALUES ('$name', '$skills', '$userId')";


$res = mysqli_query($con, $insertFreelancerQuery);


if ($res)
    header("location: ./../users.php");

mysqli_close($con);
?>