<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Agregar Producto</title>
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
        <div class="info">
          <a href="cerrar_sesion.php" class="d-block">Cerrar Sesion</a>
        </div>
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
          <h1 class="text-center">Agregar Producto</h1>
        </div>
      </div>
    </div>
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
        <form id="formRegistro" class="formulario" action="agregarProductobd.php" method="POST">
        <div class="form-group">
          <label for="nombre">Nombre:</label>
          <input type="text" class="form-control" placeholder="Nombre:" name="txtNombre" required>
        </div>

        <div class="form-group">
          <label for="descripcion">Descripcion:</label>
          <input type="text" class="form-control" placeholder="Descripcion:" name="txtDescripcion" required>
        </div>

        <div class="form-group">
          <label for="precio">Precio:</label>
          <input type="text" class="form-control" placeholder="Precio:" name="txtPrecio" required>
        </div>

        <div class="form-group">
        <label for="marca">Marca:</label>
						<select class="form-control" name="cmbMarca" required>
              <option selected>Seleccionar Marca</option>
                <?php
                  include("conexion/conectar_base.php");
                  $sql = "CALL proc_mostrar_marca()";
                  $marca = mysqli_query($conexion, $sql);
                  while ($regMarca = mysqli_fetch_assoc($marca)) {
                    echo "<option value='" . $regMarca['Id_Marca'] . "'>" . $regMarca['Nombre_Marca'] . "</option>";
                  }
                  mysqli_close($conexion);
                ?>
            </select>
        </div>
        <div class="form-group">
        <label for="categoria">Categoria:</label>
					<select class="form-control" name="cmbCategoria" required>
            <option selected>Seleccionar Categoria</option>
            <?php
            include("conexion/conectar_base.php");
            $sql = "CALL proc_mostrar_categoria()";
            $categoria = mysqli_query($conexion, $sql);
            while ($regCategoria = mysqli_fetch_assoc($categoria)) {
               echo "<option value='" . $regCategoria['Id_Categoria'] . "'>" . $regCategoria['Nombre_Categoria'] . "</option>";
            }
            mysqli_close($conexion);
            ?>
          </select>
        </div>

        <div class="form-group">
        <label for="unidad">Unidad:</label>
				<select class="form-control" name="cmbUnidad" required>
        <option selected>Seleccionar Unidad</option>
           <?php
              include("conexion/conectar_base.php");
              $sql = "CALL proc_mostrar_unidad()";
              $marca = mysqli_query($conexion, $sql);
              while ($regMarca = mysqli_fetch_assoc($marca)) {
                 echo "<option value='" . $regMarca['Id_Unidad'] . "'>" . $regMarca['Nombre_Unidad'] . "</option>";
               }
              mysqli_close($conexion);
           ?>
        </select>
        </div>
        
        <div class="form-group">
          <label for="existencia">Existencia:</label>
          <input type="text" class="form-control" placeholder="Existencia:" name="txtExistencia" required>
        </div>
    		<br>
    		<button id="btn_confirmar" type="submit" class="btn btn-primary">Confirmar</button>
    		<button id="btn_cancelar" type="button" class="btn btn-primary">Cancelar</button>

            <script>
                document.getElementById('btn_cancelar').addEventListener('click', function() {
                    window.location.href = 'cliente.php';
                });
            </script>

          </form>
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
