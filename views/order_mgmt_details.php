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
                        <span class="fw-semibold fs-3">Order Details Management</span>
                    </div>
                </div>
            </section>

            <!-- product -->
            <section class="py-4">
                <div class="container">
                    <?php if (!empty($data['order'])) :
                        $i = 0; ?>
                        <div class="table-responsive">
                            <table class=" table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Adress</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    <?php foreach ($data['order'] as $order) : extract($order); ?>
                                        <tr>
                                            <th scope="row"><?= $order_id ?></th>
                                            <td><?= $lastname ?> <?= $firstname ?></td>
                                            <td><?= $address ?>, <?= $city ?></td>
                                            <td><?= $phone ?></td>
                                            <td><?= $email ?></td>

                                            <?php switch ($status):
                                                case '0': ?>

                                                    <th class="text-info" scope="col">NEW</th>

                                                    <?php break; ?>

                                                <?php
                                                case '1': ?>

                                                    <th class="text-success" scope="col">APPROVED</th>

                                                    <?php break; ?>

                                            <?php endswitch; ?>

                                            <td class="text-center utility">
                                                <div class="d-flex justify-content-center">
                                                    <form action="<?= URLROOT ?>/Admin/approveOrder/<?= $order_id ?>" method="POST">
                                                        <button name="editEmployee" type="submit" class="btn btn-primary">APPROVE</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="container pt-5">
                    <span class="fw-semibold fs-4">Product list in order</span>
                    <?php if (!empty($data['order_details'])) :
                        $i = 0; ?>
                        <div class="table-responsive">
                            <table class=" table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="">id</th>
                                        <th scope="col">product</th>
                                        <th scope="col" colspan="">quantity</th>
                                        <th scope="col" colspan="">price</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    <?php foreach ($data['order_details'] as $order_details) : extract($order_details); ?>
                                        <tr>
                                            <td><?= $prod_id ?></td>
                                            <td><?= $prod_name ?></td>
                                            <td><?= $quantity ?></td>
                                            <td><?= $prod_price ?></td>
                                        </tr>
                                    <?php $i++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="<?= JSFILE ?>/sidebar-effect.js"></script>
<script src="<?= JSFILE ?>/product_mgmt.js"></script>
<script src="<?= JSFILE ?>/employee_mgmt.js"></script>

</html>