<?php
require_once 'helpers.php';

require_once 'user.php';

if (isLoggedIn()) {
  if (isUserParent()) {
    redirect('parent_home_page.php');
  } else {
    redirect('tutor_home_page.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Learn</title>
  <meta name="description" content="Request a tutor and receive a offer list.Then easily choose your tutor,and pay for online classes.">
  <meta name="keyword" content="Learn, Tutor, online classes, student, online tutoring platform ,easy learning">
  <link rel="stylesheet" href="../css/stylesheet.css">
</head>

<body>
  <?php require_once 'header.php' ?>


  <section class="hero_index" id="hero1">
    <div class="inner">
      <div class="hero1_text">
        <h1>online tutoring </h1>
        <p>Every Day is a Chance to Learn !<br>
          we will help you find an expert tutor for your learn requests</p>
        <a href="sign_up_as.php" class="Join_button"><button>Join us</button> </a>
      </div>
    </div>
  </section>


  <section class="content" id="aboutus">
    <div class="inner">
      <div class="content_text">

        <h1>how it works</h1>
        <p>Request a tutor and receive an offer list. Then easily choose your tutor, and pay for online classes.</p>

        <div class="steps">
          <div class="step1">
            <img src="../images/step1.png" class="steps-img" alt="step-icon">
            <h4>Request Tuition</h4>
            <p class="steptext">Tell us about your kid/s and the type of classes <br> and You will get offers from professional tutors </p>
          </div>

          <div class="step2">
            <img src="../images/step2.png" class="steps-img" alt="step-icon">
            <h4>Choose Your Tutor</h4>
            <p class="steptext">view the list of the tutors who can help you in offer list<br> Browse their profiles, rate and reviews </p>
          </div>

          <div class="step3">
            <img src="../images/step3.png" class="steps-img" alt="step-icon">
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