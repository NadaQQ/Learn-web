<?php
require_once 'helpers.php';
require_once 'user.php';
require_once 'tutor.php';
require_once 'rating.php';
require_once 'db_connection.php';

if (!isLoggedIn()) {
    redirect('index.php');
} else if (isUserParent()) {
    redirect('parent_home_page.php');
}

$user = getUser(currentUserId(), $db);
$tutor = getTutor($user['id'], $db);
$ratings = getRatingsByTutorId($tutor['id'], $db);

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
    <div class="modal-buttons">
    <form action="Edit_tutor.php" method="post">
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

    <h1 class="sho-h">My Ratings and Reviews:</h1> <br>
    <div class="cont-sha">
        <div class="Review&rate-sha">
            <div class="rating-pic-sha">
                <img src="../images/rating.png" class="img-rate-sh" alt="avatar">
            </div>

            <div class="page2-sh">

                <div class="profile-content">
                    <?php
                    if (count($ratings) === 0) {
                        echo '<h1>You don\'t have any ratings yet</h1>';
                    } else
                        foreach ($ratings as $rating) {
                            $ratings_ = '';
                            for ($i = 0; $i < 5; $i++) {
                                if ($i < $rating['rate']) {
                                    $ratings_ .= '<span class="fa fa-star checked"></span>';
                                } else {
                                    $ratings_ .= '<span class="fa fa-star"></span>';
                                }
                            }
                            echo '
                            <article class="rate-pro-shad">
                        <div class="ratings-sh">
                            ' . $ratings_ . '
                        </div>
                        <div class="title-rate-sh">
                            <h4>' . $rating['title'] . '</h4>
                            <p>' . $rating['review'] . '</p>
                        </div>

                    </article>';
                        }
                    ?>
                </div>
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