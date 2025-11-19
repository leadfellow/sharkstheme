<?php
/**
 * Block: 10 Steps
 * 
 * Carousel showing up to 10 steps with navigation arrows
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get block attributes
$block_id = 'ten-steps-' . $block['id'];
if (!empty($block['anchor'])) {
    $block_id = $block['anchor'];
}

// Get alignment class
$align_class = !empty($block['align']) ? 'align' . $block['align'] : '';

// Get fields
$section_heading = get_field('section_heading');
$steps = get_field('steps');

// Check if we have steps
if (!$steps || empty($steps)) {
    if (is_admin()) {
        echo '<div style="padding: 2rem; background: #f0f0f0; text-align: center;">';
        echo '<p>⚠️ Lisa 10 Steps blokile samme</p>';
        echo '</div>';
    }
    return;
}
?>

<section id="<?php echo esc_attr($block_id); ?>" class="block-ten-steps <?php echo esc_attr($align_class); ?>">
    <div class="ten-steps__container">
        
        <div class="ten-steps__header">
            <?php if ($section_heading) : ?>
                <h2 class="ten-steps__heading"><?php echo esc_html($section_heading); ?></h2>
            <?php endif; ?>
            
            <div class="ten-steps__navigation">
                <button class="ten-steps__nav-btn ten-steps__nav-btn--prev" aria-label="<?php esc_attr_e('Previous', 'sharks2025'); ?>">
                    <svg width="32" height="26" viewBox="0 0 32 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M32 13L0 13" stroke="currentColor" stroke-width="2.76387" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12.75 25.75L0 13L12.75 0.25" stroke="currentColor" stroke-width="2.76387" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <button class="ten-steps__nav-btn ten-steps__nav-btn--next" aria-label="<?php esc_attr_e('Next', 'sharks2025'); ?>">
                    <svg width="32" height="26" viewBox="0 0 32 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 13L32 13" stroke="currentColor" stroke-width="2.76387" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M19.25 0.25L32 13L19.25 25.75" stroke="currentColor" stroke-width="2.76387" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
        </div>

        <div class="ten-steps__carousel-wrapper">
            <div class="ten-steps__carousel" data-steps-count="<?php echo count($steps); ?>">
                <?php foreach ($steps as $index => $step) : 
                    $number = sprintf('%02d', $index + 1);
                    $heading = $step['heading'] ?? '';
                    $description = $step['description'] ?? '';
                ?>
                    <article class="ten-steps__card" data-step="<?php echo $index; ?>">
                        <div class="ten-steps__card-inner">
                            <div class="ten-steps__number"><?php echo esc_html($number); ?></div>
                            <?php if ($heading) : ?>
                                <h3 class="ten-steps__card-heading"><?php echo esc_html($heading); ?></h3>
                            <?php endif; ?>
                            <?php if ($description) : ?>
                                <p class="ten-steps__card-description"><?php echo esc_html($description); ?></p>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

