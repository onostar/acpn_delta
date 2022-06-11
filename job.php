<?php
    session_start();
    include "job/server/server.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ACPN Edo state job portal is a platform for Edo state based Pharmacist to check for vacancies, apply for jobs and post job opportunities ">
    <meta name="keyword" content="acpn, edo, acpn edo, job application, job portal, pharmacist, vacancies">
    <title>ACPN Edo Job portal</title>
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.1-web/css/all.min.css">
    <link rel="icon" type="image/png" href="images/acpn_logo.png" size="32X32">
    <link rel="stylesheet" href="job/style.css">

</head>
<body>
    <div class="top_head">
        <p><marquee><strong>Note:</strong> R & G (Register and Go) fronting and Other malpractices are prohibited on this plaftorm</marquee></p>
    </div>
    <header id="mainHeader">
        <h1>
            <a href="index.php">
            <img src="images/acpn_logo.png" alt="ACPN edo state">
            <div class="title">ACPN EDO<span>Job Portal</span></div>
            </a>
        </h1>
       <nav id="navigation">
           <ul>
               <li><a href="login.php" title="Sign into your account">eMPLOYER Log in</a></li>
               <li><a href="signup.php" title="Create an account">sign up</a></li>
               <!-- <li id="contact"><a href="contact.php" title="get in touch">POST A JOB</a></li> -->
           </ul>
       </nav>
    </header>
    <div id="slider">
        <div class="slides">
            <div class="slide">
                <div class="banner_img">
                    <img src="images/pharma.jpg" alt="ACPN Edo pharmacist">
                </div>
                <div class="taglines">
                    <h2>Achieve your dream as a Pharmacist</h2>
                    <p>Get a professional and secure job as a pharmacist in your neighbourhood</p>
                    <div class="btns">
                        <a href="javascript:void(0);">Get Started</a>
                        <!-- <a href="contact.html">Get a Quote</a> -->
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="banner_img">
                    <img src="images/pharm2.jpg" alt="ACPN Edo">
                </div>
                <div class="taglines taglines2">
                    <h2>Get Professional Pharmacist</h2>
                    <p>We dont just offer a better healthcare, but a better health care experience</p>
                    <div class="btns">
                        <a href="#">Find an Applicant</a>
                        <a href="#">Contact us</a>
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="banner_img">
                    <img src="images/pharm3.jpg" alt="ACPN Edo">
                </div>
                <div class="taglines taglines3">
                    <h2>Lets all mask up</h2>
                    <p>Keeping you safe. We offer you tips on how to manage stay safe during this pandemic. </p>
                    <div class="btns">
                        <a href="#">Learn more</a>
                        <a href="#">Visit us today</a>
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="banner_img">
                    <img src="images/slider_4.jpg" alt="ACPN Job portal">
                </div>
                <div class="taglines taglines2">
                    <h2>Offering great opportunities to the community pharmacist</h2>
                    <p></p>
                    <div class="btns">
                        <a href="#">make enquiries</a>
                        <a href="#">visit us today</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="search">
            <form id="searchJobForm" method="POST" action="search_jobs.php">
                <select name="job_title" id="job_title">
                    <option value=""selected>Job Title</option>
                    <option value="Locum Pharmacist">Locum Pharmacist</option>
                    <option value="Supretendent Pharmacist">Supretendent Pharmacist</option>
                    <option value="Post NYSC Job">Post-NYSC Job</option>
                    <option value="NYSC Job">NYSC Job</option>
                    <option value="Post-Internship">Post-Internship</option>
                    <option value="Internship">Internship</option>
                    <option value="Pre-Internship">Pre-Internship</option>
                    <option value="Holiday Jobs">Holiday Jobs</option>
                </select>
                <select name="job_location">
                    <option value="" selected>Location</option>
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
                <button type="submit" name="search_job" id="search">Search job</button>
            </form>
        </div> 
    </div>

    <section id="jobs">
        <div class="success">
        
            <?php
                if(isset($_SESSION['success'])){
                    echo "<p style='backgroud:green; color:white; text-align:center; margin:20px auto;
                    font-size:1rem;
                    padding:5px;'>" . $_SESSION['success'] . "</p>";
                    unset($_SESSION['success']);
                }
                
            ?>
        </div>
        <div class="error">
            <?php
                if(isset($_SESSION['error'])){
                    echo "<p style='background:red; color:white; text-align:center; margin:20px 0;
                    font-size:1rem;
                    padding:5px;'>" . $_SESSION['error'] . "</p>";
                    unset($_SESSION['error']);
                }
            ?>
        </div>
        <h2>Find the best Job for your career</h2>
        <hr>
        <div class="posted_jobs">
            <!-- <div class="vacancies" id="featured">
                <h3>Featured Jobs <i style="color:rgb(216, 139, 67);" class="fas fa-briefcase"></i></h3>
                <hr>
                <div class="feat_jobs">

                </div>
            </div> -->
            <div class="vacancies" id="new">
                <h3>Newly Added Jobs <i style="color:rgb(216, 139, 67);" class="fas fa-briefcase"></i></h3>
                <hr>
                <div class="no_jobs">
                    <?php
                        $show_jobs = $connectdb->prepare("SELECT jobs.contact_email, jobs.pharmacy_name, jobs.qualifications, jobs.job_title, jobs.experience, jobs.salary, jobs.job_id, employers.contact_email, employers.pharmacy_logo, employers.pharmacy_location FROM jobs, employers WHERE jobs.approved = 1 AND jobs.contact_email = employers.contact_email");
                        $show_jobs->execute();

                        if(!$show_jobs->rowCount() > 0){
                            echo "<p style='text-align:center;padding:10px; background:rgb(95, 197, 197); font-size:1.1rem; color:#fff;'>There are currently no jobs available.<br>Kindy check back!</p>";
                        }
                    ?>
                </div>
                <div class="new_jobs">
                    <?php
                        

                        $views = $show_jobs->fetchAll();
                        foreach($views as $view):
                    ?>
                    <div class="job">
                        <a href="javascript:void(0);" onclick="viewJob('<?php echo $view->job_id;?>')" title="click to view details">
                            <div class="pharm_logo">
                                <img src="<?php echo 'logos/'. $view->pharmacy_logo;?>" title="<?php echo $view->pharmacy_name;?>">
                            </div>
                            <div class="job_summary">
                                <p><strong><?php echo $view->job_title;?></strong></p>
                                <p><?php echo $view->pharmacy_name;?></p>
                                <p><?php echo strtoupper($view->qualifications);?></p>
                                <p><?php echo $view->experience;?> Experience</p>
                                <p><?php echo $view->salary;?> <span class="view">Apply</span></p>
                            </div>
                        </a>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
            <!-- <div class="vacancies" id="popular">
                <h3>Popular Jobs <i style="color:green" class="fas fa-star"></i></h3>
                <hr>
                <div class="popular_jobs">

                </div>
            </div> -->
        </div>
    </section>

   <script src="jquery.js"></script>
   <script src="script.js"></script>
</body>
</html>