<?php
session_start();

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: inceracre.php");
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
    if (isset($_POST['login'])) {
        $loginEmail = isset($_POST['login-email']) ? sanitizeInput($_POST['login-email']) : "";
        $loginPassword = isset($_POST['login-password']) ? sanitizeInput($_POST['login-password']) : "";

        $loginQuery = "SELECT * FROM users WHERE email = '$loginEmail'";
        $loginResult = $conn->query($loginQuery);

        if ($loginResult->num_rows > 0) {
            $row = $loginResult->fetch_assoc();
            $hashedPassword = $row['password'];

            if (password_verify($loginPassword, $hashedPassword)) {
                $_SESSION['isLoggedIn'] = true;
                $_SESSION['email'] = $loginEmail;
                echo '<script>localStorage.setItem("isLoggedIn", "true");</script>';
            } else {
                echo "Invalid email or password";
            }
        } else {
            echo "Invalid email or password";
        }
    } else if (isset($_POST['update'])) {
        $firstName = isset($_POST['firstname']) ? sanitizeInput($_POST['firstname']) : "";
        $lastName = isset($_POST['lastname']) ? sanitizeInput($_POST['lastname']) : "";
        $email = isset($_POST['email']) ? sanitizeInput($_POST['email']) : "";
        $password = isset($_POST['password']) ? sanitizeInput($_POST['password']) : "";
        $address = isset($_POST['address']) ? sanitizeInput($_POST['address']) : "";
        $phone = isset($_POST['phone']) ? sanitizeInput($_POST['phone']) : "";
        $employment = isset($_POST['employment']) ? sanitizeInput($_POST['employment']) : "";
        $summary = isset($_POST['summary']) ? sanitizeInput($_POST['summary']) : "";
        $languages = isset($_POST['languages']) ? sanitizeInput($_POST['languages']) : "";
        $skillsButtons = isset($_POST['skillsbuttons']) ? $_POST['skillsbuttons'] : "";
        $skillsUser = isset($_POST['skillsuser']) ? sanitizeInput($_POST['skillsuser']) : "";

        $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
        $checkEmailResult = $conn->query($checkEmailQuery);

        if ($checkEmailResult->num_rows > 0) {
            $updateQuery = "UPDATE users SET
                firstname = '$firstName',
                lastname = '$lastName',
                adress = '$address',
                phone = '$phone',
                employment = '$employment',
                summary = '$summary',
                languages = '$languages',
                skillsbuttons = '$skillsButtons',
                skillsuser = '$skillsUser'
                WHERE email = '$email'";

            if (!empty($_FILES['photo']['name'])) {
                $fileName = $_FILES['photo']['name'];
                $tempFilePath = $_FILES['photo']['tmp_name'];

                $fileData = file_get_contents($tempFilePath);
                $escapedFileData = mysqli_real_escape_string($conn, $fileData);

                $updateQuery = "UPDATE users SET
                    firstname = '$firstName',
                    lastname = '$lastName',
                    adress = '$address',
                    phone = '$phone',
                    employment = '$employment',
                    summary = '$summary',
                    languages = '$languages',
                    skillsbuttons = '$skillsButtons',
                    skillsuser = '$skillsUser',
                    user_photo = '$escapedFileData'
                    WHERE email = '$email'";

                if ($conn->query($updateQuery) === TRUE) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            } else {
                echo "No file selected";
            }
        } else {
            echo "User not found";
        }
    }
}

