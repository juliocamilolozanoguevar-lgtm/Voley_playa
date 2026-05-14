<div class="mb-4">
    <h1 class="page-title">Reservas</h1>
</div>

<div id="mensajeReserva"></div>

<div class="card section-card">
    <div class="card-header d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
        <span>Listado de reservas</span>
        <div class="d-flex gap-2 w-100 w-lg-auto">
            <input type="search" id="buscadorReservas" class="form-control" placeholder="Buscar por cliente, DNI, cancha o fecha">
            <button type="button" class="btn btn-outline-primary" id="btnActualizarReservas">Actualizar</button>
        </div>
    </div>
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
                        <th>Pago</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tablaReservas"></tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditarReserva" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header">
                <h2 class="modal-title fs-5">Editar reserva</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <div id="mensajeModalReserva"></div>
                <form id="formEditarReserva" novalidate>
                    <input type="hidden" id="editarReservaId">
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <label class="form-label">Cliente</label>
                            <input type="text" id="editarCliente" class="form-control" readonly>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label">DNI</label>
                            <input type="text" id="editarDni" class="form-control" readonly>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="editarCanchaId" class="form-label">Cancha</label>
                            <select id="editarCanchaId" class="form-select"></select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="editarFecha" class="form-label">Fecha</label>
                            <input type="date" id="editarFecha" class="form-control">
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="editarHoraInicio" class="form-label">Hora inicio</label>
                            <input type="time" id="editarHoraInicio" class="form-control" step="1800">
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="editarHoraFin" class="form-label">Hora fin</label>
                            <input type="time" id="editarHoraFin" class="form-control" step="1800">
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="editarMonto" class="form-label">Adelanto</label>
                            <input type="number" id="editarMonto" class="form-control" min="0" step="0.01">
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="editarEstadoReserva" class="form-label">Estado de reserva</label>
                            <select id="editarEstadoReserva" class="form-select">
                                <option value="RESERVADA">RESERVADA</option>
                                <option value="CONFIRMADA">CONFIRMADA</option>
                                <option value="FINALIZADA">FINALIZADA</option>
                                <option value="CANCELADA">CANCELADA</option>
                            </select>
                        </div>
                        
                        <div class="col-12">
                            <div id="estadoEdicionHorario" class="helper-text"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnGuardarEdicionReserva">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>
