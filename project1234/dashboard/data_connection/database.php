<?php

    $SERVER ='localhost';
    $Root ='root';
    $Password='';
    $DataBase ='peoplepertask';
    $con = mysqli_connect($SERVER,$Root,$Password,$DataBase);
    if(!$con){
        die("NOT connecte" . mysqli_connect_error());
    }
    else{
        echo 'connection successfully';
    }
?>