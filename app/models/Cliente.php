<?php
require_once __DIR__ . '/../core/Database.php';

class Cliente {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function obtenerTodos(): array {
        $stmt = $this->db->prepare("SELECT * FROM clientes ORDER BY nombre ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function obtenerPorId(int $id): array|false {
        $stmt = $this->db->prepare("SELECT * FROM clientes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function crear(array $datos): bool {
        $sql  = "INSERT INTO clientes (nombre, telefono, direccion, tipo_pago) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $datos['nombre'],
            $datos['telefono'],
            $datos['direccion'],
            $datos['tipo_pago'],
        ]);
    }

    public function actualizar(int $id, array $datos): bool {
        $sql  = "UPDATE clientes SET nombre=?, telefono=?, direccion=?, tipo_pago=? WHERE id=?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $datos['nombre'],
            $datos['telefono'],
            $datos['direccion'],
            $datos['tipo_pago'],
            $id,
        ]);
    }

    public function eliminar(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM clientes WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Saldo pendiente de cada cliente (total consumido - total pagado)
    public function obtenerSaldos(): array {
        $sql = "
            SELECT
                c.id,
                c.nombre,
                c.tipo_pago,
                COALESCE(SUM(cn.cantidad * cn.precio_unit), 0)  AS total_consumido,
                COALESCE((SELECT SUM(p.monto) FROM pagos p WHERE p.cliente_id = c.id), 0) AS total_pagado,
                COALESCE(SUM(cn.cantidad * cn.precio_unit), 0)
                    - COALESCE((SELECT SUM(p.monto) FROM pagos p WHERE p.cliente_id = c.id), 0) AS saldo_pendiente
            FROM clientes c
            LEFT JOIN consumos cn ON cn.cliente_id = c.id
            GROUP BY c.id, c.nombre, c.tipo_pago
            ORDER BY c.nombre ASC
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
