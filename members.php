<?php
    session_start(); 
?>
<?php
    include "server.php";

    if(isset($_SESSION['user'])){

        $member = $_SESSION['user'];
        
    
    $display_data = $connectdb->prepare("SELECT id, username, pharmacist, pharmacist_passport, pharmacist_email, pharmacist_address, pharmacy_name, pharmacy_address FROM users WHERE username = :username"); 
    $display_data->bindvalue('username', $member);
    $display_data->execute();

    $rows = $display_data->fetchAll();
    foreach($rows as $row):

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Association of Community Pharmacist of Nigeria (ACPN), Delta chapter is an organisation made up of pharmacy owners in Edo state">
    <meta name="keyword" content="ACPN, pharmacies, pharmacy, pharmacist, medicine, drugs, pharmacology, acpn portal">
    <title><?php echo $row->pharmacist;?> - ACPN member</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="acpn_logo.png" size="32X32">
    <link rel="stylesheet" href="all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <style>
        .top-header{
            position:fixed;
            bottom:0;
            left:0vw;
            width:100%;
            background:rgb(95, 197, 197);
            padding:2px;
            display:flex;
            justify-content: space-around;
            align-items:center;
            flex-wrap:wrap;
        }
        .user{
            background:transparent;
            padding:5px;
        }
        aside{
            position:fixed;
        }
        .top-header .social_media{
            margin-left:30px;
            color:#fff;
        }
        .top-header .social_media a{
            font-size:1.3rem;
        }
        .top-header .hotline{
            color:rgb(20, 73, 73);
            margin-right:30px;
        }
        .top-header .hotline i{
            font-size:1.3rem;
        }
        .dash_board{
            position:absolute;
            left:15vw;
        }
        .success{
            padding:10px;
            
        }
        .success p{
            color:rgb(20, 73, 73);
            font-size:1.5rem;
            text-transform:uppercase;
        }
        .memberInfo{
            display:flex;
            justify-content:space-between;
        }
        .info{
            border-radius:5px;
            padding:10px;
            color:#fff;
            margin-right:10px;
            display:flex;
            align-items:center;
            justify-content:space-between;
        }
        .datas{
            margin-left:20px;
        }
        .info i{
            font-size:2.2rem;
        }
        .info h3{
            font-size:1.5rem;
            text-align:right;
            text-transform:uppercase;
        }
        .info  p{
            text-align:right;
            font-size:1rem;
        }
        .payMentForm{
            background:rgba(18, 109, 109, .2);
            width:80%;
            margin:0 auto 60px auto;
            padding:20px;
        }
        .payMentForm form{
            width:100%;
        }
        /* .paymentForm .flex{
            
            
        } */
        .payMentForm .label{
            font-size:1rem;
            width:30%;
            float:left;
        }
        .payMentForm input, .payMentForm select{
            padding:5px 10px;
            border-radius:3px;
            width:300px;
        }
        .payMentForm button{
            padding:5px;
            background-color:rgb(18, 109, 109);
            color:#fff;
            width:100px;
            margin: 0 auto;
            display:block;
            cursor:pointer;
        }
        .clear{
            clear:both;
        }
        #receipt .receipt{
            width:80%;
            margin:0 auto 70px auto;
        }
        .memberReceipt{
            width:100%;
            margin:0 auto 20px auto;
        }
        .mainReceipt{
            padding:10px;
            border:10px solid rgb(20, 73, 73);
            width:100%;
            
        }
        .receipt_header{
            display:flex;
            align-items:center;
            margin:10px 0;
        }
        .acpn_logo{
            width:20%;
            
        }
        .acpn_logo img{
            width:100%;
        }
        .association h2{
            text-align:center;
            font-family: 'algerian';
            text-transform: uppercase;
            color:rgb(18, 109, 109);
        }
        .association p{
            text-align:center;
            text-transform:uppercase;
            margin-bottom:10px;
            font-size:1.1rem;
        }
        .receipt_title{
            margin:0 0 10px 0;
            text-align:center;
            text-transform: uppercase;
        }
        
        .user_image{
            width:50%;
            margin:10px auto;
            height:300px
        }
        .user_image img{   
            width:100%;
            height:100%;
            border-radius:10px;
            border:1px solid rgb(18, 109, 109);
        }
        .receipt_content{
            padding:5px;
            width:80%;
            margin:0 auto;
        }
        .receipt_content table{
            margin-bottom:30px;
        }
        .receipt_content table tr td{
            text-transform:uppercase;
        }
        .receipt_content p{
            font-size:1.1rem;
            margin-bottom:5px;
            text-align:justify;
        }
        .chairman_sign{
            margin-top:20px;
            display:flex;
            justify-content: space-between;
            align-items:center;
        }
        .sign .p{
            font-weight: bolder;
        }
        .sign img{
            width:100px;
            height:50px;
        }
        .receipt button{
            padding:5px;
            color:#fff;
            background:rgb(20, 73, 73);
            width:100px;
            display:block;
            margin:30px auto;
            cursor:pointer;
        }
        .paid p{
            color:green;
            text-decoration:underline;
            font-size:1.2rem;
        }
        .mobile-menu{
            display:none;
        }
        .mobile-menu i{
            color:#fff;
            font-size:1.7rem;
        }
        .updateForm{
            width:90%;
            margin:20px auto 70px auto;
            padding:10px;
            box-shadow:2px 2px 5px 2px rgb(20, 73, 73);
            border:1px solid rgb(18, 109, 109);
            border-radius:5px;
            animation: .5s zoomin 1;
            animation-fill-mode: forwards;
        }
        @keyframes zoomin{
            0%{
                opacity:0;
                transform:scale(0);
            }
            100%{
                opacity:1;
                transform:scale(1);
            }
        }
        .updateForm .profile_foto{
            float:right;
        }
        .clear{
            clear:both;
        }
        .profile_foto img{
            width:200px;
            height:200px;
            border-radius:4px;
        }
        .otherInfo{
            width:90%;
            margin:10px auto;
        }
        .otherInfo .contents{
            display:flex;
            align-items:center;
        }
        .contents .infos{
            width:50%;
            margin:5px 0;
        }
        .infos label{
            text-transform:uppercase;
            color:rgba(70, 68, 68, .7);
        }
        .infos input{
            padding:10px;
            width:90%;
            border-radius:2px;
            color:rgb(70, 68, 68);
            border:1px solid rgb(18, 109, 109);
            box-shadow:2px 2px 2px rgb(18, 109, 109);
        }
        .infos select{
            padding:10px;
            width:95%;
            border-radius:2px;
            color:rgb(70, 68, 68);
            border:1px solid rgb(18, 109, 109);
            box-shadow:2px 2px 2px rgb(18, 109, 109);
        }
        .updateForm button{
            padding:10px;
            background:rgb(18, 109, 109);
            color:#fff;
            cursor:pointer;
            margin:0 auto;
            display:block;
        }
        .notice{
            border:1px solid rgb(18, 109, 109);
            box-shadow:2px 2px 2px rgb(18, 109, 109);
            width:300px;
            height:200px;
            animation: .5s zoomin 1;
            margin:0 auto;
            display: flex;
            justify-content:center;
            align-items:center;
        }
        .notice p{
            text-align:center;
            color:green;
            text-transform:uppercase;
            font-size:1.5rem;
        }
        @media screen and (max-width:800px){
            .dash_board{
                width:100%;
            }
            .admin_dashboard{
                width:100%;
            }
            .mobile-menu{
                
                display:block!important;
            }
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
            header{
                display:flex;
                justify-content:space-between;
            }
            header h1{
                margin-left:0;
            }
            header h1 a{
                width:50vw;
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
            .user{
                right:0vw;
                background:transparent;
                padding:0;
                
            }
            
            .success p{
                font-size:1rem;
            }
            main{
                height:150vh;
            }
            .main_form{
                margin:30px auto;
                width:80%;
            }
            .login_form input{
                display:none;
            }
            aside{
                display:none;
                width:40vw;
                z-index:1;
                animation: 1s displaymenu 1;
            }
            
            @keyframes displaymenu{
                0%{
                    transform:translateX(-100%);
                }
                100%{
                    transform:translateX(0%);
                }
            }
            .dash_board{
                left:0vw;
                margin-left:0;
            }
            .info{
                padding:5px;
                margin-right:2px;
            }
            .datas{
                margin-left:0px;
            }
            .info i{
                font-size:2rem;
            }
            .info h3{
                font-size:1rem;
            }
            .info  p{
                font-size:.9rem;
            }
            .summary{
                justify-content:space-around;
            }
            .sum{
                padding:5px;
                margin:10px 0;
            }
            .sum p{
                color:#222;
            }
            .top-header{
                left:0;
                width:100%;
                justify-content: center;
                z-index:3;
            }
            .details{
                width:100%;
            }
            .updateForm{
                padding:5px;
            }
            .updateForm .profile_foto{
                float:none;
                width:50%;
                margin:0 auto;
            }
            .profile_foto img{
                width:100%;
                height:100%;
            }
            .infos input{
                width:80%;
                padding:8px;
            }
            .infos select{
                width:90%;
                padding:8px;
            }
        }
        .details .method{
            width:50%;
            margin:50px auto;
            text-align:center;
        }
        .details .method p{
            font-size:1.1rem;
            margin:10px;

        }
        .details .method button{
            padding:10px;
            margin:10px 20px;
            background:rgb(20, 73, 73);
            color:#fff;
            cursor:pointer;
            font-size:1rem;
        }
        #online_form, #manual_form{
            display:none;
        }

    
        @media print{
            body *{
                visibility:hidden;
            }
            .dash_board{
                width:100%;
                left:0vw;
            }
            .admin_dashboard{
                width:100%;
                left:0vw;
            }
            .dash_board .details{
                display:none;
            }
            header{
                display:none;
            }
            .mainReceipt, .mainReceipt *{
                visibility:visible;
                /* display:block!important; */
            }
            .mainReceipt{
                position:absolute;
                top:0;
                left:0;
                width:100vw;
                height:100vh;
                padding-bottom:5px;
            }
        }
    </style>
