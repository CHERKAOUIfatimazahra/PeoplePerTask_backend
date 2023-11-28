<?php
require './../data_connection/database.php';

$title = $_POST['Project_Title'];
$desc = $_POST['Descrip_project'];
$cat_id = $_POST['Category_ID'];
$sub_id = $_POST['sub_Category_ID'];


$insertUserQuery = "INSERT INTO Projects (Project_Title, Descrip_project, Category_ID, sub_Category_ID) 
VALUES ('$title', '$desc' , '$cat_id' , '$sub_id')";

$res = mysqli_query($con, $insertUserQuery);

if ($res)
    header("location: ./../projects.php");

mysqli_close($con);
?>