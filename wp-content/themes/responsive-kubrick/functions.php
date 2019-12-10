<?php
/*--------------------------------------------------------------
 * Responsive Kubrick functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Responsive Kubrick
--------------------------------------------------------------*/

if ( ! function_exists( 'glamink_setup' ) ) :

function glamink_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Responsive Kubrick, use a find and replace
	 * to change 'responsive-kubrick' to the name of your theme in all the template files.
	--------------------------------------------------------------*/
	load_theme_textdomain( 'responsive-kubrick', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	--------------------------------------------------------------*/
	add_theme_support( 'title-tag' );

	/*
	 * This theme uses wp_nav_menu() in one location.
	--------------------------------------------------------------*/
	register_nav_menus(array(
		'menu-footer' => esc_html__('Main menu (footer)', 'responsive-kubrick'),
	));

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	--------------------------------------------------------------*/
	add_theme_support( 'post-thumbnails' );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	--------------------------------------------------------------*/
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	--------------------------------------------------------------*/
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'glamink_custom_background_args', array(
		'default-color' => 'e8e6e8',
		'default-image' => '',
	) ) );

	// Enable support for Custom Logo. See https://codex.wordpress.org/Theme_Logo
	add_theme_support( 'custom-logo', array(
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title' ),
	) );

	// Visual editor stylesheet
	add_editor_style( 'editor.css' );
}
endif;
add_action( 'after_setup_theme', 'glamink_setup' );

/*--------------------------------------------------------------
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
--------------------------------------------------------------*/
function glamink_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'glamink_content_width', 640 );
}
add_action( 'after_setup_theme', 'glamink_content_width', 0 );

/*--------------------------------------------------------------
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
--------------------------------------------------------------*/
function glamink_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'responsive-kubrick' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'glamink_widgets_init' );

/*--------------------------------------------------------------
* Pagination
--------------------------------------------------------------*/
function glamink_pagination_links() {
  the_posts_pagination( array(
    'mid_size'  => 5,
    'prev_text' => __( 'Previous', 'responsive-kubrick' ),
    'next_text' => __( 'Next', 'responsive-kubrick' ),
  ) );
}

/*--------------------------------------------------------------
 * Add a pingback url auto-discovery header for singularly identifiable articles.
--------------------------------------------------------------*/
function glamink_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'glamink_pingback_header' );

/*--------------------------------------------------------------
 * Enqueue scripts and styles.
--------------------------------------------------------------*/
function glamink_scripts() {
	// Load latest css version
	wp_enqueue_style( 'responsive-kubrick-style', get_stylesheet_uri(), array(), '1.6', 'all' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'glamink_scripts' );

/*--------------------------------------------------------------
 * Custom Header Gradient
--------------------------------------------------------------*/
function glamink_customizer_bg_colorbottom()	{
	$glamink_colortop_setting = get_theme_mod('glamink_colortop_setting');
	$glamink_colorbottom_setting = get_theme_mod('glamink_colorbottom_setting');

	if ($glamink_colortop_setting != '#69aee7' && $glamink_colorbottom_setting == '#4180b6') : ?>
		<style type="text/css">
			.site-header {
				background: linear-gradient(to bottom, <?php echo $glamink_colortop_setting; ?> 0%, #4180b6 100%);
			}
		</style>
		<?php
	endif;
}

add_action('wp_head', 'glamink_customizer_bg_colorbottom');

function glamink_customizer_bg_colortop()	{
	$glamink_colorbottom_setting = get_theme_mod('glamink_colorbottom_setting');
	$glamink_colortop_setting = get_theme_mod('glamink_colortop_setting');

	if ($glamink_colortop_setting != '#69aee7' && $glamink_colorbottom_setting != '#4180b6') :?>
		<style type="text/css">
			.site-header {
				background: linear-gradient(to bottom, <?php echo $glamink_colortop_setting; ?> 0%, <?php echo $glamink_colorbottom_setting; ?> 100%);
			}
		</style>
		<?php
	endif;
}

add_action('wp_head', 'glamink_customizer_bg_colortop');

/*--------------------------------------------------------------
 * Custom template tags for this theme.
--------------------------------------------------------------*/
require get_template_directory() . '/inc/template-tags.php';

/*--------------------------------------------------------------
 * Custom functions that act independently of the theme templates.
--------------------------------------------------------------*/
require get_template_directory() . '/inc/extras.php';

/*--------------------------------------------------------------
 * Customizer additions.
--------------------------------------------------------------*/
require get_template_directory() . '/inc/customizer.php';

/*--------------------------------------------------------------
 * Load Jetpack compatibility file.
--------------------------------------------------------------*/
require get_template_directory() . '/inc/jetpack.php';
