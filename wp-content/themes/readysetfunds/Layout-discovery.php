<?php
/*
Template Name: Post Discovery
*/
/**
 * The template for displaying posts
 * This layout is used for the post discovery page.
 */

$wordpressUrl = get_site_url();
?>

<?php get_header('discovery'); ?>

<?php
  // Start the Loop.
if ( have_posts() ) : 
  while (have_posts()) : the_post();
    //display posts
  endwhile;
endif; 
?>



<?php get_footer(); ?>