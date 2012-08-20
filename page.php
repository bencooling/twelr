<?php
/**
 * Default page layout
 *
 * @package WordPress
 * @subpackage Twelr
 */

get_header(); ?>

<div class="main span8">
  <?php if (have_posts()) while (have_posts()) : the_post(); ?>   
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
  <?php endwhile; ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>