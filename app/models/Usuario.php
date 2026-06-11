<?php
require_once __DIR__ . '/../core/Database.php';

class Usuario {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function obtenerUsuarios(): array {
        $sql = "SELECT id, nombre, email, creado_en FROM usuarios ORDER BY id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function guardarUsuario(array $datos): bool {
        $sql = "INSERT INTO usuarios (nombre, email, password)
                VALUES (:nombre, :email, :password)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nombre'   => $datos['nombre'],
            ':email'    => $datos['email'],
            ':password' => md5($datos['password']),
        ]);
    }

    public function eliminarUsuario(int $id): bool {
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}
