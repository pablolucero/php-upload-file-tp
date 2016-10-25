<html>
<head>
    <title>Lista de archivos</title>
</head>
<body>
<?php
error_reporting(E_ALL & ~(E_NOTICE | E_WARNING));
$carpeta_upload = './archivos'; //Asignamos la carpeta de carga de archivos a un variable

copy($_FILES['nombrearchivo']['tmp_name'], $_FILES['nombrearchivo']['name']); //Indicamos la copia del archivo
$nom = $_FILES['nombrearchivo']['name'];
move_uploaded_file($_FILES["nombrearchivo"]["tmp_name"], $carpeta_upload . '/' . $_FILES["nombrearchivo"]["name"]); //Indicamos a que directorio moverlo

$conexion = mysqli_connect("localhost", "root", "", "usuarios") //Conexion a la BD
or die("Problemas en la conexion");

echo "==============>";
var_dump($_REQUEST[codigoarchivo]);
echo "==============>";
var_dump($_REQUEST[nombrearchivo]);
echo "==============>";

mysqli_query($conexion, "insert into files(codigoarchivo, nombrearchivo) values 
   ('$_REQUEST[codigoarchivo]','$_REQUEST[nombrearchivo]')",
    $conexion) or die("Problemas en el select" . mysqli_error($conexion));
mysqli_close($conexion);
mysqli_close($conexion);
echo "El archivo fue cargado con exito."; //Indicamos si la carga fue exitosa
echo "<br>";
echo "Haga click sobre un archivo para descargarlo.";
echo "<br>";
echo "<br>";


$conexion = mysqli_connect("localhost", "root", "", "usuarios")
or die("Problemas en la conexion");

$registros = mysqli_query($conexion, "SELECT codigoarchivo,nombrearchivo
                       FROM files", $conexion) or
die("Problemas en el select:" . mysqli_error($conexion));


$dir = "/xampp/htdocs/tp/archivos/";  //Indicamos el directorio donde estamos subiendo los archivos
clearstatcache();  //Limpia la caché de estado de un archivo


$archivos = scandir($carpeta_upload);
foreach ($archivos as $nombre) {
    if ($nombre == '.' || $nombre == '..') {
        continue;
    } else {
        echo "<li><a href=\"$carpeta_upload/$nombre\">$nombre</a></li>"; //Hacemos el link para la descarga
    }
}


mysqli_close($conexion);


?>
<br>
<button onclick="history.back()"> Volver</button>
</body>
</html>