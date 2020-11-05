<?php 
    if(isset($_POST)){
        #Conexion a la BD (incluye inicio de sesion)
        require_once 'includes/conexion.php';
    }

    $nombre = isset($_POST['nombre']) ? $db->real_escape_string($_POST['nombre']) :false;
    // var_dump($_POST);
    // var_dump($nombre);
    // die();
    
    //array errores
    $errores = array();

    if(!empty($nombre) && !is_numeric($nombre) & !preg_match("/[0-9]/", $nombre)){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es válido";
    }
    
    if(count($errores) == 0){
        $sql = $db->prepare ("INSERT INTO categorias VALUES (NULL, ?)");
        $sql-> bind_param('s', $nombre);
        $sql-> execute();

        $guardar = $sql->get_result();
    }
    
    header('Location: index.php');
?>