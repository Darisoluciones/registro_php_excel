<!DOCTYPE html>
<html>
<head>
  <title>Tabla de Productos</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
  <div class="container-fluid">
    <table class="table">
      <thead>
        <tr>
          <th>id</th>
          <th>fecha del reporte</th>
          <th>apellido paterno</th>
          <th>apellido materno</th>
          <th>apellido adicional</th>
          <th>primer nombre</th>
          <th>segundo nombre</th>
          <th>fecha de nacimento</th>
          <th>rfc</th>
          <th>sexo</th>
          <th>dirección calle o numero</th>
          <th>dirección completa</th>
          <th>colonia o ppblación</th>
          <th>delegación o municipio</th>
          <th>ciudad</th>
          <th>estado</th>
          <th>cp</th>
          <th>telefono</th>
          <th>número de cuenta</th>
          <th>fecha de registro</th>
        </tr>
      </thead>
      <tbody>
      <?php
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bd";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Error de conexión: " . $conn->connect_error);
    }

    // Obtener los datos de la tabla
    $sql = "SELECT * FROM tbl_productos";
    $result = $conn->query($sql);
  
    if ($result->num_rows > 0) {
      // Mostrar los datos en la tabla
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['FECHADELREPORTE'] . "</td>";
        echo "<td>" . $row['APELLIDOPATERNO']. "</td>";
        echo "<td>" . $row['APELLIDOMATERNO']. "</td>";
        echo "<td>" . $row['APELLIDOADICIONAL']. "</td>";
        echo "<td>" . $row['PRIMERNOMBRE']. "</td>";
        echo "<td>" . $row['SEGUNDONOMBRE']. "</td>";
        echo "<td>" . $row['FECHADENACIMIENTO']. "</td>";
        echo "<td>" . $row['RFC']. "</td>";
        echo "<td>" . $row['SEXO']. "</td>";
        echo "<td>" . $row['DIRECCIONCALLENUMERO']. "</td>";
        echo "<td>" . $row['DIRECCIONCOMPLETA']. "</td>";
        echo "<td>" . $row['COLONIAOPOBLACION']. "</td>";
        echo "<td>" . $row['DELEGACIONOMUNICIPIO']. "</td>";
        echo "<td>" . $row['CIUDAD']. "</td>";
        echo "<td>" . $row['ESTADO']. "</td>";
        echo "<td>" . $row['CP']. "</td>";
        echo "<td>" . $row['TELEFONO']. "</td>";
        echo "<td>" . $row['NUMEROCUENTA']. "</td>";
        echo "<td>" . $row['fecha_registro']. "</td>";
        echo "</tr>";
    }
  } else {
    echo "No se encontraron productos.";
  }

    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
      </tbody>
    </table>
  </div>
  <script src="dist/js/bootstrap.min.js"></script>
</body>
</html>




