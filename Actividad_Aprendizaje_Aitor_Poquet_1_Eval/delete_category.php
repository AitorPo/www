<?php 
//iniciamos sesion y conectamos con la BD
require_once 'includes/connection.php';
require_once 'includes/functions.php';
$category_id = $_GET['id'];
$current_category = getCategory($db, $category_id);
//var_dump($current_category);
$user_rol = $_SESSION['user']['u_rol'];

//SI EL USUARIO ES EL ADMIN MASTER PODRÁ BORRAR TODO LO QUE CONTENGA UNA CATEGORIE.
//INCLUIDOS TOPICS Y COMMENTS
if($user_rol == DB_ADMIN){

    $sql_delete_category = "DELETE FROM categories
    WHERE cate_id = :cate_id";
    
    $stmt = $db -> prepare($sql_delete_category);
    $stmt -> bindParam(':cate_id',$category_id, PDO::PARAM_INT);
    $stmt -> execute();

    $sql_delete_category_topics = "DELETE top.*, comm.* FROM topics top
    INNER JOIN comments comm ON top.to_id = comm.to_id
    WHERE top.cate_id = :cate_id";
    $stmt = $db -> prepare($sql_delete_category_topics);
    $stmt -> bindParam(':cate_id',$category_id, PDO::PARAM_INT);
    $stmt -> execute();   

    header('Location: categories.php');
}
?>