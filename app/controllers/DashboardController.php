<?php
declare(strict_types=1);

class DashboardController extends Controller
{
    public function index(): void
    {
        if (!$this->requireAuth()) {
            return;
        }

        $this->view('dashboard/index', [
            'title' => 'Dashboard | Voley Diloz',
            'scripts' => ['js/dashboard.js'],
            'activePage' => 'dashboard',
        ]);
    }

    public function summary(): void
    {
        if (!$this->requireAuth(true)) {
            return;
        }

        $clienteModel = new Cliente();
        $canchaModel = new Cancha();
        $reservaModel = new Reserva();
        $pagoModel = new Pago();

        $this->json([
            'totalClientes' => count($clienteModel->all()),
            'totalReservas' => $reservaModel->countAll(),
            'totalCanchas' => count($canchaModel->all()),
            'totalPagos' => $pagoModel->countAll(),
            'ingresos' => $pagoModel->incomeSummary(),
        ]);
    }
}
