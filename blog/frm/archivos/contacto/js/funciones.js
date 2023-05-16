function enviarMensaje(){
    var formData = $("#formPrograma").serialize();
    $.ajax({
        url: "php/enviar.php",
        type:"post",
        dataType:"html",
        data:formData,
        success:function(res){
            $("#mensajes").html(res);
            $("#botonEnviar").prop('disabled',true);
            $("#botonLimpiar").prop('disabled',true);
        },
        error: function(error){
            $("#mensajes").html("Error:"+error.responseText);
        }
    });
}

function limpiarCampos(){
    $("#nombre").val("");
    $("#apellido").val("");
    $("#asunto").val("");
    $("#email").val("");
    $("#telefono").val("");
    $("#celular").val("");
    $("#mensaje").val("");
}
