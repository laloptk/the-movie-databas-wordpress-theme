<div class="movies">
    <div class="container">
            <?php
                include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
                
                if(is_plugin_active('the-movie-db-data/the-movie-db-data.php')):
                    $page = isset($_GET['list_page']) ? $_GET['list_page'] : '1';
                    $movies = get_all_tmdb_movies($page);
                    include(__DIR__ . '/partials/movies-filter.php');
            ?>
            <div class="movies__wrap">
                <?php
                    $cards = array(
                        'type' => 'movies',
                        'results' => $movies['results']
                    );
                    include(__DIR__ . '/partials/cards-grid.php');

                    $pagination_data = array(
                        'total_pages' => $movies['total_pages'],
                        'page_start' => $page,
                        'pagination_size' => 5
                    );
                    include(__DIR__ . '/partials/pagination.php');
                ?>
            </div>
            <?php
                else:
                    echo __('This theme needs the Movies & Actors plugin to be active.', 'movies-and-actors');
                endif;
            ?>
    </div>
</div>