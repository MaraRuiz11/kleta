<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Usuario.php';

class RegisterController extends Controller {
    public function index(): void {
        if (isset($_SESSION['usuario'])) {
            header('Location: ' . BASE_URL . '/dashboard');
            exit;
        }

        $error   = null;
        $success = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre   = trim($_POST['nombre']           ?? '');
            $email    = trim($_POST['email']            ?? '');
            $password = trim($_POST['password']         ?? '');
            $confirm  = trim($_POST['password_confirm'] ?? '');

            if (empty($nombre) || empty($email) || empty($password) || empty($confirm)) {
                $error = "Completa todos los campos.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "El correo electrónico no es válido.";
            } elseif (strlen($password) < 6) {
                $error = "La contraseña debe tener al menos 6 caracteres.";
            } elseif ($password !== $confirm) {
                $error = "Las contraseñas no coinciden.";
            } else {
                $ok = (new Usuario())->guardarUsuario([
                    'nombre'   => $nombre,
                    'email'    => $email,
                    'password' => $password,
                ]);

                if ($ok) {
                    header('Location: ' . BASE_URL . '/login?registered=1');
                    exit;
                } else {
                    $error = "No se pudo crear la cuenta. El correo ya podría estar en uso.";
                }
            }
        }

        $this->view('auth/register', [
            'error'   => $error,
            'success' => $success,
        ]);
    }
}
