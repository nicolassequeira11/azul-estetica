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

    <section class="servicios-cont">

        <div class="servicios-precios" id="peluqueria">
            <div class="servicios-precios__list">

                    <div class="servicios-precios__img">
                        <img class="servicios-precios__img__img" src="../images/servicios/peluqueria.jpg" alt="">
                        <div class="servicios-precios__img__titulo">PELUQUERÍA</div>
                    </div>
                    
                    <div class="servicios-precios__info">

                        <ul class="servicios-items">
                            <li class="servicios-items__cont">CORTE
                                <ul class="servicios-items__texto-cont">
                                    <li class="servicios-items__texto">- Corte Dama $560</li>
                                    <li class="servicios-items__texto">- Corte Caballero c/Lavado y Secado $360</li>
                                    <li class="servicios-items__texto">- Corte Cerquillo $290</li>
                                    <li class="servicios-items__texto">- Moño (desde) $990</li>
                                </ul>
                            </li>

                            <li class="servicios-items__cont">LAVADO
                                <ul class="servicios-items__texto-cont">
                                    <li class="servicios-items__texto">- Lavado $220</li>
                                    <li class="servicios-items__texto">- Lavado L'OREAL $330</li>
                                    <li class="servicios-items__texto">- Lavado Kerastase $410</li>
                                    <li class="servicios-items__texto">- Lavado Moroccanoil $410</li>
                                </ul>
                            </li>

                            <li class="servicios-items__cont">BRUSHING
                                <ul class="servicios-items__texto-cont">
                                    <li class="servicios-items__texto">- Brushing Corto $280</li>
                                    <li class="servicios-items__texto">- Brushing Largo $290</li>
                                    <li class="servicios-items__texto">- Brushing Extra Largo $360</li>
                                    <li class="servicios-items__texto">- Brushing Inteligente (desde) $3500</li>
                                    <li class="servicios-items__texto">- Fusion Kerastase c/Brushing $1590</li>
                                    <li class="servicios-items__texto">- Tratamiento Redken c/Brushing $1490</li>
                                </ul>
                            </li>

                            <li class="servicios-items__cont">SECADO
                                <ul class="servicios-items__texto-cont">
                                    <li class="servicios-items__texto">- Secado con forma $280</li>
                                </ul>
                            </li>

                            <li class="servicios-items__cont">LACIADO
                                <ul class="servicios-items__texto-cont">
                                    <li class="servicios-items__texto">- Laciado L'OREAL WELLA (desde) $2150</li>
                                </ul>
                            </li>

                        </ul>
                    </div>
            </div>
        </div>

        <div class="servicios-precios" id="color">
            <div class="servicios-precios__list">

                    <div class="servicios-precios__img">
                        <img class="servicios-precios__img__img" src="../images/servicios/color.jpg" alt="">
                        <div class="servicios-precios__img__titulo">COLOR</div>
                    </div>

                    <div class="servicios-precios__info">

                        <ul class="servicios-items">
                            <li class="servicios-items__cont">COLOR - Aplicación $430
                                <ul class="servicios-items__texto-cont">
                                    <li class="servicios-items__texto">- Color L'OREAL Wella c/Lavado $1350</li>
                                    <li class="servicios-items__texto">- Color CHROMATICS c/Lavado $1740</li>
                                    <li class="servicios-items__texto">- Color INOA c/Lavado $1590</li>
                                    <li class="servicios-items__texto">- Color EXPRESS SCHWARZKOPF $1590</li>
                                    <li class="servicios-items__texto">- Color Shade Q (desde) $2040</li>
                                    <li class="servicios-items__texto">- HENNA Polvo $1030</li>
                                    <li class="servicios-items__texto">- Color DIA RICHESSE $1490</li>
                                </ul>
                            </li>

                            <li class="servicios-items__cont">MECHAS
                                <ul class="servicios-items__texto-cont">
                                    <li class="servicios-items__texto">- Mechas c/Gorra (desde) $2600</li>
                                    <li class="servicios-items__texto">- Mechas c/Papel (desde) $2850</li>
                                </ul>
                            </li>

                            <li class="servicios-items__cont">REFLEJOS
                                <ul class="servicios-items__texto-cont">
                                    <li class="servicios-items__texto">- Reflejos (desde) $2550</li>
                                    <li class="servicios-items__texto">- Reflejos c/Papel (desde) $2950</li>
                                </ul>
                            </li>

                            <li class="servicios-items__cont">DECOLORACIÓN
                                <ul class="servicios-items__texto-cont">
                                    <li class="servicios-items__texto">- Decoloración (desde) $3550</li>
                                    <li class="servicios-items__texto">- Majimeches Platinium c/Gorra (desde) $3250</li>
                                    <li class="servicios-items__texto">- Majimeches Platinium c/Papel (desde) $3650</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
            </div>
        </div>

        <div class="servicios-precios" id="manosypies">
            <div class="servicios-precios__list">

                    <div class="servicios-precios__img">
                        <img class="servicios-precios__img__img" src="../images/servicios/manos.jpg" alt="">
                        <div class="servicios-precios__img__titulo">MANOS Y PIES</div>
                    </div>

                    <div class="servicios-precios__info">

                        <ul class="servicios-items">
                            <li class="servicios-items__cont">MANOS
                                <ul class="servicios-items__texto-cont">
                                    <li class="servicios-items__texto">- Manos Completas con opi $690</li>
                                    <li class="servicios-items__texto">- Manos c/Guante Hidratante $395</li>
                                    <li class="servicios-items__texto">- Manos + Kapping $1190</li>
                                    <li class="servicios-items__texto">- Parafina de Manos $350</li>
                                </ul>
                            </li>

                            <li class="servicios-items__cont">PIES
                                <ul class="servicios-items__texto-cont">
                                    <li class="servicios-items__texto">- Estetica Completa en Pie $690</li>
                                    <li class="servicios-items__texto">- Estetica Basica en Pie $520</li>
                                    <li class="servicios-items__texto">- Parafina de Pies $420</li>
                                </ul>
                            </li>

                            <li class="servicios-items__cont">MANOS O PIES
                                <ul class="servicios-items__texto-cont">
                                    <li class="servicios-items__texto">- Cambio de Esmalte $295</li>
                                    <li class="servicios-items__texto">- Esmaltado en Gel $960</li>
                                    <li class="servicios-items__texto">- Uñas Esculpidas en Acrilico $1450</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
            </div>
        </div>

        <div class="servicios-precios" id="maquillaje">
            <div class="servicios-precios__list">

                    <div class="servicios-precios__img">
                        <img class="servicios-precios__img__img" src="../images/servicios/maquillaje.jpg" alt="">
                        <div class="servicios-precios__img__titulo">MAQUILLAJE</div>
                    </div>

                    <div class="servicios-precios__info">

                        <ul class="servicios-items">
                            <li class="servicios-items__cont">
                                <ul class="servicios-items__texto-cont">
                                    <li class="servicios-items__texto">- Maquillaje (desde) $990</li>
                                </ul>
                            </li>

                            <li class="servicios-items__cont">PESTAÑAS
                                <ul class="servicios-items__texto-cont">
                                    <li class="servicios-items__texto">- Pestañas en Ramillete $990</li>
                                    <li class="servicios-items__texto">- Pestañas Pelo a Pelo (desde) $1590</li>
                                </ul>
                            </li>   
                        </ul>
                    </div>
            </div>
        </div>

        <div class="servicios-precios" id="depilacion">
            <div class="servicios-precios__list">

                    <div class="servicios-precios__img">
                        <img class="servicios-precios__img__img" src="../images/servicios/depilacion.jpg" alt="">
                        <div class="servicios-precios__img__titulo">DEPILACIÓN</div>
                    </div>

                    <div class="servicios-precios__info">

                        <ul class="servicios-items">
                            <li class="servicios-items__cont">
                                <ul class="servicios-items__texto-cont">
                                    <li class="servicios-items__texto">- Pierna Entera $550</li>
                                    <li class="servicios-items__texto">- Media Pierna $450</li>
                                    <li class="servicios-items__texto">- Entrepierna $420</li>
                                    <li class="servicios-items__texto">- Entrepierna Completa $560</li>
                                    <li class="servicios-items__texto">- Axilas $350</li>
                                    <li class="servicios-items__texto">- Pierna Entera Sistema Español $650</li>
                                    <li class="servicios-items__texto">- Ceja, Bozo, Menton c/u $150</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
            </div>
        </div>

        <div class="servicios-precios" id="cosmetologia">
            <div class="servicios-precios__list">

                    <div class="servicios-precios__img">
                        <img class="servicios-precios__img__img" src="../images/servicios/cosmetologia.jpg" alt="">
                        <div class="servicios-precios__img__titulo">COSMETOLOGÍA</div>
                    </div>

                    <div class="servicios-precios__info">

                        <ul class="servicios-items">
                            <li class="servicios-items__cont">
                                <ul class="servicios-items__texto-cont">
                                    <li class="servicios-items__texto">- Limpieza de Cutis Profunda (desde) $1290</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
            </div>
        </div>

    </section>

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