<?php

require_once 'email.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

if(empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["subject"])|| empty($_POST["message"]))
{
    echo "please enter ur information";
}
else if(!preg_match('/[A-Za-z\s]/',$name)){
   echo "name invalid";
}
else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo "email invalid";
}
else if(!preg_match('/[A-Za-z\s]/',$subject)){
    echo "enter your subject";
}
else if(strlen($message)<30){
    echo "it must countain more than 30 car";
}
else{


    $mail->setFrom($email ,$name); 
    $mail->addAddress('cherkaoui.fatimazahra97@gmail.com', 'test');     //Add a recipient
    $mail->Subject = 'Here is the subject';
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    header("location:../contact.php");

}
}


?>