<?php 
//iniciamos sesion y conectamos con la BD
require_once 'includes/connection.php';
require_once 'includes/functions.php';

$current_topic = getTopic($db, $_GET['id']);
//var_dump($current_topic); die();
if($_SESSION['user']['u_id'] == $current_topic['u_id']){
    $topic_id = $_GET['id'];
    $user_id = $_SESSION['user']['u_id'];
    
    // var_dump($topic_id, $user_id, $_SESSION['user']); die();
    $sql_delete_topic = "DELETE FROM topics  
        WHERE to_id = :topic_id
        AND u_id = :user_id";
        $stmt = $db -> prepare($sql_delete_topic);
        $stmt -> bindParam(':topic_id',$topic_id, PDO::PARAM_INT);
        $stmt -> bindParam(':user_id',$user_id, PDO::PARAM_INT);
        $stmt -> execute();

    $sql_delete_comment = "DELETE FROM comments
    WHERE to_id = :topic_id
    AND u_id = :user_id";   
    $stmt = $db -> prepare($sql_delete_comment);
    $stmt -> bindParam(':topic_id',$topic_id, PDO::PARAM_INT);
    $stmt -> bindParam(':user_id',$user_id, PDO::PARAM_INT);
    $stmt -> execute();

    //si el usuario no tiene rol 0 sera admin. rol 2 es el admin de entradas.
}elseif($_SESSION['user']['u_rol'] == TOPIC_ADMIN){
    $topic_id = $_GET['id'];
    
    
    $sql_delete_topic = "DELETE FROM topics  
    WHERE to_id = :topic_id";
    $stmt = $db -> prepare($sql_delete_topic);
    $stmt -> bindParam(':topic_id',$topic_id, PDO::PARAM_INT);
    $stmt -> execute();

    $sql_delete_comment = "DELETE FROM comments  
    WHERE to_id = :topic_id";
    $stmt = $db -> prepare($sql_delete_comment);
    $stmt -> bindParam(':topic_id',$topic_id, PDO::PARAM_INT);
    $stmt -> execute();

}

header('Location: index.php');
?>