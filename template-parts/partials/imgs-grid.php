<?php if(is_array($images)): ?>
    <div class="imgs-grid">    
        <?php foreach($images as $image): ?>
            <div class="imgs-grid__item">
                <img src="<?php echo esc_url(get_poster_image($image['file_path'])); ?>" loading="lazy">
            </div>
        <?php endforeach; ?>    
    </div>
<?php endif; ?>