<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Actualizar Inventario</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .navbar-custom {
      background-color: #343a40;
      width: 100%;
    }
    .navbar-logo {
      max-width: 150px;
      height: auto;
      object-fit: contain;
    }
    .nav-item {
      text-align: center;
    }
    .nav-link {
      white-space: nowrap;
    }
    .content-wrapper {
      margin-top: 100px;
    }
    @media (max-width: 768px) {
      .navbar-logo {
        max-width: 100px;
      }
      .content-wrapper {
        margin-top: 70px;
      }
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <nav class="navbar navbar-custom fixed-top">
    <div class="container-fluid p-0 d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center">
        <a class="navbar-brand m-0 p-0 d-flex justify-content-center" href="index.html">
          <img src="dist/img/lo.png" class="navbar-logo" alt="Logo">
        </a>
      </div>
      <div class="user-panel d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Administrador</a>
        </div>
      </div>
    </div>
  </nav>

  <class="content-wrapper">
    <div>
      <div class="mt-5">
        <div class="col-12">
          <br>
          <h1 class="text-center">Actualizar Inventario</h1>
        </div>
      </div>
    </div>   
    <?php
          #conexion con la base de datos
          include("conexion/conectar_base.php");
          # recibimos comom paramatro el nombre de la persona
          $producto = $_GET['codigoBarras'];

          #Consulta 
          $sql = "CALL proc_obtener_inventario('$producto')";
          $ejecConsulta = mysqli_query($conexion, $sql);
          if(mysqli_num_rows($ejecConsulta) > 0) {
            $conProducto = mysqli_fetch_array($ejecConsulta);
            ?> 
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 mt-3">
        <form id="formRegistro" class="formulario" action="editarProductobd.php" method="POST">
            
            <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control"name="txtNombre" value="<?php echo $conProducto['Nombre']; ?>" required>
            </div>            

            <div class="form-group">
            <label for="descripcion">Descripcion:</label>
            <input type="text" class="form-control"name="txtDescripcion" value="<?php echo $conProducto['Descripcion']; ?>" required>
            </div>            

            <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="text" class="form-control" name="txtPrecio" value="<?php echo $conProducto['Precio']; ?>" required>
            </div>  

            <div class="form-group">
            <label for="existencia">Existencia:</label>
            <input type="text" class="form-control"name="txtExistencia" value="<?php echo $conProducto['Existencia']; ?>" required>
            </div>  

            <div class="form-group">
    <label for="marca">Marca:</label>
    <select class="form-control" name="cmbMarca" required>
        <?php
        include("conexion/conectar_base.php");
        $sql = "CALL proc_mostrar_marca()";
        $marca = mysqli_query($conexion, $sql);
        $idMarcaSeleccionada = $conProducto['Id_Marca']; // Asumiendo que el ID de la marca está en $conProducto['Id_Marca']

        while ($mostrarMarca = mysqli_fetch_assoc($marca)) {
            $idMarca = $mostrarMarca['Id_Marca'];
            $nombreMarca = $mostrarMarca['Nombre_Marca'];
            $selected = ($idMarcaSeleccionada == $idMarca) ? "selected" : "";
            echo "<option value='$idMarca' $selected>$nombreMarca</option>";
        }
        mysqli_close($conexion);
        ?>
    </select>
</div>


    
            
            
<div class="form-group">
    <label for="categoria">Categoria:</label>
    <select class="form-control" name="cmbCategoria" required>
        <?php
        include("conexion/conectar_base.php");
        $sql = "CALL proc_mostrar_categoria()";
        $categoria = mysqli_query($conexion, $sql);
        $idCategoriaSeleccionada = $conProducto['Id_Categoria']; // Asumiendo que el ID de la categoría está en $conProducto['Id_Categoria']

        while ($mostrarCategoria = mysqli_fetch_assoc($categoria)) {
            $idCategoria = $mostrarCategoria['Id_Categoria'];
            $nombreCategoria = $mostrarCategoria['Nombre_Categoria'];
            $selected = ($idCategoriaSeleccionada == $idCategoria) ? "selected" : "";
            echo "<option value='$idCategoria' $selected>$nombreCategoria</option>";
        }
        mysqli_close($conexion);
        ?>
    </select>
</div>


           
            <div class="form-group">
    <label for="unidad">Unidad:</label>
    <select class="form-control" name="cmbUnidad" required>
        <?php
        include("conexion/conectar_base.php");
        $sql = "CALL proc_mostrar_unidad()";
        $unidad = mysqli_query($conexion, $sql);
        $idUnidadSeleccionada = $conProducto['Id_Unidad']; // Asumiendo que el ID de la unidad está en $conProducto['Id_Unidad']

        while ($mostrarUnidad = mysqli_fetch_assoc($unidad)) {
            $idUnidad = $mostrarUnidad['Id_Unidad'];
            $nombreUnidad = $mostrarUnidad['Nombre_Unidad'];
            $selected = ($idUnidadSeleccionada == $idUnidad) ? "selected" : "";
            echo "<option value='$idUnidad' $selected>$nombreUnidad</option>";
        }
        mysqli_close($conexion);
        ?>
    </select>
</div>










            <br><br>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Actualizar</button>
            </div>
          </form>
          <?php
} else {
   echo "<p>No se encontraron datos para el nombre proporcionado.</p>";
}
?>
        </div>
      </div>
  </div>

  <aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="plugins/sparklines/sparkline.js"></script>
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="dist/js/adminlte.js"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
