<?php 
$link_exists = isset($list_item['link']) && !empty($list_item['link']);
$img_exists = isset($list_item['img_link']) && !empty($list_item['img_link']);

?>
<li>
    <?php if($img_exists): ?>
        <img src="<?php echo $list_item['img_link']; ?>">
    <?php endif; ?>
    <?php if($link_exists): ?>
        <a href="<?php echo $list_item['link']; ?>">
    <?php endif; ?>
        <?php esc_html_e($list_item['text']); ?>
    <?php if($link_exists): ?>
        </a>
    <?php endif; ?>
</li>


