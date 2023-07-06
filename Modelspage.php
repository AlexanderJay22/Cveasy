<!DOCTYPE html>
<htmal lang="en">
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
<body >

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
    
    <section id="model_list" style="margin-top:20vh" >
      <div class="swiper mySwiper1">
        <div class="swiper-wrapper">
          <div class="swiper-slide"><a href="inceracre.php"><img src="cv0.png" class="model_pictures_modelpage"></a></div>
          <div class="swiper-slide"><a href="inceracre.php"><img src="cv1.png" class="model_pictures_modelpage"></a></div>
          <div class="swiper-slide"><a href="inceracre.php"><img src="cv2.png" class="model_pictures_modelpage"></a></div>
          <div class="swiper-slide"><a href="inceracre.php"><img src="cv3.png" class="model_pictures_modelpage"></a></div>
          <div class="swiper-slide"><a href="inceracre.php"><img src="cv4.png" class="model_pictures_modelpage"></a></div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    
      <!-- Swiper JS -->
      <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    
      <!-- Initialize Swiper -->
      <script>
        var swiper = new Swiper(".mySwiper1", {
          slidesPerView: 3,
          spaceBetween: 30,
          autoplay: {
          delay: 3000,
          disableOnInteraction: false,
          },
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },

        });
      </script>
<div class="swiper mySwiper2">
  <div class="swiper-wrapper">
    <div class="swiper-slide"><a href="inceracre.php"><img src="cv5.png" class="model_pictures_modelpage"></a></div>
    <div class="swiper-slide"><a href="inceracre.php"><img src="cv6.png" class="model_pictures_modelpage"></a></div>
    <div class="swiper-slide"><a href="inceracre.php"><img src="cv0.png" class="model_pictures_modelpage"></a></div>
    <div class="swiper-slide"><a href="inceracre.php"><img src="cv1.png" class="model_pictures_modelpage"></a></div>
    <div class="swiper-slide"><a href="inceracre.php"><img src="cv2.png" class="model_pictures_modelpage"></a></div>
  </div>
  <div class="swiper-pagination"></div>
</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper2", {
    slidesPerView: 3,
    spaceBetween: 30,
    autoplay: {
    delay: 2500,
    disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },

  });
</script>
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
        <li><img src="instagram-5-32.png" class="footer_logo"></li>
        <li><img src="facebook-4-48.png" class="footer_logo"></li>
        <li><img src="twitter-5-32.png" class="footer_logo"></li>
      </ul>
      <p style="color: pink;font-size: 15px;">©2023 Cveasy Inc. All Rights Reserved</p>
    </section>


</body>
    
</htmal>
