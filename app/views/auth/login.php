<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KLETA</title>
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

        .login-wrapper {
            width: 360px;
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
            padding: 30px 30px 10px;
            text-align: center;
            border-bottom: 2px solid #4361ee;
        }

        .logo-section img {
            width: 220px;
        }

        .form-section {
            padding: 24px 32px 28px;
        }

        .error-msg {
            background: #ffe5e5;
            color: #d00;
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 16px;
        }

        .input-group {
            margin-bottom: 16px;
            text-align: left;
        }

        .input-group label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            color: #333;
            margin-bottom: 6px;
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

        .forgot {
            text-align: right;
            margin-bottom: 20px;
        }

        .forgot a {
            font-size: 11px;
            color: #555;
            text-decoration: none;
        }

        .forgot a:hover { text-decoration: underline; }

        .btn-login {
            display: block;
            width: 60%;
            margin: 0 auto;
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

        .btn-login:hover {
            background: #1f00b8;
            transform: scale(1.04);
        }

        .divider {
            border: none;
            border-top: 1px solid #aaa;
            margin: 22px auto 14px;
            width: 120px;
        }

        .register-section {
            text-align: center;
            padding-bottom: 4px;
        }

        .register-section p {
            font-size: 12px;
            color: #444;
            margin-bottom: 12px;
            letter-spacing: 0.5px;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 18px;
        }

        .social-icons a {
            font-size: 22px;
            transition: transform 0.2s;
        }

        .social-icons a.fb  { color: #1877f2; }
        .social-icons a.gg  { color: #ea4335; }
        .social-icons a.tw  { color: #1da1f2; }

        .social-icons a:hover { transform: scale(1.2); }
    </style>
</head>
<body>

<div class="login-wrapper">

    <!-- LOGO -->
    <div class="logo-section">
        <img src="<?php echo BASE_URL; ?>/public/img/logo-kleta.png" alt="Restaurante Juguería Kleta">
    </div>

    <!-- FORM -->
    <div class="form-section">

        <?php if (!empty($error)): ?>
            <div class="error-msg"><i class="fas fa-exclamation-circle"></i> <?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST" action="">

            <div class="input-group">
                <label>User:</label>
                <input type="text" name="user" placeholder="Correo electrónico" required>
            </div>

            <div class="input-group">
                <label>Password:</label>
                <input type="password" name="pass" placeholder="Contraseña" required>
            </div>

            <div class="forgot">
                <a href="#">¿Olvidaste la contraseña?</a>
            </div>

            <button type="submit" class="btn-login">INGRESAR</button>

        </form>

        <hr class="divider">

        <div class="register-section">
            <p>REGÍSTRATE</p>
            <div class="social-icons">
                <a href="#" class="fb"><i class="fab fa-facebook"></i></a>
                <a href="#" class="gg"><i class="fab fa-google"></i></a>
                <a href="#" class="tw"><i class="fab fa-twitter"></i></a>
            </div>
        </div>

    </div>
</div>

</body>
</html>
