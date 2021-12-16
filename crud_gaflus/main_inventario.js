$(document).ready(function(){
    tablaInventario = $("#tablaInventario").DataTable({
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
    $("#formInventario").trigger("reset");
    $(".modal-header").css("background-color", "#28a745");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo Producto");            
    $("#modalCRUD").modal("show");        
    id=null;
    opcion = 1; //alta
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    //descripcion = fila.find('td:eq(1)').text();
    stock = parseInt(fila.find('td:eq(1)').text());
    //cantidadxinventario = fila.find('td:eq(4)').text();

    $("#descripcion").val(descripcion);
    $("#stock").val(stock);
    $("#cantidadxinventario").val(cantidadxinventario);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Actualizar Stock");            
    $("#modalCRUD").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id_inventario = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id_inventario+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud_inventario.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id_inventario:id_inventario},
            success: function(){
                tablaInventario.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formInventario").submit(function(e){
    e.preventDefault();    
    descripcion = $.trim($("#descripcion").val());
    stock = $.trim($("#stock").val());
    cantidadxinventario = $.trim($("#cantidadxinventario").val());    
    $.ajax({
        url: "bd/crud_inventario.php",
        type: "POST",
        dataType: "json",
        data: {descripcion:descripcion, stock:stock, cantidadxinventario:cantidadxinventario, id_inventario:id_inventario, opcion:opcion},
        success: function(data){  
            console.log(data);
            id_inventario = data[0].id_inventario;            
            descripcion = data[0].descripcion;
            stock = data[0].stock;
            cantidadxinventario = data[0].cantidadxinventario;
            if(opcion == 1){tablaInventario.row.add([id_inventario,descripcion,stock,cantidadxinventario]).draw();}
            else{tablaInventario.row(fila).data([id_inventario,descripcion,stock,cantidadxinventario]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
});