<?php
/**
 * FAQ Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields with placeholder defaults
$title = get_field('title') ?: 'Frequently Asked Questions';
$image = get_field('image');
$faq_items = get_field('faq_items');
$style_variant = get_field('style_variant') ?: 'default';

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = sharks_get_block_anchor($block, 'faq');
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';

// Style variant class
$variant_class = $style_variant !== 'default' ? ' block-faq--' . $style_variant : '';
?>

<section id="<?php echo esc_attr($anchor); ?>" class="block-faq<?php echo esc_attr($align_class . $variant_class . $class_name); ?>">
  <div class="container">
    <div class="block-faq__inner">
      
      <?php if ($style_variant === 'two-column'): ?>
        <!-- Left Column: Title + Image -->
        <div class="block-faq__sidebar">
          <h2 class="block-faq__title"><?php echo esc_html($title); ?></h2>
          
          <?php if ($image): ?>
            <figure class="block-faq__image">
              <img src="<?php echo esc_url($image['url']); ?>" 
                   alt="<?php echo esc_attr($image['alt'] ?: $title); ?>"
                   loading="lazy">
            </figure>
          <?php endif; ?>
        </div>
      <?php else: ?>
        <h2 class="block-faq__title"><?php echo esc_html($title); ?></h2>
      <?php endif; ?>
      
      <!-- FAQ Items -->
      <?php if ($faq_items): ?>
        <div class="block-faq__list">
          <?php foreach ($faq_items as $index => $item): ?>
            <div class="block-faq__item" data-faq-item>
              <button class="block-faq__question" 
                      aria-expanded="false"
                      aria-controls="faq-answer-<?php echo esc_attr($anchor . '-' . $index); ?>"
                      data-faq-toggle>
                <span><?php echo esc_html($item['question']); ?></span>
                <svg class="block-faq__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                  <line x1="12" y1="5" x2="12" y2="19" stroke-width="2" stroke-linecap="round"/>
                  <line x1="5" y1="12" x2="19" y2="12" stroke-width="2" stroke-linecap="round"/>
                </svg>
              </button>
              
              <div class="block-faq__answer" 
                   id="faq-answer-<?php echo esc_attr($anchor . '-' . $index); ?>"
                   data-faq-content>
                <div class="block-faq__answer-inner">
                  <?php echo wp_kses_post(wpautop($item['answer'])); ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php else: ?>
        <p class="block-faq__empty">No FAQ items added yet. Add some in the block settings.</p>
      <?php endif; ?>
      
    </div>
  </div>
</section>

<script>
// FAQ Accordion functionality
(function() {
  const faqItems = document.querySelectorAll('[data-faq-item]');
  
  faqItems.forEach(item => {
    const toggle = item.querySelector('[data-faq-toggle]');
    const content = item.querySelector('[data-faq-content]');
    
    if (toggle && content) {
      toggle.addEventListener('click', function() {
        const isExpanded = toggle.getAttribute('aria-expanded') === 'true';
        
        // Close all other items
        faqItems.forEach(otherItem => {
          if (otherItem !== item) {
            const otherToggle = otherItem.querySelector('[data-faq-toggle]');
            const otherContent = otherItem.querySelector('[data-faq-content]');
            if (otherToggle && otherContent) {
              otherToggle.setAttribute('aria-expanded', 'false');
              otherContent.style.maxHeight = null;
              otherItem.classList.remove('is-open');
            }
          }
        });
        
        // Toggle current item
        if (isExpanded) {
          toggle.setAttribute('aria-expanded', 'false');
          content.style.maxHeight = null;
          item.classList.remove('is-open');
        } else {
          toggle.setAttribute('aria-expanded', 'true');
          content.style.maxHeight = content.scrollHeight + 'px';
          item.classList.add('is-open');
        }
      });
    }
  });
})();
</script>

