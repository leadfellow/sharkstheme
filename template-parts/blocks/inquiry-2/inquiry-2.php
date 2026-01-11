<?php
/**
 * Inquiry 2 Block Template (Static Title)
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$title_line_1 = get_field('title_line_1') ?: 'TELLI DIGITURUNDUS DIGIKOGENUD';
$title_line_2 = get_field('title_line_2') ?: 'TURUNDUSAGENTUURILT';
$submit_text = get_field('submit_text') ?: 'SAADA PÄRING';
$cf7_shortcode = get_field('cf7_shortcode');

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = sharks_get_block_anchor($block, 'inquiry-2');
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';
?>

<section id="<?php echo esc_attr($anchor); ?>" class="block-inquiry-2<?php echo esc_attr($align_class . $class_name); ?>">
  <div class="block-inquiry-2__wrapper">
    <!-- Header Section (Static) -->
    <div class="block-inquiry-2__header">
      <div class="block-inquiry-2__header-content">
        <div class="block-inquiry-2__title-line-1">
          <p><?php echo esc_html($title_line_1); ?></p>
        </div>
        <div class="block-inquiry-2__title-line-2">
          <svg class="block-inquiry-2__icon-x" width="62" height="62" viewBox="0 0 62 62" fill="none">
            <path d="M59.043 2.95701C57.4099 1.3239 54.7621 1.3239 53.129 2.95701L43.543 12.543C36.6157 19.4703 25.3843 19.4703 18.457 12.543L8.87103 2.95701C7.23792 1.3239 4.59012 1.3239 2.95701 2.95701C1.3239 4.59012 1.3239 7.23792 2.95701 8.87103L12.543 18.457C19.4703 25.3843 19.4703 36.6157 12.543 43.543L2.95701 53.129C1.3239 54.7621 1.3239 57.4099 2.95701 59.043C4.59012 60.6761 7.23792 60.6761 8.87103 59.043L18.457 49.457C25.3843 42.5297 36.6157 42.5297 43.543 49.457L53.129 59.043C54.7621 60.6761 57.4099 60.6761 59.043 59.043C60.6761 57.4099 60.6761 54.7621 59.043 53.129L49.457 43.543C42.5297 36.6157 42.5297 25.3843 49.457 18.457L59.043 8.87103C60.6761 7.23792 60.6761 4.59012 59.043 2.95701Z" fill="white"/>
          </svg>
          <p><?php echo esc_html($title_line_2); ?></p>
          <svg class="block-inquiry-2__icon-asterisk" width="62" height="62" viewBox="0 0 62 62" fill="none">
            <path d="M38.5116 12.8651L46.9344 4.44225L57.5575 15.0653L49.1346 23.4882H61.0458V38.5116H50.1258L58.1278 45.9432L47.9042 56.951L38.5116 48.2274V61.0467H23.4882V49.1346L15.0653 57.5575L4.44225 46.9344L12.8651 38.5116H0.953974V23.4882H11.8729L3.87194 16.0575L14.0956 5.0487L23.4882 13.7714V0.953974H38.5116V12.8651Z" fill="white"/>
          </svg>
        </div>
      </div>
    </div>

    <!-- Form Section -->
    <div class="block-inquiry-2__form-wrapper">
      <div class="block-inquiry-2__form-container">
        <div class="block-inquiry-2__form-content">
          <div>
            <!-- Form Fields -->
            <div class="block-inquiry-2__form-fields">
              <?php 
              if ($cf7_shortcode && function_exists('do_shortcode')) {
                echo do_shortcode($cf7_shortcode);
              } else {
                echo '<p>Please add Contact Form 7 shortcode in block settings.</p>';
              }
              ?>
            </div>

            <!-- Submit Button -->
            <div class="block-inquiry-2__submit-section">
              <div class="block-inquiry-2__submit-content">
                <div>
                  <div class="block-inquiry-2__arrow-icon" onclick="this.closest('.block-inquiry-2').querySelector('.wpcf7-submit').click();">
                    <svg width="62" height="62" viewBox="0 0 62 62" fill="none">
                      <rect x="0.837838" y="0.837838" width="60.3243" height="60.3243" rx="30.1622" stroke="white" stroke-width="1.67568"/>
                      <path d="M24.1499 37.8504L37.8501 24.1503" stroke="white" stroke-width="2.74479" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M26.89 24.1496L37.8502 24.1496L37.8502 35.1097" stroke="white" stroke-width="2.74479" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </div>
                  <p class="block-inquiry-2__submit-text"><?php echo esc_html($submit_text); ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

