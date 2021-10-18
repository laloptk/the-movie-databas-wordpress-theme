<?php 
    $card_image = isset($card['image']) && !empty($card['image']) 
    ? get_poster_image($card['image'])
    : 'https://coutto.net/wp-content/uploads/2021/09/500x735blank.png'; 
    $page_template = get_page_template_slug();
?>

<div class="card">
    <div class="card__poster">
        <img src="<?php echo $card_image; ?>" loading="lazy">
    </div>
    <?php if(isset($card['title']) && !empty($card['title'])): ?>
        <div class="card__header">
            <h3><?php esc_html_e($card['title']); ?></h3>
        </div>
    <?php endif; ?>
    <div class="card__footer">
        <?php if(isset($card['date']) && !empty($card['date'])): ?>
        <div class="date">
            <?php echo '<strong>Release Date</strong>: ' . date('F d Y', strtotime(esc_html($card['date']))); ?>
        </div>
        <?php endif; ?>
        <?php if(isset($card['character']) && !empty($card['character'])): ?>
            <div class="character">
                <strong><?php echo __('Character: ', 'movies-and-actors'); ?></strong>
                <?php echo esc_html_e($card['character']); ?>
            </div>
        <?php endif; ?>
        <?php if(isset($card['genre_ids']) && !empty($card['genre_ids'])): ?>
            <div class="genres">
                <?php $genres_info = get_movie_genres($card['genre_ids']); ?>
                <?php if(is_array($genres_info) && !empty($genres_info)): ?>
                <strong>
                    <?php echo count($genres_info) < 1 ? __('Genre: ', 'movies-and-actors') : __('Genres: ', 'movies_and_actors'); ?> 
                </strong>
                <ul>
                    <?php foreach($genres_info as $genre): ?>
                        <li><?php esc_html_e($genre['name']); ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php if(isset($card['type']) && !empty($card['type'])): ?>
            <div class="btn btn-card">
                <a href="<?php echo '/' . $card['type'] . "?id=" . $card['id']; ?>">
                    <?php echo __('See Detail', 'movies-and-actors'); ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>

