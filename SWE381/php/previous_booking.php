<?php
require_once 'helpers.php';
require_once 'db_connection.php';
require_once 'job_request.php';
require_once 'user.php';

if (!isLoggedIn()) {
  redirect('index.php');
} else if (isUserTutor()) {
  redirect('tutor_home_page.php');
}

$user = getUser(currentUserId(), $db);
$job_requests = getPreviousJobRequestsByParentId(currentUserId(), $db);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">

  <link rel="stylesheet" href="../css/stylesheet.css">
  <title>My Booking</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
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
         
  <h1 class="sho-h">My Previous Bookings</h1><br><br>

  <?php
  if (count($job_requests) === 0) {
    echo '<h1 style="text-align: center;">You don\'t have any booking yet</h1>';
  } else
    foreach ($job_requests as $job) {
      echo '
      <div class=" shad">
    <div class="picTuter"> <br>
      <div class="pic-con-sh">
        <img src="' . ($job['image'] ?? '../images/person_icon.png') . '" alt="personal pic" class="per"><br>
        <h2>num: #' . $job['tutor_id'] . '</h2>
      </div>
    </div>
    <div class="btn-p-b"><button class="button-review" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">write a review</button></div>
    <div class="infoTuter">
      <br>
      <div class="row">
        <h4><strong>Tutor\'s Name:</strong> ' . $job['first_name'] . ' ' . $job['last_name'] . ' </h4>
        <h5>Price: ' . $job['price'] . ' SR</h5>
        <div class="bio-row">
          <p><span><strong> Kid\'s Name:</strong></span> ' . $job['name'] . '</p>
        </div> <br>
        <div class="bio-row">
          <p><span><strong>Kid\'s Age:</strong></span> ' . $job['age'] . ' years old</p>
        </div><br>
        <div class="bio-row">
          <p><span><strong>Type Of Classes :</strong></span> ' . $job['type_of_class'] . '</p>
        </div><br>
        <div class="bio-row">
          <p><span><strong>Start Date - End Date:</strong></span> ' . date('d/m/Y', strtotime($job['start_date'])) . ' - ' . date('d/m/Y', strtotime($job['end_date'])) . '</p>
        </div> <br>
        <div class="bio-row">
          <p><span><strong>Duration:</strong></span> ' . date('h:m a', strtotime($job['start_time'])) . ' - ' . date('h:m a', strtotime($job['end_time'])) . '</p>
        </div>
      </div>


      <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" herf="">X</button>
            </div>
            <div class="modal-body">

              <h4 style="text-align: center;">How was your experience?</h4>
              <input type="text" id="form3Example4cd" class="form-control" placeholder="Title">

              <label class="form-label" for="exampleFormControlTextarea1">Leave Your Review!</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>

              <div class="star-rating" id="star-rating">
                <div class="star-input">
                  <input type="radio" name="rating" id="rating-5">
                  <label for="rating-5" class="fa fa-star "></label>
                  <input type="radio" name="rating" id="rating-4">
                  <label for="rating-4" class="fa fa-star "></label>
                  <input type="radio" name="rating" id="rating-3">
                  <label for="rating-3" class="fa fa-star "></label>
                  <input type="radio" name="rating" id="rating-2">
                  <label for="rating-2" class="fa fa-star "></label>
                  <input type="radio" name="rating" id="rating-1">
                  <label for="rating-1" class="fa fa-star "></label>

                  <!-- Rating Submit Form -->
                  <form>
                    <span class="rating-reaction"></span>
                    <button type="submit" class="button-review" style="width: 100%;">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>

  </div>
      ';
    }
  ?>

<footer class="navbar" id="page_footer" style=" background-color: rgba(255, 253, 253, 0);">
<p> &copy; 2023 Learn online tutoring platform <br>
      <a href="mailto:LearnInfo.sa@gmail.com" style=" color: #8c7569 ;">Contact Us
        <img src="../images/email_icon.png" alt="Contact Us"></a>
    </p>
  </footer>

  <script src="../js/index.js"></script>

</body>

</html>