if (isset($_SESSION['isLoggedIn'])) {
    $email = $_SESSION['email'];
    $selectSql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($selectSql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $firstName = $row['firstname'];
        $lastName = $row['lastname'];
        $address = $row['adress'];
        $phone = $row['phone'];
        $employment = $row['employment'];
        $summary = $row['summary'];
        $languages = $row['languages'];
        $skillsButtons = $row['skillsbuttons'];
        $skillsUser = $row['skillsuser'];
        $userPhoto = $row['user_photo'];



?>
        <!DOCTYPE html>
        <html>
        <head>
        <link rel="stylesheet" href="Style2.0.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
            <title>CV Easy</title>
            <style>
                .skill-button {
                    margin-right: 2.8vh;
                    padding: 1vh 3vh;
                    border: none;
                    border-radius: 20px;
                    cursor: pointer;
                    font-size:2vh;
                }

                .skill-button.selected {
                    background-color: pink;
                    color: black;
                }

                .stack{
                 position:absolute;
                 display: none;
              
                 
                 }
                
         


            </style>

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
        <body>

        <section id="header">
  <a href="webfile.php"><img src="logo_flamingo.jpeg"  class="logo" ></img></a>
 <div>
      <ul id="navbar">
          <li><a href="inceracre.php"><button class="buton_activ">Create</button></a></li>
          <li><a href="Aboutpage.php"><button class="cv_bar_button">About</button></a></li>
          <li><a href="tips.php"><button class="cv_bar_button">Tips</button></a></li>
          <li><button class="cv_bar_button"  onclick="document.getElementById('bottom_section').scrollIntoView();">Contact</button></li>
          <li><a href="login.php"><img src="image_2023-05-26_215040402-removebg-preview.png" style="width: 50px;height:50px;cursor:pointer;"></img></a></li>
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



               










 <p class="title_cv_form reveal">First let's start with your name</p>
       
 <div>
                
                <form method="POST" id="cvForm" enctype="multipart/form-data">
                <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
    <div class="inputBox reveal">
    <div class="form-group">
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" id="firstname" value="<?php echo $row['firstname']; ?>">
    </div>
</div>
<div class="inputBox reveal">
    <div class="form-group">
        <label for="lastname">Last Name:</label>
        <input type="text" name="lastname" id="lastname" value="<?php echo $row['lastname']; ?>">
    </div>
</div>



<p class="title_cv_form reveal">We are sure you have a beautiful face, your employers would like to see it</p>



                    <div class="inputBox3 reveal">

            
<div class="inputBox3">
  <p style="margin-top:2vh">press here to </p>
<input style="margin-top:2vh" type="file" name="photo" accept="image/*" ><br>


</div>
<img src="data:image/jpeg;base64,<?php echo base64_encode($row['user_photo']); ?>" style="width:20vh;height:20vh" alt="Profile Photo">
</div>




                    <p class="title_cv_form reveal">How can people contact you and where can we find you?</p>


<div class="inputBox reveal">
    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" value="<?php echo $row['phone']; ?>">
    </div>
    </div>
    <div class="inputBox reveal">
    <div class="form-group">
        <label for="adress">Address:</label>
        <input type="text" name="adress" id="adress" value="<?php echo $row['adress']; ?>">
    </div>
    </div>

    <p class="title_cv_form reveal">Let's talk about you for a second</p>

                    
                    <div class="inputBox" >

<div class="form-group reveal">
<label for="summary">Summary:</label>
<textarea name="summary" id="summary"></textarea>
</div>
</div>

<button type="button" class="skill-button reveal"onclick="toggleCustomPopup()">Click for ideas</button>

<div class="custom-popup" id="customPopup">
<div class="custom-popup-content">
<button type="button" class="skill-button"onclick="fillTextarea('Hardworking College Student seeking employment.')">Hardworking College Student seeking employment.</button>
<button type="button" class="skill-button"onclick="fillTextarea('Bringing forth a motivated attitude and a variety of powerful skills.')">Bringing forth a motivated attitude and a variety of powerful skills.</button>
<button type="button" class="skill-button"onclick="fillTextarea('Highly organized, and skilled in written and verbal communication.')">Highly organized, and skilled in written and verbal communication.</button>
<button type="button" class="skill-button"onclick="fillTextarea('Strong organizational abilities with proven successes managing multiple academic projects and volunteering events.')">Strong organizational abilities with proven successes managing multiple academic projects and volunteering events.</button>
<button type="button" class="skill-button"onclick="fillTextarea('Bringing forth expertise in design, installation, testing and maintenance of web systems.')">Bringing forth expertise in design, installation, testing and maintenance of web systems.</button>
<button type="button" class="skill-button"onclick="fillTextarea(' Dynamic Executive with six years of experience helping organizations reach their full potential.')"> Dynamic Executive with six years of experience helping organizations reach their full potential.</button>
<button type="button" class="skill-button"onclick="fillTextarea('Experienced and self-motivated Office Secretary with ten+ years of industry experience overseeing the main offices of schools.')">Experienced and self-motivated Office Secretary with ten+ years of industry experience overseeing the main offices of schools.</button>
<button type="button" class="skill-button"onclick="fillTextarea('A strong leader who works well under pressure, and exudes positivity.')">A strong leader who works well under pressure, and exudes positivity.</button>
<button type="button" class="skill-button"onclick="fillTextarea('Proficient in an assortment of technologies, including Java, ASP.NET, C#, IIS, Tomcat, and Microsoft SQL Server.')">Proficient in an assortment of technologies, including Java, ASP.NET, C#, IIS, Tomcat, and Microsoft SQL Server.</button>
<button type="button" class="skill-button"onclick="fillTextarea('Highly experienced in illustration and animation.')">Highly experienced in illustration and animation.</button>
<button type="button" class="skill-button"onclick="fillTextarea('Bringing forth the ability to work well with others and utilize my art skills to visually enhance projects.')">Bringing forth the ability to work well with others and utilize my art skills to visually enhance projects.</button>
<button type="button" class="skill-button"onclick="fillTextarea('Equipped with a diverse and promising skill-set.')">Equipped with a diverse and promising skill-set.</button>
</div>
</div>




                    <div class="inputBox reveal">
    <div class="form-group">
        <label for="employment">Employment:</label>
        <input type="text" name="employment" id="employment" value="<?php echo $row['employment']; ?>">
    </div>
    </div>
    
    <p class="title_cv_form reveal">Let's see your best qualities </p>


                    <div class="inputBox2 reveal">
    <div class="form-group">
        <label for="skillsbuttons">Choose your skills</label>
        <br>
        <?php
        $skillsButtons = explode(',', $row['skillsbuttons']);
        $skillsUser = isset($row['skillsuser']) ? $row['skillsuser'] : ""; 
        
        $availableSkills = array("Comunication", "Programing", "Customer service skills", "Leadership skills", "Project management", "Problem-solving","Analytical skills","Emotional intelligence","Collaboration","Organizational skills","Conflict resolution","Website development","Strategic thinking","Group facilitation","Data interpretation and visualization","Decision making","Creativity","Budgeting");
        
        foreach ($availableSkills as $skill) {
            $selected = in_array($skill, $skillsButtons) ? 'selected' : '';
            echo '<button type="button" class="skill-button ' . $selected . '" onclick="toggleSkill(this)">' . $skill . '</button>';
        }
        ?>
        <input type="hidden" name="skillsbuttons" id="skillsbuttons" value="<?php echo implode(',', $skillsButtons); ?>">
    
     
    
    <br>
    <div class="form-group" style="margin-top:5vh;">
     <label for="skillsuser" >If you have other qualities please let us know </label>
      <input type="text" name="skillsuser" id="skillsuser" value="<?php echo $skillsUser; ?>">
  </div>
      </div>
      </div>
      <div class="inputBox reveal"style="margin-top:5vh;">
    <div class="form-group" >
        <label for="languages">Languages:</label>
        <input type="text" name="languages" id="languages" value="<?php echo $row['languages']; ?>">
    </div>
    </div>
    
    <p class="title_cv_form reveal">Choose a template for your CV</p>



<div class="slider_cv_page reveal">

<div class="swiper mySwiper">



<div class="swiper-wrapper">
<div class="swiper-slide"><button type="button" id="cv0_button" onclick="selectButton(1)" class="scrollbar_button" ><img src="cv0.png" class="images_slider"></button></div>
<div class="swiper-slide"><button type="button" id="cv1_button" onclick="selectButton(2)" class="scrollbar_button" ><img src="cv1.png" class="images_slider"></button></div>
<div class="swiper-slide"><button type="button" id="cv2_button" onclick="selectButton(3)"class="scrollbar_button"><img src="cv2.png" class="images_slider"></button></div>
<div class="swiper-slide"><button type="button" id="cv3_button" class="scrollbar_button"><img src="cv3.png" class="images_slider"></button></div>
<div class="swiper-slide"><button type="button" id="cv4_button" class="scrollbar_button"><img src="cv4.png" class="images_slider"></button></div>
<div class="swiper-slide"><button type="button" id="cv5_button" class="scrollbar_button"><img src="cv5.png" class="images_slider"></button></div>
<div class="swiper-slide"><button type="button" id="cv6_button" class="scrollbar_button"><img src="cv6.png" class="images_slider"></button></div>
</div>
<div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>
<div class="swiper-pagination"></div>
</div>

</div>



                    
                    <div class="form-group">
                        <button class="seemore_main_button" type="submit" onclick="submitFormAndRedirect()"name="update">Create your CV</button>
                    </div>
                </form>
                
            </div>      
 
      
            <script>
        function selectButton(buttonNumber) {
            sessionStorage.setItem('selectedButton', buttonNumber);
        }
    </script>
        <script>
        function submitFormAndRedirect() {
         
            var form = document.getElementById("cvForm");

            
            var formData = new FormData(form);

           
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "CVPAGE.php");  
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    
                    window.location.href = "CVPAGE.php";
                }
            };
            xhr.send(formData);

          
            return false;
        }
    
    </script>

            <script type="module">

