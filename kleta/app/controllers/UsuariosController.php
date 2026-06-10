<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Usuario.php';

class UsuariosController extends Controller {
    private function verificarSesion(): void {
        if (!isset($_SESSION['usuario'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }
    }

    public function index(): void { $this->reporte(); }
    public function reportes(): void { $this->reporte(); }

    public function reporte(): void {
        $this->verificarSesion();
        $usuarios = (new Usuario())->obtenerUsuarios();
        $this->view('usuarios/reportes', [
            'usuario'   => $_SESSION['usuario'],
            'usuarios'  => $usuarios,
        ]);
    }

    public function registro(): void {
        $this->verificarSesion();
        $this->view('usuarios/registro', ['usuario' => $_SESSION['usuario']]);
    }

    public function guardar(): void {
        $this->verificarSesion();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = [
                'nombre'   => trim($_POST['nombre'] ?? ''),
                'email'    => trim($_POST['email'] ?? ''),
                'password' => trim($_POST['password'] ?? ''),
            ];
            (new Usuario())->guardarUsuario($datos);
        }
        header("Location: " . BASE_URL . "/usuarios");
        exit();
    }

    public function eliminar(int $id = 0): void {
        $this->verificarSesion();
        (new Usuario())->eliminarUsuario($id);
        header("Location: " . BASE_URL . "/usuarios");
        exit();
    }
}
