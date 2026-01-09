<?php
/**
 * Content with Highlighted Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$show_icon = get_field('show_icon');
$icon = get_field('icon') ?: 'star';
$text_content = get_field('text_content');
$background_color = get_field('background_color') ?: '#000000';
$text_color = get_field('text_color') ?: '#757472';
$highlight_color = get_field('highlight_color') ?: '#FFFFFF';

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = sharks_get_block_anchor($block, 'content-highlighted');
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';

// Icon mapping
$icon_map = [
    'x' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><path d="M40.029 2.00474C38.9866 0.962359 37.2758 0.962359 36.2334 2.00474L29.5478 8.69037C24.8177 13.4204 17.1823 13.4204 12.4522 8.69037L5.76657 2.00474C4.72419 0.962359 3.01343 0.962359 1.97105 2.00474C0.928666 3.04712 0.928666 4.75788 1.97105 5.80026L8.65668 12.4859C13.3867 17.216 13.3867 24.8513 8.65668 29.5814L1.97105 36.267C0.928666 37.3094 0.928666 39.0202 1.97105 40.0625C3.01343 41.1049 4.72419 41.1049 5.76657 40.0625L12.4522 33.3769C17.1823 28.6468 24.8177 28.6468 29.5478 33.3769L36.2334 40.0625C37.2758 41.1049 38.9866 41.1049 40.029 40.0625C41.0714 39.0202 41.0714 37.3094 40.029 36.267L33.3433 29.5814C28.6133 24.8513 28.6133 17.216 33.3433 12.4859L40.029 5.80026C41.0714 4.75788 41.0714 3.04712 40.029 2.00474Z" fill="white"/></svg>',
    'asterisk' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><path d="M26.0749 8.68674L31.7549 3.00677L38.9894 10.2413L33.3094 15.9213H41.2567V26.0748H33.9457L39.4105 31.1158L32.4387 38.5639L26.0749 32.7405V41.254H15.9213V33.2535L10.2413 38.9335L3.00781 31.699L8.68778 26.0748H0.645996V15.9213H8.03419L2.62219 10.8651L9.59397 3.41797L15.9213 9.30474V0.645996H26.0749V8.68674Z" fill="white"/></svg>',
    'star' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><path d="M21.0001 0.000135629L21.0042 20.9795L29.0365 1.59866L21.0118 20.9827L35.8493 6.1509L21.0176 20.9885L40.4016 12.9637L21.0208 20.9961L42.0001 21.0001L21.0208 21.0042L40.4016 29.0365L21.0176 21.0118L35.8493 35.8493L21.0118 21.0176L29.0365 40.4016L21.0042 21.0208L21.0001 42.0001L20.9961 21.0208L12.9637 40.4016L20.9885 21.0176L6.1509 35.8493L20.9827 21.0118L1.59866 29.0365L20.9795 21.0042L0.000135629 21.0001L20.9795 20.9961L1.59866 12.9637L20.9827 20.9885L6.1509 6.1509L20.9885 20.9827L12.9637 1.59866L20.9961 20.9795L21.0001 0.000135629Z" stroke="white" stroke-width="1.4"/></svg>',
    'circle' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none"><circle cx="21" cy="21" r="20" fill="white"/></svg>'
];

/**
 * Process text to convert [bracketed] words to highlighted spans
 */
function process_highlighted_text($text, $highlight_color) {
    if (empty($text)) {
        return '';
    }
    
    // Convert [text] to <span class="highlighted">text</span>
    $processed = preg_replace_callback(
        '/\[([^\]]+)\]/',
        function($matches) use ($highlight_color) {
            return '<span class="block-content-highlighted__text-highlight" style="color: ' . esc_attr($highlight_color) . ';">' . esc_html($matches[1]) . '</span>';
        },
        $text
    );
    
    // Convert line breaks to <br> tags
    $processed = nl2br($processed);
    
    return $processed;
}

$processed_text = process_highlighted_text($text_content, $highlight_color);
?>

<section 
    id="<?php echo esc_attr($anchor); ?>" 
    class="block-content-highlighted<?php echo esc_attr($align_class . $class_name); ?>" 
    style="background-color: <?php echo esc_attr($background_color); ?>;">
    <div class="block-content-highlighted__container">
        <div class="block-content-highlighted__content">
            
            <?php if ($show_icon && !empty($icon)): ?>
                <div class="block-content-highlighted__icon-container">
                    <?php echo isset($icon_map[$icon]) ? $icon_map[$icon] : $icon_map['star']; ?>
                </div>
            <?php endif; ?>
            
            <?php if ($processed_text): ?>
                <div class="block-content-highlighted__text" style="color: <?php echo esc_attr($text_color); ?>;">
                    <?php echo $processed_text; ?>
                </div>
            <?php endif; ?>
            
        </div>
    </div>
</section>

