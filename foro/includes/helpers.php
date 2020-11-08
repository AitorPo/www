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

/* obtenemos un listado con todas las categorías */

function getCategorias($db){
    $sql = $db->prepare("SELECT * FROM categorias ORDER BY id ASC");
    $sql-> execute();

    $categorias = $sql->get_result();
    
    return $categorias;
}

/* obtenemos solo una categoría para trabajar con ella */
function getCategoria($db, $id){
    $sql = $db->prepare("SELECT * FROM categorias WHERE id = $id");
    
    $sql-> execute();
    $row = array();
    
    $row = $sql -> get_result();
    $categoria = $row -> fetch_assoc();
    

    return $categoria;
}

function getEntradas($db, $limit = null, $categoria = null){
    $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e
                        INNER JOIN categorias c
                        ON e.categoria_id = c.id";
                    
    if(!empty($categoria)){
        $sql .= " WHERE e.categoria_id = $categoria";
    }  

    $sql .=  " ORDER BY e.id DESC";
    
    if(!empty($limit) && is_int($limit)){
        $sql .= " LIMIT $limit";
    }

    $stmt = $db -> prepare($sql);   
    $stmt-> execute();

   
    $ultimas_entradas = $stmt -> get_result();
    return $ultimas_entradas;
}

function getEntrada($db, $id){
    $sql = $db->prepare("SELECT e.*, c.nombre AS 'categoria',
    CONCAT (u.nombre, ' ', u.apellidos) AS 'usuario' FROM entradas e
    INNER JOIN categorias c ON e.categoria_id = c.id 
    INNER JOIN usuarios u ON e.usuario_id = u.id 
    WHERE e.id = $id");
    
    //ejecutamos la consulta
    $sql -> execute();
    //array que recojerá los datos de la fila que estamos consultando
    $row = array();
    
    //obtenemos un objeto sql con los elementos que conforman la fila
    $row = $sql -> get_result();
    //convertimos ese campo en un array asociativo para obtener su key -> value con fetch_assoc()
    $entrada = $row -> fetch_assoc();
    //devolvemos los datos de la consulta en forma de array asociativo
    return $entrada;
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