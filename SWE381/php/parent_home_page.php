<?php
require_once 'helpers.php';
require_once 'user.php';
require_once 'db_connection.php';

if (!isLoggedIn()) {
  redirect('index.php');
} else if (isUserTutor()) {
  redirect('tutor_home_page.php');
}

$user = getUser(currentUserId(), $db);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Learn</title>
  <link rel="stylesheet" href="../css/stylesheet.css">

</head>

<body>
<header id="navbar" class="page-header">
             <nav class="navbar-container">
                <!-- logo -->
                      <a href="parent_home_page.php" id="l"><img class="logo" src="../images/Logo.PNG" > </a>
            
                <!-- الزر الي يظهر عند التصغير  -->
                      <button type="button" id="navbar-toggle" aria-controls="navbar-menu"  aria-label="Toggle menu" aria-expanded="false">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
            
                <!--العناصر الي بتوجد في الهيدر + في الزر عند التصغير  -->
                      <div id="navbar-menu" aria-labelledby="navbar-toggle">
                          <ul class="nav__links">
                             <li class="navbar-item"><a href="parent_Home_Page.php" class="nav__link" >Home</a> </li>
                             <li class="navbar-item"><a href="mailto:LearnInfo.sa@gmail.com" class="nav__link">Contact us</a></li>
            
                             <li class="nav-item dropdown">
                                <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">My Bookings ⌄</a>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="current_booking.php">Current Bookings</a></li>
                                  <li><a class="dropdown-item" href="previous_booking.php">Previous Bookings</a></li>
                                </ul>
                              </li>
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                <img src="../images/<?php  echo $user['image']; ?>" alt="My Profile" class="per" style=" width: 10vh; height: 10vh; "> </a>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="parent_profile.php">Manage Profile</a></li>
                                  <!--<li><a class="dropdown-item" href="EditParentProfile.html">Manage Profile</a></li>-->
                                  <li>
                                    <form action="logout.php" method="post">
                                        <input type="submit" style="background: transparent;border: none; display: inline-block !important;
        color: #40405B !important;
        text-align: center !important;
        padding: 14px 16px !important;
        text-decoration: none !important;
        font-size: 18px !important;
        " name="logout" value="Log Out">
                                    </form>
                                </li>
                                </ul>
                              </li>
                              </ul>
                         </div>
                     </nav>
         </header>

  <section class="hero_index" id="hero1-parent">
    <div id="hero1_text-PT">
      <div class="inner">
        <div class="hero1_text">
          <h1>Hello, Parent! </h1>
          <p>we will help you to find an <br>expert tutor for your kid</p>
          <p><a href="post_job_request_parent.php" class="parent_button"><button>Post Request</button> </a></p>
          <p> <a href="request_list_parent.php" class="parent_button"><button>View Request</button> </a></p>
        </div>
      </div>
    </div>
  </section>


  <section class="content" id="aboutus">
    <div class="inner">
      <div class="content_text">

        <h1>how it works</h1>
        <p>Request a tutor and receive a offer list.Then easily choose your tutor,and pay for online classes.</p>

        <div class="steps">
          <div class="step1">
            <img src="../images/step1.png" class="steps-img" alt="step1">
            <h4>Request Tuition</h4>
            <p class="steptext">Tell us about your kid/s and the type of classes <br> and You will get offers from professional tutors </p>
          </div>

          <div class="step2">
            <img src="../images/step2.png" class="steps-img" alt="step2">
            <h4>Choose Your Tutor</h4>
            <p class="steptext">View the list of the tutors who can help you in offer list<br> Browse their profiles, rate and reviews </p>
          </div>

          <div class="step3">
            <img src="../images/step3.png" class="steps-img" alt="step3">
            <h4>Have Online Lessons</h4>
            <p class="steptext"> Have online classes whenever you like <br>and where ever you are</p>
          </div>

        </div>

      </div>
    </div>
    <div class="Features">

      <div class="Feature1">
        <span class="Features-text"> +500 Tutor</span><br>
        <img src="../images/teacher.png" class="Features-img" alt="user icon">
      </div>


      <div class="Feature2">
        <span class="Features-text">Available at anytime</span><br>
        <img src="../images/24-hours.png" class="Features-img" alt="user icon">
      </div>


      <div class="Feature3">
        <span class="Features-text">+15 Subject</span><br>
        <img src="../images/open-book.png" class="Features-img" alt="user icon">
      </div>

      <div class="Feature4">
        <span class="Features-text">Everyone can use the website </span><br>
        <img src="../images/easy.png" class="Features-img" alt="user icon">
      </div>

      <img src="../images/bg1.png" class="back-img" alt="background">
    </div>
  </section>

  <footer class="navbar">
    <p> &copy; 2023 Learn online tutoring platform <br>
      <a href="mailto:LearnInfo.sa@gmail.com" style=" color: #8c7569 ;">Contact Us
        <img src="../images/email_icon.png" alt="Contact Us"></a>
    </p>
  </footer>

  <script src="../js/index.js"></script>
</body>

</html>