import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.esm.browser.min.js'
var swiper = new Swiper(".mySwiper", {
spaceBetween: 5,
slidesPerView: 3,
loop: true,
pagination: {
el: ".swiper-pagination",
clickable: true,
},
navigation: {
nextEl: ".swiper-button-next",
prevEl: ".swiper-button-prev",
},
observer: true,
observeParents: true,
});

</script>

 <script>
                               function reveal() {
  var reveals = document.querySelectorAll(".reveal");

  for (var i = 0; i < reveals.length; i++) {
    var windowHeight = window.innerHeight;
    var elementTop = reveals[i].getBoundingClientRect().top;
    var elementVisible = 150;

    if (elementTop < windowHeight - elementVisible) {
      reveals[i].classList.add("active");
    } else {
      reveals[i].classList.remove("active");
    }
  }
}

window.addEventListener("scroll", reveal);
                    

                function toggleSkill(button) {
                    button.classList.toggle('selected');

                    var selectedSkills = [];
                    var buttons = document.getElementsByClassName('skill-button');

                    for (var i = 0; i < buttons.length; i++) {
                        if (buttons[i].classList.contains('selected')) {
                            selectedSkills.push(buttons[i].textContent);
                        }
                    }

                    document.getElementById('skillsbuttons').value = selectedSkills.join(',');
                }


                



 
    var customPopup = document.getElementById('customPopup');
    var summaryTextarea = document.getElementById('summary');

    
    customPopup.style.display = 'none';

    function toggleCustomPopup() {
        if (customPopup.style.display === 'block') {
            customPopup.style.display = 'none';
        } else {
            customPopup.style.display = 'block';
        }
    }

    function fillTextarea(option) {
        summaryTextarea.value = summaryTextarea.value+option;
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



<p class="title_cv_form2" style="margin-top:20vh;margin-bottom:0px;margin-left:15vh">In order to create a cv you'll need to log in or create an accout</p>

<section id="login_cvpage" style="margin-top:20vh">
    
        
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
                <button class="seemore_main_button3" type="submit" name="forgot">Reset it</button>
            </div>
        </form>
    
</section>




<section id="bottom_section" style="margin-top:20vh">
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
    <p style="color: pink;font-size: 15px;">©2023 Cveasy Inc. All Rights Reserved</p>
</section>
    </body>
    </html>
    <?php
}

$conn->close();
?>
