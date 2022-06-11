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
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer(); 
      
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
         echo "<style>
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
                </style><div class='contact_success'> <p>Password Sent!<br>
                    Your account password has been sent to your email</p>
                    <button><a href='member_home.php'>Ok</a></button>
                </div>";    
        $message = "Your ACPN password is \n $user_password";
        $sname = $pname;
		$mail->isSMTP();                      // Set mailer to use SMTP 
		$mail->Host = 'acpnedo.com';       // Specify main and backup SMTP servers 
		$mail->SMTPAuth = true;               // Enable SMTP authentication 
		$mail->Username = 'admin@acpnedo.com';   // SMTP username 
		$mail->Password = 'Applied2020.';   // SMTP password 
		$mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
		$mail->Port = 587;                    // TCP port to connect to 
		$mail->isHTML(true);
		$mail->SetFrom('admin@acpnedo.com', 'ACPN Edo'); //Name is optional
		$mail->Subject   = 'PASSWORD RESET';
		$mail->Body      = "<p style='font-weight:bold'>Dear {$sname}</p>{$message}<br/><pstyle='font-weight:bold'> Thank You</p><br/>";
		$mail->AddAddress( "{$user_email}" );
		return $mail->Send();
        } 
        else{
        $msg = 'Email not found';
        exit;
        }

 }
?> 
<!DOCTYPE html>
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
                    <p>Password Sent!<br>
                    Your account password has been sent to your email</p>
                    <button><a href='member_home.php'>Ok</a></button>
                </div>
            </body>
            </html>

            