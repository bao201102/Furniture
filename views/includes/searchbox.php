<div class="offcanvas offcanvas-top container" style="height: 500px;" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
    <button type="button" class="btn-close mt-3 ms-auto fs-5" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    <div class="container" style="padding: 100px;">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasTopLabel">What are you looking for?</h5>
        </div>
        <div class="offcanvas-body">
            <form class="d-flex" action="<?= URLROOT ?>/Search" name="enter" method="POST">
                <input class="form-control me-sm-2" type="text" placeholder="Search our product here" name="keyword">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
</div>