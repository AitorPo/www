<?php 

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