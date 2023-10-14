<?php
$host = "localhost"; // Cambia esto si tu base de datos no se encuentra en localhost
$usuario = "Marco";
$contrasena = "123456";
$base_de_datos = "Ingenieria";

$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

if ($conexion->connect_error) {
    die("Error en la conexión a la base de datos: " . $conexion->connect_error);
}
?>
