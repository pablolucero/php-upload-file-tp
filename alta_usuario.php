<html>
<head>
    <title>Alta Usuario</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h1>Alta de usuario</h1>
    <form action="persist_usuario.php" method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" class="form-control" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-control" required>
            <br>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="form-control">
            <br>
            <label for="apellido">Apellido:</label>
            <input type="apellido" id="apellido" name="apellido" class="form-control">
            <br>
        </div>
        <input type="submit" value="Registrar" class="btn btn-primary">
    </form>
</div>
</body>
</html>