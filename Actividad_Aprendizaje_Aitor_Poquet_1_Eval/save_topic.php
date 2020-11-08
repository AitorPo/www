<?php 
if(isset($_POST)){
//conectamos con la BD
require_once 'includes/connection.php';

$title = $_POST['title'];
$content = $_POST['content'];
$category_id = $_GET['id'];
$user_id = $_SESSION['user']['u_id'];

//array de errores
$errors = array();

trim($title);
if(strlen($title) == 0){
    $errors['title'] = 'El titulo NO es válido';
}
//
#nos aparece un espacio en blanco en el textarea (no se porque) por eso hacemos trim() 
#para eliminarlo y que funciona el programa correctamente
trim($content);
//
if(strlen($content) == 0){
    $errors['content'] = 'El contenido NO es válido';
}

if(!isset($category_id)){
    header('Location: create_topic.php');
    $errors['cate_id'] = 'La categoría no existe';

}

if(count($errors) == 0){
$sql_insert = "INSERT INTO topics VALUES(null, ?,?, CURDATE(), ?, ?)";
$stmt = $db -> prepare($sql_insert);
$stmt -> bindParam(1, $title, PDO::PARAM_STR );
$stmt -> bindParam(2, $content, PDO::PARAM_STR );
$stmt -> bindParam(3, $category_id, PDO::PARAM_INT );
$stmt -> bindParam(4, $user_id, PDO::PARAM_INT );

$stmt -> execute();
header('Location:index.php');
}else{
    $_SESSION['input_errors'] = $errors;
    header('Location: create_topic.php');

}

}

?>