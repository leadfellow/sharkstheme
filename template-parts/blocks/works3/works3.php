<?php
/**
 * Block Name: Works3
 * Description: Display 3 success story cards with customizable heading and colors
 */

// Get block settings
$block_id = 'block-works3-' . ($block['id'] ?? uniqid());
$class_name = isset($block['className']) ? ' ' . $block['className'] : '';
$align_class = isset($block['align']) ? ' align' . $block['align'] : '';
$anchor = !empty($block['anchor']) ? $block['anchor'] : '';

// Get field values
$background_color = get_field('background_color') ?: '#000000';
$text_color = get_field('text_color') ?: '#ffffff';
$heading_parts = get_field('heading_parts');
$description = get_field('description');

// Get cards
$card_1 = get_field('card_1');
$card_2 = get_field('card_2');
$card_3 = get_field('card_3');

// Icon map (same as content-grey and works5)
$icon_map = [
    'x' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><path d="M59.043 2.95701C57.4099 1.3239 54.7621 1.3239 53.129 2.95701L43.543 12.543C36.6157 19.4703 25.3843 19.4703 18.457 12.543L8.87103 2.95701C7.23792 1.3239 4.59012 1.3239 2.95701 2.95701C1.3239 4.59012 1.3239 7.23792 2.95701 8.87103L12.543 18.457C19.4703 25.3843 19.4703 36.6157 12.543 43.543L2.95701 53.129C1.3239 54.7621 1.3239 57.4099 2.95701 59.043C4.59012 60.6761 7.23792 60.6761 8.87103 59.043L18.457 49.457C25.3843 42.5297 36.6157 42.5297 43.543 49.457L53.129 59.043C54.7621 60.6761 57.4099 60.6761 59.043 59.043C60.6761 57.4099 60.6761 54.7621 59.043 53.129L49.457 43.543C42.5297 36.6157 42.5297 25.3843 49.457 18.457L59.043 8.87103C60.6761 7.23792 60.6761 4.59012 59.043 2.95701Z" fill="' . esc_attr($text_color) . '"/></svg>',
    'asterisk' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><path d="M31 0V62M62 31H0M52.3269 9.67313L9.67313 52.3269M52.3269 52.3269L9.67313 9.67313" stroke="' . esc_attr($text_color) . '" stroke-width="2.06667"/></svg>',
    'star' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><path d="M31.0002 0.000244141L31.0062 30.9697L42.8635 2.35997L31.0175 30.9745L52.9205 9.07994L31.026 30.983L59.6405 19.137L31.0307 30.9942L62.0002 31.0002L31.0307 31.0062L59.6405 42.8635L31.026 31.0175L52.9205 52.9205L31.0175 31.026L42.8635 59.6405L31.0062 31.0307L31.0002 62.0002L30.9942 31.0307L19.137 59.6405L30.983 31.026L9.07994 52.9205L30.9745 31.0175L2.35997 42.8635L30.9697 31.0062L0.000244141 31.0002L30.9697 30.9942L2.35997 19.137L30.9745 30.983L9.07994 9.07994L30.983 30.9745L19.137 2.35997L30.9942 30.9697L31.0002 0.000244141Z" stroke="' . esc_attr($text_color) . '" stroke-width="2.06667"/></svg>',
    'circle' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><circle cx="31" cy="31" r="30" fill="' . esc_attr($text_color) . '"/></svg>'
];
?>

