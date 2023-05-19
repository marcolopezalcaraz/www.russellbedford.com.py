<?php

require_once '../../../../php/conexion.php';
$id = $_POST['codigo'];
$sql="delete from usuarios where codigo=".$id;
$ret=$mysqli->query($sql);
$res="Registro No Eliminado";
if($ret==1){
    $res="Registro eliminado";
}
echo($res);
?>

