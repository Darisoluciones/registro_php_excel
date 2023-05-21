<!DOCTYPE html>
<html>
<head>
  <title>Fecha Actual</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/styles.css">
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
          <th>fecha nacimiento</th>
          <th>rfc</th>
          <th>sexo</th>
          <th>dirección calle o numero</th>
          <th>dirección completa</th>
          <th>colonia o población</th>
          <th>delegación o municipio</th>
          <th>ciudad</th>
          <th>estado</th>
          <th>cp</th>
          <th>teléfono</th>
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
          // Obtener la fecha actual
          $currentDate = date("Y-m-d");

          // Mostrar los datos en la tabla
          $mostRecentDate = ""; // o asigna un valor predeterminado apropiado

         // Código que calcula o asigna un valor a $mostRecentDate

         // Línea 61 donde se utiliza la variable $mostRecentDate
          echo "La fecha más reciente es: " . $mostRecentDate;

          while ($row = $result->fetch_assoc()) {
            $reporteDate = $row['FECHADELREPORTE'];
            $highlightClass = ($reporteDate == $mostRecentDate) ? 'most-recent-date' : '';
            $rowClass = ($reporteDate == $mostRecentDate) ? 'most-recent-date-row' : '';
            
            echo "<tr>";
            echo "<td>" . $row['ID'] . "</td>";
            echo "<td class='$highlightClass'>" . $row['FECHADELREPORTE'] . "</td>";
            echo "<td>" . $row['APELLIDOPATERNO'] . "</td>";
            echo "<td>" . $row['APELLIDOMATERNO'] . "</td>";
            echo "<td>" . $row['APELLIDOADICIONAL'] . "</td>";
            echo "<td>" . $row['PRIMERNOMBRE'] . "</td>";
            echo "<td>" . $row['SEGUNDONOMBRE'] . "</td>";
            echo "<td>" . $row['FECHADENACIMIENTO'] . "</td>";
            echo "<td>" . $row['RFC'] . "</td>";
            echo "<td>" . $row['SEXO'] . "</td>";
            echo "<td>" . $row['DIRECCIONCALLENUMERO'] . "</td>";
            echo "<td>" . $row['DIRECCIONCOMPLETA'] . "</td>";
            echo "<td>" . $row['COLONIAOPOBLACION'] . "</td>";
            echo "<td>" . $row['DELEGACIONOMUNICIPIO'] . "</td>";
            echo "<td>" . $row['CIUDAD'] . "</td>";
            echo "<td>" . $row['ESTADO'] . "</td>";
            echo "<td>" . $row['CP'] . "</td>";
            echo "<td>" . $row['TELEFONO'] . "</td>";
            echo "<td>" . $row['NUMEROCUENTA'] . "</td>";
            echo "<td>" . $row['fecha_registro'] . "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='20'>No se encontraron productos.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
  <script src="dist/js/bootstrap.min.js"></script>
</body>
</html>