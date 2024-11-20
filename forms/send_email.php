<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar los datos del formulario
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Configuración del correo
    $to = "limber.montano40@gmail.com"; // Tu correo
    $email_subject = "Nuevo mensaje de: $name - $subject";
    $email_body = "Has recibido un nuevo mensaje desde tu formulario web.\n\n".
                  "Detalles del mensaje:\n".
                  "Nombre: $name\n".
                  "Correo Electrónico: $email\n".
                  "Mensaje:\n$message\n";

    $headers = "From: $email\n";
    $headers .= "Reply-To: $email";

    // Enviar el correo
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Mensaje enviado correctamente.";
    } else {
        echo "Error al enviar el mensaje. Por favor, intenta de nuevo.";
    }
}
?>
