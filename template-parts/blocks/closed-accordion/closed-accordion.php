<?php
/**
 * Closed Accordion Block Template
 * A non-clickable list that looks like an accordion without expandable content
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get block fields
$closed_accordion_items = get_field('closed_accordion_items');
$background_color = get_field('background_color') ?: '#F7F7F5';

// Block attributes
$block_id = 'closed-accordion-' . ($block['id'] ?? uniqid());
$class_name = 'block-closed-accordion';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Block anchor
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Return if no items
if (empty($closed_accordion_items)) {
    if (is_admin()) {
        echo '<div class="acf-block-preview"><p>Please add list items...</p></div>';
    }
    return;
}
?>

<section <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>" style="background-color: <?php echo esc_attr($background_color); ?>;">
    <div class="container">
        <div class="closed-accordion">
            <?php foreach ($closed_accordion_items as $index => $item): 
                $number = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
            ?>
                <div class="closed-accordion__item">
                    <div class="closed-accordion__content">
                        <div class="closed-accordion__title-wrapper">
                            <span class="closed-accordion__number">(<?php echo esc_html($number); ?>)</span>
                            <h3 class="closed-accordion__title"><?php echo esc_html($item['title']); ?></h3>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
