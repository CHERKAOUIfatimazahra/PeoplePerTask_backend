<?php
require './../data_connection/database.php';

$id = $_POST['delete_id'];

$deleteQuery = "DELETE From Freelancers WHERE Freelance_ID = '$id'";
$res = mysqli_query($con, $deleteQuery);

    
if($res){
    mysqli_close($con);
    header("location: ./../freelancers.php");
}

?>