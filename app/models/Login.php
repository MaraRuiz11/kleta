<?php
require_once __DIR__ . '/../core/Database.php';

class Login {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function login(string $email, string $clave): array|false {
        $sql  = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        $usuario = $stmt->fetch();

        if ($usuario && md5($clave) === $usuario['password']) {
            return $usuario;
        }
        return false;
    }
}
