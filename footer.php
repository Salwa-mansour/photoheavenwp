<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package photoheaven
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<p>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'photoheaven' ), 'photoheaven', '<a href="https://github.com/Salwa-mansour">salwa</a>' );
				?>
			</p>
				
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
