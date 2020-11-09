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
        $alert = "<div class='alert alert-error'>".$errors[$field].'</div>';
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

function getCategories($db){
    $sql = "SELECT * FROM categories ORDER BY cate_id ASC";
    $stmt = $db->prepare($sql);
    $stmt -> execute();

    $categories = $stmt -> fetchAll(PDO::FETCH_ASSOC);

    return $categories;
}

function getCategory($db, $id = null){
    $sql = "SELECT * FROM categories WHERE cate_id = :id";
    $stmt = $db->prepare($sql);    
    $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
    $stmt -> execute();

    $category = $stmt -> fetch(PDO::FETCH_ASSOC);
    
    return $category;
}

function getTopics($db, $category_id = null, $limit = null){
    
   
    if(!empty($category_id)){
        $sql = "SELECT t.*, c.cate_name AS 'categoria', u.u_name FROM topics t
        INNER JOIN categories c
        ON t.cate_id = c.cate_id 
        INNER JOIN users u
        ON u.u_id = t.u_id WHERE t.cate_id = :category_id ORDER BY t.to_date DESC";
   
   $stmt = $db->prepare($sql);
   $stmt -> bindParam(':category_id', $category_id, PDO::PARAM_INT);
   $stmt -> execute();
   $topics = $stmt -> fetchAll(PDO::FETCH_ASSOC);
   
   return $topics;    
}elseif(!empty($limit)){
        $sql = "SELECT t.*, c.cate_name AS 'categoria', u.u_name FROM topics t
        INNER JOIN categories c
        ON t.cate_id = c.cate_id 
        INNER JOIN users u
        ON u.u_id = t.u_id ORDER BY t.to_date DESC LIMIT :limit ";
   
   $stmt = $db->prepare($sql);
   $stmt -> bindParam(':limit', $limit, PDO::PARAM_INT);
   $stmt -> execute();
   $topics = $stmt -> fetchAll(PDO::FETCH_ASSOC);
   
   return $topics;    
    }else{
        $sql = "SELECT t.*, c.cate_name , u.u_name FROM topics t
        INNER JOIN categories c
        ON t.cate_id = c.cate_id 
        INNER JOIN users u
        ON u.u_id = t.u_id ORDER BY t.to_date DESC";

        $stmt = $db->prepare($sql);
   $stmt -> execute();
   $topics = $stmt -> fetchAll(PDO::FETCH_ASSOC);
   
   return $topics;    
    }
}

function getTopic($db, $topic_id){
    $sql = "SELECT t.*, c.cate_name,
    u.u_name FROM topics t
    INNER JOIN categories c ON t.cate_id = c.cate_id 
    INNER JOIN users u ON t.u_id = u.u_id 
    WHERE t.to_id = :id";

    $stmt = $db -> prepare($sql);
    $stmt -> bindParam(':id', $topic_id, PDO::PARAM_INT);
    $stmt -> execute();
    $topic = $stmt -> fetch(PDO::FETCH_ASSOC);
    return $topic;
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