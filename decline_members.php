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
    use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer();
    $_SESSION['error'] = "";
    $new_number = rand(1, 1000);
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
        
        
        
        $message = "Hello, Your payment has been declined! \n Kindly login and Re-upload your correct payment slip. \n For more information, you can call \n +2348033588514 or +2347032664418 \n https://acpnedo.com/members.php";
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
        $mail->Subject   = 'ACPN DELTA -  PAYMENT DECLINED';
        $mail->Body      = "<p style='font-weight:bold'>Dear {$sname}</p>{$message}<br/><pstyle='font-weight:bold'> Thank You</p><br/>";
        $mail->AddAddress( "{$recipient}" );
        return $mail->Send();
        
        $_SESSION['error'] = "Member declined!";
        header("Location: admin.php#approvedMembers");
        /* $_SESSION['msg'] = " Member Approved!";
        header("Location: admin.php#approvedMembers"); */
        /* $_SESSION['changed_status'] = "";
        $run_update = mysqli_query($connectdb, $select_statement);
        if($run_update){
            $_SESSION['msg'] = "Member Approved!";
            header("Location: admin.php#approvedMembers");
        }else{
            echo "unsuccessful";
        } */
    }
