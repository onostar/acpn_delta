<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Association of Community Pharmacist of Nigeria (ACPN), Delta chapter is an organisation made up of pharmacy owners in Edo state">
    <meta name="keyword" content="ACPN, pharmacies, pharmacy, pharmacist, medicine, drugs, pharmacology, acpn portal">
    <title>ACPN registration portal</title>
    
    <link rel="icon" type="image/png" href="acpn_logo.png" size="32X32">
    <!-- <link rel="stylesheet" href="all.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .status p{
            font-size:1.3rem;
            color:red;
            text-decoration: underline;
        }
        .msg p{
            color:red;
            text-decoration:underline;
        }
        .reg_form form .inputs{
            display:flex;
            align-items:center;
            margin:0;  
        }
        .reg_form .inputs .inputData{
            width:50%;
            padding:5px;
        }
        .reg_form .inputs select{
            padding:8px;
            width:95%;
            box-shadow:2px 2px 2px rgb(18, 109, 109);
            border-radius:4px;
            border:none;
        }
        .reg_form .inputs input{
            width:90%;
            padding:8px;
            box-shadow:2px 2px 2px rgb(18, 109, 109);
            border-radius:4px;
            border:none;
        }
        .reg_form .inputs .gender{
            width:50%;
        }
        .reg_form .inputs .data label{
            margin-left:5px;
        }
        #previousPlace{
            display:none;
        }
        @media screen and (max-width:600px){
            .top-header .social_media{
                margin-left:0;
            }
            .top-header .social_media a{
                font-size:1rem;
            }
            .top-header .hotline{
                margin-right:0px;
            }
            .top-header .hotline i{
                font-size:.9rem;
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
                height:200vh;
            }
            .main_form{
                margin:30px auto;
                width:80%;
            }
            .login_form input{
                display:none;
            }
            .reg_form form .inputs{
                flex-wrap:wrap;
            }
            .reg_form .inputs .inputData{
                width:100%;
            }
            
            
        }
    </style>
