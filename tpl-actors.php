<?php
/* Template Name: Actors
** @package Movies_&_Actors
*/

get_header();
?>
	<main id="primary" class="site-main">
		<?php
            while ( have_posts() ) :
                the_post();
                include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        
                if(is_plugin_active('the-movie-db-data/the-movie-db-data.php')):
                    if(isset($_GET['id']) && !empty($_GET['id'])):
                        get_template_part( 'template-parts/content', 'actor-detail' );
                    else:
                        get_template_part( 'template-parts/content', 'actors' );
                    endif;
                else:
                    echo __('This theme needs the Movies & Actors plugin to be active.', 'movies-and-actors');
                endif;                
            endwhile; // End of the loop.
		?>

	</main><!-- #main -->
<?php
get_footer();