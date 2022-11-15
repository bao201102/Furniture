<nav class="navbar navbar-expand-lg fixed-top py-3 border-0 bg-transparent" id="nav-id">
    <div class="container-fluid">
        <a class="navbar-brand ms-5 fs-3" href="<?= URLROOT ?>/Home">Hamlin</a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-collapse-item" aria-controls="navbar-collapse-item" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse fs-10" id="navbar-collapse-item">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= URLROOT ?>/Home">Home
                        <span class="visually-hidden">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URLROOT ?>/Search">Shop all</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
            </ul>
            <div class="nav-item">
                <ul class="navbar-nav gap-2 flex-row">
                    <li>
                        <a class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
                            <span class="material-symbols-outlined">
                                search
                            </span>
                        </a>
                    </li>
                    <li class="cart-icon">
                        <a id="btn-shop-cart">
                            <a class="material-symbols-outlined nav-link" href="<?= URLROOT ?>/Cart">
                                shopping_cart
                            </a>

                            <span id="ses-cart">
                                <?php include_once APPROOT . '/views/header_cart.php' ?>
                            </span>
                        </a>
                    </li>

                    <?php if (!empty($_SESSION['user_id'])) : ?>

                        <li class="dropdown">
                            <a class="nav-link" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                <span class="material-symbols-outlined">
                                    account_circle
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-dark text-center pt-2" data-popper-placement="bottom-start" style="height: 95px; width: 150px;">
                                <?php if ($_SESSION['user_type'] == 1) : ?>

                                    <a class="dropdown-item" type="button" href="<?= URLROOT ?>/User/profile">Profile</a>

                                <?php else : ?>

                                    <a class="dropdown-item" type="button" href="<?= URLROOT ?>/User/profile">Administrator</a>

                                <?php endif; ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" type="button" href="<?= URLROOT ?>/User/logout">Log out</a>
                            </div>
                        </li>

                    <?php else : ?>

                        <li>
                            <a class="nav-link" href="<?= URLROOT ?>/User">
                                <span class="material-symbols-outlined">
                                    account_circle
                                </span>
                            </a>
                        </li>

                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Search offcanvas section -->
<?php
require_once APPROOT . '/views/includes/searchbox.php';
?>