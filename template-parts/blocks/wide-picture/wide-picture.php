<?php
/**
 * Wide Picture Block Template
 * Full-width image block with optional caption and customizable spacing
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get block fields
$image = get_field('wide_picture_image');
$alt_text = get_field('wide_picture_alt_text');
$caption = get_field('wide_picture_caption');
$spacing_top = get_field('wide_picture_spacing_top') ?: 'medium';
$spacing_bottom = get_field('wide_picture_spacing_bottom') ?: 'medium';
$border_radius = get_field('wide_picture_border_radius') ?: 'none';
$shadow = get_field('wide_picture_shadow') ?: false;

// Block attributes
$block_id = 'wide-picture-' . ($block['id'] ?? uniqid());
$class_name = 'block-wide-picture';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Add spacing classes
$class_name .= ' spacing-top-' . esc_attr($spacing_top);
$class_name .= ' spacing-bottom-' . esc_attr($spacing_bottom);

// Add border radius class
$class_name .= ' radius-' . esc_attr($border_radius);

// Add shadow class
if ($shadow) {
    $class_name .= ' has-shadow';
}

// Block anchor
$anchor = sharks_get_block_anchor($block, 'wide-picture');

// If no image, show placeholder in editor
if (!$image) {
    if (is_admin()) {
        echo '<div class="acf-block-placeholder"><p>Vali pilt Wide Picture plokis</p></div>';
    }
    return;
}

// Get image data
$image_url = wp_get_attachment_image_url($image, 'full');
$image_srcset = wp_get_attachment_image_srcset($image, 'full');
$image_sizes = wp_get_attachment_image_sizes($image, 'full');

// Use custom alt text if provided, otherwise use image's alt text
if (empty($alt_text)) {
    $alt_text = get_post_meta($image, '_wp_attachment_image_alt', true);
}
?>

<div id="<?php echo esc_attr($anchor); ?>" class="<?php echo esc_attr($class_name); ?>">
    <div class="block-wide-picture__container">
        <figure class="block-wide-picture__figure">
            <img 
                src="<?php echo esc_url($image_url); ?>" 
                <?php if ($image_srcset): ?>
                    srcset="<?php echo esc_attr($image_srcset); ?>"
                    sizes="<?php echo esc_attr($image_sizes); ?>"
                <?php endif; ?>
                alt="<?php echo esc_attr($alt_text); ?>"
                class="block-wide-picture__image"
                loading="lazy"
            />
            <?php if ($caption): ?>
                <figcaption class="block-wide-picture__caption">
                    <?php echo esc_html($caption); ?>
                </figcaption>
            <?php endif; ?>
        </figure>
    </div>
</div>
