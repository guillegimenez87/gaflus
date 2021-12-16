<?php
include_once '/bd/conexion.php';
session_start();
$filtrarusuario = $_SESSION["s_usuario"];

$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id, usuario, preciototal, estado FROM pedidos WHERE usuario ='$filtrarusuario' ";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />  
    <title>Pedidos a Glafus S.A.</title>
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="main.css">  
      
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">       
  </head>
    
  <body> 
     <header>
<!--         <h3 class="text-center text-light">Glafus</h3>-->
         <h4 class="text-center text-light"><a href="../profile.php">VOLVER AL PERFIL</a> - <span class="badge badge-danger">PEDIDOS</span> </h4> 
         <br>
         <h4 class="text-center text-light">Tu lista de pedidos en GAFLUS es:</h4> <br>
     </header>    
      
    <br>  
    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaPedidos" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th># PEDIDO</th>
                                <th>ID del Cliente</th>                              
                                <th>Precio final</th>
                                <th>Estado de entrega</th>  
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id'] ?></td>
                                <td><?php echo $dat['usuario'] ?></td>
                                <td><?php echo $dat['preciototal'] ?></td>
                                <td><?php echo $dat['estado'] ?></td>    
                                <td></td>
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>    
 
    <div class="container" align="center">
<!--   GRAFICA DE LOS ESTADOS DE ENVIO DEL PEDIDO -->
<img class="img-profile rounded-circle" src="workflow.png">
    </div>
      
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
     
    <script type="text/javascript" src="main.js"></script>  
    
    
  </body>
</html>
