<?php session_start();
    include "server.php";
?>
<?php
    
    function validate($field){
        if(!isset($_POST[$field])){
            return false;
        }else{
            return htmlspecialchars(stripslashes($_POST[$field]));
        }
    }
    $_SESSION['change'] = "";
    if(isset($_POST['change_password'])){
        $username = validate('username');
        $old_password = validate('cur_password');
        $new_password = validate('new_password');
        //get user
        $check_user = $connectdb->prepare("SELECT user_password FROM users WHERE username = :username");
        $check_user->bindValue("username", $username);
        $check_user->execute();
        if($check_user->rowCount() > 0){
            $confirm_pwd = $check_user->fetch();
            if($old_password == $confirm_pwd->user_password){

                $update_password = $connectdb->prepare("UPDATE users SET user_password = :user_password WHERE username = :username");

                $update_password->bindvalue('user_password', $new_password);
                $update_password->bindvalue('username', $username);
                $update_password->execute();
                $_SESSION['success'] = "Password changed Successfully!";
                header("Location: member_home.php");
            }else{
                $_SESSION['success'] = "Old password is does not match!";
                header("Location: members.php");
            }
            
        }else{
            $_SESSION['success'] = "Old password is incorrect!";
            header("Location: members.php");
        }
    }
?>