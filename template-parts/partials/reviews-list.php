<?php if(isset($reviews) && is_array($reviews) && !empty($reviews)): ?>
    <div class="reviews">
        <?php 
            foreach($reviews as $review):
                include(__DIR__ . '/review.php');
            endforeach; 
        ?>
    </div>
<?php endif; ?>