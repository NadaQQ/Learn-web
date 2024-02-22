<?php
session_start();
require_once 'helpers.php';
require_once 'db_connection.php';
require_once 'offer.php';
 require_once 'user.php';

if (!isLoggedIn()) {
    redirect('index.php');
} else if (isUserParent()) {
    redirect('parent_home_page.php');
}

if (isset($_POST['submit'])) {
    createOffer(
        $_POST['price'],
        $_SESSION['job_request_id'],
        currentUserId(),
        $db
    );

   
    $user = getUser(currentUserId(), $db);
    alertMessage('Offer created Successfully');
    redirect('view_job_request_tutor.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Post Job Request</title>

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

    <form action="add_offer.php" method="post">
        <div class="modal" id="modal-request">

            <div class="modal-left" id="modal-left-req">
                <h1>New Offer</h1>
                <p class="p">Please fill up your price :</p>

                <div class="input-block">
                    <label class="input-label">Price:</label>
                    <input name="price" type="number" placeholder="Price">
                </div>

                <div class="modal-buttons">
                    <input type="submit" name="submit" class="input-button" value="Send">
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