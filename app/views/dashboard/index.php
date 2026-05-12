<div class="mb-4">
    <h1 class="page-title">Dashboard</h1>
    <p class="helper-text mb-0">Resumen general de clientes, reservas, canchas e ingresos.</p>
</div>

<div id="mensajeDashboard"></div>

<div class="row g-3 mb-4">
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card summary-card h-100">
            <div class="card-body">
                <p class="summary-label">Clientes</p>
                <p class="summary-value" id="totalClientes">0</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card summary-card h-100">
            <div class="card-body">
                <p class="summary-label">Reservas</p>
                <p class="summary-value" id="totalReservas">0</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card summary-card h-100">
            <div class="card-body">
                <p class="summary-label">Canchas</p>
                <p class="summary-value" id="totalCanchas">0</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card summary-card h-100">
            <div class="card-body">
                <p class="summary-label">Pagos</p>
                <p class="summary-value" id="totalPagos">0</p>
            </div>
        </div>
    </div>
</div>

<div class="card section-card">
    <div class="card-header">Ingresos</div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-12 col-md-4">
                <div class="income-card">
                    <p class="income-label">Ingresos del dia</p>
                    <p class="income-value" id="ingresosDia">S/ 0.00</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="income-card">
                    <p class="income-label">Ingresos de la semana</p>
                    <p class="income-value" id="ingresosSemana">S/ 0.00</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="income-card">
                    <p class="income-label">Ingresos del mes</p>
                    <p class="income-value" id="ingresosMes">S/ 0.00</p>
                </div>
            </div>
        </div>
        <p class="helper-text mt-3 mb-0">Los datos se calculan directamente desde la base de datos registrada en XAMPP.</p>
    </div>
</div>
