<?php
/**
 * Heading Half Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$heading_parts = get_field('heading_parts');
$heading_tag = get_field('heading_tag') ?: 'h2';
$description = get_field('description');
$icons = get_field('icons');
$background_color = get_field('background_color') ?: 'transparent';

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = sharks_get_block_anchor($block, 'heading-half');
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';

// Background color
$background_style = '';
if ($background_color && $background_color !== 'transparent') {
    $background_style = ' style="background-color: ' . esc_attr($background_color) . ';"';
}

// Icon mapping  
$icon_map = [
    'asterisk' => '<svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="40" cy="40" r="39" stroke="currentColor" stroke-width="2"/><path d="M40 20L40 60M60 40L20 40M52 28L28 52M52 52L28 28" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>',
    'star' => '<svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="40" cy="40" r="39" stroke="currentColor" stroke-width="2"/><path d="M40 20L45 35L60 40L45 45L40 60L35 45L20 40L35 35L40 20Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>',
    'x' => '<svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="40" cy="40" r="39" stroke="currentColor" stroke-width="2"/><path d="M52 28L28 52M52 52L28 28" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>',
    'circle' => '<svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="40" cy="40" r="39" stroke="currentColor" stroke-width="2"/><circle cx="40" cy="40" r="15" fill="currentColor"/></svg>',
    'arrow' => '<svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="40" cy="40" r="39" stroke="currentColor" stroke-width="2"/><path d="M25 40H55M55 40L45 30M55 40L45 50" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
];
?>

<div id="<?php echo esc_attr($anchor); ?>" class="heading-half<?php echo esc_attr($align_class . $class_name); ?>"<?php echo $background_style; ?>>
    <div class="heading-half__container">
        <div class="heading-half__content">
            <div class="heading-half__hero-text">
                <?php 
                $tag_open = '<' . esc_attr($heading_tag) . ' class="heading-half__title">';
                $tag_close = '</' . esc_attr($heading_tag) . '>';
                
                echo $tag_open;
                
                if ($heading_parts): 
                    foreach ($heading_parts as $part):
                        if ($part['part_type'] === 'text'):
                            $color_class = !empty($part['color']) ? ' heading-half__part--' . $part['color'] : '';
                            ?>
                            <span class="heading-half__part<?php echo esc_attr($color_class); ?>">
                                <?php echo esc_html($part['text']); ?>
                            </span>
                        <?php elseif ($part['part_type'] === 'line_break'): ?>
                            <br class="heading-half__break">
                        <?php endif;
                    endforeach;
                else: 
                    // Default placeholder
                    ?>
                    <span class="heading-half__part heading-half__part--light">Millest </span>
                    <span class="heading-half__part heading-half__part--dark">alustada?</span>
                <?php endif;
                
                echo $tag_close;
                ?>
                
                <?php if ($description): ?>
                    <p class="heading-half__description"><?php echo esc_html($description); ?></p>
                <?php endif; ?>
            </div>
            
            <?php if ($icons): ?>
                <div class="heading-half__icons">
                    <?php foreach ($icons as $icon_item): 
                        $icon_type = $icon_item['icon_type'];
                        $icon_svg = isset($icon_map[$icon_type]) ? $icon_map[$icon_type] : $icon_map['asterisk'];
                        ?>
                        <div class="heading-half__icon">
                            <?php echo $icon_svg; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <!-- Default 3 icons placeholder -->
                <div class="heading-half__icons">
                    <div class="heading-half__icon">
                        <?php echo $icon_map['asterisk']; ?>
                    </div>
                    <div class="heading-half__icon">
                        <?php echo $icon_map['star']; ?>
                    </div>
                    <div class="heading-half__icon">
                        <?php echo $icon_map['x']; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

