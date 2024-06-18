<?php
  include("conexion/conectar-mysql.php");
  $id = $_POST['txtIdentif'];
  $fechaNac = $_POST['txtFechaNac'];
  $especie = $_POST['cmbEspecie'];
  $sexo = $_POST['cmbSexo'];
  $continente = $_POST['cmbContinente'];
  $apodo = $_POST['txtApodo'];
  $zoo = $_POST['cmbZoo'];

  echo "$id | $fechaNac | $especie | $sexo | $continente | $apodo | $zoo";

  $sql = "CALL proc_guardaranimal('$id','$fechaNac','$especie','$sexo','$continente','$apodo','$zoo')";
  if(mysqli_query($conexion,$sql)){
    #redireccionar a consultar animal
    header("location:consultar-animal.php");
	 exit();
  }else{
    echo "Problemas al registrar el animal, verifique de nuevo";
  }
?>
