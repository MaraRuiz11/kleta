<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Registrar Pago</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/dashboard.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/form.css">
</head>
<body>
<?php include __DIR__ . '/../layouts/sidebar-dashboard.php'; ?>
<main>
    <nav class="breadcrumb">
        <span>Dashboard</span><i class="fa-solid fa-chevron-right"></i>
        <a href="<?php echo BASE_URL; ?>/pagos">Pagos</a><i class="fa-solid fa-chevron-right"></i>
        <span id="breadcrumb-page">Registrar</span>
    </nav>
    <div class="main-content">
        <section class="registro-form">
            <h1>Registrar Pago</h1>
            <form action="<?php echo BASE_URL; ?>/pagos/guardar" method="post">
                <div class="form-group">
                    <label for="cliente_id">Cliente</label>
                    <select id="cliente_id" name="cliente_id" required>
                        <option value="">-- Seleccionar cliente --</option>
                        <?php foreach ($clientes as $cl): ?>
                            <option value="<?php echo $cl['id']; ?>"><?php echo htmlspecialchars($cl['nombre']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="monto">Monto (S/)</label>
                    <input type="number" id="monto" name="monto" step="0.01" min="0" required>
                </div>
                <div class="form-group">
                    <label for="tipo_comprobante">Tipo de Comprobante</label>
                    <select id="tipo_comprobante" name="tipo_comprobante">
                        <option value="ninguno">Ninguno</option>
                        <option value="boleta">Boleta</option>
                        <option value="factura">Factura</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fecha_pago">Fecha de Pago</label>
                    <input type="date" id="fecha_pago" name="fecha_pago" value="<?php echo date('Y-m-d'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="observacion">Observación (opcional)</label>
                    <textarea id="observacion" name="observacion"></textarea>
                </div>
                <button type="submit" class="btn-guardar">
                    <i class="fa-solid fa-floppy-disk"></i> Guardar pago
                </button>
            </form>
        </section>
    </div>
</main>
<script src="<?php echo BASE_URL; ?>/public/js/dashboard.js"></script>
</body>
</html>
