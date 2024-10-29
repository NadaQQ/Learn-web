<?php
require_once 'db_connection.php';
require_once 'helpers.php';
require_once 'job_request.php';

if (!isLoggedIn()) {
   redirect('index.php');
} else if (isUserTutor()) {
   redirect('tutor_home_page.php');
}

if (isset($_POST['cancel'])) {
   deleteJobRequest($_POST['id'], $db);
}

$user_id = currentUserId();
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

   <?php require_once 'header.php' ?>

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



   <footer class="navbar">
      <p> &copy; 2023 Learn online tutoring platform <br>
         <a href="mailto:LearnInfo.sa@gmail.com" style=" color: #8c7569 ;">Contact Us
            <img src="../images/email_icon.png" alt="Contact Us"></a>
      </p>
   </footer>

   <script src="../js/index.js"></script>
</body>

</html>