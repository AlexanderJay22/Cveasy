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
        $adress = isset($_POST['adress']) ? sanitizeInput($_POST['adress']) : "";
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
                adress = '$adress',
                phone = '$phone',
                employment = '$employment',
                summary = '$summary',
                languages = '$languages',
                skillsbuttons = '$skillsButtons',
                skillsuser = '$skillsUser'
                WHERE email = '$email'";

$email = $_SESSION['email'];

     
        $fileName = $_FILES['photo']['name'];
        $tempFilePath = $_FILES['photo']['tmp_name'];

      
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = uniqid() . '.' . $fileExtension;

     
        $targetDirectory = 'user_photo/';
        $targetFilePath = $targetDirectory . $newFileName;

        
        if (move_uploaded_file($tempFilePath, $targetFilePath)) {
            
            $selectPhotoQuery = "SELECT user_photo FROM users WHERE email = '$email'";
            $selectPhotoResult = $conn->query($selectPhotoQuery);

            if ($selectPhotoResult->num_rows > 0) {
                $row = $selectPhotoResult->fetch_assoc();
                $oldFilePath = $row['user_photo'];

                
                if (!empty($oldFilePath) && file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            
            $updateQuery = "UPDATE users SET user_photo = '$targetFilePath' WHERE email = '$email'";

            if ($conn->query($updateQuery) === TRUE) {
                echo "Photo uploaded successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            echo "Error uploading photo";
        }
    }
}



            if ($conn->query($updateQuery) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            
            echo "User not found";
        }
    
        


if (isset($_SESSION['isLoggedIn'])) {
    $email = $_SESSION['email'];

    
    $selectSql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($selectSql);

    if ($result->num_rows > 0) {
   
        $row = $result->fetch_assoc();
        ?>

        <!DOCTYPE html>
        <html style="height:300vh;width:200vh">
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

            

            <?php
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$email = $row['email'];
$address = $row['adress'];
$phone = $row['phone'];
$employment = $row['employment'];
$summary = $row['summary'];
$languages = $row['languages'];
$skillsbuttons = $row['skillsbuttons'];
$skillsuser = $row['skillsuser'];
?>


<div style="margin-top:20vh;margin-left:10vh">
<section id="cv_final" style="width: 110vh;height: 146vh;" >

<div id="div1"class="hidden">
        <div class="cv-container1 " ondragover="allowDrop(event)" ondrop="drop(event)">
         <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left: 46%; top: 7%;">
           <span id="name_cv" onclick="togglePopup(event)">Name: <?php echo $firstname . ' ' . $lastname; ?></span>
           <div class="popup" id="popupName">
             <span class="font-option" onclick="changeFont(event, 'Arial')">Arial</span>
             <span class="font-option" onclick="changeFont(event, 'Times New Roman')">Times New Roman</span>
             <span class="font-option" onclick="changeFont(event, 'Courier New')">Courier New</span>
             <span class="font-option" onclick="changeFont(event, 'Verdana')">Verdana</span>
             <span class="font-option" onclick="changeFont(event, 'Helvetica')">Helvetica</span>
             <hr>
             <span class="color-option" onclick="changeColor(event, 'red')">Red</span>
             <span class="color-option" onclick="changeColor(event, 'blue')">Blue</span>
             <span class="color-option" onclick="changeColor(event, 'green')">Green</span>
             <span class="color-option" onclick="changeColor(event, 'black')">Black</span>
             <span class="color-option" onclick="changeColor(event, 'pink')">Pink</span>
           </div>
         </div>
       
         <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left: 2%; top: 22%;">
           <span id="email_cv" onclick="togglePopup(event)">Email: <?php echo $email; ?></span>
           <div class="popup" id="popupEmail">
             <span class="font-option" onclick="changeFont(event, 'Arial')">Arial</span>
             <span class="font-option" onclick="changeFont(event, 'Times New Roman')">Times New Roman</span>
             <span class="font-option" onclick="changeFont(event, 'Courier New')">Courier New</span>
             <span class="font-option" onclick="changeFont(event, 'Verdana')">Verdana</span>
             <span class="font-option" onclick="changeFont(event, 'Helvetica')">Helvetica</span>
             <hr>
             <span class="color-option" onclick="changeColor(event, 'red')">Red</span>
             <span class="color-option" onclick="changeColor(event, 'blue')">Blue</span>
             <span class="color-option" onclick="changeColor(event, 'green')">Green</span>
             <span class="color-option" onclick="changeColor(event, 'black')">Black</span>
             <span class="color-option" onclick="changeColor(event, 'pink')">Pink</span>
           </div>
         </div>
       
          <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left: 10%; top: 4%;">
          <img src="data:image/jpeg;base64,<?php echo base64_encode($row['user_photo']); ?>" style="width:20vh;height:20vh;border-radius:50%" alt="Profile Photo">
            <div class="popup" id="popupUserPhoto">                    
            </div>
          </div>
       
         <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left: 2%; top: 27%;">
           <span id="address_cv" onclick="togglePopup(event)">Address: <?php echo $address; ?></span>
           <div class="popup" id="popupAddress">
             <span class="font-option" onclick="changeFont(event, 'Arial')">Arial</span>
             <span class="font-option" onclick="changeFont(event, 'Times New Roman')">Times New Roman</span>
             <span class="font-option" onclick="changeFont(event, 'Courier New')">Courier New</span>
             <span class="font-option" onclick="changeFont(event, 'Verdana')">Verdana</span>
             <span class="font-option" onclick="changeFont(event, 'Helvetica')">Helvetica</span>
             <hr>
             <span class="color-option" onclick="changeColor(event, 'red')">Red</span>
             <span class="color-option" onclick="changeColor(event, 'blue')">Blue</span>
             <span class="color-option" onclick="changeColor(event, 'green')">Green</span>
             <span class="color-option" onclick="changeColor(event, 'black')">Black</span>
             <span class="color-option" onclick="changeColor(event, 'pink')">Pink</span>
           </div>
         </div>
       
         <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left: 2%; top: 32%;">
           <span id="phone_cv" onclick="togglePopup(event)">Phone: <?php echo $phone; ?></span>
           <div class="popup" id="popupPhone">
             <span class="font-option" onclick="changeFont(event, 'Arial')">Arial</span>
             <span class="font-option" onclick="changeFont(event, 'Times New Roman')">Times New Roman</span>
             <span class="font-option" onclick="changeFont(event, 'Courier New')">Courier New</span>
             <span class="font-option" onclick="changeFont(event, 'Verdana')">Verdana</span>
             <span class="font-option" onclick="changeFont(event, 'Helvetica')">Helvetica</span>
             <hr>
             <span class="color-option" onclick="changeColor(event, 'red')">Red</span>
             <span class="color-option" onclick="changeColor(event, 'blue')">Blue</span>
             <span class="color-option" onclick="changeColor(event, 'green')">Green</span>
             <span class="color-option" onclick="changeColor(event, 'black')">Black</span>
             <span class="color-option" onclick="changeColor(event, 'pink')">Pink</span>
           </div>
         </div>
       
         <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left: 46%; top: 55%;">
           <span id="employment_cv" onclick="togglePopup(event)">Employment: <?php echo $employment; ?></span>
           <div class="popup" id="popupEmployment">
             <span class="font-option" onclick="changeFont(event, 'Arial')">Arial</span>
             <span class="font-option" onclick="changeFont(event, 'Times New Roman')">Times New Roman</span>
             <span class="font-option" onclick="changeFont(event, 'Courier New')">Courier New</span>
             <span class="font-option" onclick="changeFont(event, 'Verdana')">Verdana</span>
             <span class="font-option" onclick="changeFont(event, 'Helvetica')">Helvetica</span>
             <hr>
             <span class="color-option" onclick="changeColor(event, 'red')">Red</span>
             <span class="color-option" onclick="changeColor(event, 'blue')">Blue</span>
             <span class="color-option" onclick="changeColor(event, 'green')">Green</span>
             <span class="color-option" onclick="changeColor(event, 'black')">Black</span>
             <span class="color-option" onclick="changeColor(event, 'pink')">Pink</span>
           </div>
         </div>
       
         <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left: 46%; top: 24%;">
           <span id="summary_cv" onclick="togglePopup(event)">Summary: <?php echo $summary; ?></span>
           <div class="popup" id="popupSummary">
             <span class="font-option" onclick="changeFont(event, 'Arial')">Arial</span>
             <span class="font-option" onclick="changeFont(event, 'Times New Roman')">Times New Roman</span>
             <span class="font-option" onclick="changeFont(event, 'Courier New')">Courier New</span>
             <span class="font-option" onclick="changeFont(event, 'Verdana')">Verdana</span>
             <span class="font-option" onclick="changeFont(event, 'Helvetica')">Helvetica</span>
             <hr>
             <span class="color-option" onclick="changeColor(event, 'red')">Red</span>
             <span class="color-option" onclick="changeColor(event, 'blue')">Blue</span>
             <span class="color-option" onclick="changeColor(event, 'green')">Green</span>
             <span class="color-option" onclick="changeColor(event, 'black')">Black</span>
             <span class="color-option" onclick="changeColor(event, 'pink')">Pink</span>
           </div>
         </div>
       
         <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left: 2%; top: 80%;">
           <span id="languages_cv" onclick="togglePopup(event)">Languages: <?php echo $languages; ?></span>
           <div class="popup" id="popupLanguages">
             <span class="font-option" onclick="changeFont(event, 'Arial')">Arial</span>
             <span class="font-option" onclick="changeFont(event, 'Times New Roman')">Times New Roman</span>
             <span class="font-option" onclick="changeFont(event, 'Courier New')">Courier New</span>
             <span class="font-option" onclick="changeFont(event, 'Verdana')">Verdana</span>
             <span class="font-option" onclick="changeFont(event, 'Helvetica')">Helvetica</span>
             <hr>
             <span class="color-option" onclick="changeColor(event, 'red')">Red</span>
             <span class="color-option" onclick="changeColor(event, 'blue')">Blue</span>
             <span class="color-option" onclick="changeColor(event, 'green')">Green</span>
             <span class="color-option" onclick="changeColor(event, 'black')">Black</span>
             <span class="color-option" onclick="changeColor(event, 'pink')">Pink</span>
           </div>
         </div>
       
         <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left: 2%; top: 40%;">
           <span id="skillsbuttons_cv" onclick="togglePopup(event)">Skills <?php echo $skillsbuttons; ?></span>
           <div class="popup" id="popupSkillsButtons">
             <span class="font-option" onclick="changeFont(event, 'Arial')">Arial</span>
             <span class="font-option" onclick="changeFont(event, 'Times New Roman')">Times New Roman</span>
             <span class="font-option" onclick="changeFont(event, 'Courier New')">Courier New</span>
             <span class="font-option" onclick="changeFont(event, 'Verdana')">Verdana</span>
             <span class="font-option" onclick="changeFont(event, 'Helvetica')">Helvetica</span>
             <hr>
             <span class="color-option" onclick="changeColor(event, 'red')">Red</span>
             <span class="color-option" onclick="changeColor(event, 'blue')">Blue</span>
             <span class="color-option" onclick="changeColor(event, 'green')">Green</span>
             <span class="color-option" onclick="changeColor(event, 'black')">Black</span>
             <span class="color-option" onclick="changeColor(event, 'pink')">Pink</span>
           </div>
         </div>
       
         <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left:2%; top: 55%">
           <span id="skillsuser_cv" onclick="togglePopup(event)"> <?php echo $skillsuser; ?></span>
           <div class="popup" id="popupSkillsUser">
             <span class="font-option" onclick="changeFont(event, 'Arial')">Arial</span>
             <span class="font-option" onclick="changeFont(event, 'Times New Roman')">Times New Roman</span>
             <span class="font-option" onclick="changeFont(event, 'Courier New')">Courier New</span>
             <span class="font-option" onclick="changeFont(event, 'Verdana')">Verdana</span>
             <span class="font-option" onclick="changeFont(event, 'Helvetica')">Helvetica</span>
             <hr>
             <span class="color-option" onclick="changeColor(event, 'red')">Red</span>
             <span class="color-option" onclick="changeColor(event, 'blue')">Blue</span>
             <span class="color-option" onclick="changeColor(event, 'green')">Green</span>
             <span class="color-option" onclick="changeColor(event, 'black')">Black</span>
             <span class="color-option" onclick="changeColor(event, 'pink')">Pink</span>
           </div>
         </div>
        </div>
       
         








           </div>

           <div id="div2"class="hidden">
        <div class="cv-container2 " ondragover="allowDrop(event)" ondrop="drop(event)">
         <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left: 43%; top: 12%;">
           <span id="name_cv" onclick="togglePopup(event)">Name: <?php echo $firstname . ' ' . $lastname; ?></span>
           <div class="popup" id="popupName">
             <span class="font-option" onclick="changeFont(event, 'Arial')">Arial</span>
             <span class="font-option" onclick="changeFont(event, 'Times New Roman')">Times New Roman</span>
             <span class="font-option" onclick="changeFont(event, 'Courier New')">Courier New</span>
             <span class="font-option" onclick="changeFont(event, 'Verdana')">Verdana</span>
             <span class="font-option" onclick="changeFont(event, 'Helvetica')">Helvetica</span>
             <hr>
             <span class="color-option" onclick="changeColor(event, 'red')">Red</span>
             <span class="color-option" onclick="changeColor(event, 'blue')">Blue</span>
             <span class="color-option" onclick="changeColor(event, 'green')">Green</span>
             <span class="color-option" onclick="changeColor(event, 'black')">Black</span>
             <span class="color-option" onclick="changeColor(event, 'pink')">Pink</span>
           </div>
         </div>
       
         <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left: 2%; top: 90%;">
           <span id="email_cv" onclick="togglePopup(event)">Email: <?php echo $email; ?></span>
           <div class="popup" id="popupEmail">
             <span class="font-option" onclick="changeFont(event, 'Arial')">Arial</span>
             <span class="font-option" onclick="changeFont(event, 'Times New Roman')">Times New Roman</span>
             <span class="font-option" onclick="changeFont(event, 'Courier New')">Courier New</span>
             <span class="font-option" onclick="changeFont(event, 'Verdana')">Verdana</span>
             <span class="font-option" onclick="changeFont(event, 'Helvetica')">Helvetica</span>
             <hr>
             <span class="color-option" onclick="changeColor(event, 'red')">Red</span>
             <span class="color-option" onclick="changeColor(event, 'blue')">Blue</span>
             <span class="color-option" onclick="changeColor(event, 'green')">Green</span>
             <span class="color-option" onclick="changeColor(event, 'black')">Black</span>
             <span class="color-option" onclick="changeColor(event, 'pink')">Pink</span>
           </div>
         </div>
       
          <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left: 18%; top: 12%;">
          <img src="data:image/jpeg;base64,<?php echo base64_encode($row['user_photo']); ?>" style="width:20vh;height:20vh;border-radius:50%" alt="Profile Photo">
            <div class="popup" id="popupUserPhoto">                    
            </div>
          </div>
       
         <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left: 2%; top: 85%;">
           <span id="address_cv" onclick="togglePopup(event)">Address: <?php echo $address; ?></span>
           <div class="popup" id="popupAddress">
             <span class="font-option" onclick="changeFont(event, 'Arial')">Arial</span>
             <span class="font-option" onclick="changeFont(event, 'Times New Roman')">Times New Roman</span>
             <span class="font-option" onclick="changeFont(event, 'Courier New')">Courier New</span>
             <span class="font-option" onclick="changeFont(event, 'Verdana')">Verdana</span>
             <span class="font-option" onclick="changeFont(event, 'Helvetica')">Helvetica</span>
             <hr>
             <span class="color-option" onclick="changeColor(event, 'red')">Red</span>
             <span class="color-option" onclick="changeColor(event, 'blue')">Blue</span>
             <span class="color-option" onclick="changeColor(event, 'green')">Green</span>
             <span class="color-option" onclick="changeColor(event, 'black')">Black</span>
             <span class="color-option" onclick="changeColor(event, 'pink')">Pink</span>
           </div>
         </div>
       
         <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left: 2%; top: 80%;">
           <span id="phone_cv" onclick="togglePopup(event)">Phone: <?php echo $phone; ?></span>
           <div class="popup" id="popupPhone">
             <span class="font-option" onclick="changeFont(event, 'Arial')">Arial</span>
             <span class="font-option" onclick="changeFont(event, 'Times New Roman')">Times New Roman</span>
             <span class="font-option" onclick="changeFont(event, 'Courier New')">Courier New</span>
             <span class="font-option" onclick="changeFont(event, 'Verdana')">Verdana</span>
             <span class="font-option" onclick="changeFont(event, 'Helvetica')">Helvetica</span>
             <hr>
             <span class="color-option" onclick="changeColor(event, 'red')">Red</span>
             <span class="color-option" onclick="changeColor(event, 'blue')">Blue</span>
             <span class="color-option" onclick="changeColor(event, 'green')">Green</span>
             <span class="color-option" onclick="changeColor(event, 'black')">Black</span>
             <span class="color-option" onclick="changeColor(event, 'pink')">Pink</span>
           </div>
         </div>
       
         <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left: 2%; top: 55%;">
           <span id="employment_cv" onclick="togglePopup(event)">Employment: <?php echo $employment; ?></span>
           <div class="popup" id="popupEmployment">
             <span class="font-option" onclick="changeFont(event, 'Arial')">Arial</span>
             <span class="font-option" onclick="changeFont(event, 'Times New Roman')">Times New Roman</span>
             <span class="font-option" onclick="changeFont(event, 'Courier New')">Courier New</span>
             <span class="font-option" onclick="changeFont(event, 'Verdana')">Verdana</span>
             <span class="font-option" onclick="changeFont(event, 'Helvetica')">Helvetica</span>
             <hr>
             <span class="color-option" onclick="changeColor(event, 'red')">Red</span>
             <span class="color-option" onclick="changeColor(event, 'blue')">Blue</span>
             <span class="color-option" onclick="changeColor(event, 'green')">Green</span>
             <span class="color-option" onclick="changeColor(event, 'black')">Black</span>
             <span class="color-option" onclick="changeColor(event, 'pink')">Pink</span>
           </div>
         </div>
       
         <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left: 2%; top: 30%;">
           <span id="summary_cv" onclick="togglePopup(event)">Summary: <?php echo $summary; ?></span>
           <div class="popup" id="popupSummary">
             <span class="font-option" onclick="changeFont(event, 'Arial')">Arial</span>
             <span class="font-option" onclick="changeFont(event, 'Times New Roman')">Times New Roman</span>
             <span class="font-option" onclick="changeFont(event, 'Courier New')">Courier New</span>
             <span class="font-option" onclick="changeFont(event, 'Verdana')">Verdana</span>
             <span class="font-option" onclick="changeFont(event, 'Helvetica')">Helvetica</span>
             <hr>
             <span class="color-option" onclick="changeColor(event, 'red')">Red</span>
             <span class="color-option" onclick="changeColor(event, 'blue')">Blue</span>
             <span class="color-option" onclick="changeColor(event, 'green')">Green</span>
             <span class="color-option" onclick="changeColor(event, 'black')">Black</span>
             <span class="color-option" onclick="changeColor(event, 'pink')">Pink</span>
           </div>
         </div>
       
         <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left: 43%; top: 75%;">
           <span id="languages_cv" onclick="togglePopup(event)">Languages: <?php echo $languages; ?></span>
           <div class="popup" id="popupLanguages">
             <span class="font-option" onclick="changeFont(event, 'Arial')">Arial</span>
             <span class="font-option" onclick="changeFont(event, 'Times New Roman')">Times New Roman</span>
             <span class="font-option" onclick="changeFont(event, 'Courier New')">Courier New</span>
             <span class="font-option" onclick="changeFont(event, 'Verdana')">Verdana</span>
             <span class="font-option" onclick="changeFont(event, 'Helvetica')">Helvetica</span>
             <hr>
             <span class="color-option" onclick="changeColor(event, 'red')">Red</span>
             <span class="color-option" onclick="changeColor(event, 'blue')">Blue</span>
             <span class="color-option" onclick="changeColor(event, 'green')">Green</span>
             <span class="color-option" onclick="changeColor(event, 'black')">Black</span>
             <span class="color-option" onclick="changeColor(event, 'pink')">Pink</span>
           </div>
         </div>
       
         <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left: 43%; top: 25%;">
           <span id="skillsbuttons_cv" onclick="togglePopup(event)">Skills: <?php echo $skillsbuttons; ?></span>
           <div class="popup" id="popupSkillsButtons">
             <span class="font-option" onclick="changeFont(event, 'Arial')">Arial</span>
             <span class="font-option" onclick="changeFont(event, 'Times New Roman')">Times New Roman</span>
             <span class="font-option" onclick="changeFont(event, 'Courier New')">Courier New</span>
             <span class="font-option" onclick="changeFont(event, 'Verdana')">Verdana</span>
             <span class="font-option" onclick="changeFont(event, 'Helvetica')">Helvetica</span>
             <hr>
             <span class="color-option" onclick="changeColor(event, 'red')">Red</span>
             <span class="color-option" onclick="changeColor(event, 'blue')">Blue</span>
             <span class="color-option" onclick="changeColor(event, 'green')">Green</span>
             <span class="color-option" onclick="changeColor(event, 'black')">Black</span>
             <span class="color-option" onclick="changeColor(event, 'pink')">Pink</span>
           </div>
         </div>
       
         <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left:43%; top: 40%">
           <span id="skillsuser_cv" onclick="togglePopup(event)"> <?php echo $skillsuser; ?></span>
           <div class="popup" id="popupSkillsUser">
             <span class="font-option" onclick="changeFont(event, 'Arial')">Arial</span>
             <span class="font-option" onclick="changeFont(event, 'Times New Roman')">Times New Roman</span>
             <span class="font-option" onclick="changeFont(event, 'Courier New')">Courier New</span>
             <span class="font-option" onclick="changeFont(event, 'Verdana')">Verdana</span>
             <span class="font-option" onclick="changeFont(event, 'Helvetica')">Helvetica</span>
             <hr>
             <span class="color-option" onclick="changeColor(event, 'red')">Red</span>
             <span class="color-option" onclick="changeColor(event, 'blue')">Blue</span>
             <span class="color-option" onclick="changeColor(event, 'green')">Green</span>
             <span class="color-option" onclick="changeColor(event, 'black')">Black</span>
             <span class="color-option" onclick="changeColor(event, 'pink')">Pink</span>
           </div>
         </div>
        </div>
       
         
           

    </div>
    <div id="div3"class="hidden">
        <div class="cv-container3 " ondragover="allowDrop(event)" ondrop="drop(event)">
         <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left: 30%; top: 5%;">
           <span id="name_cv" onclick="togglePopup(event)"> <?php echo $firstname . ' ' . $lastname; ?></span>
           <div class="popup" id="popupName">
             <span class="font-option" onclick="changeFont(event, 'Arial')">Arial</span>
             <span class="font-option" onclick="changeFont(event, 'Times New Roman')">Times New Roman</span>
             <span class="font-option" onclick="changeFont(event, 'Courier New')">Courier New</span>
             <span class="font-option" onclick="changeFont(event, 'Verdana')">Verdana</span>
             <span class="font-option" onclick="changeFont(event, 'Helvetica')">Helvetica</span>
             <hr>
             <span class="color-option" onclick="changeColor(event, 'red')">Red</span>
             <span class="color-option" onclick="changeColor(event, 'blue')">Blue</span>
             <span class="color-option" onclick="changeColor(event, 'green')">Green</span>
             <span class="color-option" onclick="changeColor(event, 'black')">Black</span>
             <span class="color-option" onclick="changeColor(event, 'pink')">Pink</span>
           </div>
         </div>
       
         <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left: 67%; top: 65%;">
           <span id="email_cv" onclick="togglePopup(event)">Email: <?php echo $email; ?></span>
           <div class="popup" id="popupEmail">
             <span class="font-option" onclick="changeFont(event, 'Arial')">Arial</span>
             <span class="font-option" onclick="changeFont(event, 'Times New Roman')">Times New Roman</span>
             <span class="font-option" onclick="changeFont(event, 'Courier New')">Courier New</span>
             <span class="font-option" onclick="changeFont(event, 'Verdana')">Verdana</span>
             <span class="font-option" onclick="changeFont(event, 'Helvetica')">Helvetica</span>
             <hr>
             <span class="color-option" onclick="changeColor(event, 'red')">Red</span>
             <span class="color-option" onclick="changeColor(event, 'blue')">Blue</span>
             <span class="color-option" onclick="changeColor(event, 'green')">Green</span>
             <span class="color-option" onclick="changeColor(event, 'black')">Black</span>
             <span class="color-option" onclick="changeColor(event, 'pink')">Pink</span>
           </div>
         </div>
       
          <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left: 15%; top: 10%;">
          <img src="data:image/jpeg;base64,<?php echo base64_encode($row['user_photo']); ?>" style="width:20vh;height:20vh" alt="Profile Photo">
            <div class="popup" id="popupUserPhoto">                    
            </div>
          </div>
       
         <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left: 67%; top: 60%;">
           <span id="address_cv" onclick="togglePopup(event)">Address: <?php echo $address; ?></span>
           <div class="popup" id="popupAddress">
             <span class="font-option" onclick="changeFont(event, 'Arial')">Arial</span>
             <span class="font-option" onclick="changeFont(event, 'Times New Roman')">Times New Roman</span>
             <span class="font-option" onclick="changeFont(event, 'Courier New')">Courier New</span>
             <span class="font-option" onclick="changeFont(event, 'Verdana')">Verdana</span>
             <span class="font-option" onclick="changeFont(event, 'Helvetica')">Helvetica</span>
             <hr>
             <span class="color-option" onclick="changeColor(event, 'red')">Red</span>
             <span class="color-option" onclick="changeColor(event, 'blue')">Blue</span>
             <span class="color-option" onclick="changeColor(event, 'green')">Green</span>
             <span class="color-option" onclick="changeColor(event, 'black')">Black</span>
             <span class="color-option" onclick="changeColor(event, 'pink')">Pink</span>
           </div>
         </div>
       
         <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left: 67%; top: 55%;">
           <span id="phone_cv" onclick="togglePopup(event)">Phone: <?php echo $phone; ?></span>
           <div class="popup" id="popupPhone">
             <span class="font-option" onclick="changeFont(event, 'Arial')">Arial</span>
             <span class="font-option" onclick="changeFont(event, 'Times New Roman')">Times New Roman</span>
             <span class="font-option" onclick="changeFont(event, 'Courier New')">Courier New</span>
             <span class="font-option" onclick="changeFont(event, 'Verdana')">Verdana</span>
             <span class="font-option" onclick="changeFont(event, 'Helvetica')">Helvetica</span>
             <hr>
             <span class="color-option" onclick="changeColor(event, 'red')">Red</span>
             <span class="color-option" onclick="changeColor(event, 'blue')">Blue</span>
             <span class="color-option" onclick="changeColor(event, 'green')">Green</span>
             <span class="color-option" onclick="changeColor(event, 'black')">Black</span>
             <span class="color-option" onclick="changeColor(event, 'pink')">Pink</span>
           </div>
         </div>
       
         <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left: 16%; top: 50%;">
           <span id="employment_cv" onclick="togglePopup(event)">Employment: <?php echo $employment; ?></span>
           <div class="popup" id="popupEmployment">
             <span class="font-option" onclick="changeFont(event, 'Arial')">Arial</span>
             <span class="font-option" onclick="changeFont(event, 'Times New Roman')">Times New Roman</span>
             <span class="font-option" onclick="changeFont(event, 'Courier New')">Courier New</span>
             <span class="font-option" onclick="changeFont(event, 'Verdana')">Verdana</span>
             <span class="font-option" onclick="changeFont(event, 'Helvetica')">Helvetica</span>
             <hr>
             <span class="color-option" onclick="changeColor(event, 'red')">Red</span>
             <span class="color-option" onclick="changeColor(event, 'blue')">Blue</span>
             <span class="color-option" onclick="changeColor(event, 'green')">Green</span>
             <span class="color-option" onclick="changeColor(event, 'black')">Black</span>
             <span class="color-option" onclick="changeColor(event, 'pink')">Pink</span>
           </div>
         </div>
       
         <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left: 16%; top: 27%;">
           <span id="summary_cv" onclick="togglePopup(event)">Summary: <?php echo $summary; ?></span>
           <div class="popup" id="popupSummary">
             <span class="font-option" onclick="changeFont(event, 'Arial')">Arial</span>
             <span class="font-option" onclick="changeFont(event, 'Times New Roman')">Times New Roman</span>
             <span class="font-option" onclick="changeFont(event, 'Courier New')">Courier New</span>
             <span class="font-option" onclick="changeFont(event, 'Verdana')">Verdana</span>
             <span class="font-option" onclick="changeFont(event, 'Helvetica')">Helvetica</span>
             <hr>
             <span class="color-option" onclick="changeColor(event, 'red')">Red</span>
             <span class="color-option" onclick="changeColor(event, 'blue')">Blue</span>
             <span class="color-option" onclick="changeColor(event, 'green')">Green</span>
             <span class="color-option" onclick="changeColor(event, 'black')">Black</span>
             <span class="color-option" onclick="changeColor(event, 'pink')">Pink</span>
           </div>
         </div>
       
         <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left: 67%; top: 70%;">
           <span id="languages_cv" onclick="togglePopup(event)">Languages: <?php echo $languages; ?></span>
           <div class="popup" id="popupLanguages">
             <span class="font-option" onclick="changeFont(event, 'Arial')">Arial</span>
             <span class="font-option" onclick="changeFont(event, 'Times New Roman')">Times New Roman</span>
             <span class="font-option" onclick="changeFont(event, 'Courier New')">Courier New</span>
             <span class="font-option" onclick="changeFont(event, 'Verdana')">Verdana</span>
             <span class="font-option" onclick="changeFont(event, 'Helvetica')">Helvetica</span>
             <hr>
             <span class="color-option" onclick="changeColor(event, 'red')">Red</span>
             <span class="color-option" onclick="changeColor(event, 'blue')">Blue</span>
             <span class="color-option" onclick="changeColor(event, 'green')">Green</span>
             <span class="color-option" onclick="changeColor(event, 'black')">Black</span>
             <span class="color-option" onclick="changeColor(event, 'pink')">Pink</span>
           </div>
         </div>
       
         <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left: 67%; top: 15%;">
           <span id="skillsbuttons_cv" onclick="togglePopup(event)">Skills : <?php echo $skillsbuttons; ?></span>
           <div class="popup" id="popupSkillsButtons">
             <span class="font-option" onclick="changeFont(event, 'Arial')">Arial</span>
             <span class="font-option" onclick="changeFont(event, 'Times New Roman')">Times New Roman</span>
             <span class="font-option" onclick="changeFont(event, 'Courier New')">Courier New</span>
             <span class="font-option" onclick="changeFont(event, 'Verdana')">Verdana</span>
             <span class="font-option" onclick="changeFont(event, 'Helvetica')">Helvetica</span>
             <hr>
             <span class="color-option" onclick="changeColor(event, 'red')">Red</span>
             <span class="color-option" onclick="changeColor(event, 'blue')">Blue</span>
             <span class="color-option" onclick="changeColor(event, 'green')">Green</span>
             <span class="color-option" onclick="changeColor(event, 'black')">Black</span>
             <span class="color-option" onclick="changeColor(event, 'pink')">Pink</span>
           </div>
         </div>
       
         <div class="cv-element" draggable="true" ondragstart="drag(event)" style="left: 67%; top: 30%;">
           <span id="skillsuser_cv" onclick="togglePopup(event)"><?php echo $skillsuser; ?></span>
           <div class="popup" id="popupSkillsUser">
             <span class="font-option" onclick="changeFont(event, 'Arial')">Arial</span>
             <span class="font-option" onclick="changeFont(event, 'Times New Roman')">Times New Roman</span>
             <span class="font-option" onclick="changeFont(event, 'Courier New')">Courier New</span>
             <span class="font-option" onclick="changeFont(event, 'Verdana')">Verdana</span>
             <span class="font-option" onclick="changeFont(event, 'Helvetica')">Helvetica</span>
             <hr>
             <span class="color-option" onclick="changeColor(event, 'red')">Red</span>
             <span class="color-option" onclick="changeColor(event, 'blue')">Blue</span>
             <span class="color-option" onclick="changeColor(event, 'green')">Green</span>
             <span class="color-option" onclick="changeColor(event, 'black')">Black</span>
             <span class="color-option" onclick="changeColor(event, 'pink')">Pink</span>
           </div>
         </div>
        </div>
       
         
           </div>







</section>
    </div>
<div style="display:flex">
<button class="seemore_main_button" style="margin-left:10vh" type="button" onclick="downloadDiv()">Download</button> 
<a href="inceracre.php"><button class="seemore_main_button" style="margin-left:10vh" type="button" >Go back to redesign</button> </a>
    </div>

   
<script>
var draggedElement = null;
   var initialX = 0;
   var initialY = 0;

   function allowDrop(event) {
    event.preventDefault();
   }

   function drag(event) {
    draggedElement = event.target;
    initialX = event.clientX;
    initialY = event.clientY;
    event.dataTransfer.setDragImage(new Image(), 0, 0); // Hide the default drag image
   }

   function drop(event) {
    event.preventDefault();
    if (draggedElement) {
      var offsetX = event.clientX - initialX;
      var offsetY = event.clientY - initialY;
      var newPositionX = parseFloat(draggedElement.style.left) + offsetX;
      var newPositionY = parseFloat(draggedElement.style.top) + offsetY;

      draggedElement.style.left = newPositionX + 'px';
      draggedElement.style.top = newPositionY + 'px';

      draggedElement = null;
    }
   }

   function togglePopup(event) {
    var cvElement = event.target.closest('.cv-element');
    var popup = cvElement.querySelector('.popup');
    if (popup.style.display === 'block') {
      popup.style.display = 'none';
    } else {
      hideAllPopups();
      popup.style.display = 'block';
    }
   }

   function hideAllPopups() {
    var popups = document.getElementsByClassName('popup');
    for (var i = 0; i < popups.length; i++) {
      popups[i].style.display = 'none';
    }
   }

   function changeFont(event, font) {
    var cvElement = event.target.closest('.cv-element');
    var textElement = cvElement.querySelector('span');
    textElement.style.fontFamily = font;
    hideAllPopups();
   }

   function changeColor(event, color) {
    var cvElement = event.target.closest('.cv-element');
    var textElement = cvElement.querySelector('span');
    textElement.style.color = color;
    hideAllPopups();
   }

   function downloadDiv() {
  const element = document.getElementById("cv_final");
  
  html2pdf()
    .from(element)
    .save("cv.pdf");
  }




 </script>


<script>
        var selectedButton = sessionStorage.getItem('selectedButton');

        if (selectedButton == '1') {
            document.getElementById('div1').style.display = 'block';
        } else if (selectedButton == '2') {
            document.getElementById('div2').style.display = 'block';
        } else if (selectedButton == '3') {
            document.getElementById('div3').style.display = 'block';
        } else {
            alert('No button selected');
        }
    </script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.js"></script>


  <style>

.hidden {
            display: none;
        }
    .cv-container1 {
      
      width: 110vh;
      height: 146vh;
      border: 2px solid #ccc;
      padding: 20px;
      position:absolute;
      background-image: url(modesportul.png);background-size:cover;
      font-size: 3vh;
    }
    .cv-container2 {
      
      width: 110vh;
      height: 146vh;
      border: 2px solid #ccc;
      padding: 20px;
    position:absolute;
      background-image: url(douadungi.jpeg);background-size:cover;
      font-size: 3vh;
    }
    .cv-container3 {
      
      width: 110vh;
      height: 146vh;
      border: 2px solid #ccc;
      padding: 20px;
    position:absolute;
      background-image: url(treidungi.jpeg);background-size:cover;
      font-size: 3vh;
    }
    .cv-element {
      background-color:rgb(255, 255, 255 ,0);
      padding: 0.2vh;
      margin-bottom: 2vh;
      cursor: move;
      position: absolute;
      
    }
  
    .popup {
      position: absolute;
      top: 100%;
      left: 0;
      display: none;
      background-color: #fff;
      padding: 10px;
      border: 1px solid #ccc;
      z-index: 9999;
    }
  
    .font-option,
    .color-option {
      margin-right: 10px;
      cursor: pointer;
    }
   </style>


        </body>
        </html>

        <?php
    } else {
        echo "User not found";
    }

    // Close the database connection
    $conn->close();
} else {
    echo "User not logged in";
}
?>
