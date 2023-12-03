<?php

require './../data_connection/database.php';
$id = htmlspecialchars(trim($_POST['update_id']));
$title = htmlspecialchars(trim($_POST['update_Project_Title']));
$desc = htmlspecialchars(trim($_POST['update_Descrip_project']));
$cat_id = htmlspecialchars(trim($_POST['update_Category_ID']));
$sub_id = htmlspecialchars(trim($_POST['update_sub_Category_ID']));

$updateQuery = "UPDATE Projects SET Project_Title = '$title' , Descrip_project = '$desc' , Category_ID = '$cat_id' , sub_Category_ID = '$sub_id' WHERE Project_ID = '$id'";

$res = mysqli_query($con, $updateQuery);

if($res)
        header("location: ./../projects.php");
?>