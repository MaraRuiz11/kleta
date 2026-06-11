<?php
require_once __DIR__ . '/../core/Database.php';

class Consumo {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function obtenerTodos(): array {
        $sql = "
            SELECT cn.*, c.nombre AS cliente, p.nombre AS plato,
                   (cn.cantidad * cn.precio_unit) AS subtotal
            FROM consumos cn
            JOIN clientes c ON c.id = cn.cliente_id
            JOIN platos   p ON p.id = cn.plato_id
            ORDER BY cn.fecha DESC, cn.creado_en DESC
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function obtenerHoy(): array {
        $sql = "
            SELECT cn.*, c.nombre AS cliente, p.nombre AS plato,
                   (cn.cantidad * cn.precio_unit) AS subtotal
            FROM consumos cn
            JOIN clientes c ON c.id = cn.cliente_id
            JOIN platos   p ON p.id = cn.plato_id
            WHERE cn.fecha = CURDATE()
            ORDER BY cn.creado_en DESC
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function obtenerPorCliente(int $clienteId): array {
        $sql = "
            SELECT cn.*, p.nombre AS plato,
                   (cn.cantidad * cn.precio_unit) AS subtotal
            FROM consumos cn
            JOIN platos p ON p.id = cn.plato_id
            WHERE cn.cliente_id = ?
            ORDER BY cn.fecha DESC
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$clienteId]);
        return $stmt->fetchAll();
    }

    public function crear(array $datos): bool {
        $sql  = "INSERT INTO consumos (cliente_id, plato_id, cantidad, precio_unit, fecha, notas)
                 VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $datos['cliente_id'],
            $datos['plato_id'],
            $datos['cantidad'],
            $datos['precio_unit'],
            $datos['fecha'],
            $datos['notas'] ?? null,
        ]);
    }

    public function eliminar(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM consumos WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function totalHoy(): float {
        $stmt = $this->db->prepare("SELECT COALESCE(SUM(cantidad * precio_unit), 0) FROM consumos WHERE fecha = CURDATE()");
        $stmt->execute();
        return (float)$stmt->fetchColumn();
    }
}
