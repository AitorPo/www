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
if(empty($title)){
    $errors['title'] = 'El titulo NO es válido';
}
//
#nos aparece un espacio en blanco en el textarea (no se porque) por eso hacemos trim() 
#para eliminarlo y que funciona el programa correctamente
trim($content);
//
if(empty($content)){
    $errors['content'] = 'El contenido NO es válido';
}




if(count($errors) == 0){
    if(isset($_GET['edit'])){
        $topic_id = $_GET['edit'];
        $user_id = $_SESSION['user']['u_id'];

        $sql_update = "UPDATE topics SET to_title = :title, to_content = :content
        WHERE to_id = :topic_id AND u_id = :user_id"; 
        $stmt = $db -> prepare($sql_update);
        $stmt -> bindParam(':title', $title, PDO::PARAM_STR);
        $stmt -> bindParam(':content', $content, PDO::PARAM_STR);
        $stmt -> bindParam(':topic_id',$topic_id,PDO::PARAM_INT);
        $stmt -> bindParam(':user_id',$user_id, PDO::PARAM_INT);

       
    }else{
        $sql_insert = "INSERT INTO topics VALUES(null, ?,?, CURDATE(), ?, ?)";
        $stmt = $db -> prepare($sql_insert);
        $stmt -> bindParam(1, $title, PDO::PARAM_STR );
        $stmt -> bindParam(2, $content, PDO::PARAM_STR );
        $stmt -> bindParam(3, $category_id, PDO::PARAM_INT );
        $stmt -> bindParam(4, $user_id, PDO::PARAM_INT );
      
         
    }
    $stmt -> execute();
    header('Location:index.php');
   
}else{
    $_SESSION['input_errors'] = $errors;
    //redireccion a la misma pagina en la que estabamos si ha ocurrido algun error
   
    if(isset($_GET['edit'])){
        header('Location: edit_topic.php?id='.$_GET['edit']);
    }else{
        header('Location: create_topic.php');
    }
}

}

?>