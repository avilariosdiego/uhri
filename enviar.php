<?php

// Recibir datos del formulario
$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$servicio = filter_var($_POST['servicio'], FILTER_SANITIZE_STRING);
$mensaje = filter_var($_POST['mensaje'], FILTER_SANITIZE_STRING);

// Validaciones adicionales (opcional)
if (!$nombre) {
  echo "Error: El nombre es obligatorio";
  exit;
}

if (!$email) {
  echo "Error: El correo electrónico no es válido";
  exit;
}

if ($servicio == "Selecciona un servicio") {
  echo "Error: Debes seleccionar un servicio";
  exit;
}

if (!$mensaje) {
  echo "Error: El mensaje es obligatorio";
  exit;
}

// Datos para el correo
$destinatario = "gconegan@remeca.cl"; // Reemplaza con tu dirección de correo
$asunto = "Solicitud de cotización | Contacto - $nombre";
$cuerpo = "Nombre: $nombre\nCorreo electrónico: $email\nServicio: $servicio\nMensaje: $mensaje";
$headers = "From: $nombre <$email>";

if (mail($destinatario, $asunto, $cuerpo, $headers)) {
  echo "Enviado correctamente";
} else {
  echo "Error al enviar";
}

?>