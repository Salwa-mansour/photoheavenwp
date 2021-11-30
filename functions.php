<?php
/**
 * photoheaven functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package photoheaven
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'photoheaven_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function photoheaven_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on photoheaven, use a find and replace
		 * to change 'photoheaven' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'photoheaven', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', array(  'gallery' ) );
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'photoheaven' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'photoheaven_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'photoheaven_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function photoheaven_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'photoheaven_content_width', 640 );
}
add_action( 'after_setup_theme', 'photoheaven_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function photoheaven_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'photoheaven' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'photoheaven' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'photoheaven_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function photoheaven_scripts() {
	wp_enqueue_style( 'photoheaven-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'photoheaven-style', 'rtl', 'replace' );

	wp_enqueue_script( 'photoheaven-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'photoheaven-carousel', get_template_directory_uri() . '/js/carousel1.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'photoheaven-headerSlider', get_template_directory_uri() . '/js/headerslider.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'photoheaven_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}




// FLEXSLIDER FUNCTION
// --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'photoheaven_flexslider' ) ) {

 function photoheaven_flexslider( $size = 'thumbnail' ) {

	 $attachment_parent = is_page() ? $post->ID : get_the_ID();

	 $image_args = array(
		 'numberposts'    => -1, // show all
		 'orderby'        => 'menu_order',
		 'order'          => 'ASC',
		 'post_parent'    => $attachment_parent,
		 'post_type'      => 'attachment',
		 'post_status'    => null,
		 'post_mime_type' => 'image',
	 );

	 $images = get_posts( $image_args );

	 if ( $images ) : $i=0; ?>
	  <div class="carousel">
        <button class="carousel__button carousel__button--left hide">&lsaquo;</button>
		 <div class="carousel__track-container">
		 
			 <ul class="carousel__track">
	 
				 <?php foreach( $images as $image ) :

					 $attimg =wp_get_attachment_image_url( $image->ID, $size ) ?>
					<?php if($i==0): ?>
						<li class="carousel__slide current-slide">
						<img src="<?php echo $attimg; ?>" class="carousel__image" alt=""> 
						 </li>
					<?php else://if($i==0): ?>
						 <li class="carousel__slide">
						<img src="<?php echo $attimg; ?>" class="carousel__image" alt=""> 
						 </li>
					<?php endif;//if($i==0): ?>
					
					 <?php $i++; ?>
				 <?php endforeach; ?>
		 
			 </ul>
			 <button class="carousel__button carousel__button--right">&rsaquo;</button>
       		 <div class="carousel__nav">
					<?php $i=0; ?>
					<?php foreach( $images as $image ) :

					// $attimg =wp_get_attachment_image_url( $image->ID, $size ) ?>
					<?php if($i==0): ?>
						<button class="carousel__indicator current-slide"></button>
					<?php else://if($i==0): ?>
						<button class="carousel__indicator"></button>
					<?php endif;//if($i==0): ?>

					<?php $i++; ?>
					<?php endforeach; ?>
            <!-- <button class="carousel__indicator current-slide"></button>
            <button class="carousel__indicator"></button>
            <button class="carousel__indicator"></button>
            <button class="carousel__indicator"></button>
            <button class="carousel__indicator"></button> -->
       		 </div><!--carousel__nav-->
  		  </div><!--carousel__track-container-->
		 </div><!--carousel-->
		 
		 <?php
		 
	 endif;
 }

}



