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
$subtitle = get_field('subtitle') ?: '(KKK)';
$description = get_field('description');
$image = get_field('image');
$faq_items = get_field('faq_items');
$style_variant = get_field('style_variant') ?: 'default';
$display_mode = get_field('display_mode') ?: 'text';

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = sharks_get_block_anchor($block, 'faq');
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';

// Style variant class
$variant_class = $style_variant !== 'default' ? ' block-faq--' . $style_variant : '';
?>

<section id="<?php echo esc_attr($anchor); ?>" class="block-faq<?php echo esc_attr($align_class . $variant_class . $class_name); ?>" data-display-mode="<?php echo esc_attr($display_mode); ?>">
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
      <?php elseif ($style_variant === 'with-toggle'): ?>
        <!-- Header with title and toggle (without KKK subtitle) -->
        <div class="block-faq__header">
          <h1 class="block-faq__title"><?php echo esc_html($title); ?></h1>
          
          <div class="block-faq__toggle-wrapper">
            <button class="block-faq__toggle" data-faq-display-toggle aria-label="Toggle display mode">
              <span class="block-faq__toggle-option" data-mode="text">TEKST</span>
              <span class="block-faq__toggle-option" data-mode="icons">
                <svg width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M38.5117 12.8652L46.9346 4.44238L57.5576 15.0654L49.1348 23.4883H61.0469V38.5117H50.126L58.1279 45.9434L47.9043 56.9512L38.5117 48.2275V61.0469H23.4883V49.1348L15.0654 57.5576L4.44238 46.9346L12.8652 38.5117H0.954102V23.4883H11.875L3.87305 16.0566L14.0967 5.04883L23.4883 13.7705V0.954102H38.5117V12.8652Z" fill="black"/>
                </svg>
              </span>
            </button>
          </div>
        </div>
        
        <?php if ($description): ?>
          <p class="block-faq__description"><?php echo esc_html($description); ?></p>
        <?php endif; ?>
      <?php else: ?>
        <!-- Default: Simple header without toggle -->
        <div class="block-faq__header block-faq__header--simple">
          <h1 class="block-faq__title"><?php echo esc_html($title); ?></h1>
          <?php if ($subtitle): ?>
            <p class="block-faq__subtitle"><?php echo esc_html($subtitle); ?></p>
          <?php endif; ?>
        </div>
        
        <?php if ($description): ?>
          <p class="block-faq__description"><?php echo esc_html($description); ?></p>
        <?php endif; ?>
      <?php endif; ?>
      
      <!-- FAQ Items -->
      <?php if ($faq_items): ?>
        <div class="accordion">
          <?php foreach ($faq_items as $index => $item): 
            $number = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
            $item_id = $anchor . '-item-' . $index;
          ?>
            <div class="accordion__item" data-accordion-item>
              <button class="accordion__header accordion__header--transparent" 
                      aria-expanded="false"
                      aria-controls="<?php echo esc_attr($item_id); ?>"
                      data-accordion-trigger>
                <div class="accordion__title-wrapper">
                  <span class="accordion__number">(<?php echo esc_html($number); ?>)</span>
                  <h3 class="accordion__title"><?php echo esc_html($item['question']); ?></h3>
                </div>
                <div class="accordion__icon" aria-hidden="true">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M12 5L12 19M5 12L19 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                  </svg>
                </div>
              </button>
              <div class="accordion__content" 
                   id="<?php echo esc_attr($item_id); ?>"
                   role="region"
                   style="display: none;">
                <div class="accordion__content-inner">
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
</section>

<script>
// FAQ Accordion functionality
(function() {
  function initAccordion() {
    const faqSection = document.querySelector('#<?php echo esc_js($anchor); ?>');
    if (!faqSection) return;
    
    const accordionItems = faqSection.querySelectorAll('[data-accordion-item]');
    
    accordionItems.forEach(item => {
      const trigger = item.querySelector('[data-accordion-trigger]');
      const content = item.querySelector('.accordion__content');
      
      if (!trigger || !content) return;
      
      // Remove existing listeners by cloning
      const newTrigger = trigger.cloneNode(true);
      trigger.parentNode.replaceChild(newTrigger, trigger);
      
      newTrigger.addEventListener('click', function(e) {
        e.preventDefault();
        const isOpen = item.classList.contains('is-open');
        
        // Toggle current item
        if (isOpen) {
          item.classList.remove('is-open');
          newTrigger.setAttribute('aria-expanded', 'false');
          content.style.display = 'none';
        } else {
          item.classList.add('is-open');
          newTrigger.setAttribute('aria-expanded', 'true');
          content.style.display = 'block';
        }
      });
    });
    
    // Display mode toggle functionality
    const displayToggle = faqSection.querySelector('[data-faq-display-toggle]');
    if (displayToggle) {
      const currentMode = faqSection.getAttribute('data-display-mode') || 'text';
      const textOption = displayToggle.querySelector('[data-mode="text"]');
      const iconsOption = displayToggle.querySelector('[data-mode="icons"]');
      
      // Set initial active state
      if (currentMode === 'text' && textOption) {
        textOption.classList.add('is-active');
      } else if (currentMode === 'icons' && iconsOption) {
        iconsOption.classList.add('is-active');
      }
      
      displayToggle.addEventListener('click', function() {
        const currentMode = faqSection.getAttribute('data-display-mode');
        const newMode = currentMode === 'text' ? 'icons' : 'text';
        
        // Update data attribute
        faqSection.setAttribute('data-display-mode', newMode);
        
        // Update active states
        if (newMode === 'text') {
          textOption?.classList.add('is-active');
          iconsOption?.classList.remove('is-active');
        } else {
          textOption?.classList.remove('is-active');
          iconsOption?.classList.add('is-active');
        }
      });
    }
  }
  
  // Initialize on load
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initAccordion);
  } else {
    initAccordion();
  }
  
  // Re-initialize for Gutenberg editor
  if (window.acf) {
    window.acf.addAction('render_block_preview/type=faq', initAccordion);
  }
})();
</script>

