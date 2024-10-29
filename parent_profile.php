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
  <?php require_once 'header.php' ?>

  <h1 class="sho-h">My Profile</h1>
  <div class="shad-pro">
    <div class="picTuter">
      <br>
      <div class="pic-con-sh">
        <img src="<?php echo $user['image'] ?? '../images/person_icon.png' ?>" alt="personal pic" class="per"><br><br>
        <h2><?php echo $user['first_name'] ?></h2>
        <h2><?php echo $user['last_name'] ?></h2>
      </div>
    </div>

    <div class="infoTuter">
      <br>
      <div class="row">
        <div class="bio-row">
          <p><span><strong>City</strong></span>: <?php echo $user['city'] ?> </p>
        </div>
        <br>
        <div class="bio-row">
          <p><span><strong>Email</strong></span>: <?php echo $user['email'] ?></p>
        </div>
        <br>
      </div>

    </div>

  </div>

  <div class="modal-buttons">
    <input type="button" class="Edit-button" value="Edit account">
    <form action="delete_account.php" method="post">
      <input type="submit" name="delete_parent" class="delet-button" value="Delete account">
    </form>
  </div><br><br>

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

</body>


</html>