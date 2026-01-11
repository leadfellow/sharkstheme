<?php
/**
 * Inquiry Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$title = get_field('title') ?: 'KIRJUTAMEILE';
$submit_text = get_field('submit_text') ?: 'SAADA PÄRING';
$icons = get_field('icons');
$cf7_shortcode = get_field('cf7_shortcode');

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = sharks_get_block_anchor($block, 'inquiry');
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';

// Icon mapping
$icon_map = [
    'asterisk' => '✱',
    'star' => '✦',
    'x' => '✕',
    'circle' => '●',
    'sunburst' => '※'
];
?>

<section id="<?php echo esc_attr($anchor); ?>" class="block-inquiry<?php echo esc_attr($align_class . $class_name); ?>">
  <!-- Top: Scrolling Title + Icons -->
  <div class="block-inquiry__header">
    <div class="block-inquiry__header-scroll">
      <?php 
      // Repeat title and icons multiple times for scrolling effect
      for ($i = 0; $i < 5; $i++): 
        if ($icons && is_array($icons) && count($icons) > 0):
          foreach ($icons as $icon_item): 
            $icon_symbol = isset($icon_map[$icon_item['icon']]) ? $icon_map[$icon_item['icon']] : '✱';
            ?>
            <span class="block-inquiry__header-icon"><?php echo esc_html($icon_symbol); ?></span>
            <span class="block-inquiry__header-text"><?php echo esc_html($title); ?></span>
          <?php 
          endforeach;
        else: 
          // Default pattern
          ?>
          <span class="block-inquiry__header-icon">✕</span>
          <span class="block-inquiry__header-text"><?php echo esc_html($title); ?></span>
          <span class="block-inquiry__header-icon">✱</span>
          <span class="block-inquiry__header-text"><?php echo esc_html($title); ?></span>
          <span class="block-inquiry__header-icon">✦</span>
          <span class="block-inquiry__header-text"><?php echo esc_html($title); ?></span>
        <?php 
        endif;
      endfor; 
      ?>
    </div>
  </div>
  
  <!-- Bottom: Form Content -->
  <div class="block-inquiry__content">
    <div class="block-inquiry__inner">
      <div class="block-inquiry__content-inner">
        <!-- Left: Form Fields -->
        <div class="block-inquiry__form-wrapper">
          <?php 
          if ($cf7_shortcode && function_exists('do_shortcode')) {
            echo do_shortcode($cf7_shortcode);
          } else {
            echo '<p>Please add Contact Form 7 shortcode in block settings.</p>';
          }
          ?>
        </div>
        
        <!-- Right: Submit Section (Black Background) -->
        <div class="block-inquiry__submit-wrapper">
          <h2 class="block-inquiry__submit-title"><?php echo esc_html($submit_text); ?></h2>
          <button type="button" class="block-inquiry__submit-button" onclick="this.closest('.block-inquiry').querySelector('.wpcf7-submit').click();">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

