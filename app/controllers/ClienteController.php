<?php
declare(strict_types=1);

class ClienteController extends Controller
{
    public function index(): void
    {
        if (!$this->requireAuth()) {
            return;
        }

        $this->view('clientes/index', [
            'title' => 'Clientes | Voley Diloz',
            'scripts' => ['js/clientes.php'],
            'activePage' => 'clientes',
        ]);
    }

    public function list(): void
    {
        if (!$this->requireAuth(true)) {
            return;
        }

        $model = new Cliente();
        $this->json($model->all());
    }

    public function findByDni(string $dni): void
    {
        if (!$this->requireAuth(true)) {
            return;
        }

        $model = new Cliente();
        $cliente = $model->findByDni($dni);

        if (!$cliente) {
            $this->json(['message' => 'Cliente no encontrado'], 404);
        }

        $this->json($cliente);
    }

    public function store(): void
    {
        if (!$this->requireAuth(true)) {
            return;
        }

        $data = $this->requestData();
        $dni = trim((string) ($data['dni'] ?? ''));
        $nombre = trim((string) ($data['nombre'] ?? ''));
        $apellido = trim((string) ($data['apellido'] ?? ''));

        if (!preg_match('/^\d{8}$/', $dni)) {
            $this->json(['message' => 'El DNI debe tener 8 digitos'], 422);
        }

        if ($nombre === '' || $apellido === '') {
            $this->json(['message' => 'Complete nombre y apellido'], 422);
        }

        $model = new Cliente();
        if ($model->findByDni($dni)) {
            $this->json(['message' => 'Ese cliente ya existe en la base de datos'], 409);
        }

        $cliente = $model->create($dni, $nombre, $apellido);
        $this->json($cliente, 201);
    }

    public function destroy(string $id): void
    {
        if (!$this->requireAuth(true)) {
            return;
        }

        $clienteId = (int) $id;
        $model = new Cliente();

        if (!$model->findById($clienteId)) {
            $this->json(['message' => 'Cliente no encontrado'], 404);
        }

        if ($model->hasReservas($clienteId)) {
            $this->json(['message' => 'No se puede eliminar el cliente porque tiene reservas registradas'], 409);
        }

        $model->delete($clienteId);
        $this->json(['message' => 'Cliente eliminado correctamente']);
    }
}
