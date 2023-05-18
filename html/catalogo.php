<?php
    session_start();
    require_once ("../funciones/funciones.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        registro();
    }

?>

<!DOCTYPE html>
<html lang="en">
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

	<section class="catalogo-cont">

		<div class="catalogo__lista">
			<div class="catalogo__filtros">
				<div class="catalogo__list">

				<form class="form-inline ml-3" action="catalogo.php">
					<div class="input-group input-group-sm">
						<input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Buscar" name="nombre" value="<?php echo $_REQUEST['nombre']??''; ?>">
						<input type="hidden" name="modulo" value="productos">
						<div class="input-group-append">
							<button class="btn btn-navbar" type="submit">
								<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
				</form>

					<p class="catalogo__list__titulo">Marcas</p>
					<a href="#" class="catalogo__list__item" category-marca="all">Todo<i class="bi bi-check"></i></a>
					<a href="#" class="catalogo__list__item" category-marca="kerastase">Kerastase<i class="bi bi-check"></i></a>
					<a href="#" class="catalogo__list__item" category-marca="loreal">Loreal<i class="bi bi-check"></i></a>
					<a href="#" class="catalogo__list__item" category-marca="redken">Redken<i class="bi bi-check"></i></a>
					<a href="#" class="catalogo__list__item" category-marca="loreal">Loreal<i class="bi bi-check"></i></a>
					<a href="#" class="catalogo__list__item" category-marca="redken">Redken<i class="bi bi-check"></i></a>
				</div>

				<div class="catalogo__list">
					<p class="catalogo__list__titulo">Categoría</p>
					<a href="#" class="catalogo__list__item" category-marca="kerastase">Shampoo<i class="bi bi-check"></i></a>
					<a href="#" class="catalogo__list__item" category-marca="loreal">Loreal<i class="bi bi-check"></i></a>
				</div>

				<div class="catalogo__list">
					<p class="catalogo__list__titulo">Colección</p>
					<a href="#" class="catalogo__list__item" category-coleccion="blond-absolu">Blond Absolu<i class="bi bi-check"></i></a>
					<a href="#" class="catalogo__list__item" category-coleccion="densifique">Densifique<i class="bi bi-check"></i></a>
					<a href="#" class="catalogo__list__item" category-coleccion="discipline">Discipline<i class="bi bi-check"></i></a>
					<a href="#" class="catalogo__list__item" category-coleccion="loreal">Loreal<i class="bi bi-check"></i></a>


				</div>
			</div>
		</div>

		<div class="catalogo">
				<?php
                    $where=" where 1=1 ";
                    $nombre= mysqli_real_escape_string($con,$_REQUEST['nombre']??'');
                    if( empty($nombre)==false ){
                        $where="and nombre like '%".$nombre."%'";
                    }
                    $queryCuenta='SELECT COUNT(*) as cuenta FROM productos $where ;';
                    $resCuenta=mysqli_query($con,$queryCuenta);
                    $rowCuenta=mysqli_fetch_assoc($resCuenta);
                    $totalRegistros=$rowCuenta['cuenta'];

                    $elementosPorPagina=12;

                    $totalPaginas=ceil($totalRegistros/$elementosPorPagina);

                    $paginaSel=$_REQUEST['pagina']??false;

                    if($paginaSel==false){
                        $inicioLimite=0;
                        $paginaSel=1;
                    }else{
                        $inicioLimite=($paginaSel-1)* $elementosPorPagina;
                    }
                    $limite=" limit $inicioLimite,$elementosPorPagina ";
                    $query = "SELECT 
                        p.id,
                        p.nombre,
                        p.precio,
                        p.stock,
                        f.web_path
                        FROM
                        productos AS p
                        INNER JOIN productos_files AS pf ON pf.producto_id=p.id
                        INNER JOIN files AS f ON f.id=pf.file_id
                        $where
                        GROUP BY p.id
                        $limite
                        ";
                    $res = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($res)) {
                    ?>
					<div class="catalogo__item" category-marca="kerastase" category-coleccion="blond-absolu">				
						<img src="<?php echo $row['web_path'] ?>" alt="" class="catalogo__img">
							<div class="catalogo__info__cont">
								<h4 class="catalogo__titulo"><?php echo $row['nombre'] ?></h4>
								<p class="catalogo__precio">$<?php echo $row['precio'] ?> UYU</p>
								<a class="catalogo__detalle catalogo__boton" href="detalleProducto.php?modulo=detalleproducto&id=<?php echo $row['id'] ?>">Ver Producto</a>
							</div>
						</div>
					<?php 
					} 
					?>
			</div>
			</div>
	</section>
			
		<div class="paginador-catalogo">
			<?php
			if($totalPaginas>0){
			?>
				<nav aria-label="Page navigation">
				  <ul class="pagination">
					<?php
						if($paginaSel!=1){
					?>
					<li class="page-item disabled">
					  <a class="page-link" href="catalogo.php?modulo=productos&pagina=<?php echo ($paginaSel-1); ?>" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
						<span class="sr-only">Previous</span>
					  </a>
					</li>
					<?php
						}
					?>

					<?php
						for($i=1; $i<=$totalPaginas; $i++){
					?>
					<li class="page-item <?php echo ($paginaSel==$i)?" active ":" "; ?>">
						<a class="page-link" href="catalogo.php?modulo=productos&pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
					</li>
					<?php
						}
					?>
					<?php
						if($paginaSel!=$totalPaginas){
					?>
					<li class="page-item">
					  <a class="page-link" href="catalogo.php?modulo=productos&pagina=<?php echo ($paginaSel+1); ?>" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
						<span class="sr-only">Next</span>
					  </a>
					</li>
					<?php
						}
					?>
				  </ul>
				</nav>
			<?php
			}
			?>

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