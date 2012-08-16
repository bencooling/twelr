<?php
/*
Template Name: Snarfer
*/ 
get_header(); ?>

<?php
// sidebar fix
global $paged;
// home page fix
if ( get_query_var('paged') ) $paged = get_query_var('paged');
else if ( get_query_var('page') ) $paged = get_query_var('page');
else $paged = 1;
$ppp = get_option('posts_per_page');
?>
<?php query_posts('posts_per_page='.$ppp.'&paged='.$paged); ?>
<?php if(have_posts()) while (have_posts()) : the_post(); ?>
  <h1><?php the_title(); ?></h1>
  the_excerpt();
<?php endwhile; ?>
<p><?php previous_posts_link('&larr; Previous Post'); ?></p>
<p><?php next_posts_link('Next Post &rarr;'); ?></p>
<?php // wp_pagenavi(); ?>
<?php wp_reset_query(); ?>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
