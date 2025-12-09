<?php
/**
 * Sharks Heading 2 Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$small_label = get_field('small_label');
$heading_parts = get_field('heading_parts');
$heading_tag = get_field('heading_tag') ?: 'h2';
$paragraph_1 = get_field('paragraph_1');
$paragraph_2 = get_field('paragraph_2');

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = !empty($block['anchor']) ? $block['anchor'] : 'sharks-heading-2-' . $block['id'];
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';

// SVG Icons
$svg_icons = [
    'x' => '<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M10 10L30 30M30 10L10 30" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
    </svg>',
    'asterisk' => '<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M20 8V32M10.3 14.4L29.7 25.6M10.3 25.6L29.7 14.4" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
    </svg>',
    'star' => '<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M20 5L23.09 16.18H34.9L25.41 23.09L28.5 34.27L20 27.36L11.5 34.27L14.59 23.09L5.1 16.18H16.91L20 5Z" stroke="currentColor" stroke-width="2" fill="none"/>
    </svg>',
    'circle' => '<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="20" cy="20" r="12" fill="currentColor"/>
    </svg>',
    'arrow_right' => '<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M10 20H30M30 20L22 12M30 20L22 28" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>',
    'check' => '<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M8 20L16 28L32 12" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>',
    'plus' => '<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M20 8V32M8 20H32" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
    </svg>',
    'diamond' => '<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M20 5L30 20L20 35L10 20L20 5Z" stroke="currentColor" stroke-width="2" fill="none"/>
    </svg>',
    'square' => '<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="10" y="10" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none"/>
    </svg>',
    'triangle' => '<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M20 8L32 32H8L20 8Z" stroke="currentColor" stroke-width="2" fill="none"/>
    </svg>',
    'heart' => '<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M20 34C20 34 4 26 4 14C4 8 8 4 12 4C15 4 18 6 20 8C22 6 25 4 28 4C32 4 36 8 36 14C36 26 20 34 20 34Z" stroke="currentColor" stroke-width="2" fill="none"/>
    </svg>',
    'lightning' => '<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M22 4L8 22H20L18 36L32 18H20L22 4Z" stroke="currentColor" stroke-width="2" fill="none"/>
    </svg>',
    'chevron_down' => '<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M21.7725 9.41499L12 19.1875L2.2275 9.41499L0 11.6425L12 23.6425L24 11.6425L21.7725 9.41499Z" fill="currentColor"/>
    </svg>'
];
?>

<div id="<?php echo esc_attr($anchor); ?>" class="sharks-heading-2<?php echo esc_attr($align_class . $class_name); ?>">
    <div class="sharks-heading-2__container">
        <?php if ($small_label): ?>
            <div class="sharks-heading-2__label-wrapper">
                <p class="sharks-heading-2__label"><?php echo esc_html($small_label); ?></p>
            </div>
        <?php endif; ?>
        
        <div class="sharks-heading-2__heading">
        <?php 
        $tag_open = '<' . esc_attr($heading_tag) . ' class="sharks-heading-2__title">';
        $tag_close = '</' . esc_attr($heading_tag) . '>';
        
        echo $tag_open;
        
        if ($heading_parts): 
            foreach ($heading_parts as $part):
                if ($part['part_type'] === 'text'):
                    $color_value = !empty($part['color']) ? $part['color'] : '#171717';
                    $style = 'color: ' . esc_attr($color_value) . ';';
                    ?>
                    <span class="sharks-heading-2__word" style="<?php echo $style; ?>">
                        <?php echo esc_html($part['text']); ?>
                    </span>
                <?php elseif ($part['part_type'] === 'icon'): 
                    $icon_type = !empty($part['icon_type']) ? $part['icon_type'] : 'x';
                    $icon_color = !empty($part['icon_color']) ? $part['icon_color'] : '#171717';
                    $icon_svg = isset($svg_icons[$icon_type]) ? $svg_icons[$icon_type] : $svg_icons['x'];
                    ?>
                    <span class="sharks-heading-2__icon" style="color: <?php echo esc_attr($icon_color); ?>;">
                        <?php echo $icon_svg; ?>
                    </span>
                <?php elseif ($part['part_type'] === 'line_break'): ?>
                    <br class="sharks-heading-2__break">
                <?php endif;
            endforeach;
        else: 
            // Default placeholder
            ?>
            <span class="sharks-heading-2__word" style="color: #171717;">MILLISELE</span>
        <?php endif;
        
        echo $tag_close;
        ?>
        </div>
        
        <?php if ($paragraph_1 || $paragraph_2): ?>
            <div class="sharks-heading-2__paragraphs">
                <?php if ($paragraph_1): ?>
                    <p class="sharks-heading-2__paragraph"><?php echo nl2br(esc_html($paragraph_1)); ?></p>
                <?php endif; ?>
                
                <?php if ($paragraph_2): ?>
                    <p class="sharks-heading-2__paragraph"><?php echo nl2br(esc_html($paragraph_2)); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

