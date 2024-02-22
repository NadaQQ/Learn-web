<?php
require_once 'db_connection.php';
require_once 'tutor.php';
require_once 'user.php';
require_once 'helpers.php';
//require_once 'image.php';

if (!isLoggedIn()) {
    redirect('index.php');
  } else if (isUserParent()) {
    redirect('parent_home_page.php');
  }
  
  $user = getUser(currentUserId(), $db);
  
  ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Update</title>
  <link rel="stylesheet" href="../css/stylesheet.css">
  <style type ="text/css">
   #errorMessage{
    color:  rgb(238, 96, 96);
    font-size: 14px; 
    font-weight: 400;
    font-family: "Nunito", sans-serif;}
   </style>
</head>

<body>
<header id="navbar" class="page-header">
                <nav class="navbar-container">
        <!-- logo -->
              <a href="tutor_home_page.php" id="l"><img class="logo" src="../images/Logo.PNG" alt="logo" > </a>
    
        <!-- الزر الي يظهر عند التصغير  -->
              <button type="button" id="navbar-toggle" aria-controls="navbar-menu"  aria-label="Toggle menu" aria-expanded="false">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
    
        <!--العناصر الي بتوجد في الهيدر + في الزر عند التصغير  -->
              <div id="navbar-menu" aria-labelledby="navbar-toggle">
                  <ul class="nav__links">
                     <li class="navbar-item"><a href="tutor_home_page.php" class="nav__link" >Home</a> </li>
                     <li class="navbar-item"><a href="mailto:LearnInfo.sa@gmail.com" class="nav__link">Contact us</a></li>
    
                     <li class="nav-item dropdown">
                        <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">My Jobs ⌄</a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="current_jobs.php">Current Jobs</a></li>
                          <li><a class="dropdown-item" href="previous_job.php">Previous Jobs</a></li>
                        </ul>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">

                        <img src="../images/<?php echo $user['image']; ?>" alt="My Profile" class="per" style=" width: 10vh; height: 10vh; "> </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="tuter_profile.php">Manage Profile</a></li>
                         <!-- <li><a class="dropdown-item" href="EditParentProfile.html">Manage Profile</a></li>-->
                          <li>
                            <form action="logout.php" method="post">
                                <input type="submit" style="background: transparent;border: none; display: inline-block !important;
        color: #40405B !important;
        text-align: center !important;
        padding: 14px 16px !important;
        text-decoration: none !important;         
        font-size: 18px !important;" name="logout" value="Log Out">
                            </form>
                          </li>
                        </ul>
                      </li>
    
                  </ul>
                 </div>
             </nav>
            </header>

         <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

         <div class="back-button"><a href="tuter_profile.php"><button type="button"> &lt; </button></a></div>
        <h1 class="sho-h">Edit Profile</h1>
        <div class="shad-pro">
  
        <!-- profile photo --> 
            <div class="picTuter">
               <div class="pic-con-sh">   

               <img src="../images/<?php echo $user['image']; ?>"  alt="profile photo" class="per" id="defaultimg"><br>
         <label class="input-label">
         <div class="file-input">
            
            <label class="choose_button__label" for="img">
              <img path src="../images/photo.png" alt="Tutor icon">
              <span>choose profile photo</span></label> </div>
              <input type="file" accept="image/*" name="img" id="img" class="choose_button"   onclick='changePic()' >  
       <br>
       <br>   
    </div>
    </div>

  

        <div class="infoTuter">
            <br>
            <div class="row">

            
       <div class="bio-row">
                <label>First Name:</label>
                <div class="input-block">
                <input type="text" name="first_name" id="firstname" placeholder="First Name"  value="<?php echo $user['first_name']; ?>" >
            <span id="errorMessage"> <?php echo $fnameerror;?></span>
          </div>
             </div>
      </div>

      
      <div class="bio-row">
         <label >Last Name:</label>
         <div class="input-block">
         <input type="text" name="last_name" id="lastname" placeholder="Last Name" value="<?php echo $user['last_name']; ?>" >
            <span class="error" id="errorMessage"> <?php echo $lnameerror;?></span>        
        </div>
      </div>

      <div class="bio-row"> 
        <label >ID:</label>
      <div class="input-block">
            <input type="text" name="id" id="id" placeholder="ID"  value="<?php echo $user['id']; ?>"  >
            <span class="error" id="errorMessage"> <?php echo $iderror;?></span>
          </div>
   </div>


           <div class="bio-row">
            <label >Age: </label>
            <div class="input-block">
            <input name="age" type="number" placeholder="Age"  value="<?php echo $user['age']; ?>" >
             <span class="error" id="errorMessage"> <?php echo $ageerror;?></span>
          </div>
   </div>

   <div class="bio-row">
          <div class="radio">
            <div class="input-block">
                <label class="input-label"><strong>Gender:</strong></label>

                    <label class="input-label" for="male">
                <input type="radio" class="input-radio" name="gender" value="male"<?php if (isset($_POST["gender"]) && $_POST["gender"] == "male") echo "checked"; ?>> Male</label>

                 <label class="input-label" for="female">
                <input  type="radio" class="input-radio" name="gender" value="female" <?php if (isset($_POST["gender"]) && $_POST["gender"] == "female") echo "checked"; ?> >Female</label>
                <span class="error" id="errorMessage"> <?php echo $gendererror;?></span>
            </div>
         </div>
   </div>

       <div class="bio-row">
			  <label for="email" >Email:</label>
        <div class="input-block">
        <input type="email" name="email" id="email" placeholder="Email" value="<?php echo $user['email']; ?>">
         <span class="error" id="errorMessage"> <?php echo $emailerror;?></span>
		   </div>
      </div>     

      <div class="bio-row">
		 	   <label for="password">Password:</label>
          <div class="input-block">
          <input type="password" name="password" id="password" placeholder="Password" value="<?php echo $user['password']; ?>">
          <span class="error" id="errorMessage"> <?php echo $passworderror;?></span>
        </div>
       </div>

       <div class="bio-row">
      <label class="input-label" for="typePhone">Phone Number:</label>
       <div class="input-block">
            <input required type="tel" name="phone" id="typePhone" class="form-control" maxlength="10" minlength="10" placeholder="Phone Number" value="<?php echo $user['phone']; ?>">
            <span class="error" id="errorMessage"> <?php echo  $phoneNumerror;?></span>
          </div>
   </div>


       <div class="bio-row">
        <label>City:</label> 
         <div class="input-block">
            <select type="text" id="loc" name="city" >
            <option selected><?php echo $user['city']; ?></option>
            <option value="Abha">Abha</option>
            <option value="Abu Arish">Abu Arish</option>
            <option value="Al Baha">Al Baha</option>
            <option value="Al Bukayriyah">Al Bukayriyah</option>
            <option value="Al Duwadimi">Al Duwadimi</option>
            <option value="Al Kharj">Al Kharj</option>
            <option value="Al Rass">Al Rass</option>
            <option value="Al Ula">Al Ula</option>
            <option value="Al Khobar">Al Khobar</option>
            <option value="Arar">Arar</option>
            <option value="Bisha">Bisha</option>
            <option value="Buridah">Buraidah</option>
            <option value="Dammam">Dammam</option>
            <option value="Dhahran">Dhahran</option>
            <option value="Hafar Al Batin">Hafar Al Batin</option>
            <option value="Hail">Hail</option>
            <option value="Jazan">Jazan</option>
            <option value="Jeddah">Jeddah</option>
            <option value="Jubail">Jubail</option>
            <option value="Khamis Mushait">Khamis Mushait</option>
            <option value="Mecca">Mecca</option>
            <option value="Medina">Medina</option>
            <option value="Najran">Najran</option>
            <option value="Riyadh">Riyadh</option>
            <option value="Rabigh">Rabigh</option>
            <option value="Riyadh AlKhabra">Riyadh AlKhabra</option>
            <option value="Sakaka">Sakaka</option>
            <option value="Shaqra">Shaqra</option>
            <option value="Tabuk">Tabuk</option>
            <option value="Taif">Taif</option>
            <option value="Unayzah">Unayzah</option>
            <option value="Yanbu">Yanbu</option>
            <option value="Zulfi">Zulfi</option>
          </select> 
          <span class="error" id="errorMessage"> <?php echo $cityerror;?></span>
         </div>
