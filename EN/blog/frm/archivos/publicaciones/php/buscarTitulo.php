<?php
//# Conectamos con MySQL
require_once('../../../../php/conexion.php');
$offset = ((int) ($_POST['bpagina'])-1) * 10;
$result=$mysqli->query("SELECT * FROM publicaciones WHERE
    titulo like '%".$_POST['btitulo']."%' LIMIT 10
        OFFSET ". $offset);
$tabla="";
while ($row=$result->fetch_array(MYSQLI_ASSOC)){
    $tabla = $tabla. "<tr>"
                            ."<td>".$row["id"]."</td>"
                            ."<td>".$row["titulo"]."</td>"
                       ."</tr>";
}
if($tabla==""){
    $tabla="<tr><td colspan='2'>No hay registros...</td><tr>";
}
$pregunta = new stdClass();
$pregunta->mensaje = "Datos encontrados";
$pregunta->contenido = $tabla;
$json = json_encode($pregunta);
echo($json);
?>
