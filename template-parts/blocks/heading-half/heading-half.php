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
    'asterisk' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M38.5115 12.8652L46.9343 4.44238L57.5574 15.0654L49.1345 23.4883H61.0457V38.5117H50.1257L58.1277 45.9434L47.9041 56.9512L38.5115 48.2275V61.0469H23.488V49.1348L15.0652 57.5576L4.44214 46.9346L12.865 38.5117H0.953857V23.4883H11.8728L3.87183 16.0576L14.0955 5.04883L23.488 13.7715V0.954102H38.5115V12.8652Z" fill="currentColor"/></svg>',
    'star' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M31 0.000244141L31.006 30.9697L42.863 2.35997L31.017 30.9745L52.92 9.07994L31.026 30.983L59.64 19.137L31.03 30.9942L62 31.0002L31.03 31.0062L59.64 42.8635L31.026 31.0175L52.92 52.9205L31.017 31.026L42.863 59.6405L31.006 31.0307L31 62.0002L30.994 31.0307L19.137 59.6405L30.983 31.026L9.08 52.9205L30.974 31.0175L2.3597 42.8635L30.97 31.0062L0 31.0002L30.97 30.9942L2.3597 19.137L30.974 30.983L9.08 9.07994L30.983 30.9745L19.137 2.35997L30.994 30.9697L31 0.000244141Z" stroke="currentColor" stroke-width="2.06667"/></svg>',
    'wave' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M59.043 2.95726C57.41 1.32414 54.762 1.32414 53.129 2.95726L43.543 12.5432C36.616 19.4705 25.384 19.4705 18.457 12.5432L8.87098 2.95725C7.23786 1.32414 4.59007 1.32414 2.95695 2.95725C1.32384 4.59037 1.32384 7.23816 2.95695 8.87128L12.543 18.4573C19.47 25.3846 19.47 36.6159 12.543 43.5432L2.95695 53.1292C1.32384 54.7623 1.32384 57.4101 2.95695 59.0432C4.59007 60.6763 7.23786 60.6763 8.87098 59.0432L18.457 49.4573C25.384 42.53 36.616 42.53 43.543 49.4573L53.129 59.0432C54.762 60.6763 57.41 60.6763 59.043 59.0432C60.676 57.4101 60.676 54.7623 59.043 53.1292L49.457 43.5432C42.53 36.6159 42.53 25.3846 49.457 18.4573L59.043 8.87127C60.676 7.23816 60.676 4.59037 59.043 2.95726Z" fill="currentColor"/></svg>',
    'x' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 8L54 54M54 8L8 54" stroke="currentColor" stroke-width="4" stroke-linecap="round"/></svg>',
    'circle' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="31" cy="31" r="29" stroke="currentColor" stroke-width="4"/></svg>',
    'arrow' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 31H52M52 31L38 17M52 31L38 45" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg>',
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

