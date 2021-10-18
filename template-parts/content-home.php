<div class="home">
    <?php
        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        
        if(is_plugin_active('the-movie-db-data/the-movie-db-data.php')):
    ?>
    <section class="upcoming-movies">
        <div class="container">
            <h2><?php echo __('Upcoming Movies', 'movies-and-actors'); ?></h2>
            <?php            
                $cards = array(
                    'type' => 'movies',
                    'results' => get_next_upcoming_movies()
                );
                include(__DIR__ . '/partials/cards-grid.php');
            ?>
        </div>
    <section class="popular-people">
        <div class="container">
            <h2><?php echo __('Popular Actors', 'movies-and-actors'); ?></h2>
            <?php     
                    $cards = array(
                        'type' => 'actors',
                        'results' => get_most_popular_actors()
                    );   
                    
                    include(__DIR__ . '/partials/cards-grid.php');
                else:
                    __e('This theme needs the Movies & Actors plugin to be active.', 'movies-and-actors');
                endif;
            ?>
        </div>
    </section>
</div>