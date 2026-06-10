<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Cliente.php';

class ClientesController extends Controller {

    public function index(): void {
        $this->requiereLogin();
        $clientes = (new Cliente())->obtenerSaldos();
        $this->view('clientes/index', [
            'usuario'  => $_SESSION['usuario'],
            'clientes' => $clientes,
        ]);
    }

    public function crear(): void {
        $this->requiereLogin();
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = [
                'nombre'    => trim($_POST['nombre']    ?? ''),
                'telefono'  => trim($_POST['telefono']  ?? ''),
                'direccion' => trim($_POST['direccion'] ?? ''),
                'tipo_pago' => $_POST['tipo_pago'] ?? 'diario',
            ];

            if (empty($datos['nombre'])) {
                $error = "El nombre es obligatorio.";
            } else {
                (new Cliente())->crear($datos);
                header('Location: ' . BASE_URL . '/clientes');
                exit;
            }
        }

        $this->view('clientes/crear', [
            'usuario' => $_SESSION['usuario'],
            'error'   => $error,
        ]);
    }

    public function editar(string $id = ''): void {
        $this->requiereLogin();
        $error    = null;
        $modelo   = new Cliente();
        $cliente  = $modelo->obtenerPorId((int)$id);

        if (!$cliente) {
            header('Location: ' . BASE_URL . '/clientes');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = [
                'nombre'    => trim($_POST['nombre']    ?? ''),
                'telefono'  => trim($_POST['telefono']  ?? ''),
                'direccion' => trim($_POST['direccion'] ?? ''),
                'tipo_pago' => $_POST['tipo_pago'] ?? 'diario',
            ];

            if (empty($datos['nombre'])) {
                $error = "El nombre es obligatorio.";
            } else {
                $modelo->actualizar((int)$id, $datos);
                header('Location: ' . BASE_URL . '/clientes');
                exit;
            }
        }

        $this->view('clientes/editar', [
            'usuario' => $_SESSION['usuario'],
            'cliente' => $cliente,
            'error'   => $error,
        ]);
    }

    public function eliminar(string $id = ''): void {
        $this->requiereLogin();
        (new Cliente())->eliminar((int)$id);
        header('Location: ' . BASE_URL . '/clientes');
        exit;
    }
}
