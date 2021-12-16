<?php session_start();
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
        <a type="button" class="btn btn-primary" href="confirmarpedido.php">Confirmar compra</a>
        <a type="button" class="btn btn-secondary" href="../profile.php">Volver al inicio</a>
        <!--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>-->
        <a type="button" class="btn btn-sm btn-danger" href="borrarcarrito.php">Vaciar carrito de compras</a>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL CARRITO -->


<!-- ARTICULOS -->
<div class="container mt-5">
<div class="row" style="justify-content: center;">

<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="carritodecompras.php">
        <input name="precio" type="hidden" id="precio" value="399" />
        <input name="titulo" type="hidden" id="titulo" value="Barbijo Reutilizable KN95 x10" />
        <img src="img/01_id.png" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Barbijo Reutilizable KN95</h5>
                        <p class="card-text">(10 unidades) - Precio $399</p>
                        <input name="cantidad" type="text" id="cantidad" value="1" class="pl-2" />
                        <br><br>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al pedido</button>
                </div>
        </form>
</div>

<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="carritodecompras.php">
        <input name="precio" type="hidden" id="precio" value="749" />
        <input name="titulo" type="hidden" id="titulo" value="Barbijo Descartable ANMAT x100" />
        <img src="img/02_id.png" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Barbijo Descartable ANMAT</h5>
                        <p class="card-text">(100 unidades) - Precio $749</p>
                        <input name="cantidad" type="text" id="cantidad" value="1" class="pl-2" />
                        <br><br>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al pedido</button>
                </div>
        </form>
</div>

<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="carritodecompras.php">
        <input name="precio" type="hidden" id="precio" value="522" />
        <input name="titulo" type="hidden" id="titulo" value="Limpiador Cif Liquido Vidrios Bidon (5 lt)" />
        <img src="img/03_id_1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Limpiador Cif Liquido Vidrios Bidon</h5>
                        <p class="card-text">(5 lt) - Precio $522</p>
                        <input name="cantidad" type="text" id="cantidad" value="1" class="pl-2" />
                        <br><br>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al pedido</button>
                </div>
        </form>
</div>

<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="carritodecompras.php">
        <input name="precio" type="hidden" id="precio" value="1632" />
        <input name="titulo" type="hidden" id="titulo" value="Limpiador Desinfectante Cif Peroxido De Hidrogeno Bidon (5 lt)" />
        <img src="img/04_id_1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Limpiador Cif Liquido Vidrios Bidon</h5>
                        <p class="card-text">(5 lt) - Precio $1632</p>
                        <input name="cantidad" type="text" id="cantidad" value="1" class="pl-2" />
                        <br><br>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al pedido</button>
                </div>
        </form>
</div>
<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="carritodecompras.php">
        <input name="precio" type="hidden" id="precio" value="839" />
        <input name="titulo" type="hidden" id="titulo" value="Detergente Ala Ultra Sintetico Biodegradable Bidon (5 lt)" />
        <img src="img/05_id_1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Detergente Ala Ultra Sintetico Biodegradable Bidon</h5>
                        <p class="card-text">(5 lt) - Precio $839</p>
                        <input name="cantidad" type="text" id="cantidad" value="1" class="pl-2" />
                        <br><br>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al pedido</button>
                </div>
        </form>
</div>
<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="carritodecompras.php">
        <input name="precio" type="hidden" id="precio" value="93" />
        <input name="titulo" type="hidden" id="titulo" value="Limpiador para Pisos Cif 4 en 1 Lavanda y Orquídeas (750 ml)" />
        <img src="img/06_id_1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Limpiador para Pisos Cif 4 en 1 Lavanda y Orquídeas</h5>
                        <p class="card-text">(750 ml) - Precio $93</p>
                        <input name="cantidad" type="text" id="cantidad" value="1" class="pl-2" />
                        <br><br>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al pedido</button>
                </div>
        </form>
</div>
<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="carritodecompras.php">
        <input name="precio" type="hidden" id="precio" value="66" />
        <input name="titulo" type="hidden" id="titulo" value="Limpiador para Pisos Cif 4 en 1 Lavanda y Orquídeas Repuesto (450 ml)" />
        <img src="img/07_id_1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Limpiador para Pisos Cif 4 en 1 Lavanda y Orquídeas Repuesto</h5>
                        <p class="card-text">(450 ml) - Precio $66</p>
                        <input name="cantidad" type="text" id="cantidad" value="1" class="pl-2" />
                        <br><br>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al pedido</button>
                </div>
        </form>
