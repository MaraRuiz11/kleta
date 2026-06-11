<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Login.php';

class LoginController extends Controller {
    public function index(): void {
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['user'] ?? '');
            $clave = trim($_POST['pass'] ?? '');

            if (empty($email) || empty($clave)) {
                $error = "Completa todos los campos, por favor.";
            } else {
                $resultado = (new Login())->login($email, $clave);

                if ($resultado) {
                    $_SESSION['usuario'] = $resultado;
                    header('Location: ' . BASE_URL . '/dashboard');
                    exit;
                } else {
                    $error = "Correo o contraseña incorrectos.";
                }
            }
        }

        $this->view('auth/login', ['error' => $error]);
    }
}
