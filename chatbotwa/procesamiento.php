<?php
// Conexión a la base de datos
require_once './conexion.php';
require_once './botman.php';


// Función para verificar y actualizar la sesión
function manejarSesion($telefonoCliente, $mensaje) {
    global $conexion;
    $tiempoActual = time();
    $tiempoExpiracion = 60; // 60 segundos

    // Verificar si existe una sesión activa
    $sql = "SELECT * FROM sesiones WHERE telefono_wa = '$telefonoCliente'";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        // Si existe una sesión, verificar si ha expirado
        $row = $result->fetch_assoc();
        $ultimaActividad = $row['ultima_actividad'];

        if (($tiempoActual - $ultimaActividad) > $tiempoExpiracion) {
            // Si la sesión ha expirado, destruir la sesión y crear una nueva
            $sql = "DELETE FROM sesiones WHERE telefono_wa = '$telefonoCliente'";
            $conexion->query($sql);            
            return 'sesion_expirada';
        } else {
            // Si la sesión no ha expirado, actualizar la última actividad
            $sql = "UPDATE sesiones SET ultima_actividad = '$tiempoActual' WHERE telefono_wa = '$telefonoCliente'";
            $conexion->query($sql);
            return $mensaje;
        }
    } else {
        // Si no existe una sesión, crear una nueva
        $sql = "INSERT INTO sesiones (telefono_wa, estado_sesion, ultima_actividad) VALUES ('$telefonoCliente', 'menu_principal', '$tiempoActual')";
        $conexion->query($sql);
        return 'menu_principal';
    }
}

// En el webhook, manejar la sesión antes de procesar el mensaje
$estadoSesion = manejarSesion($telefonoCliente, $mensaje);

// Procesar el mensaje según el estado de la sesión
if ($estadoSesion == 'menu_principal') {
    return $respuesta = "Menú Principal";
} 
if ($estadoSesion == 'sesion_expirada') {
    return $respuesta = "La sesión ha expirado. Volviendo al menú principal...";
} 

if ($estadoSesion == $mensaje) {
    // Establecer la zona horaria a Uruguay
    date_default_timezone_set('America/Montevideo');

    // Convertir el mensaje a minúsculas y eliminar acentos para una comparación más sencilla
    $mensaje = strtolower($mensaje);
    $mensaje = str_replace(
        ['á', 'é', 'í', 'ó', 'ú', 'ñ'],
        ['a', 'e', 'i', 'o', 'u', 'n'],
        $mensaje
    );

    // Verificar si el mensaje coincide con algún patrón
    foreach ($intents as $intent => $data) {
        if (preg_match($data['patron'], $mensaje)) {
            $respuestas = $data['respuestas'];
            $respuesta = $respuestas[array_rand($respuestas)]; // Seleccionar una respuesta aleatoria
            return $respuesta;
        }
    }

    // Respuesta por defecto si no se reconoce el mensaje
    return $respuesta = "No entendí esa frase, recuerda que soy un robot.";
}









