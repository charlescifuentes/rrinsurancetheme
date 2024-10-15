<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rrinsurancegroup
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('bg-gray-100 flex items-center hover:bg-gray-900 group cursor-pointer transition-all duration-300 ease-linear'); ?>>

	<div class="px-6 py-6 my-6 ">
		<header class="entry-header">
			<?php
			if (is_sticky() && is_home() && ! is_paged()) {
				printf('<span">%s</span>', esc_html_x('Featured', 'post', 'rrinsurancegroup'));
			}
			if (is_singular()) :
				the_title('<h1 class="entry-title">', '</h1>');
			else :
				the_title(sprintf('<h2 class="entry-title"><a class="text-black text-title-4 group-hover:text-white " href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
			endif;
			?>
		</header><!-- .entry-header -->

		<div <?php rrinsurancegroup_content_class('entry-content group-hover:text-white'); ?>>
			<?php
			$postContent = get_the_content();
			echo wp_trim_words($postContent, 30, '...');

			wp_link_pages(
				array(
					'before' => '<div>' . __('Pages:', 'rrinsurancegroup'),
					'after'  => '</div>',
					'class'	 => 'opacity-20',
				)
			);
			?>
		</div><!-- .entry-content -->

		<footer class="flex items-center justify-between mt-5 md:flex-wrap entry-footer">
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

</article><!-- #post-${ID} -->