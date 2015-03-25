<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header id="header">
		<div class="container">
			<div class="logo-unam pull-right">
				<a href="http://www.unam.mx">
					<img src="http://www.bdpn.unam.mx/images/unam_bdpn_unam.png" alt="">
				</a>
			</div>
			<div class="logo pull-left">
				<a href="<?php echo home_url() ; ?>">
					<img src="http://www.bdpn.unam.mx/images/unam_bdpn_bgd_logo.png" alt="">
				</a>
			</div>
			<h1 class="title">
				<a href="<?php echo home_url() ; ?>"><?php bloginfo( 'sitename' ) ?></a>
			</h1>
			<h2 class="subtitle"><?php bloginfo( 'description' ) ?></h2>

			<!-- TODO: make a wordpress menu -->
			<ul id="nav-main" class="list-unstyled">
				<li class="ob"><a href="http://www.bdpn.unam.mx/books">Obras</a></li>
				<li class="au"><a href="http://www.bdpn.unam.mx/authors">Autores</a></li>
				<li class="co"><a href="http://www.bdpn.unam.mx/collections">Colecciones</a></li>
				<li class="in"><a href="http://www.bdpn.unam.mx/terms">Índices</a></li>
			</ul>
		</div>
	</header>

	<nav class="navbar navbar-inverse navbar-static-top" id="navbar-main">
		<div class="container">
			<!-- TODO: make a wordpress menu -->
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#">Link</a></li>
				<li><a href="#">Link</a></li>
				<li><a href="#">Link</a></li>
			</ul>
		</div>
	</nav>
