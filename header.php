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
				<a href="http://www.bdpn.unam.mx">
					<img src="http://www.bdpn.unam.mx/images/unam_bdpn_bgd_logo.png" alt="">
				</a>
			</div>
			<h1 class="title">
				<a href="http://www.bdpn.unam.mx"><?php bloginfo( 'sitename' ) ?></a>
			</h1>
			<h2 class="subtitle"><?php bloginfo( 'description' ) ?></h2>

			<?php

				if ( has_nav_menu( 'app' ) ) :

					// Shows app nav menu
					wp_nav_menu(
						array(
							'depth'          => -1,
							'theme_location' => 'app',
							'menu_id'        => 'nav-app',
							'menu_class'     => 'list-unstyled',
							'container'      => 'ul'
						)
					);

				endif;

			?>
		</div>
	</header>

	<?php if ( has_nav_menu( 'main' ) ) : ?>
	<nav class="navbar navbar-inverse navbar-static-top" id="navbar-main">
		<div class="container">
			<?php

					// Shows main nav menu
					wp_nav_menu(
						array(
							'depth'          => 3,
							'theme_location' => 'main',
							'menu_class'     => 'nav navbar-nav',
							'container'      => 'ul'
						)
					);

			?>
		</div>
	</nav>
	<?php endif; ?>
