<?php
if (!empty($data['prod'])) :
    $i = 0;
    foreach ($data['prod'] as $prod) : extract($prod); ?>
        <!-- product box -->
        <div class="col-6 col-md-4 fs-5 searchKeyword box">
            <div class="card border-0 shadow-sm mb-5 mx-auto" style="min-width: 18vh; max-width: 34vh;">
                <a href="<?= URLROOT ?>/Home/details/<?= $prod_id ?>">
                    <img src="<?= IMAGE ?>/<?= $data['image'][$i]['img_link'] ?>" class="card-img-top img-fluid" alt="...">
                </a>

                <div class="card-body" style="z-index: 2; background-color: white;">
                    <div class="mt-3 fw-bold fs-5"> <?= $prod_name ?> </div>
                    <div class="mt-1 fs-5"> $<?= number_format($prod_price, 2, '.', ',') ?></div>
                </div>

                <button type="button" onclick="addToCart_search(<?= $prod_id ?>, 1, 'addToCart')" class="add-to-cart">
                    <p>ADD TO CART</p>
                </button>
            </div>
        </div>
<?php $i++;
    endforeach;
endif; ?>

<?php require_once APPROOT . '/views/includes/pagination.php'; ?>