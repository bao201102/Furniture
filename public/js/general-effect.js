//Footer collapse effect
window.addEventListener("resize", resizeFooter);
resizeFooter();

function resizeFooter() {
  if (window.innerWidth < 992) {
    document.getElementById("col-toggler1").className = "row gap-3 collapse";
    document.getElementById("col-toggler2").className = "row gap-3 collapse";
  } else {
    document.getElementById("col-toggler1").className =
      "row gap-3 collapse show";
    document.getElementById("col-toggler2").className =
      "row gap-3 collapse show";
  }
}

//header cart in nav responsive
window.addEventListener("resize", resizeHeaderCart);
resizeHeaderCart();

function resizeHeaderCart() {
  var hiden = document.getElementsByClassName("header-cart-list")[0];
  if (window.innerWidth <= 992) {
    hiden.style.display = "none";
  } else {
    hiden.style.display = "block";
  }
}

window.addEventListener("resize", resizeAddToCart);
resizeAddToCart();

function resizeAddToCart() {
  var hiden = document.getElementsByClassName("add-to-cart");
  for (let index = 0; index < hiden.length; index++) {
    if (window.innerWidth <= 992) {
      hiden[index].classList.add("d-none");
    } else {
      hiden[index].classList.remove("d-none");
    }
  }
}

//Ajax functions for header cart

//delete product in header cart
function deleteProductHeaderCart(prod_id) {
  var url = window.location.pathname.split('/');
  $.ajax({
    url: window.location.protocol + "//" +
      window.location.hostname + "/" + url[1] + "/Cart/deleteProduct/" +
      prod_id,
    method: "POST",
    success: function (data) {
      refreshHeaderCart();
    }
  });
}

function refreshHeaderCart() {
  var url = window.location.pathname.split('/');
  $("#ses-cart").empty();
  $(".header-cart-list").remove();
  $("#ses-cart").load(window.location.protocol + "//" +
    window.location.hostname + "/" + url[1] + "/Cart/refreshHeaderCart/",
    function (responseTxt, statusTxt, xhr) { });
  if (typeof ($("#products-cart")) != "undefined" && $("#products-cart") !== null) {
    refreshCart();
  }
  if (typeof ($("#products-cart")) != "undefined" && $("#products-cart") !== null) {
    refreshOrderDetails();
  }
}

function refreshCart() {
  var url = window.location.pathname.split('/');
  $("#products-cart").empty();
  $("#products-cart").load(window.location.protocol + "//" +
    window.location.hostname + "/" + url[1] + "/Cart/refreshProductsCart/",
    function (responseTxt, statusTxt, xhr) { });
}

function refreshOrderDetails() {
  var url = window.location.pathname.split('/');
  $("#order-details").empty();
  $("#order-details").load(window.location.protocol + "//" +
    window.location.hostname + "/" + url[1] + "/Checkout/refreshOrderDetails/",
    function (responseTxt, statusTxt, xhr) { });
}
