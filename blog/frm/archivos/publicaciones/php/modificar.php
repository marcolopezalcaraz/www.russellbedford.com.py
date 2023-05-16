<?php
require_once('../../../../php/conexion.php');
$id = $_POST["id"];
$titulo = $_POST["titulo"];
$contenido = $_POST["contenido"];
$ruta="../../../../imagenes_publicaciones/";
$uploadfile_temporal=$_FILES["imagen"]["tmp_name"];
$imagen=$_FILES["imagen"]["name"];
$sql = "SELECT imagen FROM publicaciones WHERE id=" . $id;
$ret = $mysqli->query($sql);
$row = $ret->fetch_array(MYSQLI_ASSOC);
$nombre_viejo = $row["imagen"];
if($imagen == ""){
    $sql = "UPDATE publicaciones SET titulo='" . $titulo ."', contenido='" . $contenido . "' where id=" . $id;   
} else {
    $sql = "UPDATE publicaciones SET titulo='" . $titulo ."', contenido='" . $contenido . "', imagen='" . $imagen . "' where id=" . $id;   
}
$ret = $mysqli->query($sql);
$res = "Registro no modificado";
if($ret == 1){
    $res = "Registro modificado correctamente";
    if($imagen != ""){
        unlink($ruta . $nombre_viejo);
    }
    if(is_uploaded_file($uploadfile_temporal)){
        move_uploaded_file($uploadfile_temporal, $ruta . $imagen);
    }
}
echo $res;
?>
