<?php
/**
 * Accordion Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get block fields
$accordion_items = get_field('accordion_items');

// Block attributes
$block_id = 'accordion-' . ($block['id'] ?? uniqid());
$class_name = 'block-accordion';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Block anchor
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Return if no items
if (empty($accordion_items)) {
    if (is_admin()) {
        echo '<div class="acf-block-preview"><p>Please add accordion items...</p></div>';
    }
    return;
}
?>

<section <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <div class="accordion">
            <?php foreach ($accordion_items as $index => $item): 
                $number = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                $is_open = !empty($item['open_default']);
                $item_id = $block_id . '-item-' . $index;
            ?>
                <div class="accordion__item <?php echo $is_open ? 'is-open' : ''; ?>" data-accordion-item>
                    <button 
                        class="accordion__header" 
                        aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>"
                        aria-controls="<?php echo esc_attr($item_id); ?>"
                        data-accordion-trigger>
                        <div class="accordion__title-wrapper">
                            <span class="accordion__number">(<?php echo esc_html($number); ?>)</span>
                            <h3 class="accordion__title"><?php echo esc_html($item['title']); ?></h3>
                        </div>
                        <div class="accordion__icon" aria-hidden="true">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M12 5L12 19M5 12L19 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                    </button>
                    <div 
                        class="accordion__content" 
                        id="<?php echo esc_attr($item_id); ?>"
                        role="region"
                        <?php if (!$is_open): ?>style="display: none;"<?php endif; ?>>
                        <div class="accordion__content-inner">
                            <?php echo wp_kses_post($item['content']); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<script>
(function() {
    const accordionItems = document.querySelectorAll('[data-accordion-item]');
    
    accordionItems.forEach(item => {
        const trigger = item.querySelector('[data-accordion-trigger]');
        const content = item.querySelector('.accordion__content');
        
        if (!trigger || !content) return;
        
        trigger.addEventListener('click', () => {
            const isOpen = item.classList.contains('is-open');
            
            // Toggle current item
            if (isOpen) {
                item.classList.remove('is-open');
                trigger.setAttribute('aria-expanded', 'false');
                content.style.display = 'none';
            } else {
                item.classList.add('is-open');
                trigger.setAttribute('aria-expanded', 'true');
                content.style.display = 'block';
            }
        });
    });
})();
</script>

