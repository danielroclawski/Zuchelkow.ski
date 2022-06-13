var liczba = 0;
animacja();

function animacja(){
    var i;
    var x = document.getElementsByClassName("SliderZdjecia");
    for (i = 0;i<x.length; i++){
        x[i].style.display = "none";
    }
    liczba++;
    if(liczba>x.length){
        liczba = 1
    }
    x[liczba-1].style.display = "block";
    setTimeout(animacja,4000)
}