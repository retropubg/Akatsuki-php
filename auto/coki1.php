<?php

include('hosting.php');

$directorio = "/home/$hosting1/www/";
$archivos = scandir($directorio); // obtiene un arreglo con los nombres de todos los archivos en el directorio

foreach ($archivos as $archivo) {
if (strpos($archivo, 'cookie') !== false) {
unlink($directorio . '/' . $archivo); // elimina el archivo si contiene la cadena 'hola'
}
}