<?php get_header(); ?>

	<main class="main">

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<?php the_content(); // Dynamic Content ?>

		<?php endwhile; ?>

		<?php else: ?>

			<h1><?php _e( 'Sorry, nothing to display.', 'aspen' ); ?></h1>

		<?php endif; ?>

	</main>

<?php get_footer(); ?>
