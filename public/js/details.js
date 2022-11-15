//Reponsive product information
window.addEventListener("resize", resizeDetail);
resizeDetail();

function resizeDetail() {
  if (window.innerWidth < 992) {
    document.getElementById("inf-pro").style.paddingLeft = 12;
  } else if (window.innerWidth < 1200) {
    document.getElementById("inf-pro").style.paddingLeft = 50;
  } else {
    document.getElementById("inf-pro").style.paddingLeft = 100;
  }
}

//Reponsive product image
window.addEventListener("resize", resizeImage);
resizeImage();

function resizeImage() {
  var img = document.getElementsByClassName("img_carousel");
  for (let index = 0; index < img.length; index++) {
    if (window.innerWidth < 768) {
      img[index].style.maxHeight = 360;
    } else if (window.innerWidth < 992) {
      img[index].style.maxHeight = 505;
    } else {
      img[index].style.maxHeight = 600;
    }
  }
}
