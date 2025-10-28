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

// Get ACF fields with placeholder defaults
$label = get_field('label');
$headline = get_field('headline') ?: 'Transform Your Business with Innovative Solutions';
$subheadline = get_field('subheadline') ?: 'We help companies achieve their goals through cutting-edge technology and expert guidance. Join hundreds of satisfied clients worldwide.';
$primary_cta_text = get_field('primary_cta_text') ?: 'Get Started';
$primary_cta_url = get_field('primary_cta_url') ?: '#contact';
$secondary_cta_text = get_field('secondary_cta_text') ?: 'Learn More';
$secondary_cta_url = get_field('secondary_cta_url') ?: '#services';
$media = get_field('media');
$style_variant = get_field('style_variant') ?: 'default';

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = !empty($block['anchor']) ? $block['anchor'] : 'hero-' . $block['id'];
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';

// Style variant class
$variant_class = $style_variant !== 'default' ? ' block-hero--' . $style_variant : '';
?>

<section id="<?php echo esc_attr($anchor); ?>" class="block-hero<?php echo esc_attr($align_class . $variant_class . $class_name); ?>">
  <?php if ($style_variant === 'fullscreen'): ?>
    <!-- Ripple effects -->
    <div class="block-hero__ripples">
      <div class="block-hero__ripple block-hero__ripple--1"></div>
      <div class="block-hero__ripple block-hero__ripple--2"></div>
      <div class="block-hero__ripple block-hero__ripple--3"></div>
      <div class="block-hero__ripple block-hero__ripple--4"></div>
    </div>
  <?php endif; ?>
  
  <div class="container">
    <div class="block-hero__inner">
      <div class="block-hero__content">
        <?php if ($label): ?>
          <span class="block-hero__label"><?php echo esc_html($label); ?></span>
        <?php endif; ?>
        
        <h1 class="block-hero__title"><?php echo esc_html($headline); ?></h1>
        
        <?php if ($subheadline): ?>
          <p class="block-hero__text"><?php echo esc_html($subheadline); ?></p>
        <?php endif; ?>
        
        <?php if ($primary_cta_text || $secondary_cta_text): ?>
          <div class="block-hero__buttons">
            <?php if ($primary_cta_text && $primary_cta_url): ?>
              <a href="<?php echo esc_url($primary_cta_url); ?>" class="btn btn--primary btn--lg">
                <?php echo esc_html($primary_cta_text); ?>
              </a>
            <?php endif; ?>
            
            <?php if ($secondary_cta_text && $secondary_cta_url): ?>
              <a href="<?php echo esc_url($secondary_cta_url); ?>" class="btn btn--outline btn--lg">
                <?php echo esc_html($secondary_cta_text); ?>
              </a>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
      
      <?php if ($media): ?>
        <figure class="block-hero__media">
          <?php echo wp_get_attachment_image($media, 'large', false, ['loading' => 'eager']); ?>
        </figure>
      <?php endif; ?>
    </div>
  </div>
</section>

