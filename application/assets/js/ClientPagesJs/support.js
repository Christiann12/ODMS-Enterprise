var acc = document.getElementsByClassName("faqaccordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active1");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}

function display(contactus) {
  
  var a = document.getElementById("gen-page");
  var b = document.getElementById("ping-page");
  var c = document.getElementById("servprod-page");
  var d = document.getElementById("fa-page");

  if (contactus == "gen-page") {
    
      a.style.display = "block";
      b.style.display = "none";
      c.style.display = "none";
      d.style.display = "none";
  } else if (contactus == "ping-page") {
      a.style.display = "none";
      b.style.display = "block";
      c.style.display = "none";
      d.style.display = "none";
  } 
  else if (contactus == "servprod-page") {
    a.style.display = "none";
    b.style.display = "none";
    c.style.display = "block";
    d.style.display = "none";
  } 
  else if (contactus == "fa-page") {
    a.style.display = "none";
    b.style.display = "none";
    c.style.display = "none";
    d.style.display = "block";
  } 
}
display('gen-page');


var header = document.getElementById("sublink");
var btns = header.getElementsByClassName("text");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active2");
  if (current.length > 0) { 
    current[0].className = current[0].className.replace(" active2", "");
  }
  this.className += " active2";
  });
}