<?php get_header(); ?>

<!-- .container -->
<div class="container">

	<!-- .col-(3|2|1)-(left|right|full) -->
	<div class="<?php bdpn_current_layout(); ?>">

		<!-- .content -->
		<div class="content" role="main">
			<?php
				// Start the loop
				while ( have_posts() ) : the_post();

					// Get template page
					get_template_part( 'templates/content', 'page' );

					// If comments are open or if post has at least one comment
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}

				endwhile;
			?>
		</div><!-- /.content -->

		<?php bdpn_main_sidebar(); ?>
		<?php bdpn_secondary_sidebar(); ?>

	</div><!-- /.col-(3|2|1)-(left|right|full) -->

</div><!-- /.container -->

<?php get_footer(); ?>
