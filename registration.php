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
    require "PHPMailer/PHPMailerAutoload.php";
    require "PHPMailer/class.phpmailer.php";
    require "PHPMailer/class.smtp.php";
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
        
    if(isset($_POST['register'])){
        $pharmacy_exist = ucwords(validate('pharmacy_exist'));
        $first_time_reg = ucwords(validate('first_time_reg'));
        $previous_place = ucwords(validate('previous_place'));
        $fellow = validate('fellow');
        $pharmacy_name= ucfirst(validate('pharmacy_name'));
        $contact_person = ucwords(validate('pharmacist'));
        $pharmacist_class = ucwords(validate('pharmacist_class'));
        $_SESSION['sup'] = $contact_person;
        $username = validate('username');
        $contact_email = validate('contact_email');
        $contact_address = ucwords(validate('contact_address'));
        $contact_birth_date = validate('contact_birth_date');
        $contact_gender = validate('contact_gender');
        $contact_pcn_reg = validate('contact_pcn_reg');;
        $contact_next_of_kin = ucwords(validate('contact_next_of_kin'));
        $previous_address = ucwords(validate('previous_address'));
        $previous_director = ucwords(validate('previous_director'));
        $position_held = ucwords(validate('position_held'));
        $previous_director_contact = ucwords(validate('previous_director_phone'));
        $contact_next_of_kin_phone = validate('contact_next_of_kin_phone');
        $contact_next_of_kin_address = validate('contact_next_of_kin_address'); 
        $pharmacy_address = validate('pharmacy_address');
        $pharmacy_location = validate('pharmacy_location');
        $practice_type = validate('practice_type');
        $pharmacy_director = validate('pharmacy_director');
        $pharmacist_director_phone = validate('pharmacist_director_phone');
        $registration_number = validate('registration_number');
        $contact_passport = $_FILES['contact_passport']['name'];
        /* $tempname = $_FILES['contact_passport']['tmp_name'];  */
        $folder = "users/".$contact_passport;
        date_default_timezone_set("Africa/Lagos");
        $registration_date = date("Y-m-d");
        /* $reg_status = 0; */
        $user_password = 123;
        $admin_email = "onostarkels@gmail.com";
        

        $user_input = $connectdb->prepare("INSERT INTO users (username, pharmacist_class, first_time_reg, previous_place, previous_address, previous_director, previous_director_contact, position_held, fellow, pharmacist, pharmacist_passport, pharmacist_email, pharmacist_address, pharmacy_name, pharmacy_address, user_password, contact_gender, contact_pcn_reg, contact_birth_date, contact_next_of_kin, contact_next_of_kin_phone, contact_next_of_kin_address, pharmacy_exist, pharmacy_location, practice_type, pharmacy_director, pharmacist_director_phone,  registration_number, registration_date) VALUES (:username, :pharmacist_class, :first_time_reg, :previous_place, :previous_address, :previous_director, :previous_director_contact, :position_held, :fellow, :pharmacist, :pharmacist_passport, :pharmacist_email, :pharmacist_address, :pharmacy_name, :pharmacy_address, :user_password, :contact_gender, :contact_pcn_reg, :contact_birth_date, :contact_next_of_kin, :contact_next_of_kin_phone, :contact_next_of_kin_address, :pharmacy_exist, :pharmacy_location, :practice_type, :pharmacy_director, :pharmacist_director_phone, :registration_number, :registration_date)");

        /* $sql_inserted = mysqli_query($connectdb, $sql_input); */

        $check_user = $connectdb->prepare("SELECT * FROM users WHERE username = :username");
        $check_user->bindvalue('username', $username);
        $check_user->execute();
        
      if($check_user->rowCount() > 0){
        $_SESSION['msg'] = "User already exist!";
        header("Location: register.php");
        
      }else{
            if(move_uploaded_file($_FILES['contact_passport']['tmp_name'], $folder)){
            $user_input->bindvalue('username', $username);
            $user_input->bindvalue('pharmacist_class', $pharmacist_class);
            $user_input->bindvalue('pharmacist', $contact_person);
            $user_input->bindvalue('first_time_reg', $first_time_reg);
            $user_input->bindvalue('previous_place', $previous_place);
            $user_input->bindvalue('fellow', $fellow);
            $user_input->bindvalue('pharmacist_passport', $contact_passport);
            $user_input->bindvalue('pharmacist_email', $contact_email);
            $user_input->bindvalue('previous_address', $previous_address);
            $user_input->bindvalue('previous_director', $previous_director);
            $user_input->bindvalue('previous_director_contact', $previous_director_contact);
            $user_input->bindvalue('position_held', $position_held);
            $user_input->bindvalue('pharmacist_address', $contact_address);
            $user_input->bindvalue('pharmacy_name', $pharmacy_name);
            $user_input->bindvalue('pharmacy_address', $pharmacy_address);
            $user_input->bindvalue('user_password', $user_password);
            $user_input->bindvalue('contact_gender', $contact_gender);
            $user_input->bindvalue('contact_pcn_reg', $contact_pcn_reg);
            $user_input->bindvalue('contact_birth_date', $contact_birth_date);
            $user_input->bindvalue('contact_next_of_kin', $contact_next_of_kin);
            $user_input->bindvalue('contact_next_of_kin_phone', $contact_next_of_kin_phone);
            $user_input->bindvalue('contact_next_of_kin_address', $contact_next_of_kin_address);
            $user_input->bindvalue('pharmacy_exist', $pharmacy_exist);
            $user_input->bindvalue('pharmacy_location', $pharmacy_location);
            $user_input->bindvalue('practice_type', $practice_type);
            $user_input->bindvalue('pharmacy_director', $pharmacy_director);
            $user_input->bindvalue('pharmacist_director_phone', $pharmacist_director_phone);
            $user_input->bindvalue('registration_number', $registration_number);
            $user_input->bindvalue('registration_date', $registration_date);
            $user_input->execute();
            if(!$user_input){
                echo "user not created";
            }else{
                    /* send chairman mail */
                   


                    /* $message = "New Registration from $contact_person \n Kindly visit the link below to view member details. \n https://acpndelta.com/admin.php";
                    $sname = $contact_person;
                    $mail->isSMTP();                      // Set mailer to use SMTP 
                    $mail->Host = 'acpndelta.com';       // Specify main and backup SMTP servers 
                    $mail->SMTPAuth = true;               // Enable SMTP authentication 
                    $mail->Username = 'admin@acpndelta.com';   // SMTP username 
                    $mail->Password = 'Applied2020.';   // SMTP password 
                    $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
                    $mail->Port = 587;                    // TCP port to connect to 
                    $mail->isHTML(true);
                    $mail->SetFrom('admin@acpndelta.com', 'ACPN Delta'); //Name is optional
                    $mail->Subject   = 'ACPN Delta - New Registration';
                    $mail->Body = "<p style='font-weight:bold'>Dear {$sname}</p>{$message}<br/><pstyle='font-weight:bold'> Thank You</p><br/>";
                    $mail->AddAddress( "{$admin_email}" );
                    return $mail->Send(); */
                   //send member message
                
                    /* $message2 = "Welcome! \n Your registration on ACPN Delta Portal was suuceessful! \n  here are your Login details: \n Username: $username \n Passowrd: 123 \n Follow this link to Login and change your password. \n https://acpndelta.com/members.php";
                    
                    $subject2 = "ACPN EDO - Registration Successful";
                    $mailHeader2 = "From: admin@acpndelta.com";
                    mail($contact_email, $subject2, $message2, $mailHeader2) or die("Error!"); */
                    function smtpmailer($to, $from, $from_name, $subject, $body)
                    {
                        $mail = new PHPMailer();
                        $mail->IsSMTP();
                        $mail->SMTPAuth = true; 
                
                        $mail->SMTPSecure = 'ssl'; 
                        $mail->Host = 'www.acpndelta.com';
                        $mail->Port = 465; 
                        $mail->Username = 'admin@acpndelta.com';
                        $mail->Password = 'Applied1010.';   
                
                //   $path = 'reseller.pdf';
                //   $mail->AddAttachment($path);
                
                        $mail->IsHTML(true);
                        $mail->From="admin@acpndelta.com";
                        $mail->FromName=$from_name;
                        $mail->Sender=$from;
                        $mail->AddReplyTo($from, $from_name);
                        $mail->Subject = $subject;
                        $mail->Body = $body;
                        $mail->AddAddress($to);
                        if(!$mail->Send())
                        {
                            $error ="Please try Later, Error Occured while Processing...";
                            return $error; 
                        }
                        else 
                        {
                            
                            $error = header("Location: admin.php");
                            return $error;
                        }
                    }
                    
                    $to   = 'acpndelta@gmail.com';
                    $from = 'admin@acpndelta.com';
                    $name = 'ACPN Delta';
                    $subj = 'ACPN Delta New Registration';
                    $msg = 'New Registration from'. $contact_person.' \n Kindly visit the link below to view member details. \n https://acpndelta.com/admin.php';
                    
                    $error=smtpmailer($to, $from, $name ,$subj, $msg);
                    echo "<!DOCTYPE html>
                    <html lang='en'>
                    <head>
                        <meta charset='UTF-8'>
                        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                        <title>ACPN reg successful</title>
                        <style>
                            *{
                                margin:0;
                                padding:0;
                            }
                            body{
                                display:flex;
                                flex-direction:column;
                                justify-content:center;
                                align-items:center;
                                background:#0ab;
                            }
                            .contact_img{
                                position:absolute;
                                top:0;
                                left:0;
                                width:100%;
                                height:100vh;
                            }
                            .contact_img img{
                                width:100%;
                                height:100%;
                            }
                            .contact_img:after{
                                content:'';
                                position:absolute;
                                top:0;
                                left:0;
                                width:100%;
                                height:100vh;
                                background:rgba(36, 34, 34, 0.8);
                            }
                            .contact_success{
                                position:absolute;
                                top:20vh;
                                background:rgb(18, 109, 109);
                                color:#fff;
                                padding:20px;
                                box-shadow:2px 2px 2px #c4c4c4;
                                font-size:1.2rem;
                                text-align:center;
                                animation:1s zoomOut 1;
                            }
                            @keyframes zoomOut{
                                0%{
                                    opacity:0;
                                    transform:scale(0);
                                }
                                100%{
                                    opacity:1;
                                    transform:scale(1);
                                }
                            }
                            .contact_success button{
                                background:#fff;
                                margin-top:10px;
                                tranistion:.5s all;
                                border:none;
                                padding:10px;
                            }
                            .contact_success button a{
                                color:#000;
                                text-decoration:none;
                                padding:10px;
                            }
                            .contact_success button:hover{
                                background:rgb(20, 73, 73);
                            }
                            .contact_success button a:hover{
                                color:#fff;
                            }
                        </style>
                    </head>
                    <body>
                        <div class='contact_img'>
                            <img src='pharmacy-store.jpg' alt='acpn'>
                        </div>
                        <div class='contact_success'>
                            <p>Registration successful!<br>
                            Your user name is Your Phone Number and Default password is 123</p>
                            <button><a href='member_home.php'>Ok</a></button>
                        </div>
                    </body>
                    </html>";
                }
            }else{
                $_SESSION['msg'] = "Passport not accepted!";
                header("Location: register.php");
            }
        }
       
    }
            