<?php
/**
 * The main template file; displays a page when nothing more specific matches a query.
 * http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twelr
 */

get_header(); ?>

<div class="main span8">
		<?php if ( have_posts() ) : ?>
			<?php twentyeleven_content_nav( 'nav-above' ); ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
			<?php twentyeleven_content_nav( 'nav-below' ); ?>
		<?php else : ?>
			<h1><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
			<?php get_search_form(); ?>
		<?php endif; ?>
</div><!-- .main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>