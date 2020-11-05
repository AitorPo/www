<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'includes/PHPMailer/src/Exception.php';
require 'includes/PHPMailer/src/PHPMailer.php';
require 'includes/PHPMailer/src/SMTP.php';

function mostrarError($errores, $campo){
    $alerta = '';
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class='alerta alerta-error'>".$errores[$campo].'</div>';
    }
    return $alerta;
}

#borramos los errores de todas las sesiones que se abran
function borrarErrores(){

    if(isset($_SESSION['errores'])){
        unset($_SESSION['errores']);
    }

    if(isset($_SESSION['errores_entrada'])){
        unset($_SESSION['errores_entrada']);
    }

    if(isset($_SESSION['completado'])){
        unset($_SESSION['completado']);
    }
}

function getCategorias($db){
    $sql = $db->prepare("SELECT * FROM categorias ORDER BY id ASC");
    $sql-> execute();

    $categorias = $sql->get_result();

    return $categorias;
}

function getUltimasEntradas($db){
    $sql = $db->prepare("SELECT e.*, c.nombre AS 'categoria' FROM entradas e
                        INNER JOIN categorias c
                        ON e.categoria_id = c.id
                        ORDER BY e.id DESC LIMIT 4;"
    );
    $sql-> execute();

    $ultimas_entradas = $sql -> get_result();

    return $ultimas_entradas;
}

function send_Mail($to, $username,$from,$subject,$body){
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
# 'contraseña_real_de_la_cuenta_de_envio'
$password = '';
try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $from;            //Cuenta REAL de acceso de PHP a Gmail  // SMTP username
    $mail->Password   = $password;        // Pass REAL de acceso de la cuenta de Gmail SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($from, 'Blog de videojuegos');
    $mail->addAddress($to, $username);     // Add a recipient
    
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}






?>