<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


$mail = new PHPMailer();

$mail->isSMTP();                                           
$mail->Host       = 'smtp.gmail.com';                
$mail->SMTPAuth   = true;                                   
$mail->Username   = 'cherkaoui.fatimazahra97@gmail.com';                
$mail->Password   = 'ovsz wtdc mdml zlsx';                               
$mail->SMTPSecure = 'ssl';  
$mail->Port       = 465;                                   
  
$mail->isHTML(true);