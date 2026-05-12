<?php
declare(strict_types=1);

class Pago extends BaseModel
{
    public function countAll(): int
    {
        return (int) $this->db->query('SELECT COUNT(*) FROM pago')->fetchColumn();
    }

    public function incomeSummary(): array
    {
        $sql = "
            SELECT
                COALESCE(SUM(CASE WHEN DATE(fecha_pago) = CURDATE() THEN monto END), 0) AS dia,
                COALESCE(SUM(CASE WHEN YEARWEEK(fecha_pago, 1) = YEARWEEK(CURDATE(), 1) THEN monto END), 0) AS semana,
                COALESCE(SUM(CASE WHEN YEAR(fecha_pago) = YEAR(CURDATE()) AND MONTH(fecha_pago) = MONTH(CURDATE()) THEN monto END), 0) AS mes
            FROM pago
        ";

        $row = $this->db->query($sql)->fetch() ?: [];

        return [
            'dia' => (float) ($row['dia'] ?? 0),
            'semana' => (float) ($row['semana'] ?? 0),
            'mes' => (float) ($row['mes'] ?? 0),
        ];
    }

    public function syncForReserva(int $reservaId, ?float $monto): void
    {
        $stmt = $this->db->prepare('SELECT id_pago FROM pago WHERE id_reserva = :reservaId LIMIT 1');
        $stmt->execute(['reservaId' => $reservaId]);
        $pagoId = $stmt->fetchColumn();

        if ($monto === null || $monto <= 0) {
            $delete = $this->db->prepare('DELETE FROM pago WHERE id_reserva = :reservaId');
            $delete->execute(['reservaId' => $reservaId]);
            return;
        }

        if ($pagoId) {
            $update = $this->db->prepare('UPDATE pago SET monto = :monto WHERE id_pago = :idPago');
            $update->execute([
                'monto' => $monto,
                'idPago' => $pagoId,
            ]);
            return;
        }

        $insert = $this->db->prepare('INSERT INTO pago (monto, id_reserva) VALUES (:monto, :reservaId)');
        $insert->execute([
            'monto' => $monto,
            'reservaId' => $reservaId,
        ]);
    }
}
