var liczba = 0;
animacja();

function animacja(){
    var i;
    var x = document.getElementsByClassName("SliderZdjecia");
    for (i = 0;i<x.length; i++){
        x[i].style.display = "none";
        x[i].style.transition= "3s";
    }
    liczba++;
    if(liczba>x.length){
        liczba = 1
    }
    x[liczba-1].style.transition= "3s";
    x[liczba-1].style.display = "block";
    
    setTimeout(animacja,4000)
    
}
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("SliderZdjecia");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}