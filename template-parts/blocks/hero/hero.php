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
$cta_url = get_field('cta_url') ?: '#contact';
$background_style = get_field('background_style') ?: 'dark';
$background_image = get_field('background_image');

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = !empty($block['anchor']) ? $block['anchor'] : 'hero-' . $block['id'];
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
          
          <?php if ($cta_text && $cta_url): ?>
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
          
          <?php if ($cta_text && $cta_url): ?>
            <a href="<?php echo esc_url($cta_url); ?>" class="block-hero__cta">
              <?php echo esc_html($cta_text); ?>
              <svg class="block-hero__cta-icon" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 13H21M21 13L13 5M21 13L13 21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </a>
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
  if ($labels && is_array($labels) && count($labels) > 0): 
  ?>
  <div class="block-hero__labels-wrapper" style="background-color: <?php echo esc_attr($labels_bg_color); ?> !important;">
    <div class="container">
      <div class="block-hero__labels">
        <?php foreach ($labels as $label): ?>
          <?php if (!empty($label['label_text'])): ?>
            <span class="block-hero__label-item" style="color: <?php echo esc_attr($labels_text_color); ?> !important;">
              <?php echo esc_html($label['label_text']); ?>
            </span>
            <?php if ($label !== end($labels)): ?>
              <span class="block-hero__label-separator" style="color: <?php echo esc_attr($labels_text_color); ?> !important;">✦</span>
            <?php endif; ?>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <?php endif; ?>
</section>
