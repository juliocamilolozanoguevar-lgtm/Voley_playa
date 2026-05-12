<?php
declare(strict_types=1);

header('Content-Type: application/javascript; charset=UTF-8');
?>
document.addEventListener("DOMContentLoaded", async () => {
    try {
        const data = await apiFetch("/api/dashboard/summary");

        document.getElementById("totalClientes").textContent = data.totalClientes ?? 0;
        document.getElementById("totalReservas").textContent = data.totalReservas ?? 0;
        document.getElementById("totalCanchas").textContent = data.totalCanchas ?? 0;
        document.getElementById("totalPagos").textContent = data.totalPagos ?? 0;

        document.getElementById("ingresosDia").textContent = formatCurrency(data.ingresos?.dia);
        document.getElementById("ingresosSemana").textContent = formatCurrency(data.ingresos?.semana);
        document.getElementById("ingresosMes").textContent = formatCurrency(data.ingresos?.mes);
    } catch (error) {
        showMessage("mensajeDashboard", error.message || "No se pudo cargar el dashboard");
    }
});
