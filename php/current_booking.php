<?php
require_once 'helpers.php';
require_once 'db_connection.php';
require_once 'job_request.php';

if (!isLoggedIn()) {
  redirect('index.php');
} else if (isUserTutor()) {
  redirect('tutor_home_page.php');
}

$job_requests = getCurrentJobRequestsByParentId(currentUserId(), $db);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/stylesheet.css">
  <title>My Booking</title>
</head>

<body>

  <?php require_once 'header.php' ?>

  <h1 class="sho-h">My Current Bookings</h1><br><br>

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
    <div class="btn"><a href="mailto:' . $job['email'] . '">
        <button class="btn-contcat" type="button">Contact tutor</button></a>
    </div>
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
          <p><span><strong>Type Of Classes:</strong></span> ' . $job['type_of_class'] . '</p>
        </div><br>
        <div class="bio-row">
          <p><span><strong>Start Date - End Date:</strong></span> ' . date('d/m/Y', strtotime($job['start_date'])) . ' - ' . date('d/m/Y', strtotime($job['end_date'])) . '</p>
        </div> <br>
        <div class="bio-row">
          <p><span><strong>Duration:</strong></span> ' . date('h:m a', strtotime($job['start_time'])) . ' - ' . date('h:m a', strtotime($job['end_time'])) . '</p>
        </div>
      </div>


    </div>

  </div>';
    }
  ?>

  <footer class="navbar">
    <p> &copy; 2023 Learn online tutoring platform <br>
      <a href="mailto:LearnInfo.sa@gmail.com" style=" color: #8c7569 ;">Contact Us
        <img src="../images/email_icon.png" alt="Contact Us"></a>
    </p>
  </footer>

  <script src="../js/index.js"></script>

</body>

</html>