<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package photoheaven
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php //photoheaven_post_thumbnail(); ?>
				<?php if(get_post_format() == 'gallery' ):  ?>
					
		
				<?php photoheaven_flexslider( 'post-image' ); ?>
			
		<?php	endif; ?>

	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	
	</header>


	<div class="entry-content">
		<?php
		 if(get_post_format() == 'gallery' ): 
				echo preg_replace('/<img[^>]+./','',get_the_content());
		 else://(get_post_format() == 'gallery' ): 
			the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'photoheaven' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);
		 endif;//(get_post_format() == 'gallery' ): 
	
	
	
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'photoheaven' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php photoheaven_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
