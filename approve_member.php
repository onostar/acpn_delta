<?php
    session_start();
    include "server.php";
    // ini_set('smtp_port', 587);
    require "PHPMailer/PHPMailerAutoload.php";
    require "PHPMailer/class.phpmailer.php";
    require "PHPMailer/class.smtp.php";
    
   /*  if($connectdb){
        echo "db connected";
    }
    else{
        echo "not connected";
    }
     */
    /* use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer(); */
    $new_number = rand(1, 1000);
  
    /* if(isset($_SESSION['tdate'])){
        $transdate = $_SESSION['tdate'];
    } */
    
    if(isset($_GET['approve'])){
        $id = $_GET['approve'];
        $transdate = date("Y/m/d")."/00/".$id;

        $select_statement = $connectdb->prepare("UPDATE payments SET payment_status=1, receipt_number='ACPN/EDO/$transdate/$new_number' WHERE id = :id");
        $select_statement->bindvalue('id', $id);
        $select_statement->execute();

        /* send clearance form to user email */
        $send_mail = $connectdb->prepare("SELECT * FROM payments WHERE id = :id");
        $send_mail->bindvalue('id', $id);
        $send_mail->execute();
        $rows = $send_mail->fetchAll();

        foreach($rows as $row){
            $recipient = $row->pharmacist_email;
            $pharmacist = $row->supretendent_pharmacist;
        }
        // echo $recipient;
       
        $_SESSION['msg'] = "Member Approved!";
        
        /* $message = "Hello, Your payment has been approved! \n Kindly CLick on the Link below to print your clearance slip. \n https://acpnedo.com/members.php";
        $sname = $pharmacist;
        $mail->isSMTP();                      // Set mailer to use SMTP 
        $mail->Host = 'acpndelta.com';       // Specify main and backup SMTP servers 
        $mail->SMTPAuth = true;               // Enable SMTP authentication 
        $mail->Username = 'admin@acpndelta.com';   // SMTP username 
        $mail->Password = 'Applied2020.';   // SMTP password 
        $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
        $mail->Port = 587;                    // TCP port to connect to 
        $mail->isHTML(true);
        $mail->SetFrom('admin@acpndelta.com', 'ACPN Delta'); //Name is optional
        $mail->Subject   = 'ACPN Delta - Payment Approved';
        $mail->Body      = "<p style='font-weight:bold'>Dear {$sname}</p>{$message}<br/><pstyle='font-weight:bold'> Thank You</p><br/>";
        $mail->AddAddress( "{$recipient}" );
        return $mail->Send(); */

        
        /* $_SESSION['changed_status'] = "";
        $run_update = mysqli_query($connectdb, $select_statement);
        if($run_update){
            $_SESSION['msg'] = "Member Approved!";
            header("Location: admin.php#approvedMembers");
        }else{
            echo "unsuccessful";
        } */

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
                
                $error = header("Location: admin.php#approvedMembers");
                return $error;
            }
        }
        
        $to   = $recipient;
        $from = 'admin@acpndelta.com';
        $name = 'ACPN Delta';
        $subj = 'ACPN Delta Payment Approval';
        $msg = 'Your payment has been approved. Kindly visit the link below to print your receipt. https://acpndelta.com/member_home.php';
        
        $error=smtpmailer($to, $from, $name ,$subj, $msg);
        
    ?>
    
    <!-- <html>
        <head>
            <title>PHPMailer 5.2 testing from DomainRacer</title>
        </head>
        <body style="background: black;">
            <h2 style="padding-top:70px;color: white;"><?php echo $error; ?></h2>
        </body>
        
    </html> -->
   <?php 
    }
    // $_SESSION['id'] = $id;
