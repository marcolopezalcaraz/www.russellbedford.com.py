<?php

session_start();
require_once ('conexion.php');
$login_usuario = $_POST['login_usuario'];
$pass_usuario = $_POST['pass_usuario'];
$sql = "select * from usuarios where login='" . $login_usuario . "' and password='" . $pass_usuario . "'";
$ret = $mysqli->query($sql);

$_SESSION['acceso'] = false;
if ($ret->num_rows == 1) {
    $_SESSION['acceso'] = true;
}
$pregunta = new stdClass();
$pregunta->acceso = $_SESSION['acceso'];
$json = json_encode($pregunta);
$mysqli->close();
echo($json);
?>