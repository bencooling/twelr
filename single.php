<?php
/**
 * Single posts
 *
 * @package WordPress
 * @subpackage Twelr
 */

get_header(); ?>

<div class="main span8">
	<nav>
	  <p class="left"><?php previous_posts_link('&larr; Previous Post'); ?></p>
	  <p class="right"><?php next_posts_link('Next Post &rarr;'); ?></p>
	</nav>
	<?php if (have_posts()) while (have_posts()) : the_post(); ?>   
	  <?php get_template_part( 'content', get_post_format() ); ?>
	  <?php comments_template( '', true ); ?>
  <?php endwhile; ?>
</div>
  
<?php get_sidebar(); ?>
<?php get_footer(); ?>