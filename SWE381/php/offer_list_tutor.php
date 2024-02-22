<?php
require_once 'helpers.php';
require_once 'db_connection.php';
require_once 'offer.php';
require_once 'user.php';


if (!isLoggedIn()) {
   redirect('index.php');
} else if (isUserParent()) {
   redirect('parent_home_page.php');
}

$user = getUser(currentUserId(), $db);
$offers = getOffersByTutorId(currentUserId(), $db);
?>
<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <title>Offer List</title>

   <link rel="stylesheet" href="../css/stylesheet.css">
</head>

<body>

<header id="navbar" class="page-header">
                <nav class="navbar-container">
        <!-- logo -->
              <a href="tutor_home_page.php" id="l"><img class="logo" src="../images/Logo.PNG" alt="logo" > </a>
    
        <!-- الزر الي يظهر عند التصغير  -->
              <button type="button" id="navbar-toggle" aria-controls="navbar-menu"  aria-label="Toggle menu" aria-expanded="false">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
    
        <!--العناصر الي بتوجد في الهيدر + في الزر عند التصغير  -->
              <div id="navbar-menu" aria-labelledby="navbar-toggle">
                  <ul class="nav__links">
                     <li class="navbar-item"><a href="tutor_home_page.php" class="nav__link" >Home</a> </li>
                     <li class="navbar-item"><a href="mailto:LearnInfo.sa@gmail.com" class="nav__link">Contact us</a></li>
    
                     <li class="nav-item dropdown">
                        <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">My Jobs ⌄</a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="current_jobs.php">Current Jobs</a></li>
                          <li><a class="dropdown-item" href="previous_job.php">Previous Jobs</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">

                        <img src="../images/<?php echo $user['image']; ?>" alt="My Profile" class="per" style=" width: 10vh; height: 10vh; "> </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="tuter_profile.php">Manage Profile</a></li>
                         <!-- <li><a class="dropdown-item" href="EditParentProfile.html">Manage Profile</a></li>-->
                          <li>
                            <form action="logout.php" method="post">
                                <input type="submit" style="background: transparent;border: none; display: inline-block !important;
        color: #40405B !important;
        text-align: center !important;
        padding: 14px 16px !important;
        text-decoration: none !important;         
        font-size: 18px !important;" name="logout" value="Log Out">
                            </form>
                          </li>
                        </ul>
                      </li>
    
                  </ul>
                 </div>
             </nav>
            </header>

   <div class="request" id="req">
      <div class="back-button"><a href="tutor_home_page.php"><button type="submit">&lt;</button></a></div>
      <h2 id="heading">Offers list</h2>
      <?php
      if (count($offers) === 0) {
         echo '<h1>You don\'t have any offers yet</h1>';
      } else
         foreach ($offers as $offer) {
            $can_offer_without_conflict = true;
            echo '
            <div class="request-block">
            <img src="../images/ '. $offer['image'] .'" alt="personal pic" class="peroffer">
         <div>
            <p class="request-p">
               Parent:<span> ' . $offer['first_name'] . ' ' . $offer['last_name'] . '</span>
               Kid\'s Name: <span>' . $offer['name'] . '</span>
               Kid\'s Age: <span> ' . $offer['age'] . ' years old</span>
               Type Of Class: <span> ' . $offer['type_of_class'] . '</span>
               Start Date - End Date: <span> ' . date('d/m/Y', strtotime($offer['start_date'])) . ' - ' . date('d/m/Y', strtotime($offer['end_date'])) . '</span>
               Start Time - End Time: <span> ' . date('h:m a', strtotime($offer['start_time'])) . ' - ' . date('h:m a', strtotime($offer['end_time'])) . '</span>
               My offer: <span> ' . $offer['price'] . ' SR</span>
               Status: <span> ' . $offer['status'] . '</span>
            </p>
         </div>

      </div>';
         }
      ?>
   </div>

   <footer class="navbar" id="page_footer" style=" background-color: rgba(255, 253, 253, 0);">
      <p> &copy; 2023 Learn online tutoring platform <br>
         <a href="mailto:LearnInfo.sa@gmail.com" style=" color: #8c7569 ;">Contact Us
            <img src="../images/email_icon.png" alt="Contact Us"></a>
      </p>
   </footer>

   <script src="../js/index.js"></script>
</body>

</html>