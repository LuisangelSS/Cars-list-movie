<?php

// Mostrar errores
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Conectar a la base de datos
$conn = mysqli_connect("localhost", "root", "", "cars_db");

if (!$conn) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}
/* 
// Ejecutar la consulta para mostrar las tablas
$sql = "SHOW TABLES";
$rs = mysqli_query($c, $sql);

if (!$rs) {
    die("Error al ejecutar la consulta: " . mysqli_error($c));
}

echo "<ul>";
while ($row = mysqli_fetch_array($rs)) {
    echo "<li>{$row[0]}</li>"; // El índice 0 contiene el nombre de la tabla
}
echo "</ul>";
?>
 */