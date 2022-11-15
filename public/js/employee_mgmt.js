function addEmployee() {
    hideSidebar();
    let modals = document.querySelector(".modal-layout.add_employee");
    let close = document.getElementsByClassName("modal-close")[0];
    let btnClose = document.getElementsByClassName("btn_close")[0];

    closeModal(modals, close, btnClose, "add_employee");
}

function editEmployee() {
    hideSidebar();
    let modals = document.querySelector(".modal-layout.edit_employee");
    let close = document.getElementsByClassName("modal-close")[1];
    let btnClose = document.getElementsByClassName("btn_close")[1];

    closeModal(modals, close, btnClose, "edit_employee");
}