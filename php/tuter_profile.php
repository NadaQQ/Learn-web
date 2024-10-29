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
        <input type="submit" class="Edit-button" value="Edit account">
        <form action="delete_account.php" method="post">
            <input type="submit" name="delete_tutor" class="delet-button" value="Delete account">
        </form>
    </div><br><br>

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

</body>

</html>