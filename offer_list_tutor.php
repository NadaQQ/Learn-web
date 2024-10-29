<?php
require_once 'helpers.php';
require_once 'db_connection.php';
require_once 'offer.php';

if (!isLoggedIn()) {
   redirect('index.php');
} else if (isUserParent()) {
   redirect('parent_home_page.php');
}

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

   <?php require_once 'header.php' ?>


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
            <img src="' . ($offer['image'] ?? '../images/person_icon.png') . '" alt="personal pic" class="peroffer">
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

   <footer class="navbar">
      <p> &copy; 2023 Learn online tutoring platform <br>
         <a href="mailto:LearnInfo.sa@gmail.com" style=" color: #8c7569 ;">Contact Us
            <img src="../images/email_icon.png" alt="Contact Us"></a>
      </p>
   </footer>

   <script src="../js/index.js"></script>
</body>

</html>