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
function addUser($name, $email = null , $password = null , $job = null , $salary = null){
    global $con;
    
    $insertUserQuery = "INSERT INTO users (freelancer_name, email, password, job, salary) 
    VALUES ('$name', '$email', '$password', '$job', '$salary')";

    // Insert the new user into the 'users' table
    mysqli_query($con, $insertUserQuery);
    
    // Return the ID of the newly added user
    return mysqli_insert_id($con);
}

// Function to add a new freelancer
function addFreelancer($name, $skills){
    global $con;
    
    // First, add the user
    $userId = addUser($name);
    
    // Then, insert the freelancer with the obtained user ID
    $insertFreelancerQuery = "INSERT INTO Freelancers (NameFreelancer , SKILLS, UserID) 
    VALUES ('$name', '$skills', '$userId')";
    mysqli_query($con, $insertFreelancerQuery);
}

function updateFreelancer($id , $new_name, $new_skills){
    global $con;
    
    // Update the skills of the freelancer with the given ID
    $updateQuery = "UPDATE Freelancers SET SKILLS = '$new_skills' , NameFreelancer = $new_name WHERE Freelance_ID = '$id'";
    mysqli_query($con, $updateQuery);
}

function deleteFreelancer($id){
    global $con;
    
    // Update the skills of the freelancer with the given ID
    $deleteQuery = "DELETE From Freelancers WHERE Freelance_ID = '$id'";
    mysqli_query($con, $deleteQuery);
}