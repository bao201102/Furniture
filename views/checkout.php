<html lang="en">

<?php
require_once APPROOT . '/views/includes/head.php';
?>

<body>
    <div class="container-fluid p-0">
        <!-- Header -->
        <?php
        require_once APPROOT . '/views/includes/navbar.php';
        ?>

        <!-- title -->
        <section class="shopcart-title">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 col-xl-8 col-lg-6">
                        <p class="text-center text-lg-start text-black fs-5">Checkout</p>
                    </div>
                    <nav class="col-12 col-xl-4 col-lg-6 mt-2 mt-lg-0  shopcart-title-nav" aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 justify-content-center justify-content-lg-end fw-lighter" style="font-size: 14px;">
                            <li class="breadcrumb-item"><a href="<?= URLROOT ?>/Home">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= URLROOT ?>/Search">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>

        <!--Checkout body section-->
        <div class="container" style="margin-top: 130px;">
            <h4 class="mb-4">Billing Details</h4>
            <form action="<?= URLROOT ?>/Checkout/addOrder" method="POST">
                <div class="row">

                    <?php
                    if (!empty($data['cus'])) :
                        foreach ($data['cus'] as $cus) : extract($cus); ?>

                            <div class="col-12 col-lg-6 px-4" id="customer-details" style="font-size: 16px;">
                                <input type="hidden" name="cus_id" value="<?= $cus_id ?>">
                                <div class="row">
                                    <div class="mb-3 first-name-box col-6">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" name="firstNameInput" placeholder="First Name" value="<?= $firstname ?>" required>
                                    </div>
                                    <div class="mb-3 first-name-box col-6">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control" name="lastNameInput" placeholder="Last Name" value="<?= $lastname ?>" required>
                                    </div>
                                </div>

                                <div class="mb-3 street-name-box">
                                    <label class="form-label">Street address</label>
                                    <input type="text" class="form-control" name="streetInput" placeholder="Street addres" required>
                                </div>

                                <div class="mb-3 city-name-box">
                                    <label class="form-label">Town/City</label>
                                    <input type="text" class="form-control" name="townInput" placeholder="Town/City" required>
                                </div>

                                <div class="mb-3 phone-name-box">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="phoneInput" placeholder="Phone" value="<?= $phone ?>" required>
                                </div>

                                <div class="mb-3 email-name-box">
                                    <label class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="emailInput" placeholder="example@gmail.com" value="<?= $email ?>" required>
                                </div>

                                <div class="mb-3 other-name-box">
                                    <label class="form-label">Orther notes (optional)</label>
                                    <textarea class="form-control" rows="8" style="resize: none;" name="notesInput" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    <?php else : ?>

                        <div class="col-12 col-lg-6 px-4" id="customer-details" style="font-size: 16px;">
                            <input type="hidden" name="cus_id" value="null">
                            <div class="row">
                                <div class="mb-3 first-name-box col-6">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="firstNameInput" placeholder="First Name" required>
                                </div>
                                <div class="mb-3 first-name-box col-6">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="lastNameInput" placeholder="Last Name" required>
                                </div>
                            </div>

                            <div class="mb-3 street-name-box">
                                <label class="form-label">Street address</label>
                                <input type="text" class="form-control" name="streetInput" placeholder="Street addres" required>
                            </div>

                            <div class="mb-3 city-name-box">
                                <label class="form-label">Town/City</label>
                                <input type="text" class="form-control" name="townInput" placeholder="Town/City" required>
                            </div>

                            <div class="mb-3 phone-name-box">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phoneInput" placeholder="Phone" required>
                            </div>

                            <div class="mb-3 email-name-box">
                                <label class="form-label">Email address</label>
                                <input type="email" class="form-control" name="emailInput" placeholder="example@gmail.com" required>
                            </div>

                            <div class="mb-3 other-name-box">
                                <label class="form-label">Orther notes (optional)</label>
                                <textarea class="form-control" rows="8" style="resize: none;" name="notesInput" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
                        </div>

                    <?php endif; ?>

                    <div class="col-12 col-lg-6 px-4">
                        <div id="order-details">

                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Footer and client logo section -->
        <?php
        require_once APPROOT . '/views/includes/footer.php';
        ?>
    </div>
</body>

<style>
    .pay-type {
        font-size: 15px;
        background-color: white;
        padding: 20px;
    }

    #order-details {
        background-color: #f7f7f7;
        padding: 45px 45px;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="<?= JSFILE ?>/general-effect.js"></script>
<script type="text/javascript">
    refreshOrderDetails();
</script>

</html>