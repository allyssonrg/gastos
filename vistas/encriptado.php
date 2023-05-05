<?php
require_once("../config/conexion.php");

$texto="Aplicacion de Gastos";

echo "TEXTO ORIGINAL:". $texto."<br>";

$enc=encryption($texto);

echo "TEXTO ENCRIPTADO:". $enc."<br>";

$des=decryption($enc);

echo "TEXTO DESENCRIPTADO:" .$des."<br>";



?>