</head>
<body> 
    
    <header>
        <div class="mobile-menu">
            <a id="menu" href="javascript:void(0)">
            <i class="fas fa-bars"></i></a>
        </div>
        <h1>
            <a href="members.php">
                <img src="acpn_logo.png" alt="acpn">
                <div class="all_title">
                    <div class="title">ACPN</div>
                    <p class="sub">DELTA STATE</p>
                
                </div>
            </a>
        </h1>
        <h2>ASSOCIATION OF COMMUNITY PHARMACISTS OF NIGERIA, DELTA CHAPTER</h2>
        
        <div class="user">
            <a href="#" title="<?php echo $row->pharmacist;?>">
                <!-- <i class="fas fa-user"></i> -->
                <img src="<?php echo 'users/'.$row->pharmacist_passport;?>" alt="user">
            </a>
            <i class="fas fa-chevron-down" style="font-size:1.1rem;"></i>
            <div class="logout">
                <a href="logout.php" name="logout">Logout</a>
            </div>
        </div>
    
    </header>
    <main>
        <div class="admin_dashboard">
            <aside>
                <h3>Menu</h3>
                <button class="btn" id="paymentBtn">Upload Payment Slip</button>
                <button class="btn" id="showReceiptBtn">Print Clearance Slip</button>
                <button class="btn" id="updateBtn">Update Profile</button>
                <button class="btn" id="updatePassport">Change Passport</button>
            </aside>
            <section class="dash_board">
                <?php
                    $get_previous = $connectdb->prepare("SELECT previous_place, acceptance FROM users WHERE username = :username");
                    $get_previous->bindvalue("username", $member);
                    $get_previous->execute();
                    $previouss = $get_previous->fetchAll();
                    foreach($previouss as $previous){
                        $previous_place = $previous->previous_place;
                        $acceptance = $previous->acceptance;
                    }
                    if($previous_place == ""){
                        echo "";
                    }elseif($acceptance != ""){
                        echo "";
                    }else{
               ?>    
                <form method='POST' action='upload_previous.php' enctype='multipart/form-data' id="previous_form">
                    <h3>Kindly Upload Your prevous work place documents</h3>
                    <input type='hidden' value='<?php echo $row->id?>' name='user_id'>
                    <div class="data_input">
                        <div class='datas'>
                            <label>Upload resignation letter from previous work place</label>
                            <input type='file' name='resignation' required>
                        </div>
                        <div class='datas'>
                            <label>Upload acceptance letter by previous director</label>
                            <input type='file' name='acceptance' required>
                        </div>
                    </div>
                    
                    <button type='submit' name='upload_docs'>Upload documents <i class='fas fa-upload'></i></button>
                </form>
                <?php }?>
                <div class="paid">
                    <p>
                        <?php
                            if(isset($_SESSION['paid'])){
                                echo $_SESSION['paid'];
                                unset($_SESSION['paid']);
                            }
                        ?>
                    </p>
                </div>
                <div class="memberInfo">
                    <?php if(isset($_SESSION['success'])) :?>
                    <div class="success">
                        <p>
                            <?php 
                                echo $_SESSION['success'].$row->pharmacist;
                                /* unset($_SESSION['success']); */
                            ?>
                        </p>
                    </div>
                    <?php endif; ?>
                    
                    
                </div>
                <div class="summary">
                    <div class="info" id="newReg">
                        <i class="fas fa-home"></i>
                        <div class="datas">
                            <h3><?php echo $row->pharmacy_name;?></h3>
                            <p><?php echo $row->pharmacy_address;?></p>
                        </div>
                    </div>
                    <!-- <div class="sum" id="newReg">
                        <p class="description">Approved Members</p>
                        <div class="figures">
                            <i class="fas fa-tags"></i>
                            <p name="new_members" id="new_members">53</p>
                        </div>
                    </div> -->
                    <div class="sum" id="approved">
                        <p class="description">Clearance Status</p>
                        <div class="figures">
                            <i class="fas fa-tags"></i>
                            <p name="new_members">
                                <?php 
                                    $payments = "Open";
                                    
                                    $paymentStatus = $connectdb->prepare("SELECT users.username, payments.bank FROM users, payments WHERE users.username = ? AND users.pharmacist = payments.supretendent_pharmacist AND YEAR(payments.tdate) = YEAR(CURDATE()) AND payments.payment_status = 0");
                                    $approvedStatus = $connectdb->prepare("SELECT users.username, payments.bank FROM users, payments WHERE users.username = ? AND users.pharmacist = payments.supretendent_pharmacist AND YEAR(payments.tdate) = YEAR(CURDATE()) AND payments.payment_status = 1");
                                    $paymentStatus->execute([$member]);
                                    $approvedStatus->execute([$member]);
                                    $check_payment = $paymentStatus->rowCount();
                                    $check_approved = $approvedStatus->rowCount();

                                    if($check_payment){
                                        $payments = "Processing";
                                    }elseif($check_approved){
                                        $payments = "Approved";
                                    }else{
                                        $payments = "Uncleared"; 
                                    }
                                    
                                    echo $payments;
                                ?>

                            </p>
                        </div>
                    </div>
                    <!-- <div class="sum" id="declined">
                        <p class="description">Declined registration</p>
                        <div class="figures">
                            <i class="fas fa-eject"></i>
                            <p name="new_members">15</p>
                        </div>
                    </div> -->
                </div>
                <div class="details" id="makePayment">
                    <h2>Upload payment Slip</h2>
                    <hr>
                    <div class="method">
                        <p>Select method of payment</p>
                        <button id="manual">Manual Payment</button>
                        <button id="online">Online Payment</button>
                    </div>
                    <div class="payMentForm">
                        <form action="payment.php" id="manual_form" method="POST" enctype="multipart/form-data">
                            <div class="flex">
                                <div class="label">
                                    <label for="paymentMethod">Payment Method:</label>
                                </div>
                                <input type="text" name="payment_method" value="Manual Payment" id="paymentMethod" required readonly><br><br>
                                <div class="clear"></div>
                            </div>
                            <div class="flex">
                                <div class="label">
                                    <label for="tDate">Transaction Date:</label>
                                </div>
                                <input type="date" name="tdate" id="tDate" required><br><br>
                                <div class="clear"></div>
                            </div>
                            <div class="flex">
                                <div class="label">
                                    <label for="pharmacy">Pharmacy name:</label>
                                </div>
                                <input type="text" name="pharmacy_name" id="pharmacy" value="<?php echo $row->pharmacy_name;?>" placeholder="XYZ pharmacy" readonly required><br><br>
                                <div class="clear"></div>
                            </div>
                            <div class="flex">
                                <div class="label">
                                    <label for="supPharm">Supritendent Pharmacist</label>
                                </div>
                                <input type="text" name="supretendent_pharmacist" id="supPharm" value="<?php echo $row->pharmacist;?>" placeholder="Supretendent pharmacist" readonly required><br><br>
                                <div class="clear"></div>
                            </div>
                            <div class="flex">
                                <div class="label">
                                    <label for="supPharm">Pharmacist Email</label>
                                </div>
                                <input type="text" name="pharmacist_email" id="supPharm" value="<?php echo $row->pharmacist_email;?>" placeholder="Pharmacist email" required readonly><br><br>
                                <div class="clear"></div>
                            </div>
                            <div class="flex">
                                <div class="label">
                                    <label for="evidence">Upload ACPN payment slip:</label>
                                </div>
                                <input type="file" name="payment_evidence" id="evidence" required><br><br>
                                <div class="clear"></div>
                            </div>
                            <div class="flex">
                                <div class="label">
                                    <label for="nationalDue">Upload other Payment Slip:</label>
                                </div>
                                <input type="file" name="pcn_payment" id="nationalDue"><br><br>
                                <div class="clear"></div>
                            </div>
                            <button type="submit" name="submit_payment">Submit</button>
                        </form>
                        <form action="payment2.php" id="online_form" method="POST" enctype="multipart/form-data">
                            <div class="flex">
                                <div class="label">
                                    <label for="paymentMethod">Payment Method:</label>
                                </div>
                                <input type="text" name="payment_method" value="Online Payment" id="paymentMethod" required readonly><br><br>
                                <div class="clear"></div>
                            </div>
                            <div class="flex">
                                <div class="label">
                                    <label for="tDate">Transaction Date:</label>
                                </div>
                                <input type="date" name="tdate" id="tDate" required><br><br>
                                <div class="clear"></div>
                            </div>
                            <div class="flex">
                                <div class="label">
                                    <label for="pharmacy">Pharmacy name:</label>
                                </div>
                                <input type="text" name="pharmacy_name" id="pharmacy" value="<?php echo $row->pharmacy_name;?>" readonly required><br><br>
                                <div class="clear"></div>
                            </div>
                            <div class="flex">
                                <div class="label">
                                    <label for="supPharm">Supritendent Pharmacist</label>
                                </div>
                                <input type="text" name="supretendent_pharmacist" id="supPharm" value="<?php echo $row->pharmacist;?>" placeholder="Supretendent pharmacist" readonly required><br><br>
                                <div class="clear"></div>
                            </div>
                            <div class="flex">
                                <div class="label">
                                    <label for="supPharm">Pharmacist Email</label>
                                </div>
                                <input type="text" name="pharmacist_email" id="supPharm" value="<?php echo $row->pharmacist_email;?>" placeholder="Pharmacist email" required readonly><br><br>
                                <div class="clear"></div>
                            </div>
                            <div class="flex">
                                <div class="label">
                                    <label for="evidence">Upload ACPN payment slip:</label>
                                </div>
                                <input type="file" name="payment_evidence" id="evidence" required><br><br>
                                <div class="clear"></div>
                            </div>
                            <button type="submit" name="submit_payment">Submit</button>
                        </form>
                    </div>
                    <?php endforeach;?>
                </div> 
                <div class="details" id="updateProfile">
                    <h2>Update Profile</h2>
                    <hr>
                    <?php
                        $sql_selectMembers = $connectdb->prepare("SELECT * FROM users WHERE username = :username");
                        $sql_selectMembers->bindvalue('username', $member);
                        $sql_selectMembers->execute();
                        $rowsss = $sql_selectMembers->fetchAll();
                        foreach($rowsss as $rowss):
                    ?>
                    <div class="updateForm">
                        <form method="POST" action="update_profile.php" enctype="multipart/form-data">
                            <figure class="profile_foto">
                                <img src="<?php echo 'users/'.$rowss->pharmacist_passport;?>" alt="Profile photo">
                                <!--<figcaption>-->
                                <!--    <input type="file" name="pharmacist_passport" value="<?php echo 'users/'.$rowss->pharmacist_passport;?>">-->
                                <!--</figcaption>-->
                            </figure>
                            <div class="clear"></div>
                            <div class="otherInfo">
                                <div class="contents">
                                    <div class="infos">
                                        <label for="pharmacist">Pharmacist</label><br>
                                        <input type="text" name="pharmacist" id="pharmacist" value="<?php echo $rowss->pharmacist;?>">
                                    </div>
                                    <div class="infos">
                                        <label for="phone">Pharmacist Phone Number</label><br>
                                        <input type="tel" name="username" id="phone" value="<?php echo $rowss->username;?>"> 
                                    </div>
                                </div>
                                <div class="contents">
                                    <div class="infos">
                                        <label for="pharmacist_email">Email</label><br>
                                        <input type="email" name="pharmacist_email" id="pharmacist_email" value="<?php echo $rowss->pharmacist_email;?>"> 
                                    </div>
                                    <div class="infos">
                                        <label for="pharm_address">Residential address</label><br>
                                        <input type="text" name="pharmacist_address" id="pharm_address" value="<?php echo $rowss->pharmacist_address;?>"> 
                                    </div>
                                </div>
                                <div class="contents">
                                    <div class="infos">
                                        <label for="dob">Date of Birth</label><br>
                                        <input type="date" name="contact_birth_date" value="<?php echo $rowss->contact_birth_date?>" id="dob">
                                    </div>
                                    <div class="infos">
                                        <label for="gender">Gender</label><br>
                                        <select name="contact_gender" id="gender">
                                            <option value="<?php echo $rowss->contact_gender;?>" selected><?php echo $rowss->contact_gender;?></option>
                                            <option value="Male" >Male</option>
                                            <option value="Female" >Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="contents">
                                    <div class="infos">
                                        <label for="pcn">PCN Registration</label><br>
                                        <input type="text" name="contact_pcn_reg" value="<?php echo $rowss->contact_pcn_reg;?>" id="pcn"> 
                                    </div>
                                    <div class="infos">
                                        <label for="nextKin">Next of kin</label><br>
                                        <input type="text" name="contact_next_of_kin" value="<?php echo $rowss->contact_next_of_kin;?>" id="nextKin">
                                    </div>
                                </div>
                                <div class="contents">
                                    <div class="infos">
                                        <label for="kinPhone">Next of Kin Phone</label><br>
                                        <input type="tel" name="contact_next_of_kin_phone" value="<?php echo $rowss->contact_next_of_kin_phone;?>" id="kinPhone"> 
                                    </div>
                                    <div class="infos">
                                        <label for="kinAddress">Next of kin Address</label><br>
                                        <input type="text" name="contact_next_of_kin_address" value="<?php echo $rowss->contact_next_of_kin_address?>" id="kinAddress">
                                    </div>
                                </div>
                                <div class="contents">
                                    <div class="infos">
                                        <label for="pharmacy_name">Pharmacy Name</label><br>
                                        <input type="text" name="pharmacy_name" value="<?php echo $rowss->pharmacy_name;?>" id="pharmacy_name"> 
                                    </div>
                                    <div class="infos">
                                        <label for="pharmacyAddress">Pharmacy address</label><br>
                                        <input type="text" name="pharmacy_address" value="<?php echo $rowss->pharmacy_address;?>" id="pharmacyAddress">
                                    </div>
                                </div>
                                <div class="contents">
                                    <div class="infos">
                                        <label for="pharmacyExist">Pharmacy Existence</label><br>
                                        <select name="pharmacy_exist" id="pharmacyExist">
                                            <option value="<?php echo $rowss->pharmacy_exist?>" selected><?php echo $rowss->pharmacy_exist?></option>
                                            <option value="New pharmacy">New pharmacy</option>
                                            <option value="Existing pharmacy">Exsiting pharmacy</option>
                                        </select> 
                                    </div>
                                    <div class="infos">
                                        <label for="location">Pharmacy Location</label><br>
                                        <select name="pharmacy_location" id="location">
                                            <option value="<?php echo $rowss->pharmacy_location?>" selected><?php echo $rowss->pharmacy_location?></option>
                                            <option value="Akoko Edo">Akoko Edo</option>
                                            <option value="Egor ">Egor</option>
                                            <option value="Esan Central">Esan Central</option>
                                            <option value="Esan North East">Esan North East</option>
                                            <option value="Esan South East">Esan South East</option>
                                            <option value="Esan West">Esan West</option>
                                            <option value="Etsako">Etsako</option>
                                            <option value="Etsako central">Etsako central</option>
                                            <option value="Etsako East">Etsako East</option>
                                            <option value="Etsako West">Etsako West</option>
                                            <option value="Igueben">Igueben</option>
                                            <option value="Ikpoba-Okha">Ikpoba-Okha</option>
                                            <option value="Oredo">Oredo</option>
                                            <option value="Orhionmwon">Orhionmwon</option>
                                            <option value="Ovia North East">Ovia North East</option>
                                            <option value="Ovia South West">Ovia South West</option>
                                            <option value="Owan East">Owan East</option>
                                            <option value="Owan West">Owan West</option>
                                            <option value="Uhunmwonde">Uhunmwonde</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="contents">
                                    <div class="infos">
                                        <label for="practice">Pharmacy practice type</label><br>
                                        <select name="practice_type" id="pharmPractice">
                                            <option value="<?php echo $rowss->practice_type?>" selected><?php echo $rowss->practice_type?></option>
                                            <option value="Wholesale">Wholesale</option>
                                            <option value="Retail">Retail</option>
                                        </select> 
                                    </div>
                                    <div class="infos">
                                        <label for="director">Pharmacy Director</label><br>
                                        <input type="text" name="pharmacy_director" id="director" value="<?php echo $rowss->pharmacy_director;?>">
                                    </div>
                                </div>
                                <div class="contents">
                                    <div class="infos">
                                        <label for="regNumber">Director's Registration Number</label><br>
                                        <input type="text" name="registration_number" id="regNum" value="<?php echo $rowss->registration_number;?>">
                                    </div>
                                    <div class="infos">
                                        <label for="pharmClass">Pharmacist Class</label><br>
                                        <select name="pharmacist_class" id="pharmClass">
                                            <option value="<?php echo $rowss->pharmacist_class?>" selected><?php echo $rowss->pharmacist_class?></option>
                                            <option value="Supretendent Pharmacist">Supretendent Pharmacist</option>
                                            <option value="Locum Pharmacist">Locum Pharmacist</option>
                                        </select> 
                                    </div>
                                </div>
                                <div class="contents">
                                    <div class="infos">
                                        <label for="regNumber">Previous place of assignment</label><br>
                                        <input type="text" name="previous_place" id="previous_place" value="<?php echo $rowss->previous_place;?>">
                                    </div>
                                    <div class="infos">
                                        <label for="regNumber">Previous Pharmacy address</label><br>
                                        <input type="text" name="previous_address" id="previous_address" value="<?php echo $rowss->previous_address;?>">
                                    </div>
                                    
                                </div>
                                <div class="contents">
                                    <div class="infos">
                                        <label for="regNumber">Previous Pharmacy Director</label><br>
                                        <input type="text" name="previous_director" id="previous_director" value="<?php echo $rowss->previous_director;?>">
                                    </div>
                                    <div class="infos">
                                        <label for="regNumber">Previous director contact</label><br>
                                        <input type="text" name="previous_director_contact" id="previous_director_contact" value="<?php echo $rowss->previous_director_contact;?>">
                                    </div>
                                    
                                </div>
                                <div class="contents">
                                    <div class="infos">
                                        <label for="regNumber">Previous Position Held</label><br>
                                        <input type="text" name="position_held" id="position_held" value="<?php echo $rowss->position_held;?>">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="update_profile">Update</button>
                        </form>
                    </div>
                        <?php endforeach;?>
                </div>
                <!-- change passport -->
                <div class="details" id="change_passport">
                    <form action="change_passport.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $member?>" name="username">
                        <figure>
                            <?php
                                $get_foto = $connectdb->prepare("SELECT pharmacist_passport FROM users WHERE username = :username");
                                $get_foto->bindvalue("username", $member);
                                $get_foto->execute();
                                $foto = $get_foto->fetch();

                            ?>
                            <img src="<?php echo "users/".$foto->pharmacist_passport?>" alt="Pharmacist passport">
                            <figcaption class="inputs">
                            <label for="passport">Change Your Passport</label>
                            <input type="file" name="passport" id="passport">
                            </figcaption>
                        </figure>
                        
                        <button type="submit" name="change_passport">Change passport <i class="fas fa-paper-plane"></i></button>

                    </form>
                </div>
                <!-- clearance slip -->
                <div class="details" id="receipt">
                    <h2>Membership Annual Receipt</h2>
                    <hr>
                    <div class="receipt">      
                        <?php 
                            if(isset($_SESSION['status'])){
                                $status = $_SESSION['status'];
                            }
                            $sql_receipt = $connectdb->prepare("SELECT users.id, users.username,  users.pharmacist, users.pharmacist_passport, users.pharmacist_email, users.pharmacist_address, users.pharmacy_name, users.pharmacy_address, payments.tdate, payments.supretendent_pharmacist, payments.receipt_number FROM users, payments WHERE users.username = ? AND users.pharmacist=payments.supretendent_pharmacist AND payments.payment_status=1 AND YEAR(payments.tdate) = YEAR(CURDATE())");
                            $sql_receipt->execute([$member]);

                            
                            if(!$sql_receipt->rowCount()){
                                echo "<div class='notice'>
                                        <p>You have not been approved or uploaded payment Slip!</p>
                                    </div>";
                            }
                            $rowss = $sql_receipt->fetchAll();
                            foreach($rowss as $rows):
                        ?>
                        <div class="memberReceipt" id="printReceipt">
                            <div class="mainReceipt">
                                <div class="receipt_num">
                                    <p style="font-weight:bold; text-decoration:underline;">
                                        <?php
                                            echo $rows->receipt_number;
                                        ?>
                                    </p>
                                </div>
                                <div class="receipt_header">
                                    <div class="acpn_logo">
                                        <img src="acpn_logo.png" alt="acpn">
                                    </div>
                                    <div class="association">
                                        <h2>Association of Community Phamacists of Nigeria<br>Delta State Chapter</h2>
                                        <p>2 Ozoro/Ughelli Road, Ozoro, Delta state.
                                        <h3 class="receipt_title">Membership Clearance form for "<?php echo date("Y", strtotime($rows->tdate))?>"</h3>
                                    </div>
                                </div>
                                
                                <div class="user_image">
                                    <img src="<?php echo 'users/'.$rows->pharmacist_passport;?>" alt="user image">
                                    
                                </div>
                                <div class="receipt_content">
                                    <table>
                                        <tr>
                                            <td>This is to certify that:</td>
                                            <td><strong>Pharm. <?php echo $rows->supretendent_pharmacist; ?></strong></td>
                                        </tr>
                                        <!-- <tr>
                                            <td>Has paid THE SUM OF:</td>
                                            <td>TWENTY THOUSAND NAIRA ONLY (N20,000)</td>
                                        </tr> -->
                                    </table>
                                    <p>Has fulfilled ACPN registration requirement for the year <?php echo date("Y", strtotime($rows->tdate));?>. </p>
                                    <p>He is therefore a bonafied member of ACPN Delta State for the year <?php echo date("Y", strtotime($rows->tdate));?>.</p>
                                    <div class="chairman_sign">
                                    <div class="sign">
                                        <img src="signature.jpg" alt="chairman signature">
                                        <p><strong>Chairman ACPN</strong></p>
                                    </div>
                                    <div class="sign">
                                        <p><?php
                                            $get_date = $connectdb->prepare("SELECT tdate FROM payments WHERE pharmacist_email = :pharmacist_email");
                                            $get_date->bindvalue("pharmacist_email", $rows->pharmacist_email);
                                            $get_date->execute();
                                            $tdate = $get_date->fetch();
                                            echo date("jS M, Y", strtotime($tdate->tdate));
                                        ;?></p>
                                        <p><strong>Date</strong></p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <button onclick="window.print()">Print receipt</button>
                    </div>
                            <?php endforeach;?>

                </div>   
                
            </section>
        </div>
            <section class="top-header">
                <div class="social_media">
                    <a target="_blank" href="#" title="connect with us on whatsapp"><i class="fab fa-whatsapp"></i></a>
                    <a target="_blank" href="#" title="follow us on facebook"><i class="fab fa-facebook"></i></a>
                    <a target="_blank" href="#" title="follow us on twitter"><i class="fab fa-twitter"></i></a>
                    <a target="_blank" href="#" title="follow us on instagram"><i class="fab fa-instagram"></i></a>
                    <a target="_blank" href="#" title="follow us on linkedin"><i class="fab fa-linkedin"></i></a>
                </div>
                <div class="foot">
                <p style="font-weight:bold;">&copy;ACPN <?php echo date("Y")?>. Powered by <a href="https://appliedmacros.com">Applied macrosystems</a></p>
                </div>
                <div class="hotline">
                    <p><i class="fas fa-phone-alt"></i> +2348169139603</p>
                </div>
            </section>
        </section>
    </main>
    <script src="jquery.js"></script>
    <script src="script.js"></script>
    
</body>
</html>

    <?php }else{
            header("Location: index.php");
        }
    ?>