<div>
    <div class="fixed-top prevent-select bg-dark" id="sidebar" style="min-height: 100vh; width: 340px;">
        <a> <span class="material-symbols-outlined align-middle ms-4 mt-4 text-white invisible" id="sidebar-menu-btn" style="font-size: 40px;"> menu
            </span> </a>
        <div class="dropdown" style="margin-top: 40px; margin-bottom: 70px;">
            <div class="d-flex text-center justify-content-center" type="button" data-bs-toggle="collapse" data-bs-target="#ac-toggler" aria-controls="ac-toggler" aria-expanded="false" aria-label="Toggle navigation">
                <img class="ac-icon" style="margin-right: 10px;" src="<?= IMAGE ?>/cat.jpg" alt="">
                <p>
                    <?php if (!empty($_SESSION['user_name'])) : ?>
                        <span class="dropdown-toggle text-white"> <?= $_SESSION['user_name'] ?> </span>
                    <?php endif; ?>
                    <br>
                    <span class="text-muted" style="font-size: 18px; margin-right: 10px;">
                        Sales Manager
                    </span>
                </p>
            </div>
            <div class="text-center collapse" id="ac-toggler" style="margin-top: 20px;">
                <a class="d-block pb-3 text-white" style="font-size: 18px;">
                    Setting
                </a>
                <a href="<?= URLROOT ?>/User/logout" class="d-block text-white" style="font-size: 18px;">
                    Log out
                </a>
            </div>
        </div>
        <div>
            <ul class="p-0 m-0">
                <a class="d-block text-white" href="<?= URLROOT ?>/Admin/order" style="padding: 18px">
                    <span class="material-symbols-outlined align-middle ms-2 me-2">
                        grid_view
                    </span>
                    <span class="align-middle sidebar-text">
                        Order Management
                    </span>
                </a>
                <a class="d-block text-white" href="<?= URLROOT ?>/Admin/product" style="padding: 18px">
                    <span class="material-symbols-outlined align-middle ms-2 me-2">
                        grid_view
                    </span>
                    <span class="align-middle sidebar-text">
                        Product Management
                    </span>
                </a>
                <a class="d-block text-white" href="<?= URLROOT ?>/Admin/category" style="padding: 18px">
                    <span class="material-symbols-outlined align-middle ms-2 me-2">
                        category
                    </span>
                    <span class="align-middle sidebar-text">
                        Category Management
                    </span>
                </a>
                <a class="d-block text-white" href="<?= URLROOT ?>/Admin/employee" style="padding: 18px">
                    <span class="material-symbols-outlined align-middle ms-2 me-2">
                        person
                    </span>
                    <span class="align-middle sidebar-text">
                        Employee Management
                    </span>
                </a>
                <a class="d-block text-white" href="<?= URLROOT ?>/Admin/customer" style="padding: 18px">
                    <span class="material-symbols-outlined align-middle ms-2 me-2">
                        group
                    </span>
                    <span class="align-middle sidebar-text">
                        Customer Management
                    </span>
                </a>
            </ul>
        </div>
    </div>

    <div onclick="closeSubSidebar()" id="sub_sidebar"></div>
</div>