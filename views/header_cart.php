<?php if (isset($_SESSION['cart'])) : ?>
    <span class="badge rounded-pill bg-dark"><?= sizeof($_SESSION['cart']) ?></span>
    <div class="header-cart-list shadow-lg" id="header-cart">
        <?php if (isset($_SESSION['cart']) && sizeof($_SESSION['cart']) > 0) : ?>
            <ul class="cart-product-list mb-2">
                <?php foreach ($_SESSION['cart'] as $prod) : extract($prod) ?>

                    <li class="cart-product-item d-flex mb-2">
                        <img src="<?= IMAGE ?>/<?= $prod_img ?>" alt="" style="width: 20%;">

                        <div class="cart-product-description">
                            <div class="cart-product-main-des mb-2 fs-5">
                                <?= $prod_name ?>
                            </div>
                            <div class="cart-product-sub-des" style="color: rgb(155, 150, 150);">
                                <span class="cart-product-quantity"><?= $prod_quantity_cart ?></span>
                                <span>x</span>
                                <span>$<?= $prod_price ?>.00</span>
                            </div>
                        </div>
                        <div>
                            <button type="button" onclick="deleteProductHeaderCart(<?= $prod_id ?>)" style="border: none; background: white;">
                                <span class="material-symbols-outlined cart-delete">
                                    close
                                </span>
                            </button>
                        </div>
                    </li>

                <?php endforeach; ?>
            </ul>
            <?php if (isset($_SESSION['total'])) : ?>
                <div class="cart-subtotal d-flex fs-4 justify-content-center align-items-center border-top border-bottom py-3 fs-5">
                    <label class="mx-1">Subtotal:</label>
                    <div class="fs-5 fw-semibold">$<?= number_format($_SESSION['total'], 2, '.', ',') ?></span>
                    </div>
                </div>
            <?php endif; ?>
            <div class="cart-button d-flex flex-column justify-content-center mt-3">
                <a class="btn btn-primary" href="<?= URLROOT ?>/Cart" type="submit">View Cart</a>
                <a class="btn btn-outline-primary mt-2" href="<?= URLROOT ?>/Checkout" type="submit">Checkout</a>
            </div>

        <?php else : ?>

            <div class="text-center">
                <img src="<?= IMAGE ?>/cart.png" class="img-fluid pb-2" alt="">
                <p>You have no products in your cart</p>
            </div>

        <?php endif; ?>
    </div>
<?php else : ?>
    <span class="badge rounded-pill bg-dark">0</span>
<?php endif; ?>