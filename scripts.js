
var isOpen = false;

function popup(event) {
  var popup = document.getElementById("myPopup");
  if (!isOpen) {
    popup.classList.add("show");
    document.body.classList.add("noscroll");
    isOpen = true;
    event.stopPropagation();
    document.addEventListener("click", clickOutside);
  }
}

function clickOutside(event) {
  var popup = document.getElementById("myPopup");
  if (!popup.contains(event.target)) {
    popup.classList.remove("show");
    document.body.classList.remove("noscroll");
    isOpen = false;
    document.removeEventListener("click", clickOutside);
  }
}



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


function getinformation(){
  
 
 cv_creation();
}

function button_pressed_cv0(){
  document.getElementById("cv0").style.opacity=1;
}
function button_pressed_cv1(){
 document.getElementById("cv1").style.opacity=1;
}
function button_pressed_cv6(){
 document.getElementById("cv6").style.opacity=1;
 }

 
 let myVariable = 'Hello, World!';
 
 







