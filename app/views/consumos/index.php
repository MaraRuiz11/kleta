<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Consumos</title>
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
        <span id="breadcrumb-page">Consumos</span>
    </nav>

    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <p class="mb-0">Registro de Consumos</p>
            <a href="<?php echo BASE_URL; ?>/consumos/registrar" class="btn btn-sm btn-primary">
                <i class="fa-solid fa-plus me-1"></i> Registrar Consumo
            </a>
        </div>
        <div class="table-responsive">
            <?php if (empty($consumos)): ?>
                <p class="text-muted">No hay consumos registrados.</p>
            <?php else: ?>
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Cliente</th>
                            <th>Plato</th>
                            <th>Cantidad</th>
                            <th>Precio Unit.</th>
                            <th>Subtotal</th>
                            <th>Notas</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($consumos as $c): ?>
                            <tr>
                                <td><?php echo $c['id']; ?></td>
                                <td><?php echo $c['fecha']; ?></td>
                                <td><?php echo htmlspecialchars($c['cliente']); ?></td>
                                <td><?php echo htmlspecialchars($c['plato']); ?></td>
                                <td><?php echo $c['cantidad']; ?></td>
                                <td>S/ <?php echo number_format($c['precio_unit'], 2); ?></td>
                                <td>S/ <?php echo number_format($c['subtotal'], 2); ?></td>
                                <td><?php echo htmlspecialchars($c['notas'] ?? '—'); ?></td>
                                <td>
                                    <a href="<?php echo BASE_URL; ?>/consumos/eliminar/<?php echo $c['id']; ?>"
                                       class="btn btn-sm btn-outline-danger"
                                       onclick="return confirm('¿Eliminar este consumo?')">
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
