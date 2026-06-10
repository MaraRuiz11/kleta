<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/stat-cards.css">
    
</head>
<body>

<?php include __DIR__ . '/../layouts/sidebar.php'; ?>

<main>
    <nav class="breadcrumb">
        <span>Inicio</span>
        <i class="fa-solid fa-chevron-right"></i>
        <span id="breadcrumb-page">Dashboard</span>
    </nav>

    <div class="stat-cards">
        <div class="stat-card">
            <div class="icon text-accent"><i class="fa-solid fa-users"></i></div>
            <div class="label">Total Clientes</div>
            <div class="value"><?php echo $totalClientes; ?></div>
        </div>
        <div class="stat-card">
            <div class="icon text-accent"><i class="fa-solid fa-utensils"></i></div>
            <div class="label">Platos en Menú</div>
            <div class="value"><?php echo $totalPlatos; ?></div>
        </div>
        <div class="stat-card">
            <div class="icon text-accent"><i class="fa-solid fa-clipboard-list"></i></div>
            <div class="label">Ventas Hoy</div>
            <div class="value">S/ <?php echo number_format($totalHoyVentas, 2); ?></div>
        </div>
        <div class="stat-card">
            <div class="icon text-success-custom"><i class="fa-solid fa-money-bill-wave"></i></div>
            <div class="label">Cobros Hoy</div>
            <div class="value">S/ <?php echo number_format($totalHoyPagos, 2); ?></div>
        </div>
    </div>

    <div class="main-content">
        <p>Consumos del día de hoy</p>
        <div class="table-responsive">
            <?php if (empty($consumosHoy)): ?>
                <p class="text-muted">No hay consumos registrados hoy.</p>
            <?php else: ?>
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Cliente</th>
                            <th>Plato</th>
                            <th>Cantidad</th>
                            <th>Precio Unit.</th>
                            <th>Subtotal</th>
                            <th>Notas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($consumosHoy as $c): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($c['cliente']); ?></td>
                                <td><?php echo htmlspecialchars($c['plato']); ?></td>
                                <td><?php echo $c['cantidad']; ?></td>
                                <td>S/ <?php echo number_format($c['precio_unit'], 2); ?></td>
                                <td>S/ <?php echo number_format($c['subtotal'], 2); ?></td>
                                <td><?php echo htmlspecialchars($c['notas'] ?? '—'); ?></td>
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
