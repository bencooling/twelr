<?php
/**
* 404 page (Not Found).
*
 * @package WordPress
 * @subpackage Twelr
*/

get_header(); ?>

<div class="main">
  <?php if (have_posts()) while (have_posts()) : the_post(); ?>   
    <h1><?php the_title(); ?></h1>
    <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'twentyeleven' ); ?></p>
    <?php get_search_form(); ?>
	<?php endwhile; ?>
</div>
  
<?php get_sidebar(); ?>
<?php get_footer(); ?>