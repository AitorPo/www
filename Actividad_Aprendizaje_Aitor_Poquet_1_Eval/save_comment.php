<?php 
if(isset($_POST)){
//conectamos a la BD
require_once 'includes/connection.php';

//creamos variables
$content = $_POST['content'];
$user_id = $_SESSION['user']['u_id'];
$topic_id = $_GET['id'];
$errors = array();

if(empty($content)){
    $_SESSION['input_errors'] = "El comentario está vacío";
}

if(count($errors) == 0){
    $sql = "INSERT INTO comments VALUES (null, :content, CURDATE(), :to_id, :u_id);";
    $stmt = $db->prepare($sql);
    $stmt -> bindParam(':content',$content, PDO::PARAM_STR);
    $stmt -> bindParam(':to_id',$topic_id, PDO::PARAM_INT);
    $stmt -> bindParam(':u_id',$user_id, PDO::PARAM_INT);
    
    $stmt -> execute();
    header('Location: topic.php?id='.$topic_id);
}

}else{
    $_SESSION['input_errors'] = $errors;
}

?>