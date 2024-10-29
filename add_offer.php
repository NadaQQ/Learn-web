<?php
session_start();
require_once 'helpers.php';
require_once 'db_connection.php';
require_once 'offer.php';

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

    <?php require_once 'header.php' ?>

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