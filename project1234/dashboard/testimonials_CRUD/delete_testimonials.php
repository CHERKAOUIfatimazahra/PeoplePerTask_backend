<?php
require './../data_connection/database.php';

$id = $_POST['delete_id'];

$deleteQuery = "DELETE From Testimonials WHERE ID_Temoignage = '$id'";
$res = mysqli_query($con, $deleteQuery);

    
if($res){
    mysqli_close($con);
    header("location: ./../testimonial.php");
}

?>