<?php 
    if(isset($_POST)){
        #Conexion a la BD (incluye inicio de sesion)
        require_once 'includes/conexion.php';

        $titulo = isset($_POST['titulo']) ? $db->real_escape_string($_POST['titulo']) : false;
        $descripcion = isset($_POST['descripcion']) ? $db->real_escape_string($_POST['descripcion']) : false;
        $categoria = isset($_POST['categoria']) ? (int) $_POST['categoria'] : false;
        $usuario = $_SESSION['usuario']['id'];
        
        //validacion
        $errores = array();

        // var_dump($errores);
        // die();

        if(empty($titulo)){
            $errores['titulo'] = 'El titulo NO es válido';
        }
        //
        #nos aparece un espacio en blanco en el textarea (no se porque) por eso hacemos trim() 
        #para eliminarlo y que funciona el programa correctamente
        trim($descripcion);
        //
        if(empty($descripcion)){
            $errores['descripcion'] = 'La descripción NO es válida';
            
        }
       
        if(empty($categoria) && !is_numeric($categoria)){
            $errores['categoria'] = 'La categoría NO es válida';
        }
        if(count($errores) == 0){
            $sql = $db->prepare ("INSERT INTO entradas VALUES (null,?,?,?,?, CURDATE());");
            // var_dump($sql);
            // die();
            $sql->bind_param('iiss', $usuario, $categoria, $titulo,$descripcion);
            $sql->execute();

            $guardar = $sql->get_result();

            //nos redirecciona a index cuando se realiza correctamente la entrada
            header('Location:index.php');

            // debug de las consultas sql
        // var_dump(mysqli_error($guardar));
        //    die();
        }else{
            $_SESSION['errores_entrada'] = $errores;
            //si ocurre algun error nos redirecciona a la pagina de crear entrada
            header('Location:crear_entrada.php');
        }


    }

?>