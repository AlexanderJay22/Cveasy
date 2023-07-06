<!DOCTYPE html>
<htmal lang="en">
    <script src="scripts.js" type="text/javascript"></script>
    <head>
        <title>CVeasy</title>
        <link rel="stylesheet" href="Style3.css">
    


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
<body id="acs">
    

    
    



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

    <style>
        
    
        .wrapper{
            position:absolute;
            left: 90%;
            top: 0%;
            transform: translate(-50%,-50%);
            z-index: 800;
            overflow-x: hidden;
        
            
        }
        .wrapper2{
            position:absolute;
            left: 0%;
            top: 95%;
            transform: translate(-50%,-50%);
            z-index: 800;

        }
        #blob path{
            animation: blob 13s linear infinite;
            z-index: 800;
            overflow-x: hidden;
            
        }
        #blob{
            padding:0%;
            


        }
        #blob2 path{
            animation: blob 1s linear infinite;
            z-index: 800;
            
        }
        @keyframes blob2 {
            0% {
                d: path("M49.5,-62.1C61.2,-49.1,65.9,-30.8,66.7,-13.6C67.5,3.6,64.5,19.5,57.4,34.4C50.3,49.2,39.1,63,25.1,67.4C11.1,71.9,-5.8,67,-23.9,62C-41.9,57,-61.2,51.7,-71.8,38.8C-82.4,25.9,-84.4,5.3,-79.9,-12.9C-75.3,-31.2,-64.1,-47.1,-49.7,-59.7C-35.2,-72.3,-17.6,-81.5,0.6,-82.3C18.9,-83,37.7,-75.2,49.5,-62.1Z");
            }
            33% {
                d: path("M54,-61.6C67.8,-52.8,75.1,-33.7,78.5,-13.9C81.9,5.8,81.2,26.1,71.7,40.2C62.1,54.2,43.7,61.9,25.7,66.9C7.7,71.8,-10,73.9,-25,68.5C-40,63.1,-52.4,50.3,-60.5,35.3C-68.7,20.4,-72.6,3.5,-71.8,-14.7C-71,-32.8,-65.4,-52.1,-52.7,-61C-39.9,-70,-20,-68.6,0.1,-68.7C20.1,-68.8,40.3,-70.4,54,-61.6Z");
            }
            66% {
                d: path("M32,-37.9C46.4,-26,66.4,-20.6,71.1,-10.2C75.8,0.3,65.1,15.9,55,30.1C44.8,44.3,35.1,57.1,22.9,60.4C10.7,63.7,-4,57.5,-21.4,53.5C-38.9,49.4,-59.1,47.6,-62.7,37.9C-66.4,28.1,-53.5,10.5,-48.3,-6.7C-43.2,-23.9,-45.7,-40.7,-38.9,-53.9C-32.1,-67.2,-16.1,-77,-3.6,-72.6C8.8,-68.3,17.6,-49.9,32,-37.9Z");
            }
            100% {
                d: path("M49.5,-62.1C61.2,-49.1,65.9,-30.8,66.7,-13.6C67.5,3.6,64.5,19.5,57.4,34.4C50.3,49.2,39.1,63,25.1,67.4C11.1,71.9,-5.8,67,-23.9,62C-41.9,57,-61.2,51.7,-71.8,38.8C-82.4,25.9,-84.4,5.3,-79.9,-12.9C-75.3,-31.2,-64.1,-47.1,-49.7,-59.7C-35.2,-72.3,-17.6,-81.5,0.6,-82.3C18.9,-83,37.7,-75.2,49.5,-62.1Z");
            }

        }

        @keyframes blob {
            0% {
                d: path("M49.5,-62.1C61.2,-49.1,65.9,-30.8,66.7,-13.6C67.5,3.6,64.5,19.5,57.4,34.4C50.3,49.2,39.1,63,25.1,67.4C11.1,71.9,-5.8,67,-23.9,62C-41.9,57,-61.2,51.7,-71.8,38.8C-82.4,25.9,-84.4,5.3,-79.9,-12.9C-75.3,-31.2,-64.1,-47.1,-49.7,-59.7C-35.2,-72.3,-17.6,-81.5,0.6,-82.3C18.9,-83,37.7,-75.2,49.5,-62.1Z");
            }
            33% {
                d: path("M54,-61.6C67.8,-52.8,75.1,-33.7,78.5,-13.9C81.9,5.8,81.2,26.1,71.7,40.2C62.1,54.2,43.7,61.9,25.7,66.9C7.7,71.8,-10,73.9,-25,68.5C-40,63.1,-52.4,50.3,-60.5,35.3C-68.7,20.4,-72.6,3.5,-71.8,-14.7C-71,-32.8,-65.4,-52.1,-52.7,-61C-39.9,-70,-20,-68.6,0.1,-68.7C20.1,-68.8,40.3,-70.4,54,-61.6Z");
            }
            66% {
                d: path("M53.7,-61.6C66.7,-53,72.3,-33.4,71.3,-16C70.3,1.4,62.6,16.6,53.5,29.6C44.4,42.6,33.9,53.5,20.3,60.4C6.8,67.3,-9.9,70.2,-24.2,65.4C-38.5,60.7,-50.4,48.3,-61.5,33.4C-72.6,18.5,-82.9,1,-80.6,-14.6C-78.3,-30.3,-63.5,-44.2,-48,-52.3C-32.5,-60.5,-16.2,-62.9,2,-65.3C20.3,-67.8,40.7,-70.2,53.7,-61.6Z");
            }
            100% {
                d: path("M49.5,-62.1C61.2,-49.1,65.9,-30.8,66.7,-13.6C67.5,3.6,64.5,19.5,57.4,34.4C50.3,49.2,39.1,63,25.1,67.4C11.1,71.9,-5.8,67,-23.9,62C-41.9,57,-61.2,51.7,-71.8,38.8C-82.4,25.9,-84.4,5.3,-79.9,-12.9C-75.3,-31.2,-64.1,-47.1,-49.7,-59.7C-35.2,-72.3,-17.6,-81.5,0.6,-82.3C18.9,-83,37.7,-75.2,49.5,-62.1Z");
            }

        }


    </style>

    <section id="main_site" >

        <div class="wrapper">

            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" id="blob" width="90rem" z-index: 700;>
                <path fill="pink" d="M49.5,-62.1C61.2,-49.1,65.9,-30.8,66.7,-13.6C67.5,3.6,64.5,19.5,57.4,34.4C50.3,49.2,39.1,63,25.1,67.4C11.1,71.9,-5.8,67,-23.9,62C-41.9,57,-61.2,51.7,-71.8,38.8C-82.4,25.9,-84.4,5.3,-79.9,-12.9C-75.3,-31.2,-64.1,-47.1,-49.7,-59.7C-35.2,-72.3,-17.6,-81.5,0.6,-82.3C18.9,-83,37.7,-75.2,49.5,-62.1Z" transform="translate(100 100)" />
              </svg>

        </div>
        <div class="wrapper2">

            <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" id="blob" width="40rem" >
                <path fill="#35011d" d="M49.5,-62.1C61.2,-49.1,65.9,-30.8,66.7,-13.6C67.5,3.6,64.5,19.5,57.4,34.4C50.3,49.2,39.1,63,25.1,67.4C11.1,71.9,-5.8,67,-23.9,62C-41.9,57,-61.2,51.7,-71.8,38.8C-82.4,25.9,-84.4,5.3,-79.9,-12.9C-75.3,-31.2,-64.1,-47.1,-49.7,-59.7C-35.2,-72.3,-17.6,-81.5,0.6,-82.3C18.9,-83,37.7,-75.2,49.5,-62.1Z" transform="translate(100 100)" />
              </svg>

        </div>
        




       <p class="slideingright" style="font-size:7.3vh;padding-top: 0.2vh;margin-top:1vh"> Looking for a good <span style="font-size:8vh; color: #35011d;font-family: Comic Sans MS; ">CV</span></p>
       <p class="slideingright" style="font-size:7.3vh;padding-top: 0.2vh;margin-top:1vh"> We make it <span style="font-size: 8vh; color: #35011d;font-family: Comic Sans MS;">easy</span> </p>
       <a href="inceracre.php"><button class="cv_main_button slideingleft" >Get creative</button></a>
    </section>
    
    <section id="model_section" class="reveal">
       <p style="margin-top: 200px;">Check out a few models</p>
        <ul id="models">
            <li><img src="cv0.png" class="model_pictures"></li>
            <li><img src="cv1.png" class="model_pictures"></li>
            <li><img src="cv2.png" class="model_pictures"></li>
            <li><img src="cv3.png" class="model_pictures"></li>
            <li><img src="cv4.png" class="model_pictures"></li>
        </ul>
        <a href="Modelspage.php"><button class="seemore_main_button">See more</button></a>
    </section>



    <div id="about_section" class="reveal">
     <h1 style="margin-bottom: 150px;margin-right: 700px;font-size: 70px; z-index: 9998;">We try to make the process of employment easy</h1>
     <br>
     
     <p>Want to know more about us?</p>
     
    <a href="Aboutpage.php"><button class="explore_button">Learn More</button></a>
     
   
    </div>








    <style>
        .contact-form {
            display: flex;
            flex-direction: column;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
        }

        .contact-form label,
        .contact-form input,
        .contact-form textarea,
        .contact-form button {
            margin-bottom: 10px;
            max-width: 300px;
        }

        .contact-form label {
            font-weight: bold;
            background-color: transparent;
        }

        .contact-form input,
        .contact-form textarea {
            padding: 8px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        .contact-form button {
            padding: 8px 16px;
            background-color: pink;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 15px;
        }

        .contact-form button:hover {
            background-color: black;
            color: pink;
        }

        .contact-form .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .contact-form .popup-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 5px;
        }

        .contact-form .popup label,
        .contact-form .popup input,
        .contact-form .popup textarea,
        .contact-form .popup button {
            margin-bottom: 10px;
        }

        .contact-form .popup button {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $senderEmail = $_POST['sender-email'];
        $message = $_POST['message'];

      
        $recipientEmail = 'alexandrugaita2016@gmail.com';
        $ccEmail = 'raulusbalaurus@gmail.com';

        
        $subject = 'New Message from Contact Form';

       
        $headers = "From: $senderEmail\r\n";
        $headers .= "CC: $ccEmail\r\n";
        $headers .= "Content-type: text/plain\r\n";

        
        $success = mail($recipientEmail, $subject, $message, $headers);

        if (!$success) {
            echo "<p>Failed to send email. Please try again.</p>";
        }
    }
    ?>

    <div class="popup" id="popup">
        <div class="popup-content">
            <form id="contact-form" class="contact-form" method="POST" action="">
                <label for="sender-email">Your Email:</label>
                <input type="email" id="sender-email" name="sender-email" placeholder="Enter your email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" placeholder="Enter your message" required></textarea>

                <button type="submit">Send</button>
            </form>
        </div>
    </div>

    <section id="bottom_section">
        <h2 id="h2">Contact info</h2>
        <ul id="contacts">
            <li>
                <div>
                    <img src="logo_phone2.jpg" class="contact_logo">
                    <h2>Phone</h2>
                    <p>+40 729 816 434</p>
                    <p>+40 799 833 626</p>
                </div>
            </li>
            <div>
                <button onclick="togglePopup()" style="background-color:transparent;cursor:pointer;border-style:none"><img src="mail_logo3.jpg" class="contact_logo"></button>
                <h2>E-mail</h2>
                <p>raulusbalaurus@gmail.com</p>
                <p>alexandrugaita2016@gmail.com</p>
            </div>
            <div>
                <a href="https://www.google.com/maps/place/Strada+1+Decembrie+1918+7,+Petroșani/@45.4252318,23.366289,17z/data=!3m1!4b1!4m6!3m5!1s0x474dc4455f6cc1e3:0xb640f7fb0b14d0fe!8m2!3d45.4252076!4d23.3684916!16s%2Fg%2F11b8z4dtwx" target="_blank" rel="noopener noreferrer">
                    <img src="adress_logo.jpg" class="contact_logo">
                </a>
                <h2>Adress</h2>
                <p>Strada 1 Decembrie 1918,7 Petrosani</p>
            </div>
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

    <script>
        var popup = document.getElementById('popup');

        function togglePopup() {
            if (popup.style.display === 'block') {
                popup.style.display = 'none';
            } else {
                popup.style.display = 'block';
            }
        }

        window.addEventListener('DOMContentLoaded', function () {
            popup.style.display = 'none';
        });
    </script>
</body>
    
</htmal>