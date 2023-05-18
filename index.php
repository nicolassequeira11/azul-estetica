<?php
    session_start();
    require_once ("funciones/funciones.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $errores = registro();
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
  	<link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="admin/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="sass/styles.css?a=<?php echo(rand()); ?>">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
<?php
	include_once "admin/db_ecommerce.php";
?>

<header id="nav">

<nav class="nav">
	<div class="logo"><a href="index.php" class="logo__link"><img src="images/azul-white.png" class="logo__img" alt=""></a></div>
		<ul class="nav__links">
			<li class="nav__link"><a class="nav__link__texto" href="index.php">Inicio</a></li>
			<li class="nav__link"><a class="nav__link__texto" href="html/servicios.php">Servicios</a></li>
			<li class="nav__link"><a class="nav__link__texto" href="html/promociones.php">Promociones</a></li>
			<li class="nav__link"><a class="nav__link__texto" href="html/nosotros.php">Nosotros</a></li>
			<li class="nav__link"><a class="nav__link__texto" href="html/contacto.php">Contacto</a></li>
			<li class="nav__link"><a class="nav__link__texto" href="html/catalogo.php">Catalogo</a></li>

			<?php
				if(isset($_SESSION['usuario'])){
					echo '
						<li class="nav__link">
							<i class="fa fa-user" style="color:#c0c0b4; margin: auto; padding-right:0.5em;"></i>
							<a class="nav__link__texto" href="html/perfil.php">'.$_SESSION['usuario'].'</a>
						</li>
					';
				} else {
					echo '
						<li class="nav__link">
							<i class="fa fa-user" style="color:#c0c0b4; margin: auto; padding-right:0.5em;"></i>
							<a class="nav__link__texto" href="html/login.php">Iniciar Sesión</a>
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

    <div class="carousel-home">
        <video class="carousel-home__img" src="./videos/loreal-curl-expression.mp4" autoplay muted loop alt="Azul Estetica"></video>
    </div>

	<section class="servicio">

		<div class="servicio__cont"><img src="./images/servicios/peluqueria.png" alt="" class="servicio__img"></div>
		<div class="servicio__cont"><img src="./images/servicios/depilacion.png" alt="" class="servicio__img"></div>
		<div class="servicio__cont"><img src="./images/servicios/maquillaje.png" alt="" class="servicio__img"></div>
		<div class="servicio__cont"><img src="./images/servicios/manos.png" alt="" class="servicio__img"></div>

	</section>
	
	<section>

		<div class="marcas">
			<div class="marcas__cont" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="200" data-aos-offset="0"><img class="marcas__img" src="./images/productos/kerastase.png" alt=""></div>
			<div class="marcas__cont" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="250" data-aos-offset="0"><img class="marcas__img" src="./images/productos/loreal.png" alt=""></div>
			<div class="marcas__cont" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="300" data-aos-offset="0"><img class="marcas__img" src="./images/productos/redken.png" alt=""></div>
			<div class="marcas__cont" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="350" data-aos-offset="0"><img class="marcas__img" src="./images/productos/matrix.png" alt=""></div>
		</div>

	</section>

	<section>
		
		<div class="productos">
			<div class="productos__cont1"> <img src="./images/productos/Blond Absolu/kerastase-productos.png" alt="" class="productos__cont1__img"></div>
			<div class="productos__cont2">
				<figure class="productos__item">
					<img src="./images/productos/Blond Absolu/Blond-Absolu-Bain-Lumiere.png" alt="" class="productos__item__img">
					<h2 class="productos__item__titulo">Bain Lumiere</h2>
					<p class="productos__item__precio">$1500 UYU</p>
					<button class="productos__item__boton">Consultar Stock</button>
				</figure>
				<figure class="productos__item">
					<img src="./images/productos/Blond Absolu/Blond-Absolu-Cicaflash.png" alt="" class="productos__item__img">
					<h2 class="productos__item__titulo">Cicaflash</h2>
					<p class="productos__item__precio">$1500 UYU</p>
					<button class="productos__item__boton">Consultar Stock</button>
				</figure>
				<figure class="productos__item">
					<img src="./images/productos/Blond Absolu/Blond-Absolu-Masque.png" alt="" class="productos__item__img">
					<h2 class="productos__item__titulo">Masque Ultra Violet</h2>
					<p class="productos__item__precio">$1500 UYU</p>
					<button class="productos__item__boton">Consultar Stock</button>
				</figure>
				<figure class="productos__item">
					<img src="./images/productos/Blond Absolu/Blond-Absolu-Cicaplasme.png" alt="" class="productos__item__img">
					<h2 class="productos__item__titulo">Cicaplasme</h2>
					<p class="productos__item__precio">$1500 UYU</p>
					<button class="productos__item__boton">Consultar Stock</button>
				</figure>
			</div>
		</div>

	</section>

	<section>

		<div class="publi-horizontal-2">

			<div class="publi-horizontal-2__cont"><a href="html/fusio-dose.php"><img src="./images/productos/Fusio-Dose/banner-fusio-dose.jpg" alt="" class="publi-horizontal-2__img"></a></div>
			<div class="publi-horizontal-2__cont"><a href="html/fusio-dose.php"><img src="./images/productos/kerastase-curl-expression.png" alt="" class="publi-horizontal-2__img"></div></a>

		</div>

	</section>

	<div class="slogan-1">
		<p class="slogan-1__texto" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="200" data-aos-offset="0">Cuidar de sí mismo no es un gasto es una inversión</p>
	</div>

	<div class="redes__cont-logo"><img class="redes__img-logo" src="./images/redes/logo-insta.PNG" alt=""><p class="redes__titulo">azulestetica</p></div>
	<section class="redes">
		<a data-aos="flip-left" data-aos-delay="200" href="https://www.instagram.com/azulestetica/" target="_blank"><div class="redes__cont"><img class="redes__img" src="./images/redes/redes-azul-estetica-1.png" alt=""></div></a>
		<a data-aos="flip-left" data-aos-delay="200" href="https://www.instagram.com/azulestetica/" target="_blank"><div class="redes__cont"><img class="redes__img" src="./images/redes/redes-azul-estetica-2.png" alt=""></div></a>
		<a data-aos="flip-left" data-aos-delay="200" href="https://www.instagram.com/azulestetica/" target="_blank"><div class="redes__cont"><img class="redes__img" src="./images/redes/redes-azul-estetica-3.png" alt=""></div></a>
		<a data-aos="flip-left" data-aos-delay="200" href="https://www.instagram.com/azulestetica/" target="_blank"><div class="redes__cont"><img class="redes__img" src="./images/redes/redes-azul-estetica-4.png" alt=""></div></a>
		<a data-aos="flip-left" data-aos-delay="200" href="https://www.instagram.com/azulestetica/" target="_blank"><div class="redes__cont"><img class="redes__img" src="./images/redes/redes-azul-estetica-5.png" alt=""></div></a>

	</section>

	<footer>


		<div class="footer__payments">
            <div class="footer__payments__cont"><img src="images/payments/visa.svg" alt="" class="footer__payments__img"></div>
            <div class="footer__payments__cont"><img src="images/payments/master.svg" alt="" class="footer__payments__img"></div>
            <div class="footer__payments__cont"><img src="images/payments/oca.svg" alt="" class="footer__payments__img"></div>
            <div class="footer__payments__cont"><img src="images/payments/scotiabank.svg" alt="" class="footer__payments__img"></div>
            <div class="footer__payments__cont"><img src="images/payments/ebrou.svg"" class="footer__payments__img"></div>
            <div class="footer__payments__cont"><img src="images/payments/anda.svg"" class="footer__payments__img"></div>
            <div class="footer__payments__cont"><img src="images/payments/cabal.svg" alt="" class="footer__payments__img"></div>
            <div class="footer__payments__cont"><img src="images/payments/bbvanet.svg" alt="" class="footer__payments__img"></div>
            <div class="footer__payments__cont"><img src="images/payments/creditel.svg" alt="" class="footer__payments__img"></div>
        </div>

		<div class="footer__text">
			<div class="footer__text__cont">
				<p class="footer__text__info">© Azul Estética / Todos los Derechos Reservados / Página Web Diseñada y Desarrollada por Nicolás Sequeira</p>
			</div>
		</div>
	</footer>

<script src="js/ecommerce.js"></script>
<script src="js/menu.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script>
	AOS.init();
</script>
<!-- jQuery -->
<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- daterangepicker -->
<script src="admin/plugins/moment/moment.min.js"></script>
<script src="admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="admin/dist/js/pages/dashboard.js"></script>

</body>
</html>