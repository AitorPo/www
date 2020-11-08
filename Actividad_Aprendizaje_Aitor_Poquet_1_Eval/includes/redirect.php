<!-- GESTIONA AL ACCESO DE LOS USUARIOS A LAS PAGINAS
    SOLO SI ESTAS LOGUEADO PODRAS ACCEDER A LAS PAGINAS QUE TENGAN INLCUIDO
    ESTE FICHERO redirect.php
-->

<?php

if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['user'])){
    header('Location: unidentified.php');
}
?>