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
<html>

<head>
  <meta charset="utf-8">
  <title>My Profile</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

  <h1 class="sho-h">My Profile</h1>
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
          <p><span><strong>City</strong></span>: <?php echo $user['city']?> </p>
        </div>
        <br>
        <div class="bio-row">
          <p><span><strong>Email</strong></span>: <?php echo $user['email'] ?></p>
        </div>
        <br>
      </div>

    </div>

  </div>

  </form>

  <div class="modal-buttons">

  <form action="Edit_parent.php" method="post">
 <input type="submit"  class="Edit-button"  value="Edit account">
</forme>
</div>
<br>

<div class="modal-buttons">

    <form action="delete_account.php" method="post">
            <input type="submit" name="delete_tutor" class="delet-button" value="Delete account" onclick="isConfirmed()">
</form>
    </div>
    <br><br>

  <h1 class="sho-h">My Location</h1> <br>
  <div class="cont-sha">
    <div class="Review&rate-sha">
      <div class="rating-pic-sha">
        <img src="../images/Map.png" class="img-map-sh" alt="avatar">
      </div>
    </div>
    <div class="rate-right">

      <div class="Map-pro">

        <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d14490.31773483598!2d46.76233731279185!3d24.775604995502885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e0!4m0!4m5!1s0x3e2efe03c5c74059%3A0x32577608b4d6e9d2!2z2KfZhNit2YXYsdin2KHYjCDYp9mE2LHZitin2LY!3m2!1d24.778346!2d46.7614326!5e0!3m2!1sar!2ssa!4v1672691676502!5m2!1sar!2ssa" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

      </div>
    </div>
  </div>

  <br>

  <footer class="navbar">
    <p> &copy; 2023 Learn online tutoring platform <br>
      <a href="mailto:LearnInfo.sa@gmail.com" style=" color: #8c7569 ;">Contact Us
        <img src="../images/email_icon.png" alt="Contact Us"></a>
    </p>
  </footer>

  <script src="../js/index.js"></script>
  <script type="text/javascript">
            function isConfirmed() {
                let conVal = confirm("Are you ready to confirm Deleteing yore account?");
                if (conVal == true) {
                    document.getElementById("result").innerHTML = "Confirmed !";
                } else {
                    document.getElementById("result").innerHTML = "Cancelled !";
                }
            }
        </script>

</body>


</html>