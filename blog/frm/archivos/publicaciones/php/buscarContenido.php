<?php

//# Conectamos con mysql
require_once ('../../../../php/conexion.php');
$offset = ((int) ($_POST['bpagina']) - 1) * 10;
$result = $mysqli->query("SELECT * FROM publicaciones WHERE nombre like '%" . $_POST['btitulo'] . "%' LIMIT 10 OFFSET " . $offset);
$tabla = "";
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $tabla = $tabla . "<tr>"
            . "<td>" . $row['titulo'] . "</td>"
            . "<td>" . $row['contenido'] . "</td>"
            . "</tr>";
}

if ($tabla == "") {
    $tabla = "<tr><td colspan='2'>No hay registros...</td></tr>";
}
$pregunta = new stdClass();
$pregunta->mensaje = "Datos encontrados";
$pregunta->contenido = $tabla;
$json = json_encode($pregunta);
echo ($json);
?>