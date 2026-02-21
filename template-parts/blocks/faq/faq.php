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
        <!-- Header with title and toggle -->
        <div class="block-faq__header">
          <h1 class="block-faq__title"><?php echo esc_html($title); ?></h1>
          
          <div class="block-faq__toggle-wrapper">
            <p class="block-faq__subtitle"><?php echo esc_html($subtitle); ?></p>
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
      <?php endif; ?>
      
      <!-- FAQ Items -->
      <?php if ($faq_items): ?>
        <div class="block-faq__list-container">
          <div class="block-faq__list">
            <?php foreach ($faq_items as $index => $item): ?>
              <div class="block-faq__item" data-faq-item>
                <button class="block-faq__question" 
                        aria-expanded="false"
                        aria-controls="faq-answer-<?php echo esc_attr($anchor . '-' . $index); ?>"
                        data-faq-toggle>
                  <span><?php echo esc_html($item['question']); ?></span>
                  <div class="block-faq__icon">
                    <svg fill="none" preserveAspectRatio="none" viewBox="0 0 32 32">
                      <path d="M30.4738 14.4739H17.5262V1.52627H14.4738V14.4739H1.52617L1.52618 17.5263L14.4738 17.5263L14.4738 30.4739H17.5262L17.5262 17.5263L30.4738 17.5263L30.4738 14.4739Z" fill="black" />
                    </svg>
                  </div>
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
  const faqSection = document.querySelector('[data-display-mode]');
  if (!faqSection) return;
  
  const faqItems = faqSection.querySelectorAll('[data-faq-item]');
  const displayToggle = faqSection.querySelector('[data-faq-display-toggle]');
  
  // Accordion functionality
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
  
  // Display mode toggle functionality
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
})();
</script>

