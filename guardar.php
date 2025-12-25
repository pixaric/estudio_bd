<?php
// Datos de conexión (ajusta con los que te dio InfinityFree)
$servername = "sqlXXX.infinityfree.com"; // tu servidor MySQL
$username   = "epiz_40714581";           // tu usuario MySQL
$password   = "TU_PASSWORD";             // tu contraseña
$dbname     = "if0_40714581_proyecto_db"; // tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos del formulario
$nombre      = $_POST['nombre'];
$antiguedad  = $_POST['antiguedad'];
$precioHora  = $_POST['precioHora'];
$horas       = $_POST['horas'];

// Insertar en la tabla
$sql = "INSERT INTO empleado (nombre, antiguedad, precioHora, horas)
        VALUES ('$nombre', '$antiguedad', '$precioHora', '$horas')";

if ($conn->query($sql) === TRUE) {
    echo "Empleado registrado correctamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>