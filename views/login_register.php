<!DOCTYPE html>
<html lang="en">

<?php
require_once APPROOT . '/views/includes/head.php';
?>

<body style="background-color: whitesmoke;">
    <div class="container-fluid p-0">
        <!-- Header -->
        <?php
        require_once APPROOT . '/views/includes/navbar.php';
        ?>

        <!-- Signin section -->
        <div>
            <fieldset class="border mx-auto bg-white" style="padding: 45px; margin-top: 100px; min-width: 300px;  max-width: 550px;">
                <!-- Message section -->
                <div id="mess">

                </div>
                <form id="login-box">
                    <legend class="mb-5 fw-bold">Login</legend>
                    <div class="form-group" style="font-size: 16px;">
                        <div class="mb-5">
                            <label class="form-label">Email address</label>
                            <span class="float-end align-middle" style="font-size: 15px;">Need an account? <a class="fw-bold" id="signup-btn">Sign up</a></span>
                            <input type="email" class="form-control" name="emailInputLogin" placeholder="name@example.com" required>
                        </div>
                        <div class="mb-5">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="passwordInput" placeholder="Password" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mb-4">Login</button>
                    <a class="fs-5 fw-bold">Forgot your password?</a>
                </form>

                <form class="d-none" id="signup-box">
                    <legend class="mb-5 fw-bold">Sign up</legend>
                    <div class="form-group" style="font-size: 16px;">
                        <div class="mb-5">
                            <label class="form-label">Email
                                address</label>
                            <span class="float-end align-middle" style="font-size: 15px;">Already have an account? <a class="fw-bold" id="login-btn">Log in</a></span>
                            <input type="email" class="form-control" name="emailInput" placeholder="name@example.com" required>
                        </div>
                        <div class="mb-5">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="passwordInput1" placeholder="Password" required>
                        </div>
                        <div class="mb-5">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="passwordInput2" placeholder="Password" required>
                        </div>
                        <div class="row mb-5">
                            <div class="col">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" name="firstNameInput" placeholder="First Name" required>
                            </div>
                            <div class="col">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="lastNameInput" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="mb-5">
                            <label class="form-label">Birthday</label>
                            <input type="date" class="form-control" name="birthdayInput" required>
                        </div>
                        <div class="mb-5">
                            <label class="form-label">Phone Number</label>
                            <input type="number" class="form-control" name="phoneInput" placeholder="Phone Number" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mb-4">Sign up</button>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="privacyCheck" required>
                        <label class="form-check-label fs-6">
                            By checking this and clicking "Sign Up" button, you are creating an acconut, and agree
                            to our Terms of Service and Privacy Policy
                        </label>
                    </div>
                </form>

            </fieldset>
        </div>

        <!-- Footer and client logo section -->
        <?php
        require_once APPROOT . '/views/includes/footer.php';
        ?>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="<?= JSFILE ?>/general-effect.js"></script>
<script src="<?= JSFILE ?>/login-effect.js"></script>
<script>
    $(document).on('submit', '#login-box', function() {
        login();
        return false;
    });

    $(document).on('submit', '#signup-box', function() {
        register();
        return false;
    });

    function refreshMess(msg) {
        var url = window.location.pathname.split('/');
        $("#mess").empty();
        $("#mess").load(window.location.protocol + "//" +
            window.location.hostname + "/" + url[1] + "/User/loadMessLogin/" + msg,
            function(responseTxt, statusTxt, xhr) {});
        window.scrollTo(0, 0);
    }

    function login() {
        var emailInputLogin = $("input[name='emailInputLogin']").val();
        var passwordInput = $("input[name='passwordInput']").val();

        var url = window.location.pathname.split('/');
        $.ajax({
            url: window.location.protocol + "//" +
                window.location.hostname + "/" + url[1] + "/User/login/",
            method: "POST",
            data: {
                emailInputLogin: emailInputLogin,
                passwordInput: passwordInput
            },
            success: function(data) {
                if (data == "wrongpass") {
                    refreshMess(data);
                } else {
                    window.location.replace(data);
                }

            }
        });
    }

    function register() {
        var emailInput = $("input[name='emailInput']").val();
        var passwordInput1 = $("input[name='passwordInput1']").val();
        var passwordInput2 = $("input[name='passwordInput2']").val();
        var firstNameInput = $("input[name='firstNameInput']").val();
        var lastNameInput = $("input[name='lastNameInput']").val();
        var birthdayInput = $("input[name='birthdayInput']").val();
        var phoneInput = $("input[name='phoneInput']").val();

        var url = window.location.pathname.split('/');
        $.ajax({
            url: window.location.protocol + "//" +
                window.location.hostname + "/" + url[1] + "/User/register/",
            method: "POST",
            data: {
                emailInput: emailInput,
                passwordInput1: passwordInput1,
                passwordInput2: passwordInput2,
                firstNameInput: firstNameInput,
                lastNameInput: lastNameInput,
                birthdayInput: birthdayInput,
                phoneInput: phoneInput
            },
            success: function(data) {
                if (data == "success") {
                    $("#signup-box").find(':input').each(function() {
                        $(this).val('');
                    });
                    hideSignupBox();
                    refreshMess(data);
                } else if (data == "unmatchedpass" || data == "emailexist") {
                    refreshMess(data);
                }
            }
        });
    }
</script>

</html>