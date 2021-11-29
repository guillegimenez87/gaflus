<?php
session_start();
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de los datos enviados mediante POST desde el JS (ajax)
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

$pass = md5($password); //encripto la clave enviada por el usuario para compararla con la clava encriptada y almacenada en la BD

// $consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$pass' ";
$consulta = "SELECT usuarios.idRol AS idRol, roles.descripcion AS rol FROM usuarios JOIN roles ON usuarios.idRol = roles.id WHERE usuario='$usuario' AND password='$pass' ";    
$resultado = $conexion->prepare($consulta);
$resultado->execute();

if($resultado->rowCount() >= 1){
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["s_usuario"] = $usuario;
    $_SESSION["s_nombre"] = $data[0]["nombre"];
    $_SESSION["s_direccion"] = $data[0]["direccion"];
    $_SESSION["s_idRol"] = $data[0]["idRol"];
    $_SESSION["s_rol_descripcion"] = $data[0]["rol"];
}else{
    $_SESSION["s_usuario"] = null;
    $data=null;
}

print json_encode($data); //envio el array final el formato json a AJAX
$conexion=null;

// Acceso de usuarios cargados
// ADMIN: usuario:admin - pass:12345
// OPERARIO: usuario:demo - pass:demo
// USER: cargar de la tabla "clientes"