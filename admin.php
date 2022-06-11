<?php 
include "server.php";
    session_start();
    if(isset($_SESSION['user'])){

        $member = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Association of Community Pharmacist of Nigeria (ACPN), Delta chapter is an organisation made up of pharmacy owners in Edo state">
    <meta name="keyword" content="ACPN, pharmacies, pharmacy, pharmacist, medicine, drugs, pharmacology, acpn portal">
    <title>ACPN admin</title>
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
            width
            background:rgb(95, 197, 197);
            padding:2px;
            display:flex;
            justify-content: space-around;
            align-items:center;
            flex-wrap:wrap;
            z-index:1;
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
        .mobile-menu{
            position:absolute;
            right:15vw;
            display:none;
        }
        .mobile-menu i{
            color:#fff;
            font-size:1.7rem;
        }
        #declined{
            background:rgb(255, 208, 0);
        }
        .details table{
            border:1px solid rgba(95, 197, 197, .4);
            padding:5px;
        }
        .details tr:hover, .details tr:focus{
            background:#c4c4c4;
        }
        .createUserForm{
            width:50%;
            margin:20px auto;
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
        .createUserForm form{
            width:80%;
            margin:20px auto;
        }
        .createUserForm input{
            width:95%;
            margin:0 auto;
            padding:10px;
        }
        .createUserForm button{
            padding:10px;
            background:rgb(18, 109, 109);
            color:#fff;
            width:30%;
            display:block;
            margin:0 auto;
            cursor: pointer;
            font-size:1rem;
            transition: .2s all;
        }
        .createUserForm button:hover{
            transform:scale(.9);
        }
        .success p{
            text-decoration:underline;
            color:green;
            font-size:1.1rem;
        }
        .error p{
            text-decoration:underline;
            color:red;
            font-size:1.1rem;
        }
        #member{
            width:95%;
            margin:40px auto 4px auto;
        }
        #member h2{
            color:rgb(58, 57, 57);
            text-align:center;
        }
        #member hr{
            width:50px;
            height:5px;
            background-color:rgb(75, 174, 212);
            margin:10px auto;
        }
        .member_profile{
            margin-bottom:100px;
        }
        #member table{
            width:100%;
            margin: 0 auto;
            
        }
        #member tr, #member th, #member td{
            height:50px;
            border:1px solid rgba(95, 197, 197, .4);
            padding:5px 3px;
            text-align:left;
            font-size:.9rem;
            color:rgb(70, 68, 68);
        }
        #member td{
            text-transform: capitalize;
        }
        #member tr:nth-child(even){
            background:rgba(235, 231, 231, .5);
        }
        #member th{
            text-transform: uppercase;
            background:rgb(75, 174, 212);
            color:#fff;
            padding-left:2px;
        }
        #member table tr button:nth-child(1) a, #member table tr button:nth-child(2) a{
            color:#fff;
        }
        #member table tr button:nth-child(1){
            background:green;
        }
        #member table tr button:nth-child(2){
            background:red;
        }
        #memberTable tbody tr td button:hover{
            background:green;
        }
        .profile{
            width:80%;
            margin:20px auto 40px;
            padding:10px;
            box-shadow:2px 2px 5px 2px rgb(20, 73, 73);
            border:1px solid rgb(18, 109, 109);
            border-radius:5px;
            animation: .5s zoomin 1;
            animation-fill-mode: forwards;
        }
        .profile .fellow{
            background:rgb(20, 73, 73);
            padding:10px 20px;
            border-radius:4px;
            display:inline-block;
            width:auto;
        }
        .profile .fellow p{
            text-transform:uppercase;
            color:#fff;
            font-weight:bold;
            font-size:1.2rem;
        }
        /* .profile .fellow p i{
            
        } */
        .profile .head{
            display:flex;
            justify-content:space-between;
            align-items:flex-start;
            flex-wrap:wrap;
            margin-bottom:10px;
        }
        .profile .pharmInfo{
            display:flex;
            justify-content:space-between;
            background:rgb(75, 174, 212);
            padding:10px;
            border-radius:5px;
            flex-wrap:wrap;
        }
        .pharmInfo i{
            color:#fff;
            font-size:2.5rem;
            margin-right:10px;
        }
        .pharmInfo p{
            color:#fff;
            font-size:1.1rem;
            text-align:right;
        }
        .profile figure{
            
            margin:0 10px 10px 0;
        }
        .profile figure img{
            border:1px solid rgb(18, 109, 109);
            /*box-shadow:2px 2px 5px 2px rgb(20, 73, 73); */
            border-radius:10px;
            height:150px;
            width:150px;
        }
        .profile figure figcaption{
            text-transform:uppercase;
            background:rgb(75, 174, 212);
            color:#fff;
            padding:3px;
            border-radius:3px;
            font-size:1.1rem;
            text-align:center;
        }
        .profile table tr td{
            color:rgb(20, 73, 73);
            text-transform:uppercase;
            font-weight:bold;
            
        }
        .profile table tr td span{
            text-transform:capitalize;
            font-weight:normal;
            color:#222;
            /* padding:5px;
            background:#f0eaea;
            border-radius:5px;
            width:50%; */
        }
        #search{
            padding:5px;
            border-radius:5px;
            width:20vw;
        }
        .search{
            display:flex;
            justify-content:space-between;
        }
        #approvedMembers tr td img{
            width:50px;
            height:50px;
        }
        .download_user{
            width:100%;
            display:flex;
            justify-content:center;
        }
        #download_user{
            background:rgb(20, 73, 73);
            color:#fff;
            padding:10px;
            text-align:center;
            cursor:pointer;
        }
        @media screen and (max-width:800px){
            .admin_dashboard{
                width:100%;
            }
            .dash_board{
                width:100%;
                left:0vw;
            }
            .mobile-menu{
                margin-right:10px;
                display:block;
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
            .user .logout{
                right:0vw;
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
                
                margin-left:0;
            }
            .summary{
                justify-content:space-around;
            }
            .sum{
                padding:5px;
                margin:10px 0;
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
            .createUserForm{
                width:70%;
            }
            .createUserForm button{
                width:50%;
            }
            .profile .head{
                flex-direction:column-reverse;
                align-items:center;
                
            }
            .profile .fellow{
            padding:5px 20px;
            margin-top:20px;
            }
            .profile table tr td{
                display:block;
                margin-top:5px;
            }
            .profile table tr td span{
                display:block;
            }
            .pharmInfo{
                align-items:center;
            }
            .pharmInfo p{
                font-size:1rem;
            }
        }
    </style>
</head>
<body>
    <section class="top-header">
        <div class="social_media">
            <a target="_blank" href="#" title="connect with us on whatsapp"><i class="fab fa-whatsapp"></i></a>
            <a target="_blank" href="#" title="follow us on facebook"><i class="fab fa-facebook"></i></a>
            <a target="_blank" href="#" title="follow us on twitter"><i class="fab fa-twitter"></i></a>
            <a target="_blank" href="#" title="follow us on instagram"><i class="fab fa-instagram"></i></a>
            <a target="_blank" href="#" title="follow us on linkedin"><i class="fab fa-linkedin"></i></a>
        </div>
        <div class="foot">
            <p style="font-weight:bold;">&copy; ACPN <?php echo date("Y"); ?>. Powered by <a href="https://appliedmacros.com">Applied macrosystems</a></p>
        </div>
        <div class="hotline">
            <p><i class="fas fa-phone-alt"></i> +2348033588514, +2347032664418</p>
        </div>
    </section>
    <header>
        <h1>
            <a href="admin.php">
                <img src="acpn_logo.png" alt="acpn">
                <div class="all_title">
                    <div class="title">ACPN</div>
                    <p class="sub">DELTA STATE</p>
                
                </div>
            </a>
        </h1>
        <h2>ASSOCIATION OF COMMUNITY PHARMACISTS OF NIGERIA, DELTA CHAPTER</h2>
        <div class="mobile-menu">
            <a id="menu" href="javascript:void(0)">
            <i class="fas fa-bars"></i></a>
        </div>
        <div class="user">
            <a href="#" title="Admin">
                <i class="fas fa-user"></i>
            </a>
            <div class="logout">
                <a href="logout.php">Logout</a>
            </div>
        </div>
        
    </header>
    <main>
        <div class="admin_dashboard">
            <aside>
                <h3>Menu</h3>
                <button class="btn" id="acceptMembersBtn">Registered Members</button>
                <button class="btn" id="approveMembers" >Confirm clearance</button>
                <button class="btn" id="approvedBtn">Approved members</button>
                <button class="btn" id="declinedBtn">Declined members</button>
                <button class="btn" id="createBtn">Create user</button>
            </aside>
            <section class="dash_board">
                <div class="success">
                    <p>
                        <?php
                            if(isset($_SESSION['msg']))
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        ?>
                    </p>
                </div>
                <div class="error">
                    <p>
                        <?php
                            if(isset($_SESSION['error']))
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        ?>
                    </p>
                </div>

                <div class="summary">
                    <div class="sum" id="newReg">
                        <?php 
                            $general = $connectdb->prepare("SELECT * FROM users WHERE username != 'admin'");
                            $general->execute();
                            $count = $general->rowCount();
                        ?>
                        <p class="description">Registered members</p>
                        <div class="figures">
                            <i class="fas fa-users"></i>
                            <p name="new_members" id="new_members"><?php echo $count ?></p>
                        </div>
                    </div>
                    <div class="sum" id="declined">
                        <?php
                            $membersPayment = $connectdb->prepare("SELECT * FROM payments WHERE payment_status = 0 AND YEAR(tdate) = YEAR(CURDATE())");

                            $membersPayment->execute();

                            $countPayment = $membersPayment->rowCount();
                        ?>
                        <p class="description">Pending Approval</p>
                        <div class="figures">
                            <i class="fas fa-money-bill-alt"></i>
                            <p name="new_members"><?php echo $countPayment ?></p>
                        </div>
                    </div>
                    <div class="sum" id="approved">
                        <?php
                            $membersApproved = $connectdb->prepare("SELECT * FROM payments WHERE payment_status = 1 AND YEAR(tdate) = YEAR(CURDATE())");

                            $membersApproved->execute();

                            $countApproved = $membersApproved->rowCount();
                        ?>
                        <p class="description">Approved members for <?php echo date("Y")?></p>
                        <div class="figures">
                            <i class="fas fa-user-check"></i>
                            <p name="new_members"><?php echo $countApproved ?></p>
                        </div>
                    </div>
                    <div class="sum" id="declinedMember" style="background:red;">
                        <?php
                            $membersDeclined = $connectdb->prepare("SELECT * FROM payments WHERE payment_status = -1");

                            $membersDeclined->execute();

                            $countDeclined = $membersDeclined->rowCount();
                        ?>
                        <p class="description">Declined Members</p>
                        <div class="figures">
                            <i class="fas fa-eject"></i>
                            <p name="new_members"><?php echo $countDeclined ?></p>
                        </div>
                    </div>
                </div>
                <!-- member profile -->
                <div id="member">
                    
                    <div class="member_profile">   
                     
                        <?php
                            if(isset($_GET['profile'])){
                                $userProfile = $_GET['profile'];
                                
                                $profile = $connectdb->prepare("SELECT * FROM users WHERE pharmacist = :pharmacist");
                                $profile->bindvalue('pharmacist', $userProfile);
                                $profile->execute();
                                /* $sql_profile = mysqli_query($connectdb, $profile) or die(mysqli_error($connectdb)); */
                                $rowsss = $profile->fetchAll();
                                foreach($rowsss as $rowss):
                        ?>
                        <div class="profile">
                        <!-- <h2>Member profile</h2>
                        <hr> -->
                            <div class="head">
                                <div class="pharmInfo">
                                    <i class="fas fa-home"></i>
                                    <div class="more">
                                        <p><?php echo $rowss->pharmacy_name;?></p>
                                        <p><?php echo $rowss->pharmacy_address;?></p>
                                    </div>
                                </div>
                                <figure>
                                    <img src="<?php echo 'users/'.$rowss->pharmacist_passport;?>" alt="<?php echo $rowss->pharmacist;?>">
                                    <figcaption><?php echo $rowss->pharmacist;?></figcaption>
                                    <div class="pharm_class" style="background:rgb(20, 73, 73); padding:5px; color:#fff; text-align:center">
                                        <p>
                                            <?php
                                                echo $rowss->pharmacist_class;
                                            ?>
                                        </p>
                                    </div>
                                </figure>
                            </div>
                            <div class="fellow">
                                <p>
                                    <?php
                                        $fellows = $rowss->fellow;
                                        if($fellows == "Yes"){
                                            echo "Fellow: <i class='fas fa-check'></i>";
                                        }else{
                                            echo "Fellow: <i style='color:red'class='fas fa-times'></i>";
                                        }
                                        ?>
                                </p>
                            </div>
                            <table id="membersProfiles">
                                <tr>
                                    <td>First time Reg: <span><?php echo $rowss->first_time_reg;?></span></td>
                                    <td>Previous Premise: <span><?php echo $rowss->previous_place;?></span></td>
                                </tr>
                                <tr>
                                    <td>Previous Pharmacy Address: <span><?php echo $rowss->previous_address;?></span></td>
                                    <td>Previous Pharmacy Director: <span><?php echo $rowss->previous_director;?></span></td>
                                </tr>
                                <tr>
                                    <td>Previous Director Contact: <span><?php echo $rowss->previous_director_contact;?></span></td>
                                    <td>Position held: <span><?php echo $rowss->position_held;?></span></td>
                                    
                                    
                                </tr>
                                <tr>
                                    <td>Resignation letter from previous work place: <span><a href="<?php echo "documents/".$rowss->resignation?>" target="_blank" title="Resignation letter"><img src="<?php echo "documents/".$rowss->resignation;?>"></a></span></td>
                                    <td>Acceptance letter from previous director: <a href="<?php echo 'documents/'.$rowss->acceptance?>" target="_blank" title="Acceptance letter"><img src="<?php echo 'documents/'.$rowss->acceptance;?>" alt="acceptance letter"></a></td>
                                </tr>
                                <tr>
                                    <td>Gender: <span><?php echo $rowss->contact_gender;?></span></td>
                                    <td>Date of Birth: <span><?php echo $rowss->contact_birth_date;?></span></td>
                                </tr>
                                <tr>
                                    <td>Contact number: <span><?php echo $rowss->username;?></span></td>
                                    <td>Email: <span><?php echo $rowss->pharmacist_email;?></span></td>
                                </tr>
                                <tr>
                                    <td>Residential Address: <span><?php echo $rowss->pharmacist_address;?></span></td>
                                    <td>PCN: <span><?php echo $rowss->contact_pcn_reg;?></td>
                                </tr>
                                <tr>
                                    <td>Next of Kin: <span><?php echo $rowss->contact_next_of_kin;?></span></td>
                                    <td>Next of Kin Contact: <span><?php echo $rowss->contact_next_of_kin_phone;?></td>
                                </tr>
                                <tr>
                                    <td>Pharmacy type: <span><?php echo $rowss->pharmacy_exist;?></span></td>
                                    <td>Pharmacy Location: <span><?php echo $rowss->pharmacy_location;?></td>
                                </tr>
                                <tr>
                                    <td>Pharmacy practice type: <span><?php echo $rowss->practice_type;?></span></td>
                                    <td>Pharmacist Director: <span><?php echo $rowss->pharmacy_director;?></td>
                                </tr>
                                <tr>
                                    <td>pharmacist Director's Phone Number: <span><?php echo $rowss->pharmacist_director_phone;?></span></td>
                                    <td>Pharmacist Director Registration Number: <span><?php echo $rowss->registration_number;?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="download_user">
                            <button id="download_user" class="memberProf_download">Download Profile</button>
                        </div>
                        
                                <?php endforeach;?>
                        <?php }?>
                        
                    </div>
                </div>      
                <div class="details" id="acceptMembers">
                    <h2>Registered Members</h2>
                    <hr>
                        <?php
                            /* connect database */
                            include "server.php";

                            /* select and insert statements */
                            $acceptMembers = $connectdb->prepare("SELECT id, registration_date, pharmacy_name, pharmacy_address, pharmacist, username, contact_birth_date, pharmacist_email, contact_pcn_reg, first_time_reg FROM users WHERE username != 'admin' ORDER BY registration_date DESC");
                            $acceptMembers->execute();
                            $rows = $acceptMembers->fetchAll();
                            
                        ?>
                        <!-- search bar -->
                        <div class="search">
                            <input type="search" name="search" id="search" placeholder="search pharmacist, pharmacy, address">
                            <button id="download_user" class="download_members">Download</button>
                        </div>
                        <table id="memberTable">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    
                                    <th>Pharmacist</th>
                                    <th>Phone Number</th>
                                    <th>Date of birth</th>
                                    <th>Pharmacist Email</th>
                                    <th>PCN Reg. Number</th>
                                    <th>Pharmacy Name</th>
                                    <th>Pharmacy Address</th>
                                    <th>Reg Date</th>
                                    <th>First time registration?</th>
                                    
                                </tr>
                            </thead>
                            <?php
                            $serial = 1;
                            foreach($rows as $row):
                            ?>
                            <tbody>
                                <tr>
                                    <td><button style="padding:4px 10px; color:#fff; border:none; background:#c4c4c4;" onclick="displayMemberProfile('<?php echo $row->pharmacist;?>')"><?php echo $serial;?></button></td>
                                    <td><?php echo $row->pharmacist;?></td>
                                    <td><?php echo $row->username;?></td>
                                    <td><?php echo date("jS M, Y", strtotime($row->contact_birth_date));?></td>
                                    <td><?php echo $row->pharmacist_email;?></td>
                                    <td><?php echo $row->contact_pcn_reg;?></td>
                                    <td><?php echo $row->pharmacy_name;?></td>
                                    <td><?php echo $row->pharmacy_address;?></td>
                                    <td><?php echo $row->registration_date;?></td>
                                    <td><?php echo $row->first_time_reg;?></td>
                                    
                                </tr>
                            </tbody>   
                            <?php $serial++; endforeach; ?>                 
                    </table>
                </div> 
                <div class="details" id="approvedMembers">
                    <div class="success">
                        <p>
                            <?php
                                if(isset($_SESSION['msg']))
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            ?>
                        </p>
                    </div>
                    <h2>Confirm payment</h2>
                    <hr>
                    <?php
                         
                        /* select and insert statements */
                        $confirmPayment = $connectdb->prepare("SELECT * FROM payments WHERE payment_status= 0 AND YEAR(tdate) = YEAR(CURDATE())ORDER BY tdate DESC");
                        $confirmPayment->execute();
                        $rows = $confirmPayment->fetchAll();
                    ?>
                    <table>
                        <tr>
                            <th>S/N</th>
                            <th>Pharmacist Name</th>
                            <th>Payment Method</th>
                            <th>National payment Slip</th>
                            <th> Other slip</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        <?php $c = 1;
                        foreach( $rows as $row):
                        ?>
                        
                        <tr>
                            <td><?php echo $c;?></td>
                            <td><?php echo $row->supretendent_pharmacist;?></td>
                            <td><?php echo $row->payment_method;?></td>
                            <td><a href="<?php echo 'payments/'.$row->payment_evidence?>" target="_blank"><img src="<?php echo 'payments/'.$row->payment_evidence;?>"></a></td>
                            <td><a href="<?php echo 'payments/'.$row->pcn_payment?>" target="_blank"><img src="<?php echo 'payments/'.$row->pcn_payment;?>" alt="Nil"></a></td>
                            <td><?php echo date("jS M, Y", strtotime($row->tdate))?></td>
                            <td>
                                <a href="javascript:void(0);">
                                    <button style="padding:5px; color:#fff;" type ="submit"  onclick="approvePayments('<?php echo $row->id;?>')">Approve</button>
                                </a>
                                <a href="javascript:void(0);">
                                    <button style="padding:5px; color:#fff; background:red;" type ="button"  onclick="declinePayment('<?php echo $row->id;?>')">Decline</button>
                                </a>
                            </td>
                        </tr>   
                        <?php $c = $c+1; endforeach;?>  
                    </table>
                </div>
                <!-- approved members -->
                <div class="details" id="paidMembers">
                    <!-- search approved date -->
                    <div class="select_date">
                        <form method="POST">
                            <h3>Select year</h3>
                            <select name="payment_year" id="payment_year" required>
                                <option selected>Pick a year</option>
                                <?php
                                    $select_year = $connectdb->prepare("SELECT YEAR(tdate) AS tdate FROM payments GROUP BY YEAR(tdate) ORDER BY YEAR(tdate)");
                                    $select_year->execute();
                                    $rows = $select_year->fetchAll();
                                    
                                    foreach($rows as $row):
                                    
                                ?>
                                <option value="<?php echo $row->tdate?>"><?php echo $row->tdate?></option>
                                <?php endforeach;?>
                                
                            </select>
                            <button type="submit" name="search_year" id="search_year">Search</button>
                        </form>
                    </div>
                    <div class="the_approved">
                        <h2>Approved members for "<?php echo date("Y");?>"</h2>
                        <hr>
                        <?php
                             
                            /* select and insert statements */
                            $approvedMember = $connectdb->prepare("SELECT pharmacy_name, supretendent_pharmacist, tdate, payment_evidence, pcn_payment, payment_method FROM payments WHERE payment_status=1 AND YEAR(tdate) = YEAR(CURDATE()) ORDER BY tdate DESC");
                            $approvedMember->execute();
                            $rows = $approvedMember->fetchAll();
                        ?>
                        <!-- search bar -->
                        <div class="search">
                                <input type="search" name="search" id="searchApprove" class="search" placeholder="search pharmacist, pharmacy, address">
                                <button id="download_user" class="approved_mem">Download</button>
                            </div>
                        <table id="approvedTable">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Pharmacy Name</th>
                                    <th>Pharmacist</th>
                                    <th>Payment Method</th>
                            <th>National payment Slip</th>
                            <th> Other slip</th>
                                    <th>Date of payment</th>
                                </tr>
                            </thead>
                            <?php
                                $sn= 1;
                                foreach($rows as $row):
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $sn?></td>
                                    <td><?php echo $row->pharmacy_name;?></td>
                                    <td><?php echo $row->supretendent_pharmacist;?></td>
                                    <td><?php echo $row->payment_method;?></td>
                            <td><a href="<?php echo 'payments/'.$row->payment_evidence?>" target="_blank"><img src="<?php echo 'payments/'.$row->payment_evidence;?>"></a></td>
                            <td><a href="<?php echo 'payments/'.$row->pcn_payment?>" target="_blank"><img src="<?php echo 'payments/'.$row->pcn_payment;?>" alt="Nil"></a></td>
                                    <td><?php echo date("jS M, Y", strtotime($row->tdate));?></td>                     
                                </tr>  
                            </tbody> 
                            <?php $sn++; endforeach; ?>  
                        </table>
                    </div>
                </div>
                <!-- create users -->
                <div class="details" id="createUsers">
                    <h2>Create new user</h2>
                    <hr>
                    <div class="createUserForm">
                        <form method="POST" action="create_user.php">
                            <input type="text" name="pharmacist" required placeholder="PHARMACIST"><br><br>
                            <input type="tel" name="contact_phone" required placeholder="PHARMACIST PHONE NUMBER"><br><br>
                            <input type="text" name="contact_pcn_reg" required placeholder="PCN REGISTRATION"><br><br>
                            <button type="submit" name="create_user">Create user</button>
                        </form>
                    </div>
                </div>
                <!-- Declined members -->
                <div class="details" id="declinedMembers">
                <h2>Declined member payments</h2>
                    <hr>
                    <?php
                         
                        /* select and insert statements */
                        $declinedMember = $connectdb->prepare("SELECT pharmacy_name, supretendent_pharmacist, tdate FROM payments WHERE payment_status=-1 ORDER BY tdate");
                        $declinedMember->execute();
                        $rows = $declinedMember->fetchAll();
                    ?>
                    <!-- search bar -->
                    <div class="search">
                            <input type="search" name="search" id="searchDecline" class="search" placeholder="Search keyword(s)"><!-- <i class="fas fa-search"></i> -->
                            <!-- <button id="download_user" class="declined_mem">Download</button> -->
                        </div>
                    <table id="declinedTable">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Pharmacy Name</th>
                                <th>Pharmacist</th>
                                <th>Date declined</th>
                            </tr>
                        </thead>
                        <?php
                            $sn= 1;
                            foreach($rows as $row):
                        ?>
                        <tbody>
                        <tr>
                            <td><?php echo $sn?></td>
                            <td><?php echo $row->pharmacy_name;?></td>
                            <td><?php echo $row->supretendent_pharmacist;?></td>
                            <td><?php echo $row->tdate;?></td>
                            
                        </tr>  
                        </tbody> 
                        <?php $sn++; endforeach; ?> 
                         
                    </table>
                </div>
            </section>
        </div>

    </main>
    <script src="jquery.js"></script>
    <script src="jquery.table2excel.js"></script>
    <script src="script.js"></script>
    <script>
        // search payment year
$(document).ready(function(){
    $("#search_year").click(function(){
        let payment_year = document.getElementById("payment_year").value;
        // alert(payment_year);
        
        $.ajax({
            type: "POST",
            url: "search_approved.php",
            data: {payment_year:payment_year},
            success: function(response){
                $(".the_approved").html(response);
            }
        });
        return false;
    });
});
    </script>
    
</body>
</html>
    <?php }else{
        header("Location: member_home.php");
    }