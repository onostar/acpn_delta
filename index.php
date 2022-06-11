<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Association of Community Pharmacist of Nigeria (ACPN), Delta chapter is an organisation made up of pharmacy owners in Edo state">
    <meta name="keyword" content="ACPN, pharmacies, pharmacy, pharmacist, medicine, drugs, pharmacology, acpn portal">
    <title>ACPN Delta State</title>
    
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
    <section class="top-header">
        <div class="social_media">
            <a target="_blank" href="#" title="follow us on facebook"><i class="fab fa-facebook"></i></a>
            <a target="_blank" href="#" title="follow us on twitter"><i class="fab fa-twitter"></i></a>
            <a target="_blank" href="#" title="follow us on instagram"><i class="fab fa-instagram"></i></a>
            <a target="_blank" href="#" title="follow us on linkedin"><i class="fab fa-linkedin"></i></a>
        </div>
        <div class="hotline">
            <p><i class="fas fa-phone-alt"></i> +2348033588514, +2347032664418</p>
        </div>
    </section>
    
    <main>
        <div class="contents">
            <div class="bg">
                <img src="images/pharm.jpg" alt="ACPN Delta">
            </div>
            <div class="acpn">
                <div class="pcn">
                    <h1>ASSOCIATION OF COMMUNITY PHARMACISTS OF NIGERIA, DELTA STATE</h1>
                    <img src="acpn_logo.png" alt="acpn Delta state">
                    <h3>Welcome to ACPN Delta State</h3>
                    <div class="select_portal">
                        <a href="member_home.php" title="Login to membership portal" id="memberPortal">Membership Portal</a>
                        <!-- <a href="https://jobs.acpnedo.com" title="Login to Job portal" id="jobPortal">Job Portal</a> -->
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