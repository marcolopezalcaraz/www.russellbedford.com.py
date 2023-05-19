<?php

# Conectamos con MySQL

require_once ('../../../../php/conexion.php');
$id = $_POST['codigo'];
$sql = "select * from usuarios where codigo=" . $id;
$ret = $mysqli->query($sql);
$row = $ret->fetch_array(MYSQLI_ASSOC);
$objeto = new stdClass();
$objeto->mensaje = "Registro encontrado";
$objeto->nombre = $row["nombre"];
$objeto->password = $row["password"];
$objeto->login = $row["login"];
$json = json_encode($objeto);
echo($json);
?>

