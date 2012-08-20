<?php
/**
* Search page (Not Found).
*
 * @package WordPress
 * @subpackage Twelr
*/

get_header(); ?>

<div class="main">
	<?php if ( have_posts() ) : ?>
		<h1 class="page-title">
			<?php printf( __( 'Search Results for: %s', 'twentyeleven' ), '<span>' . get_search_query() . '</span>' ); ?>
		</h1>
		<?php twentyeleven_content_nav( 'nav-above' ); ?>
		<?php while ( have_posts() ) : the_post(); ?>
	    <h2><?php the_title(); ?></h2>
	    <?php the_content(); ?>
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