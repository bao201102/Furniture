<!-- Cart -->
<?php if (isset($_SESSION['cart']) && sizeof($_SESSION['cart']) > 0) : ?>

    <div class="row">
        <!-- Products in cart  -->
        <div id="cart-table" class="col-12 col-xl-8 cart-table">
            <!-- table -->
            <div class="table-responsive-md">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th scope="col" colspan="2">product</th>
                            <th scope="col">price</th>
                            <th scope="col">quantity</th>
                            <th scope="col">subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php foreach ($_SESSION['cart'] as $prod) : extract($prod) ?>

                            <tr>

                                <td scope="row"><img src="<?= IMAGE ?>/<?= $prod_img ?>" alt="" class="product-thumbnail"></td>
                                <td style="padding: 24px 0"><a href="<?= URLROOT ?>/Home/details/<?= $prod_id ?>"><?= $prod_name ?></a></td>
                                <td>$<?= number_format($prod_price, 2, '.', ',') ?></td>
                                <td class="product-quantity">
                                    <input class="form-control border border-1" type="number" onchange="updateProductCart(<?= $prod_id ?>, this.value)" value="<?= $prod_quantity_cart ?>" min="1" max=<?= $prod_quantity_max ?>>
                                </td>
                                <td>$<?= number_format($subtotal, 2, '.', ',') ?></td>
                                <td>
                                    <button type="button" onclick="deleteProductCart(<?= $prod_id ?>)" style="border: none; background: white;">
                                        <span class="material-symbols-outlined cart-delete">
                                            close
                                        </span>
                                    </button>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-4 mb-4 mb-xl-0 d-flex justify-content-center">
                <div class="btn-group gap-3" role="group">
                    <button type="button" name="action" class="btn btn-outline-primary" onclick="emptyCart()">Empty cart</button>
                </div>
            </div>
        </div>

        <!-- Summary -->
        <div id="cart-totals" class="col-12 col-xl-4" style="width: auto;">
            <div class="product-summary">
                <div class="text-black fs-4" style="margin-bottom: 30px;">
                    Cart totals
                </div>
                <table class="table align-middle" style="font-size: 15px;">
                    <tbody>
                        <?php if (isset($_SESSION['total'])) : ?>
                            <tr>
                                <td scope="row" class="text-black fw-semibold ps-0">Subtotal</td>
                                <td class="text-end text-xl-start pe-0">$<?= number_format($_SESSION['total'], 2, '.', ',') ?></td>
                            </tr>

                            <tr>
                                <td scope="row" class="text-black fw-semibold  ps-0">Total</td>
                                <td class="text-end  text-xl-start  pe-0">
                                    <p class="fw-semibold fs-3 text-black pb-3">$<?= number_format($_SESSION['total'] * 1.1, 2, '.', ',') ?></p>
                                    <span class="fs-6">(Includes $ <?= number_format($_SESSION['total'] * 0.1, 2, '.', ',') ?> tax)</span>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <div class="d-flex flex-column justify-content-center mt-2 mt-xl-5">
                    <a href="<?= URLROOT ?>/Checkout" class="btn btn-primary">
                        Proceed to checkout
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php else : ?>

    <!-- No product in cart -->
    <div class="text-center pt-5">
        <img src="<?= IMAGE ?>/cart2.png" class="img-fluid pb-2" style="max-height: 45vh;" alt="">
        <p class="fs-2">You have no products in your cart</p>
    </div>
    <form action="<?= URLROOT ?>/Search" method="POST" class="mt-5 text-center">
        <button class="fs-4 btn btn-primary">RETURN TO SHOP</button>
    </form>

<?php endif; ?>