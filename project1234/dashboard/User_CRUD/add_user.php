<?php
require './../data_connection/database.php';

$name = $_POST['UserName'];
$password = $_POST['Password'];
$email = $_POST['email'];
$info = $_POST['relevant_info'];

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