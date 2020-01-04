
var slideIndex = 0;
var t;
var dots;
var maxheight = 0;
var timedelay = 5000;

window.onload = function() {
var x = document.getElementsByClassName("mySlides");
var parent_elem = document.getElementById('myslideFrame')
var widthRatio = parseInt(parent_elem.offsetWidth) / parseInt(x[0].width)

for (i = 0; i < x.length; i++) {

if (x[i].height > maxheight)
{
maxheight = x[i].height;
}
}

document.getElementById('myslideFrame').style.height = maxheight * widthRatio + "px";
showDivs(slideIndex);
carousel();
};

 function plusDivs(n) {
showDivs(slideIndex += n);
}

function currentDiv(n) {
showDivs(slideIndex = n);
}

function showDivs(n) {
var i;
var x = document.getElementsByClassName("mySlides");
dots = document.getElementsByClassName("demo");

if (n > x.length) {
slideIndex = 1;
}

if (n < 1) {
slideIndex = x.length;
}

for (i = 0; i < x.length; i++) {
x[i].style.display = "none";
}

for (i = 0; i < dots.length; i++) {

dots[i].className = dots[i].className.replace(" active", "");

}

x[slideIndex - 1].style.display = "inline-block";
dots[slideIndex - 1].className += " active";

}

function carousel() {

var i;
var x = document.getElementsByClassName("mySlides");
for (i = 0; i < x.length; i++) {
x[i].style.display = "none";
dots[i].className = dots[i].className.replace(" active", "");
}
slideIndex++;

if (slideIndex > x.length) {
slideIndex = 1
}

x[slideIndex - 1].style.display = "inline-block";
dots[slideIndex - 1].className += " active";
t = setTimeout(carousel, timedelay);
}

function pauseCarousel() {
clearTimeout(t)
}

function startCarousel() {
t = setTimeout(carousel, timedelay);
}

window.setTimeout( fix, 20000);

function fix()
{
	document.getElementById("myslideFrame").style.overflow="visible";
}






