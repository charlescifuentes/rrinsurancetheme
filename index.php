<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no `home.php` file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rrinsurancegroup
 */

get_header();
?>

<section id="primary">
	<main id="main">

		<?php
		if (have_posts()) {


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
							<h1 class="tracking-wide uppercase hero__page__title text-center lg:max-w-[850px]">Blog</h1>
						</div>
					</div>
				</div>
			<?php
			}
			?>
			<div class="py-10 blog__container lg:py-20">
				<div class="container px-4">
					<div class="grid grid-cols-1 gap-8 md:grid-cols-2 xl:grid-cols-3">
						<?php
						// Load posts loop.
						while (have_posts()) {
							the_post();
							get_template_part('template-parts/content/content'); ?>
						<?php
						}
						?>
					</div>
				</div>
			</div>
			<div class="container px-4 pb-10">
				<div class="flex justify-center">
					<?php

					// Previous/next page navigation.
					rrinsurancegroup_the_posts_navigation();
					?>
				</div>
			</div>

		<?php
		} else {

			// If no content, include the "No posts found" template.
			get_template_part('template-parts/content/content', 'none');
		}
		?>

	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
