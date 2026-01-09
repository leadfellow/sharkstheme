<?php
/**
 * Who We Are Block Template
 * About section with sidebar title, heading, description and read more link
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$sidebar_title = get_field('sidebar_title') ?: 'Kes me oleme';
$heading = get_field('heading') ?: 'Marketing Sharks on piisavalt suur, et võtta vastu mistahes väljakutse ja piisavalt väike, et klientidest hoolida.';
$description = get_field('description') ?: 'Marketing Sharks on Eestis 2012. aastal asutatud üle-Euroopalise haardega turundusagentuur, mis pakub ettevõtetele ja brändidele tipptasemel digiturunduse teenuseid ning kõrgkvaliteetseid ja innovatiivseid meedialahendusi.';
$read_more_text = get_field('read_more_text') ?: 'Loe edasi';
$read_more_url = get_field('read_more_url') ?: '#';
$background_color = get_field('background_color') ?: '#ffffff';
$text_color = get_field('text_color') ?: '#000000';

// Block attributes
$anchor = sharks_get_block_anchor($block, 'who-we-are');
$class_name = 'block-who-we-are';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Inline styles
$style = sprintf(
    'background-color: %s; color: %s;',
    esc_attr($background_color),
    esc_attr($text_color)
);
?>

<section id="<?php echo esc_attr($anchor); ?>" class="<?php echo esc_attr($class_name); ?>" style="<?php echo $style; ?>">
    <div class="block-who-we-are__container">
        <!-- Sidebar Title -->
        <h2 class="block-who-we-are__sidebar-title" style="color: <?php echo esc_attr($text_color); ?>;">
            <?php echo esc_html($sidebar_title); ?>
        </h2>
        
        <!-- Main Content -->
        <div class="block-who-we-are__main-content">
            <div class="block-who-we-are__content-wrapper">
                <h3 class="block-who-we-are__heading" style="color: <?php echo esc_attr($text_color); ?>;">
                    <?php echo esc_html($heading); ?>
                </h3>
                
                <p class="block-who-we-are__description" style="color: <?php echo esc_attr($text_color); ?>;">
                    <?php echo esc_html($description); ?>
                </p>
            </div>
            
            <a href="<?php echo esc_url($read_more_url); ?>" class="block-who-we-are__read-more" style="color: <?php echo esc_attr($text_color); ?>;">
                <span class="block-who-we-are__read-more-text" style="color: <?php echo esc_attr($text_color); ?>;">
                    <?php echo esc_html($read_more_text); ?>
                </span>
                <div class="block-who-we-are__arrow-icon">
                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="26" height="26" fill="<?php echo esc_attr($text_color); ?>"/>
                        <path d="M8.9375 13H17.0625" stroke="<?php echo esc_attr($background_color); ?>" stroke-width="1.15104" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M13.8125 9.75L17.0625 13L13.8125 16.25" stroke="<?php echo esc_attr($background_color); ?>" stroke-width="1.15104" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </a>
        </div>
    </div>
</section>

