<?php
session_start();
include '../data_connection/database.php';

if (!isset($_SESSION['UserID'])) {
    header("Location: ../login.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$title = htmlspecialchars(trim($_POST['Project_Title']));
$desc = htmlspecialchars(trim($_POST['Descrip_project']));
$cat_id = htmlspecialchars(trim($_POST['Category_ID']));
$sub_id = htmlspecialchars(trim($_POST['sub_Category_ID']));
$userID = $_SESSION['UserID'];

$userID = $_SESSION['UserID'];
$insertUserQuery = "INSERT INTO Projects (Project_Title, Descrip_project, Category_ID, sub_Category_ID,UserID) 
VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($con, $insertUserQuery);

mysqli_stmt_bind_param($stmt, "ssssi", $title, $desc, $cat_id, $sub_id,$userID);

$res = mysqli_stmt_execute($stmt);

if ($res) {
    header("location: ./../projects.php");
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_stmt_close($stmt);
mysqli_close($con);
}
?>