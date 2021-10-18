<?php
$actor_id = $_GET['id'];
$actor_data = get_tmdb_person($actor_id);
?>

<div class="actor">
    <div class="container">
        <?php if(isset($actor_data['profile_path']) && !empty($actor_data['profile_path'])): ?>
            <div class="actor__image">
                <img src="<?php echo get_poster_image($actor_data['profile_path']); ?>" loading="lazy">
            </div>
        <?php endif; ?>
        <?php if(isset($actor_data['name']) && !empty($actor_data['name'])): ?>
            <div class="actor__name">
                <h1><?php esc_html_e($actor_data['name']); ?></h1>
            </div>
        <?php endif; ?>
        <div class="actor__birthday">
            <strong><?php echo __('Birthday: ', 'movies-and-actors'); ?></strong>
            <?php echo date('F d Y', strtotime($actor_data['birthday'])); ?>
        </div>
        <?php if(isset($actor_data['place_of_birth']) && !empty($actor_data['place_of_birth'])): ?>
        <div class="actor__birthday-place">
            <strong><?php echo __('Birthday Place: ', 'movies-and-actors'); ?></strong>
            <?php esc_html_e($actor_data['place_of_birth']); ?>
        </div>
        <?php endif; ?>
        <?php if(isset($actor_data['deathday']) && !empty($actor_data['deathday'])): ?>
            <div class="actor__deathday">
                <strong><?php echo __('Day of Death: ', 'movies-and-actors'); ?></strong>
                <?php echo date('F d Y', strtotime($actor_data['deathday'])); ?>
            </div>
        <?php endif; ?>
        <?php if(isset($actor_data['homepage']) && !empty($actor_data['homepage'])): ?>
            <div class="actor__website">
                <a href="<?php echo esc_url($actor_data['homepage']); ?>" target="_blank">
                    <?php echo __('Go to ', 'movies-and-actors') . esc_html($actor_data['name']) . __(' Homepage', 'movies-and-actors'); ?>
                </a>
            </div>
        <?php endif; ?>
        <?php if(isset($actor_data['popularity']) && !empty($actor_data['popularity'])): ?>
            <div class="actor__popularity">
                <strong><?php echo __('Popularity: ', 'movies-and-actors'); ?></strong>
                <?php echo $actor_data['popularity']; ?>
            </div>
        <?php endif; ?>
        <?php if(isset($actor_data['biography']) && !empty($actor_data['biography'])): ?>
            <div class="actor-bio">
                <div class="actor-bio__header">
                    <h2><?php echo __('Biography: ', 'movies-and-actors'); ?></h2>
                </div>
                <div class="actor-bio__body">
                    <?php echo apply_filters('the_content', $actor_data['biography']); ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if(isset($actor_data['images']['profiles']) && !empty($actor_data['images']['profiles'])): ?>
            <div class="actor__images">
                <div class="container">
                    <div class="section-header">
                        <h2><?php echo esc_html($actor_data['name']) . ' ' . __('Images', 'movies-and-actors'); ?></h2>
                    </div>
                    <?php 
                        $images = count($actor_data['images']['profiles']) > 10 
                        ? array_slice($actor_data['images']['profiles'], 0, 10) 
                        : $actor_data['images']['profiles'];
                        include(__DIR__ . '/partials/imgs-grid.php');
                    ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if(isset($actor_data['movie_credits']['cast']) && !empty($actor_data['movie_credits']['cast'])): ?>
            <div class="actor__movies">
                <div class="container">
                <div class="seaction-header">
                    <h2><?php echo __('Movies: ', 'movies-and-actors'); ?><h2>
                </div>
                <?php 
                    $cards = array(
                        'type' => 'movies',
                        'results' => $actor_data['movie_credits']['cast']
                    );

                    include(__DIR__ . '/partials/cards-grid.php');
                ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>