<?php

    session_start();

    include "server.php";
    // ini_set('smtp_port', 587);
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

    /* new mail pattern */
    require "PHPMailer/PHPMailerAutoload.php";
    require "PHPMailer/class.phpmailer.php";
    require "PHPMailer/class.smtp.php";

    $_SESSION['payment_stats'] = "You have not made payment";

    function validate($field){
        if(!isset($_POST[$field])){
            return false;
        }else{
            return htmlspecialchars(stripslashes($_POST[$field]));
        }
    }
    if(isset($_POST['submit_payment'])){
        $payment_method = validate('payment_method');
        $tdate = validate('tdate');

        $_SESSION['tdate'] = $tdate;
        $pharmacy_name = validate('pharmacy_name');
        $supretendent_pharmacist = validate('supretendent_pharmacist');
        $pharmacist_email = validate('pharmacist_email');
        $payment_evidence = $_FILES['payment_evidence']['name'];
        $national_evidence = "payments/".$payment_evidence;
        /* $pcn_payment = $_FILES['pcn_payment']['name'];
        $state_evidence = "payments/".$pcn_payment; */
        $admin_email = "onostarkels@gmail.com";

        $payment_status = 0;
        
        $receipt_number = "";
        $sql_insert = $connectdb->prepare("INSERT INTO payments (tdate, pharmacy_name,  supretendent_pharmacist, payment_method, pharmacist_email, payment_evidence, payment_status, receipt_number) VALUES (:tdate, :pharmacy_name, :supretendent_pharmacist, :payment_method, :pharmacist_email, :payment_evidence, :payment_status, :receipt_number)");

        $_SESSION['paid'] = "";
        /* check payment */
        $check_user = $connectdb->prepare("SELECT * FROM payments WHERE supretendent_pharmacist = :supretendent_pharmacist AND Payment_status != -1 AND YEAR(tdate) = YEAR(CURDATE())");
        $check_user->bindvalue('supretendent_pharmacist', $supretendent_pharmacist);
        $check_user->execute();

        if($check_user->rowCount() > 0){
            $_SESSION['paid'] = "You have submitted Payment Already! Kindly await Approval";
            header("Location:members.php");
        }else{
            if(move_uploaded_file($_FILES['payment_evidence']['tmp_name'], $national_evidence)){
                $sql_insert->bindvalue('payment_method', $payment_method);
                $sql_insert->bindvalue('tdate', $tdate);
                $sql_insert->bindvalue('pharmacy_name', $pharmacy_name);
                $sql_insert->bindvalue('supretendent_pharmacist', $supretendent_pharmacist);
                $sql_insert->bindvalue('pharmacist_email', $pharmacist_email);
                $sql_insert->bindvalue('payment_evidence', $payment_evidence);
                $sql_insert->bindvalue('payment_status', $payment_status);
                $sql_insert->bindvalue('receipt_number', $receipt_number);
                $sql_insert->execute();
    
                if($sql_insert){   
                    $_SESSION['paid'] = "Payment submitted successfully!";
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
                    /* new mail pattern */

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
                            
                            $error = header("Location: admin.php");
                            return $error;
                        }
                    }
                    
                    $to   = 'acpndelta@gmail.com';
                    $from = 'admin@acpndelta.com';
                    $name = 'ACPN Delta';
                    $subj = 'ACPN Delta New Payment';
                    $msg = 'Payment Confirmation from' .$supretendent_pharmacist. '\n Kindly visit the link below to view and approve member. \n https://acpndelta.com/admin.php';
                    
                    $error=smtpmailer($to, $from, $name ,$subj, $msg);
                   
                }else{
                    echo "not submitted";
                }
            }else{
                $_SESSION['paid'] = "Payment slip not uploaded!";
            }
        }
        
        
    }else{
        header("Location: members.php#makePayment");
    }

    /* $tdate = $_POST['tdate'];
    $pharmacy_name = $_POST['pharmacy_name'];
    $depositor_name = $_POST['depositor_name'];
    $depositor_position = $_POST['depositor_position']; */
    $_SESSION['supretendent_pharmacist'] = $supretendent_pharmacist;
?>