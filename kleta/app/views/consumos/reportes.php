<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Consumos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/table-responsive.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/botones.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/form.css">
</head>
<body>
<?php include __DIR__ . '/../layouts/sidebar-dashboard.php'; ?>
<main>
    <nav class="breadcrumb">
        <span>Dashboard</span><i class="fa-solid fa-chevron-right"></i>
        <span id="breadcrumb-page">Consumos</span>
    </nav>
    <div class="main-content">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px">
            <p style="margin:0">Registro de Consumos</p>
            <a href="<?php echo BASE_URL; ?>/consumos/registro" class="btn-guardar">
                <i class="fa-solid fa-plus"></i> Nuevo consumo
            </a>
        </div>
        <div class="table-responsive">
            <?php if (empty($consumos)): ?>
                <p>No hay consumos registrados.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr><th>ID</th><th>Cliente</th><th>Plato</th><th>Cantidad</th><th>Precio Unit.</th><th>Total</th><th>Fecha</th><th>Notas</th><th>Acciones</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach ($consumos as $c): ?>
                        <tr>
                            <td><?php echo $c['id']; ?></td>
                            <td><?php echo htmlspecialchars($c['nombre_cliente']); ?></td>
                            <td><?php echo htmlspecialchars($c['nombre_plato']); ?></td>
                            <td><?php echo $c['cantidad']; ?></td>
                            <td>S/ <?php echo number_format($c['precio_unit'], 2); ?></td>
                            <td>S/ <?php echo number_format($c['cantidad'] * $c['precio_unit'], 2); ?></td>
                            <td><?php echo $c['fecha']; ?></td>
                            <td><?php echo htmlspecialchars($c['notas'] ?? ''); ?></td>
                            <td class="acciones">
                                <a href="<?php echo BASE_URL; ?>/consumos/eliminar/<?php echo $c['id']; ?>" class="btn-eliminar"
                                   onclick="return confirm('¿Eliminar consumo?')"><i class="fa-solid fa-trash"></i></a>
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
</body>
</html>
