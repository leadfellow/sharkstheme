<?php
/**
 * Spacer Block Template
 * Simple spacing element with adjustable height and optional background color
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get block fields
$spacer_height = get_field('spacer_height') ?: 50;
$spacer_background_color = get_field('spacer_background_color') ?: 'transparent';

// Block attributes
$block_id = 'spacer-' . ($block['id'] ?? uniqid());
$class_name = 'block-spacer';
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

// Inline styles
$style = sprintf(
    'height: %dpx; background-color: %s;',
    absint($spacer_height),
    esc_attr($spacer_background_color)
);
?>

<div <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>" style="<?php echo $style; ?>"></div>




