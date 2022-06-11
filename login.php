<?php
    session_start();
        
    include "server.php";

    $_SESSION['status'] = "";
    /* if(isset($_POST['login']) && isset($_POST['username']) && isset($_POST['user_password'])){
        $username = $_POST['username'];
        $user_password = $_POST['user_password'];

        $sql_select = "SELECT * FROM  users WHERE username = '$username' AND user_password='$user_password'";
        $run = mysqli_query($connectdb, $sql_select);
        
        if(mysqli_num_rows($run)){
            $_SESSION['user'] = $username;
            if($username == 'admin'){
                header("Location: admin.php");
                $_SESSION['success'] = "Welcome Admin";
            }else{
                if($user_password == 123){
                    header("Location: change_password.php");
                }else{
                    header("Location: members.php");
                $_SESSION['success'] = "welcome ";
                }
            }
        }
        else{
            $_SESSION['status'] = "Invalid username or password!";
            header("Location: member_home.php");
        }
    }else{
        
        header("Location: member_home.php");
        $_SESSION['status'] = "Please login";
        exit();
        
    }
 */
function validate($field){
    if(!isset($_POST[$field])){
        return false;
    }else{
        return htmlspecialchars(stripslashes($_POST[$field]));
    }
}
if(isset($_POST["login"])){
    $username = validate("username");
    $user_password = validate("user_password");

    /* check user validity */
    $check_user = $connectdb->prepare("SELECT * FROM users WHERE username = :username AND user_password = :user_password");
    $check_user->bindvalue('username', $username);
    $check_user->bindvalue('user_password', $user_password);
    $check_user->execute();

    if($check_user->rowCount() > 0){
        $_SESSION['user'] = $username;
        if($username == "admin"){
            header("Location: admin.php");
        }else{
            if($user_password == 123){
                header("Location: change_password.php");
            }else{
                header("Location: members.php");
            }
        }
    }else{
        $_SESSION['status'] = "Invalid username or password!";
        header("Location:member_home.php");
    }
}