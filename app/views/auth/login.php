<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KLETA</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/loginyregister.css">
</head>
<body>

<div class="login-wrapper">

    <div class="logo-section">
        <img src="<?php echo BASE_URL; ?>/public/img/logo-kleta.png" alt="Restaurante Juguería Kleta">
    </div>

    <div class="form-section">

        <?php if (!empty($error)): ?>
            <div class="error-msg"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <?php if (isset($_GET['registered'])): ?>
            <div class="success-msg">¡Cuenta creada! Ya puedes iniciar sesión.</div>
        <?php endif; ?>

        <form method="POST" action="">

            <div class="input-group">
                <label>User:</label>
                <input type="text" name="user" placeholder="Correo electrónico" required
                       value="<?php echo htmlspecialchars($_POST['user'] ?? ''); ?>">
            </div>

            <div class="input-group">
                <label>Password:</label>
                <input type="password" name="pass" placeholder="Contraseña" required>
            </div>

            <div class="forgot">
                <a href="#">¿Olvidaste la contraseña?</a>
            </div>

            <button type="submit" class="btn-primary">INGRESAR</button>

        </form>

        <a href="<?php echo BASE_URL; ?>/" class="btn-cancel">CANCELAR</a>

        <hr class="divider">

        <div class="bottom-link">
            ¿No tienes cuenta? <a href="<?php echo BASE_URL; ?>/register">Regístrate</a>
        </div>

    </div>
</div>

</body>
</html>
