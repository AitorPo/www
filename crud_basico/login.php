<?php 
//siempre nos conectamos a la BD para poder operar con ella
require_once './includes/connection.php';

if(isset($_POST)){
    $usuario = trim($_POST['usuario']);
    $password = $_POST['password'];

        $sql_select = "SELECT * FROM operario WHERE nombre = :nombre";
        $stmt = $db->prepare($sql_select);
        $stmt -> bindParam(':nombre', $usuario, PDO::PARAM_STR);
        $stmt -> execute();
       
        $operario = $stmt -> fetch(PDO::FETCH_ASSOC);
        var_dump($operario);
        
       if ($password == $operario['password']){
            $_SESSION['operario'] = $operario;
            if(isset($_SESSION['error_login'])){
                unset($_SESSION['error_login']);
            }
       } else {
            $_SESSION['error_login'] = "Datos incorrectos";
            header('Location: index.php');
            die();
       }
       
       
        var_dump($_SESSION['operario']);
        
    }else{
        #mensaje de error
        $_SESSION['error_login'] = "Login incorrecto";
    }
header('Location: index.php');
?>