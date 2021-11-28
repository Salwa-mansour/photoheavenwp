<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package photoheaven
 */
if(! has_post_thumbnail()){
	return;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('gallery-container'); ?>>
	<?php 
	
			
	echo(get_post_format());
	?>
	<header class="entry-header gallery-item">
		
		<figure class="image">
	<?php 
	photoheaven_post_thumbnail(); ?>
	
</figure>
		<?php	the_title( '<h1 class="entry-title text"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );?>
		


	</header><!-- .entry-header -->
	
	<!-- <div class="entry-content"> -->
		<?php
		// the_content(
		// 	sprintf(
		// 		wp_kses(
		// 			/* translators: %s: Name of current post. Only visible to screen readers */
		// 			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'photoheaven' ),
		// 			array(
		// 				'span' => array(
		// 					'class' => array(),
		// 				),
		// 			)
		// 		),
		// 		wp_kses_post( get_the_title() )
		// 	)
		// );

	
		?>
	<!-- </div>.entry-content -->

	<footer class="entry-footer " style="display: none;">
		<?php photoheaven_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
