<?php
require './../data_connection/database.php';

$id = htmlspecialchars(trim($_POST['update_id']));
$title = htmlspecialchars(trim($_POST['update_Project_Title']));
$desc = htmlspecialchars(trim($_POST['update_Descrip_project']));
$cat_id = htmlspecialchars(trim($_POST['update_Category_ID']));
$sub_id = htmlspecialchars(trim($_POST['update_sub_Category_ID']));

$updateQuery = "UPDATE Projects SET Project_Title = '$title', Descrip_project = '$desc', Category_ID = '$cat_id', sub_Category_ID = '$sub_id' WHERE Project_ID = '$id'";

$stmt = mysqli_prepare($con, $updateQuery);

mysqli_stmt_bind_param($stmt, "sssss", $title, $desc, $cat_id, $sub_id, $id);

$res = mysqli_stmt_execute($stmt);

if ($res) {
    header("location: ./../projects.php");
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_stmt_close($stmt);
mysqli_close($con);
?>