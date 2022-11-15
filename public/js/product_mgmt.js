function closeModal(modals, close, btnClose, str) {
  modals.classList.add("d-flex");
  close.onclick = function () {
    modals.classList.remove("d-flex");
    if (window.innerWidth > 1050) {
      unhideSidebar();
    }
  };
  modals.onclick = function () {
    modals.classList.remove("d-flex");
    if (window.innerWidth > 1050) {
      unhideSidebar();
    }
  };
  btnClose.onclick = function () {
    modals.classList.remove("d-flex");
    if (window.innerWidth > 1050) {
      unhideSidebar();
    }
  };

  let inner = document.getElementById(str);
  inner.onclick = function (e) {
    e.stopPropagation();
  };
}

function addProduct() {
  hideSidebar();
  let modals = document.querySelector(".modal-layout.add_product");
  let close = document.getElementsByClassName("modal-close")[0];
  let btnClose = document.getElementsByClassName("btn_close")[0];

  closeModal(modals, close, btnClose, "add_product");
}

function editProduct() {
  hideSidebar();
  let modals = document.querySelector(".modal-layout.edit_product");
  let close = document.getElementsByClassName("modal-close")[1];
  let btnClose = document.getElementsByClassName("btn_close")[1];

  closeModal(modals, close, btnClose, "edit_product");

  $tr = $(this).closest("tr");

  var data = $tr
    .children("td")
    .map(function () {
      return $(this).text();
    })
    .get();

  console.log(data);

  $("#update_id").val(data[0]);
  $("#fname").val(data[1]);
  $("#lname").val(data[2]);
  $("#birhday").val(data[3]);
  $("#phone").val(data[4]);
  $("#email").val(data[5]);
}

// function closeSubSidebar() {
//   var close_sub = document.getElementById("sub_sidebar");
//   close_sub.onclick = function () {
//     close_sub.style.display = "none";
//     hideSidebar();
//   };
// }
