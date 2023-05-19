<?php
require_once('../../../../php/conexion.php');
$id = $_POST["id"];
$sql = "SELECT imagen FROM publicaciones WHERE id=" . $id;
$ret = $mysqli->query($sql);
$row = $ret->fetch_array(MYSQLI_ASSOC);
$nombre_viejo = $row["imagen"];
$ruta="../../../../imagenes_publicaciones/";
$sql = "DELETE FROM publicaciones WHERE id=" . $id;
$ret = $mysqli->query($sql);
$res="Registro no eliminado";
if($ret == 1){
    unlink($ruta . $nombre_viejo);
    $res = "Registro eliminado";
}
echo($res);
?>
