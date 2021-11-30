<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package photoheaven
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open();
	// $header_imgs = get_uploaded_header_images();
	// foreach($header_imgs as $header_img):
	// 	print_r($header_img['url']);
	// endforeach;
	
	
	?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text"
			href="#primary"><?php esc_html_e( 'Skip to content', 'photoheaven' ); ?></a>

		<header id="masthead" class="site-header">
			
<!-- // $header_imgs = get_uploaded_header_images();
	// foreach($header_imgs as $header_img):
	// 	print_r($header_img['url']);
	// endforeach; -->

			<!-- <img src="<?php //esc_url(header_image()) ; ?>" alt="" class="hero-img"> -->
			<div class="hero-img-container">
				<ul class="items-list">
					
				<?php	$header_imgs = get_uploaded_header_images(); ?>
					 <?php foreach($header_imgs as $header_img): ?>
						<li class="list-item" ><img src="<?php echo $header_img['url'] ?>" alt="1"></li>
					 
				<?php	 endforeach; ?>
					
						
						
						<!-- <li class="list-item" ><img src="../imges/4.jpg" alt=""></li>
				<li class="list-item" ><img src="../imges/5.jpg" alt=""></li> -->
				</ul>
			</div>

			<div class="site-branding">
				<div class="main-nav">
					<div class="site-logo">
						<?php the_custom_logo();?>
					</div>
					<?php
						if ( is_front_page() && is_home() ) :
							?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
							rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
						else :
							?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
							rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
						endif;
						$photoheaven_description = get_bloginfo( 'description', 'display' );
						if ( $photoheaven_description || is_customize_preview() ) :
							?>
					<p class="site-description">
						<?php echo $photoheaven_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</p>
					<?php endif; ?>

					<nav id="site-navigation" class="main-navigation">
						<input type="checkbox" id="nav-checkbox" aria-controls="primary-menu" role="menu toggle" />
						<label for="nav-checkbox" class="nav-toggle">
							<span class="nav-icon"></span>
							<span class="nav-icon"></span>
							<span class="nav-icon"></span>
						</label>
						<div class="nav-menu">
							<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
						</div>
						<!--nav-menu-->
					</nav><!-- #site-navigation -->
				
				<!--main-nav-->
					</div><!-- .site-branding -->


		</header><!-- #masthead -->