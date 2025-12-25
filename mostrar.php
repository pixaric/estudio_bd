<?php
// Activar errores para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Datos de conexión (ajusta con los tuyos de InfinityFree)
$servername = "sqlXXX.infinityfree.com"; 
$username   = "epiz_40714581";           
$password   = "TU_PASSWORD";             
$dbname     = "if0_40714581_proyecto_db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultar todos los empleados
$sql = "SELECT id, nombre, antiguedad, precioHora, horas FROM empleado";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Lista de empleados</title>
  <style>
    table { border-collapse: collapse; width: 70%; margin: 20px auto; }
    th, td { border: 1px solid #333; padding: 8px; text-align: center; }
    th { background-color: #eee; }
  </style>
</head>
<body>
  <h2 style="text-align:center;">Empleados registrados</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Antigüedad</th>
      <th>Precio Hora</th>
      <th>Horas</th>
      <th>Salario</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $salario = $row["precioHora"] * $row["horas"];
            echo "<tr>
                    <td>".$row["id"]."</td>
                    <td>".$row["nombre"]."</td>
                    <td>".$row["antiguedad"]."</td>
                    <td>".$row["precioHora"]."</td>
                    <td>".$row["horas"]."</td>
                    <td>".$salario."</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No hay empleados registrados</td></tr>";
    }
    $conn->close();
    ?>
  </table>
</body>
</html>