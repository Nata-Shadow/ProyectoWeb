<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login CubanWood</title>
    <link rel="stylesheet" href="css/login-styles.css">
</head>
<body>

<div class="capa"></div>
<!--	--------------->
<form method="post" action="php/login_connect.php">
    <div class="form">
        <h1>CubanWood</h1>
        <div class="grupo">
            <input type="text" name="usuario" id="usuario" required><span class="barra"></span>
            <label for="usuario">Usuario</label>
        </div>
        <div class="grupo">
            <input type="password" name="password" id="password" required><span class="barra"></span>
            <label for="password">Password</label>
        </div>
        <button type="submit" id="login-button" name="login-button">Entrar</button>
    </div>
</form>
</body>
</html>