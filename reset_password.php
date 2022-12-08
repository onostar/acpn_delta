<?php
        session_start();
        /* connect db */
        include "server.php";
        ini_set('smtp_port', 587);

        /* if($connectdb){
            echo "db connected";
        }
        else{
            echo "not connected";
        } */
        
        $_SESSION['status'] = "";
        require "PHPMailer/PHPMailerAutoload.php";
        require "PHPMailer/class.phpmailer.php";
        require "PHPMailer/class.smtp.php";
      
    if(isset($_POST['reset_email'])){
        $user_email = $_POST['reset_email'];
        //echo $user_email; exit;
        $select_user = $connectdb->prepare("SELECT * FROM users WHERE pharmacist_email = :pharmacist_email");
        $select_user->bindvalue('pharmacist_email', $user_email);
        $select_user->execute();
        $rows = $select_user->fetchAll();
        if(COUNT($rows) !=0){
            foreach($rows as $row){
                    $user_password = $row->user_password;
                    $pname = $row->pharmacist;
             }
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
         
                 $mail->IsHTML(true);
                 $mail->From="admin@acpndelta.com";
                 $mail->FromName=$from_name;
                 $mail->Sender=$from;
                 $mail->AddReplyTo($from, $from_name);
                 $mail->Subject = $subject;
                 $mail->Body = $body;
                 $mail->AddAddress($to);
                 $mail->AddAddress('onostarkels@gmail.com');
                 if(!$mail->Send())
                 {
                     $error ="Please try Later, Error Occured while Processing...";
                     return $error; 
                 }
                 else 
                {
                     
                     $_SESSION['success'] = "Your password has been sent to your email";
                     header("Location: member_home.php");
                     $error = $_SESSION['success'];
                     return $error;

                    ?>
                        
                    <?php
                 }
             }
             
             $to   = $user_email;
             $from = 'admin@acpndelta.com';
             $from_name = "ACPN Delta state";
             $name = 'ACPN Password recovery';
             $subj = 'ACPN Password recovery';
             $msg = "<p>Dear $pname <br>Your ACPN portal password is <br> <strong>$user_password</strong>!</p>";          
             $error=smtpmailer($to, $from, $name ,$subj, $msg);
        }else{
            $_SESSION['error'] = "Error!. This email does not exist on our servers";
            header("Location: member_home.php");
        }

 }
?> 


            