
<?php

if(isset($_POST)){  
    //conexion a la BD
    require_once 'includes/conexion.php';
    require_once 'includes/helpers.php';
    //inicio de sesion.
    //si no existe sesion se icinia. si ya existe no se vuelve a iniciar
    

    #el valor de las variables es igual a hacer if() de validacion con cada variable
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? $db->real_escape_string($_POST['apellidos']) : false;
    #trim del email para que se guarde sin espacios
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

   $to = $email; 
   $username = $nombre;
   $from = 'aitorpoquetginestar@gmail.com';
   $subject = 'Probando PHP';
   $body = 'Bienvenid@ '.$nombre.'. Te has registrado correctamente';
       
    
    //$nombre = $db-> escape_string($nombre);
    
    //ARRAY DE ERRORES
    $errores = array();

    //VALIDAR DATOS ANTES DE GUARDARLOS
    #Validamos el campo Nombre
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match('/[0-9]/', $nombre)){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['nombre'] = 'El nombre es inválido';
    }
    #Validamos el campo apellidos
    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match('/[0-9]/', $apellidos)){
        $apellidos_validado = true;
    }else{
        $apellidos_validado = false;
        $errores['apellidos'] = 'El apellido es inválido';
    }
    #Validamos el campo email
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
    }else{
        $email_validado = false;
        $errores['email'] = 'El email es inválido';
    }
    #Validamos el campo password
    if(!empty($password)){
        $password_validado = true;
    }else{
        $password_validado = false;
        $errores['password'] = 'El password es inválido';
    }

    //COMPROBAMOS QUE EL ARRAY DE ERRORES ESTÉ VACÍO, ES DECIR, QUE NO SE HAYA PRODUCIDO NINGÚN ERROR
    $guardar_usuario = false;

    if(count($errores) == 0){#cuando no existan errores
        $guardar_usuario = true;
        //CIFRAR LA CONTRASEÑA
        #ciframos la contraseña 4 veces (cost => 4)
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);

        // DEBUG CIFRADO Y VERIFICADO DE PASSWORD
        // var_dump($password);
        // var_dump($password_segura);
        // #verificamos password
        // var_dump(password_verify($password, $password_segura));
        // die();

        //INSERTAR USER EN LA BD
        $sql_insert_user = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE());";
        $query_insert_user = mysqli_query($db, $sql_insert_user);
                
                
        
//var_dump(mysqli_error($db));
//die();
        if($query_insert_user){
                     
            $_SESSION['completado'] = "El registro se ha completado con éxito";
            
            send_Mail($to,$username,$from,$subject,$body);
            
        }elseif(isset($email)){
            $_SESSION['errores']['general'] = "El email ya existe. Prueba con otro";
        }else{
            $_SESSION['errores']['general'] = "Error al guardar el usuario";
        }

    }else{#cuando exista algun error
        $_SESSION['errores'] = $errores;
    }

    // var_dump($errores);
}

//redirect a index una vez se haya completado el proceso de signup
header('Location: index.php');
?>