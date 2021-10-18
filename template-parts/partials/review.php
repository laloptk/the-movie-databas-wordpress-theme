<div class="review">
    <div class="review__header">
        <?php echo __('Review By ', 'movies-and-actors'); ?>
        <strong><?php echo esc_html($review['author_details']['username']); ?></strong>
    </div>
    <div class="review__body">
        <?php echo apply_filters('the_content', $review['content']); ?>
    </div>
</div>