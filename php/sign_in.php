<?php
require_once 'db_connection.php';
require_once 'helpers.php';
require_once 'user.php';

if (isLoggedIn()) {
	if (isUserParent()) {
		redirect('parent_home_page.php');
	} else {
		redirect('tutor_home_page.php');
	}
}

if (isset($_POST['submit'])) {
	$isLoggedInSuccessfuly = login($_POST['email'], $_POST['password'], $db);
	if ($isLoggedInSuccessfuly) {
		redirect('index.php');
	} else {
		alertMessage('Email or password is wrong');
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="../css/stylesheet.css">
</head>

<body>

	<?php require_once 'header.php' ?>

	<form method="post" action="sign_in.php">
		<div class="modal">

			<div class="modal-left">
				<h1>Welcome back!</h1>
				<p class="p">The beautiful thing about learning is nobody can take it away from you.</p>


				<div class="input-block">
					<label for="email" class="input-label">Email</label>
					<input type="email" name="email" id="email" placeholder="Email">
				</div>
				<div class="input-block">
					<label for="password" class="input-label">Password</label>
					<input type="password" name="password" id="password" placeholder="Password">
				</div>

				<div class="modal-buttons">
					<!-- <a href="" class="">Forgot your password?</a> -->
					<button type="submit" name="submit" class="input-button">Login</button>
				</div>
				<p class="sign-up">Don't have an account? <a href="sign_up_as.php">Sign up now</a></p>
			</div>
			<div class="modal-right">
				<img src="../images/g1.jpg" alt="background" class="Sign__img">
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