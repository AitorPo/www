<?php
//iniciar la sesion y conexion a la BD (ya lo tenemos en include conexion.php)
require_once 'includes/conexion.php';

//recoger datos del form
if(isset($_POST)){
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    //comprobar credenciales del usuario
    $sql = $db->prepare('SELECT * FROM usuarios WHERE email = ?');
    $sql-> bind_param('s', $email);
    $sql-> execute();
var_dump($sql);
    $login = $sql->get_result();
    var_dump($login);
    //die(),
    $sql->close();
    if($login & mysqli_num_rows($login) == 1){
        $usuario = mysqli_fetch_assoc($login);
        var_dump($usuario);
        die();
        //comprobar la pass
        $verify = password_verify($password, $usuario['password']);
        var_dump($verify);
        
        if ($verify) {
            # usar sesion para guardar datos del ususario logueado
            $_SESSION['usuario'] = $usuario;
            var_dump($usuario);
            // die();
            if(isset($_SESSION['error_login'])){
               unset($_SESSION['error_login']);
            }
        }else{
            #si algo falla enviamos una sesion con el fallo
            $_SESSION['error_login'] = "Login incorrecto";
        }
    }else{
        #mensaje de error
        $_SESSION['error_login'] = "Login incorrecto";
    }

}



//redirigir
header('Location:index.php');
?>