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
$heading_parts = get_field('heading_parts');
$left_icons = get_field('left_icons');
$closed_accordion_items = get_field('closed_accordion_items');
$left_background_color = get_field('left_background_color') ?: '#F7F7F5';
$right_background_color = get_field('right_background_color') ?: '#000000';

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

// Icon mapping
$icon_map = [
    'asterisk' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><path d="M38.5117 12.865L46.9346 4.44214L57.5576 15.0652L49.1348 23.488H61.0459V38.5115H50.126L58.1279 45.9431L47.9043 56.9509L38.5117 48.2273V61.0466H23.4883V49.1345L15.0654 57.5574L4.44336 46.9343L12.8662 38.5115H0.953125V23.488H11.875L3.87305 16.0564L14.0967 5.04858L23.4883 13.7703V0.953857H38.5117V12.865Z" fill="black"/></svg>',
    'star' => '<svg width="62" height="62" viewBox="0 0 62.0004 62.0004" fill="none"><path d="M31.0002 0.000200214L31.0062 30.9697L42.8635 2.35993L31.0175 30.9745L52.9205 9.0799L31.0259 30.983L59.6405 19.1369L31.0307 30.9942L62.0002 31.0002L31.0307 31.0062L59.6405 42.8635L31.0259 31.0175L52.9205 52.9205L31.0175 31.0259L42.8635 59.6405L31.0062 31.0307L31.0002 62.0002L30.9942 31.0307L19.1369 59.6405L30.983 31.0259L9.0799 52.9205L30.9745 31.0175L2.35993 42.8635L30.9697 31.0062L0.000200214 31.0002L30.9697 30.9942L2.35993 19.1369L30.9745 30.983L9.0799 9.0799L30.983 30.9745L19.1369 2.35993L30.9942 30.9697L31.0002 0.000200214Z" stroke="black" stroke-width="2.06667"/></svg>',
    'x' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><path d="M59.043 2.95701C57.4099 1.3239 54.7621 1.3239 53.129 2.95701L43.543 12.543C36.6157 19.4703 25.3843 19.4703 18.457 12.543L8.87103 2.95701C7.23792 1.3239 4.59012 1.3239 2.95701 2.95701C1.3239 4.59012 1.3239 7.23792 2.95701 8.87103L12.543 18.457C19.4703 25.3843 19.4703 36.6157 12.543 43.543L2.95701 53.129C1.3239 54.7621 1.3239 57.4099 2.95701 59.043C4.59012 60.6761 7.23792 60.6761 8.87103 59.043L18.457 49.457C25.3843 42.5297 36.6157 42.5297 43.543 49.457L53.129 59.043C54.7621 60.6761 57.4099 60.6761 59.043 59.043C60.6761 57.4099 60.6761 54.7621 59.043 53.129L49.457 43.543C42.5297 36.6157 42.5297 25.3843 49.457 18.457L59.043 8.87103C60.6761 7.23792 60.6761 4.59012 59.043 2.95701Z" fill="black"/></svg>',
];

// Return if no items
if (empty($closed_accordion_items)) {
    if (is_admin()) {
        echo '<div class="acf-block-preview"><p>Please add list items...</p></div>';
    }
    return;
}
?>

<section <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>" style="background-color: <?php echo esc_attr($left_background_color); ?>;">
    <div class="container">
        <div class="closed-accordion-main-content">
            
            <!-- Left Section -->
            <div class="closed-accordion-left-section">
                
                <!-- Title -->
                <div class="closed-accordion__title-block">
                    <?php if ($heading_parts && !empty($heading_parts)): ?>
                        <h2 class="closed-accordion__heading"><?php 
                            foreach ($heading_parts as $part): 
                                if ($part['part_type'] === 'text'):
                                    $color_class = ($part['color'] === 'light') ? 'closed-accordion__heading-part--light' : 'closed-accordion__heading-part--dark';
                                    ?><span class="closed-accordion__heading-part <?php echo esc_attr($color_class); ?>"><?php echo esc_html($part['text']); ?></span><?php
                                elseif ($part['part_type'] === 'line_break'):
                                    ?><br><?php
                                endif;
                            endforeach;
                        ?></h2>
                    <?php else: ?>
                        <h2 class="closed-accordion__heading"><span class="closed-accordion__heading-part closed-accordion__heading-part--dark">PEAMISED</span><span class="closed-accordion__heading-part closed-accordion__heading-part--light"> PÜSITEENUSE </span><span class="closed-accordion__heading-part closed-accordion__heading-part--dark">VALDKONNAD:</span></h2>
                    <?php endif; ?>
                </div>
                
                <!-- Icons -->
                <div class="closed-accordion__icons">
                    <?php if ($left_icons): ?>
                        <?php foreach ($left_icons as $icon_item): 
                            $icon_type = $icon_item['icon_type'];
                            $icon_svg = isset($icon_map[$icon_type]) ? $icon_map[$icon_type] : $icon_map['asterisk'];
                            ?>
                            <div class="closed-accordion__icon">
                                <?php echo $icon_svg; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Default 3 icons -->
                        <div class="closed-accordion__icon"><?php echo $icon_map['asterisk']; ?></div>
                        <div class="closed-accordion__icon"><?php echo $icon_map['star']; ?></div>
                        <div class="closed-accordion__icon"><?php echo $icon_map['x']; ?></div>
                    <?php endif; ?>
                </div>
                
            </div>
            
            <!-- Right Section - Services List -->
            <div class="closed-accordion-services-list">
                <?php foreach ($closed_accordion_items as $index => $item): 
                    $number = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                    $centered_class = !empty($item['centered']) ? ' closed-accordion__service-item--centered' : '';
                ?>
                    <div class="closed-accordion__service-item<?php echo esc_attr($centered_class); ?>">
                        <p class="closed-accordion__service-number">(<?php echo esc_html($number); ?>)</p>
                        <p class="closed-accordion__service-text"><?php echo esc_html($item['title']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            
        </div>
    </div>
</section>
