<?php 
//iniciamos sesion y conectamos con la BD
require_once 'includes/connection.php';
require_once 'includes/functions.php';
$topic_id = $_GET['id'];
$current_topic = getTopic($db, $topic_id);
$user_id = $_SESSION['user']['u_id'];

if($user_id == $current_topic['u_id']){

    $sql_delete_comment = "DELETE FROM comments WHERE
    u_id = :user_id";
     $stmt = $db -> prepare($sql_delete_comment);
     $stmt -> bindParam(':user_id',$user_id, PDO::PARAM_INT);
     $stmt -> execute();
     header('Location: topic.php?id='.$topic_id);
}
?>



