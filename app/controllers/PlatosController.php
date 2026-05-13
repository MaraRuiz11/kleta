<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Plato.php';

class PlatosController extends Controller {

    public function index(): void {
        $this->requiereLogin();
        $platos = (new Plato())->obtenerTodos();
        $this->view('platos/index', [
            'usuario' => $_SESSION['usuario'],
            'platos'  => $platos,
        ]);
    }

    public function crear(): void {
        $this->requiereLogin();
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = [
                'nombre'      => trim($_POST['nombre']      ?? ''),
                'descripcion' => trim($_POST['descripcion'] ?? ''),
                'precio'      => $_POST['precio']    ?? 0,
                'disponible'  => $_POST['disponible'] ?? 1,
            ];

            if (empty($datos['nombre']) || $datos['precio'] <= 0) {
                $error = "Nombre y precio son obligatorios.";
            } else {
                (new Plato())->crear($datos);
                header('Location: ' . BASE_URL . '/platos');
                exit;
            }
        }

        $this->view('platos/crear', [
            'usuario' => $_SESSION['usuario'],
            'error'   => $error,
        ]);
    }

    public function editar(string $id = ''): void {
        $this->requiereLogin();
        $error  = null;
        $modelo = new Plato();
        $plato  = $modelo->obtenerPorId((int)$id);

        if (!$plato) {
            header('Location: ' . BASE_URL . '/platos');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = [
                'nombre'      => trim($_POST['nombre']      ?? ''),
                'descripcion' => trim($_POST['descripcion'] ?? ''),
                'precio'      => $_POST['precio']    ?? 0,
                'disponible'  => $_POST['disponible'] ?? 0,
            ];

            if (empty($datos['nombre']) || $datos['precio'] <= 0) {
                $error = "Nombre y precio son obligatorios.";
            } else {
                $modelo->actualizar((int)$id, $datos);
                header('Location: ' . BASE_URL . '/platos');
                exit;
            }
        }

        $this->view('platos/editar', [
            'usuario' => $_SESSION['usuario'],
            'plato'   => $plato,
            'error'   => $error,
        ]);
    }

    public function eliminar(string $id = ''): void {
        $this->requiereLogin();
        (new Plato())->eliminar((int)$id);
        header('Location: ' . BASE_URL . '/platos');
        exit;
    }
}