</div>

<div class="bio-row">
    <label name="bio" for="bio">Bio:</label>
<div class="input-block">
            <textarea name="bio" id="bio" rows="5" placeholder="Share a little information about yourself"><?php echo $user['bio'];?></textarea>
            <span class="error" id="errorMessage"> <?php echo $bioerror;?></span>
          </div>
   </div>



         
</div>
</div>

</div>

<div class="modal-buttons">
 <input type="submit" class="Edit-button" name="submit" value="Update">
</div>
</form>

<?php
$fnameerror = "";
$lnameerror = "";
$emailerror = "";
$passworderror= "";
$cityerror= "";
$iderror = "";
$ageerror = "";
$gendererror="";
$phoneNumerror ="";
$bioerror = "";
$imageerror="";

$notification="";
$valid=true;


$city=$_POST['city'];
$image =$_FILES['image']['name'];



if ($_SERVER["REQUEST_METHOD"] == "POST") {

//profile photo
  if(empty($image)){
    $image ='person_icon.png';
  }
  else{
    $imageerror=uploadImage($_FILES['image']);
  }

//first name 
  if (empty($_POST["first_name"])) {
    $fnameerror = "\u{25CF} First Name is required";
    $valid=false;
  } else {
    $first_name = test_input($_POST["first_name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)) {
    $fnameerror= "\u{25CF} Only letters and white space allowed";
    $valid=false;

    }
  }
//last name
  if (empty($_POST["last_name"])) {
    $lnameerror = "\u{25CF} Last Name is required";
    $valid=false;
  } else {
    $last_name = test_input($_POST["last_name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$last_name)) {
    $lnameerror= "\u{25CF} Only letters and white space allowed";
    $valid=false;

    }
  }


  //id 
  if (empty($_POST["id"])) {
    $idError = "\u{25CF} National ID is required";
    $valid=false;
  } else {
    $id = test_input($_POST["id"]);
  if (!preg_match("/^[0-9]{10}$/", $id)) {
    $idError = "\u{25CF} National ID / Iqama should consist of 10 digits only.";
    $valid=false;
  }
}

//age
if (empty($_POST["age"])) {
    $ageerror  = "\u{25CF} Age is required";
    $valid=false;
  } else {
    $age = test_input($_POST["age"]);
if ($age < 18) {
    $ageerror = "\u{25CF} Age should be greater than or equal to 18.";
    $valid=false; }
  if ($age > 100) {
    $ageerror = "\u{25CF} Age should be less than or equal to 100.";
    $valid=false;}
}

//gender
if (empty($_POST["gender"])) {
    $gendererror  = "\u{25CF} please select a gender!";
    $valid=false;
} 

  //email 

  if (empty($_POST["email"])) {
    $emailerror= "\u{25CF} Email is required";
    $valid=false;
  }  
  else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailerror = "\u{25CF} Invalid email format";
      $valid=false;
    }
  }
 

//password
  if (empty($_POST["password"])) {
    $emailerror= "\u{25CF} Email is required";
    $valid=false;
  }  
  else{
    $password = test_input($_POST["password"]);
     if((strlen($password)<8) ||!preg_match("/[!”#\$\%\&\'\(\)\*\+,-\.\/:;<=>\?@\[\]\^_\{\|\}~`]{1,}/", $password) ){ 
    $passworderror = "\u{25CF} Password should be at least 8 characters and should contain at least one special character.";
    $valid=false;
} 
  }


//phone 
if (empty($_POST["phone"])) {
    $phoneNumerror= "\u{25CF} Phone number is required";
    $valid=false;
  }  
  else{
    $phone = test_input($_POST["phone"]);
if (!preg_match("/^05+[0-9]{8}$/", $phone)) {
    $phoneNumerror = "\u{25CF} Invalid Phone! Phone number must be in the format 05XXXXXXXX.";
    $valid=false;
  }
  }

//city
  if (($_POST["city"])=="Select Your City"){
    $cityerror="\u{25CF} city is required";
    $valid=false;
  }

//bio
  if (empty($_POST["bio"])) {
    $$bioerror = "\u{25CF} Bio is required";
    $valid=false;
  }  
  else{
    $bio = test_input($_POST["bio"]);
  if (!preg_match("/^[0-9a-zA-Z!”#\$\%\&\'\(\)\*\+,-\.\/:;<=>\?@\[\]\^_\{\|\}~`\n\r ]{25,}$/", $bio)) {
    $bioerror = "\u{25CF} Bio should contain at least 25 characters.<br>";
    $valid=false;
  }
}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function uploadImage(array $image)
{
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($image["name"]);
    if (move_uploaded_file($image["tmp_name"], $target_file)) 
    return $target_file;
    else 
    return "sorry your profile photo did not upload try again later";
}
?>
<?php
if (isset($_POST['submit'])) {
  if($valid){

    $user_update= UpdateUser(
    $_POST['first_name'],
    $_POST['last_name'],
    $_POST['email'],
    $_POST['password'],
    'tutor',
    $image,
    $_POST['city'],
    $db
  );
  redirect('tutor_home_page.php');
  //$notification = 'Registration successful!';

}
}
?>

<br>
  <footer class="navbar" >
   <p> &copy; 2023 Learn online tutoring platform <br>
    <a href="mailto:LearnInfo.sa@gmail.com" style=" color: #8c7569 ;">Contact Us
    <img src="../images/email_icon.png" alt="Contact Us"></a></p>
     </footer>


 <script src="../js/index.js"></script>

 <script>

//Upload image

function changePic(){
const img = document.querySelector('#defaultimg');
const file = document.querySelector('#img');


file.addEventListener('change', function(){
 
    const choosedFile = this.files[0];

    if (choosedFile) {

        const reader = new FileReader(); 

        reader.addEventListener('load', function(){
            img.setAttribute('src', reader.result);
        });

        reader.readAsDataURL(choosedFile);

    }
});

}
</script>

 </body>

</html>
            
