<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - KLETA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; font-family: Arial, Helvetica, sans-serif; }

        body {
            background: #f5f0f0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-wrapper {
            width: 380px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.12);
            overflow: hidden;
            animation: fadeUp 0.5s ease;
        }

        @keyframes fadeUp {
            from { opacity:0; transform:translateY(20px); }
            to   { opacity:1; transform:translateY(0); }
        }

        .logo-section {
            background: #fff;
            padding: 26px 30px 10px;
            text-align: center;
        }

        .logo-section img {
            width: 200px;
        }

        .form-section {
            padding: 20px 32px 32px;
        }

        .form-section h2 {
            font-size: 14px;
            font-weight: 700;
            color: #444;
            text-align: center;
            letter-spacing: 1px;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .error-msg {
            background: #ffe5e5;
            color: #d00;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 16px;
        }

        .success-msg {
            background: #e5ffe8;
            color: #007a1f;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 16px;
        }

        .input-group {
            margin-bottom: 14px;
            text-align: left;
        }

        .input-group label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            color: #333;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-group input {
            width: 100%;
            padding: 11px 16px;
            border: none;
            border-radius: 20px;
            background: #d9d9d9;
            outline: none;
            font-size: 14px;
            transition: background 0.2s;
        }

        .input-group input:focus {
            background: #c8c8c8;
        }

        .btn-register {
            display: block;
            width: 65%;
            margin: 22px auto 0;
            padding: 12px;
            border: none;
            border-radius: 25px;
            background: #2d00ff;
            color: #fff;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            letter-spacing: 1px;
            transition: background 0.3s, transform 0.2s;
        }

        .btn-register:hover {
            background: #1f00b8;
            transform: scale(1.04);
        }

        .login-link {
            text-align: center;
            margin-top: 16px;
            font-size: 12px;
            color: #555;
        }

        .login-link a {
            color: #2d00ff;
            font-weight: 700;
            text-decoration: none;
        }

        .login-link a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="register-wrapper">

    <!-- LOGO -->
    <div class="logo-section">
        <img src="<?php echo BASE_URL; ?>/public/img/logo-kleta.png" alt="Restaurante Juguería Kleta">
    </div>

    <!-- FORM -->
    <div class="form-section">

        <h2>Crear Cuenta</h2>

        <?php if (!empty($error)): ?>
            <div class="error-msg"><i class="fas fa-exclamation-circle"></i> <?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <div class="success-msg"><i class="fas fa-check-circle"></i> <?php echo htmlspecialchars($success); ?></div>
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
                <input type="password" name="password" placeholder="Contraseña" required>
            </div>

            <div class="input-group">
                <label>Confirm Password</label>
                <input type="password" name="password_confirm" placeholder="Repite tu contraseña" required>
            </div>

            <button type="submit" class="btn-register">INGRESAR</button>

        </form>

        <div class="login-link">
            ¿Ya tienes cuenta? <a href="<?php echo BASE_URL; ?>/login">Inicia sesión</a>
        </div>

    </div>
</div>

</body>
</html>
