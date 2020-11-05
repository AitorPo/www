<?php

//comprobamos si se ha introducido algún dato en el body de la página
if(isset($_POST)){
    //"importamos" la conexión y las funciones que gestionen nuestra web
    require_once 'includes/connection.php';
    require_once 'includes/functions.php';

   
    //seteamos las variables usando isset() como un "if()" para validarlas
    //$name = isset($_POST['name']) ? mysqli_real_escape_string($db, $_POST['name']) : false;
    //trim() de email para que se guarde sin espacios por si acaso
    //$email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    //$password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    //variables para PHPMailer
   $from = 'aitorpoquetginestar@gmail.com';
   $subject = 'Actividad de Aprendizaje de la 1ª evaluación de Aitor Poquet Ginestar';
   $body = 'Bienvenid@ '.$name.'. Te has registrado correctamente';
       
   //array que recogerá los errores para controlarlos y gestionarlos
   $errors = array();

   //validación de datos antes de guardarlos en la BD
   //Nombre
   if(!empty($name) && !is_numeric($name)){
       //variable que determina que lo escrito en el input del nombre es válido
        $validated_name = true;
   }else{
       $validated_name = false;
       $errors['name'] = 'El nombre no es válido';
   }
   //Email
   if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        //variable que determina que lo escrito en el input del email es válido
        $validated_email = true;
   }else {
       $validated_email = false;
       $errors['email'] = 'El email no es válido';
   }
   //Password
   if(!empty($password)){
        //vaariable que determina que lo escrito en el input de la password no está vacío
        $validated_password = true;
   }else {
       $validated_password = false;
       $errors['password'] = 'La contraseña no puede estar vacía';
   }


  
   
   //variable que controlará que se guarde el usuario o no
   $saved_user = false;
   
   //controlamos que no se haya producido ningún error comprobando que el array de errores esté vacío
   if(count($errors) == 0){
       $saved_user = true;

       
       //ciframos la contraseña
       //le daremos un cost de 4 para cifrarla cuatro veces
       $bcrypted_password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);


       /***********   VERSIÓN DE PREPARED STATEMENT ******************/ 
        // $sql_insert_user = "INSERT INTO users VALUES(null, ?,?,?,'')";

        // if($stmt = $db -> prepare($sql_insert_user)){
        //     //asignamos variables a los blinds (?) del prepared statements
        //     $stmt -> bind_param('sss', $name, $bcrypted_password, $email);

        //     //seteamos las variables con los valores recibios por el form del HTML
        //     $name = $_REQUEST['name'];
        //     $password = $_REQUEST['password'];
        //     $email = $_REQUEST['email'];

        //     //ejecutamos la sentencia
        //     if($stmt -> execute()){
        //         $_SESSION['completed'] = 'El registro se ha completado satisfactoriamente';
        //         send_Mail($email, $name, $from, $subject, $body);
        //     }elseif (isset($email)) {
        //         $_SESSION['errors']['global'] = 'El email ya existe. Prueba con otro';
        //     }else{
        //         $_SESSION['errors']['global'] = 'Error al guardar los datos';
        //     }
        // } 

        //Versión con PDO 
        try{
            $sql_insert_user = "INSERT INTO users (u_name, u_password, u_email)VALUES(:name, :password, :email)";
            $stmt = $db->prepare($sql_insert_user);

            $stmt ->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt ->bindParam(':password',$bcrypted_password, PDO::PARAM_STR);
            $stmt ->bindParam(':email', $email, PDO::PARAM_STR);

            //ejecutamos la sentencias
            if($stmt -> execute()){
                $_SESSION['completed'] = 'El registro se ha completado satisfactoriamente';
                 send_Mail($email, $name, $from, $subject, $body);
            }
                        
            //Gestion de errores de los campos del formulario de registro
        }catch(PDOException $e){
            if (isset($email)) {
                $_SESSION['errors']['global'] = 'El email ya existe. Prueba con otro';
            }else{
                $_SESSION['errors']['global'] = 'Error al guardar los datos';
            }
          $e->getMessage();
        }
       
   }else{ //cuando no exista $_POST o surja cualquier otro error
    $_SESSION['errors'] = $errors;
   }

//    close() para la versión de prepared statement
//    $stmt -> close();
//    $db -> close();
//    var_dump($errors);
}

//redireccionamos a la home una vez se haya completado el proceso de registro
header('Location: index.php');
?>