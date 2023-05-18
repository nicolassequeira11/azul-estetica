<?php
    session_start();
    require_once ("../funciones/funciones.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ficha']) && validar_ficha($_POST['ficha'])){
        if(!empty($_POST['miel'])){return header(location: "../index.php");}
        $campos = [
            'nombre' => 'NOMBRE',
            'apellido' => 'APELLIDO',
            'email' => 'CORREO ELECTRONICO',
            'pass' => 'CONTRASEÑA',
            'repass' => 'REPETIR CONTRASEÑA'
        ];

        $errores = validar($campos);
        $errores = array_merge($errores, comparadorDeClaves($_POST['pass'], $_POST['repass']));

        if(empty($errores)){
            $errores = registro();
        }
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

<div class="form-usuario">

    <form method="POST" class="form-usuario__registro">
        
        <input type="hidden" name="ficha" value="<?php echo ficha_csrf(); ?>">
        <input type="hidden" name="miel" value="">
        <h2 class="form-usuario__titulo">Registrarse</h2>

        <div class="row form-usuario__cont">

            <div class="form-usuario__error">
                <?php if(!empty($errores)){echo  mostrarErrores($errores);} ?>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <input type="text" name="nombre" placeholder="Nombre *" value="<?php echo $_POST['nombre'] ?? '' ?>" class="form-control input-lg">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <input type="text" name="apellido" placeholder="Apellido  *" value="<?php echo $_POST['apellido'] ?? '' ?>" class="form-control input-lg">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <input type="text" name="email" placeholder="Email  *" value="<?php echo $_POST['email'] ?? '' ?>" class="form-control input-lg">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <input type="password" name="pass" placeholder="Contraseña  *" class="form-control input-lg">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <input type="password" name="repass" placeholder="Repetir contraseña  *" class="form-control input-lg">
                </div>
            </div>
            <div class="col-sm-12">
                <button class="col-sm-12 form-control-lg form-usuario__boton" name="registroBtn" type="submit">REGISTRARSE</button>
            </div>

        </div>

    </form>

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