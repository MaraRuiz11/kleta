<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Pago.php';
require_once __DIR__ . '/../models/Cliente.php';

class PagosController extends Controller {

    public function index(): void {
        $this->requiereLogin();
        $pagos = (new Pago())->obtenerTodos();
        $this->view('pagos/index', [
            'usuario' => $_SESSION['usuario'],
            'pagos'   => $pagos,
        ]);
    }

    public function registrar(): void {
        $this->requiereLogin();
        $error    = null;
        $clientes = (new Cliente())->obtenerTodos();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = [
                'cliente_id'       => (int)($_POST['cliente_id']       ?? 0),
                'monto'            => (float)($_POST['monto']           ?? 0),
                'tipo_comprobante' => $_POST['tipo_comprobante'] ?? 'ninguno',
                'fecha_pago'       => $_POST['fecha_pago']       ?? date('Y-m-d'),
                'observacion'      => trim($_POST['observacion'] ?? ''),
            ];

            if (!$datos['cliente_id'] || $datos['monto'] <= 0) {
                $error = "Selecciona un cliente y un monto válido.";
            } else {
                (new Pago())->crear($datos);
                header('Location: ' . BASE_URL . '/pagos');
                exit;
            }
        }

        $this->view('pagos/registrar', [
            'usuario'  => $_SESSION['usuario'],
            'clientes' => $clientes,
            'error'    => $error,
        ]);
    }

    public function eliminar(string $id = ''): void {
        $this->requiereLogin();
        (new Pago())->eliminar((int)$id);
        header('Location: ' . BASE_URL . '/pagos');
        exit;
    }
}
