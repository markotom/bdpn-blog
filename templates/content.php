<!-- #post-? -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- .entry-wrapper -->
	<div class="entry-wrapper">

		<!-- .entry-header -->
		<header class="entry-header">
			<?php if ( ! is_single() ) : ?>
			<!-- .entry-meta.entry-meta-top -->
			<div class="entry-meta entry-meta-top">
				<span class="entry-meta-categories"><?php the_category(' '); ?></span>
			</div><!-- /.entry-meta.entry-meta-top -->
			<?php endif; ?>

			<?php if ( is_single() ) : ?>
			<h1 class="h3 entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
			<h1 class="h4 entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			<?php endif; ?>

			<!-- .entry-meta.entry-meta-middle -->
			<div class="entry-meta entry-meta-middle">
				<!-- .entry-meta-author -->
				<div class="entry-meta-author">
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
						<span class="fa fa-user"></span>
						<?php the_author_meta( 'display_name' ); ?>
					</a>
				</div><!-- /.entry-meta-author -->

				<!-- .entry-meta-date -->
				<div class="entry-meta-date">
					<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_time() ); ?>">
						<span class="fa fa-clock-o"></span>
						<?php the_time( get_option( 'date_format' ) ); ?>
					</a>
				</div><!-- /.entry-meta-date -->

				<?php if ( comments_open() && get_comments_number() && ! post_password_required() ) : ?>
				<!-- .entry-meta-comments -->
				<div class="entry-meta-comments">
					<?php
						$comment_icon = '<span class="glyphicon glyphicon-comment"></span> ';
						comments_popup_link( null, $comment_icon . __( '1 Comment' ), $comment_icon . __( '% Comments' ) );
					?>
				</div><!-- /.entry-meta-comments -->
				<?php endif; ?>
			</div><!-- /.entry-meta.entry-meta-middle -->
		</header><!-- /.entry-header -->

		<?php if ( is_single() ) : ?>
		<!-- .entry-content -->
		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- /.entry-content -->
		<?php else : ?>
		<!-- .entry-summary -->
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- /.entry-summary -->
		<?php endif; ?>

		<!-- .entry-meta.entry-meta-bottom -->
		<footer class="entry-meta entry-meta-bottom">
			<span class="entry-meta-tags">
				<?php
					$tag_list = get_the_tag_list( null, ' ' );
					if ( ! empty( $tag_list ) )
						echo $tag_list;
				?>
			</span>
		</footer><!-- /.entry-meta.entry-meta-bottom -->

	</div><!-- /.entry-wrapper -->

</article><!-- /#post-? -->
