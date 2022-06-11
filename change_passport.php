<?php
        session_start();
        /* connect db */
        include "server.php";
        ini_set('smtp_port', 587);

/* use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';
$mail = new PHPMailer(); */
/* new mail pattern */
        /* if($connectdb){
            echo "db connected";
        }
        else{
            echo "not connected";
        } */
        function validate($field){
            if(!isset($_POST[$field])){
                return false;
            }else{
                return htmlspecialchars(stripslashes($_POST[$field]));
            }
        }
        $_SESSION['msg'] = "";
        
    if(isset($_POST['change_passport'])){
        
       
        $username = validate('username');
        
        $contact_passport = $_FILES['passport']['name'];
        /* $tempname = $_FILES['contact_passport']['tmp_name'];  */
        $folder = "users/".$contact_passport;
               
        
            if(move_uploaded_file($_FILES['passport']['tmp_name'], $folder)){
            $user_input = $connectdb->prepare("UPDATE users SET pharmacist_passport = :pharmacist_passport WHERE username = :username");
            $user_input->bindvalue('username', $username);
            $user_input->bindvalue('pharmacist_passport', $contact_passport);
            $user_input->execute();
            if(!$user_input){
                echo "user not created";
            }else{
                    $_SESSION['success'] = "Passport updated";   
                header("Location: members.php");
                }
            }else{
                $_SESSION['msg'] = "Passport not accepted!";
                header("Location: members.php");
            }
        }
       
    
            