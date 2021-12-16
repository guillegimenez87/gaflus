<?php session_start();
    $usuario = "root"; //en este caso root por ser localhost
    $password = "";  //contraseña por si tiene algun servicio de hosting 
    $servidor = "localhost"; //localhost por lo del xampp
    $basededatos = "gaflus"; //nombre de la base de datos

$conexion = mysqli_connect  ($servidor,$usuario,"") or die ("Error con el servidor"); 
$db = mysqli_select_db($conexion, $basededatos) or die ("Error al conectarse a la base de datos");

$totalcantidad = 0;
$total_cantidad = 0;
$total = 0;
$carrito_mio[]=array("titulo"=>$total,"precio"=>$total,"cantidad"=>$total);    
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

<title>Carrito de compras</title>
</head>
<body>


<?php 
$carrito_mio=$_SESSION['carrito'];
$_SESSION['carrito']=$carrito_mio;

// contamos nuestro carrito
if(isset($_SESSION['carrito'])){
    for($i=0;$i<=count($carrito_mio)-1;$i ++){
    if($carrito_mio[$i]!=NULL){ 
 //   $total_cantidad = $carrito_mio['cantidad'];
    $total_cantidad = $total;
    $total_cantidad ++ ;
    $totalcantidad += $total_cantidad;
    }}}
?>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-info">
<div class="container-fluid">
    <a class="navbar-brand" href="#">Lista de Productos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="modal" data-bs-target="#modal_cart" style="color: red;"><i class="fas fa-shopping-cart"></i> <?php echo $totalcantidad; ?></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- END NAVBAR -->



<!-- MODAL CARRITO -->
<div class="modal fade" id="modal_cart" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lista de Pedidos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
   
   
     
			<div class="modal-body">
				<div>
					<div class="p-2">
						<ul class="list-group mb-3">
							<?php
							if(isset($_SESSION['carrito'])){
							$total=0;
							for($i=0;$i<=count($carrito_mio)-1;$i ++){
							if($carrito_mio[$i]!=NULL){
						
            ?>
							<li class="list-group-item d-flex justify-content-between lh-condensed">
								<div class="row col-12" >
									<div class="col-6 p-0" style="text-align: left; color: #000000;"><h6 class="my-0">Cantidad de articulos: <?php echo $carrito_mio[$i]['cantidad'] ?> | <?php echo $carrito_mio[$i]['titulo']; // echo substr($carrito_mio[$i]['titulo'],0,10); echo utf8_decode($titulomostrado)."..."; ?></h6>
									</div>
									<div class="col-6 p-0"  style="text-align: right; color: #000000;" >
									<span   style="text-align: right; color: #000000;">$ <?php echo $carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad'];    ?></span>
									</div>
								</div>
							</li>
							<?php
							$total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
							}
							}
							}
							?>
							<li class="list-group-item d-flex justify-content-between">
							<span  style="text-align: left; color: #000000;">PRECIO TOTAL DEL PEDIDO</span>
							<strong  style="text-align: left; color: #000000;">$ <?php
							if(isset($_SESSION['carrito'])){
							$total=0;
							for($i=0;$i<=count($carrito_mio)-1;$i ++){
							if($carrito_mio[$i]!=NULL){ 
							$total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
							}}}
							echo $total; ?></strong>
							</li>
						</ul>
					</div>
				</div>
			</div>
			


      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-primary" href="index.php">Volver a comprar</a>
        <a type="button" class="btn btn-secondary" href="../profile.php">Volver al inicio</a>
        <!--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>-->
        <a type="button" class="btn btn-sm btn-danger" href="borrarcarrito.php">Vaciar carrito de compras</a>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL CARRITO -->





<!-- CONFIRMAR PEDIDO -->
<div class="container mt-5">
<div class="row" style="justify-content: center;">

<div class="form">
        <form action="conexioncompra.php" method="POST">
        <center>

<input type="hidden" name="iddelusuario" value="<?php echo $_SESSION["s_usuario"]?>" required>
<input type="hidden" name="precio" value="<?php echo $total?>" required/>
<input type="hidden" name="estadopedido" value="PENDIENTE PAGO" required>
<br>
       <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="jumbotron">
                        
                        <h1 class="display-4 text-center">CONFIRMACION DE SOLICITUD DE PEDIDO:</h1><br>
                      <h2 class="text-center"># Pedido: <input type="text" name="numerodelpedido" placeholder="33267282000001" required></h2>    
                      <h2 class="text-center">Usuario: <?php echo $_SESSION["s_usuario"];?></h2>    
                      <h2 class="text-center">Precio total: $ <b><?php echo $total?></b></h2><br>
                    <p class="lead text-center">Recuerde que su ID de usuario es su número de DNI.</p>  
                      <p class="lead text-center">Ante cualquier problema sobre los medios de pago o problemas en la acreditacion, por favor contactar a:</p>
                      <p class="lead text-center">soporte@gaflus.com.ar</p>
                      <hr class="my-4">
                      <input type="submit" value="Comprar">          
                      <br><hr class="my-4">                                            <h2 class="display-4 text-center"><a class="btn btn-primary btn-lg" href="../profile.php" role="button">Volver al Perfil de Usuario</a></h2>   
                    </div>
                </div>
            </div>
        </div> 
<br><br>



        </center>
        </form>
</div>


</div>
</div>
<!-- END CONFIRMAR PEDIDO -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>
</html>