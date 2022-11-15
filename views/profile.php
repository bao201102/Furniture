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

        <?php
        if (!empty($data['cus'])) :
            foreach ($data['cus'] as $cus) : extract($cus); ?>

                <!-- Profile section -->
                <div class="container row mx-auto">
                    <div class="col-12 col-lg-6">
                        <fieldset class="bg-white" style="padding: 45px; margin-top: 100px; min-width: 300px;  max-width: 550px;">
                            <div id="mess-profile">

                            </div>
                            <form id="profile-box">
                                <legend class="mb-5 fw-bold">Profile</legend>
                                <div class="form-group" style="font-size: 16px;">
                                    <div class="mb-5 row">
                                        <div class="col-6">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control" name="firstNameInput" placeholder="First Name" value="<?= $firstname ?>" require>
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" name="lastNameInput" placeholder="Last Name" value="<?= $lastname ?>" require>
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                        <label class="form-label">Birthday</label>
                                        <input type="date" class="form-control" name="birthdayInput" value="<?= $birthday ?>" require>
                                    </div>
                                    <div class="mb-5">
                                        <label class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phoneInput" placeholder="Phone" value="<?= $phone ?>" require>
                                    </div>
                                    <div>
                                        <label class="form-label">Email address</label>
                                        <input type="email" class="form-control" name="emailInput" placeholder="example@gmail.com" value="<?= $email ?>" require>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 mt-4 mb-4">Change</button>
                            </form>
                        </fieldset>
                    </div>

                    <div class="col-12 col-lg-6">
                        <fieldset class="bg-white" style="padding: 45px; margin-top: 100px; min-width: 300px;  max-width: 550px;">
                            <div id="mess-account">

                            </div>
                            <form id="account-box">
                                <legend class="mb-5 fw-bold">Account</legend>
                                <div class="form-group" style="font-size: 16px;">
                                    <div class="mb-5">
                                        <label class="form-label">Old Password</label>
                                        <input type="password" class="form-control" name="oldPasswordInput" placeholder="Old Password" required>
                                    </div>
                                    <div class="mb-5">
                                        <label class="form-label">New Password</label>
                                        <input type="password" class="form-control" name="passwordInput1" placeholder="Password" required>
                                    </div>
                                    <div>
                                        <label class="form-label">Confirm New Password</label>
                                        <input type="password" class="form-control" name="passwordInput2" placeholder="Confirm Password" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 mt-4 mb-4">Change</button>
                            </form>
                        </fieldset>
                    </div>
                </div>

        <?php endforeach;
        endif; ?>

        <!-- Footer and client logo section -->
        <?php
        require_once APPROOT . '/views/includes/footer.php';
        ?>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="<?= JSFILE ?>/general-effect.js"></script>
<script>
    $(document).on('submit', '#profile-box', function() {
        editProfile();
        return false;
    });

    $(document).on('submit', '#account-box', function() {
        editAccount();
        return false;
    });


    function refreshMessPro(msg, msgbox) {
        var url = window.location.pathname.split('/');
        msgbox.empty();
        msgbox.load(window.location.protocol + "//" +
            window.location.hostname + "/" + url[1] + "/User/loadMessLogin/" + msg,
            function(responseTxt, statusTxt, xhr) {});
        window.scrollTo(0, 0);
    }

    function refreshMessAcc(msg, msgbox) {
        var url = window.location.pathname.split('/');
        msgbox.empty();
        msgbox.load(window.location.protocol + "//" +
            window.location.hostname + "/" + url[1] + "/User/loadMessLogin/" + msg,
            function(responseTxt, statusTxt, xhr) {});
        window.scrollTo(0, 0);
    }

    function editProfile() {
        var emailInput = $("input[name='emailInput']").val();
        var firstNameInput = $("input[name='firstNameInput']").val();
        var lastNameInput = $("input[name='lastNameInput']").val();
        var birthdayInput = $("input[name='birthdayInput']").val();
        var phoneInput = $("input[name='phoneInput']").val();

        var url = window.location.pathname.split('/');
        $.ajax({
            url: window.location.protocol + "//" +
                window.location.hostname + "/" + url[1] + "/User/editProfile/",
            method: "POST",
            data: {
                emailInput: emailInput,
                firstNameInput: firstNameInput,
                lastNameInput: lastNameInput,
                birthdayInput: birthdayInput,
                phoneInput: phoneInput
            },
            success: function(data) {
                refreshMessPro(data, $("#mess-profile"));
            }
        });
    }

    function editAccount() {
        var oldPasswordInput = $("input[name='oldPasswordInput']").val();
        var passwordInput1 = $("input[name='passwordInput1']").val();
        var passwordInput2 = $("input[name='passwordInput2']").val();

        var url = window.location.pathname.split('/');
        $.ajax({
            url: window.location.protocol + "//" +
                window.location.hostname + "/" + url[1] + "/User/editAccount/",
            method: "POST",
            data: {
                oldPasswordInput: oldPasswordInput,
                passwordInput1: passwordInput1,
                passwordInput2: passwordInput2,

            },
            success: function(data) {
                refreshMessAcc(data, $("#mess-account"));
            }
        });
    }
</script>

</html>