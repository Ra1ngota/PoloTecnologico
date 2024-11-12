<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = htmlspecialchars(strip_tags($_POST['nombre']));
    $correo = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); 
    $mensaje = htmlspecialchars(strip_tags($_POST['mensaje'])); 

    // Validar el correo electrónico
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo "Correo no válido";
        exit;
    }

    // Configurar el correo
    $to = "nachoalvarez@gmail.com";
    $subject = "Mensaje del formulario de contacto";
    $body = "Nombre: $nombre\nCorreo: $correo\nMensaje: $mensaje";
    $headers = "From: $correo";

    // Enviar el correo
    if (mail($to, $subject, $body, $headers)) {
        echo "Mensaje enviado con éxito.";
    } else {
        echo "Error al enviar el mensaje.";
    }
}
