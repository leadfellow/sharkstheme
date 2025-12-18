<?php
/**
 * Two Box CTA Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$section_background_color = get_field('section_background_color') ?: '#FFFFFF';
$card_background_color = get_field('card_background_color') ?: '#F7F7F5';
$left_card = get_field('left_card');
$right_card = get_field('right_card');

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = !empty($block['anchor']) ? $block['anchor'] : 'two-box-cta-' . $block['id'];
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';

// Icon mapping
$icon_map = [
    'x' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><path d="M40.029 2.00474C38.9866 0.962359 37.2758 0.962359 36.2334 2.00474L29.5478 8.69037C24.8177 13.4204 17.1823 13.4204 12.4522 8.69037L5.76657 2.00474C4.72419 0.962359 3.01343 0.962359 1.97105 2.00474C0.928666 3.04712 0.928666 4.75788 1.97105 5.80026L8.65668 12.4859C13.3867 17.216 13.3867 24.8513 8.65668 29.5814L1.97105 36.267C0.928666 37.3094 0.928666 39.0202 1.97105 40.0625C3.01343 41.1049 4.72419 41.1049 5.76657 40.0625L12.4522 33.3769C17.1823 28.6468 24.8177 28.6468 29.5478 33.3769L36.2334 40.0625C37.2758 41.1049 38.9866 41.1049 40.029 40.0625C41.0714 39.0202 41.0714 37.3094 40.029 36.267L33.3433 29.5814C28.6133 24.8513 28.6133 17.216 33.3433 12.4859L40.029 5.80026C41.0714 4.75788 41.0714 3.04712 40.029 2.00474Z" fill="black"/></svg>',
    'asterisk' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><path d="M26.0877 8.71566L31.7938 3.00961L38.9901 10.2059L33.285 15.911H41.3543V26.0877H33.9549L39.3768 31.1229L32.451 38.5789L26.0877 32.6688V41.3534H15.911V33.284L10.2049 38.9901L3.00863 31.7948L8.71566 26.0877H0.646327V15.911H8.04379L2.62289 10.8768L9.54867 3.42074L15.911 9.32894V0.646327H26.0877V8.71566Z" fill="black"/></svg>',
    'star' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><path d="M21.0001 0.000135629L21.0042 20.9795L29.0365 1.59866L21.0118 20.9827L35.8493 6.1509L21.0176 20.9885L40.4016 12.9637L21.0208 20.9961L42.0001 21.0001L21.0208 21.0042L40.4016 29.0365L21.0176 21.0118L35.8493 35.8493L21.0118 21.0176L29.0365 40.4016L21.0042 21.0208L21.0001 42.0001L20.9961 21.0208L12.9637 40.4016L20.9885 21.0176L6.1509 35.8493L20.9827 21.0118L1.59866 29.0365L20.9795 21.0042L0.000135629 21.0001L20.9795 20.9961L1.59866 12.9637L20.9827 20.9885L6.1509 6.1509L20.9885 20.9827L12.9637 1.59866L20.9961 20.9795L21.0001 0.000135629Z" stroke="black" stroke-width="1.4"/></svg>',
    'circle' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><circle cx="21" cy="21" r="20" fill="black"/></svg>'
];

/**
 * Render a single card
 */
if (!function_exists('render_two_box_cta_card')) {
    function render_two_box_cta_card($card, $icon_map, $card_background_color) {
        if (empty($card)) return;
    
    $show_icon = $card['show_icon'] ?? false;
    $icon = $card['icon'] ?? 'star';
    $title = $card['title'] ?? '';
    $content_type = $card['content_type'] ?? 'labels';
    $features = $card['features'] ?? [];
    $description_text = $card['description_text'] ?? '';
    $button_text = $card['button_text'] ?? 'Saada päring';
    $button_url = $card['button_url'] ?? '#';
    ?>
    
    <div class="block-two-box-cta__card" style="background-color: <?php echo esc_attr($card_background_color); ?>;">
        <div class="block-two-box-cta__card-content">
            <?php if ($show_icon && !empty($icon)): ?>
                <div class="block-two-box-cta__icon">
                    <?php echo isset($icon_map[$icon]) ? $icon_map[$icon] : $icon_map['star']; ?>
                </div>
            <?php endif; ?>
            
            <div class="block-two-box-cta__text-section">
                <?php if ($title): ?>
                    <h2 class="block-two-box-cta__title"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
                
                <?php if ($content_type === 'labels' && !empty($features)): ?>
                    <div class="block-two-box-cta__features">
                        <?php foreach ($features as $feature): 
                            $feature_type = $feature['feature_type'] ?? 'plus';
                            $feature_text = $feature['feature_text'] ?? '';
                            $bullet_class = $feature_type === 'plus' ? 'block-two-box-cta__bullet--yellow' : 'block-two-box-cta__bullet--pink';
                        ?>
                            <div class="block-two-box-cta__feature">
                                <div class="block-two-box-cta__bullet <?php echo esc_attr($bullet_class); ?>"></div>
                                <div class="block-two-box-cta__feature-text"><?php echo esc_html($feature_text); ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php elseif ($content_type === 'text' && $description_text): ?>
                    <div class="block-two-box-cta__description">
                        <?php echo wp_kses_post(nl2br($description_text)); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <a href="<?php echo esc_url($button_url); ?>" class="block-two-box-cta__button">
            <span class="block-two-box-cta__button-text"><?php echo esc_html($button_text); ?></span>
            <div class="block-two-box-cta__button-arrow">
                <svg width="12" height="10" viewBox="0 0 12 10" fill="none">
                    <path d="M0.708333 4.70827L10.7083 4.70827" stroke="currentColor" stroke-width="1.41667" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6.70833 0.708333L10.7083 4.70833L6.70833 8.70833" stroke="currentColor" stroke-width="1.41667" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </a>
    </div>
    
    <?php
    }
}
?>

<section 
    id="<?php echo esc_attr($anchor); ?>" 
    class="block-two-box-cta<?php echo esc_attr($align_class . $class_name); ?>" 
    style="background-color: <?php echo esc_attr($section_background_color); ?>;">
    <div class="block-two-box-cta__container">
        <?php 
        render_two_box_cta_card($left_card, $icon_map, $card_background_color);
        render_two_box_cta_card($right_card, $icon_map, $card_background_color);
        ?>
    </div>
</section>

