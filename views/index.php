<html lang="en">

<?php
require_once APPROOT . '/views/includes/head.php';
?>

<body>
    <div class="container-fluid m-0 p-0">
        <!-- Header section -->
        <?php
        require_once APPROOT . '/views/includes/homepage_navbar.php';
        ?>

        <!-- Landing banner section -->
        <div id="carouselExampleIndicators" class="carousel slide carousel-dark" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner p-0">
                <div class="carousel-item active">
                    <img src="<?= IMAGE ?>/living-white-room.jpg" style="height: 100vh; object-fit:cover;" class="d-block img-fluid" alt="...">
                </div>
                <div class="carousel-item ">
                    <img src="<?= IMAGE ?>/scandinavian-living-room.jpg" style="height: 100vh; object-fit:cover;" class="d-block img-fluid" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= IMAGE ?>/living-room-blank-white.jpg" style="height: 100vh; object-fit:cover;" class="d-block img-fluid" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Products section -->
        <section class="mb-5" style="padding: 100px 0;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 text-center " style="padding-bottom: 100px;">
                        <span class="d-block mb-3" style="color: #ff6437;">Living interior</span>
                        <h1 class="fw-bold">New products</h1>
                    </div>
                </div>
            </div>

            <!-- start info item grid -->
            <div class="container-fluid">
                <div class="row text-center align-self-center">
                    <!-- product box -->
                    <?php require_once APPROOT . '/views/includes/products.php' ?>

                    <div class="text-center mt-5">
                        <a href="<?= URLROOT ?>/Search">
                            <button type="button" class="btn btn-outline-primary">
                                More Collections
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <!-- end info item grid -->
        </section>

        <!-- Sale off banner section -->
        <section class="p-0 mt-5 mb-5">
            <div class="container-fluid">
                <div class="row">
                    <!-- start info banner item -->
                    <div class="col-12 col-xl-6">
                        <div class="row align-items-center">
                            <div class="col position-relative p-0 pe-xl-1" id="first-banner-div" style="padding-left: 0;">
                                <a class="" href="">
                                    <img src="<?= IMAGE ?>/pink-armchair.jpg" class="img-fluid" alt="">
                                </a>

                                <div class="position-absolute" style="top: 25%; right: 15%;">
                                    <p class="fs-3">- Flat 50% off</p>
                                    <h1 class="mt-3" style="font-size: calc(1em + 1vw);"><span class="fw-light"> Wooden
                                        </span><br>
                                        armchair</h1>
                                    <a href="<?= URLROOT ?>/Search">
                                        <button type="button" class="btn btn-secondary shadow-lg mt-4">DISCOVER NOW</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end info banner item -->

                    <!-- start info banner item -->
                    <div class="col-12 col-xl-6">
                        <div class="row align-items-center">
                            <div class="col position-relative p-0 ps-xl-1" id="second-banner-div" style="padding-right: 0;">
                                <a class="" href="">
                                    <img src="<?= IMAGE ?>/green-sofa.jpg" class="img-fluid" alt="">
                                </a>

                                <div class="position-absolute" style="top: 25%; right: 15%;">
                                    <p class="fs-3">- Flat 40% off</p>
                                    <h1 class="mt-3" style="font-size: calc(1em + 1vw);"><span class="fw-light"> Modern
                                        </span><br>
                                        sofa</h1>
                                    <a href="<?= URLROOT ?>/Search">
                                        <button type="button" class="btn btn-secondary shadow-lg mt-4">DISCOVER NOW</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end info banner item -->
                </div>
            </div>
        </section>

        <!-- Footer and client logo section -->
        <?php
        require_once APPROOT . '/views/includes/footer.php';
        ?>
    </div>
</body>

<style>
    .bg-transparent {
        transition: 0.6s ease;
    }

    .bg-white {
        transition: 0.6s ease;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="<?= JSFILE ?>/general-effect.js"></script>
<script src="<?= JSFILE ?>/header-effect.js"></script>
<script type="text/javascript">
    function addToCart_home(prod_id, prod_quantity, action) {
        var url = window.location.pathname.split('/');
        $.ajax({
            url: window.location.protocol + "//" +
                window.location.hostname + "/" + url[1] + "/Cart/addProductToCart/" +
                prod_id,
            method: "POST",
            data: {
                action: action,
                prod_quantity: prod_quantity
            },
            success: function(data) {
                $("#ses-cart").empty();
                $(".header-cart-list").remove();
                $("#ses-cart").load(window.location.protocol + "//" +
                    window.location.hostname + "/" + url[1] + "/Cart/refreshHeaderCart/",
                    function(responseTxt, statusTxt, xhr) {});
                alert("You have added new product in to cart successfully");
            }
        });
    }
</script>

</html>