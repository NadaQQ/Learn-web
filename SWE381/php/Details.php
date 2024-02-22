<?php
require_once 'db_connection.php';
require_once 'helpers.php';
require_once 'offer.php';
require_once 'job_request.php';
require_once 'user.php';

if (!isLoggedIn()) {
    redirect('index.php');
  } else if (isUserTutor()) {
    redirect('tutor_home_page.php');
  }
  
  $user = getUser(currentUserId(), $db);
  $tutor = getTutor($user['id'], $db);
  $ratings = getRatingsByTutorId($tutor['id'], $db);
  
  ?>  


<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <title>Tutor Detail</title>

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


<form action="Details.php" method="post">
        <div class="modal" id="modal-request">
        <h1 class="sho-h">Tutor Profile</h1>
    <div class="shad-pro">
        <div class="picTuter">
            <br>
            <div class="pic-con-sh">
            <img src="../images/<?php  echo $user['image']; ?>"  class="per"><br><br>
                <h2><?php echo $user['first_name'] ?></h2>
                <h2><?php echo $user['last_name'] ?></h2>
            </div>
        </div>

        <div class="infoTuter">
            <br>
            <div class="row">

                <div class="bio-row">
                    <p><span><strong> Gender</strong></span>: <?php echo $tutor['gender'] ?></p>
                </div>
                <br>
                <div class="bio-row">
                    <p><span><strong>ID</strong></span>: <?php echo $tutor['id'] ?></p>
                </div>
                <br>
                <div class="bio-row">
                    <p><span><strong>Age</strong></span>: <?php echo $tutor['age'] ?></p>
                </div><br>
                <div class="bio-row">
                    <p><span><strong>Phone</strong></span>: <?php echo $tutor['phone'] ?></p>
                </div> <br>
                <div class="bio-row">
                    <p><span><strong>City</strong></span>: <?php echo $user['city'] ?> </p>
                </div>
                <br>
                <div class="bio-row">
                    <p><span><strong>Email</strong></span>: <?php echo $user['email'] ?></p>
                </div>
                <br>
                <div class="bio-row">
                    <p><span><strong>Bio</strong></span>: <?php echo $tutor['bio'] ?>.</p>

                </div>
            </div>

        </div>

    </div>
           

        </div>
    </form>



    <footer class="navbar" id="page_footer">
        <p> &copy; 2023 Learn online tutoring platform <br>
            <a href="mailto:LearnInfo.sa@gmail.com" style=" color: #8c7569 ;">Contact Us
                <img src="../images/email_icon.png" alt="Contact Us"></a>
        </p>
    </footer>
    <script src="../js/index.js"></script>
</body>

</html>