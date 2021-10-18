<div class="video">
    <?php if($video['site'] === 'YouTube'): ?>
        <?php $video_url = 'https://www.youtube.com/embed/' . $video['key']; ?>
        <iframe width="560" height="315" src="<?php echo esc_url($video_url); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <?php endif; ?>
</div>