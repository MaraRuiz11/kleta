<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Clientes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/dashboard.css">
</head>
<body>

<?php include __DIR__ . '/../layouts/sidebar.php'; ?>

<main>
    <nav class="breadcrumb">
        <span>Inicio</span>
        <i class="fa-solid fa-chevron-right"></i>
        <span id="breadcrumb-page">Clientes</span>
    </nav>

    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <p class="mb-0">Lista de Clientes y Saldos</p>
            <a href="<?php echo BASE_URL; ?>/clientes/crear" class="btn btn-sm btn-primary">
                <i class="fa-solid fa-plus me-1"></i> Nuevo Cliente
            </a>
        </div>
        <div class="table-responsive">
            <?php if (empty($clientes)): ?>
                <p class="text-muted">No hay clientes registrados.</p>
            <?php else: ?>
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Tipo Pago</th>
                            <th>Consumido</th>
                            <th>Pagado</th>
                            <th>Saldo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clientes as $c): ?>
                            <tr>
                                <td><?php echo $c['id']; ?></td>
                                <td><?php echo htmlspecialchars($c['nombre']); ?></td>
                                <td><?php echo htmlspecialchars($c['telefono'] ?? '—'); ?></td>
                                <td><?php echo htmlspecialchars($c['direccion'] ?? '—'); ?></td>
                                <td><span class="badge bg-secondary"><?php echo ucfirst($c['tipo_pago']); ?></span></td>
                                <td>S/ <?php echo number_format($c['total_consumido'], 2); ?></td>
                                <td>S/ <?php echo number_format($c['total_pagado'], 2); ?></td>
                                <td>
                                    <?php $saldo = $c['saldo_pendiente']; ?>
                                    <span class="fw-bold <?php echo $saldo > 0 ? 'text-success' : 'text-danger'; ?>">
                                        S/ <?php echo number_format($saldo, 2); ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="<?php echo BASE_URL; ?>/clientes/editar/<?php echo $c['id']; ?>"
                                       class="btn btn-sm btn-outline-primary me-1">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <a href="<?php echo BASE_URL; ?>/clientes/eliminar/<?php echo $c['id']; ?>"
                                       class="btn btn-sm btn-outline-danger"
                                       onclick="return confirm('¿Eliminar este cliente?')">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</main>

<script src="<?php echo BASE_URL; ?>/public/js/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
