<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package rrinsurancegroup
 */

get_header();
?>

<section id="primary">
	<main id="main">

		<?php
		if (!is_front_page()) {

			if (has_post_thumbnail()) {
				$background = get_the_post_thumbnail_url();
			} else {
				$image = get_field('hero_default', 'option');
				$background = $image['url'];
			}

		?>
			<div class="relative text-white bg-center bg-no-repeat bg-cover hero__page" style="background-image:url(<?php echo $background; ?>)">
				<div class="absolute top-0 left-0 bg-black bg-opacity-50 overlay size-full"></div>
				<div class="container px-4">
					<div class="flex items-center justify-center h-80 lg:h-96">
						<h1 class="tracking-wide uppercase hero__page__title text-center lg:max-w-[850px] text-title-5 lg:text-display-1">404</h1>
					</div>
				</div>
			</div>
		<?php
		}
		?>

		<div class="container px-4 py-16 text-center ">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e('Page Not Found', 'rrinsurancegroup'); ?></h1>
			</header><!-- .page-header -->

			<div <?php rrinsurancegroup_content_class('page-content'); ?>>
				<p><?php esc_html_e('This page could not be found. It might have been removed or renamed, or it may never have existed.', 'rrinsurancegroup'); ?></p>
			</div><!-- .page-content -->
		</div>

	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
