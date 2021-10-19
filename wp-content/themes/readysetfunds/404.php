<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage ReadySetFunds
 * @since 1.0.0
 */

get_header("404");
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			 <div id="clouds">
            <div class="cloud x1"></div>
            <div class="cloud x1_5"></div>
            <div class="cloud x2"></div>
            <div class="cloud x3"></div>
            <div class="cloud x4"></div>
            <div class="cloud x5"></div>
        </div>
        <div class='c'>
            <div class='_404'>404</div>
            <hr>
            <div class='_1'>THE PAGE</div>
			<div class='_2'>WAS NOT FOUND</div>
			<?php get_search_form() ?>
            <a class='btn' href='#'>Take Me Home</a>
        </div>

		</main><!-- #main -->
	</section><!-- #primary -->