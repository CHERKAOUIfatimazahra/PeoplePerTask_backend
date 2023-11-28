<?php
require './../data_connection/database.php';

$id = $_POST['delete_id'];

$deleteQuery = "DELETE From Projects WHERE Project_ID = '$id'";
$res = mysqli_query($con, $deleteQuery);

    
if($res){
    mysqli_close($con);
    header("location: ./../projects.php");
}

?>