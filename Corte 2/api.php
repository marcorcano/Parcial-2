<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require 'conexion.php';

$metodo = $_SERVER['REQUEST_METHOD'];

switch ($metodo) {
    case 'GET':
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $resultado = $conexion->query("SELECT * FROM usuarios WHERE id = $id");
            $fila = $resultado->fetch_assoc();
            echo json_encode($fila);
        } else {
            $resultado = $conexion->query("SELECT * FROM usuarios");
            $usuarios = array();
            while ($fila = $resultado->fetch_assoc()) {
                $usuarios[] = $fila;
            }
            echo json_encode($usuarios);
        }
        break;

    case 'POST':
        $datos = json_decode(file_get_contents("php://input"));
        $nombre = $datos->nombre;
        $email = $datos->email;
        $sql = "INSERT INTO usuarios (nombre, email) VALUES ('$nombre', '$email')";
        if ($conexion->query($sql) === TRUE) {
            echo json_encode(array("mensaje" => "Usuario creado"));
        } else {
            echo json_encode(array("error" => $conexion->error));
        }
        break;

    case 'PUT':
        $datos = json_decode(file_get_contents("php://input"));
        $id = $datos->id;
        $nombre = $datos->nombre;
        $email = $datos->email;
        $sql = "UPDATE usuarios SET nombre = '$nombre', email = '$email' WHERE id = $id";
        if ($conexion->query($sql) === TRUE) {
            echo json_encode(array("mensaje" => "Usuario actualizado"));
        } else {
            echo json_encode(array("error" => $conexion->error));
        }
        break;

    case 'DELETE':
        $id = $_GET['id'];
        $sql = "DELETE FROM usuarios WHERE id = $id";
        if ($conexion->query($sql) === TRUE) {
            echo json_encode(array("mensaje" => "Usuario eliminado"));
        } else {
            echo json_encode(array("error" => $conexion->error));
        }
        break;
}
?>
