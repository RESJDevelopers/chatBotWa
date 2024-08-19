<?php
$server = "localhost";
$username = "TU-USUARIO";
$password = "CONTRASEÑA";
$database = "TU-BASE-DE-DATOS";

// Establecer la conexión con UTF-8
$conexion = new mysqli($server, $username, $password, $database);
$conexion->set_charset("utf8");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

