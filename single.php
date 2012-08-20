<?php
/**
 * Single posts
 *
 * @package WordPress
 * @subpackage Twelr
 */

get_header(); ?>

<div class="main">
	<nav>
	  <p class="left"><?php previous_posts_link('&larr; Previous Post'); ?></p>
	  <p class="right"><?php next_posts_link('Next Post &rarr;'); ?></p>
	</nav>
	<?php if (have_posts()) while (have_posts()) : the_post(); ?>   
	  <h1><?php the_title(); ?></h1>
	  <?php the_content(); ?>
	  <?php comments_template( '', true ); ?>
  <?php endwhile; ?>
</div>
  
<?php get_sidebar(); ?>
<?php get_footer(); ?>