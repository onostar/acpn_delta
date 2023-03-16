<?php session_start();
    include "server.php";
?>
<?php
    /* if(isset($_POST['submit_password'])){
        
        
        
        $_SESSION['change'] = "";
        $username = $_POST['username'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
        
        $update_password = "UPDATE users SET user_password='$new_password' WHERE username ='$username'";

        
        if($new_password != $confirm_password){
            $change = "New password does not match!"; 
            $_SESSION['change'] = "New password does not match!";
            header("Location: change_password.php");
        }
        else{
            $do_update = mysqli_query($connectdb, $update_password);
            if($do_update){
                $_SESSION['change'] = "Password changed Successfully!";
                header("Location: index.php");
            }

        }
    } */
    function validate($field){
        if(!isset($_POST[$field])){
            return false;
        }else{
            return htmlspecialchars(stripslashes($_POST[$field]));
        }
    }
    $_SESSION['change'] = "";
    if(isset($_POST['submit_password'])){
        $username = validate('username');
        $new_password = validate('new_password');
        $confirm_password = validate('confirm_password');

        if($new_password != $confirm_password){
            $_SESSION['change'] = "New password doesn't match!";
            header("Location: change_password.php");
        }else{
            $update_password = $connectdb->prepare("UPDATE users SET user_password = :user_password WHERE username = :username");

            $update_password->bindvalue('user_password', $new_password);
            $update_password->bindvalue('username', $username);
            $update_password->execute();
            $_SESSION['change'] = "Password changed Successfully!";
            header("Location: member_home.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Association of Community Pharmacist of Nigeria (ACPN), Delta chapter is an organisation made up of pharmacy owners in Edo state">
    <meta name="keyword" content="ACPN, pharmacies, pharmacy, pharmacist, medicine, drugs, pharmacology, acpn portal">
    <title>ACPN change password</title>
    
    <link rel="icon" type="image/png" href="acpn_logo.png" size="32X32">
    <!-- <link rel="stylesheet" href="all.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.css">
    <link rel="stylesheet" href="style.css">
    <style>
        main{
            height:80vh;
        }
        .reg_form{
            margin-top:0;
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
        }
        .new_password{
            width:60%;
            margin:0 auto;
        }
        .new_password input{
            width:100%;
            margin:0 auto;
            padding:10px;
        }
        .reg_form button{
            width:auto;
            margin:0;
        }
        @media screen and (max-width:600px){
            .top-header .social-media{
                margin-left:0;
            }
            .top-header .social-media a{
                font-size:1rem;
            }
            .top-header .hotline{
                margin-right:0px;
            }
            .top-header .hotline i{
                font-size:1rem;
            }
            header h1{
                margin-left:0;
            }
            header h1 a{
                width:15vw;
            }
            header h1 .title{
                font-size:2.6rem;
            }
            header h1 .span{
                font-size:.4rem;
            }
            header h2{
                margin-right:5px;
                font-size:1.2rem;
                display:none;
            }
            main{
                height:100vh;
            }
            .main_form{
                margin:20px auto;
                width:80%;
            }
            .new_password{
                width:80%;
            }
            .login_form input{
                display:none;
            }
        }
    </style>
</head>
<body>
    <section class="top-header">
        <div class="social_media">
            <a target="_blank" href="#" title="follow us on facebook"><i class="fab fa-facebook"></i></a>
            <a target="_blank" href="#" title="follow us on twitter"><i class="fab fa-twitter"></i></a>
            <a target="_blank" href="#" title="follow us on instagram"><i class="fab fa-instagram"></i></a>
            <a target="_blank" href="#" title="follow us on linkedin"><i class="fab fa-linkedin"></i></a>
        </div>
        <div class="hotline">
            <p><i class="fas fa-phone-alt"></i>+2348033588514, +2347032664418</p>
        </div>
    </section>
    <header>
        <h1>
            <a href="index.php">
            <img src="acpn_logo.png" alt="acpn">
            <div class="title">ACPN<span>DELTA STATE</span></div>
            </a>
        </h1>
        <h2>Change your password</h2>
        <form class="login_form" action="login.php" method="POST">
            <input type="text" name="username" placeholder="username" required>
            <input type="password" name="user_password" placeholder="password">
            <input type="submit" name="login" value="Login">
        </form>
    </header>
    <main>
        <div class="contents">
            <div class="bg">
                <img src="pharmacy-store.jpg" alt="form background">
            </div>
            <div class="reg_form">
                <div class="change">
                    <p>
                        
                    </p>
                </div>
                <div class="main_form">
                    <p>Kindly change your password</p>
                    <hr>
                    <p style="color:red; text-decoration:underline; font-size:1.2rem;">
                        <?php
                            if(isset($_SESSION['change'])){
                                echo  $_SESSION['change'];
                                unset( $_SESSION['change']);
                            }
                        ?>
                    </p>
                    <div class="new_password">
                        <form action="change_password.php" method="POST">
                            <input type="text" name="username" value="<?php if(isset($_SESSION['user'])){
                                echo $_SESSION['user'];
                            };?>" placeholder="username"><br><br>
                            <input type="password" name="new_password" placeholder="Enter new password"><br><br>
                            <input type="password" name="confirm_password" placeholder="Confirm new password"><br><br>
                            <button type="submit" name="submit_password">Change password</button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </main>
    <footer class="footer">
        <p>All Rights Reserved &copy; <?php echo date("Y")?> ACPN, Delta state. Powered by <a href="https://appliedmacros.com">Applied Macrosystems</a></p>
    </footer>
</body>
</html>