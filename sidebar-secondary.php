<?php if ( is_active_sidebar( 'secondary-sidebar' ) ) : ?>

<!-- .sidebar.sidebar-secondary -->
<div class="sidebar sidebar-secondary" role="complementary">
	<?php dynamic_sidebar( 'secondary-sidebar' ); ?>
</div><!-- /.sidebar.sidebar-secondary -->

<?php endif; ?>
