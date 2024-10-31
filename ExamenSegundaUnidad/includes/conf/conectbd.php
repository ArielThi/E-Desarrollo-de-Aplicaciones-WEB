<?php
function conectdb() {
    $db = mysqli_connect("localhost", "root", "", "bienesraices3");
    if (!$db) {
        die("Error en la conexión a la base de datos: " . mysqli_connect_error());
    }
    return $db;
}
?>
