<?php
/**
* 404 page (Not Found).
*
 * @package WordPress
 * @subpackage Twelr
*/

get_header(); ?>

<div class="main span8">
  <h1>Sorry that page couldn't be found.</h1>
  <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'twentyeleven' ); ?></p>
  <?php get_search_form(); ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>