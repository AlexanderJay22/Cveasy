<?php
session_start();


if (isset($_POST['logout'])) {
    
    session_unset();

   
    session_destroy();

   
    header("Location: login.php");
    exit();
}
if (isset($_POST['signup'])) {
   
    header("Location: signup.php");
    exit();
}


if (isset($_POST['forgot'])) {
    
    header("Location: forgot_password.php");
    exit();
}

include 'db_conection.php';
$conn = openConection();


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $email = sanitizeInput($_POST['login-email']);
    $password = sanitizeInput($_POST['login-password']);

    
    $selectSql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($selectSql);

    if ($result->num_rows > 0) {
       
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        if (password_verify($password, $hashedPassword)) {
         
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['email'] = $email;

      
            header("Location: login.php");
            exit();
        } else {
           
            $error = "Invalid email or password";
        }
    } else {
        
        $error = "Invalid email or password";
    }
}


if (isset($_POST['update'])) {
    $firstname = sanitizeInput($_POST['firstname']);
    $lastname = sanitizeInput($_POST['lastname']);
    $address = sanitizeInput($_POST['address']);
    $phone = sanitizeInput($_POST['phone']);
    $employment = sanitizeInput($_POST['employment']);
    $summary = sanitizeInput($_POST['summary']);
    $languages = sanitizeInput($_POST['languages']);
    $skills = sanitizeInput($_POST['skills']);

    
    $email = $_SESSION['email'];
    $updateSql = "UPDATE users SET firstname='$firstname', lastname='$lastname', adress='$address', phone='$phone', employment='$employment', summary='$summary', languages='$languages', skillsuser='$skills' WHERE email='$email'";

    if ($conn->query($updateSql) === TRUE) {

        header("Location: login.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}


if (isset($_SESSION['isLoggedIn'])) {
    $email = $_SESSION['email'];

    
    $selectSql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($selectSql);

    if ($result->num_rows > 0) {
       
        $row = $result->fetch_assoc();
        ?>

        <!DOCTYPE html>
        <html>
        <head>
            <title>Cv Easy</title>
           
            <link rel="stylesheet" href="Style4.css">
            <style>
.menu-button {
      display: none;
    }

    .menu-button button {
      background-color: black;
      color: pink;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      border-radius:30px;
      z-index: 9999;
    }

    .menu-dropdown {
      display: none;
      position: relative;
      background-color:black;
      color:pink;
      
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
     
    }

    .menu-dropdown li {
      padding: 12px 16px;
    }

    .menu-dropdown li:hover {
      background-color: #f1f1f1;
    }

    @media only screen and (max-width: 600px) {
      #navbar {
        display: none;
      }

      .menu-button {
        display: block;
        
      }
    }
  </style>
  <script>
    function toggleMenu() {
      var menuDropdown = document.querySelector('.menu-dropdown');
      menuDropdown.style.display = (menuDropdown.style.display === 'block') ? 'none' : 'block';
    }
  </script>

        </head>
        <body id="login_page">
            <section id="header">
                <a href="webfile.php"><img src="logo_flamingo.jpeg" class="logo"></a>
                <div>
                    <ul id="navbar">
                        <li><a href="inceracre.php"><button class="cv_bar_button">Create</button></a></li>
                        <li><a href="Aboutpage.php"><button class="cv_bar_button">About</button></a></li>
                        <li><a href="tips.php"><button class="cv_bar_button">Tips</button></a></li>
                        <li><button class="cv_bar_button" onclick="document.getElementById('bottom_section').scrollIntoView();">Contact</button></li>
                        <li><a href="login.php"><img src="image_2023-05-26_215040402-removebg-preview.png" style="width: 50px;height:50px;cursor:pointer;"></a></li>
                    </ul>
                </div> 
                <div class="menu-button">
    <button onclick="toggleMenu()">Menu</button>
    <ul class="menu-dropdown">
      <li><a href="inceracre.php">Create</a></li>
      <li><a href="Aboutpage.php">About</a></li>
      <li><a href="tips.php">Tips</a></li>
      <li><a onclick="document.getElementById('bottom_section').scrollIntoView();">Contact</a></li>
      <li><a href="login.php"><img src="image_2023-05-26_215040402-removebg-preview.png" style="width: 50px;height:50px;cursor:pointer;"></a></li>
    </ul>
  </div>
            </section> 


            <section id="information_about_user" style="height:150vh;padding-top:20vh;margin-left:25vh">
            <h2 class="title_cv_form">Welcome, <?php echo $row['firstname']; ?></h2>

                <form method="POST" action="">

                <div style="display:flex">
                    <label for="firstname">First Name:</label>
                    <input type="text" name="firstname" id="firstname" value="<?php echo $row['firstname']; ?>" placeholder="First Name">

                    <label for="lastname">Last Name:</label>
                    <input type="text" name="lastname" id="lastname" value="<?php echo $row['lastname']; ?>" placeholder="Last Name">
                </div>

                <div style="display:flex">
                    <label for="address">Address:</label>
                    <input type="text" name="address" id="address" value="<?php echo $row['adress']; ?>" placeholder="Address">
                   
                    <label for="phone">Phone:</label>
                    <input type="text" name="phone" id="phone" value="<?php echo $row['phone']; ?>" placeholder="Phone">
                  </div>
                    <div style="display:flex">
                    <label for="employment">Employment:</label>
                    <input type="text" name="employment" id="employment" value="<?php echo $row['employment']; ?>" placeholder="Employment">

                    <label for="summary">Summary:</label>
                    <textarea name="summary" id="summary" placeholder="Summary"><?php echo $row['summary']; ?></textarea>
                    </div>
                    <div style="display:flex">
                    <label for="languages">Languages:</label>
                    <input type="text" name="languages" id="languages" value="<?php echo $row['languages']; ?>" placeholder="Languages">

                    <label for="skills">Skills:</label>
                    <input type="text" name="skills" id="skills" value="<?php echo $row['skillsuser']; ?>" placeholder="Skills">
                    </div>
                    <button class="seemore_main_button3" type="submit" name="update">Update your details</button>
                </form>

                <form method="POST" action="">
                    <button type="submit" class="seemore_main_button2" name="logout">Logout</button>
                </form>
            </section>

           

            <script>

var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("header").style.top = "0";
  } else {
    document.getElementById("header").style.top = "-8rem";
  }
  prevScrollpos = currentScrollPos;
}


    </script>

 <section id="bottom_section">

 


        <h2 id="h2">Contact info</h2>
        <ul id="contacts">
          <li><div>
              <img src="logo_phone2.jpg" class="contact_logo">
              <h2>Phone</h2>
              <p>+40 729 816 434</p>
              <p>+40 799 833 626</p>
          </div></li>
          <div>
          <img src="mail_logo3.jpg" class="contact_logo">
              <h2>E-mail</h2>
              <p>raulusbalaurus@gmail.com</p>
              <p>alexandrugaita2016@gmail.com</p>
          </div></li>
          <div>
            <a href="https://www.google.com/maps/place/Strada+1+Decembrie+1918+7,+Petroșani/@45.4252318,23.366289,17z/data=!3m1!4b1!4m6!3m5!1s0x474dc4455f6cc1e3:0xb640f7fb0b14d0fe!8m2!3d45.4252076!4d23.3684916!16s%2Fg%2F11b8z4dtwx" target="_blank" rel="noopener noreferrer"> <img src="adress_logo.jpg" class="contact_logo"></a>
              <h2>Adress</h2>
              <p>Strada 1 Decembrie 1918,7 Petrosani</p>
          </div></li>
      </ul>
    </ul>
      </section>
    <section id="footer">
    <h3 id="h3">CVeasy</h3>
    <ul id="contacts_footer">
      <li><img src="instagram-5-32.png" class="footer_logo"></li>
      <li><img src="facebook-4-48.png" class="footer_logo"></li>
      <li><img src="twitter-5-32.png" class="footer_logo"></li>
    </ul>
    <p style="color: pink;font-size: 15px;">©2023 Cveasy Inc. All Rights Reserved</p>
</section>

        </body>
        </html>

        <?php
    } else {
        echo "User not found";
    }
} else {
    
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Login Form</title>
        <link rel="stylesheet" href="Style2.0.css">
    </head>
    <body>

    <section id="header">
  <a href="webfile.php"><img src="logo_flamingo.jpeg"  class="logo" ></img></a>
 <div>
      <ul id="navbar">
          <li><a href="inceracre.php"><button class="cv_bar_button">Create</button></a></li>
          <li><a href="Aboutpage.php"><button class="cv_bar_button">About</button></a></li>
          <li><a href="tips.php"><button class="cv_bar_button">Tips</button></a></li>
          <li><button class="cv_bar_button"  onclick="document.getElementById('bottom_section').scrollIntoView();">Contact</button></li>
          <li><a href="login.php"><img src="image_2023-05-26_215040402-removebg-preview.png" style="width: 50px;height:50px;cursor:pointer;"></img></a></li>
      </ul>
  </div> 
</section> 





<section id="login_loginpage" style="margin-top:20vh">
    
        <p class="title_cv_form2">Please log in to see your account details</p>
        <form method="POST" action="">
            <div class="form-group">
                <label for="login-email">Email:</label>
                <input type="email" name="login-email" id="login-email">
            </div>
            <div class="form-group">
                <label for="login-password">Password:</label>
                <input type="password" name="login-password" id="login-password">
            </div>
            <div class="form-group">
                <button class="seemore_main_button3" type="submit" name="login">Login</button>
            </div>
        </form>
        <form method="POST" action="">
            <p class="title_cv_form3">Don't have an account? </p>
            <button class="seemore_main_button3" type="submit" name="signup">Create one</button>
        </form>
        <form method="POST" action="">
            <p class="title_cv_form3">Forgot your password? </p>
            <div class="form-group">
                <button class="seemore_main_button3" style="margin-bottom:20vh" type="submit" name="forgot">Reset it</button>
            </div>
        </form>
    
</section>






    
 <section id="bottom_section">

 


        <h2 id="h2">Contact info</h2>
        <ul id="contacts">
          <li><div>
              <img src="logo_phone2.jpg" class="contact_logo">
              <h2>Phone</h2>
              <p>+40 729 816 434</p>
              <p>+40 799 833 626</p>
          </div></li>
          <div>
          <img src="mail_logo3.jpg" class="contact_logo">
              <h2>E-mail</h2>
              <p>raulusbalaurus@gmail.com</p>
              <p>alexandrugaita2016@gmail.com</p>
          </div></li>
          <div>
            <a href="https://www.google.com/maps/place/Strada+1+Decembrie+1918+7,+Petroșani/@45.4252318,23.366289,17z/data=!3m1!4b1!4m6!3m5!1s0x474dc4455f6cc1e3:0xb640f7fb0b14d0fe!8m2!3d45.4252076!4d23.3684916!16s%2Fg%2F11b8z4dtwx" target="_blank" rel="noopener noreferrer"> <img src="adress_logo.jpg" class="contact_logo"></a>
              <h2>Adress</h2>
              <p>Strada 1 Decembrie 1918,7 Petrosani</p>
          </div></li>
      </ul>
    </ul>
      </section>
    <section id="footer">
    <h3 id="h3">CVeasy</h3>
    <ul id="contacts_footer">
        <li><a href="https://www.instagram.com/cveasy_cv/" target="_blank" rel="noopener noreferrer"><img src="instagram-5-32.png" class="footer_logo"></li>
        <li><a href="https://www.facebook.com/profile.php?id=100094530630720" target="_blank" rel="noopener noreferrer"><img src="facebook-4-48.png" class="footer_logo"></li>
        <li><a href="https://twitter.com/CV_easy_" target="_blank" rel="noopener noreferrer"><img src="twitter-5-32.png" class="footer_logo"></a></li>
      </ul>
    <p style="color: pink;font-size: 15px;"> ©2023 Cveasy Inc. All Rights Reserved</p>
</section>

    </body>
    </html>

    <?php
}

$conn->close();
?>
