<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Registrar Pago</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/dashboard.css">
</head>
<body>

<?php include __DIR__ . '/../layouts/sidebar.php'; ?>

<main>
    <nav class="breadcrumb">
        <span>Pagos</span>
        <i class="fa-solid fa-chevron-right"></i>
        <span id="breadcrumb-page">Registrar</span>
    </nav>

    <div class="main-content" style="max-width:520px">
        <p>Registrar pago de cliente</p>

        <?php if (isset($error) && $error): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="mb-3">
                <label class="form-label">Cliente *</label>
                <select name="cliente_id" class="form-select" required>
                    <option value="">-- Seleccionar --</option>
                    <?php foreach ($clientes as $c): ?>
                        <option value="<?php echo $c['id']; ?>"><?php echo htmlspecialchars($c['nombre']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Monto (S/) *</label>
                <input type="number" name="monto" step="0.01" min="0.01" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tipo de Comprobante</label>
                <select name="tipo_comprobante" class="form-select">
                    <option value="ninguno">Ninguno</option>
                    <option value="boleta">Boleta</option>
                    <option value="factura">Factura</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha de Pago</label>
                <input type="date" name="fecha_pago" class="form-control" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Observación</label>
                <input type="text" name="observacion" class="form-control" placeholder="Opcional">
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Registrar Pago</button>
                <a href="<?php echo BASE_URL; ?>/pagos" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</main>

<script src="<?php echo BASE_URL; ?>/public/js/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
