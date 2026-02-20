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

// Check if we have steps using have_rows
if (!have_rows('steps')) {
    if (is_admin()) {
        echo '<div style="padding: 2rem; background: #f0f0f0; text-align: center;">';
        echo '<p>⚠️ Lisa 10 Steps blokile samme</p>';
        echo '</div>';
    }
    return;
}

// Count steps for carousel
$steps_count = 0;
if (have_rows('steps')) {
    while (have_rows('steps')) {
        the_row();
        $steps_count++;
    }
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
            <div class="ten-steps__carousel" data-steps-count="<?php echo $steps_count; ?>">
                <?php 
                if (have_rows('steps')) :
                    $index = 0;
                    while (have_rows('steps')) : the_row();
                        $number = sprintf('%02d', $index + 1);
                        $heading = get_sub_field('heading');
                        $description = get_sub_field('description');
                ?>
                    <article class="ten-steps__card" data-step="<?php echo $index; ?>">
                        <div class="ten-steps__card-inner">
                            <div class="ten-steps__number"><?php echo esc_html($number); ?></div>
                            <?php if ($heading) : ?>
                                <h3 class="ten-steps__card-heading"><?php echo esc_html($heading); ?></h3>
                            <?php endif; ?>
                            <p class="ten-steps__card-description"><?php 
                                if ($description) {
                                    echo esc_html($description);
                                } else {
                                    // Debug output
                                    echo '<!-- Description is empty. Raw value: ';
                                    echo esc_html(var_export($description, true));
                                    echo ' | All step data: ';
                                    $all_fields = get_row();
                                    echo esc_html(var_export($all_fields, true));
                                    echo ' -->';
                                }
                            ?></p>
                        </div>
                    </article>
                <?php 
                        $index++;
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </div>
</section>

