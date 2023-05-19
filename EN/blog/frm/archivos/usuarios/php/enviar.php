<?php

require_once ('../../../../php/conexion.php');
$nombre = $_POST['nombre'];
$login = $_POST['login'];
$password = $_POST['password'];
$fecha = date("Y-m-d");
$hora = date("H:i:s");
$sql = "insert into usuarios (nombre,login,password,fecha,hora) 
    VALUES ('" . $nombre . "','" . $login . "','" . $password . "','" . $fecha . "','" . $hora . "')";
$ret = $mysqli->query($sql);
$res = "Mensaje No enviado";
if ($ret == 1){
    $res = "Mensaje enviado satisfactoriamente. Gracias por escribirnos! En breve nos comunicaremos contigo";
}
$mysqli->close();
echo ($res);
?>
