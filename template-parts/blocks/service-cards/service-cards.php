<?php
/**
 * Service Cards Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$heading_parts = get_field('heading_parts');
$intro_text = get_field('intro_text');
$cards = get_field('cards');

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = !empty($block['anchor']) ? $block['anchor'] : 'service-cards-' . $block['id'];
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';

// Icon mapping
$icon_map = [
    'x' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><path d="M59.043 2.95701C57.4099 1.3239 54.7621 1.3239 53.129 2.95701L43.543 12.543C36.6157 19.4703 25.3843 19.4703 18.457 12.543L8.87103 2.95701C7.23792 1.3239 4.59012 1.3239 2.95701 2.95701C1.3239 4.59012 1.3239 7.23792 2.95701 8.87103L12.543 18.457C19.4703 25.3843 19.4703 36.6157 12.543 43.543L2.95701 53.129C1.3239 54.7621 1.3239 57.4099 2.95701 59.043C4.59012 60.6761 7.23792 60.6761 8.87103 59.043L18.457 49.457C25.3843 42.5297 36.6157 42.5297 43.543 49.457L53.129 59.043C54.7621 60.6761 57.4099 60.6761 59.043 59.043C60.6761 57.4099 60.6761 54.7621 59.043 53.129L49.457 43.543C42.5297 36.6157 42.5297 25.3843 49.457 18.457L59.043 8.87103C60.6761 7.23792 60.6761 4.59012 59.043 2.95701Z" fill="white"/></svg>',
    'asterisk' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><path d="M38.5117 12.8651L46.9346 4.44226L57.5576 15.0653L49.1348 23.4882H61.0459V38.5116H50.126L58.1279 45.9432L47.9043 56.951L38.5117 48.2274V61.0468H23.4883V49.1346L15.0654 57.5575L4.44336 46.9344L12.8662 38.5116H0.953125V23.4882H11.874L3.87305 16.0575L14.0967 5.04871L23.4883 13.7704V0.953979H38.5117V12.8651Z" fill="white"/></svg>',
    'star' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><path d="M31.0002 0.000244141L31.0062 30.9697L42.8635 2.35997L31.0175 30.9745L52.9205 9.07994L31.026 30.983L59.6405 19.137L31.0307 30.9942L62.0002 31.0002L31.0307 31.0062L59.6405 42.8635L31.026 31.0175L52.9205 52.9205L31.0175 31.026L42.8635 59.6405L31.0062 31.0307L31.0002 62.0002L30.9942 31.0307L19.137 59.6405L30.983 31.026L9.07994 52.9205L30.9745 31.0175L2.35997 42.8635L30.9697 31.0062L0.000244141 31.0002L30.9697 30.9942L2.35997 19.137L30.9745 30.983L9.07994 9.07994L30.983 30.9745L19.137 2.35997L30.9942 30.9697L31.0002 0.000244141Z" stroke="white" stroke-width="2.06667"/></svg>',
    'circle' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><circle cx="31" cy="31" r="30" fill="white"/></svg>'
];
?>

<section id="<?php echo esc_attr($anchor); ?>" class="block-service-cards<?php echo esc_attr($align_class . $class_name); ?>">
    <div class="block-service-cards__container">
        <!-- Header -->
        <?php if ($heading_parts && is_array($heading_parts)): ?>
            <div class="block-service-cards__header">
                <h2 class="block-service-cards__title"><?php 
                    foreach ($heading_parts as $part): 
                        if ($part['part_type'] === 'text' && !empty($part['text'])): 
                            ?><span class="block-service-cards__title-part"><?php echo esc_html($part['text']); ?></span><?php
                        elseif ($part['part_type'] === 'icon' && !empty($part['icon'])): 
                            ?><span class="block-service-cards__title-icon"><?php echo isset($icon_map[$part['icon']]) ? $icon_map[$part['icon']] : $icon_map['x']; ?></span><?php
                        elseif ($part['part_type'] === 'line_break'): 
                            ?><br class="block-service-cards__title-break"><?php
                        endif;
                    endforeach; 
                ?></h2>
            </div>
        <?php endif; ?>
        
        <!-- Intro Text -->
        <?php if ($intro_text): ?>
            <p class="block-service-cards__intro"><?php echo esc_html($intro_text); ?></p>
        <?php endif; ?>
        
        <!-- Cards Grid -->
        <?php if ($cards && is_array($cards)): ?>
            <div class="block-service-cards__grid">
                <?php 
                $card_count = count($cards);
                $row_index = 0;
                $card_index = 0;
                
                // Determine rows: 2 cards per row, last row can have remaining cards
                while ($card_index < $card_count): 
                    $cards_in_row = ($card_count - $card_index >= 2) ? 2 : ($card_count - $card_index);
                    ?>
                    <div class="block-service-cards__row">
                        <?php 
                        for ($i = 0; $i < $cards_in_row; $i++): 
                            $card = $cards[$card_index];
                            $card_number = str_pad($card_index + 1, 2, '0', STR_PAD_LEFT);
                            $card_index++;
                        ?>
                            <div class="block-service-cards__card">
                                <div class="block-service-cards__card-number"><?php echo esc_html($card_number); ?></div>
                                <div class="block-service-cards__card-content">
                                    <h3 class="block-service-cards__card-title"><?php echo esc_html($card['title']); ?></h3>
                                    <?php if (!empty($card['description'])): ?>
                                        <p class="block-service-cards__card-description"><?php echo esc_html($card['description']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                    <?php
                    $row_index++;
                endwhile;
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>


