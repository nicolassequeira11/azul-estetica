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

	<div class="nosotros">
		<div class="titulo">
			<img class="titulo__img" src="../images/title4.png" alt="">
			<h2 class="titulo__text">Nosotros</h2>
			<img class="titulo__img" src="../images/title3.png" alt="">
		</div>
			<p class="nosotros__texto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur aperiam ex nulla quia reiciendis quasi, minus amet quos beatae adipisci maxime vel modi quibusdam eius laudantium excepturi quidem unde asperiores.</p>
	</div>

	<section>
		<div class="nosotros-info nosotros-info__mobile">
			<div class="nosotros-info__img__cont">
				<img class="nosotros-info__img" src="../images/nosotros-icon.png" alt="">
				<h2 class="nosotros-info__titulo">Misión</h2>
			</div>

			<div class="nosotros-info__cont">
				<p class="nosotros-info__texto">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit laboriosam hic optio laborum nihil ullam repudiandae fugiat adipisci vitae ex veritatis doloribus, ad debitis earum numquam asperiores veniam ab suscipit? Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio odio officia veritatis ipsam voluptates dolorum dolores atque velit, quo beatae, accusantium fugiat voluptas possimus unde harum iusto architecto necessitatibus facere.</p>
			</div>
		</div>
	</section>

	<section>
		<div class="nosotros-info nosotros-info__mobile">
			<div class="nosotros-info__img__cont">
				<img class="nosotros-info__img" src="../images/nosotros-icon.png" alt="">
				<h2 class="nosotros-info__titulo">Visión</h2>
			</div>

			<div class="nosotros-info__cont">
				<p class="nosotros-info__texto">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit laboriosam hic optio laborum nihil ullam repudiandae fugiat adipisci vitae ex veritatis doloribus, ad debitis earum numquam asperiores veniam ab suscipit? Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio odio officia veritatis ipsam voluptates dolorum dolores atque velit, quo beatae, accusantium fugiat voluptas possimus unde harum iusto architecto necessitatibus facere.</p>
			</div>
		</div>
	</section>

	<section>
		<div class="nosotros-info nosotros-info__mobile">
			<div class="nosotros-info__img__cont">
				<img class="nosotros-info__img" src="../images/nosotros-icon.png" alt="">
				<h2 class="nosotros-info__titulo">Nuestros Valores</h2>
			</div>

			<div class="nosotros-info__cont">
				<p class="nosotros-info__texto">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit laboriosam hic optio laborum nihil ullam repudiandae fugiat adipisci vitae ex veritatis doloribus, ad debitis earum numquam asperiores veniam ab suscipit? Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio odio officia veritatis ipsam voluptates dolorum dolores atque velit, quo beatae, accusantium fugiat voluptas possimus unde harum iusto architecto necessitatibus facere.</p>
			</div>
		</div>
	</section>

	<section>

		<div class="galeria">

			<div class="galeria__cont1">
				<img class="galeria__img1" src="../images/carousel/azul-estetica-4.jpg" alt="">
			</div>

			<div class="galeria__cont2">
				<div class="galeria__cont3">
					<img class="galeria__img2" src="../images/carousel/azul-estetica-1.png" alt="">
					<img class="galeria__img3" src="../images/azul-estetica-ciudad-vieja.jpg" alt="">
				</div>

				<div class="galeria__cont4">
					<img class="galeria__img4" src="../images/carousel/azul-estetica-3.png" alt="">
				</div>
			</div>

		</div>

	</section>

	<div id="carouselExample" class="carousel slide">
		<div class="carousel-inner">
		  <div class="carousel-item active">
			<img src="../images/carousel/azul-estetica-1.png" class="carousel-img" class="d-block w-100" alt="...">
		  </div>
		  <div class="carousel-item">
			<img src="../images/azul-estetica-ciudad-vieja.jpg" class="carousel-img" class="d-block w-100" alt="...">
		  </div>
		  <div class="carousel-item">
			<img src="../images/carousel/azul-estetica-3.png" class="carousel-img" class="d-block w-100" alt="...">
		  </div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
		  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		  <span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
		  <span class="carousel-control-next-icon" aria-hidden="true"></span>
		  <span class="visually-hidden">Next</span>
		</button>
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

<script src="../js/ecommerce copy.js"></script>
<script src="../js/menu.js"></script>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>