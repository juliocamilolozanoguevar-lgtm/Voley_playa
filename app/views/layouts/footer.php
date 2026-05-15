<?php
declare(strict_types=1);
?>
<script>
    window.APP_CONFIG = {
        basePath: <?= json_encode((string) Config::get('app.base_path', '')) ?>,
        appUrl: <?= json_encode((string) Config::get('app.url', '')) ?>
    };
</script>
<script src="<?= e(asset('js/app.php')) ?>"></script>
<?php foreach ($scripts as $script): ?>
    <script src="<?= e(asset($script)) ?>"></script>
<?php endforeach; ?>
</body>
</html>
