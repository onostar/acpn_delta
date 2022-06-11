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
    <meta name="description" content="Association of Community Pharmacist of Nigeria (ACPN), DELTA chapter is an organisation made up of pharmacy owners in Edo state">
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
        #member{
            width:95%;
            margin:40px auto 0 auto;
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
        #member table{
            width:100%;
            margin: 0 auto;
        }
        #member table #member tr, #member th, #member td{
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
        #member table tr button:nth-child(1), #member table tr button:nth-child(2){
            display:inline;
            margin:2px 3px;
            padding:2px;
            cursor:pointer;
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
        .member_profile{
            width:80%;
            margin:20px auto;
            padding:10px;
            box-shadow:2px 2px 5px 2px rgb(20, 73, 73);
            border:1px solid rgb(18, 109, 109);
            border-radius:5px;
            animation: .5s zoomin 1;
            animation-fill-mode: forwards;
        }
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
            box-shadow:2px 2px 5px 2px rgb(20, 73, 73);
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
            text-transform:uppercase;
        }
        .profile table tr td span{
            text-transform:capitalize;
            /* padding:5px;
            background:#f0eaea;
            border-radius:5px;
            width:50%; */
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
            .top-header .social-media{
                margin-left:0;
            }
            .top-header .social-media a{
                font-size:1.1rem;
            }
            .user .logout{
                left:0vw;
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
                font-size:2.5rem;
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
            .profile .pharmInfo{
                flex-wrap:nowrap;
            }
            .pharmInfo p{
                font-size:1rem;
            }
        }
    </style>
</head>
<body>
    
    <header>
        <h1>
            <a href="admin.php">
                <img src="acpn_logo.png" alt="acpn">
                <div class="all_title">
                    <div class="title">ACPN</div>
                    <p class="sub">DELTA STATE</p>
                
                </div>
        </a>
        <h2>ASSOCIATION OF COMMUNITY PHARMACIST OF NIGERIA, DELTA CHAPTER</h2>
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
                <button class="btn" id="approveMembers" >Confirm payment</button>
                <button class="btn" id="approvedBtn">Approved members</button>
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
                <!-- <div class="summary">
                    <div class="sum" id="newReg">
                    <?php 
                        /* $general = "SELECT * FROM users WHERE username != 'admin'";
                        $sql_generalMembers = mysqli_query($connectdb, $general) or die(mysqli_error($connectdb));

                        $count = mysqli_num_rows($sql_generalMembers); */
                    ?>
                        <p class="description">Registered members</p>
                        <div class="figures">
                            <i class="fas fa-tags"></i>
                            <p name="new_members" id="new_members"><?php /* echo $count */ ?></p>
                        </div>
                    </div>
                    <div class="sum" id="declined">
                        <?php
                            /* $membersPayment = "SELECT * FROM payments WHERE payment_status = 0";

                            $sql_membersPayment = mysqli_query($connectdb, $membersPayment);

                            $countPayment = mysqli_num_rows($sql_membersPayment); */
                        ?>
                        <p class="description">Payment Submitted</p>
                        <div class="figures">
                            <i class="fas fa-money-bill-alt"></i>
                            <p name="new_members"><?php /* echo $countPayment */ ?></p>
                        </div>
                    </div> 
                    <div class="sum" id="approved">
                        <?php
                            /* $membersApproved = "SELECT * FROM payments WHERE payment_status = 1";

                            $sql_membersApproved = mysqli_query($connectdb, $membersApproved);

                            $countApproved = mysqli_num_rows($sql_membersApproved); */
                        ?>
                        <p class="description">Approved members</p>
                        <div class="figures">
                            <i class="fas fa-user-check"></i>
                            <p name="new_members"><?php /* echo $countApproved */ ?></p>
                        </div>
                    </div>
                </div>-->
                <div id="member">
                    <h2>Member profile</h2>
                    <hr>
                    <div class="member_profile">    
                        <?php
                            if(isset($_GET['profile'])){
                                $userProfile = $_GET['profile'];
                                
                                $profile = "SELECT * FROM users WHERE pharmacist = '$userProfile'";
                                $sql_profile = mysqli_query($connectdb, $profile) or die(mysqli_error($connectdb));

                                while($rowss = mysqli_fetch_array($sql_profile)):
                            
                        ?>
                        <div class="profile">
                            <div class="head">
                                <div class="pharmInfo">
                                    <i class="fas fa-home"></i>
                                    <div class="more">
                                        <p><?php echo $rowss['pharmacy_name'];?></p>
                                        <p><?php echo $rowss['pharmacy_address'];?></p>
                                    </div>
                                </div>
                                <figure>
                                    <img src="<?php echo 'users/'.$rowss['pharmacist_passport'];?>" alt="<?php echo $rowss['pharmacist'];?>">
                                    <figcaption><?php echo $rowss['pharmacist'];?></figcaption>
                                </figure>
                            </div>
                            <table>
                                <tr>
                                    <td>Gender: <span><?php echo $rowss['contact_gender'];?></span></td>
                                    <td>Date of Birth: <span><?php echo $rowss['contact_birth_date'];?></span></td>
                                </tr>
                                <tr>
                                    <td>Contact number: <span><?php echo $rowss['username'];?></span></td>
                                    <td>Email: <span><?php echo $rowss['pharmacist_email'];?></span></td>
                                </tr>
                                <tr>
                                    <td>Residential Address: <span><?php echo $rowss['pharmacist_address'];?></span></td>
                                    <td>PCN: <span><?php echo $rowss['contact_pcn_reg'];?></td>
                                </tr>
                                <tr>
                                    <td>Next of Kin: <span><?php echo $rowss['contact_next_of_kin'];?></span></td>
                                    <td>Next of Kin Contact: <span><?php echo $rowss['contact_next_of_kin_phone'];?></td>
                                </tr>
                                <tr>
                                    <td>Pharmacy type: <span><?php echo $rowss['pharmacy_exist'];?></span></td>
                                    <td>Pharmacy Location: <span><?php echo $rowss['pharmacy_location'];?></td>
                                </tr>
                                <tr>
                                    <td>Pharmacy practice type: <span><?php echo $rowss['practice_type'];?></span></td>
                                    <td>Pharmacy Director: <span><?php echo $rowss['pharmacy_director'];?></td>
                                </tr>
                            </table>
                        </div>
                        <?php endwhile;?>
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
                            $acceptMembers = "SELECT id, registration_date, pharmacy_name, pharmacy_address, pharmacist, username, registration_number FROM users WHERE username != 'admin' ORDER BY registration_date DESC";
                            $sql_acceptMembers = mysqli_query($connectdb, $acceptMembers) or die(mysqli_error($connectdb));
                            
                        ?>
                        <!-- <form mthod="GET" ation="admin.php">
                            <input type="search" name="search_pharmacy" placeholder="Search Pharmacy">
                            <button type="submit" name="search_submit">Search</button>
                        </form> -->
                        <table>
                            <tr>
                                <th>S/N</th>
                                <th>Reg Date</th>
                                <th>Pharmacy Name</th>
                                <th>Pharmacy Address</th>
                                <th>Supritendent Pharmacist</th>
                                <th>Supritendent contact</th>
                                <th>RC Number</th>
                                
                            </tr>
                            <?php
                            $serial = 1;
                            while($row = mysqli_fetch_array($sql_acceptMembers)):
                            ?>
                            
                            <tr>
                                <td><button style="padding:4px 10px; color:#fff; border:none; background:#c4c4c4;" onclick="displayMemberProfile('<?php echo $row['pharmacist'];?>')"><?php echo $serial;?></button></td>
                                <td><?php echo $row['registration_date'];?></td>
                                <td><?php echo $row['pharmacy_name'];?></td>
                                <td><?php echo $row['pharmacy_address'];?></td>
                                <td><?php echo $row['pharmacist'];?></td>
                                <td><?php echo $row['username'];?></td>
                                <td><?php echo $row['registration_number'];?></td>
                                
                            </tr>   
                            <?php $serial++; endwhile; ?>                 
                    </table>
                </div> 
                <div class="details" id="approvedMembers">
                    <h2>Confirm payment</h2>
                    <hr>
                    <?php
                         
                        /* select and insert statements */
                        $confirmPayment = "SELECT id, pharmacy_name, depositor_name, depositor_position, supretendent_pharmacist, bank, payment_ref FROM payments WHERE payment_status=0 ORDER BY tdate DESC";
                        $sql_confirmPayment = mysqli_query($connectdb, $confirmPayment) or die(mysqli_error($connectdb));
                    ?>
                    <table>
                        <tr>
                            <th>S/N</th>
                            <th>Pharmacy</th>
                            <th>Depositor</th>
                            <th>Depositor Title</th>
                            <th>Supretendent Pharmacist</th>
                            <th>Bank</th>
                            <th>Ref Number</th>
                            <th>Action</th>
                        </tr>
                        <?php $c = 1;
                        while( $row = mysqli_fetch_array($sql_confirmPayment)):
                        ?>
                        
                        <tr>
                            <td><?php echo $c;?></td>
                            <td><?php echo $row['pharmacy_name'];?></td>
                            <td><?php echo $row['depositor_name'];?></td>
                            <td><?php echo $row['depositor_position'];?></td>
                            <td><?php echo $row['supretendent_pharmacist'];?></td>
                            <td><?php echo $row['bank'];?></td>
                            <td><?php echo $row['payment_ref'];?></td>
                            <td>
                                <a href="javascript:void(0);">
                                    <button style="padding:5px; color:#fff;" type ="button"  onclick="approvePayments('<?php echo $row['id'];?>')">Approve</button>
                                </a>
                               
                            </td>
                        </tr>   
                        <?php $c = $c+1; endwhile;?>  
                    </table>
                </div>
                <div class="details" id="paidMembers">
                <h2>Approved members</h2>
                    <hr>
                    <?php
                         
                        /* select and insert statements */
                        $approvedMember = "SELECT pharmacy_name, supretendent_pharmacist, tdate FROM payments WHERE payment_status=1 ORDER BY tdate";
                        $sql_approvedMember = mysqli_query($connectdb, $approvedMember) or die(mysqli_error($connectdb));
                    ?>
                    <table>
                        <tr>
                            <th>SN</th>
                            <th>Pharmacy Name</th>
                            <th>Supretendent Pharmacy</th>
                            <th>Date of payment</th>
                        </tr>
                        <?php
                            $sn= 1;
                            while($row = mysqli_fetch_array($sql_approvedMember)):
                        ?>
                        
                        <tr>
                            <td><?php echo $sn?></td>
                            <td><?php echo $row['pharmacy_name'];?></td>
                            <td><?php echo $row['supretendent_pharmacist'];?></td>
                            <td><?php echo $row['tdate'];?></td>
                            
                        </tr>   
                        <?php $sn++; endwhile; ?>  
                    </table>
                </div>
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
            </section>
        </div>

    </main>
    <script src="jquery.js"></script>
    <script src="script.js"></script>
    <script>
        $(document).ready(function(){
            $("#menu").click(function(){
                $("aside").toggle();
            })
        })

        /* display create new users */
        $(document).ready(function(){
            $("#createBtn").click(function(){
                $("#createUsers").toggle();
                document.getElementById('acceptMembers').style.display ="none";
                document.getElementById('approvedMembers').style.display ="none";
                document.getElementById('paidMembers').style.display ="none";
                document.querySelector('.summary').style.display = "none";
                document.getElementById('member').style.display = "none";
            });
        });

        function displayMemberProfile(id){
            window.open("member_profile.php?profile="+id,"_parent");
            return;
        }
    </script>
</body>
</html>
    <?php }else{
        header("Location: index.php");
    }