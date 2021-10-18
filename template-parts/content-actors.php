<div class="movies">
    <div class="container">
        <?php
            if((!isset($_GET['page']) || parseInt($_GET['page']) <= 1)) {
                $actors_data = tmdb_search_people('a');
            } else {
                $actors_data = tmdb_search_people($_GET['letter']);
            }
        ?>
        <div class="cards-wrap">
            <?php
                include(__DIR__ . '/partials/actors-filters.php');

                $cards = array(
                    'type' => 'actors',
                    'results' => $actors_data['results']
                );
                
                include(__DIR__ . '/partials/cards-grid.php');
            ?>
        </div>
    </div>
</div>


