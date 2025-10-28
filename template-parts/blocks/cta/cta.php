<?php
/**
 * CTA Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields with placeholder defaults
$subheadline = get_field('subheadline');
$title = get_field('title') ?: 'Ready to Take Your Business to the Next Level?';
$text = get_field('text') ?: 'Join thousands of satisfied clients who have transformed their business with our solutions. Get started today and see results in days, not months.';
$primary_button_text = get_field('primary_button_text') ?: 'Start Free Trial';
$primary_button_url = get_field('primary_button_url') ?: '#contact';
$secondary_button_text = get_field('secondary_button_text') ?: 'Schedule a Demo';
$secondary_button_url = get_field('secondary_button_url') ?: '#demo';
$style_variant = get_field('style_variant') ?: 'default';

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = !empty($block['anchor']) ? $block['anchor'] : 'cta-' . $block['id'];
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';

// Style variant class
$variant_class = $style_variant !== 'default' ? ' block-cta--' . $style_variant : '';
?>

<section id="<?php echo esc_attr($anchor); ?>" class="block-cta<?php echo esc_attr($align_class . $variant_class . $class_name); ?>">
  <?php if ($style_variant === 'centered-dark'): ?>
    <!-- Circle decorations -->
    <div class="block-cta__circles">
      <div class="block-cta__circle block-cta__circle--1"></div>
      <div class="block-cta__circle block-cta__circle--2"></div>
      <div class="block-cta__circle block-cta__circle--3"></div>
    </div>
  <?php endif; ?>
  
  <div class="container">
    <div class="block-cta__inner">
      <?php if ($subheadline): ?>
        <p class="block-cta__subheadline"><?php echo esc_html($subheadline); ?></p>
      <?php endif; ?>
      
      <h2 class="block-cta__title"><?php echo esc_html($title); ?></h2>
      
      <?php if ($text): ?>
        <p class="block-cta__text"><?php echo esc_html($text); ?></p>
      <?php endif; ?>
      
      <?php if ($primary_button_text || $secondary_button_text): ?>
        <div class="block-cta__buttons">
          <?php if ($primary_button_text && $primary_button_url): ?>
            <a href="<?php echo esc_url($primary_button_url); ?>" class="btn btn--accent btn--lg">
              <?php echo esc_html($primary_button_text); ?>
            </a>
          <?php endif; ?>
          
          <?php if ($secondary_button_text && $secondary_button_url): ?>
            <a href="<?php echo esc_url($secondary_button_url); ?>" class="btn btn--ghost btn--lg">
              <?php echo esc_html($secondary_button_text); ?>
            </a>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

