<?php
// Archivo index.php

// Incluir la librería PHPExcel
require_once 'PhpSpreadsheet/vendor/autoload.php';


// Ruta de la carpeta de subidas
$subidasDir = 'subidas/';

// Mensajes de respuesta
$response = array('status' => '', 'message' => '');

if (isset($_POST['submit'])) {
    // Obtener el archivo subido
    $archivo = $_FILES['file']['tmp_name'];
    
    // Generar un nombre único para el archivo
    $nombreArchivo = uniqid() . '.xlsx';
    
    // Mover el archivo a la carpeta de subidas
    move_uploaded_file($archivo, $subidasDir . $nombreArchivo);
    
    // Ruta completa del archivo
    $rutaArchivo = $subidasDir . $nombreArchivo;
    
    // Cargar el archivo Excel
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $objPHPExcel = $reader->load($rutaArchivo);
    
    
    // Obtener la hoja activa
    $hoja = $objPHPExcel->getActiveSheet();
    
    // Obtener las filas de datos
    $filas = $hoja->toArray();
    
    // Conexión a la base de datos


    include('db_config.php');
        

    // Preparar la consulta de inserción
    $query = "INSERT INTO tbl_productos (FECHADELREPORTE, APELLIDOPATERNO, APELLIDOMATERNO, APELLIDOADICIONAL, PRIMERNOMBRE, SEGUNDONOMBRE, FECHADENACIMIENTO, RFC, SEXO, DIRECCIONCALLENUMERO, DIRECCIONCOMPLETA, COLONIAOPOBLACION, DELEGACIONOMUNICIPIO, CIUDAD, ESTADO, CP, TELEFONO, NUMEROCUENTA, fecha_registro) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
    // Preparar la declaración
    $stmt = mysqli_prepare($conexion, $query);
    
    // Recorrer las filas y guardar los datos en la base de datos
    foreach ($filas as $fila) {
        // Asignar los valores de la fila a variables
        $ID = $fila[0];
        $FECHADELREPORTE = $fila[1];
        $APELLIDOPATERNO = $fila[2];
        $APELLIDOMATERNO = $fila[3];
        $APELLIDOADICIONAL = $fila[4];
        $PRIMERNOMBRE = $fila[5];
        $SEGUNDONOMBRE = $fila[6];
        $FECHADENACIMENTO = $fila[7];
        $RFC = $fila[8];
        $SEXO = $fila[9];
        $DIRECCIONCALLENUMERO = $fila[10];
        $DIRECCIONCOMPLETA = $fila[11];
        $COLONIAOPOBLACION = $fila[12];
        $DELEGACIONOMUNICIPIO = $fila[13];
        $CIUDAD = $fila[14];
        $ESTADO = $fila[15];
        $CP = $fila[16];
        $TELEFONO = $fila[17];
        $NUMEROCUENTA = $fila[18];
        
        // Vincular los parámetros de la declaración
        mysqli_stmt_bind_param($stmt, "ssssssssssssssssss", $FECHADELREPORTE, $APELLIDOPATERNO, $APELLIDOMATERNO, $APELLIDOADICIONAL, $PRIMERNOMBRE, $SEGUNDONOMBRE, $FECHADENACIMENTO, $RFC, $SEXO, $DIRECCIONCALLENUMERO, $DIRECCIONCOMPLETA, $COLONIAOPOBLACION, $DELEGACIONOMUNICIPIO, $CIUDAD, $ESTADO, $CP, $TELEFONO, $NUMEROCUENTA);
        
        // Ejecutar la declaración
        mysqli_stmt_execute($stmt);
    }
    
    // Cerrar la declaración y la conexión
    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
    
    // Mensaje de éxito
    $response['status'] = 'success';
    $response['message'] = 'Carga exitosa.';
    
    // Eliminar el archivo subido
    unlink($rutaArchivo);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Cargar Archivo Excel</title>
</head>
<body>
    <?php if ($response['status'] === 'success'): ?>
        <p><?php echo $response['message']; ?></p>
    <?php endif; ?>
    
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file" accept=".xlsx">
        <button type="submit" name="submit">Cargar</button>
    </form>
    
    <h2>Contenido del archivo</h2>
<table>
    <thead>
        <tr>
            <th>FECHADELREPORTE</th>
            <th>APELLIDOPATERNO</th>
            <th>APELLIDOMATERNO</th>
            <th>APELLIDOADICIONAL</th>
            <th>PRIMERNOMBRE</th>
            <th>SEGUNDONOMBRE</th>
            <th>FECHADENACIMENTO</th>
            <th>RFC</th>
            <th>SEXO</th>
            <th>DIRECCIONCALLENUMERO</th>
            <th>DIRECCIONCOMPLETA</th>
            <th>COLONIAOPOBLACION</th>
            <th>DELEGACIONOMUNICIPIO</th>
            <th>CIUDAD</th>
            <th>ESTADO</th>
            <th>CP</th>
            <th>TELEFONO</th>
            <th>NUMEROCUENTA</th>
        </tr>
    </thead>
    <tbody>
            <tr>
            <?php
if (!empty($filas)) {
    foreach ($filas as $fila) {
        // Resto del código dentro del bucle foreach
    }
} else {
    // Manejar el caso en el que no hay filas de datos
    echo "No se encontraron filas de datos en el archivo.";
} ?>
            </tr>
    </tbody>
</table>

