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
	<link rel="stylesheet" href="<?= CSS ?>/index/style-grid.css">
	<link rel="stylesheet" href="<?= CSS ?>/index/style-general.css">
	<link rel="stylesheet" href="<?= CSS ?>/index/style-header.css">
	<link rel="stylesheet" href="<?= CSS ?>/index/style-nav.css">
	<link rel="stylesheet" href="<?= CSS ?>/index/style-section.css">
	<link rel="stylesheet" href="<?= CSS ?>/index/style-aside.css">
	<link rel="stylesheet" href="<?= CSS ?>/index/style-footer.css">

	<title><?php echo $data["page_title"]; ?></title>
</head>
<body>

	<div class="contenedor">
		
	

	<!--//--header--//-->	
	<header class="header container">	
		<!--//--Logo--//-->
		<a href="<?= base_url?>/Home" class="logo" id="logo">
					
			<img src="<?= get_logo() ?>" alt="Municipalidad de Perito Moreno">
			<div class="letra-logo">
				<h1>
					<span>Municipalidad de</span>
					<span>Perito Moreno</span>
				</h1>
			</div>
							
		</a>
			
		<!--//--Redes--//-->
		<div class="redes">

			<div class="search">
				<input type="text" placeholder="¿Que deseas buscar?">
				<i class="bi bi-search"></i>
			</div>

			<div class="social">
				<a class="facebook-a" href=""><i class="bi bi-facebook"></i></a>
				<a class="correo-a" href=""><i class="bi bi-envelope-at"></i></a>
				<a class="instagram-a" href=""><i class="bi bi-instagram"></i></a>
			</div>
		</div>
	</header>	


	<!--//--Nav--//-->
	<?php require_once "nav-index.php"; ?>
	


		




