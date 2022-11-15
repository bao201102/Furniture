window.onscroll = function () { scrollChangeColor() };

function scrollChangeColor() {
    if (window.scrollY > 1) {
        document.getElementById("nav-id").className = "navbar navbar-expand-lg fixed-top py-3 border-0 bg-white shadow-sm";
    }
    else if (window.innerWidth > 992 && window.scrollY < 20) {
        document.getElementById("nav-id").className = "navbar navbar-expand-lg fixed-top py-3 border-0 bg-transparent";
    }
}

window.onresize = function () { resizeChangeColor() };

window.onload = function () { resizeChangeColor() };

function resizeChangeColor() {
    if (window.innerWidth < 992) {
        document.getElementById("nav-id").className = "navbar navbar-expand-lg fixed-top py-3 border-0 bg-white shadow-sm";
    }
    else if (window.innerWidth > 992 && window.scrollY < 20) {
        document.getElementById("nav-id").className = "navbar navbar-expand-lg fixed-top py-3 border-0 bg-transparent";
    }
}