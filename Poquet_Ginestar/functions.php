<?php 

function countRows($db){
    $sql = "SELECT count(*) AS 'filas' FROM productos";
    $stmt = $db->prepare($sql);
    $stmt -> execute();
    
    $number = $stmt -> fetch(PDO::FETCH_ASSOC);
    //var_dump($parques);
    //die();
    return $number;
}

function getClientes($db){
    $sql = "SELECT * FROM clientes";
    $stmt = $db->prepare($sql);
    $stmt -> execute();
    
    $clientes = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    //var_dump($parques);
    //die();
    return $clientes;
}

function getCLiente($db, $id){
    $sql = "SELECT * FROM clientes WHERE idCliente = :id";
    $stmt = $db->prepare($sql);    
    $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
    $stmt -> execute();

    $cliente = $stmt -> fetch(PDO::FETCH_ASSOC);
    
    return $cliente;
}

function getProducto($db, $id){
    $sql = "SELECT * FROM productos WHERE idProducto = :id";
    $stmt = $db->prepare($sql);    
    $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
    $stmt -> execute();

    $producto = $stmt -> fetch(PDO::FETCH_ASSOC);
    
    return $producto;
}

function getProductosLimit($db, $start, $ipp){
    $sql = "SELECT p.idProducto, p.Nombre, p.Precio, c.Descripcion AS 'categoria'FROM productos p 
    INNER JOIN categorias c 
    ON p.idCategoria = c.idCategoria 
    LIMIT :start, :ipp";
    $stmt = $db->prepare($sql);
    $stmt -> bindParam(':start', $start, PDO::PARAM_INT);
    $stmt -> bindParam(':ipp', $ipp, PDO::PARAM_INT);
    $stmt -> execute();
    
    $productos = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    //var_dump($parques);
    //die();
    return $productos;
}

function getProductos($db){
    $sql = "SELECT p.idProducto, p.Nombre, p.Precio, c.Descripcion AS 'categoria'FROM productos p 
    INNER JOIN categorias c 
    ON p.idCategoria = c.idCategoria";
    $stmt = $db->prepare($sql);
    $stmt -> execute();
    
    $productos = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    //var_dump($parques);
    //die();
    return $productos;
}

function getEmpleados($db){
    $sql = "SELECT * FROM empleados";
    $stmt = $db->prepare($sql);
    $stmt -> execute();
    
    $empleados = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    //var_dump($parques);
    //die();
    return $empleados;
}

function getEmpleado($db, $id){
    $sql = "SELECT * FROM empleados WHERE idEmpleado = :id";
    $stmt = $db->prepare($sql);    
    $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
    $stmt -> execute();

    $empleado = $stmt -> fetch(PDO::FETCH_ASSOC);
    
    return $empleado;
}


function getIdCategoria($db, $descripcion){
    $sql = "SELECT idCategoria FROM categorias WHERE Descripcion = :descripcion";
    $stmt = $db->prepare($sql);    
    $stmt -> bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
    $stmt -> execute();

    $id = $stmt -> fetch(PDO::FETCH_ASSOC);
    
    return $id;

}

function getCategorias($db){
    $sql = "SELECT * FROM categorias";
    $stmt = $db->prepare($sql);
    $stmt -> execute();
    
    $categorias = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    //var_dump($categorias);
    //die();
    return $categorias;
}



?>