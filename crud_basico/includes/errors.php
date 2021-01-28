<?php 


/*mostramos los errores que se generen pasando dos parametros
*$errors = array donde almacenaremos los errores que surjan durante las sesiones
*$field = campo, generalmente del input html, sobre el que se produce el error
*/
function showErrors($errors, $field){
    $alert = '';
    if(isset($errors[$field]) && !empty($field)){
        $alert = "<div class='alert alert-error'>".$errors[$field].'</div>';
    }
    return $alert;
}
#borramos los errores de todas las sesiones que se abran
function deleteErrors(){
    if(isset($_SESSION['errors'])){
        unset($_SESSION['errors']);
    }

    if(isset($_SESSION['input_errors'])){
        unset($_SESSION['input_errors']);
    }

    if(isset($_SESSION['error_login'])){
        unset($_SESSION['error_login']);
    }

    if(isset($_SESSION['completed'])){
        unset($_SESSION['completed']);
    }
}
?>