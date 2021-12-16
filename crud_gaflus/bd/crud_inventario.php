<?php
include_once '../bd/conexion_inventario.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS   

$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
$stock = (isset($_POST['stock'])) ? $_POST['stock'] : '';
$cantidadxinventario = (isset($_POST['cantidadxinventario'])) ? $_POST['cantidadxinventario'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';

switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO inventario (id, descripcion, stock, cantidadxinventario, preciounitario) VALUES('$descripcion', '$stock', '$cantidadxinventario', '$cantidadxinventario')";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT id, descripcion, stock, cantidadxinventario, preciounitario FROM inventario ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2: //modificación
        $consulta = "UPDATE inventario SET descripcion='$descripcion', stock='$stock', cantidadxinventario ='$cantidadxinventario' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT id, descripcion, stock, cantidadxinventario, preciounitario FROM inventario WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;        
    case 3://baja
        $consulta = "DELETE FROM inventario WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;
