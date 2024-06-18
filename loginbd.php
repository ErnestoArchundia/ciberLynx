<?php
include("conexion/conectar_base.php");

// Obtener datos del formulario
$usuario = $_POST['txtUsuario'];
$contrasenia = $_POST['txtContrasenia'];

// Consulta para verificar el usuario y contraseña
//$query = "CALL proc_consulta_usuario('$usuario','$contrasenia');";
$query = "SELECT * FROM Usuario WHERE Usuario_Nombre = '$usuario' AND Contrasenia = '$contrasenia'";
$resultado = mysqli_query($conexion, $query);

// Verificar si se encontró un usuario
if (mysqli_num_rows($resultado) == 1) {
    // Iniciar sesión
    session_start();
    
    // Obtener datos del usuario
    $fila = mysqli_fetch_assoc($resultado);
    $_SESSION['Clv_Usuario'] = $fila['Clv_Usuario'];
    $_SESSION['Usuario_Nombre'] = $fila['Usuario_Nombre'];
    $_SESSION['Rol'] = $fila['Id_Rol'];


    
    // Registrar la sesión en la base de datos
   // $folio_sesion = uniqid();
    $clv_usuario = $fila['Clv_Usuario'];
    
    $query_insertar_sesion = "CALL proc_inserta_sesion('$clv_usuario');";

   // echo "Clv_Usuario: $clv_usuario <br>";
    
    // Ejecutar la consulta e imprimir mensajes de depuración
    if (mysqli_query($conexion, $query_insertar_sesion)) {
        echo "Sesión registrada correctamente.";
    } else {
        echo "Error al registrar la sesión: " . mysqli_error($conexion);
    }
    
     // Guardar Folio_Sesion en la variable de sesión
     $folio_sesion_query = "SELECT Folio_Sesion FROM Sesion WHERE Clv_Usuario = '$clv_usuario' ORDER BY Fecha_Hora DESC LIMIT 1";
     $resultado_folio = mysqli_query($conexion, $folio_sesion_query);
     $fila_folio = mysqli_fetch_assoc($resultado_folio);
     $_SESSION['Folio_Sesion'] = $fila_folio['Folio_Sesion'];
 


    // Redireccionar al panel de control o a otra página
    header("location: modulos.php");
} else {
    // Usuario o contraseña incorrectos
    echo "Usuario o contraseña incorrectos.";
}

// Cerrar la conexión
mysqli_close($conexion);
?>