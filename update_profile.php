<?php
        session_start();
        /* connect db */
        include "server.php";

        $_SESSION['paid'] = "";
        function validate($field){
            if(!isset($_POST[$field])){
                return false;
            }else{
                return htmlspecialchars(stripslashes($_POST[$field]));
            }
        }
    if(isset($_POST['update_profile'])){
        $pharmacy_exist = validate('pharmacy_exist');
        $pharmacist_class = validate('pharmacist_class');
        $pharmacy_name= ucwords(validate('pharmacy_name'));
        $contact_person = ucwords(validate('pharmacist'));
        $previous_place = ucwords(validate('previous_place'));
        $previous_address = ucwords(validate('previous_address'));
        $previous_director = ucwords(validate('previous_director'));
        $previous_contact = ucwords(validate('previous_director_contact'));
        $_SESSION['sup'] = $contact_person;
        $contact_phone = validate('username');
        $contact_email = validate('pharmacist_email');
        $contact_address = validate('pharmacist_address');
        $contact_birth_date = validate('contact_birth_date');
        $contact_gender = validate('contact_gender');
        $contact_pcn_reg = validate('contact_pcn_reg');
        $contact_next_of_kin = validate('contact_next_of_kin');
        $contact_next_of_kin_phone = validate('contact_next_of_kin_phone');
        $contact_next_of_kin_address = validate('contact_next_of_kin_address'); 
        $pharmacy_address = validate('pharmacy_address');
        $position_held = validate('position_held');
        $pharmacy_location = validate('pharmacy_location');
        $practice_type = validate('practice_type');
        $pharmacy_director = validate('pharmacy_director');
        $registration_number = validate('registration_number');
        // $contact_passport = $_FILES['pharmacist_passport']['name'];
        /* $tempname = $_FILES['contact_passport']['tmp_name'];  */
        // $folder = "users/".$contact_passport;
        
        $user_password = validate('user_password');

        $sql_user_update = $connectdb->prepare("UPDATE users SET  pharmacist = :pharmacist, pharmacist_class = :pharmacist_class, pharmacist_email = :pharmacist_email, pharmacist_address = :pharmacist_address, pharmacy_name = :pharmacy_name, pharmacy_address = :pharmacy_address, previous_place = :previous_place, previous_address = :previous_address, previous_director = :previous_director, position_held = :position_held, previous_director_contact = :previous_director_contact, contact_gender = :contact_gender, contact_pcn_reg = :contact_pcn_reg, contact_birth_date = :contact_birth_date, contact_next_of_kin = :contact_next_of_kin, contact_next_of_kin_phone = :contact_next_of_kin_phone, contact_next_of_kin_address = :contact_next_of_kin_address, pharmacy_exist = :pharmacy_exist, pharmacy_location = :pharmacy_location, practice_type = :practice_type, pharmacy_director = :pharmacy_director, registration_number = :registration_number WHERE username = :username");
        
        
        // if(move_uploaded_file($_FILES['pharmacist_passport']['tmp_name'], $folder)){   
            $sql_user_update->bindvalue('pharmacist', $contact_person);
            // $sql_user_update->bindvalue('pharmacist_passport', $contact_passport);
            $sql_user_update->bindvalue('pharmacist_class', $pharmacist_class);
            $sql_user_update->bindvalue('pharmacist_email', $contact_email);
            $sql_user_update->bindvalue('pharmacist_address', $contact_address);
            $sql_user_update->bindvalue('pharmacy_name', $pharmacy_name);
            $sql_user_update->bindvalue('pharmacy_address', $pharmacy_address);
            $sql_user_update->bindvalue('previous_address', $previous_address);
            $sql_user_update->bindvalue('previous_place', $previous_place);
            $sql_user_update->bindvalue('position_held', $position_held);
            $sql_user_update->bindvalue('previous_director', $previous_director);
            $sql_user_update->bindvalue('previous_director_contact', $previous_contact);
            $sql_user_update->bindvalue('contact_gender', $contact_gender);
            $sql_user_update->bindvalue('contact_pcn_reg', $contact_pcn_reg);
            $sql_user_update->bindvalue('contact_birth_date', $contact_birth_date);
            $sql_user_update->bindvalue('contact_next_of_kin', $contact_next_of_kin);
            $sql_user_update->bindvalue('contact_next_of_kin_phone', $contact_next_of_kin_phone);
            $sql_user_update->bindvalue('contact_next_of_kin_address', $contact_next_of_kin_address);
            $sql_user_update->bindvalue('pharmacy_exist', $pharmacy_exist);
            $sql_user_update->bindvalue('pharmacy_location', $pharmacy_location);
            $sql_user_update->bindvalue('pharmacy_location', $pharmacy_location);
            $sql_user_update->bindvalue('practice_type', $practice_type);
            $sql_user_update->bindvalue('pharmacy_director', $pharmacy_director);
            $sql_user_update->bindvalue('registration_number', $registration_number);
            $sql_user_update->bindvalue('username', $contact_phone);
            $sql_user_update->execute();
            if(!$sql_user_update){
                $_SESSION['paid'] = "Update failed!";
                header("Location: members.php");
            }else{
                $_SESSION['paid'] = "Profile updated!";
                header("Location: members.php");
            }
        // }else{
        //     $_SESSION['paid'] = "Update failed for image!";
        //     header("Location: members.php");
        // }
       
    }
            

