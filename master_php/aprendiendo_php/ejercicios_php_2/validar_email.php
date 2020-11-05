<?php
/*
Hacer una funcion para validar un email confilter_var recogiendo una variable por get y validandola para mostrar el resultado por pantalla
*/
function validarEmail($email){
    $status = 'No válido';
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $status = 'Válido';
    }

    return $status;
}

if (isset($_GET['email'])) {
    echo validarEmail($_GET['email']);
}else {
    echo 'Pasa por get/url un email...';
}

?>