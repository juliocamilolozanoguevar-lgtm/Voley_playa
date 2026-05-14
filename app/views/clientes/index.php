<div class="mb-4">
    <h1 class="page-title">Clientes y reservas</h1>
</div>

<div id="mensajeCliente"></div>

<div class="card section-card mb-4">
    <div class="card-header">Registro integral</div>
    <div class="card-body">
        <form id="formClienteReserva" novalidate>
            <div class="row g-3">
                <div class="col-12 col-md-4">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" id="dni" class="form-control" maxlength="8" inputmode="numeric">
                </div>
                <div class="col-12 col-md-4">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" class="form-control">
                </div>
                <div class="col-12 col-md-4">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" id="apellido" class="form-control">
                </div>
                <div class="col-12 col-md-4">
                    <label for="canchaId" class="form-label">Cancha</label>
                    <select id="canchaId" class="form-select"></select>
                </div>
                <div class="col-12 col-md-4">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" id="fecha" class="form-control">
                </div>
                <div class="col-12 col-md-4">
                    <label for="monto" class="form-label">Adelanto (opcional)</label>
                    <input type="number" id="monto" class="form-control" min="0" step="0.01" placeholder="0.00">
                </div>
                <div class="col-12">
                    <div class="availability-box">
                        <div class="d-flex flex-column flex-lg-row justify-content-between gap-2 align-items-lg-center mb-3">
                            <div>
                                <h2 class="h6 mb-1">Horarios disponibles</h2>
                            </div>
                            <div id="estadoDisponibilidad" class="helper-text"></div>
                        </div>
                        <div id="horariosDisponibles" class="slot-grid"></div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label">Inicio seleccionado</label>
                    <div class="selected-slot" id="horaInicioSeleccionada">Seleccione un horario disponible</div>
                    <input type="hidden" id="horaInicio">
                </div>
                <div class="col-12 col-md-6">
                    <label for="horaFin" class="form-label">Horario de fin</label>
                    <select id="horaFin" class="form-select">
                        <option value="">Seleccione el horario final</option>
                    </select>
                </div>
            </div>

            <div class="d-flex flex-wrap gap-2 mt-4">
                <button type="submit" class="btn btn-primary">Guardar cliente y reserva</button>
                <button type="button" class="btn btn-outline-primary" id="btnGuardarSoloCliente">Guardar solo cliente</button>
            </div>
        </form>
    </div>
</div>

<div class="row g-4">
    <div class="col-12 col-xl-5">
        <div class="card section-card h-100">
            <div class="card-header">Clientes registrados</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped align-middle mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                            </tr>
                        </thead>
                        <tbody id="tablaClientes"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-xl-7">
        <div class="card section-card h-100">
            <div class="card-header">Reservas registradas</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped align-middle mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Cancha</th>
                                <th>Fecha</th>
                                <th>Horario</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody id="tablaReservasCliente"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
