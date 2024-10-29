<?php
require_once 'db_connection.php';
require_once 'helpers.php';
require_once 'offer.php';
require_once 'job_request.php';

if (!isLoggedIn()) {
   redirect('index.php');
} else if (isUserTutor()) {
   redirect('tutor_home_page.php');
}

if (isset($_POST['reject'])) {
   rejectOffer($_POST['id'], $db);
} else if (isset($_POST['accept'])) {
   acceptOffer($_POST['id'], $db);
   acceptJobRequest($_GET['request_id'], $db);
}

$job_requests = getOffersByJobRequestId($_GET['request_id'], $db);

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
      <div class="back-button"><a href="request_list_parent.php"><button type="submit">&lt;</button></a></div>

      <h2 id="heading">Offers list</h2>

      <?php
      if (count($job_requests) === 0) {
         echo '<h1>You don\'t have any offers yet</h1>';
      } else
         foreach ($job_requests as $request) {
            echo '
            <div class="request-block">
               <img src="' . ($request['image'] ?? '../images/person_icon.png') . '" alt="personal pic" class="peroffer">
               <div class="request-button">
                  <button name="accept" type="submit">Details</button>
               </div>
               <div class="request-button3">
                  <form method="post" action="offer_list_parent.php?request_id=' . $_GET['request_id'] . '">
                     <input type="hidden" name="id" value="' . $request['id'] . '"/>
                     <button name="accept" type="submit">Accept</button>
                  </form>
               </div>
               <div class="request-button4">
                  <form method="post" action="offer_list_parent.php?request_id=' . $_GET['request_id'] . '">
                     <input type="hidden" name="id" value="' . $request['id'] . '"/>
                     <button name="reject" type="submit">Reject</button>
                  </form>
               </div>
               <div>
                  <p class="offer-p">
                     <span>Tutor: ' . $request['first_name'] . ' ' . $request['last_name'] . ' </span>
                     <span>Price: ' . $request['price'] . ' SR </span>
                  </p>
               </div>
            </div>
            ';
         }
      ?>
   </div>

   <footer class="navbar" id="page_footer">
      <p> &copy; 2023 Learn online tutoring platform <br>
         <a href="mailto:LearnInfo.sa@gmail.com" style=" color: #8c7569 ;">Contact Us
            <img src="../images/email_icon.png" alt="Contact Us"></a>
      </p>


   </footer>
   <script src="../js/index.js"></script>
</body>

</html>