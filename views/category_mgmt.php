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
                        <span class="fw-semibold fs-3">Category Management</span>
                    </div>
                    <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center justify-content-lg-end">
                        <!-- button add new -->
                        <div class="dropdown">
                            <button class="btn btn-info d-flex align-items-center fs-5" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                <span class="material-symbols-outlined">
                                    add
                                </span>
                                Add new
                            </button>
                            <form class="dropdown-menu dropdown-menu-end p-3" style="width:200px;" data-popper-placement="bottom-start" action="<?= URLROOT ?>/Admin/addCategory" method="POST">
                                <div class="mb-3">
                                    <label for="name_product" class="form-label">Category name</label>
                                    <input type="text" class="form-control p-2" name="category" placeholder="Enter category ...">
                                </div>
                                <button type="submit" name="addCategory" class="w-100 btn btn-primary p-2">Add Category</button>
                            </form>

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

                </div>
            </section>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="<?= JSFILE ?>/sidebar-effect.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        handleAjax(<?= $data['number'] ?>);
        $("#keyword").keyup(function() {
            handleAjax(<?= $data['number'] ?>)
        });
    });

    var url = window.location.pathname.split('/');

    function handleAjax(number) {
        var keyword = $("#keyword").val();
        $.ajax({
            url: window.location.protocol + "//" +
                window.location.hostname + "/" + url[1] + "/Admin/searchCategory/" + number,
            method: "POST",
            data: {
                keyword: keyword
            },
            success: function(data) {
                $("#output").html(data);
            }
        });
    }
</script>

</html>