<?php
/**
 * Block: Roll Process
 * 
 * Display a process/timeline with main title, dividers, and rows of text
 * with hover effects that transform text to uppercase
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Block attributes
$anchor = sharks_get_block_anchor($block, 'roll-process');
$class_name = sharks_get_block_class($block, 'block-roll-process');

// Get alignment class
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';

// Get fields
$main_title = get_field('main_title');
$process_items = get_field('process_items');
$show_cursor_icon = get_field('show_cursor_icon');
$background_color = get_field('background_color') ?: '#ffffff';

// Check if we have required data
if (!$main_title && !$process_items) {
    if (is_admin()) {
        echo '<div style="padding: 2rem; background: #f0f0f0; text-align: center;">';
        echo '<p>⚠️ Lisa Roll Process blokile pealkiri ja protsessi sammud</p>';
        echo '</div>';
    }
    return;
}
?>

<section id="<?php echo esc_attr($anchor); ?>" class="<?php echo esc_attr($class_name . $align_class); ?>" style="background-color: <?php echo esc_attr($background_color); ?>;">
    <div class="roll-process__container">
        
        <?php if ($main_title): ?>
            <h2 class="roll-process__main-title"><?php echo esc_html($main_title); ?></h2>
        <?php endif; ?>
        
        <div class="roll-process__content">
            <?php if ($process_items): ?>
                <?php foreach ($process_items as $index => $item): 
                    $text = $item['text'] ?? '';
                    $style = $item['style'] ?? 'gray';
                    $text_class = ($style === 'black') ? 'roll-process__text--black' : 'roll-process__text--gray';
                ?>
                    <div class="roll-process__divider"></div>
                    <p class="roll-process__text <?php echo esc_attr($text_class); ?>" data-original="<?php echo esc_attr($text); ?>">
                        <?php echo esc_html($text); ?>
                    </p>
                <?php endforeach; ?>
            <?php endif; ?>
            
            <?php if ($show_cursor_icon): ?>
                <svg class="roll-process__cursor-icon" viewBox="0 0 23 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L1 34L8 27L12 34L14 33L10 26L22 26L1 1Z" fill="white" stroke="black" stroke-width="1"/>
                </svg>
            <?php endif; ?>
        </div>
    </div>
</section>
