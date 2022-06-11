<?php
    session_start();
    
    include "server.php";
    $_SESSION['msg'] = "";
    /* if(isset($_POST['create_user'])){
        $username = $_POST['contact_phone'];
        $pharmacist = $_POST['pharmacist'];
        $user_password = 123;
        $pcn_reg = $_POST['contact_pcn_reg'];
        date_default_timezone_set("Africa/Lagos");
        $reg_date = date("Y-m-d");

        $sql_create_users = "INSERT INTO users(username, user_password, pharmacist, contact_pcn_reg, registration_date) VALUES('$username', '$user_password', '$pharmacist', '$pcn_reg', '$reg_date')";

        $run_create = mysqli_query($connectdb, $sql_create_users);

        if(!$run_create){
            $_SESSION['msg'] = "User not created";
            header("Location: admin.php");
        }else{
            $_SESSION['msg'] = "User \"$pharmacist\" created";
            header("Location: admin.php");
        }
    } */

    function validate($field){
        if(!isset($_POST[$field])){
            return false;
        }else{
            return htmlspecialchars(stripslashes($_POST[$field]));
        }
    }
    $_SESSION['error'] = "";
    if(isset($_POST['create_user'])){
        $username = validate('contact_phone');
        $pharmacist = ucwords(validate('pharmacist'));
        $user_password = 123;
        $pcn_reg = validate('contact_pcn_reg');
        date_default_timezone_set("Africa/Lagos");
        $reg_date = date("Y-m-d");

        /* check if user already exists */
        $check_user = $connectdb->prepare("SELECT * FROM users WHERE username = :username");
        $check_user->bindvalue('username', $username);
        $check_user->execute();
        if($check_user->rowCount() > 0){
            $_SESSION['error'] = "User already Exists!";
            header("Location: admin.php");
        }else{
            $statement = $connectdb->prepare("INSERT INTO users (username, user_password, pharmacist, contact_pcn_reg, registration_date) VALUES(:username, :user_password, :pharmacist, :contact_pcn_reg, :registration_date)");

            $statement->bindvalue('username', $username);
            $statement->bindvalue('user_password', $user_password);
            $statement->bindvalue('pharmacist', $pharmacist);
            $statement->bindvalue('contact_pcn_reg', $pcn_reg);
            $statement->bindvalue('registration_date', $reg_date);
            $statement->execute();

            $_SESSION['msg'] = $pharmacist." created successfully!";
            header("Location: admin.php");
        }
    }