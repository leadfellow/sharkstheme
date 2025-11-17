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
