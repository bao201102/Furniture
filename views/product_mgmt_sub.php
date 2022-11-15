<?php if (!empty($data['prodList'])) :
    $i = 0; ?>
    <div class="table-responsive">
        <table class=" table table-hover align-middle">
            <thead>
                <tr>
                    <th scope="col" colspan="2">id</th>
                    <th scope="col">product</th>
                    <th scope="col" colspan="2">category</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($data['prodList'] as $prodList) : extract($prodList); ?>
                    <tr>
                        <th scope="row"><?= $prod_id ?></th>
                        <td><img src="<?= IMAGE ?>/<?= $data['image'][$i]['img_link'] ?>" alt="" class="product-thumbnail"></td>
                        <td><?= $prod_name ?></td>
                        <td><?= $data['category'][$i][0]['category_name'] ?></td>
                        <td class="text-center utility">
                            <div class="d-flex justify-content-center">
                                <form action="<?= URLROOT ?>/Admin/showEdit/<?= $prod_id ?>" method="POST">
                                    <button name="editProduct" type="submit" class="material-symbols-outlined edit border border-0 bg-white">edit</button>
                                </form>
                                <form action="<?= URLROOT ?>/Admin/deleteProduct/<?= $prod_id ?>" method="POST">
                                    <button name="deleteProduct" type="submit" class="material-symbols-outlined delete border border-0 bg-white">delete</button>
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

<?php require_once APPROOT . '/views/includes/pagination.php'; ?>