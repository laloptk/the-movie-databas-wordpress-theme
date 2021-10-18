<?php 
    $movie_data = get_tmdb_movie_detail($_GET['id']);
?>

<div class="movie-detail">
    <div class="container">
        <?php if(!$movie_data): ?>
            <div class="not-found">
                <h1><?php echo __('Nothing was found for that movie ID.'); ?></h1>
            </div>
        <?php else: ?>
            <article>
                <?php if(isset($movie_data['title']) && !empty($movie_data['title'])): ?>
                    <header>
                        <h1><?php esc_html_e($movie_data['title']); ?></h1>
                    <header>
                <?php endif; ?>
                <?php if(isset($movie_data['poster_path']) && !empty($movie_data['poster_path'])): ?>
                    <div class="movie-detail__poster">
                        <img src="<?php echo get_poster_image($movie_data['poster_path']); ?>" loading="lazy">
                    </div>
                <?php endif; ?>
                <?php if(isset($movie_data['videos']['results']) && !empty($movie_data['videos']['results'])): ?>
                    <div class="movie-detail__trailer">
                        <h2><?php echo __('Movie Trailer', 'movies-and-actors'); ?></h2>
                        <?php 
                            $video = get_tmdb_movie_random_trailer($movie_data['videos']['results']);
                            include(__DIR__ . '/partials/video.php'); 
                        ?>
                    </div>
                <?php endif; ?>
                <?php if(isset($movie_data['genres']) && is_array($movie_data['genres']) && !empty($movie_data['genres'])): ?>
                    <div class="movie-detail__genres">
                        <h2><?php echo __('Movie Genres', 'movies-and-actors'); ?></h2>
                        <ul>
                            <?php 
                                foreach($movie_data['genres'] as $genre):
                                    $list_item = array(
                                        'text' => esc_html($genre['name'])
                                    );                                        
                                    include(__DIR__ . '/partials/list-item.php'); 
                                endforeach; 
                            ?>
                        <ul>
                    </div>
                <?php endif; ?>
                <?php if(isset($movie_data['alternative_titles']['titles']) && is_array($movie_data['alternative_titles']['titles']) && !empty($movie_data['alternative_titles']['titles'])): ?>
                    <div class="movie-detail__alternative-titles">
                        <h2><?php echo __('Movie Alternative Titles', 'movies-and-actors'); ?></h2>
                        <ul>                        
                            <?php 
                                foreach($movie_data['alternative_titles']['titles'] as $alternative_title):
                                    $list_item = array(
                                        'text' => esc_html($alternative_title['title'])
                                    );                                        
                                    include(__DIR__ . '/partials/list-item.php');                               
                                endforeach; 
                            ?>
                        <ul>
                    </div>
                <?php endif; ?>
                <?php if(isset($movie_data['overview']) && !empty($movie_data['overview'])): ?>
                    <div class="movie-details__overview">
                        <h2><?php echo __('Movie Overview', 'movies-and-actors'); ?></h2>
                        <?php echo apply_filters('the_content', $movie_data['overview']); ?>
                    </div>
                <?php endif; ?>
                <?php if(isset($movie_data['production_companies']) && is_array($movie_data['production_companies']) && !empty($movie_data['production_companies'])): ?>
                    <div class="movie-detail__production-companies">
                        <h2><?php echo __('Production Companies', 'movies-and-actors'); ?></h2>
                        <ul>
                            <?php 
                                foreach($movie_data['production_companies'] as $company):
                                        $list_item = array(                            
                                            'text' => esc_html($company['name'])
                                        ); 
                                        
                                        if(isset($company['logo_path']) && !empty($company['logo_path'])) {
                                            $list_item['img_link'] = get_poster_image($company['logo_path']);
                                        }
                                        
                                        include(__DIR__ . '/partials/list-item.php');                       
                                endforeach; 
                            ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="movie-detail__meta">
                    <?php if(isset($movie_data['release_date']) && !empty($movie_data['release_date'])): ?>
                        <div class="movie-detail__date">
                            <strong><?php echo __('Release Date: ', 'movies-and-actors'); ?></strong>
                            <?php echo date('F d Y', strtotime(esc_html($movie_data['release_date']))); ?>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($movie_data['original_language']) && !empty($movie_data['original_language'])): ?>
                        <div class="movie-detail__language">
                            <strong><?php echo __('Original Language: ', 'movies-and-actors'); ?></strong>
                            <?php echo get_tmdb_language_name($movie_data['original_language']); ?>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($movie_data['popularity']) && !empty($movie_data['popularity'])): ?>
                        <div class="movie-detail__language">
                            <strong><?php echo __('Popularity Rating: ', 'movies-and-actors'); ?></strong>
                            <?php echo $movie_data['popularity']; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="movie-detail__cast">
                    <h2><?php echo __('Movie Cast', 'movies-and-actors'); ?></h2>
                    <?php 
                        $cards = array(
                            'type' => 'actors',
                            'results' => $movie_data['credits']['cast']
                        );

                        include(__DIR__ . '/partials/cards-grid.php');
                    ?>
                </div>
                <div class="movie-detail__reviews">
                    <h2><?php echo __('Movie Reviews', 'movies-and-actors'); ?></h2>
                    <?php 
                        $reviews = $movie_data['reviews']['results'];
                        include(__DIR__ . '/partials/reviews-list.php');
                    ?>
                </div>
                <?php if(isset($movie_data['similar']['results']) && is_array($movie_data['similar']['results']) && !empty($movie_data['similar']['results'])): ?>
                    <div class="movie-detail__similar">
                        <h2><?php echo __('Similar Movies', 'movies-and-actors'); ?></h2>
                        <ul>
                            <?php 
                                foreach($movie_data['similar']['results'] as $similar_movie):
                                        $list_item = array(
                                            'link' => '/movies/?id=' . esc_html($similar_movie['id']),
                                            'text' => esc_html($similar_movie['original_title'])
                                        );                                    
                                        include(__DIR__ . '/partials/list-item.php');                                
                                endforeach; 
                            ?>
                        <ul>
                    </div>
                <?php endif; ?>
            </article>
        <?php endif; ?>
    </div>
</div>