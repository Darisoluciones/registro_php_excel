<?php
include('db.config.php');
$usuario = $_POST['usuario'];
$password = $_POST['password'];

$consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$password'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);

if ($filas) {
    // Autenticación exitosa
    // Guardar fecha de inicio y dirección IP de sesión
    $fechaInicio = date('Y-m-d H:i:s');
    $ipSesion = $_SERVER['REMOTE_ADDR'];

    // Nombre de la tabla para almacenar los registros de sesión
    $tablaSesion = "registros_sesion"; // Puedes elegir cualquier nombre que desees

    // Insertar los datos de sesión en la tabla
    $insertarSesion = "INSERT INTO $tablaSesion (usuario, fecha_inicio, ip_sesion) VALUES ('$usuario', '$fechaInicio', '$ipSesion')";
    if (mysqli_query($conexion, $insertarSesion)) {
        header("location: home.php");
    } else {
        echo "Error al guardar el registro de sesión: " . mysqli_error($conexion);
    }
} else {
    include("index.html");
    ?>
    <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
    <?php
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>

