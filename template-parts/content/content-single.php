<?php

/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rrinsurancegroup
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

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

	<div class="container px-4 py-10 mx-auto lg:py-20">
		<div <?php rrinsurancegroup_content_class('entry-content w-full lg:w-10/12 mx-auto'); ?>>
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers. */
						__('Continue reading<span class="sr-only"> "%s"</span>', 'rrinsurancegroup'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);

			wp_link_pages(
				array(
					'before' => '<div>' . __('Pages:', 'rrinsurancegroup'),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
	</div>

	<footer class="entry-footer">
		<div class="container px-4">
			<footer class="flex items-center w-full gap-4 mx-auto mb-12 lg:w-10/12 md:flex-wrap entry-footer">
				<?php
				$author = get_the_author();
				?>
				<span class="inline-flex font-normal font-base text-rrRed text-title-6">
					<?php echo $author; ?>
				</span>
				<span class="font-normal font-base text-title-6 group-hover:text-gray-500">
					<?php
					$date = get_the_date();
					echo $date;
					?>
				</span>
			</footer><!-- .entry-footer -->
		</div>
	</footer><!-- .entry-footer -->

</article><!-- #post-${ID} -->