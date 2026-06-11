<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KLETA</title>

    <!-- ICONOS -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body{
            background:#ececec;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .login-container{
            width:350px;
            text-align:center;
        }

        /* LOGO */
        .logo img{
            width:100%;
            margin-bottom:20px;
        }

        /* FORMULARIO */
        form{
            margin-top:10px;
        }

        .input-group{
            margin-bottom:15px;
            text-align:left;
        }

        .input-group label{
            font-size:14px;
            font-weight:bold;
            color:#222;
            display:block;
            margin-bottom:6px;
            text-transform:uppercase;
        }

        .input-group input{
            width:100%;
            padding:12px 18px;
            border:none;
            border-radius:20px;
            background:#d9d9d9;
            outline:none;
            font-size:15px;
        }

        .forgot{
            text-align:right;
            margin-bottom:20px;
        }

        .forgot a{
            font-size:12px;
            color:#444;
            text-decoration:none;
        }

        .forgot a:hover{
            text-decoration:underline;
        }

        /* BOTÓN */
        .btn{
            width:60%;
            padding:12px;
            border:none;
            border-radius:25px;
            background:#2d00ff;
            color:white;
            font-size:16px;
            font-weight:bold;
            cursor:pointer;
            transition:0.3s;
        }

        .btn:hover{
            background:#1f00b8;
            transform:scale(1.05);
        }

        /* REGISTER */
        .register{
            margin-top:20px;
            position:relative;
        }

        .register::before{
            content:"";
            width:120px;
            height:1px;
            background:#555;
            position:absolute;
            top:-10px;
            left:50%;
            transform:translateX(-50%);
        }

        .register p{
            font-size:13px;
            margin-bottom:15px;
            color:#333;
        }

        /* ICONOS */
        .social-icons{
            display:flex;
            justify-content:center;
            gap:18px;
        }

        .social-icons a{
            color:#ff3b30;
            font-size:22px;
            transition:0.3s;
        }

        .social-icons a:hover{
            transform:scale(1.2);
        }

    </style>
</head>
<body>

    <div class="login-container">

        <!-- LOGO -->
        <div class="logo">
            <img src="<?php echo BASE_URL; ?>/public/img/sin-fondo.webp" alt="KLETA">
        </div>

        <!-- FORM -->
        <form method="POST" action="">

            <div class="input-group">
                <label>USER:</label>
                <input type="text" name="user" required>
            </div>

            <div class="input-group">
                <label>PASSWORD:</label>
                <input type="password" name="pass" required>
            </div>

            <div class="forgot">
                <a href="#">¿OLVIDASTE LA CONTRASEÑA?</a>
            </div>

            <button type="submit" class="btn">
                INGRESAR
            </button>

        </form>

        <!-- REGISTER -->
        <div class="register">

            <p>REGÍSTRATE</p>

            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-google"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>

        </div>

    </div>

</body>
</html>