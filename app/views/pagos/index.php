<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Pagos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    
</head>
<body>

<?php include __DIR__ . '/../layouts/sidebar.php'; ?>

<main>
    <nav class="breadcrumb">
        <span>Inicio</span>
        <i class="fa-solid fa-chevron-right"></i>
        <span id="breadcrumb-page">Pagos</span>
    </nav>

    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <p class="mb-0">Registro de Pagos</p>
            <a href="<?php echo BASE_URL; ?>/pagos/registrar" class="btn btn-sm btn-success">
                <i class="fa-solid fa-plus me-1"></i> Registrar Pago
            </a>
        </div>
        <div class="table-responsive">
            <?php if (empty($pagos)): ?>
                <p class="text-muted">No hay pagos registrados.</p>
            <?php else: ?>
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Cliente</th>
                            <th>Monto</th>
                            <th>Comprobante</th>
                            <th>Observación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pagos as $p): ?>
                            <tr>
                                <td><?php echo $p['id']; ?></td>
                                <td><?php echo $p['fecha_pago']; ?></td>
                                <td><?php echo htmlspecialchars($p['cliente']); ?></td>
                                <td class="fw-bold text-success">S/ <?php echo number_format($p['monto'], 2); ?></td>
                                <td><span class="badge bg-secondary"><?php echo ucfirst($p['tipo_comprobante']); ?></span></td>
                                <td><?php echo htmlspecialchars($p['observacion'] ?? '—'); ?></td>
                                <td>
                                    <a href="<?php echo BASE_URL; ?>/pagos/eliminar/<?php echo $p['id']; ?>"
                                       class="btn btn-sm btn-outline-danger"
                                       onclick="return confirm('¿Eliminar este pago?')">
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
