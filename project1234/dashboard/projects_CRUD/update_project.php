<?php
require './../data_connection/database.php';

$id = htmlspecialchars(trim($_POST['update_id']));
$title = htmlspecialchars(trim($_POST['update_Project_Title']));
$desc = htmlspecialchars(trim($_POST['update_Descrip_project']));
$cat_id = htmlspecialchars(trim($_POST['update_Category_ID']));
$sub_id = htmlspecialchars(trim($_POST['update_sub_Category_ID']));
$tags_name = htmlspecialchars(trim($_POST['update_tags']));

$updateQuery = "UPDATE Projects SET Project_Title = '$title', Descrip_project = '$desc', Category_ID = '$cat_id', sub_Category_ID = '$sub_id', tag_name = '$tags_name' 
WHERE Project_ID = '$id'";

$stmt = mysqli_prepare($con, $updateQuery);

mysqli_stmt_bind_param($stmt,"ssssss", $title, $desc, $cat_id, $sub_id,$tags_name,$id);

$res = mysqli_stmt_execute($stmt);

if ($res) {
    header("location: ./../projects.php");
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_stmt_close($stmt);
mysqli_close($con);
?>