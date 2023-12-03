<?php
require './../data_connection/database.php';

$name = htmlspecialchars(trim($_POST['name']));
$skills = htmlspecialchars(trim($_POST['skills']));
$email = htmlspecialchars(trim($_POST['email']));
$info = htmlspecialchars(trim($_POST['relevant_info']));

$insertUserQuery = "INSERT INTO users (UserName, email ,OtherRelevantInformation) 
VALUES ('$name', '$email' , '$info')";

mysqli_query($con, $insertUserQuery);

$userId = mysqli_insert_id($con);
    
$insertFreelancerQuery = "INSERT INTO Freelancers (NameFreelancer , SKILLS, UserID) 
VALUES ('$name', '$skills', '$userId')";

$res = mysqli_query($con, $insertFreelancerQuery);

if ($res)
    header("location: ./../freelancers.php");

mysqli_close($con);
?>