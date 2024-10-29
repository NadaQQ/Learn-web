<?php
require_once 'helpers.php';
require_once 'job_request.php';
require_once 'db_connection.php';

if (!isLoggedIn()) {
  redirect('index.php');
} else if (isUserTutor()) {
  redirect('tutor_home_page.php');
}
if (isset($_POST['submit'])) {
  createJobRequest(
    $_POST['name'],
    $_POST['age'],
    $_POST['type'],
    $_POST['start_date'],
    $_POST['end_date'],
    $_POST['start_time'],
    $_POST['end_time'],
    currentUserId(),
    $db
  );

  alertMessage('Job Request created Successfully');
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

  <?php require_once 'header.php' ?>

  <form action="post_job_request_parent.php" method="post">
    <div class="modal" id="modal-request">

      <div class="modal-left" id="modal-left-req">
        <h1>New job request</h1>
        <p class="p">Please fill up your kid's information to request tutor :</p>

        <div class="input-block">
          <label class="input-label">Name:</label>
          <input name="name" type="text" placeholder="Name">
        </div>

        <div class="input-block">
          <label class="input-label">Age: </label>
          <input name="age" type="number" placeholder="Age">
        </div>

        <div class="input-block">
          <label class="input-label">Type of class: </label>
          <select name="type">
            <option selected>Select Class Type</option>
            <option>Arabic</option>
            <option>English</option>
            <option>Math</option>
            <option>Physics</option>
            <option>Biology</option>
            <option>Chemistry</option>
            <option>other</option>
          </select>
        </div>

        <div class="input-block">
          <label class="input-label">Start Date:</label>
          <input name="start_date" type="date" class="Duration">

          <label class="input-label">End Date:</label>
          <input name="end_date" type="date" class="Duration">
        </div>

        <div class="input-block">
          <label class="input-label">Start time:</label>
          <input name="start_time" type="time" class="Duration">

          <label class="input-label">End time:</label>
          <input name="end_time" type="time" class="Duration">
        </div>

        <div class="modal-buttons">
          <input type="submit" name="submit" class="input-button" value="Request">
        </div>
      </div>

      <div class="modal-right">
        <img src="../images/job.jpeg" alt="fil info" class="req__img">
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