<!--estamos obligados a avisar del uso de cookies
ya que estas guardan ciertos datos para identificar y rastrear que
usuarios vuelven a la web. Las cookies existen aunque el navegador este cerrado
y se guardan tanto en nuestro equipo (mediante ficheros en nuestro disco duro que el usuario puede modificar)
como en el servidor. Son los famosos "Recordar contraseña/usuario/cuenta...)
Las cookies se tienen que pasar al servidor siempre que se cargue la pagina
-->

<?php
//creamos la cookie
//setcookie('valor', 'Valor que solo puede ser texto', caducidad);

//cookie convencional/básica. Sin caducidad
setcookie('mi_cookie', 'Valor de mi_cookie');

//cookie con caducidad/expiracion
//60*60*24*365 --> operacion para calcular la duracion de un año
setcookie('one_year', 'valor de la cookie de 365 días', time() + (60*60*24*365));

header('Location: ver_cookies.php');

?>
