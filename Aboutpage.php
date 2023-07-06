<!DOCTYPE html>
<htmal lang="en" >
    <head>
        <title>CVeasy</title>
        <link rel="stylesheet" href="Style3.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />


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
 <section id="header">
  <a href="webfile.php"><img src="logo_flamingo.jpeg"  class="logo" ></img></a>
 <div>
      <ul id="navbar">
          <li><a href="inceracre.php"><button class="cv_bar_button">Create</button></a></li>
          <li><a href="Aboutpage.php"><button class="buton_activ">About</button></a></li>
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
  <section id="about_site" >
    <p class="font_pre abCV">What is our mission ?</p>
   <div class="about_box1 font_pre"><p>Here at CVeasy we try to inovete in every aspect that we can</p> </div>
   <div class="about_box2 font_pre"><p>Besides porfesional looking models for the CV we try to ease the process of making one</p></div>
   <div class="about_box3 font_pre"><p>With us your CV will look greater than ever , and your interviw skills like no one has ever seen before</p></div>
   <div class="about_box2 font_pre"><p>In terms of your personal data , we make sure nobody other than you can see it</p></div>
   <div class="about_box1 font_pre"><p>If you are looking for a good CV  we make it easy</p> </div>
   
</section>
<section style="background-image: linear-gradient(#ffffff, pink);">
<section class="tabel">

  <section class="article">
    <div class="hero">
      <h1 class="font_pre">Who owns CVeasy?</h1>
      <p></p>
      
    </div>
    <div class="grid">
      <img src="alex.jpeg"  class="pojica" ></img>
      <p class="quote font_pre font_pre">"Veni , Vidi , Vici"</p>
      <p class="name font_pre">Gaita Alexandru</p>
      
      <p class="inform1 font_pre">I wish that through this project, I can make my mark in the field of work by revolutionizing the way a CV is created. I believe that my altruistic spirit will be reflected in the way the website has been designed, aiming to create a pleasant experience for the users. Because for me, as in any successful business, 'Our client, our master'.</p>
      
      
      <p class="quote font_pre">"Work hard - Play hard"</p>
      <img src="acs.jpeg"  class="pojica" ></img>
      
      
      
      <p class="inform2 font_pre">I consider this website as my chance to fix the issues encountered on other CV creation sites. Therefore, in this project, everything is created with passion and with the aim of improvement and innovation. </p>
      <p class="name2 font_pre">Acs Raul</p>

    </div>
  </section>
  <aside class="sticky font_pre">Creators</aside>
</section>
</section>
  
    




   

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