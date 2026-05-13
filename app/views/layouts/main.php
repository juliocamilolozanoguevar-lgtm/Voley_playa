<?php
declare(strict_types=1);

require BASE_PATH . '/app/views/layouts/header.php';
require BASE_PATH . '/app/views/layouts/sidebar.php';
?>

<main class="page-wrapper">
    <div class="container">
        <?php require $contentView; ?>
    </div>
</main>

<?php require BASE_PATH . '/app/views/layouts/footer.php'; ?>
