var loginBox = document.getElementById("login-box");
var signupBox = document.getElementById("signup-box");
var loginBtn = document.getElementById("login-btn");
var signupBtn = document.getElementById("signup-btn");

signupBtn.addEventListener("click", function () {
    hideLoginBox();
})

loginBtn.addEventListener("click", function () {
    hideSignupBox();
})

function hideLoginBox() {
    loginBox.classList.add("d-none");
    signupBox.classList.remove("d-none");
}

function hideSignupBox() {
    signupBox.classList.add("d-none");
    loginBox.classList.remove("d-none");
}