<?php
declare(strict_types=1);

$videoFiles = [];
foreach (['mp4', 'webm', 'ogg'] as $extension) {
    $videoFiles = array_merge($videoFiles, glob(BASE_PATH . '/public/video/*.' . $extension) ?: []);
}

$videoFile = $videoFiles[0] ?? null;
$videoUrl = $videoFile ? asset('video/' . basename($videoFile)) : null;
?>

<div class="mb-4">
    <h1 class="page-title">Video</h1>
    <p class="helper-text mb-0">Espacio para mostrar material del sistema o de las canchas dentro de la web.</p>
</div>

<div class="card section-card">
    <div class="card-header">Contenido multimedia</div>
    <div class="card-body">
        <div class="video-panel">
            <?php if ($videoUrl): ?>
                <video class="video-player" controls playsinline preload="metadata">
                    <source src="<?= e($videoUrl) ?>">
                    Su navegador no puede reproducir este video.
                </video>
            <?php else: ?>
                <div class="video-placeholder">
                    <span class="video-kicker">Voley Diloz</span>
                    <h2 class="video-title">Agrega tu video aqui</h2>
                    <p class="helper-text mb-0">Coloca un archivo <strong>.mp4</strong>, <strong>.webm</strong> u <strong>.ogg</strong> en <strong>public/video</strong> y esta pagina lo mostrara automaticamente.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
