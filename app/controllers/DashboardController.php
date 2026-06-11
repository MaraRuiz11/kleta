<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Consumo.php';
require_once __DIR__ . '/../models/Pago.php';
require_once __DIR__ . '/../models/Cliente.php';
require_once __DIR__ . '/../models/Plato.php';

class DashboardController extends Controller {
    public function index(): void {
        $this->requiereLogin();

        $consumoModel = new Consumo();
        $pagoModel    = new Pago();
        $clienteModel = new Cliente();
        $platoModel   = new Plato();

        $consumosHoy    = $consumoModel->obtenerHoy();
        $totalHoyVentas = $consumoModel->totalHoy();
        $totalHoyPagos  = $pagoModel->totalHoy();
        $totalClientes  = count($clienteModel->obtenerTodos());
        $totalPlatos    = count($platoModel->obtenerTodos());

        $this->view('dashboard/index', [
            'usuario'        => $_SESSION['usuario'],
            'consumosHoy'    => $consumosHoy,
            'totalHoyVentas' => $totalHoyVentas,
            'totalHoyPagos'  => $totalHoyPagos,
            'totalClientes'  => $totalClientes,
            'totalPlatos'    => $totalPlatos,
        ]);
    }
}
