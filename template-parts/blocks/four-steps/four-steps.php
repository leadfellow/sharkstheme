<?php
/**
 * Block: Four Steps
 * 
 * Flexible section with customizable header icons, left card with icon and description,
 * and right side with 4 steps (one can be highlighted)
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get block attributes
$block_id = 'four-steps-' . $block['id'];
if (!empty($block['anchor'])) {
    $block_id = $block['anchor'];
}

// Get alignment class
$align_class = !empty($block['align']) ? 'align' . $block['align'] : '';

// Get fields
$header_icon_left = get_field('header_icon_left');
$header_title = get_field('header_title');
$header_icon_right = get_field('header_icon_right');
$card_background_icon = get_field('card_background_icon');
$card_number = get_field('card_number');
$card_description = get_field('card_description');
$steps = get_field('steps');

// Icon mapping for header (black filled icons - same as portfolio)
$header_icon_map = [
    'x' => '<svg viewBox="0 0 62 62" fill="none"><path d="M59.043 2.95701C57.4099 1.3239 54.7621 1.3239 53.129 2.95701L43.543 12.543C36.6157 19.4703 25.3843 19.4703 18.457 12.543L8.87103 2.95701C7.23792 1.3239 4.59012 1.3239 2.95701 2.95701C1.3239 4.59012 1.3239 7.23792 2.95701 8.87103L12.543 18.457C19.4703 25.3843 19.4703 36.6157 12.543 43.543L2.95701 53.129C1.3239 54.7621 1.3239 57.4099 2.95701 59.043C4.59012 60.6761 7.23792 60.6761 8.87103 59.043L18.457 49.457C25.3843 42.5297 36.6157 42.5297 43.543 49.457L53.129 59.043C54.7621 60.6761 57.4099 60.6761 59.043 59.043C60.6761 57.4099 60.6761 54.7621 59.043 53.129L49.457 43.543C42.5297 36.6157 42.5297 25.3843 49.457 18.457L59.043 8.87103C60.6761 7.23792 60.6761 4.59012 59.043 2.95701Z" fill="black"/></svg>',
    'asterisk' => '<svg viewBox="0 0 62 62" fill="none"><path d="M38.5117 12.865L46.9346 4.44214L57.5576 15.0652L49.1348 23.488H61.0459V38.5115H50.126L58.1279 45.9431L47.9043 56.9509L38.5117 48.2273V61.0466H23.4883V49.1345L15.0654 57.5574L4.44336 46.9343L12.8662 38.5115H0.953125V23.488H11.875L3.87305 16.0564L14.0967 5.04858L23.4883 13.7703V0.953857H38.5117V12.865Z" fill="black"/></svg>',
    'star' => '<svg viewBox="0 0 62.0004 62.0004" fill="none"><path d="M31.0002 0.000200214L31.0062 30.9697L42.8635 2.35993L31.0175 30.9745L52.9205 9.0799L31.0259 30.983L59.6405 19.1369L31.0307 30.9942L62.0002 31.0002L31.0307 31.0062L59.6405 42.8635L31.0259 31.0175L52.9205 52.9205L31.0175 31.0259L42.8635 59.6405L31.0062 31.0307L31.0002 62.0002L30.9942 31.0307L19.1369 59.6405L30.983 31.0259L9.0799 52.9205L30.9745 31.0175L2.35993 42.8635L30.9697 31.0062L0.000200214 31.0002L30.9697 30.9942L2.35993 19.1369L30.9745 30.983L9.0799 9.0799L30.983 30.9745L19.1369 2.35993L30.9942 30.9697L31.0002 0.000200214Z" fill="black"/></svg>',
    'circle' => '<svg viewBox="0 0 62 62" fill="none"><circle cx="31" cy="31" r="30" fill="black"/></svg>',
];

// Icon mapping for card (white stroke icons on black background)
$card_icon_map = [
    'x' => '<svg viewBox="0 0 62 62" fill="none"><path d="M59.043 2.95701C57.4099 1.3239 54.7621 1.3239 53.129 2.95701L43.543 12.543C36.6157 19.4703 25.3843 19.4703 18.457 12.543L8.87103 2.95701C7.23792 1.3239 4.59012 1.3239 2.95701 2.95701C1.3239 4.59012 1.3239 7.23792 2.95701 8.87103L12.543 18.457C19.4703 25.3843 19.4703 36.6157 12.543 43.543L2.95701 53.129C1.3239 54.7621 1.3239 57.4099 2.95701 59.043C4.59012 60.6761 7.23792 60.6761 8.87103 59.043L18.457 49.457C25.3843 42.5297 36.6157 42.5297 43.543 49.457L53.129 59.043C54.7621 60.6761 57.4099 60.6761 59.043 59.043C60.6761 57.4099 60.6761 54.7621 59.043 53.129L49.457 43.543C42.5297 36.6157 42.5297 25.3843 49.457 18.457L59.043 8.87103C60.6761 7.23792 60.6761 4.59012 59.043 2.95701Z" stroke="white" stroke-width="2"/></svg>',
    'asterisk' => '<svg viewBox="0 0 62 62" fill="none"><path d="M31 0V62M62 31H0M52.3269 9.67313L9.67313 52.3269M52.3269 52.3269L9.67313 9.67313" stroke="white" stroke-width="2.06667"/></svg>',
    'star' => '<svg viewBox="0 0 62.0004 62.0004" fill="none"><path d="M31.0002 0.000200214L31.0062 30.9697L42.8635 2.35993L31.0175 30.9745L52.9205 9.0799L31.0259 30.983L59.6405 19.1369L31.0307 30.9942L62.0002 31.0002L31.0307 31.0062L59.6405 42.8635L31.0259 31.0175L52.9205 52.9205L31.0175 31.0259L42.8635 59.6405L31.0062 31.0307L31.0002 62.0002L30.9942 31.0307L19.1369 59.6405L30.983 31.0259L9.0799 52.9205L30.9745 31.0175L2.35993 42.8635L30.9697 31.0062L0.000200214 31.0002L30.9697 30.9942L2.35993 19.1369L30.9745 30.983L9.0799 9.0799L30.983 30.9745L19.1369 2.35993L30.9942 30.9697L31.0002 0.000200214Z" stroke="white" stroke-width="2.06667"/></svg>',
    'asterisk-stroke' => '<svg viewBox="0 0 381.706 381.706" fill="none"><path d="M238.565 75.6621L292.067 22.1602L359.544 89.6367L306.042 143.139H381.706V238.565H312.339L363.165 285.77L298.226 355.691L238.565 300.282V381.706H143.139V306.042L89.6377 359.544L22.1602 292.067L75.6621 238.565H0V143.139H69.3633L18.5371 95.9346L83.4756 26.0127L143.139 81.4229V0H238.565V75.6621Z" stroke="#757472" stroke-width="2"/></svg>',
    'circle' => '<svg viewBox="0 0 62 62" fill="none"><circle cx="31" cy="31" r="30" stroke="white" stroke-width="2"/></svg>',
];

// Check if we have required data
if (!$header_title && !$steps) {
    if (is_admin()) {
        echo '<div style="padding: 2rem; background: #f0f0f0; text-align: center;">';
        echo '<p>⚠️ Lisa Four Steps blokile pealkiri ja sammud</p>';
        echo '</div>';
    }
    return;
}
?>

<section id="<?php echo esc_attr($block_id); ?>" class="block-four-steps <?php echo esc_attr($align_class); ?>">
    <div class="four-steps__container">
        
        <!-- Header Section -->
        <div class="four-steps__header">
            <?php if ($header_icon_left): ?>
                <div class="four-steps__icon four-steps__icon--left">
                    <?php echo $header_icon_map[$header_icon_left] ?? $header_icon_map['x']; ?>
                </div>
            <?php endif; ?>
            
            <?php if ($header_title): ?>
                <h2 class="four-steps__title"><?php echo esc_html($header_title); ?></h2>
            <?php endif; ?>
            
            <?php if ($header_icon_right): ?>
                <div class="four-steps__icon four-steps__icon--right">
                    <?php echo $header_icon_map[$header_icon_right] ?? $header_icon_map['asterisk']; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Content Section -->
        <div class="four-steps__content">
            
            <!-- Left Column - Card -->
            <div class="four-steps__left-column">
                <div class="four-steps__card">
                    <?php if ($card_background_icon): ?>
                        <div class="four-steps__card-background">
                            <?php echo $card_icon_map[$card_background_icon] ?? $card_icon_map['asterisk-stroke']; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($card_number): ?>
                        <div class="four-steps__card-number"><?php echo esc_html($card_number); ?></div>
                    <?php endif; ?>
                </div>
                
                <?php if ($card_description): ?>
                    <p class="four-steps__card-description"><?php echo esc_html($card_description); ?></p>
                <?php endif; ?>
            </div>

            <!-- Right Column - Steps List -->
            <div class="four-steps__right-column">
                <?php if ($steps): ?>
                    <?php foreach ($steps as $index => $step): 
                        $step_number = sprintf('(%02d)', $index + 1);
                        $step_text = $step['step_text'] ?? '';
                        $is_highlighted = $step['is_highlighted'] ?? false;
                        $has_border = $step['has_border'] ?? false;
                        
                        // Get step-specific data for interactive functionality
                        $step_icon = $step['step_icon'] ?? '';
                        $step_card_number = $step['step_card_number'] ?? '';
                        $step_description = $step['step_description'] ?? '';
                        
                        $step_classes = ['four-steps__step'];
                        if ($is_highlighted) {
                            $step_classes[] = 'four-steps__step--highlighted';
                        }
                        if ($has_border) {
                            $step_classes[] = 'four-steps__step--border';
                        }
                        
                        // Get icon SVG (use card icon map for white icons)
                        $icon_svg = '';
                        if ($step_icon && isset($card_icon_map[$step_icon])) {
                            $icon_svg = $card_icon_map[$step_icon];
                        }
                    ?>
                        <div class="<?php echo esc_attr(implode(' ', $step_classes)); ?>"
                             data-icon="<?php echo esc_attr($icon_svg); ?>"
                             data-number="<?php echo esc_attr($step_card_number); ?>"
                             data-description="<?php echo esc_attr($step_description); ?>">
                            <span class="four-steps__step-number"><?php echo esc_html($step_number); ?></span>
                            <span class="four-steps__step-text"><?php echo esc_html($step_text); ?></span>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            
        </div>
    </div>
</section>
