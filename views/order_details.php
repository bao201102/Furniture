<div class="fs-4 text-black" style="margin-bottom: 30px;">
    <p>Your order</p>
</div>

<table class="table align-middle" style="font-size: 15px;">
    <thead>
        <tr>
            <th class="ps-0" scope="col" colspan="2">product</th>
            <th class="text-end text-xl-start pe-0" scope="col">total</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php foreach ($_SESSION['cart'] as $prod) : extract($prod) ?>
            <tr>
                <input type="hidden" name="prod_id[]" value="<?= $prod_id ?>">
                <input type="hidden" name="quantity[]" value="<?= $prod_quantity_cart ?>">
                <input type="hidden" name="prod_price[]" value="<?= $prod_price ?>">
                <td class="ps-0" scope="row"><?= $prod_name ?></td>
                <td class="text-end text-xl-start pe-0"><?= $prod_quantity_cart ?> x $<?= number_format($prod_price, 2, '.', ',') ?></td>
                <td class="text-end text-xl-start pe-0">$<?= number_format($subtotal, 2, '.', ',') ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<table class="table align-middle" style="font-size: 15px;">
    <tbody>

        <?php if (isset($_SESSION['total'])) : ?>
            <tr>
                <td scope="row" class="text-black fw-semibold ps-0">Subtotal</td>
                <td class="text-end text-xl-start pe-0">$<?= number_format($_SESSION['total'], 2, '.', ',') ?></td>
            </tr>
        <?php endif; ?>

        <tr>
            <td scope="row" class="text-black fw-semibold ps-0 ">Shipping</td>
            <td class="pe-0">
                <div class="float-end float-xl-start">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="shipping" id="free" checked>
                        <label class="form-check-label" for="free">Free shipping</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="shipping" id="local">
                        <label class="form-check-label" for="local">Local pickup</label>
                    </div>
                </div>
            </td>
        </tr>

        <?php if (isset($_SESSION['total'])) : ?>
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

<div class="pay-type">
    <div class="form-check">
        <input class="form-check-input" type="radio" checked name="optionsRadios" id="optionsRadios3" value="option3">
        <label class="form-check-label" for="optionsRadios3">
            Cash on delivery
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
        <label class="form-check-label" for="optionsRadios1">
            Direct bank transfer
        </label>
    </div>
    <div class="pay-type-note mb-3" style="font-size: 13px; background-color: #F0F2F2; padding: 15px;">
        <p>Make your payment directly into our
            bank account. Please use your Order ID as the payment reference. Your order will not
            be
            shipped until the funds have cleared in our account.</p>
    </div>
</div>

<p style="margin: 20px 0; font-size: 13px;">Your personal data will be
    used to process your order, support your experience throughout this website, and for other
    purposes described in our privacy policy.</p>

<div class="d-flex flex-column justify-content-center mt-2">
    <button type="submit" name="order" class="btn btn-primary ">Place order</button>
</div>