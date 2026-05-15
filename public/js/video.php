<?php
declare(strict_types=1);

header('Content-Type: application/javascript; charset=UTF-8');
?>
document.addEventListener("DOMContentLoaded", () => {
    const placeholder = document.getElementById("videoPlaceholder");
    if (!placeholder) {
        return;
    }

    placeholder.setAttribute("aria-live", "polite");
});
