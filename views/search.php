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
                        <p class="text-center text-lg-start text-black fs-5">Search</p>
                    </div>
                    <nav class="col-12 col-xl-4 col-lg-6 mt-2 mt-lg-0  shopcart-title-nav" aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 justify-content-center justify-content-lg-end fw-lighter" style="font-size: 14px;">
                            <li class="breadcrumb-item"><a href="<?= URLROOT ?>/Home/index">Home</a></li>
                            <li class=" breadcrumb-item active" aria-current="page">Search</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>

        <!--Products panel-->
        <section>
            <div class="container">
                <div class="row g-0 justify-content-center" style="margin-top: 50px;">
                    <form class="col-12 col-lg-4 flex-lg-column row" id="search-form">
                        <div class="mb-3">
                            <input class="form-control" type="text" placeholder="Search our product here" value="<?= $data['searchKeyword'] ?>" name="keyword" id="keyword">
                        </div>
                        <div class="col-6 col-lg-12 fs-5" id="price-radio">
                            <p class="fw-bold text-black">Search by price</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="price" id="optionRadio4" value="0-100000" checked>
                                <label class="form-check-label" for="optionRadio4">
                                    All
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="price" id="optionRadio1" value="0-500">
                                <label class="form-check-label" for="optionRadio1">
                                    0 - $500
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="price" id="optionRadio2" value="501-1000">
                                <label class="form-check-label" for="optionRadio2">
                                    $500 - $1000
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="price" id="optionRadio3" value="1001-5000">
                                <label class="form-check-label" for="optionRadio3">
                                    $1000 - $5000
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="price" id="optionRadio4" value="5001-100000">
                                <label class="form-check-label" for="optionRadio4">
                                    Over $5000
                                </label>
                            </div>
                        </div>
                        <div class="col-6 col-lg-12 fs-5" id="cate-checkbox">
                            <p class="pt-0 pt-lg-5 fw-bold text-black">Search by category</p>
                            <?php if (!empty($data['cate'])) :
                                $i = 0;
                                foreach ($data['cate'] as $cate) : extract($cate); ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="<?= $category_id ?>" id="flexCheck<?= $i ?>" name="category">
                                        <label class="form-check-label" for="flexCheck<?= $i ?>">
                                            <?= $category_name ?>
                                        </label>
                                    </div>
                            <?php $i++;
                                endforeach;
                            endif; ?>
                        </div>
                    </form>

                    <!-- Search result -->
                    <div class="col-12 col-lg-8 row text-center justify-content-center" id="output">

                    </div>
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
    .form-check {
        padding-top: 10px;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>
<script src="<?= JSFILE ?>/general-effect.js"></script>

<script type="text/javascript">
    handleAjax(<?= $data['number'] ?>);
    $("#keyword").keyup(function() {
        handleAjax(<?= $data['number'] ?>);
    });
    $("input[type=radio][name=price]").change(function() {
        handleAjax(<?= $data['number'] ?>);
    });
    $("input[type=checkbox][name=category]").change(function() {
        handleAjax(<?= $data['number'] ?>);
    });

    function handleAjax(number) {
        var category = [];
        var keyword = $("#keyword").val();
        var price = $("input[name='price']:checked").val();
        $("input[name='category']:checked").each(function() {
            category.push(this.value);
        });
        var url = window.location.pathname.split('/');

        $.ajax({
            url: window.location.protocol + "//" +
                window.location.hostname + "/" + url[1] + "/Search/search/" +
                number,
            method: "POST",
            data: {
                keyword: keyword,
                price: price,
                category: category
            },
            success: function(data) {
                $("#output").html(data);
            }
        });

        window.scrollTo(0, 0);
    }

    function addToCart_search(prod_id, prod_quantity, action) {
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
                refreshHeaderCart();
                alert("You have added new product in to cart successfully");
            }
        });
    }
</script>

</html>