<?php
require_once("global.php");

$conexion = new mysqli('localhost', 'root', '', 'dbgtoadmin');

mysqli_query($conexion, 'SET NAMES "'.DB_ENCODE.'"');

if(mysqli_connect_error()){
  printf("Error en la conexion a la base de datos: %s\n",mysqli_connect_error());
  exit();
}

//echo "Hola Mundo: ".$conexion->host_info." adios\n";


function ejecutarConsulta($sql){
  global $conexion;
  $query = $conexion->query($sql);
  return $query;
}

function ejecutarConsultaSimpleFila($sql){
  global $conexion;
  $query = $conexion->query($sql);
  $row=$query->fetch_assoc();
  return $row;
}

function ejecutarConsultaRetornaID($sql){
  global $conexion;
  $query = $conexion->query($sql);
  return $conexion->insert_id;
}

function limpiarCadenas($str){
  global $conexion;
  $str = mysqli_real_escape_string($conexion, trim($str));
  return htmlspecialchars($str);
}


if(!function_exists('encryption')){  //alid SI LA FUNCION YA ESTA EN MEMORIA
  function encryption($string){
  //WRITE_LOG("ENTRANDO A CONEXION ENCRYPTION - SK = ". SECRET_KEY);
  $output=FALSE;
  $key= hash('sha256',SECRET_KEY);
  //$iv=substr(hash('sh256',SECRET_IV,0,16));
  $iv=openssl_random_pseudo_bytes(openssl_cipher_iv_length(METHOD));
  $output=openssl_encrypt($string, METHOD, $key,0,$iv);
  $output = base64_encode($output. '::'.$iv);
  return $output;
}

  function decryption($string){
  //write_log("ENTRANDO A conecion descryption - SK = ".sectret_key);
  $key = hash('sha256', SECRET_KEY);
  list($string,$iv) = array_pad(explode('::', base64_decode($string), 2),2,null);
  $output=openssl_decrypt($string, METHOD, $key,0,$iv);
  
  return $output;


  }

}

?>