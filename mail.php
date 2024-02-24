<?php
// Verificar si se recibieron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    // Configurar el destinatario del correo electr�nico
    $to = "robertopp170800@gmail.com";
    
    // Configurar el asunto del correo electr�nico
    $email_subject = "Mensaje de contacto de $name: $subject";
    
    // Construir el cuerpo del correo electr�nico
    $email_body = "Has recibido un mensaje de contacto de $name ($email):\n\n";
    $email_body .= "Mensaje:\n$message";
    
    // Configurar las cabeceras del correo electr�nico
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // Enviar el correo electr�nico
    if (mail($to, $email_subject, $email_body, $headers)) {
        // �xito al enviar el correo electr�nico
        echo json_encode(array('success' => true, 'message' => 'Mensaje enviado correctamente'));
    } else {
        // Error al enviar el correo electr�nico
        echo json_encode(array('success' => false, 'message' => 'Error al enviar el mensaje'));
    }
} else {
    // Si no se reciben datos por POST, redireccionar a la p�gina de inicio o mostrar un mensaje de error
    echo json_encode(array('success' => false, 'message' => 'No se recibieron datos del formulario'));
}
?>
