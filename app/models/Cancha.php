<?php
declare(strict_types=1);

class Cancha extends BaseModel
{
    public function all(): array
    {
        $stmt = $this->db->query('SELECT id_cancha, nombre_cancha, descripcion FROM cancha ORDER BY id_cancha ASC');
        return array_map([$this, 'mapCancha'], $stmt->fetchAll());
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->db->prepare('SELECT id_cancha, nombre_cancha, descripcion FROM cancha WHERE id_cancha = :id LIMIT 1');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();

        return $row ? $this->mapCancha($row) : null;
    }

    private function mapCancha(array $row): array
    {
        return [
            'idCancha' => (int) $row['id_cancha'],
            'nombreCancha' => (string) $row['nombre_cancha'],
            'descripcion' => $row['descripcion'] ?? '',
        ];
    }
}