<section id="<?php echo esc_attr($anchor); ?>" class="block-works3<?php echo esc_attr($align_class . $class_name); ?>" style="background-color: <?php echo esc_attr($background_color); ?>; color: <?php echo esc_attr($text_color); ?>">
    <div class="block-works3__container">
        <div class="block-works3__wrapper">
            <!-- Header Section -->
            <div class="block-works3__header">
                <div class="block-works3__header-left">
                    <!-- Heading with parts -->
                    <?php if ($heading_parts && is_array($heading_parts)): ?>
                        <div class="block-works3__heading"><?php 
                            foreach ($heading_parts as $part): 
                                if ($part['part_type'] === 'text' && !empty($part['text'])): 
                                    ?><span class="block-works3__heading-part block-works3__heading-part--<?php echo esc_attr($part['color'] ?: 'white'); ?>"><?php echo esc_html($part['text']); ?></span><?php
                                elseif ($part['part_type'] === 'icon' && !empty($part['icon'])): 
                                    ?><span class="block-works3__heading-icon"><?php echo isset($icon_map[$part['icon']]) ? $icon_map[$part['icon']] : $icon_map['x']; ?></span><?php
                                elseif ($part['part_type'] === 'line_break'): 
                                    ?><br class="block-works3__heading-break"><?php
                                endif;
                            endforeach; 
                        ?></div>
                    <?php endif; ?>
                </div>
                
                <!-- Description on the right -->
                <div class="block-works3__header-right">
                    <?php if ($description): ?>
                        <div class="block-works3__description">
                            <?php echo wpautop($description); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Cards Section -->
            <div class="block-works3__cards">
                <!-- Card 1 -->
                <?php if ($card_1): ?>
                    <div class="block-works3__card">
                        <div class="block-works3__card-content">
                            <div class="block-works3__card-info">
                                <?php if (!empty($card_1['service'])): ?>
                                    <div class="block-works3__info-block">
                                        <p class="block-works3__info-label">Teenus:</p>
                                        <p class="block-works3__info-value"><?php echo esc_html($card_1['service']); ?></p>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if (!empty($card_1['client'])): ?>
                                    <div class="block-works3__info-block">
                                        <p class="block-works3__info-label">Klient:</p>
                                        <p class="block-works3__info-value"><?php echo esc_html($card_1['client']); ?></p>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if (!empty($card_1['growth'])): ?>
                                    <div class="block-works3__info-block">
                                        <p class="block-works3__info-label"><?php echo esc_html($card_1['growth_label'] ?: 'Külastuste kasv:'); ?></p>
                                        <p class="block-works3__info-value"><?php echo esc_html($card_1['growth']); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <?php if (!empty($card_1['link_url'])): ?>
                                <a href="<?php echo esc_url($card_1['link_url']); ?>" class="block-works3__card-link">
                                    <span class="block-works3__card-link-text"><?php echo esc_html($card_1['link_text'] ?: 'Loe lähemalt'); ?></span>
                                    <span class="block-works3__card-link-icon">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none">
                                            <rect width="26" height="26" fill="#FFFFFF"/>
                                            <path d="M8.9375 13H17.0625" stroke="#000000" stroke-width="1.15104" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M13.8125 9.75L17.0625 13L13.8125 16.25" stroke="#000000" stroke-width="1.15104" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Card 2 -->
                <?php if ($card_2): ?>
                    <div class="block-works3__card">
                        <div class="block-works3__card-content">
                            <div class="block-works3__card-info">
                                <?php if (!empty($card_2['service'])): ?>
                                    <div class="block-works3__info-block">
                                        <p class="block-works3__info-label">Teenus:</p>
                                        <p class="block-works3__info-value"><?php echo esc_html($card_2['service']); ?></p>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if (!empty($card_2['client'])): ?>
                                    <div class="block-works3__info-block">
                                        <p class="block-works3__info-label">Klient:</p>
                                        <p class="block-works3__info-value"><?php echo esc_html($card_2['client']); ?></p>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if (!empty($card_2['growth'])): ?>
                                    <div class="block-works3__info-block">
                                        <p class="block-works3__info-label"><?php echo esc_html($card_2['growth_label'] ?: 'Külastuste kasv:'); ?></p>
                                        <p class="block-works3__info-value"><?php echo esc_html($card_2['growth']); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <?php if (!empty($card_2['link_url'])): ?>
                                <a href="<?php echo esc_url($card_2['link_url']); ?>" class="block-works3__card-link">
                                    <span class="block-works3__card-link-text"><?php echo esc_html($card_2['link_text'] ?: 'Loe lähemalt'); ?></span>
                                    <span class="block-works3__card-link-icon">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none">
                                            <rect width="26" height="26" fill="#FFFFFF"/>
                                            <path d="M8.9375 13H17.0625" stroke="#000000" stroke-width="1.15104" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M13.8125 9.75L17.0625 13L13.8125 16.25" stroke="#000000" stroke-width="1.15104" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Card 3 -->
                <?php if ($card_3): ?>
                    <div class="block-works3__card">
                        <div class="block-works3__card-content">
                            <div class="block-works3__card-info">
                                <?php if (!empty($card_3['service'])): ?>
                                    <div class="block-works3__info-block">
                                        <p class="block-works3__info-label">Teenus:</p>
                                        <p class="block-works3__info-value"><?php echo esc_html($card_3['service']); ?></p>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if (!empty($card_3['client'])): ?>
                                    <div class="block-works3__info-block">
                                        <p class="block-works3__info-label">Klient:</p>
                                        <p class="block-works3__info-value"><?php echo esc_html($card_3['client']); ?></p>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if (!empty($card_3['growth'])): ?>
                                    <div class="block-works3__info-block">
                                        <p class="block-works3__info-label"><?php echo esc_html($card_3['growth_label'] ?: 'Külastuste kasv:'); ?></p>
                                        <p class="block-works3__info-value"><?php echo esc_html($card_3['growth']); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <?php if (!empty($card_3['link_url'])): ?>
                                <a href="<?php echo esc_url($card_3['link_url']); ?>" class="block-works3__card-link">
                                    <span class="block-works3__card-link-text"><?php echo esc_html($card_3['link_text'] ?: 'Loe lähemalt'); ?></span>
                                    <span class="block-works3__card-link-icon">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none">
                                            <rect width="26" height="26" fill="#FFFFFF"/>
                                            <path d="M8.9375 13H17.0625" stroke="#000000" stroke-width="1.15104" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M13.8125 9.75L17.0625 13L13.8125 16.25" stroke="#000000" stroke-width="1.15104" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

