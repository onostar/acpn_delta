<?php

    session_start();

    include "server.php";
    ini_set('smtp_port', 587);
    /* if($connectdb){
        echo "db connected";
    }
    else{
        echo "not connected";
    } */
    /* use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer();  */
$_SESSION['success'] = "";

    function validate($field){
        if(!isset($_POST[$field])){
            return false;
        }else{
            return htmlspecialchars(stripslashes($_POST[$field]));
        }
    }
    if(isset($_POST['upload_docs'])){
        $user_id = validate('user_id');
        $resignation = $_FILES['resignation']['name'];
        $resign_letter = "documents/".$resignation;
        $acceptance = $_FILES['acceptance']['name'];
        $acceptance_letter = "documents/".$acceptance;
        $sql_insert = $connectdb->prepare("UPDATE users SET acceptance = :acceptance, resignation = :resignation WHERE id = :id");


        
            if(move_uploaded_file($_FILES['acceptance']['tmp_name'], $acceptance_letter) && move_uploaded_file($_FILES['resignation']['tmp_name'], $resign_letter)){
                $sql_insert->bindvalue('acceptance', $acceptance);
                $sql_insert->bindvalue('resignation', $resignation);
                $sql_insert->bindvalue('id', $user_id);
                
                $sql_insert->execute();
    
                if($sql_insert){
                    $_SESSION['success'] = "Documents uploaded successfully!";
                    header("Location: members.php");
                    /* send chairman mail */
                    /* $message = "Payment Confirmation from $supretendent_pharmacist \n Kindly visit the link below to view and approve member. \n https://acpnedo.com/admin.php";
                    $sname = $supretendent_pharmacist;
                    $mail->isSMTP();                      // Set mailer to use SMTP 
                    $mail->Host = 'acpndelta.com';       // Specify main and backup SMTP servers 
                    $mail->SMTPAuth = true;               // Enable SMTP authentication 
                    $mail->Username = 'admin@acpndelta.com';   // SMTP username 
                    $mail->Password = 'Applied2020.';   // SMTP password 
                    $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
                    $mail->Port = 587;                    // TCP port to connect to 
                    $mail->isHTML(true);
                    $mail->SetFrom('admin@acpndelta.com', 'ACPN Delta'); //Name is optional
                    $mail->Subject   = 'ACPN Delta - Payment Confirmation';
                    $mail->Body      = "<p style='font-weight:bold'>Dear {$sname}</p>{$message}<br/><pstyle='font-weight:bold'> Thank You</p><br/>";
                    $mail->AddAddress( "{$admin_email}" );
                    return $mail->Send(); */
                   
                    // $mailHeader = "From: admin@acpnedo.com \r\n";
                    // mail("acpnedo@gmail.com, contact@acpnedo.com, edoacpn@gmail.com", $subject, $message, $mailHeader) or die("Error!");
                
                }else{
                    echo "not submitted";
                }
            }else{
                $_SESSION['paid'] = "documents  not uploaded!";
            }
        }   
    

    /* $tdate = $_POST['tdate'];
    $pharmacy_name = $_POST['pharmacy_name'];
    $depositor_name = $_POST['depositor_name'];
    $depositor_position = $_POST['depositor_position']; */
?>