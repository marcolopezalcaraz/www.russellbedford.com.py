<?php
$desdeid = $_GET['d'];
$hastaid = $_GET['h'];
$previsualizar = $_GET['pre'];
if ($previsualizar == "no") {
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: Attachment;filename=excel.xls;');
    /* acuerda cambiar tu extension a la que estas tomando xls, txt, etc */
}
//#Conectamos con Mysql
require_once ('../../../php/conexion.php');
$consulta = "SELECT codigo,nombre FROM usuarios WHERE codigo>=" . $desdeid . " AND codigo<=" . $hastaid . "";
$resEmp = $mysqli->query($consulta);
?>
<html>
    <body>
        <h1>IDT</h1>
        <h2>Ejemplo de Excel con PHP y MYSQL</h2>
        <table border="1">
            <tr><td>Codigo</td><td>Nombre</td></tr>
            <?php
            while ($row = $resEmp->fetch_array(MYSQLI_ASSOC)) {
                ?>
                <tr>
                    <td>
                        <?php
                        echo $row['codigo'];
                        ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>
