<?php
declare(strict_types=1);

header('Content-Type: application/javascript; charset=UTF-8');
?>
document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("formLogin");
    if (!form) {
        return;
    }

    form.addEventListener("submit", async (event) => {
        event.preventDefault();
        showMessage("mensaje", "");

        const username = document.getElementById("username").value.trim();
        const password = document.getElementById("password").value;

        if (!username || !password) {
            showMessage("mensaje", "Complete usuario y contrasena");
            return;
        }

        try {
            const data = await apiFetch("/api/login", {
                method: "POST",
                skipAuthRedirect: true,
                body: JSON.stringify({ username, password })
            });

            showMessage("mensaje", data.message || "Acceso correcto", "success");
            window.setTimeout(() => {
                window.location.href = data.redirect || buildUrl("/dashboard");
            }, 300);
        } catch (error) {
            showMessage("mensaje", error.message || "No se pudo iniciar sesion");
        }
    });
});
