<?php 

if (isset($_POST)){
require_once 'includes/connection.php';


$category_name = $_POST['category_name'];
$category_desc = $_POST['category_desc'];
$errors = array();

trim($category_name);
trim($category_desc);


if(strlen($category_name) == 0){
    $errors['category_name'] = "El nombre de la categoría no es válido";
}

if(strlen($category_desc) == 0){
    $errors['category_desc'] = "La descricpión de la categoría no es válida";
}

if(count($errors) == 0 ){
    $sql_insert = "INSERT INTO categories VALUES(null, ?,?)";
    $stmt = $db -> prepare($sql_insert);
    $stmt -> bindParam(1 ,$category_name, PDO::PARAM_STR );
    $stmt -> bindParam(2, $category_desc, PDO::PARAM_STR);
    $stmt -> execute();
    header('Location: categories.php');

}else{
    $_SESSION['input_errors'] = $errors;
    header('Location: create_category.php');

}

}
?>