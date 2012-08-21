<?php
/**
* Search page (Not Found).
*
 * @package WordPress
 * @subpackage Twelr
*/

get_header(); ?>

<div class="main span8">
	<?php if ( have_posts() ) : ?>
		<h1 class="page-title">
			<?php printf( __( 'Search Results for: %s', 'twentyeleven' ), '<span>' . get_search_query() . '</span>' ); ?>
		</h1>
		<?php twentyeleven_content_nav( 'nav-above' ); ?>
		<?php while ( have_posts() ) : the_post(); ?>
	    <?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
		<?php twentyeleven_content_nav( 'nav-below' ); ?>
	<?php else : ?>
		<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
		<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyeleven' ); ?></p>
		<?php get_search_form(); ?>
	<?php endif; ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>