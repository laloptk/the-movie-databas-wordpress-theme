<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Movies_&_Actors
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">			
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf( esc_html__( 'All data in this website was taken from ', 'movies-and-actors' ));
			?>
			<a href="https://www.themoviedb.org/">The Movie DB</a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
