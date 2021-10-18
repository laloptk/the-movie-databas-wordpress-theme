<?php
/* Template Name: Movies
** @package Movies_&_Actors
*/

get_header();
?>
	<main id="primary" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();

            if(isset($_GET['id']) && !empty($_GET['id'])):
                get_template_part( 'template-parts/content', 'movie-detail' );
            else:
                get_template_part( 'template-parts/content', 'movies' );
            endif;
            
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
<?php
get_footer();