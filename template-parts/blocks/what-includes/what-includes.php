<?php
/**
 * What Includes Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$heading = get_field('heading') ?: 'Mida sisaldab klassikaline WordPressi WooCommerce e-poe lahendus?';
$background_color = get_field('background_color') ?: '#f7f7f5';
$items = get_field('items') ?: [];
$column_split_at = get_field('column_split_at') ?: 9;

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = !empty($block['anchor']) ? $block['anchor'] : 'what-includes-' . $block['id'];
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';

// Split items into two columns based on column_split_at
$column_1 = [];
$column_2 = [];

if (!empty($items)) {
    foreach ($items as $index => $item) {
        if (($index + 1) <= $column_split_at) {
            $column_1[] = $item;
        } else {
            $column_2[] = $item;
        }
    }
}
?>

<section 
    id="<?php echo esc_attr($anchor); ?>" 
    class="block-what-includes<?php echo esc_attr($align_class . $class_name); ?>" 
    style="background-color: <?php echo esc_attr($background_color); ?>;">
    <div class="block-what-includes__container">
        <?php if ($heading): ?>
            <h1 class="block-what-includes__heading">
                <?php echo wp_kses_post(nl2br($heading)); ?>
            </h1>
        <?php endif; ?>
        
        <div class="block-what-includes__grid">
            <?php if (!empty($column_1)): ?>
                <div class="block-what-includes__column">
                    <?php 
                    foreach ($column_1 as $index => $item) {
                        $text = $item['text'] ?? '';
                        if (!empty($text)) {
                            $number = $index + 1;
                            $formatted_number = sprintf('(%02d)', $number);
                            ?>
                            <div class="block-what-includes__item">
                                <div class="block-what-includes__content">
                                    <p class="block-what-includes__number"><?php echo esc_html($formatted_number); ?></p>
                                    <p class="block-what-includes__text"><?php echo esc_html($text); ?></p>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            <?php endif; ?>
            
            <?php if (!empty($column_2)): ?>
                <div class="block-what-includes__column">
                    <?php 
                    foreach ($column_2 as $index => $item) {
                        $text = $item['text'] ?? '';
                        if (!empty($text)) {
                            $number = $column_split_at + $index + 1;
                            $formatted_number = sprintf('(%02d)', $number);
                            ?>
                            <div class="block-what-includes__item">
                                <div class="block-what-includes__content">
                                    <p class="block-what-includes__number"><?php echo esc_html($formatted_number); ?></p>
                                    <p class="block-what-includes__text"><?php echo esc_html($text); ?></p>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

