<?php
    session_start();
    include "server.php";
    ini_set('smtp_port', 587);

   /*  if($connectdb){
        echo "db connected";
    }
    else{
        echo "not connected";
    }
     */
    require "PHPMailer/PHPMailerAutoload.php";
    require "PHPMailer/class.phpmailer.php";
    require "PHPMailer/class.smtp.php";
    $_SESSION['error'] = "";
    // $new_number = rand(1, 1000);
    /* if(isset($_SESSION['tdate'])){
        $transdate = $_SESSION['tdate'];
    } */
    
    if(isset($_GET['decline'])){
        $id = $_GET['decline'];
        $transdate = date("Y/m/d/");

        $select_statement = $connectdb->prepare("UPDATE payments SET payment_status=-1, receipt_number='', tdate = :tdate WHERE id = :id");
        $select_statement->bindvalue('id', $id);
        $select_statement->bindvalue('tdate', $transdate);
        $select_statement->execute();
        
        

        /* send decline message to user email */
        $send_mail = $connectdb->prepare("SELECT pharmacist_email FROM payments WHERE id = :id");
        $send_mail->bindvalue('id', $id);
        $send_mail->execute();
        $rows = $send_mail->fetchAll();

        foreach($rows as $row){
            $recipient = $row->pharmacist_email;
            $pharmacist = $row->pharmacist;
        }
        // echo $recipient;
        
        
            function smtpmailer($to, $from, $from_name, $subject, $body)
            {
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->SMTPAuth = true; 
         
                $mail->SMTPSecure = 'ssl'; 
                $mail->Host = 'www.acpndelta.com';
                $mail->Port = 465; 
                $mail->Username = 'admin@acpndelta.com';
                $mail->Password = 'admin@acpndelta';   
           
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
            $subj = 'ACPN Delta Payment Declined';
            $msg = "Hello, Your payment has been declined! \n Kindly login and Re-upload your correct payment slip. \n For more information, you can call \n +2348074014660 or +2348169139603 \n https://acpndelta.com/members.php";
            
            $error=smtpmailer($to, $from, $name ,$subj, $msg);
    }
