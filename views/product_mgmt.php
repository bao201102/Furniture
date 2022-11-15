<!DOCTYPE html>
<html lang="en">

<?php
require_once APPROOT . '/views/includes/head.php';
?>
<link rel="stylesheet" href="<?= CSSFILE ?>/product_mgmt.css">

<body>
    <div class="container-fluid p-0">
        <!-- Sidebar -->
        <?php
        require_once APPROOT . '/views/includes/sidebar.php';
        ?>

        <!-- Main content -->
        <div id="main-content" style="min-height: 100vh; margin-left: 340px; right: 0; bottom: 0; left: 0;">
            <!-- Title -->
            <section class="container-fluid shadow-sm">
                <div class="row p-4">
                    <!-- title -->
                    <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center justify-content-lg-start pb-4 pb-lg-0">
                        <a> <span class="material-symbols-outlined align-middle me-3" id="menu-btn" style="font-size: 40px;"> menu
                            </span> </a>
                        <span class="fw-semibold fs-3">Product Management</span>
                    </div>
                    <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center justify-content-lg-end">
                        <!-- select category -->
                        <form class="me-2 me-xl-3" id="formcate">
                            <select class="form-select" name="category" aria-label="Default select example" id="category">
                                <option selected value="all">All</option>
                                <?php foreach ($data['category_list'] as $cate) : extract($cate); ?>
                                    <option value="<?= $category_id ?>"><?= $category_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </form>

                        <!-- button add new -->
                        <div>
                            <button onclick="addProduct()" type="button" class="btn btn-info d-flex align-items-center fs-5">
                                <span class="material-symbols-outlined">
                                    add
                                </span>
                                Add new
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Search -->
            <section class="my-4">
                <div class="container">
                    <div class="input-group">
                        <span class="input-group-text material-symbols-outlined">search</span>
                        <input type="text" class="form-control" placeholder="Search..." aria-label="Search" name="keyword" id="keyword">
                    </div>
                </div>
            </section>

            <!-- product -->
            <section class="py-4">
                <div class="container" id="output">
                    <!-- <div class="table-responsive">
                        <table class=" table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="2">id</th>
                                    <th scope="col">product</th>
                                    <th scope="col" colspan="2">category</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider" id="output">

                            </tbody>
                        </table>
                    </div> -->
                </div>
            </section>
        </div>

        <!-- Modal add new product -->
        <form action="<?= URLROOT ?>/Admin/addProduct" method="POST" class="modal-layout add_product" enctype="multipart/form-data">
            <div id="add_product" class="modal-inner">
                <div class="d-flex align-items-end">
                    <span class="me-auto ps-4 fw-semibold fs-3">Add new product</span>
                    <span class="material-symbols-outlined modal-close">
                        close
                    </span>
                </div>
                <br style="clear: both;">
                <div class="row py-2 py-md-4 px-3 px-md-4">
                    <div class=" col-12 col-lg-6">
                        <div class="px-3">
                            <!-- name product -->
                            <div class="mb-3">
                                <label for="name_product" class="form-label">Product name</label>
                                <input type="text" class="form-control" name="prod_name" id="name_product" placeholder="Enter name of product" required>
                            </div>
                            <div class="row mb-3">
                                <!-- Category -->
                                <div class="col">
                                    <label class="form-label">Category</label>
                                    <select class="form-select" name="category" aria-label="Default select example" required>
                                        <?php foreach ($data['category_list'] as $cate) : extract($cate); ?>
                                            <option value="<?= $category_id ?>"><?= $category_name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!-- Quantity -->
                                <div class="col">
                                    <label for="quantity_product" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" name="prod_quantity" id="quantity_product" value="1" min="1">
                                </div>
                            </div>
                            <!-- Description -->
                            <div class="mb-3 mb-lg-0">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" style="resize: none;" required></textarea>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 col-lg-6 d-flex flex-column">
                        <div class="px-3">
                            <!--  product  images-->
                            <div class="mb-3">
                                <label for="file-upload" class="form-label">Product images</label>
                                <input type="file" id="fileToUpload" name="fileToUpload[]" class="form-control" multiple required>
                            </div>

                            <!-- Price product -->
                            <label class="form-label">Price</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="number" name="prod_price" class="form-control" min="1" aria-label="Amount (to the nearest dollar)" required>
                            </div>
                        </div>
                        <div class="mt-auto d-inline-flex btn-group gap-3 align-self-center ">
                            <button type="submit" name="addProduct" class="btn btn-primary">Add product</button>
                            <button type="button" class="btn btn-outline-primary btn_close">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="<?= JSFILE ?>/sidebar-effect.js"></script>
<script src="<?= JSFILE ?>/product_mgmt.js"></script>
<!-- <script>
    function submit() {
        let form = document.getElementById("formcate");
        form.submit();
    }
</script> -->
<script type="text/javascript">
    $(document).ready(function() {
        handleAjax(<?= $data['number'] ?>);
        $("#keyword").keyup(function() {
            handleAjax(<?= $data['number'] ?>);
        });
        $("#category").change(function() {
            handleAjax(<?= $data['number'] ?>);
        });
    });

    var url = window.location.pathname.split('/');

    function handleAjax(number) {
        var category = $("#category").val();
        var keyword = $("#keyword").val();
        $.ajax({
            url: window.location.protocol + "//" +
                window.location.hostname + "/" + url[1] + "/Admin/search/" + number,
            method: "POST",
            data: {
                keyword: keyword,
                category: category
            },
            success: function(data) {
                $("#output").html(data);
            }
        });
    }
</script>

</html>