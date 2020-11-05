<?php 

/*
* Importamos todo lo necesario para poder usar la librería PHPMailer
* También se puede hacer vía Composer y nos ahorraríamos todas estas líneas
* pero me parece interesante incluirlas para que no sea todo tan automático
*/
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'includes/PHPMailer/src/Exception.php';
require 'includes/PHPMailer/src/PHPMailer.php';
require 'includes/PHPMailer/src/SMTP.php';


function showErrors($errors, $field){
    $alert = '';
    if(isset($errors[$field]) && !empty($field)){
        $alert = "<div class='alerta alerta-error'>".$errors[$field].'</div>';
    }
    return $alert;
}

#borramos los errores de todas las sesiones que se abran
function deleteErrors(){

    if(isset($_SESSION['errors'])){
        unset($_SESSION['errors']);
    }

    if(isset($_SESSION['input_errors'])){
        unset($_SESSION['input_errors']);
    }

    if(isset($_SESSION['error_login'])){
        unset($_SESSION['error_login']);
    }

    if(isset($_SESSION['completed'])){
        unset($_SESSION['completed']);
    }
}

//funcion para enviar el email de registro de forma automática e inmediata
function send_Mail($to, $username, $from, $subject, $body){
    // Al instanciar y parametrizar a true permitimos que lance excepciones
    $mail = new PHPMailer(true);
    # 'contraseña_real_de_la_cuenta_de_envio'
    $password = 'Ai180612';
    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Activamos mensajes de debug
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = $from;            //Cuenta REAL de acceso de PHP a Gmail  // SMTP username
        $mail->Password   = $password;        // Pass REAL de acceso de la cuenta de Gmail SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom($from, 'Aitor Poquet Ginestar');
        $mail->addAddress($to, $username);     // Add a recipient
        
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
    
        $mail->send();
        echo 'Mensaje enviado';
    } catch (Exception $e) {
        echo "El mensaje podría no haberse enviado. Mailer Error: {$mail->ErrorInfo}";
        }
}


?>