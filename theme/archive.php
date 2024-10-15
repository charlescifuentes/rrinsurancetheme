<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rrinsurancegroup
 */

get_header();
?>

<section id="primary">
	<main id="main">

		<?php if (have_posts()) : ?>

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
							<h1 class="tracking-wide uppercase hero__page__title text-center lg:max-w-[850px] text-title-5 lg:text-title-3"><?php the_title(); ?></h1>
						</div>
					</div>
				</div>
			<?php
			}
			?>

		<?php
			// Start the Loop.
			while (have_posts()) :
				the_post();
				get_template_part('template-parts/content/content', 'excerpt');

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			rrinsurancegroup_the_posts_navigation();

		else :

			// If no content, include the "No posts found" template.
			get_template_part('template-parts/content/content', 'none');

		endif;
		?>
	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
