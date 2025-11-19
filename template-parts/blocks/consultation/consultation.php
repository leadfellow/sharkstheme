<?php
/**
 * Consultation Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields with placeholder defaults
$heading = get_field('heading') ?: 'POLE KINDEL MILLIST VALIDA?';
$subtext = get_field('subtext') ?: 'Tule konsultatsioonile!';
$button_text = get_field('button_text') ?: 'BRONEERIAEG';
$button_url = get_field('button_url') ?: '#';
$button_bg_color = get_field('button_bg_color') ?: '#000000';
$background_color = get_field('background_color') ?: '#f8f8f8';

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = !empty($block['anchor']) ? $block['anchor'] : 'consultation-' . $block['id'];
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';
?>

<section 
  id="<?php echo esc_attr($anchor); ?>" 
  class="block-consultation<?php echo esc_attr($align_class . $class_name); ?>"
  style="background-color: <?php echo esc_attr($background_color); ?>;"
>
  <div class="container">
    <div class="block-consultation__grid">
      <!-- Left column: Heading and text -->
      <div class="block-consultation__content">
        <h2 class="block-consultation__heading"><?php echo esc_html($heading); ?></h2>
        <p class="block-consultation__subtext"><?php echo esc_html($subtext); ?></p>
      </div>
      
      <!-- Right column: CTA button -->
      <div class="block-consultation__cta">
        <a 
          href="<?php echo esc_url($button_url); ?>" 
          class="block-consultation__button"
          style="background-color: <?php echo esc_attr($button_bg_color); ?>;"
        >
          <span class="block-consultation__button-text"><?php echo esc_html($button_text); ?></span>
          <span class="block-consultation__button-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </span>
        </a>
      </div>
    </div>
  </div>
</section>

