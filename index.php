<?php get_header(); ?>

<!-- .container -->
<div class="container">

	<!-- .col-(3|2|1)-(left|right|full) -->
	<div class="<?php bdpn_current_layout(); ?>">

		<!-- .content -->
		<div class="content" role="main">
			<?php

				if ( have_posts() ) :

					echo '<div class="post-loop">';

					// Start the loop
					while ( have_posts() ) : the_post();

						// Get template content
						get_template_part( 'templates/content' );

					endwhile;

					echo '</div>';

					bdpn_pagination();

				else :

					// Get "No post found" template
					get_template_part( 'templates/content', 'none' );

				endif;

			?>
		</div><!-- /.content -->

		<?php bdpn_main_sidebar(); ?>
		<?php bdpn_secondary_sidebar(); ?>

	</div><!-- /.col-(3|2|1)-(left|right|full) -->

</div><!-- /.container -->

<?php get_footer(); ?>
