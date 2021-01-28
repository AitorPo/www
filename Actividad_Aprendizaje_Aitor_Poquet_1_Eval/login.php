<?php 
//siempre nos conectamos a la BD para poder operar con ella
require_once 'includes/connection.php';

if(isset($_POST)){
    $email = trim($_POST['email']);
    $password = $_POST['password'];

        $sql_select = "SELECT * FROM users WHERE u_email = :email";
        $stmt = $db->prepare($sql_select);
        $stmt -> bindParam(':email', $email, PDO::PARAM_STR);
        $stmt -> execute();
       
        $user = $stmt -> fetch(PDO::FETCH_ASSOC);
        var_dump($user);
        
        $verify = password_verify($password, $user['u_password']);
        var_dump($verify);
        
        if($verify){
            # usar sesion para guardar datos del ususario logueado
            $_SESSION['user'] = $user;
            if(isset($_SESSION['error_login'])){
                unset($_SESSION['error_login']);
            }
        }else{
            #si algo falla enviamos una sesion con el fallo
            $_SESSION['error_login'] = "Login incorrecto";
        }
        var_dump($password);
       
    }else{
        #mensaje de error
        $_SESSION['error_login'] = "Login incorrecto";
    }
header('Location: index.php');
?>