<?php
/**
 * Hero Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$label = get_field('label') ?: 'VEEBIARENDUS';
$headline = get_field('headline') ?: 'KODULEHT';
$subtitle = get_field('subtitle') ?: '';
$tagline = get_field('tagline') ?: 'Vali teenus, saada päring ja sinu disainiprojekt algab juba homme. Lihtne, kiire ja professionaalne lahendus.';
$cta_text = get_field('cta_text') ?: 'Broneeri aeg konsultatsioonile';
$cta_type = get_field('cta_type') ?: 'link';
$cta_url = get_field('cta_url') ?: '#contact';
$modal_title = get_field('modal_title');
$modal_description = get_field('modal_description');
$modal_content = get_field('modal_content');
$background_style = get_field('background_style') ?: 'dark';
$background_image = get_field('background_image');

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = sharks_get_block_anchor($block, 'hero');
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';

// Background style classes
$variant_class = ' block-hero--dark-wave';
if ($background_style === 'beige') {
    $variant_class = ' block-hero--beige-wave';
} elseif ($background_style === 'white') {
    $variant_class = ' block-hero--white-wave';
}

// Background image style
$bg_image_style = '';
$has_bg_image_class = '';
if ($background_image && !empty($background_image['url'])) {
    $bg_image_style = ' style="background-image: url(' . esc_url($background_image['url']) . ');"';
    $has_bg_image_class = ' block-hero--has-image';
}
?>

<section id="<?php echo esc_attr($anchor); ?>" class="block-hero<?php echo esc_attr($align_class . $variant_class . $has_bg_image_class . $class_name); ?>"<?php echo $bg_image_style; ?>>
  <!-- Ripple effects -->
  <div class="block-hero__ripples">
    <div class="block-hero__ripple block-hero__ripple--1"></div>
    <div class="block-hero__ripple block-hero__ripple--2"></div>
    <div class="block-hero__ripple block-hero__ripple--3"></div>
    <div class="block-hero__ripple block-hero__ripple--4"></div>
  </div>
  
  <div class="container">
    <?php if ($background_style === 'white'): ?>
      <!-- White Wave Variant Layout -->
      <div class="block-hero__inner">
        <div class="block-hero__content">
          <?php if ($label): ?>
            <div class="block-hero__label"><?php echo esc_html($label); ?></div>
          <?php endif; ?>
          
          <h1 class="block-hero__title">
            <svg class="block-hero__title-icon" fill="none" viewBox="0 0 62 62">
              <path d="M59.043 2.95701C57.4099 1.3239 54.7621 1.3239 53.129 2.95701L43.543 12.543C36.6157 19.4703 25.3843 19.4703 18.457 12.543L8.87103 2.95701C7.23792 1.3239 4.59012 1.3239 2.95701 2.95701C1.3239 4.59012 1.3239 7.23792 2.95701 8.87103L12.543 18.457C19.4703 25.3843 19.4703 36.6157 12.543 43.543L2.95701 53.129C1.3239 54.7621 1.3239 57.4099 2.95701 59.043C4.59012 60.6761 7.23792 60.6761 8.87103 59.043L18.457 49.457C25.3843 42.5297 36.6157 42.5297 43.543 49.457L53.129 59.043C54.7621 60.6761 57.4099 60.6761 59.043 59.043C60.6761 57.4099 60.6761 54.7621 59.043 53.129L49.457 43.543C42.5297 36.6157 42.5297 25.3843 49.457 18.457L59.043 8.87103C60.6761 7.23792 60.6761 4.59012 59.043 2.95701Z" fill="black"/>
            </svg>
            <span><?php echo esc_html($headline); ?></span>
            <svg class="block-hero__title-icon" fill="none" viewBox="0 0 62 62">
              <path d="M38.5116 12.8651L46.9344 4.44225L57.5575 15.0653L49.1346 23.4882H61.0458V38.5116H50.1258L58.1278 45.9432L47.9042 56.951L38.5116 48.2274V61.0467H23.4882V49.1346L15.0653 57.5575L4.44225 46.9344L12.8651 38.5116H0.953974V23.4882H11.8729L3.87194 16.0575L14.0956 5.0487L23.4882 13.7714V0.953974H38.5116V12.8651Z" fill="black"/>
            </svg>
          </h1>
        </div>
        
        <div class="block-hero__buttons">
          <?php if ($subtitle): ?>
            <h2 class="block-hero__subtitle"><?php echo esc_html($subtitle); ?></h2>
          <?php endif; ?>
          
          <?php if ($tagline): ?>
            <p class="block-hero__text"><?php echo esc_html($tagline); ?></p>
          <?php endif; ?>
          
          <?php if ($cta_text): ?>
            <?php if ($cta_type === 'modal'): ?>
              <?php
              // Process shortcodes in modal content (White variant)
              $processed_modal_content_white = do_shortcode($modal_content);
              ?>
              <a href="#" 
                 class="block-hero__cta"
                 data-modal-trigger
                 data-modal-title="<?php echo esc_attr($modal_title); ?>"
                 data-modal-description="<?php echo esc_attr($modal_description); ?>"
                 data-modal-content="<?php echo esc_attr($processed_modal_content_white); ?>">
                <span class="block-hero__cta-text"><?php echo esc_html($cta_text); ?></span>
                <div class="block-hero__cta-icon">
                  <svg width="26" height="26" fill="none" viewBox="0 0 26 26">
                    <rect fill="black" height="26" width="26"/>
                    <path d="M8.9375 13H17.0625" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.15104"/>
                    <path d="M13.8125 9.75L17.0625 13L13.8125 16.25" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.15104"/>
                  </svg>
                </div>
              </a>
            <?php elseif ($cta_type === 'calendly' && $cta_url): ?>
              <a href="<?php echo esc_url($cta_url); ?>" target="_blank" rel="noopener noreferrer" class="block-hero__cta">
                <span class="block-hero__cta-text"><?php echo esc_html($cta_text); ?></span>
                <div class="block-hero__cta-icon">
                  <svg width="26" height="26" fill="none" viewBox="0 0 26 26">
                    <rect fill="black" height="26" width="26"/>
                    <path d="M8.9375 13H17.0625" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.15104"/>
                    <path d="M13.8125 9.75L17.0625 13L13.8125 16.25" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.15104"/>
                  </svg>
                </div>
              </a>
            <?php elseif ($cta_url): ?>
              <a href="<?php echo esc_url($cta_url); ?>" class="block-hero__cta">
                <span class="block-hero__cta-text"><?php echo esc_html($cta_text); ?></span>
                <div class="block-hero__cta-icon">
                  <svg width="26" height="26" fill="none" viewBox="0 0 26 26">
                    <rect fill="black" height="26" width="26"/>
                    <path d="M8.9375 13H17.0625" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.15104"/>
                    <path d="M13.8125 9.75L17.0625 13L13.8125 16.25" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.15104"/>
                  </svg>
                </div>
              </a>
            <?php endif; ?>
          <?php endif; ?>
        </div>
      </div>
    <?php else: ?>
      <!-- Default Layout (Dark/Beige Wave) -->
      <div class="block-hero__inner">
        <!-- Top: Label + Title -->
        <div class="block-hero__left">
          <?php if ($label): ?>
            <span class="block-hero__label"><?php echo esc_html($label); ?></span>
          <?php endif; ?>
          
          <div class="block-hero__center">
            <h1 class="block-hero__title"><?php echo esc_html($headline); ?></h1>
          </div>
        </div>
        
        <!-- Bottom: Tagline + CTA -->
        <div class="block-hero__right">
          <?php if ($tagline): ?>
            <p class="block-hero__tagline"><?php echo esc_html($tagline); ?></p>
          <?php endif; ?>
          
          <?php if ($cta_text): ?>
            <?php if ($cta_type === 'modal'): ?>
              <?php
              // Process shortcodes in modal content (Dark/Beige variant)
              $processed_modal_content_dark = do_shortcode($modal_content);
              ?>
              <a href="#" 
                 class="block-hero__cta"
                 data-modal-trigger
                 data-modal-title="<?php echo esc_attr($modal_title); ?>"
                 data-modal-description="<?php echo esc_attr($modal_description); ?>"
                 data-modal-content="<?php echo esc_attr($processed_modal_content_dark); ?>">
                <?php echo esc_html($cta_text); ?>
                <svg class="block-hero__cta-icon" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect width="26" height="26" fill="white"/>
                  <path d="M8.9375 13H17.0625" stroke="black" stroke-width="1.15104" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M13.8125 9.75L17.0625 13L13.8125 16.25" stroke="black" stroke-width="1.15104" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </a>
            <?php elseif ($cta_type === 'calendly' && $cta_url): ?>
              <a href="<?php echo esc_url($cta_url); ?>" target="_blank" rel="noopener noreferrer" class="block-hero__cta">
                <?php echo esc_html($cta_text); ?>
                <svg class="block-hero__cta-icon" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect width="26" height="26" fill="white"/>
                  <path d="M8.9375 13H17.0625" stroke="black" stroke-width="1.15104" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M13.8125 9.75L17.0625 13L13.8125 16.25" stroke="black" stroke-width="1.15104" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </a>
            <?php elseif ($cta_url): ?>
              <a href="<?php echo esc_url($cta_url); ?>" class="block-hero__cta">
                <?php echo esc_html($cta_text); ?>
                <svg class="block-hero__cta-icon" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect width="26" height="26" fill="white"/>
                  <path d="M8.9375 13H17.0625" stroke="black" stroke-width="1.15104" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M13.8125 9.75L17.0625 13L13.8125 16.25" stroke="black" stroke-width="1.15104" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </a>
            <?php endif; ?>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
  
  <!-- Labels Section -->
  <?php 
  $labels = get_field('labels');
  $labels_bg_color = get_field('labels_bg_color') ?: '#FF69B4';
  $labels_text_color = get_field('labels_text_color') ?: '#FFFFFF';
  $labels_separator_icon = get_field('labels_separator_icon') ?: 'asterisk';
  
  // Separator icon mapping (same as label-bar)
  $separator_map = [
      'x' => '<svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M15.2369 0.7631C14.8155 0.341651 14.1322 0.341651 13.7107 0.7631L11.2369 3.2369C9.44921 5.02459 6.55079 5.02459 4.7631 3.2369L2.2893 0.7631C1.86785 0.341651 1.18455 0.341651 0.7631 0.7631C0.341651 1.18455 0.341651 1.86785 0.763099 2.2893L3.2369 4.7631C5.02459 6.55079 5.02459 9.44921 3.2369 11.2369L0.7631 13.7107C0.341651 14.1322 0.341651 14.8155 0.7631 15.2369C1.18455 15.6583 1.86785 15.6583 2.2893 15.2369L4.7631 12.7631C6.55079 10.9754 9.44921 10.9754 11.2369 12.7631L13.7107 15.2369C14.1322 15.6583 14.8155 15.6583 15.2369 15.2369C15.6583 14.8155 15.6583 14.1322 15.2369 13.7107L12.7631 11.2369C10.9754 9.44921 10.9754 6.55079 12.7631 4.7631L15.2369 2.2893C15.6583 1.86785 15.6583 1.18455 15.2369 0.7631Z" fill="currentColor"/></svg>',
      'asterisk' => '<svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M9.92969 3.31641L12.082 1.14258L14.8398 3.90039L12.666 6.05273H15.7344V9.92969H12.9004L15.0039 11.8262L12.3633 14.6572L9.92969 12.4199V15.7578H6.05273V12.7129L3.90039 14.8398L1.14258 12.082L3.31641 9.92969H0.246094V6.05273H3.07812L1.00195 4.13867L3.64258 1.30664L6.05273 3.54492V0.246094H9.92969V3.31641Z" fill="currentColor"/></svg>',
      'star' => '<svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M8.00002 0.00012207L8.00313 7.99223L11.0228 0.607747L8.00879 7.9935L13.6052 2.39746L8.0067 7.99562L15.3915 4.93555L8.00786 7.99597L16 8.00002L8.00786 8.00313L15.3915 11.0228L8.0067 8.00879L13.6052 13.6052L8.00879 8.0067L11.0228 15.3915L8.00313 8.00786L8.00002 16L7.99692 8.00786L4.97747 15.3915L7.99145 8.0067L2.39746 13.6052L7.99562 8.00879L0.607747 11.0228L7.99223 8.00313L0.00012207 8.00002L7.99223 7.99692L0.607747 4.97747L7.99562 7.99145L2.39746 2.39746L7.99145 7.99562L4.97747 0.607747L7.99692 7.99223L8.00002 0.00012207Z" stroke="currentColor" stroke-width="0.533333"/></svg>',
      'plus' => '<svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M8 2.66667V13.3333M2.66667 8H13.3333" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
      'dot' => '<svg width="16" height="16" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="2.5" fill="currentColor"/></svg>'
  ];
  
  $separator_svg = isset($separator_map[$labels_separator_icon]) ? $separator_map[$labels_separator_icon] : $separator_map['asterisk'];
  
  if ($labels && is_array($labels) && count($labels) > 0): 
  ?>
  <div class="block-hero__labels-wrapper" style="background-color: <?php echo esc_attr($labels_bg_color); ?> !important;">
    <div class="container">
      <div class="block-hero__labels">
        <?php foreach ($labels as $index => $label): ?>
          <?php if (!empty($label['label_text'])): ?>
            <?php if (!empty($label['label_url'])): ?>
              <a href="<?php echo esc_url($label['label_url']); ?>" class="block-hero__label-item" style="color: <?php echo esc_attr($labels_text_color); ?> !important;">
                <?php echo esc_html($label['label_text']); ?>
              </a>
            <?php else: ?>
              <span class="block-hero__label-item" style="color: <?php echo esc_attr($labels_text_color); ?> !important;">
                <?php echo esc_html($label['label_text']); ?>
              </span>
            <?php endif; ?>
            
            <?php if ($index < count($labels) - 1): ?>
              <span class="block-hero__label-separator" style="color: <?php echo esc_attr($labels_text_color); ?> !important;">
                <?php echo $separator_svg; ?>
              </span>
            <?php endif; ?>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <?php endif; ?>
</section>
