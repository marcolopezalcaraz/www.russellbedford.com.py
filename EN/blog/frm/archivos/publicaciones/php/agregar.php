<?php
//# Conectamos con MySQL
require_once ('../../../../php/conexion.php');
$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$fecha = date("Y-m-d");
$ruta="../../../../imagenes_publicaciones/";
$uploadfile_temporal=$_FILES['imagen']['tmp_name'];
$uploadfile_nombre=$_FILES['imagen']['name'];

$sql="insert into publicaciones (titulo, contenido, imagen, fecha)
    VALUES ('".$titulo."','".$contenido."','".$uploadfile_nombre."','".$fecha."')";
        $ret=$mysqli->query($sql);
        $res="Registro No guardado";
        if($ret==1){
            if(is_uploaded_file($uploadfile_temporal))
            {
                move_uploaded_file($uploadfile_temporal,
                        $ruta.$uploadfile_nombre);
            }
            $res="Registro guardado";
        }
        echo($res);
?>
