<?php
require_once('../../../../php/conexion.php');
$codigo = $_POST["id"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];
$ruta="../../../../imagenes_productos/";
$uploadfile_temporal=$_FILES["imagen"]["tmp_name"];
$uploadfile_nombre=$_FILES["imagen"]["name"];
$sql = "SELECT imagen FROM productos WHERE codigo=" . $codigo;
$ret = $mysqli->query($sql);
$row = $ret->fetch_array(MYSQLI_ASSOC);
$nombre_viejo = $row["imagen"];
if($uploadfile_nombre == ""){
    $sql = "UPDATE productos SET nombre='" . $nombre ."', descripcion='" . $descripcion .
            "', precio='" . $precio . "' WHERE codigo='" . $codigo . "'";   
} else {
    $sql = "UPDATE productos SET nombre='" . $nombre ."', descripcion='" . $descripcion .
            "', precio='" . $precio . "', imagen='" . $uploadfile_nombre . "' WHERE codigo='" . $codigo . "'";   
}
$ret = $mysqli->query($sql);
$res = "Registro no modificado";
if($ret == 1){
    $res = "Registro modificado correctamente";
    if($uploadfile_nombre != ""){
        unlink($ruta . $nombre_viejo);
    }
    if(is_uploaded_file($uploadfile_temporal)){
        move_uploaded_file($uploadfile_temporal, $ruta . $uploadfile_nombre);
    }
}
echo $res;
?>
