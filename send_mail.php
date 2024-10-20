<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Define variables and sanitize user input
    $firstName = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
    $lastName = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    // Validate data
    if (empty($firstName) || empty($lastName) || empty($email) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Por favor, completa todos los campos correctamente.";
        exit;
    }

    // Set recipient email address
    $to = "your_email@example.com"; // Reemplaza con tu dirección de correo electrónico

    // Subject of the email
    $subject = "New Contact Form Submission";

    // Construct the email message body
    $body = "Nombre: $firstName $lastName\r\n";
    $body .= "Correo Electrónico: $email\r\n";
    $body .= "Mensaje:\r\n$message";

    // Additional headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send the email using PHP mail function
    if (mail($to, $subject, $body, $headers)) {
        echo "¡Tu mensaje ha sido enviado exitosamente!";
    } else {
        echo "Hubo un error al enviar tu mensaje. Por favor, intenta nuevamente más tarde.";
    }

} else {
    // If form is not submitted
    echo "No se recibió el formulario.";
}
?>