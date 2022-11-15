<div>
    <!-- Pagination -->
    <ul class="pagination justify-content-center">
        <!-- Previous button -->
        <?php if ($data['number'] == 1) :  ?>

            <li class="page-item disabled">
                <a class="page-link">«</a>
            </li>

        <?php else : ?>

            <li class="page-item">
                <a class="page-link" onclick="handleAjax(1)">«</a>
            </li>

        <?php endif ?>

        <!-- Page number -->
        <?php
        if (!empty($data['page'])) : ?>

            <?php $number = $data['number']; ?>

            <?php if ($data['page'] <= 1) : ?>

                <li class="page-item active">
                    <a class="page-link" onclick="handleAjax(<?= $number ?>)"><?= $number ?></a>
                </li>

            <?php else : ?>

                <?php if ($number == 1) : ?>

                    <li class="page-item active">
                        <a class="page-link" onclick="handleAjax(<?= $number ?>)"><?= $number ?></a>
                    </li>

                    <?php $number = $number + 1; ?>

                    <li class="page-item">
                        <a class="page-link" onclick="handleAjax(<?= $number ?>)"><?= $number ?></a>
                    </li>

                <?php else : ?>

                    <?php $number = $number - 1; ?>

                    <li class="page-item">
                        <a class="page-link" onclick="handleAjax(<?= $number ?>)"><?= $number ?></a>
                    </li>

                    <?php $number = $number + 1; ?>

                    <li class="page-item active">
                        <a class="page-link" onclick="handleAjax(<?= $number ?>)"><?= $number ?></a>
                    </li>

                <?php endif; ?>

                <!-- Nếu số nút trang hiện nhiều hơn 5 -->
                <?php if ($data['page'] - $number > 3) : ?>

                    <?php for ($i = $number + 1; $i <= $number + 1; $i++) : ?>

                        <li class="page-item">
                            <a class="page-link" onclick="handleAjax(<?= $i ?>)"><?= $i ?></a>
                        </li>

                    <?php endfor; ?>

                    <li class="page-item disabled">
                        <a class="page-link">...</a>
                    </li>

                    <?php for ($i = $data['page'] - 1; $i <= $data['page']; $i++) : ?>

                        <li class="page-item">
                            <a class="page-link" onclick="handleAjax(<?= $i ?>)"><?= $i ?></a>
                        </li>

                    <?php endfor; ?>

                    <!-- Nếu số nút trang hiện ít hơn 5 -->
                <?php else : ?>

                    <?php for ($i = $number + 1; $i <= $data['page']; $i++) : ?>

                        <li class="page-item">
                            <a class="page-link" onclick="handleAjax(<?= $i ?>)"><?= $i ?></a>
                        </li>

                    <?php endfor; ?>
                <?php endif; ?>
            <?php endif; ?>

        <?php endif; ?>


        <!-- Next button -->
        <?php if ($data['number'] == $data['page']) :  ?>

            <li class="page-item disabled">
                <a class="page-link">»</a>
            </li>

        <?php else : ?>

            <li class="page-item">
                <a class="page-link" onclick="handleAjax(<?= $data['page'] ?>)">»</a>
            </li>

        <?php endif ?>
    </ul>
</div>