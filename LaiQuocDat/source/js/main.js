// FIXED ON SCROLL
window.onscroll = function () {
  let vpoint = (window.innerHeight * 3) / 4;
  if (window.pageYOffset >= vpoint)
    document.getElementById("navlink").style.top = "50%";
    else 
    document.getElementById("navlink").style.top = "-100%";
};

//OPEN POPUP
function openItem(id){
  document.getElementById("popupcontainer".concat(id)).style.display = "flex";
  document.getElementById("popupcontainer".concat(id)).style.pointerEvents = "all";
  document.getElementById("popup-bg".concat(id)).style.display = "flex";
  document.getElementById("popup-bg".concat(id)).style.pointerEvents = "all";
}

// EXIT POPUP
function exitpopup(id) {
  document.getElementById("popupcontainer".concat(id)).style.display = "none";
  document.getElementById("popupcontainer".concat(id)).style.pointerEvents = "none";
  document.getElementById("popup-bg".concat(id)).style.display = "none";
  document.getElementById("popup-bg".concat(id)).style.pointerEvents = "none";
}

// POPUP IMG TRANSFORM

function translateY100(id) {
  document.getElementById("wrapper".concat(id)).classList.add("translateY100");
  document
    .getElementById("wrapper".concat(id))
    .classList.remove("translateY200", "translateY300", "translateY400");
}

function translateY200(id) {
  document.getElementById("wrapper".concat(id)).classList.add("translateY200");
  document
    .getElementById("wrapper".concat(id))
    .classList.remove("translateY100", "translateY300", "translateY400");
}

function translateY300(id) {
  document.getElementById("wrapper".concat(id)).classList.add("translateY300");
  document
    .getElementById("wrapper".concat(id))
    .classList.remove("translateY100", "translateY200", "translateY400");
}

function translateY400(id) {
  document.getElementById("wrapper".concat(id)).classList.add("translateY400");
  document
    .getElementById("wrapper".concat(id))
    .classList.remove("translateY100", "translateY200", "translateY300");
}
