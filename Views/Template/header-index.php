<!DOCTYPE html>
<html lang="<?= SITE_LANG ?>">

<head>
	<meta charset="<?= SITE_CHARSET ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta content="Municipalidad de Perito Moreno" name="description">
	<meta content="" name="keywords">


	<!-- Favicons -->
	<?= get_favicon() ?>
	<link href="<?= IMAGE ?>/apple-touch-icon.png" rel="apple-touch-icon">

	<!--CSS, Normalize e Iconos de Bootstrap-->
	<link rel="stylesheet" href="<?= CSS ?>/normalize.css">
	<link rel="stylesheet" href="<?= CSS ?>/bootstrap-icons.css">
	<link rel="stylesheet" href="<?= CSS ?>/index/style-general.css">
	<link rel="stylesheet" href="<?= CSS ?>/index/style-grid.css">
	<link rel="stylesheet" href="<?= CSS ?>/index/style-header-contact.css">
	<link rel="stylesheet" href="<?= CSS ?>/index/style-header.css">
	<link rel="stylesheet" href="<?= CSS ?>/index/style-section.css">
	<link rel="stylesheet" href="<?= CSS ?>/index/style-aside.css">
	<link rel="stylesheet" href="<?= CSS ?>/index/style-footer.css">

	<title><?php echo $data["page_title"]; ?></title>
</head>

<body>

	<div class="contenedor">

		<!--//--Contact info--//-->
		<?php require "header-contact-index.php"; ?>


		<!--//--header--//-->
		<header class="header container-fluid">
			<!--//--Logo--//-->
			<a href="<?= base_url ?>/Home" class="logo" id="logo">
				<div class="espacio"></div>
				<img src="<?= get_logo() ?>" alt="Municipalidad de Perito Moreno">
				<div class="letra-logo">
					<h1>
						<span>Municipalidad de</span>
						<span>Perito Moreno</span>
					</h1>
				</div>

			</a>

			<!--//--navbar--//-->
			<nav class="nav contanier-fluid">
					<ul class="nav-menu">
						<li class="nav-menu-item"><a class="nav-menu-link active" href="<?= base_url ?>/Home">HOME</a></li>
						<li class="nav-menu-item"><a class="nav-menu-link " href="<?= base_url ?>/Historia">PERITO MORENO</a></li>
						<li class="nav-menu-item"><a class="nav-menu-link " href="">IMPUESTOS</a></li>
						<li class="nav-menu-item"><a class="nav-menu-link " href="<?= base_url ?>/Tramite">TRÁMITES</a></li>
						<li class="nav-menu-item"><a class="nav-menu-link " href="<?= base_url ?>/Gobierno">GOBIERNO</a></li>
						<li class="nav-menu-item"><a class="nav-menu-link " href="<?= base_url ?>/Noticia">NOTICIAS</a></li>
						<li class="nav-menu-item"><a class="nav-menu-link " href="<?= base_url ?>/Contacto">CONTACTOS</a></li>
					</ul>
				<button class="toggle-menu-list toggle-menu_visible">
					<i class="bi bi-list"></i>
				</button>
				<button class="toggle-menu-x">
					<i class="bi bi-x-lg"></i>
				</button>
			</nav>


			<!--//--search--//-->
			<div class="search">
				<input type="text" placeholder="Buscar">
				<i class="bi bi-search"></i>
			</div>


		</header>