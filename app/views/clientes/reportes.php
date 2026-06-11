<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Clientes</title>
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
        <span id="breadcrumb-page">Clientes</span>
    </nav>
    <div class="main-content">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px">
            <p style="margin:0">Listado de Clientes</p>
            <a href="<?php echo BASE_URL; ?>/clientes/registro" class="btn-guardar">
                <i class="fa-solid fa-user-plus"></i> Nuevo cliente
            </a>
        </div>
        <div class="table-responsive">
            <?php if (empty($clientes)): ?>
                <p>No hay clientes registrados.</p>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th><th>Nombre</th><th>Teléfono</th><th>Dirección</th>
                            <th>Tipo de Pago</th><th>Fecha Registro</th><th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clientes as $c): ?>
                        <tr>
                            <td><?php echo $c['id']; ?></td>
                            <td><?php echo htmlspecialchars($c['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($c['telefono']); ?></td>
                            <td><?php echo htmlspecialchars($c['direccion']); ?></td>
                            <td><span class="badge badge-<?php echo $c['tipo_pago']; ?>"><?php echo ucfirst($c['tipo_pago']); ?></span></td>
                            <td><?php echo $c['creado_en']; ?></td>
                            <td class="acciones">
                                <a href="<?php echo BASE_URL; ?>/clientes/editar/<?php echo $c['id']; ?>" class="btn-editar"><i class="fa-solid fa-pen"></i></a>
                                <a href="<?php echo BASE_URL; ?>/clientes/eliminar/<?php echo $c['id']; ?>" class="btn-eliminar"
                                   onclick="return confirm('¿Eliminar cliente?')"><i class="fa-solid fa-trash"></i></a>
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
