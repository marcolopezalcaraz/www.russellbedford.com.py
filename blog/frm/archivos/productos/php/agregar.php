<?php
//# Conectamos con MySQL
require_once ('../../../../php/conexion.php');
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$ruta="../../../../imagenes_productos/";//ruta carpeta donde queremos copiar las imagenes
$uploadfile_temporal=$_FILES['imagen']['tmp_name'];
$uploadfile_nombre=$_FILES['imagen']['name'];

$sql="insert into productos (nombre, descripcion,precio,imagen)
    VALUES ('".$nombre."','".$descripcion."','".$precio."','"
        .$uploadfile_nombre."')";
        $ret=$mysqli->query($sql);
        $res="Registro No guardado";
        if($ret==1){
            if(is_uploaded_file($uploadfile_temporal))
            {
                move_uploaded_file($uploadfile_temporal,
                        $ruta.$uploadfile_nombre);
            }
            $res="Registro guardado";
        }
        echo($res);
?>
