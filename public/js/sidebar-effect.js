var sidebar = document.getElementById("sidebar");
var mainContent = document.getElementById("main-content");
var menuBtn = document.getElementById("menu-btn");
var sidebarMenuBtn = document.getElementById("sidebar-menu-btn");
var sub_sidebar = document.getElementById("sub_sidebar");

function hideSidebar() {
  sidebar.style.left = "-340px";
  mainContent.style.marginLeft = "0px";
  sidebar.classList.add("is-hide");
}

function unhideSidebar() {
  sidebar.style.left = "0px";
  mainContent.style.marginLeft = "340px";
  sidebar.classList.remove("is-hide");
}

window.onload = function () {
  if (window.innerWidth < 1050) {
    sidebarMenuBtn.classList.remove("invisible");
    hideSidebar();
    sub_sidebar.style.display = "none";
  } else {
    sidebarMenuBtn.classList.add("invisible");
    unhideSidebar();
    sub_sidebar.style.display = "none";
  }
};

window.onresize = function () {
  if (window.innerWidth < 1050) {
    sidebarMenuBtn.classList.remove("invisible");
    hideSidebar();
    sub_sidebar.style.display = "none";
  } else {
    sidebarMenuBtn.classList.add("invisible");
    unhideSidebar();
    sub_sidebar.style.display = "none";
  }
};

menuBtn.onclick = function () {
  if (!sidebar.classList.contains("is-hide")) {
    hideSidebar();
  } else if (
    window.innerWidth < 1050 &&
    sidebar.classList.contains("is-hide")
  ) {
    sidebar.style.left = "0px";
    sidebar.classList.remove("is-hide");
    sub_sidebar.style.display = "flex";
  } else {
    unhideSidebar();
  }
};

sidebarMenuBtn.onclick = function () {
  if (!sidebar.classList.contains("is-hide")) {
    hideSidebar();
    sub_sidebar.style.display = "none";
  } else if (
    window.innerWidth < 1050 &&
    sidebar.classList.contains("is-hide")
  ) {
    sidebar.style.left = "0px";
    sidebar.classList.remove("is-hide");
  }
};
