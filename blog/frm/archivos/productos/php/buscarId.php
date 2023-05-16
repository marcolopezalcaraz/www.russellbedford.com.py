<?php
require_once ('../../../../php/conexion.php');
$codigo = $_POST["id"];
$sql = "SELECT * FROM productos WHERE codigo=" . $codigo;
$mysqli->query("SET NAMES 'utf8'");
$ret = $mysqli->query($sql);
$row = $ret->fetch_array(MYSQLI_ASSOC);
$objeto = new stdClass();
$objeto->mensaje = "Registro encontrado";
$objeto->nombre = $row["nombre"];
$objeto->descripcion = $row["descripcion"];
$objeto->precio = $row["precio"];
$json = json_encode($objeto);
echo $json;
?>
