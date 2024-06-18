<?php
  $servidor = "localhost";
  $usuario = "Orlando";
  $baseDatos = "CiberLynx";
  $password = "ORLANDO";

  //conectando a la base Datos
  $conexion = mysqli_connect($servidor,$usuario,$password,$baseDatos);
  if(!$conexion){
    echo "Problema al conecatar con la BD";
  }  

?>
