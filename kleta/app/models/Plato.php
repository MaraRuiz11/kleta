<?php
require_once __DIR__ . '/../core/Database.php';

class Plato {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function obtenerTodos(): array {
        $stmt = $this->db->prepare("SELECT * FROM platos ORDER BY nombre ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function obtenerDisponibles(): array {
        $stmt = $this->db->prepare("SELECT * FROM platos WHERE disponible = 1 ORDER BY nombre ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function obtenerPorId(int $id): array|false {
        $stmt = $this->db->prepare("SELECT * FROM platos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function crear(array $datos): bool {
        $sql  = "INSERT INTO platos (nombre, descripcion, precio, disponible) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $datos['nombre'],
            $datos['descripcion'],
            $datos['precio'],
            $datos['disponible'] ?? 1,
        ]);
    }

    public function actualizar(int $id, array $datos): bool {
        $sql  = "UPDATE platos SET nombre=?, descripcion=?, precio=?, disponible=? WHERE id=?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $datos['nombre'],
            $datos['descripcion'],
            $datos['precio'],
            $datos['disponible'] ?? 1,
            $id,
        ]);
    }

    public function eliminar(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM platos WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