</head>
<body>
    
    </section>
    <header>
        <h1>
            <a href="member_home.php">
                <img src="acpn_logo.png" alt="acpn">
                <div class="all_title">
                    <div class="title">ACPN</div>
                    <p class="sub">DELTA STATE</p>
                
                </div>
            </a>
        </h1>
        <h2>Membership Portal</h2>
        <form class="login_form" action="login.php" method="POST">
            <div class="status">
                <p>
                    <?php
                        if (isset($_SESSION['status'])){
                            echo $_SESSION['status'];
                            unset($_SESSION['status']);
                        }
                    ?>
                    
                </p>
            </div>
            <input type="text" name="username" placeholder="username" required>
            <input type="password" name="user_password" placeholder="password">
            <input type="submit" name="login" value="Login">
        </form>
    </header>
    <main>
        <div class="contents" id="bga">
            <div class="bg">
                <img src="pharmacy-store.jpg" alt="form background">
            </div>
            <div class="reg_form">
                
                <div class="main_form">
                    <p>Kindly fill the form below to register</p>
                    <hr>
                    <div class="status">
                        <p>
                            <?php
                                if(isset($_SESSION['msg'])){
                                    echo $_SESSION['msg'];
                                    unset($_SESSION['msg']);
                                }
                            ?>
                        </p>
                    </div>
                    <form action="registration.php" method="POST" enctype="multipart/form-data">
                        <div class="inputs">
                        <div class="inputData">
                                <select name="pharmacist_class" required>
                                    <option value="" selected>Pharmacist Designation</option>
                                    <option value="Superintendent Pharmacist">Superintendent Pharmacist</option>
                                    <option value="Locum Pharmacist">Locum Pharmacist</option>
                                </select><br><br>
                            </div>
                            <div class="inputData">
                                <select name="first_time_reg" required id="firstTime">
                                    <option value="" selected>First time as Superintendent Pharmacist in Delta State?</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select><br><br>
                            </div>
                        </div>
                        <div class="inputs" >
                            <div class="inputData">
                                <input type="text" id="previous" name="previous_place" placeholder="Previous place of work"><br><br>
                            </div>
                            <div class="inputData">
                                <input type="text" id="previous" name="previous_address" placeholder="Address of previous work place"><br><br>
                            </div>
                        </div>
                        <div class="inputs" >
                            <div class="inputData">
                                <input type="text" id="previous_director" name="previous_director" placeholder="Previous Director Name"><br><br>
                            </div>
                            <div class="inputData">
                                <input type="text" id="previous_director_phone" name="previous_director_phone" placeholder="Previous Director Phone number"><br><br>
                            </div>
                            <div class="inputData">
                                <input type="text" id="position_held" name="position_held" placeholder="Position held at previous place"><br><br>
                            </div>
                            
                        </div>
                        <div class="inputs">
                            <div class="inputData">
                                <input type="text" id="contactPerson" name="pharmacist" required placeholder="Pharmacist Name"><br><br>
                            </div>
                            <div class="inputData">
                                <input type="tel" id="contactPhone" name="username" required placeholder="Pharmacist Phone Number"><br><br>
                            </div>
                        </div>
                        <div class="inputs">
                            <div class="inputData"> 
                                <input type="email" id="contactEmail" name="contact_email" required placeholder="Pharmacist Email"><br><br>
                            </div>
                            <div class="inputData">
                                <input type="text" id="supritendentAdd" name="contact_address" required placeholder="Pharmacists Residential Address"><br><br>
                            </div>
                        </div>
                        <div class="inputs">
                            <div class="inputData">
                                <label for="contactDob">Date of Birth</label><br>
                                <input type="date" id="contactDob" name="contact_birth_date" required placeholder="Supritendent Date of birth" title="Supritendent Date of birth"><br><br>
                            </div>
                            <div class="inputData">
                                <select name="contact_gender" required>
                                    <option value="" selected>Pharmacist Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select><br><br>
                            </div>
                        </div>
                        <div class="inputs">
                            <div class="inputData">
                                <input type="number" id="contactPCN" name="contact_pcn_reg" required placeholder="PCN Registration Number" required><br><br>
                            </div>
                            <div class="inputData">
                                <input type="text" id="contactNext" name="contact_next_of_kin" required placeholder="Pharmacist Next of Kin"><br><br>
                            </div>
                        </div>
                        <div class="inputs">
                            <div class="inputData">
                                <input type="text" id="contactKinAddress" name="contact_next_of_kin_address" required placeholder="Next of Kin residential address"><br><br>
                            </div>
                            <div class="inputData">
                                <input type="tel" id="contactKinDetails" name="contact_next_of_kin_phone" required placeholder="Next of Kin Phone number"><br><br>
                            </div>
                        </div>
                        <div class="inputs">
                            <div class="inputData">
                                <label for="passport">Upload Pharmacist Photograph</label><br>
                                <input type="file" id="passport" name="contact_passport" required><br><br>
                            </div>
                            <div class="inputData">
                                <input type="text" id="pharmacyName" name="pharmacy_name" required placeholder="Present Pharmacy Name"><br><br>
                            </div>
                        </div>
                        <div class="inputs">
                            <div class="inputData">
                                <select name="pharmacy_exist" required>
                                    <option value="" slected>New or existing pharmacy</option>
                                    <option value="New pharmacy">New pharmacy</option>
                                    <option value="Existing pharmacy">Exsiting pharmacy</option>
                                </select><br><br>
                            </div>
                            <div class="inputData">
                                <input type="text" id="address" name="pharmacy_address" required placeholder="Pharmacy Address"><br><br>
                            </div>
                        </div>
                        <div class="inputs">
                            <div class="inputData">
                                <select name="pharmacy_location" id="location" required>
                                    <option value="" selected>Select Pharmacy location</option>
                                    <option value="Aniocha North">Aniocha North</option>
                                    <option value="Aniocha South">Aniocha South</option>
                                    <option value="Bomadi">Bomadi</option>
                                    <option value="Burutu">Burutu</option>
                                    <option value="Ethiope East">Ethiope East</option>
                                    <option value="Ethiope West">Ethiope West</option>
                                    <option value="Ika North East">Ika North East</option>
                                    <option value="Ika South">Ika South</option>
                                    <option value="Isoko North">Isoko North</option>
                                    <option value="Ikpoba-Okha">Isoko South</option>
                                    <option value="Ndokwa East">Ndokwa East</option>
                                    <option value="Ndokwa West">Ndokwa West</option>
                                    <option value="Okpe">Okpe</option>
                                    <option value="Oshimili North">Oshimili North</option>
                                    <option value="Oshimili South">Oshimili South</option>
                                    <option value="Patani">Patani</option>
                                    <option value="Sapele">Sapele</option>
                                    <option value="Udu">Udu</option>
                                    <option value="Ughelli North">Ughelli North</option>
                                    <option value="Ughelli South">Ughelli South</option>
                                    <option value="Ukwuani">Ukwuani</option>
                                    <option value="Uvwie">Uvwie</option>
                                    <option value="Warri North">Warri North</option>
                                    <option value="Warri South">Warri South</option>
                                    <option value="Warri South West">Warri South West</option>
                                </select><br><br>
                            </div>
                            <div class="inputData">
                                <select name="practice_type" id="pharmPractice">
                                    <option value="" selected>Pharmacy practice type</option>
                                    <option value="Wholesale">Wholesale</option>
                                    <option value="Retail">Retail</option>
                                </select><br><br>
                            </div>
                        </div>
                        <div class="inputs">
                            <div class="inputData">
                                <input type="text" id="pharmDirector" name="pharmacy_director" required placeholder="Pharmacist Director's Name"><br><br>
                            </div>
                            <div class="inputData">
                                <input type="number" id="regNum" name="registration_number" required placeholder="Pharmacist Director Registration Number"><br><br>
                            </div>
                        </div>
                        <div class="inputs">
                            <div class="inputData">
                                <input type="tel" id="regNum" name="pharmacist_director_phone" required placeholder="Pharmacist Director Phone Number"><br><br>
                            </div>
                            <div class="inputData">
                                <select name="fellow" required id="fellow">
                                    <option value="" selected>Are You a Fellow?</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select><br><br>
                            </div>
                        </div>
                        <button type="submit" name="register">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer">
        <p>All Rights Reserved &copy; <?php echo date("Y"); ?> ACPN, Delta state. Powered by <a href="https://appliedmacros.com">Applied Macrosystems</a></p>
    </footer>
    <script src="script.js"></script>
</body>
</html>