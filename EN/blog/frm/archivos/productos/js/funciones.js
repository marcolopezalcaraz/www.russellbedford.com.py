function agregarProducto(){
    var formData = new FormData(document.getElementById("formPrograma"));
    $.ajax({
        url: "php/agregar.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(res){
            $("#mensajes").html(res);
            limpiarCampos()
        },
        error: function(e){
            $("#mensajes").html("Error:"+e.status);
        }
    })
}


function limpiarCampos(){
    document.getElementById("formPrograma").reset();
}

function buscarNombreProducto(){
    var datosFormulario= $("#formBuscar").serialize();
    $.ajax({
        type:'POST',
        url:'php/buscarNombre.php',
        data:datosFormulario,
        dataType:'json',
        beforeSend:function(objeto){
            $("#mensajes").html("Enviar datos al servidor...");
            $("#contenidoBusqueda").css("display","none");
        },
        success:function(json){
            $("#mensajes").html(json.mensaje);
            $("#contenidoBusqueda").html(json.contenido);
            $("#contenidoBusqueda").fadeIn("slow");
            $("tbody tr").on("click",function(){
                var codigo=$(this).find("td:first").html();
                $("#panelBuscar").html("");
                $("#codigo").val(codigo);
                buscarIdProducto();
                $("#buscar").fadeOut("slow");
                $("#panelPrograma").fadeIn("slow");
                
            });
        },
        error: function(error){
            $("#mensajes").html("Error:"+error.responseText);
        }
    });
    
}

function buscarIdProducto(){
    var datosFormulario= $("#formPrograma").serialize();
    $.ajax({
        type:'POST',
        url:'php/buscarId.php',
        data:datosFormulario,
        dataType:'json',
        beforeSend:function(objeto){
            $("#mensajes").html("Enviar datos al servidor...");
        },
        success: function(json){
            $("#mensajes").html(json.mensaje);
            $("#nombre").val(json.nombre);
            $("#descripcion").val(json.descripcion);
            $("#precio").val(json.precio);
            $("#botonAgregar").prop('disabled',true);
            $("#botonModificar").prop('disabled',false);
            $("#botonEliminar").prop('disabled',false);
            $("#botonCancelar").prop('disabled',false);
        },
        error: function(e){
            $("#mensajes").html("Error:"+e.responseText);
        }
    });
}

function modificarProducto (){
    var datosFormulario = new FormData(document.getElementById("formPrograma"));
    $.ajax({
        type:'POST',
        url:'php/modificar.php',
        data:datosFormulario,
        dataType:'html',
        cache:false,
        contentType:false,
        processData:false,
        beforeSend: function(){
            $("#mensajes").html("Enviar datos...");
        },
        success: function(res){
            $("#mensajes").html(res);
            limpiarCampos();
            $("#botonAgregar").prop('disabled',false);
            $("#botonModificar").prop('disabled',true);
            $("#botonEliminar").prop('disabled',true);
            $("#botonCancelar").prop('disabled',true);
        },
        error: function (e){
            $("#mensajes").html("Error:"+e.responseText);
        }
    });
}

function eliminarProducto(){
    var datosFormulario = $("#formPrograma").serialize();
    $.ajax({
        type:'POST',
        url:'php/eliminar.php',
        data:datosFormulario,
        dataType:'html',
        beforeSend: function(){
            $("#mensajes").html("Enviando datos al servidor...");
        },
        success: function(res){
            $("#mensajes").html(res);
            limpiarCampos();
            $("#botonAgregar").prop('disabled',false);
            $("#botonModificar").prop('disabled',true);
            $("#botonEliminar").prop('disabled',true);
            $("#botonCancelar").prop('disabled',true);
        },
        error: function (e){
            $("#mensajes").html("Error:"+e.responseText);
        }
    });
}