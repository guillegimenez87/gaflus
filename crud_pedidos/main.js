$(document).ready(function(){
    tablaPedidos = $("#tablaPedidos").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
       }],
        
        //Para cambiar el lenguaje a español
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 (de un total de 0 registros)",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
$("#btnNuevo").click(function(){
    $("#formPedidos").trigger("reset");
    $(".modal-header").css("background-color", "#28a745");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo Pedido");            
    $("#modalCRUD").modal("show");        
    id=null;
    opcion = 1; //alta
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    usuario = fila.find('td:eq(1)').text();
    idInventario = parseInt(fila.find('td:eq(2)').text());
    cantidadxpedido = parseInt(fila.find('td:eq(3)').text());
    estado = fila.find('td:eq(4)').text();

    $("#usuario").val(usuario);
    $("#idInventario").val(idInventario);
    $("#cantidadxpedido").val(cantidadxpedido);
    $("#estado").val(estado);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Pedido");            
    $("#modalCRUD").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
                tablaPedidos.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formPedidos").submit(function(e){
    e.preventDefault();    
    usuario = $.trim($("#usuario").val());
    idInventario = $.trim($("#idInventario").val());
    cantidadxpedido = $.trim($("#cantidadxpedido").val());
    estado = $.trim($("#estado").val());    
    $.ajax({
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data: {usuario:usuario, idInventario:idInventario, cantidadxpedido:cantidadxpedido, estado:estado, id:id, opcion:opcion},
        success: function(data){  
            console.log(data);
            id = data[0].id;            
            usuario = data[0].usuario;
            idInventario = data[0].idInventario;
            cantidadxpedido = data[0].cantidadxpedido;
            estado = data[0].estado;
            if(opcion == 1){tablaPedidos.row.add([id,usuario,idInventario,cantidadxpedido,estado]).draw();}
            else{tablaPedidos.row(fila).data([id,usuario,idInventario,cantidadxpedido,estado]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
});