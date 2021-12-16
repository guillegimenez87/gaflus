<?php
    $usuario = "root"; //en este caso root por ser localhost
    $password = "";  //contraseña por si tiene algun servicio de hosting 
    $servidor = "localhost"; //localhost por lo del xampp
    $basededatos = "gaflus"; //nombre de la base de datos

$conexion = mysqli_connect  ($servidor,$usuario,"") or die ("Error con el servidor"); 
$db = mysqli_select_db($conexion, $basededatos) or die ("Error al conectarse a la base de datos");

    $numerodelpedido=$_POST['numerodelpedido']; 
    $iddelusuario=$_POST['iddelusuario']; 
    $precio=$_POST['precio']; 
    $estadopedido=$_POST['estadopedido']; 

    $sql="INSERT INTO pedidos VALUES ('$numerodelpedido','$iddelusuario','$precio','$estadopedido')";
    //$sql2="UPDATE usuarios SET cantidadxpedidos=cantidadxpedidos+1 WHERE usuario ='23146789' ";
    
    $ejecutar=mysqli_query($conexion, $sql);

    if(!$ejecutar){
    	 echo '<script>alert("Error. Si la falla persiste, consulte via email al administrador del sistema")</script> ';
         echo "<script>location.href='index.php'</script>";	
    }else{
        echo '<script>alert("Pedido realizado! En breve le llegara a su correo los detalles del pago para abonar. Gracias por elegir GAFLUS S.A.")</script> ';
        echo "<script>location.href='index.php'</script>";	
    }
?>﻿