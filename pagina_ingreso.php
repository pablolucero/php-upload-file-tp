<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>

    <title>Bienvenido</title>
</head>
<body>
<div class="container">
    <?php
    session_start();
    error_reporting(E_ALL & ~(E_NOTICE | E_WARNING));
    $link = mysqli_connect("localhost", "root", "", "usuarios") or die("Problemas en la conexion");

    if (!$_POST['username']) {
        echo "no ingreso username";
        header("Location: ./usuario_invalido.php");
    }
    if (!$_POST['password']) {
        echo "no ingreso password";
        header("Location: ./usuario_invalido.php");
    }

    if ($_POST['username']) {
        //Comprobacion del envio del username de usuario y password
        $username = $_POST['username'];
        $password = $_POST['password'];


        if ($password == NULL) {
            // echo "La password no fue enviada";
        } else {
            $query = mysqli_query($link, "SELECT username, password FROM users WHERE username = '$username'") or die(mysqli_error($link));
            $data = mysqli_fetch_array($query);

            if ($data['username'] != $username) {
                header("Location: ./usuario_incorrecto.php");
            } else if ($data['password'] != $password) {
                header("Location: ./password_incorrecto.php");
            } else {
                $query = mysqli_query($link, "SELECT username, password FROM users WHERE username = '$username'") or die(mysqli_error($link));
                $row = mysqli_fetch_array($query);
                $_SESSION["s_username"] = $row['username'];
                echo "<h4>Has sido logueado correctamente " . $_SESSION['s_username'] . "</h4>";
            }
        }
    }

    ?>
    <form>
        <br>
        <a href="list_files.php" class="btn btn-default">Continuar</a>
    </form>
</div>
</body>
</html>