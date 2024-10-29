<?php
require_once 'helpers.php';
require_once 'db_connection.php';
require_once 'job_request.php';

if (!isLoggedIn()) {
  redirect('index.php');
} else if (isUserParent()) {
  redirect('parent_home_page.php');
}

$job_requests = getCurrentJobRequestsByTutorId(currentUserId(), $db);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/stylesheet.css">
  <title>My Jobs</title>
</head>

<body>

  <?php require_once 'header.php' ?>


  <h1 class="sho-h">My Current Jobs</h1><br><br>
  <?php
  if (count($job_requests) === 0) {
    echo '<h1 style="text-align: center;">You don\'t have any job yet</h1>';
  } else
    foreach ($job_requests as $job) {
      echo '
      <div class=" shad">
    <div class="picTuter"> <br>
      <div class="pic-con-sh">
        <img src="' . ($job['image'] ?? '../images/person_icon.png') . '" alt="personal pic" class="per"><br>

      </div>
    </div>

    <div class="infoTuter">
      <br>
      <div class="row">
        <h4><strong>Parent\'s Name:</strong> ' . $job['first_name'] . ' ' . $job['last_name'] . ' </h4>
        <h5>Price: ' . $job['price'] . ' SR </h5>
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

  </div>
      ';
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