</div>
<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="carritodecompras.php">
        <input name="precio" type="hidden" id="precio" value="236" />
        <input name="titulo" type="hidden" id="titulo" value="Paño Absorbente Cif Ballerina Multiuso (3 unidades)" />
        <img src="img/08_id_1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Paño Absorbente Cif Ballerina Multiuso</h5>
                        <p class="card-text">(3 unidades) - Precio $236</p>
                        <input name="cantidad" type="text" id="cantidad" value="1" class="pl-2" />
                        <br><br>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al pedido</button>
                </div>
        </form>
</div>
<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="carritodecompras.php">
        <input name="precio" type="hidden" id="precio" value="117" />
        <input name="titulo" type="hidden" id="titulo" value="Limpiador Vim Multisuperficies Desinfección Avanzada con Lavandina-Cloro Gatillo (500 ml)" />
        <img src="img/09_id_1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Limpiador Vim Multisuperficies Desinfección Avanzada con Lavandina-Cloro Gatillo</h5>
                        <p class="card-text">(500 ml) - Precio $117</p>
                        <input name="cantidad" type="text" id="cantidad" value="1" class="pl-2" />
                        <br><br>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al pedido</button>
                </div>
        </form>
</div>
<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="carritodecompras.php">
        <input name="precio" type="hidden" id="precio" value="96" />
        <input name="titulo" type="hidden" id="titulo" value="Lavandina en Gel Vim Lavanda (700 ml)" />
        <img src="img/10_id_1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Lavandina en Gel Vim Lavanda</h5>
                        <p class="card-text">(700 ml) - Precio $96</p>
                        <input name="cantidad" type="text" id="cantidad" value="1" class="pl-2" />
                        <br><br>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al pedido</button>
                </div>
        </form>
</div>
<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="carritodecompras.php">
        <input name="precio" type="hidden" id="precio" value="96" />
        <input name="titulo" type="hidden" id="titulo" value="Lavandina en Gel Vim Citrus (700 ml)" />
        <img src="img/11_id_1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Lavandina en Gel Vim Citrus</h5>
                        <p class="card-text">(700 ml)- Precio $96</p>
                        <input name="cantidad" type="text" id="cantidad" value="1" class="pl-2" />
                        <br><br>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al pedido</button>
                </div>
        </form>
</div>
<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="carritodecompras.php">
        <input name="precio" type="hidden" id="precio" value="157" />
        <input name="titulo" type="hidden" id="titulo" value="Gatillo Cif Limpiador Liquido Antibacterial 2 en 1 (500 ml)" />
        <img src="img/12_id_1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Gatillo Cif Limpiador Liquido Antibacterial 2 en 1 </h5>
                        <p class="card-text">(500 ml) - Precio $157</p>
                        <input name="cantidad" type="text" id="cantidad" value="1" class="pl-2" />
                        <br><br>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al pedido</button>
                </div>
        </form>
</div>
<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="carritodecompras.php">
        <input name="precio" type="hidden" id="precio" value="74" />
        <input name="titulo" type="hidden" id="titulo" value="Limpiador Cif 2 en 1 Antibacterial Recarga (450 ml)" />
        <img src="img/13_id_1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Limpiador Cif 2 en 1 Antibacterial Recarga</h5>
                        <p class="card-text">(450 ml) - Precio $74</p>
                        <input name="cantidad" type="text" id="cantidad" value="1" class="pl-2" />
                        <br><br>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al pedido</button>
                </div>
        </form>
</div>
<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="carritodecompras.php">
        <input name="precio" type="hidden" id="precio" value="158" />
        <input name="titulo" type="hidden" id="titulo" value="Limpiador Cif Liquido Pisos Plastificados y Flotantes (750 ml)" />
        <img src="img/14_id_1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Limpiador Cif Liquido Pisos Plastificados y Flotantes</h5>
                        <p class="card-text">(750 ml) - Precio $158</p>
                        <input name="cantidad" type="text" id="cantidad" value="1" class="pl-2" />
                        <br><br>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al pedido</button>
                </div>
        </form>
</div>
<div class="card m-4" style="width: 18rem;">
        <form id="formulario" name="formulario" method="post" action="carritodecompras.php">
        <input name="precio" type="hidden" id="precio" value="745" />
        <input name="titulo" type="hidden" id="titulo" value="Limpiador Cif Liquido Pisos Plastificados y Flotantes Repuesto (450 ml)" />
        <img src="img/15_id_1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                        <h5 class="card-title">Limpiador Cif Liquido Pisos Plastificados y Flotantes Repuesto</h5>
                        <p class="card-text">(450 ml) - Precio $745</p>
                        <input name="cantidad" type="text" id="cantidad" value="1" class="pl-2" />
                        <br><br>
                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al pedido</button>
                </div>
        </form>
</div>
<!-- END LIST ARTICULOS -->

</div>
</div>
<!-- END ARTICULOS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>
</html>