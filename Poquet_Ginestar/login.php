<?php 
//siempre nos conectamos a la BD para poder operar con ella
require_once './includes/connection.php';

if(isset($_POST)){
    $usuario = trim($_POST['usuario']);
    $password = ($_POST['password']);

        $sql_select = "SELECT * FROM empleados WHERE usuario = :usuario";
        $stmt = $db->prepare($sql_select);
        $stmt -> bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $stmt -> execute();
       
        $empleado = $stmt -> fetch(PDO::FETCH_ASSOC);
        var_dump($empleado);
        
        $verify = password_verify($password, $empleado['password']);
        var_dump($verify);
        
        
        if($verify){
            # usar sesion para guardar datos del ususario logueado
            $_SESSION['empleado'] = $empleado;
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