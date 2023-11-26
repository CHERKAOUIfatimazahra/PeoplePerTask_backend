<?php

include(__DIR__."/../connection_database/database.php");

function getAllFreelancer(){
    $query = "select f.Freelance_ID,f.NameFreelancer,f.SKILLS,u.EmailAddress from Freelancers f
    inner join users u 
    on f.UserID = u.UserID;";

    global $con;
    $res = mysqli_query($con,$query);

    while($freelancer = mysqli_fetch_assoc( $res )){
        $GLOBALS['freelancers'][]=$freelancer;
    }
}