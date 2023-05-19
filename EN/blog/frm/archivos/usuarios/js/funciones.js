/* global datosformulario */

function agregarUsuario(){
    var formData = $("#formUsuario").serialize();
    if($("#password").val()==$("#repeat_password").val()){
        $.ajax({
            url: "php/enviar.php",
            type:"post",
            dataType:"html",
            data:formData,
            success:function(res){
                $("#mensajes").html(res);
                $("#botonAgregar").prop('disabled',true);
                $("#botonModificar").prop('disabled',true);
                $("#botonEliminar").prop('disabled',true);
                $("#botonCancelar").prop('disabled',true);
                $("#botonSalir").prop('disabled',true);
            },
            error: function(error){
                $("#mensajes").html("Error:"+error.responseText);
            }
        });
    }else{
        $("#mensajes").html("Las contraselas no coinciden");
    }
}

function buscarNombreUsuario(){
    var datosFormulario= $("#formBuscar").serialize();
    $ .ajax({
        type:'POST',
        url:'php/buscarNombre.php',
        data:datosFormulario,
        dataType:'json',
        beforeSend:function(objeto){
            $("#mensajes").html("Enviando datos al servidor...");
            $("#contenidoBusqueda").css("display","none");
        },
        success:function(json){
            $("#mensajes").html(json.mensaje);
            $("#contenidoBusqueda").html(json.contenido);
            $("#contenidoBusqueda").fadeIn("slow");
            $("tbody tr").on("click",function(){
                var id=$(this).find("td:first").html();
                $("#panelBuscar").html("");
                $("#codigo").val(id);
                $("#nombre").focus();
                buscarIdUsuario();
                $("#buscar").fadeOut("slow");
                $("#panelPrograma").fadeIn("slow");
            });
        },
        error: function(error){
            $("#mensajes").html("Error:"+error.responseText);
        }
    });
}

function buscarIdUsuario(){
    var datosFormulario= $("#formUsuario").serialize();
    $ .ajax({
        type: 'POST',
        url: 'php/buscarId.php',
        data:datosFormulario,
        dataType: 'json',
        beforeSend: function(objeto){
            $("#mensajes").html("Enviando datos al servidor...");
        },
        success: function(json){
            $("#mensajes").html(json.mensaje);
            $("#codigo").prop("readonly",true);
            $("#nombre").val(json.nombre);
            $("#login").val(json.login);
            $("#password").val(json.password);
            $("#repeat_password").val(json.password);
            $("#botonAgregar").prop("disabled",true);
            $("#botonModificar").prop("disabled",false);
            $("#botonEliminar").prop("disabled",false);
            $("#botonCancelar").prop("disabled",false);
        },
        error: function(e){
            $("#mensajes").html("Error:"+e.responseText);
        }
    });
}

function modificarUsuario(){
    var datosFormulario = $("#formUsuario").serialize();
    if($("#password").val()==$("#repeat_password").val()){
        $.ajax({
            type:'POST',
            url:'php/modificar.php',
            data:datosFormulario,
            dataType:'html',
            beforeSend: function(objeto){
                $("#mensajes").html("Enviando datos...");
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
    }else{
        $("#mensajes").html("Las contraseñas no coinciden");
    }
}

function limpiarCampos(){
    $("#codigo").val("");
    $("#nombre").val("");
    $("#login").val("");
    $("#password").val("");
    $("#repeat_password").val("");
}

function eliminarUsuario(){
    var datosFormulario = $("#formUsuario").serialize();
    $.ajax({
        type:'POST',
        url:'php/eliminar.php',
        data:datosFormulario,
        dataType:'html',
        beforeSend: function(objeto){
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
        error:function(e){
            $("#mensajes").html("Error:"+e.responseText);
        }
    });
}