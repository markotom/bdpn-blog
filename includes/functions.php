<?php

/**
 * -----------------------------------------------------------------------------
 * Functions
 * -----------------------------------------------------------------------------
 *
 */

function bdpn_global_layout() {

	// Echo global layout
	$global_layout = bdpn_get_global_layout();
	echo $global_layout;

}

		function bdpn_get_global_layout() {

			// Get global layout
			$column_global_layout = ot_get_option( 'bdpn-layout-global' );
			return $column_global_layout;

		}

function bdpn_current_layout() {

	// Echo current layout
	$current_layout = bdpn_get_current_layout();
	echo $current_layout;

}

		function bdpn_get_current_layout() {

			wp_reset_query();

			if ( is_home() ) {

				// Set home layout name
				$layout_name = 'bdpn-layout-home';

			} elseif ( is_single() ) {

				// Set single layout name
				$layout_name = 'bdpn-layout-single';

			} elseif ( is_category() ) {

				// Set category layout name
				$layout_name = 'bdpn-layout-category';

			} elseif ( is_archive() ) {

				// Set archive layout name
				$layout_name = 'bdpn-layout-archive';

			} elseif ( is_search() ) {

				// Set search layout name
				$layout_name = 'bdpn-layout-search';

			} elseif ( is_page() ) {

				// Set page layout name
				$layout_name = 'bdpn-layout-page';

			} elseif ( is_404() ) {

				// Set error 404 layout name
				$layout_name = 'bdpn-layout-404';

			} else {

				// Set global layout name by default
				$layout_name = 'bdpn-layout-global';

			}

			// Get global layout
			$global_layout = bdpn_get_global_layout();

			// Set current layout
			$current_layout = ot_get_option( $layout_name );


			return  ! $current_layout || $current_layout === 'inherit'
							? $global_layout
							: $current_layout;

		}

function bdpn_main_sidebar() {

	// Hide main sidebar if specified full column
	if (  bdpn_get_current_layout() != 'col-1-full' ) :

		// Get main sidebar
		get_sidebar();

	endif;

}

function bdpn_secondary_sidebar() {

	// Show secondary sidebar if specified three columns
	if (  bdpn_get_current_layout() === 'col-3-middle' ||
				bdpn_get_current_layout() === 'col-3-right' ||
				bdpn_get_current_layout() === 'col-3-left'   ) :

		// Get secondary sidebar
		get_sidebar( 'secondary' );

	endif;

}

function bdpn_pagination() {

	// You can use WP-PageNavi plugin
	// https://wordpress.org/plugins/wp-pagenavi
	if ( function_exists( 'wp_pagenavi' ) ) :

		wp_pagenavi();

	else:

		echo '<ul class="pager"><li class="previous">';

			previous_posts_link();

		echo '</li><li class="next right">';

			next_posts_link();

		echo '</li></ul>';

	endif;

}

function bdpn_post_thumbnail( $thumb_size = 'thumb-large' ) {

	$permalink = get_permalink();

	if ( has_post_thumbnail() ) :

		if ( is_singular() ) :

			echo '<div class="post-thumbnail">';
				the_post_thumbnail( $thumb_size, array( 'class' => 'img-responsive' ) );
			echo '</div>';

		else :

			echo '<a href="' . $permalink . '" title="' . the_title_attribute( array( 'echo' => 0 ) ) . '" class="post-thumbnail" rel="bookmark">';
				the_post_thumbnail( $thumb_size, array( 'class' => 'img-responsive' ) );
			echo '</a>';

		endif;

	else :

		if ( ! is_singular() ) :

			echo '<a href="' . $permalink . '" class="post-thumbnail" rel="bookmark">';
				echo '<img src="'. get_stylesheet_directory_uri() .'/assets/images/no-photo.gif" alt="">';
			echo'</a>';

		endif;

	endif;

}
?>
