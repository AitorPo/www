<?php
#para borrar una cookie tenemos que CADUCARLA manualmente. Si no NO SE BORRARÁ
if ($_COOKIE['mi_cookie']) {
    unset($_COOKIE['mi_cookie']);
    #time() - 100 para restar tiempo a la fecha actual (en la que estamos en el momento de ejecutar time())
    #para pasar la cookie de tiempo y asi caducarla
    setcookie('mi_cookie', '', time() - 100);
}

//funcion para modificar los header y cambiar sus parametros

//con Location podemos hacer redirecciones entre las paginas sin que cambie la URL
header('Location: ver_cookies.php');
?>

