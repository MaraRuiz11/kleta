<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - KLETA</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/loginyregister.css">
</head>
<body>

<div class="register-wrapper">

    <div class="logo-section">
        <img src="<?php echo BASE_URL; ?>/public/img/sin-fondo.webp" alt="Restaurante Juguería Kleta">
    </div>

    <div class="form-section">

        <h2>Crear Cuenta</h2>

        <?php if (!empty($error)): ?>
            <div class="error-msg"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST" action="">

            <div class="input-group">
                <label>Name</label>
                <input type="text" name="nombre" placeholder="Tu nombre completo" required
                       value="<?php echo htmlspecialchars($_POST['nombre'] ?? ''); ?>">
            </div>

            <div class="input-group">
                <label>Email:</label>
                <input type="email" name="email" placeholder="correo@ejemplo.com" required
                       value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Mínimo 6 caracteres" required>
            </div>

            <div class="input-group">
                <label>Confirm Password</label>
                <input type="password" name="password_confirm" placeholder="Repite tu contraseña" required>
            </div>

            <button type="submit" class="btn-primary">REGISTRARSE</button>

        </form>

        <a href="<?php echo BASE_URL; ?>/" class="btn-cancel">CANCELAR</a>

        <div class="bottom-link">
            ¿Ya tienes cuenta? <a href="<?php echo BASE_URL; ?>/login">Inicia sesión</a>
        </div>

    </div>
</div>

</body>
</html>
