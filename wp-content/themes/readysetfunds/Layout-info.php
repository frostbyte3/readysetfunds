<?php
/*
Template Name: Info
*/
/**
 * The template for displaying pages
 * This layout is used for homepage.
 */

$wordpressUrl = get_site_url();
?>

<?php get_header('info'); ?>

<?php
  // Start the Loop.
  while (have_posts()) : the_post();
    // Include the page content template.
   the_content();
  endwhile;
?>

<?php get_footer('home'); ?>