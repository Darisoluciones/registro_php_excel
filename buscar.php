<?php
$servername = "localhost";
$database = "bd";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Función para buscar un registro en la tabla
function buscarRegistro($columna) {
  // Verificar si se ha proporcionado una columna válida
  $columnasValidas = array('ID', 'FECHADELREPORTE', 'APELLIDOPATERNO', 'APELLIDOMATERNO', 'APELLIDOADICIONAL', 'PRIMERNOMBRE', 'SEGUNDONOMBRE', 'FECHANDEACIMIENTO', 'RFC', 'SEXO', 'DIRECCIONCALLENUMERO', 'DIRECCIONCOMPLETA', 'COLONIAOPOBLACION', 'DELEGACIONOMUNICIPIO', 'CIUDAD', 'ESTADO', 'CP', 'TELEFONO', 'NUMEROCUENTA', 'fecha_registro');

  if (!in_array($columna, $columnasValidas)) {
    echo "La columna proporcionada no es válida.";
    return;
  }

  // Obtener el valor a buscar
  $valorBusqueda = $_POST['valorBusqueda'];

  // Verificar la conexión a la base de datos
  if ($conn instanceof mysqli) {
    // Obtener los datos de la tabla
    $sql = "SELECT * FROM tbl_productos WHERE $columna LIKE '%$valorBusqueda%'";
    $result = $conn->query($sql);

    if ($result !== false && $result->num_rows > 0) {
      // Mostrar los datos en la tabla
      echo "<table class='table'>";
      // Resto del código para mostrar la tabla
    } else {
      echo "No se encontraron registros que coincidan con la búsqueda.";
    }
  }
  else {
    echo "Error de conexión a la base de datos.";
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Búsqueda de Registros</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Búsqueda de Registros</h1>
    <form method="post" action="">
      <div class="form-group">
        <label for="columna">Seleccione la columna:</label>
        <select class="form-control" id="columna" name="columna">
          <option value="ID">ID</option>
          <option value="FECHADELREPORTE">Fecha del Reporte</option>
          <option value="APELLIDOPATERNO">Apellido Paterno</option>
          <option value="APELLIDOMATERNO">Apellido Materno</option>
          <option value="APELLIDOADICIONAL">Apellido Adicional</option>
          <option value="PRIMERNOMBRE">Primer Nombre</option>
          <option value="SEGUNDONOMBRE">Segundo Nombre</option>
          <option value="FECHADENACIMIENTO">Fecha de Nacimiento</option>
          <option value="RFC">RFC</option>
          <option value="SEXO">Sexo</option>
          <option value="DIRECCIONCALLENUMERO">Dirección Calle Número</option>
          <option value="DIRECCIONCOMPLETA">Dirección Completa</option>
          <option value="COLONIAOPOBLACION">Colonia o Población</option>
          <option value="DELEGACIONOMUNICIPIO">Delegación o Municipio</option>
          <option value="CIUDAD">Ciudad</option>
          <option value="ESTADO">Estado</option>
          <option value="CP">CP</option>
          <option value="TELEFONO">Teléfono</option>
          <option value="NUMEROCUENTA">Número de Cuenta</option>
          <option value="fecha_registro">Fecha de Registro</option>
        </select>
      </div>
      <div class="form-group">
        <label for="valorBusqueda">Valor a buscar:</label>
        <input type="text" class="form-control" id="valorBusqueda" name="valorBusqueda" required>
      </div>
      <button type="submit" class="btn btn-primary">Buscar</button>
    </form>

    <?php
    // Verificar si se ha enviado el formulario de búsqueda
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $columna = $_POST['columna'];
      buscarRegistro($columna);
    }
    mysqli_close($conn);
    ?>
    
  </div>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
