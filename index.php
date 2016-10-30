<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>

    <title>Login</title>
</head>
<body>
<div class="container">
    <h1>Login</h1>
    <form method="post" action="pagina_ingreso.php" class="login">
        <div class="form-group">
            <label for="username">Usuario:</label>
            <input type="text" name="username" id="username" class="form-control">
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <input type="submit" value="Ingresar" name="login" class="btn btn-primary">
        <a class="btn btn-default pull-right" href="alta_usuario.php">Alta usuario</a>
    </form>
</div>
</body>
</html>