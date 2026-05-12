<?php
declare(strict_types=1);

class Cliente extends BaseModel
{
    public function all(): array
    {
        $stmt = $this->db->query('SELECT id_cliente, dni, nombre, apellido FROM cliente ORDER BY id_cliente DESC');
        return array_map([$this, 'mapCliente'], $stmt->fetchAll());
    }

    public function findByDni(string $dni): ?array
    {
        $stmt = $this->db->prepare('SELECT id_cliente, dni, nombre, apellido FROM cliente WHERE dni = :dni LIMIT 1');
        $stmt->execute(['dni' => $dni]);
        $row = $stmt->fetch();

        return $row ? $this->mapCliente($row) : null;
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->db->prepare('SELECT id_cliente, dni, nombre, apellido FROM cliente WHERE id_cliente = :id LIMIT 1');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();

        return $row ? $this->mapCliente($row) : null;
    }

    public function create(string $dni, string $nombre, string $apellido): array
    {
        $stmt = $this->db->prepare(
            'INSERT INTO cliente (dni, nombre, apellido) VALUES (:dni, :nombre, :apellido)'
        );
        $stmt->execute([
            'dni' => $dni,
            'nombre' => $nombre,
            'apellido' => $apellido,
        ]);

        return $this->findById((int) $this->db->lastInsertId()) ?? [];
    }

    public function findOrCreate(string $dni, string $nombre, string $apellido): array
    {
        $existing = $this->findByDni($dni);
        if ($existing) {
            return $existing;
        }

        return $this->create($dni, $nombre, $apellido);
    }

    private function mapCliente(array $row): array
    {
        return [
            'idCliente' => (int) $row['id_cliente'],
            'dni' => (string) $row['dni'],
            'nombre' => (string) $row['nombre'],
            'apellido' => (string) $row['apellido'],
        ];
    }
}
