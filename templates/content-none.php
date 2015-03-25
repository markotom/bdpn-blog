<h1 class="page-title">No se ha encontrado nada</h1>
<div class="page-content">
	<?php if ( is_search() ) : ?>

	<p>Disculpa, pero nada se ha encontrado. Intenta de nuevo con palabras clave diferentes.</p>
	<?php get_search_form(); ?>

	<?php else : ?>

	<p>Parece que el contenido se ha perdido. Quizás una búsqueda pueda ayudarte.</p>
	<?php get_search_form(); ?>

	<?php endif; ?>
</div><!-- .page-content -->
