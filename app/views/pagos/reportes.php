<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Pagos</title>
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
        <span id="breadcrumb-page">Pagos</span>
    </nav>
    <div class="main-content">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px">
            <p style="margin:0">Registro de Pagos</p>
            <a href="<?php echo BASE_URL; ?>/pagos/registro" class="btn-guardar">
                <i class="fa-solid fa-plus"></i> Nuevo pago
            </a>
        </div>
        <div class="table-responsive">
            <?php if (empty($pagos)): ?>
                <p>No hay pagos registrados.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr><th>ID</th><th>Cliente</th><th>Monto</th><th>Comprobante</th><th>Fecha Pago</th><th>Observación</th><th>Acciones</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pagos as $p): ?>
                        <tr>
                            <td><?php echo $p['id']; ?></td>
                            <td><?php echo htmlspecialchars($p['nombre_cliente']); ?></td>
                            <td>S/ <?php echo number_format($p['monto'], 2); ?></td>
                            <td><span class="badge badge-<?php echo $p['tipo_comprobante']; ?>"><?php echo ucfirst($p['tipo_comprobante']); ?></span></td>
                            <td><?php echo $p['fecha_pago']; ?></td>
                            <td><?php echo htmlspecialchars($p['observacion'] ?? ''); ?></td>
                            <td class="acciones">
                                <a href="<?php echo BASE_URL; ?>/pagos/eliminar/<?php echo $p['id']; ?>" class="btn-eliminar"
                                   onclick="return confirm('¿Eliminar pago?')"><i class="fa-solid fa-trash"></i></a>
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
