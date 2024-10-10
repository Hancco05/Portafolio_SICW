<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $email = htmlspecialchars(trim($_POST['email']));
    $asunto = htmlspecialchars(trim($_POST['asunto'])); // Capturar el asunto
    $mensaje = htmlspecialchars(trim($_POST['mensaje']));

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 's.carmonawright@gmail.com'; // Tu correo de Gmail
        $mail->Password = 'elyw ifdv iqgd vjgl'; // Tu contraseña de Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Destinatarios
        $mail->setFrom($email, $nombre);
        $mail->addAddress('s.carmonawright@gmail.com'); // Reemplaza con tu dirección de correo

        // Contenido del correo
        $mail->isHTML(false);
        $mail->Subject = $asunto; // Usar el asunto enviado por el usuario
        $mail->Body = "Nombre: $nombre\nEmail: $email\n\nMensaje:\n$mensaje\n";

        $mail->send();
        echo 'Correo enviado con éxito.';
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
} else {
    echo "Método de envío no válido.";
}
?>
