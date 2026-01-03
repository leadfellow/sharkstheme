<?php
/**
 * Block Name: Works1
 * Description: Display 1 large project image with customizable heading and colors
 */

// Get block settings
$block_id = 'block-works1-' . ($block['id'] ?? uniqid());
$class_name = isset($block['className']) ? ' ' . $block['className'] : '';
$align_class = isset($block['align']) ? ' align' . $block['align'] : '';
$anchor = !empty($block['anchor']) ? $block['anchor'] : '';

// Get field values
$background_color = get_field('background_color') ?: '#ffffff';
$text_color = get_field('text_color') ?: '#000000';
$heading_parts = get_field('heading_parts');
$subtitle = get_field('subtitle');
$description = get_field('description');
$image = get_field('image');
$image_bg_color = get_field('image_bg_color') ?: '#000000';

// Icon map (same as other works blocks)
$icon_map = [
    'x' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><path d="M59.043 2.95701C57.4099 1.3239 54.7621 1.3239 53.129 2.95701L43.543 12.543C36.6157 19.4703 25.3843 19.4703 18.457 12.543L8.87103 2.95701C7.23792 1.3239 4.59012 1.3239 2.95701 2.95701C1.3239 4.59012 1.3239 7.23792 2.95701 8.87103L12.543 18.457C19.4703 25.3843 19.4703 36.6157 12.543 43.543L2.95701 53.129C1.3239 54.7621 1.3239 57.4099 2.95701 59.043C4.59012 60.6761 7.23792 60.6761 8.87103 59.043L18.457 49.457C25.3843 42.5297 36.6157 42.5297 43.543 49.457L53.129 59.043C54.7621 60.6761 57.4099 60.6761 59.043 59.043C60.6761 57.4099 60.6761 54.7621 59.043 53.129L49.457 43.543C42.5297 36.6157 42.5297 25.3843 49.457 18.457L59.043 8.87103C60.6761 7.23792 60.6761 4.59012 59.043 2.95701Z" fill="' . esc_attr($text_color) . '"/></svg>',
    'asterisk' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><path d="M31 0V62M62 31H0M52.3269 9.67313L9.67313 52.3269M52.3269 52.3269L9.67313 9.67313" stroke="' . esc_attr($text_color) . '" stroke-width="2.06667"/></svg>',
    'star' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><path d="M38.5117 12.865L46.9346 4.44214L57.5576 15.0652L49.1348 23.488H61.0459V38.5115H50.126L58.1279 45.9431L47.9043 56.9509L38.5117 48.2273V61.0466H23.4883V49.1345L15.0654 57.5574L4.44336 46.9343L12.8662 38.5115H0.953125V23.488H11.875L3.87305 16.0564L14.0967 5.04858L23.4883 13.7703V0.953857H38.5117V12.865Z" fill="' . esc_attr($text_color) . '"/></svg>',
    'circle' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><circle cx="31" cy="31" r="30" fill="' . esc_attr($text_color) . '"/></svg>'
];
?>

<section id="<?php echo esc_attr($anchor); ?>" class="block-works1<?php echo esc_attr($align_class . $class_name); ?>" style="background-color: <?php echo esc_attr($background_color); ?>; color: <?php echo esc_attr($text_color); ?>">
    <div class="block-works1__container">
        <div class="block-works1__wrapper">
            <!-- Header Section -->
            <div class="block-works1__header">
                <div class="block-works1__header-left">
                    <!-- Heading with parts -->
                    <?php if ($heading_parts && is_array($heading_parts)): ?>
                        <div class="block-works1__heading-wrapper">
                            <div class="block-works1__heading"><?php 
                                foreach ($heading_parts as $part): 
                                    if ($part['part_type'] === 'text' && !empty($part['text'])): 
                                        ?><span class="block-works1__heading-part block-works1__heading-part--<?php echo esc_attr($part['color'] ?: 'black'); ?>"><?php echo esc_html($part['text']); ?></span><?php
                                    elseif ($part['part_type'] === 'icon' && !empty($part['icon'])): 
                                        ?><span class="block-works1__heading-icon"><?php echo isset($icon_map[$part['icon']]) ? $icon_map[$part['icon']] : $icon_map['star']; ?></span><?php
                                    elseif ($part['part_type'] === 'line_break'): 
                                        ?><br class="block-works1__heading-break"><?php
                                    endif;
                                endforeach; 
                            ?></div>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Subtitle under heading -->
                    <?php if ($subtitle): ?>
                        <div class="block-works1__subtitle"><?php echo nl2br(esc_html($subtitle)); ?></div>
                    <?php endif; ?>
                </div>
                
                <!-- Description on the right -->
                <div class="block-works1__header-right">
                    <?php if ($description): ?>
                        <div class="block-works1__description">
                            <?php echo wpautop($description); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Image Section -->
            <?php if ($image): ?>
                <div class="block-works1__image-section" style="background-color: <?php echo esc_attr($image_bg_color); ?>">
                    <div class="block-works1__image-container">
                        <img src="<?php echo esc_url($image['url']); ?>" 
                             alt="<?php echo esc_attr($image['alt'] ?: 'Project'); ?>" 
                             class="block-works1__image">
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

