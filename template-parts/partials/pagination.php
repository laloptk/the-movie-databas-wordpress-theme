<?php 
if(isset($pagination_data['total_pages']) && !empty($pagination_data['total_pages'])): 
    $pagination_size = isset($pagination_data['pagination_size']) ? $pagination_data['pagination_size'] : 10;
?>
    <div class="pagination">
        <?php if($pagination_data['page_start'] + 1 !== '1' && !empty($pagination_data['page_start'])): ?>
            <div class="page-prev">
                <a href="<?php echo get_the_permalink() . '?list_page=' . ($pagination_data['page_start'] - 1); ?>">
                    <?php echo '<< ' . __('Prev Page', 'movies-and-actors'); ?>
                </a>
            </div>
        <?php endif; ?>
        <?php for($i = number_format($pagination_data['page_start']); $i <= number_format($pagination_data['page_start']) + $pagination_size; $i++): ?>
            <?php 
                $page_num = $i;
                include(__DIR__ . '/pagination-item.php');
            ?>
        <?php endfor; ?>
        <?php if($pagination_data['page_start'] + 5 !== $pagination_data['total_pages']): ?>
            <div class="page-next">
                <a href="<?php echo get_the_permalink() . '?list_page=' . (number_format($pagination_data['page_start']) + $pagination_size + 1); ?>">
                    <?php echo __('Next Page', 'movies-and-actors') . ' >>'; ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>