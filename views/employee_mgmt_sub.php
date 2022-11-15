<?php if (!empty($data['emp'])) :
    $i = 0; ?>
    <div class="table-responsive">
        <table class=" table table-hover align-middle">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Phone</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach ($data['emp'] as $emp) : extract($emp); ?>
                    <tr>
                        <th scope="row"><?= $emp_id ?></th>
                        <td><?= $lastname ?> <?= $firstname ?></td>
                        <td><?= $birthday ?></td>
                        <td><?= $phone ?></td>
                        <td class="text-center utility">
                            <div class="d-flex justify-content-center">
                                <form action="<?= URLROOT ?>/Admin/showEdit/<?= $user_id ?>" method="POST">
                                    <button name="editEmployee" type="submit" class="material-symbols-outlined edit border border-0 bg-white">edit</button>
                                </form>
                                <form action="<?= URLROOT ?>/Admin/deleteEmployee/<?= $user_id ?>" method="POST">
                                    <button name="deleteEmployee" type="submit" class="material-symbols-outlined delete border border-0 bg-white">delete</button>
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