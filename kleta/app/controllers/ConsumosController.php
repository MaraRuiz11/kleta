<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Consumo.php';
require_once __DIR__ . '/../models/Cliente.php';
require_once __DIR__ . '/../models/Plato.php';

class ConsumosController extends Controller {

    public function index(): void {
        $this->requiereLogin();
        $consumos = (new Consumo())->obtenerTodos();
        $this->view('consumos/index', [
            'usuario'  => $_SESSION['usuario'],
            'consumos' => $consumos,
        ]);
    }

    public function registrar(): void {
        $this->requiereLogin();
        $error    = null;
        $clientes = (new Cliente())->obtenerTodos();
        $platos   = (new Plato())->obtenerDisponibles();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $clienteId  = (int)($_POST['cliente_id'] ?? 0);
            $platoId    = (int)($_POST['plato_id']   ?? 0);
            $cantidad   = (int)($_POST['cantidad']   ?? 1);
            $fecha      = $_POST['fecha']   ?? date('Y-m-d');
            $notas      = trim($_POST['notas'] ?? '');

            // Obtenemos precio del plato al momento del consumo
            $plato = (new Plato())->obtenerPorId($platoId);

            if (!$clienteId || !$platoId || !$plato) {
                $error = "Selecciona un cliente y un plato válidos.";
            } else {
                (new Consumo())->crear([
                    'cliente_id'  => $clienteId,
                    'plato_id'    => $platoId,
                    'cantidad'    => $cantidad,
                    'precio_unit' => $plato['precio'],
                    'fecha'       => $fecha,
                    'notas'       => $notas,
                ]);
                header('Location: ' . BASE_URL . '/consumos');
                exit;
            }
        }

        $this->view('consumos/registrar', [
            'usuario'  => $_SESSION['usuario'],
            'clientes' => $clientes,
            'platos'   => $platos,
            'error'    => $error,
        ]);
    }

    public function eliminar(string $id = ''): void {
        $this->requiereLogin();
        (new Consumo())->eliminar((int)$id);
        header('Location: ' . BASE_URL . '/consumos');
        exit;
    }
}
