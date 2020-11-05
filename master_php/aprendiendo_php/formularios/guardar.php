<?php
#recogemos los datos que nos llegan por POST mediante la variable superglobar $_POST
#usamos POST porque es mas privado que GET. Ya que en GET se ven los datos por URL y se pueden modificar

if (isset($_POST['titulo']) && isset($_POST['descripcion'])) {
    echo '<h1>'.$_POST['titulo'].'</h1>';
    echo '<h2>'.$_POST['descripcion'].'</h2>';
}
?>