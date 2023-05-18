<?php
    session_start();
    require_once ("../funciones/funciones.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        registro();
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <link rel="preconnect" href="https://fonts.googleapis.com">
	  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <title>Azul Estética</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	  <!-- Theme style -->
  	<link rel="stylesheet" href="../admin/dist/css/adminlte.min.css">
  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="../admin/plugins/fontawesome-free/css/all.min.css">
	  <!-- Daterange picker -->
	  <link rel="stylesheet" href="../admin/plugins/daterangepicker/daterangepicker.css">
	  <link rel="stylesheet" type="text/css" href="../sass/styles.css?a=<?php echo(rand()); ?>">
	  <script src="../js/jquery-3.6.4.js"></script>
</head>
<body>
	<?php
	  include_once "../admin/db_ecommerce.php";
    $id= mysqli_real_escape_string($con, $_REQUEST['id']??'');
    $queryProducto="SELECT id, nombre, precio, stock, categoria, marca, coleccion, descripcion FROM productos where id='$id'; ";
    $resProducto=mysqli_query($con, $queryProducto);
    $rowProducto=mysqli_fetch_assoc($resProducto);
	?>

<header id="nav">

		<nav class="nav">
			<div class="logo"><a href="../index.php" class="logo__link"><img src="../images/azul-white.png" class="logo__img" alt=""></a></div>
				<ul class="nav__links">
					<li class="nav__link"><a class="nav__link__texto" href="../index.php">Inicio</a></li>
					<li class="nav__link"><a class="nav__link__texto" href="servicios.php">Servicios</a></li>
					<li class="nav__link"><a class="nav__link__texto" href="promociones.php">Promociones</a></li>
					<li class="nav__link"><a class="nav__link__texto" href="nosotros.php">Nosotros</a></li>
					<li class="nav__link"><a class="nav__link__texto" href="contacto.php">Contacto</a></li>
					<li class="nav__link"><a class="nav__link__texto" href="catalogo.php">Catalogo</a></li>

					<?php
						if(isset($_SESSION['usuario'])){
							echo '
								<li class="nav__link">
									<i class="fa fa-user" style="color:#c0c0b4; margin: auto; padding-right:0.5em;"></i>
									<a class="nav__link__texto" href="perfil.php">'.$_SESSION['usuario'].'</a>
								</li>
							';
						} else {
							echo '
								<li class="nav__link">
									<i class="fa fa-user" style="color:#c0c0b4; margin: auto; padding-right:0.5em;"></i>
									<a class="nav__link__texto" href="login.php">Iniciar Sesión</a>
								</li>
							';
						}
					?>

					<div class="nav-icon dropdown">
						<div class="navbar-expand">
							<ul class="navbar-nav ml-auto">
								<!-- Messages Dropdown Menu -->
								<li class="nav-item dropdown">
									<a class="nav-link" data-toggle="dropdown" href="#" id="iconoCarrito">
										<i class="fa fa-cart-plus" aria-hidden="true" style="color: #c0c0b4"></i>
										<span class="badge badge-danger navbar-badge" id="badgeProducto"></span>
									</a>
									<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="listaCarrito">
										<a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</ul>

				<button class="ham" type="button">
					<span class="ham__br ham__br--1"></span>
					<span class="ham__br ham__br--2"></span>
					<span class="ham__br ham__br--3"></span>
				</button>
		</nav>
	</header>

<div class="detProductos">

	<div style="border: 1px solid whitesmoke;">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"><?php echo $rowProducto['nombre'] ?></h3>
              <?php
                $queryImagenes="SELECT 
                f.web_path
                FROM
                productos AS p
                INNER JOIN productos_files AS pf ON pf.producto_id=p.id
                INNER JOIN files AS f ON f.id=pf.file_id
                where p.id='$id'
                ";
                $resPrimerImagen=mysqli_query($con, $queryImagenes);
                $rowPrimerImagen=mysqli_fetch_assoc($resPrimerImagen);
              ?>
              <div class="col-12">
                <img src="<?php echo $rowPrimerImagen['web_path'] ?>" class="product-image" id="PrimerImagen" style="border: 1px solid whitesmoke;" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
              <?php
                $resImagenes=mysqli_query($con, $queryImagenes);
                while($rowImagenes=mysqli_fetch_assoc($resImagenes)){
              ?>
                <div class="product-image-thumb active" style="border: 1px solid whitesmoke;">
                    <img src="<?php echo $rowImagenes['web_path'] ?>" onclick="changeImage(this)" alt="Product Image">
                </div>
              <?php
                }
              ?>
                </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><?php echo $rowProducto['nombre'] ?></h3>
              <p class="my-3">Marca: <?php echo $rowProducto['marca'] ?></p>
              <p class="my-3">Colección: <?php echo $rowProducto['coleccion'] ?></p>
              <p><?php echo $rowProducto['descripcion'] ?></p>

              <div class="bg py-2 px-3 mt-4">
                <h2 class="mb-0">
                $<?php echo $rowProducto['precio'] ?> UYU
                </h2>
              </div>

              <div class="mt-4">
                <div>
                  <button class="catalogo__detalle catalogo__boton" id="agregarCarrito"
                  data-id="<?php echo $_REQUEST['id'] ?>"
                  data-nombre="<?php echo $rowProducto['nombre'] ?>"
                  data-web_path="<?php echo $rowPrimerImagen['web_path'] ?>"
                  data-precio="<?php echo $rowProducto['precio'] ?>"
                  > 
                    <i class="fa fa-cart-plus" style="padding-right:0.7em;"></i>AGREGAR AL CARRITO
                  </button>
                </div>
                <div class="mt-4">
                  Cantidad:
                  <input type="number" class="form-control" id="cantidadProducto" value="1">
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      
    </div>

    <footer>

		<div class="footer__payments">
            <div class="footer__payments__cont"><img src="../images/payments/visa.svg" alt="" class="footer__payments__img"></div>
            <div class="footer__payments__cont"><img src="../images/payments/master.svg" alt="" class="footer__payments__img"></div>
            <div class="footer__payments__cont"><img src="../images/payments/oca.svg" alt="" class="footer__payments__img"></div>
            <div class="footer__payments__cont"><img src="../images/payments/scotiabank.svg" alt="" class="footer__payments__img"></div>
            <div class="footer__payments__cont"><img src="../images/payments/ebrou.svg"" class="footer__payments__img"></div>
            <div class="footer__payments__cont"><img src="../images/payments/anda.svg"" class="footer__payments__img"></div>
            <div class="footer__payments__cont"><img src="../images/payments/cabal.svg" alt="" class="footer__payments__img"></div>
            <div class="footer__payments__cont"><img src="../images/payments/bbvanet.svg" alt="" class="footer__payments__img"></div>
            <div class="footer__payments__cont"><img src="../images/payments/creditel.svg" alt="" class="footer__payments__img"></div>
        </div>

		<div class="footer__text">
			<div class="footer__text__cont">
				<p class="footer__text__info">© Azul Estética / Montevideo, Uruguay / Desarrollado por Nicolás Sequeira</p>
			</div>
		</div>
	</footer>

<script src="../js/menu.js"></script>
<script src="../js/ecommerce copy.js"></script>
		  <!-- jQuery -->
<script src="../admin/plugins/jquery/jquery.min.js"></script>
<!-- Cambio de imagen detalle producto  -->
<script type="text/javascript">
   function changeImage(x){
    document.getElementById('PrimerImagen').src= x.src;
   }
</script>
<!-- jQuery UI 1.11.4 -->
<script src="../admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- daterangepicker -->
<script src="../admin/plugins/moment/moment.min.js"></script>
<script src="../admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- AdminLTE App -->
<script src="../admin/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../admin/dist/js/pages/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>