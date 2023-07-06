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
                <li><a href="tips.php"><button class="buton_activ">Tips</button></a></li>
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

   

    <section id="tips_site" >

       
       <p class="slideingright">Nervouse about your <span style="font-size: larger; color: #35011d;font-family: Comic Sans MS;">interview</span></p>
       <p class="slideingright">Here are the <span style="font-size: larger; color: #35011d;font-family: Comic Sans MS;">esentials</span> </p>
       
       <p style="color: #35011d;font-size: 200%;padding-top:2vh;padding-bottom: 2vh;">behaviour</p>
       <p style="color: #6B334C;font-size: 200%;padding-top:2vh;padding-bottom: 2vh;">talking</p>
       <p style="color: #AC7082;font-size: 200%;padding-top:2vh;padding-bottom: 2vh;">dresing</p>
       <p style="color: #ffc0cb;font-size: 200%;padding-top:2vh;padding-bottom: 2vh;">questions</p>
       <p style="color: #ffc0cb;font-size: 200%;padding-top:2vh;padding-bottom: 8vh;">Let's get you started</p>
       

       
    </section>
    
    <section id="behaviour_section" class="reveal">
      <h1 style="margin-bottom: 5rem;font-size: 70px; z-index: 9998;color: #ffc0cb;">Behaviour</h1>
     <br>
     <div class="card">
      <input id="ch" type="checkbox">
      <p style="padding-bottom: 1vh ;">Make a positive first impression</p>
      <div class="content">
        <p>People often remember you by your first impresion , so you better put on the best acting performance:</p>
        <p class="boxing"> Greet with a smile: When you first meet the interviewer, offer a warm smile. A genuine smile helps create a friendly and welcoming atmosphere. It also conveys your enthusiasm and positive attitude.</p>
        <p class="boxing"> Firm handshake (if applicable): In many cultures, a handshake is a common form of greeting. If it is customary in the culture or the specific company, offer a firm handshake when introduced to the interviewer. A firm handshake demonstrates confidence and professionalism. However, it's important to note that cultural norms and personal preferences may vary, so be observant and adapt accordingly.</p>
        <label for="ch">Show less</label>
      </div>
      <label for="ch">Show more</label>
    </div>

    <div class="card1">
      <input id="ch1" type="checkbox">
      <p style="padding-bottom: 1vh ;">Be mindful of your non-verbal cues</p>
      <div class="content1">
        <p>People also pay atention to your body language , so try to be confident:</p>
        <p class="boxing">Maintain good eye contact: Eye contact is an essential part of effective communication. It shows that you are attentive and engaged in the conversation. When interacting with the interviewer, make sure to maintain appropriate eye contact without staring or appearing overly intense. Balance your eye contact between the interviewer and other members of the interview panel, if applicable.</p>
        <p class="boxing">Confident body language: Your body language speaks volumes about your confidence and demeanor. Sit up straight, maintain good posture, and avoid slouching. Use open and expansive body positions, such as uncrossed arms, to convey openness and receptiveness. Avoid fidgeting or excessive movements, as they can indicate nervousness or distraction.</p>
        <label for="ch1">Show less</label>
      </div>
      <label for="ch1">Show more</label>
    </div>

    <div class="card2">
      <input id="ch2" type="checkbox">
      <p style="padding-bottom: 1vh ;">Be respectful and professional</p>
      <div class="content2">
        <p>A respectful behavior is often also the best:</p>
        <p class="boxing"> Professional demeanor: Maintain a professional demeanor throughout the interview. This includes displaying a calm and composed attitude, even in high-pressure situations. Stay focused on the conversation and avoid any distractions. Show appreciation for the opportunity to interview and remain positive and engaged in the discussion.</p>
        <p class="boxing"> Respectful behavior towards everyone: Treat everyone you encounter during the interview process with respect, including the receptionist, administrative staff, or any other individuals you may come across. The way you interact with others can reflect your character and professionalism. Be polite, courteous, and considerate to everyone, as their input may be valuable to the overall evaluation process.</p>
        <label for="ch2">Show less</label>
      </div>
      <label for="ch2">Show more</label>
    </div>

    
    <div class="card3">
      <input id="ch3" type="checkbox">
      <p style="padding-bottom: 1vh ;">Be punctual</p>
      <div class="content3">
        <p>Punctuality is a key virtue in bussines:</p>
        <p class="boxing"> Arrive on time for the interview, or even a few minutes early if possible. This demonstrates respect for the interviewer's time and shows that you are reliable.</p>
        <label for="ch3">Show less</label>
      </div>
      <label for="ch3">Show more</label>
    </div>



     

    
     
       
        
    </section>


    



    <div id="talking_section" class="reveal">
     <h1 style="margin-bottom: 5rem;font-size: 70px; z-index: 9998;color: #ffc0cb;">Talking</h1>
     <br>

     <div class="card4">
      <input id="ch4" type="checkbox">
      <p style="padding-bottom: 1vh ;">Be clear and concise</p>
      <div class="content4">
        <p>Stick to the subject:</p>
        <p  class="boxing"> Articulate your thoughts clearly and concisely. Avoid rambling or going off on tangents. Stay focused on the question at hand and provide relevant information. This demonstrates your ability to communicate effectively and efficiently.</p>
        <label for="ch4">Show less</label>
      </div>
      <label for="ch4">Show more</label>
    </div>

    <div class="card5">
      <input id="ch5" type="checkbox">
      <p style="padding-bottom: 1vh ;">Tailor your responses</p>
      <div class="content5">
        <p>A story that is easy to follow is often the best:</p>
        <p  class="boxing"> Choose relevant examples: Select examples that directly relate to the skills and qualities required for the position. Consider the job description and identify key competencies or experiences the company is seeking. Then, choose examples that highlight your proficiency in those areas.</p>
       <p  class="boxing"> Provide context: Start by briefly setting the stage and providing context for the example. Explain the situation or challenge you faced and provide any necessary background information to help the interviewer understand the scenario.</p>
        <label for="ch5">Show less</label>
      </div>
      <label for="ch5">Show more</label>
    </div>

    <div class="card6">
      <input id="ch6" type="checkbox">
      <p style="padding-bottom: 1vh ;">Showcase your communication skills</p>
      <div class="content6">
        <p>Comunication is a key aspect in bussines:</p>
        <p class="boxing">  Use your interview as an opportunity to showcase your strong communication skills. Speak confidently, vary your tone and pitch to add interest, and use appropriate language for a professional setting. Be an active listener and respond thoughtfully to any follow-up questions.</p>
        <label for="ch6">Show less</label>
      </div>
      <label for="ch6">Show more</label>
    </div>
     
   
    </div>
  
       
       <div id="question_section" class="reveal">
        <h1 style="color: pink;margin-bottom: 5rem;font-size: 70px; z-index: 9998;">Questions</h1>
        <br>
        
        <div class="card7">
          <input id="ch7" type="checkbox">
          <p style="padding-bottom: 1vh ;">Tell me about yourself.</p>
          <div class="content7">
            
            <p class="boxing"> Start with a brief introduction: Begin by providing your name and a concise overview of your professional background, such as your current or most recent position and the industry you have been working in.</p>
            <p class="boxing"> Highlight key qualifications: Mention a few key qualifications, skills, or experiences that make you a strong fit for the role you are interviewing for. Focus on those that directly align with the requirements and responsibilities outlined in the job description.</p>
            <p class="boxing"> Discuss relevant achievements: Share notable accomplishments or projects that demonstrate your expertise and achievements in previous roles. Emphasize outcomes and results, such as improvements you made, awards you received, or any significant contributions you made to your team or organization.</p>
            <label for="ch7">Show less</label>
          </div>
          <label for="ch7">Show more</label>
        </div>

        <div class="card8">
          <input id="ch8" type="checkbox">
          <p style="padding-bottom: 1vh ;">How do you handle stress or pressure?</p>
          <div class="content8">
            
            <p class="boxing">Acknowledge the importance of stress management: Start by acknowledging that stress and pressure are natural parts of the workplace, and it's essential to have strategies in place to manage them effectively.</p>
            <p class="boxing"> Share your coping mechanisms: Discuss specific techniques or approaches you use to handle stress.</p>
            <p class="boxing"> Provide a relevant example: Share a specific example from your past experience where you successfully managed stress or pressure. Describe the situation, the specific challenges you faced, the actions you took to address the situation, and the positive outcome that resulted from your effective stress management approach. Emphasize any lessons you learned from that experience.</p>
            <label for="ch8">Show less</label>
          </div>
          <label for="ch8">Show more</label>
        </div>

        <div class="card9">
          <input id="ch9" type="checkbox">
          <p style="padding-bottom: 1vh ;">What are your short-term and long-term career goals?</p>
          <div class="content9">
            
            <p class="boxing"> Discuss your short-term goals: Start by outlining your immediate career aspirations or short-term goals. These goals should demonstrate your ambition, enthusiasm, and readiness to contribute to the company.</p>
            <p class="boxing"> Address your long-term goals: Next, discuss your long-term career goals. Emphasize how these goals align with the company's vision, mission, and values. Be authentic and realistic in your aspirations.</p>
            
            <label for="ch9">Show less</label>
          </div>
          <label for="ch9">Show more</label>
        </div>

        <div class="card10">
          <input id="ch10" type="checkbox">
          <p style="padding-bottom: 1vh ;">How do you handle feedback or criticism?</p>
          <div class="content10">
          
            <p class="boxing"> Emphasize openness to feedback: Start by expressing your openness and willingness to receive feedback. Highlight that you view feedback as an opportunity for growth and improvement, rather than a personal attack.</p>
            <p class="boxing"> Active listening and understanding: Discuss your approach to actively listening to feedback. Explain how you pay close attention to the specific points being made, seeking to understand the rationale behind the feedback and the areas where improvement or adjustment is needed.</p>
            <p class="boxing"> Maintain a professional and positive attitude: Highlight that you maintain a professional demeanor when receiving feedback, regardless of whether it is positive or constructive criticism. Express that you remain calm and composed, avoiding any defensiveness or emotional reactions.</p>
            <label for="ch10">Show less</label>
          </div>
          <label for="ch10">Show more</label>
        </div>

        
       
        
      
       </div>
       <div id="dresing_section" class="reveal">
        <h1 style="margin-bottom: 5rem;font-size: 70px; z-index: 9998;color: #ffc0cb">Good luck with your interview</h1>
        <br>
        
        
        
        
       
        
      
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
        } else {
            echo "<p>Email sent successfully!</p>";
        }
    }
    ?>

    

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