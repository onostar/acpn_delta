<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Association of Community Pharmacist of Nigeria (ACPN), Delta chapter is an organisation made up of pharmacy owners in Edo state">
    <meta name="keyword" content="ACPN, pharmacies, pharmacy, pharmacist, medicine, drugs, pharmacology, acpn portal">
    <title>ACPN Delta state</title>
    
    <link rel="icon" type="image/png" href="acpn_logo.png" size="32X32">
    <link rel="stylesheet" href="all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
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
        
        .main_form{
            position:relative;
            top:0vh;
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
            width:40%;
            margin:0;
        }
        .reg_form button a{
            color:#fff;
            padding:10px;
        }
        /* .new_password .btn-float{
            display:flex;
            justify-content:center;
        } */
        /* .new_member button{
            margin:0;
        } */
        .new_member p{
            text-align:left;
            color:red;
            font-size:1.4rem;
            margin:0;
            padding:0;
        }
        .status p{
            text-decoration:underline;
            color:red;
            font-size:1.1rem;
        }
        @media screen and (max-width:800px){
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
                height:80vh;
            }
            .main_form{
                margin:50px auto;
                width:80%;
            }
            .new_password{
                width:80%;
            }
            .new_member p{
                font-size:1.2rem;
            }

        }
    </style>
</head>
<body>
    <!-- <section class="top-header">
        <div class="social_media">
            <a target="_blank" href="#" title="follow us on facebook"><i class="fab fa-facebook"></i></a>
            <a target="_blank" href="#" title="follow us on twitter"><i class="fab fa-twitter"></i></a>
            <a target="_blank" href="#" title="follow us on instagram"><i class="fab fa-instagram"></i></a>
            <a target="_blank" href="#" title="follow us on linkedin"><i class="fab fa-linkedin"></i></a>
        </div>
        <div class="hotline">
            <p><i class="fas fa-phone-alt"></i> +2348033588514, +2347032664418</p>
        </div>
    </section> -->
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
        <h2>MEMBERSHIP PORTAL</h2>
        
    </header>
    <main>
        <div class="contents">
            <div class="bg">
                <img src="images/pharmacy.jpg" alt="form background">
            </div>
            <div class="reg_form">
                <div class="change">
                    <p>
                        
                    </p>
                </div>
                <div class="main_form">
                    <p>Enter login details</p>
                    <hr>
                    <div class="new_password">
                        <div class="status">
                            <p>
                                <?php
                                    if (isset($_SESSION['status'])){
                                        echo $_SESSION['status'];
                                        unset($_SESSION['status']);
                                    }
                                ?>
                                <?php
                                    if(isset($_SESSION['msg'])){
                                        echo $_SESSION['msg'];
                                        unset($_SESSION['msg']);
                                    }

                                    if(isset($_SESSION['change'])){
                                        echo $_SESSION['change'];
                                        unset($_SESSION['change']);
                                    }
                                    

                                    
                                ?>
                            </p>
                        </div>
                        <form class="login_form" action="login.php" method="POST">
                            <p style="font-weight:bold; font-size:1.1rem; color:green;">
                                <?php
                                    if(isset($_SESSION['success'])){
                                        echo $_SESSION['success'];
                                        unset($_SESSION['success']);
                                    }
                                    if(isset($_SESSION['error'])){
                                        echo $_SESSION['error'];
                                        unset($_SESSION['error']);
                                    }
                                ?>
                            </p>
                            <input type="text" name="username" placeholder="username" required><br><br>
                            <input type="password" name="user_password" placeholder="password"><br><br>
                            <div class="get_in">
                                <button type="submit" name="login">Login <i class="fas fa-sign-in-alt"></i></button>
                                <a href="forget_password.php">Forget Password?</a>
                            </div>
                            
                            <div class="new_member">
                                <p>Don't have an Account?</p>
                                <button><a href="register.php">Register <i class="fas fa-paper-plane"></i></a></button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer">
        <p>All Rights Reserved &copy; <?php echo date("Y"); ?> ACPN, Delta state. Powered by <a href="https://appliedmacros.com">Applied Macrosystems</a></p>
    </footer>
</body>
</html>