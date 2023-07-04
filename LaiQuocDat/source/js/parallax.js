let parallax1 = document.getElementById("parallax1");
let parallax2 = document.getElementById("parallax2");
let parallax3 = document.getElementById("parallax3");
let parallax4 = document.getElementById("parallax4");

// DEFINE VALUE
var pt1 = 40;
var pt2 = 62;
var pt3 = 79;
var pt4 = 7;

//SET VALUE TO POSITION TOP
parallax1.style.top = pt1 + "vh";
parallax2.style.top = pt2 + "vh";
parallax3.style.top = pt3 + "vh";
parallax4.style.top = pt4 + "vh";

// DEFINE VALUE
var pl1 = 0;
var pl2 = 0;
var pl3 = 0;
var pl4 = 50;

//SET VALUE TO POSITION LEFT
parallax1.style.left = pl1 + "vh";
parallax2.style.left = pl2 + "vh";
parallax3.style.left = pl3 + "vh";
parallax4.style.left = pl4 + "%";

window.addEventListener("scroll", function () {
    var value = window.scrollY;

    parallax1.style.top = pt1 + value * 0.1 + "vh";
    parallax2.style.left = pl2 + value * 0.8 + "vh";
    parallax3.style.left = pl3 + value * 0.6 + "vh";
    parallax4.style.top = pt4 - value * 0.1 + "vh";
});