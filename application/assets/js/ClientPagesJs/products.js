var acc = document.getElementsByClassName("prodSection");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active5");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}

function displayPages(prod) {
  var a = document.getElementById("prodAll-page");
  var b = document.getElementById("lf-page");
  var c = document.getElementById("trans-page");
  var d = document.getElementById("accss-page");

  if (prod == "prodAll-page") {
      a.style.display = "block";
      b.style.display = "none";
      c.style.display = "none";
      d.style.display = "none";
  } else if (prod == "lf-page") {
      a.style.display = "none";
      b.style.display = "block";
      c.style.display = "none";
      d.style.display = "none";
  } 
  else if (prod == "trans-page") {
    a.style.display = "none";
    b.style.display = "none";
    c.style.display = "block";
    d.style.display = "none";
  } 
  else if (prod == "accss-page") {
    a.style.display = "none";
    b.style.display = "none";
    c.style.display = "none";
    d.style.display = "block";
  } 
}
displayPages('prodAll-page');

var header = document.getElementById("prodRowSectionLink");
var btns = header.getElementsByClassName("prodText");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active6");
  if (current.length > 0) { 
    current[0].className = current[0].className.replace(" active6", "");
  }
  this.className += " active6";
  });
}