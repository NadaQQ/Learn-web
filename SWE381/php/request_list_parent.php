<?php
require_once 'db_connection.php';
require_once 'helpers.php';
require_once 'job_request.php';
require_once 'user.php';

if (!isLoggedIn()) {
   redirect('index.php');
} else if (isUserTutor()) {
   redirect('tutor_home_page.php');
}

if (isset($_POST['cancel'])) {
   deleteJobRequest($_POST['id'], $db);
}

$user_id = currentUserId();
$user = getUser(currentUserId(), $db);
$job_requests = getJobRequestByParentId($user_id, $db);
?>


<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <title>Request list</title>

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
         
   <div class="request" id="req">
      <div class="back-button"><a href="parent_home_page.php"><button type="submit">&lt;</button></a></div>
      <h2 id="heading">Request List</h2>
      <?php
      if (count($job_requests) === 0) {
         echo '<h1>You don\'t have any requests yet</h1>';
      } else
         foreach ($job_requests as $request) {
            $edit_delete_buttons = '';
            if ($request['status'] === 'pending') {
               $edit_delete_buttons = '
            <div>
               <div class="request-button">
                     <button type="submit">Edit</button>
               </div>
               <div class="request-button2">
                  <form action="request_list_parent.php" method="post">
                     <input type="hidden" name="id" value="' . $request['id'] . '"/>
                     <button name="cancel" type="submit">Cancel</button>
                  </form>
               </div>
            </div>';
            }
            echo '
            <div class="request-block">
            <div class="ID">
            <h4>' . $request['id'] . '</h4>
            </div>
            <div class="request-button">
            <a href="offer_list_parent.php?request_id=' . $request['id'] . '"><button>offer</button></a>
            ' . $edit_delete_buttons . '
         </div>
         <div>
            <p class="request-p">
               Kid\'s Name: <span>' . $request['name'] . '</span>
               Kid\'s Age: <span> ' . $request['age'] . ' years old</span>
               Type Of Class: <span> ' . $request['type_of_class'] . '</span>
               Start Date - End Date: <span> ' . date('d/m/Y', strtotime($request['start_date'])) . ' - ' . date('d/m/Y', strtotime($request['end_date'])) . '</span>
               Start Time - End Time: <span> ' . date('h:m a', strtotime($request['start_time'])) . ' - ' . date('h:m a', strtotime($request['end_time'])) . '</span>
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