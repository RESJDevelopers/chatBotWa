<?php

// Configuracion del bot, con respuesta dinamica al 50%
$intents = [
    'saludo' => [
        'patron' => "/\b(hola|ola|buenos dias|buenas tardes|buenas noches)\b/",
        'respuestas' => ["¡Hola! ¿En qué puedo ayudarte hoy?", "Hola, ¿cómo estás?"]
    ],
    'despedida' => [
        'patron' => "/\b(adios|hasta luego|nos vemos|chau)\b/",
        'respuestas' => ["Que tengas un excelente día.", "Hasta luego, que tengas un buen día."]
    ],
    'agradecimiento' => [
        'patron' => "/\b(gracias|muchas gracias|te agradezco)\b/",
        'respuestas' => ["¡De nada! Estoy aquí para ayudarte.", "No hay de qué, estoy aquí para ayudarte."]
    ],
    'ayuda' => [
        'patron' => "/\b(ayuda|necesito ayuda|puedes ayudarme)\b/",
        'respuestas' => ["Claro, ¿en qué necesitas ayuda?", "¿Cómo puedo ayudarte hoy?"]
    ],
    'nombre' => [
        'patron' => "/\b(cual es tu nombre|como te llamas)\b/",
        'respuestas' => ["Soy un bot creado para asistirte. ¿En qué puedo ayudarte?", "Me llamo Bot, estoy aquí para ayudarte."]
    ],
    'hora' => [
        'patron' => "/\b(que hora es|me dices la hora|hora actual)\b/",
        'respuestas' => ["La hora actual es " . date("H:i") . ".", "Son las " . date("H:i") . " actualmente."]
    ],
    'fecha' => [
        'patron' => "/\b(que dia es hoy|fecha de hoy|dia actual)\b/",
        'respuestas' => ["Hoy es " . date("d/m/Y") . ".", "La fecha de hoy es " . date("d/m/Y") . "."]
    ],
    'chiste' => [
        'patron' => "/\b(cuentame un chiste|dime un chiste|quiero reir)\b/",
        'respuestas' => ["¿Por qué los pájaros no usan Facebook? Porque ya tienen Twitter.", "¿Por qué la computadora fue al médico? ¡Tenía un virus!"]
    ],
    'clima' => [
        'patron' => "/\b(como esta el clima|que tiempo hace|clima actual)\b/",
        'respuestas' => ["Lo siento, no puedo proporcionar información meteorológica en este momento.", "No tengo acceso a información sobre el clima en este momento."]
    ],
    'salud' => [
        'patron' => "/\b(como estas|que tal estas|como te sientes)\b/",
        'respuestas' => ["Estoy bien, gracias por preguntar. ¿Y tú, cómo estás?", "Me siento bien, gracias. ¿Necesitas ayuda en algo?"]
    ]
];