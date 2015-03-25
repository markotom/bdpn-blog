<?php

/**
 * -----------------------------------------------------------------------------
 * OptionTree Framework
 * -----------------------------------------------------------------------------
 *
 */

// Hide pages from admin menu
add_filter( 'ot_show_pages', '__return_false' );

// Avoid create a default layout
add_filter( 'ot_show_new_layout', '__return_false' );

// Turn on theme mode
add_filter( 'ot_theme_mode', '__return_true' );

// Load template
require get_template_directory() . '/option-tree/ot-loader.php';

/**
 * -----------------------------------------------------------------------------
 * Theme Options
 * -----------------------------------------------------------------------------
 *
 */

// Set custom theme options
add_action( 'admin_init', 'custom_theme_options', 1 );

function custom_theme_options() {

	// OptionTree is not loaded yet
	if ( ! function_exists( 'ot_settings_id' ) )
		return false;

	// Get saved settings
	$saved_settings = get_option( ot_settings_id(), array() );

	// Column layouts
	$global_column_layouts = bdpn_get_column_layouts();
	array_shift( $global_column_layouts );

	$column_layouts = bdpn_get_column_layouts();

	// Set custom settings
	$custom_settings = array(

		// Contextual help
		'contextual_help' => array(
			'content' => array(
				array(
					'id' => 'information',
					'title' => 'Information',
					'content' => '
						<h1>Digital Library of Novohispanic Thought</h1>
						<p>Wordpress theme built to Digital Library of Novohispanic Thought project.</p>
						<hr>
						<p><a href="http://about.me/markotom">© Marco Godínez</a></p>
					'
				)
			)
		),

		// Sections
		'sections' => array(
			array(
				'id' => 'home',
				'title' => 'Home'
			),
			array(
				'id' => 'layout',
				'title' => 'Layout'
			),
			array(
				'id' => 'extras',
				'title' => 'Extras'
			)
		),

		// Settings
		'settings' => array(

			// Excerpt Length
			array(
				'id' => 'bdpn_excerpt_length',
				'label' => 'Cantidad de palabras del resumen',
				'desc' => 'Establece la cantidad de palabras que se mostrarán en el resumen de cada publicación',
				'std' => '55',
				'type' => 'numeric-slider',
				'section' => 'extras',
				'min_max_step' => '0,100,1'
			),

			// Featured Category
			array(
				'id' => 'bdpn_featured_category',
				'label' => 'Categoría destacada',
				'desc' => 'Muestra entradas de la categoría destacada en vez de mostrar todas las entradas de todas las categorías',
				'type' => 'category-select',
				'section' => 'home',
			),

			// Global layout
			array(
				'id'          => 'bdpn-layout-global',
				'label'       => 'Diseño global',
				'desc'        => 'Diseño global. Otros diseños reemplazarán este diseño si están definidos.',
				'std'         => 'col-3-left',
				'type'        => 'radio-image',
				'section'     => 'layout',
				'choices'     => $global_column_layouts
			),

			// Home layout
			array(
				'id'          => 'bdpn-layout-home',
				'label'       => 'Diseño de portada',
				'desc'        => 'Diseño de portada. Si no está definido, heradará el diseño global.',
				'std'         => 'inherit',
				'type'        => 'radio-image',
				'section'     => 'layout',
				'choices'     => $column_layouts
			),

			// Single layout
			array(
				'id'          => 'bdpn-layout-single',
				'label'       => 'Diseño de entrada',
				'desc'        => 'Diseño de entrada. Si no está definido, heradará el diseño global.',
				'std'         => 'inherit',
				'type'        => 'radio-image',
				'section'     => 'layout',
				'choices'     => $column_layouts
			),

			// Page layout
			array(
				'id'          => 'bdpn-layout-page',
				'label'       => 'Diseño de página',
				'desc'        => 'Diseño de página. Si no está definido, heradará el diseño global.',
				'std'         => 'inherit',
				'type'        => 'radio-image',
				'section'     => 'layout',
				'choices'     => $column_layouts
			),

			// Archive layout
			array(
				'id'          => 'bdpn-layout-archive',
				'label'       => 'Diseño de archivo',
				'desc'        => 'Diseño de archivo. Si no está definido, heradará el diseño global.',
				'std'         => 'inherit',
				'type'        => 'radio-image',
				'section'     => 'layout',
				'choices'     => $column_layouts
			),

			// Category layout
			array(
				'id'          => 'bdpn-layout-category',
				'label'       => 'Diseño de categoría',
				'desc'        => 'Diseño de categoría. Si no está definido, heradará el diseño global.',
				'std'         => 'inherit',
				'type'        => 'radio-image',
				'section'     => 'layout',
				'choices'     => $column_layouts
			),

			// Search layout
			array(
				'id'          => 'bdpn-layout-search',
				'label'       => 'Diseño de búsqueda',
				'desc'        => 'Diseño de búsqueda. Si no está definido, heradará el diseño global.',
				'std'         => 'inherit',
				'type'        => 'radio-image',
				'section'     => 'layout',
				'choices'     => $column_layouts
			),

			// Error 404 layout
			array(
				'id'          => 'bdpn-layout-404',
				'label'       => 'Diseño de error 404',
				'desc'        => 'Diseño de error 404. Si no está definido, heradará el diseño global.',
				'std'         => 'inherit',
				'type'        => 'radio-image',
				'section'     => 'layout',
				'choices'     => $column_layouts
			)
		)

	);

	// Save custom settings if are not the same
	if ( $saved_settings !== $custom_settings ) {
		update_option( ot_settings_id(), $custom_settings );
	}

}

// To get column layouts
function bdpn_get_column_layouts() {

	return array(
		array(
			'value'     => 'inherit',
			'label'     => 'Heredar',
			'src'       => get_template_directory_uri() . '/assets/images/layouts/inherit.gif'
		),
		array(
			'value'     => 'col-1-full',
			'label'     => '1 columna completa',
			'src'       => get_template_directory_uri() . '/assets/images/layouts/col-1-full.gif'
		),
		array(
			'value'     => 'col-2-right',
			'label'     => '2 columnas, contenido a la derecha',
			'src'       => get_template_directory_uri() . '/assets/images/layouts/col-2-right.gif'
		),
		array(
			'value'     => 'col-2-left',
			'label'     => '2 columnas, contenido a la izquierda',
			'src'       => get_template_directory_uri() . '/assets/images/layouts/col-2-left.gif'
		),
		array(
			'value'     => 'col-3-middle',
			'label'     => '3 columnas, contenido en medio',
			'src'       => get_template_directory_uri() . '/assets/images/layouts/col-3-middle.gif'
		),
		array(
			'value'     => 'col-3-right',
			'label'     => '3 columnas, contenido a la derecha',
			'src'       => get_template_directory_uri() . '/assets/images/layouts/col-3-right.gif'
		),
		array(
			'value'     => 'col-3-left',
			'label'     => '3 columnas, contenido a la izquierda',
			'src'       => get_template_directory_uri() . '/assets/images/layouts/col-3-left.gif'
		)
	);

}

?>
