<?php
/**
 * Why Us Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields with placeholder defaults
$title = get_field('title') ?: 'MIKS MARKETING SHARKS?';
$features = get_field('features');
$highlight_title = get_field('highlight_title') ?: 'KVALITEET';
$highlight_text = get_field('highlight_text') ?: 'Kvaliteetse kodulehe tegemine on meie kirg.';
$cta_text = get_field('cta_text') ?: 'KÜSI PAKKUMIST';
$cta_url = get_field('cta_url') ?: '#contact';
$background_style = get_field('background_style') ?: 'default';

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = sharks_get_block_anchor($block, 'why-us');
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';

// Background style class
$bg_class = $background_style !== 'default' ? ' block-why-us--' . $background_style : '';

// Icon mapping
$icon_map = [
    'asterisk' => '✱',
    'star' => '✦',
    'check' => '✓',
    'heart' => '♥',
    'diamond' => '◆',
    'circle' => '●'
];
?>

<section id="<?php echo esc_attr($anchor); ?>" class="block-why-us<?php echo esc_attr($align_class . $bg_class . $class_name); ?>">
  <div class="container">
    <div class="block-why-us__header">
      <h2 class="block-why-us__title"><?php echo esc_html($title); ?></h2>
      
      <div class="block-why-us__highlight">
        <button class="block-why-us__highlight-close" aria-label="Close">×</button>
        <h3 class="block-why-us__highlight-title"><?php echo esc_html($highlight_title); ?></h3>
        <?php if ($highlight_text): ?>
          <p class="block-why-us__highlight-text"><?php echo esc_html($highlight_text); ?></p>
        <?php endif; ?>
      </div>
    </div>
    
    <div class="block-why-us__grid">
      <?php if ($features): ?>
        <?php foreach ($features as $feature): ?>
          <div class="block-why-us__feature">
            <?php if (!empty($feature['icon'])): ?>
              <div class="block-why-us__feature-icon">
                <?php echo isset($icon_map[$feature['icon']]) ? $icon_map[$feature['icon']] : '✱'; ?>
              </div>
            <?php endif; ?>
            
            <h3 class="block-why-us__feature-title"><?php echo esc_html($feature['title']); ?></h3>
            
            <?php if (!empty($feature['text'])): ?>
              <p class="block-why-us__feature-text"><?php echo esc_html($feature['text']); ?></p>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <!-- Default features for preview -->
        <div class="block-why-us__feature">
          <div class="block-why-us__feature-icon">✱</div>
          <h3 class="block-why-us__feature-title">TERVIKLIKKUS</h3>
          <p class="block-why-us__feature-text">Teeme kodulehti lähtudes kliendist. Teeme rätseplahendusi just selles võtmes.</p>
        </div>
        
        <div class="block-why-us__feature">
          <div class="block-why-us__feature-icon">✦</div>
          <h3 class="block-why-us__feature-title">KOGEMUSED</h3>
          <p class="block-why-us__feature-text">8+ aastaga on meie portfolio täienenud erilmeliste lahenduste õnnega.</p>
        </div>
      <?php endif; ?>
      
      <?php if ($cta_text && $cta_url): ?>
        <a href="<?php echo esc_url($cta_url); ?>" class="block-why-us__cta">
          <span class="block-why-us__cta-text"><?php echo esc_html($cta_text); ?></span>
          <span class="block-why-us__cta-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M7 17L17 7M17 7H7M17 7V17"/>
            </svg>
          </span>
        </a>
      <?php endif; ?>
    </div>
  </div>
</section>

