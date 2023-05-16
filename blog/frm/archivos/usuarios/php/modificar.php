<?php

require_once ('../../../../php/conexion.php');
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$login = $_POST['login'];
$password = $_POST['password'];
$sql = "update usuarios set nombre='" . $nombre . "',login='" . $login . "',password='" . $password . "' where codigo=" . $codigo;
$ret = $mysqli->query($sql);
$res = "Registro No Modificado";
if ($ret == 1) {
    $res = "Registro Modificado";
}
echo($res);
?>