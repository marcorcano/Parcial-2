<?php
require 'conexion.php';

// Realiza una consulta a la base de datos
$resultado = $conexion->query("SELECT * FROM usuarios");

// Verifica si hay resultados
if ($resultado->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Email</th></tr>";
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila['id'] . "</td>";
        echo "<td>" . $fila['nombre'] . "</td>";
        echo "<td>" . $fila['email'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}

$conexion->close();
?>
