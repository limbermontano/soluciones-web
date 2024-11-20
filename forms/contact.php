<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'assets/phpmailer/PHPMailerAutoload.php';

// Dirección de correo de destino
$receiving_email_address = 'limber.montano40@gmail.com';

// Verifica si los datos del formulario están disponibles
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
    
    // Recibe los datos del formulario
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    // Crear una nueva instancia de PHPMailer
    $mail = new PHPMailer;
    
    // Configura PHPMailer para usar SMTP
    $mail->isSMTP();                                 
    $mail->Host = 'smtp.gmail.com';                  
    $mail->SMTPAuth = true;                         
    $mail->Username = 'tu_correo@gmail.com';          
    $mail->Password = 'tu_contraseña';                
    $mail->SMTPSecure = 'tls';                       
    $mail->Port = 587;                              
    
    // Destinatario
    $mail->setFrom($email, $name);
    $mail->addAddress($receiving_email_address); 
    
    // Contenido del correo
    $mail->isHTML(true);                                 
    $mail->Subject = "Nuevo mensaje de $name: $subject";
    $mail->Body    = "
        <strong>Nombre:</strong> $name<br>
        <strong>Correo:</strong> $email<br>
        <strong>Asunto:</strong> $subject<br>
        <strong>Mensaje:</strong><br>$message
    ";

    // Enviar el correo
    if ($mail->send()) {
        echo "Mensaje enviado correctamente";
    } else {
        echo "Error al enviar el mensaje. Intenta nuevamente.";
    }
} else {
    echo "Por favor, completa todos los campos.";
}




?>

