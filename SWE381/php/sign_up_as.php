<?php/*
require_once 'helpers.php';

if (isLoggedIn()) {
  if (isUserParent()) {
    redirect('parent_home_page.php');
  } else {
    redirect('tutor_home_page.php');
  }
}
*/ ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">

  <link rel="stylesheet" href="../css/stylesheet.css">
  <title>Sign up</title>
 <style type ="text/css">
 
 .sign_as{
text-transform: capitalize;    
font-size:25px;   
font-weight: 600;
color:  #40405B;
text-align: center;
justify-content:center;
margin-right: 9% ;



}

.button-move{
    border: 0;
    border-radius: 40px;
    background: #8c75697c;
    cursor: pointer;
    color:#363030;
    font-size: 160%;
    font-weight: 600;
    justify-content:center;
    text-align: center;
 }

.model_sign_as{
  position: absolute; 
    top: 58%;
    left: 50%;
    transform: translate(-50%,-50%);
    background-color: #E9E5DF;
    box-shadow: 0px 3px 5px #D3CCBF;
    width: 100%; 
    border-radius: 5px;
    transition: 0.4s;
    display: flex;
    flex-direction:row;
    align-items: center;
    justify-content: center;
    max-width:65%;
    overflow: hidden;"
    z-index: -1;

}
   </style>
</head>

<body>

  <header id="navbar" class="page-header">
    <nav class="navbar-container">
      <!-- logo -->
      <a href="index.php" id="l"> <img class="logo" src="../images/Logo.PNG"> </a>

      <!-- الزر الي يظهر عند التصغير  -->
      <button type="button" id="navbar-toggle" aria-controls="navbar-menu" aria-label="Toggle menu" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <!--العناصر الي بتوجد في الهيدر + في الزر عند التصغير  -->
      <div id="navbar-menu" aria-labelledby="navbar-toggle">
        <ul class="nav__links">
          <li class="navbar-item"><a href="index.php" class="nav__link">Home</a> </li>
          <li class="navbar-item"><a href="mailto:LearnInfo.sa@gmail.com" class="nav__link">Contact us</a></li>
          <li class="navbar-item"> <a class="Sign" href="sign_in.php"><button>Login</button></a></li>
        </ul>

      </div>
    </nav>
  </header>

 <h1 id="sho-h2">Let's get you started! </h1>
  <div class="model_sign_as">
   
    <div> <br>
      <img src="../images/tuts.png" alt="Picture" class="pic-sign"><br>
        <div class="tuter-sign"> 
          <h2 class="sign_as">I am a tutor!</h2>
        <a href="sign_up_tutor.php"><button class="button-move" type="button">Sign Up</button></a>
      </div>
    </div>

    <div><br>
      <img src="../images/prns.png" alt="Picture" class="pic-sign"><br>
      <div class="parent-sign"> 
         <h2 class="sign_as">I am a parent!</h2> 
      <a href="sign_up_parent.php"><button class="button-move" type="button">Sign Up</button></a>
      </div>
    </div>

  </div>

  <footer class="navbar" id="page_footer">
    <p>&copy; 2023 Learn online tutoring platform <br>
      <a href="mailto:LearnInfo.sa@gmail.com" style=" color: #8c7569 ;">Contact Us
        <img src="../images/email_icon.png" alt="Contact Us"></a>
    </p>


  </footer>

  <script src="../js/index.js"></script>

</body>

</html>