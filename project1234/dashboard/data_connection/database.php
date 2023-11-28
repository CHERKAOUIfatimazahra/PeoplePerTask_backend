<?php

    $SERVER ='localhost';
    $Root ='root';
    $Password='';
    $DataBase ='peoplepertasks';
    $con = mysqli_connect($SERVER,$Root,$Password,$DataBase);
    if(!$con){
        die("NOT connecte" . mysqli_connect_error());
    }
    else{
    }
?>