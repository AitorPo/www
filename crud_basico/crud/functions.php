<?php
function getParques($db){
    $sql = "SELECT p.nombre AS 'nombre', c.nombre AS 'ciudad' FROM parque p 
    INNER JOIN ciudad c ON 
    p.id_ciudad = c.id_ciudad";
    $stmt = $db->prepare($sql);
    $stmt -> execute();
    
    $parques = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    //var_dump($parques);
    //die();
    return $parques;
}

function getCiudades($db){
    $sql = "SELECT id_ciudad, nombre FROM ciudad";
    $stmt = $db->prepare($sql);
    $stmt -> execute();
    
    $ciudades = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    return $ciudades;
}

function getIdCiudad($db, $nombre){
    $sql = "SELECT id_ciudad FROM ciudad WHERE nombre = :ciudad";
    $stmt = $db->prepare($sql);    
    $stmt -> bindParam(':ciudad', $nombre, PDO::PARAM_STR);
    $stmt -> execute();

    $id = $stmt -> fetch(PDO::FETCH_ASSOC);
    
    return $id;

}

function getParque($db, $nombre){
    $sql = "SELECT * FROM parque WHERE nombre = :nombre";
    $stmt = $db->prepare($sql);    
    $stmt -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt -> execute();

    $parque = $stmt -> fetch(PDO::FETCH_ASSOC);
    
    return $parque;
}
?>