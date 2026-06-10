<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE_BUSINESS; ?> - Registrar Consumo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/dashboard.css">
</head>
<body>

<?php include __DIR__ . '/../layouts/sidebar.php'; ?>

<main>
    <nav class="breadcrumb">
        <span>Consumos</span>
        <i class="fa-solid fa-chevron-right"></i>
        <span id="breadcrumb-page">Registrar</span>
    </nav>

    <div class="main-content" style="max-width:540px">
        <p>Registrar nuevo consumo</p>

        <?php if (isset($error) && $error): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <!-- Precios de los platos para JS -->
        <script>
            const preciosPlatos = {
                <?php foreach ($platos as $p): ?>
                "<?php echo $p['id']; ?>": <?php echo $p['precio']; ?>,
                <?php endforeach; ?>
            };
        </script>

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
                <label class="form-label">Plato *</label>
                <select name="plato_id" class="form-select" id="platoSelect" required>
                    <option value="">-- Seleccionar --</option>
                    <?php foreach ($platos as $p): ?>
                        <option value="<?php echo $p['id']; ?>">
                            <?php echo htmlspecialchars($p['nombre']); ?> — S/ <?php echo number_format($p['precio'], 2); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Cantidad *</label>
                <input type="number" name="cantidad" id="cantidad" min="1" value="1" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Subtotal estimado</label>
                <input type="text" id="subtotal" class="form-control" readonly value="S/ 0.00">
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha</label>
                <input type="date" name="fecha" class="form-control" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Notas</label>
                <input type="text" name="notas" class="form-control" placeholder="Opcional">
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="<?php echo BASE_URL; ?>/consumos" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</main>

<script>
    function actualizarSubtotal() {
        const platoId  = document.getElementById('platoSelect').value;
        const cantidad = parseInt(document.getElementById('cantidad').value) || 0;
        const precio   = preciosPlatos[platoId] || 0;
        document.getElementById('subtotal').value = 'S/ ' + (precio * cantidad).toFixed(2);
    }
    document.getElementById('platoSelect').addEventListener('change', actualizarSubtotal);
    document.getElementById('cantidad').addEventListener('input', actualizarSubtotal);
</script>
<script src="<?php echo BASE_URL; ?>/public/js/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
