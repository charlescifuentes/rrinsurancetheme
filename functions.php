<?php

/**
 * rrinsurancegroup functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package rrinsurancegroup
 */

if (! defined('RRINSURANCEGROUP_VERSION')) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define('RRINSURANCEGROUP_VERSION', '0.1.0');
}

if (! defined('RRINSURANCEGROUP_TYPOGRAPHY_CLASSES')) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `rrinsurancegroup_content_class`
	 * function. You will see that function used everywhere an `entry-content`
	 * or `page-content` class has been added to a wrapper element.
	 *
	 * For the block editor, these classes are converted to a JavaScript array
	 * and then used by the `./javascript/block-editor.js` file, which adds
	 * them to the appropriate elements in the block editor (and adds them
	 * again when they’re removed.)
	 *
	 * For the classic editor (and anything using TinyMCE, like Advanced Custom
	 * Fields), these classes are added to TinyMCE’s body class when it
	 * initializes.
	 */
	define(
		'RRINSURANCEGROUP_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary'
	);
}

if (! function_exists('rrinsurancegroup_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function rrinsurancegroup_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on rrinsurancegroup, use a find and replace
		 * to change 'rrinsurancegroup' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('rrinsurancegroup', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __('Primary', 'rrinsurancegroup'),
				'menu-2' => __('Footer Menu', 'rrinsurancegroup'),
				'menu-3' => __('Footer Menu2', 'rrinsurancegroup'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for editor styles.
		add_theme_support('editor-styles');

		// Enqueue editor styles.
		add_editor_style('style-editor.css');
		add_editor_style('style-editor-extra.css');

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Remove support for block templates.
		remove_theme_support('block-templates');
		add_theme_support('custom-spacing');
	}
endif;
add_action('after_setup_theme', 'rrinsurancegroup_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rrinsurancegroup_widgets_init()
{
	register_sidebar(
		array(
			'name'          => __('Footer', 'rrinsurancegroup'),
			'id'            => 'sidebar-1',
			'description'   => __('Add widgets here to appear in your footer.', 'rrinsurancegroup'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'rrinsurancegroup_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function rrinsurancegroup_scripts()
{
	wp_enqueue_style('rrinsurancegroup-style', get_stylesheet_uri(), array(), RRINSURANCEGROUP_VERSION);
	wp_enqueue_script('rrinsurancegroup-script', get_template_directory_uri() . '/js/script.min.js', array(), RRINSURANCEGROUP_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	wp_enqueue_style('rrinsurancegroup-fonts', 'https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap', array(), RRINSURANCEGROUP_VERSION);

	wp_enqueue_style('izimodalstyle', 'https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.6.1/css/iziModal.min.css', array(), RRINSURANCEGROUP_VERSION);

	wp_enqueue_script('izimodal', 'https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.6.1/js/iziModal.min.js', array('jquery'), RRINSURANCEGROUP_VERSION, true);
}
add_action('wp_enqueue_scripts', 'rrinsurancegroup_scripts');

/**
 * Enqueue the block editor script.
 */
function rrinsurancegroup_enqueue_block_editor_script()
{
	if (is_admin()) {
		wp_enqueue_script(
			'rrinsurancegroup-editor',
			get_template_directory_uri() . '/js/block-editor.min.js',
			array(
				'wp-blocks',
				'wp-edit-post',
			),
			RRINSURANCEGROUP_VERSION,
			true
		);
		wp_add_inline_script('rrinsurancegroup-editor', "tailwindTypographyClasses = '" . esc_attr(RRINSURANCEGROUP_TYPOGRAPHY_CLASSES) . "'.split(' ');", 'before');
	}
}
add_action('enqueue_block_assets', 'rrinsurancegroup_enqueue_block_editor_script');

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function rrinsurancegroup_tinymce_add_class($settings)
{
	$settings['body_class'] = RRINSURANCEGROUP_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter('tiny_mce_before_init', 'rrinsurancegroup_tinymce_add_class');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


add_action('init', function () {
	add_filter('block_categories_all', function ($categories) {
		array_unshift($categories, [
			"slug" => "rrinsurance-blocks",
			"title" => "RRInsurance Blocks",
		]);
		return $categories;
	});

	$blocks = glob(__DIR__ . '/blocks/build/*/block.json');
	foreach ($blocks as $block) {
		register_block_type($block);
	}
});