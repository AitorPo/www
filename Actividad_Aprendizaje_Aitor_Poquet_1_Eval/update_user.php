<?php
if(isset($_POST)){
	require_once 'includes/connection.php';

	//recogemos los valores de los input
	$user = $_SESSION['user'];
	$email = $user['u_email'];
	$name = $user['u_name'];
	$id = $user['u_id'];
	$new_email = $_POST['new_email'];
	$new_name = $_POST['new_name'];	

	// Array de errores
	$errors = array();
	
	// Validar los datos antes de guardarlos en la base de datos
	// Validar campo nombre
	if(!empty($name) && !is_numeric($name)){
		$validated_name = true;
	}else{
		$validated_name = false;
		$errors['name'] = "El nombre no es válido";
	}
	
	// Validar el email
	if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
		$validated_email = true;
	}else{
		$validated_email = false;
		$errors['email'] = "El email no es válido";
	}
	
	// $guardar_usuario = false;
    var_dump($errors);
    
	if(count($errors) == 0){
		
		// $guardar_usuario = true;
		
		// COMPROBAR SI EL USUARIO EXISTE
		$sql_select = "SELECT * FROM users where u_email = :email";
		$stmt = $db -> prepare($sql_select);
		$stmt -> bindParam(':email', $email, PDO::PARAM_STR);
		$stmt -> execute();

		$data = $stmt -> fetch(PDO::FETCH_ASSOC);
		
		//COMPROBAR SI EL NUEVO EMAIL YA EXISTE
		$sql_count = "SELECT 1 FROM users WHERE u_email = :email";
		$query = $db -> prepare($sql_count);
		$query -> bindParam(':email', $new_email, PDO::PARAM_STR);
		$query -> execute();

		$count = $query -> rowCount();

		//COMPROBAR SI EL NUEVO EMAIL YA EXISTE
		$sql_count_name = "SELECT 1 FROM users WHERE u_name = :name";
		$query_name = $db -> prepare($sql_count_name);
		$query_name -> bindParam(':name', $new_name, PDO::PARAM_STR);
		$query_name -> execute();

		$count_name = $query_name -> rowCount();
		
		// var_dump($data['u_email']);
		// var_dump($email);
		// var_dump($new_email);
		var_dump($count);
		var_dump($data);

		var_dump($count_name);


		if($data['u_id'] == $id && strlen($new_email) > 0 && $count == 0 && $count_name == 0|| !$data){
			// ACTULIZAR USUARIO EN LA TABLA USUARIOS DE LA BBDD
	
			$sql_update = "UPDATE users SET u_name = :name ,u_email = :email WHERE u_id = :id";
			$update = $db -> prepare($sql_update);
			$update -> bindParam(':name',$new_name, PDO::PARAM_STR);
			$update -> bindParam(':email',$new_email, PDO::PARAM_STR);
			$update -> bindParam(':id', $id, PDO::PARAM_INT);
			$result = $update -> execute();

			var_dump($result);
			var_dump($new_email);
			var_dump($new_name);
			

			// var_dump($email, $new_email);
			// die();
			if($result && $email != $new_email && !empty($new_email) && $name != $new_name && !empty($new_name) && $count == 0){
				$_SESSION['user']['u_name'] = $new_name;
				$_SESSION['user']['u_email'] = $new_email;
				$_SESSION['completed'] = "Datos actualizados";	
			}

		}elseif($count > 0 || !$data){
			$_SESSION['errors']['global'] = "Email inválido o en uso";

		}elseif($count_name > 0 || !$data){
			$_SESSION['errors']['global'] = "Nombre de usuario inválido o en uso";

		}else{
			$_SESSION['errors']['global'] = "¡Campos vacíos!";
		}

		
		
	}else{
		$_SESSION['errors'] = $errors;
	}
}

header('Location: my_profile.php');

