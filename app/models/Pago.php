<?php
require_once __DIR__ . '/../core/Database.php';

class Pago {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function obtenerTodos(): array {
        $sql = "
            SELECT pg.*, c.nombre AS cliente
            FROM pagos pg
            JOIN clientes c ON c.id = pg.cliente_id
            ORDER BY pg.fecha_pago DESC, pg.creado_en DESC
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function obtenerPorCliente(int $clienteId): array {
        $sql  = "SELECT * FROM pagos WHERE cliente_id = ? ORDER BY fecha_pago DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$clienteId]);
        return $stmt->fetchAll();
    }

    public function crear(array $datos): bool {
        $sql  = "INSERT INTO pagos (cliente_id, monto, tipo_comprobante, fecha_pago, observacion)
                 VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $datos['cliente_id'],
            $datos['monto'],
            $datos['tipo_comprobante'],
            $datos['fecha_pago'],
            $datos['observacion'] ?? null,
        ]);
    }

    public function eliminar(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM pagos WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function totalHoy(): float {
        $stmt = $this->db->prepare("SELECT COALESCE(SUM(monto), 0) FROM pagos WHERE fecha_pago = CURDATE()");
        $stmt->execute();
        return (float)$stmt->fetchColumn();
    }
}
