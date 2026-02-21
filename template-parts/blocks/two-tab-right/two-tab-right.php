<?php
/**
 * Two Tab Right Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$icon_left = get_field('icon_left');
$title = get_field('title') ?: 'E-POE EELARVE';

// Tab 1 (Middle)
$tab1_bg_color = get_field('tab1_bg_color') ?: '#e1ff04';
$tab1_icon = get_field('tab1_icon');
$tab1_heading = get_field('tab1_heading') ?: $title;
$tab1_title = get_field('tab1_title') ?: 'Struktuur';
$tab1_text = get_field('tab1_text');

// Tab 2 (Right)
$tab2_bg_color = get_field('tab2_bg_color') ?: '#000000';
$tab2_icon = get_field('tab2_icon');
$tab2_heading = get_field('tab2_heading') ?: $title;
$tab2_title = get_field('tab2_title') ?: 'Sisu';
$tab2_text = get_field('tab2_text');

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = sharks_get_block_anchor($block, 'two-tab-right');
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';
?>

<section id="<?php echo esc_attr($anchor); ?>" class="block-two-tab-right<?php echo esc_attr($align_class . $class_name); ?>">
    <div class="block-two-tab-right__container">
        <!-- Left Panel -->
        <div class="block-two-tab-right__left">
            <!-- Icon -->
            <?php if ($icon_left): ?>
                <div class="block-two-tab-right__icon-wrapper">
                    <img src="<?php echo esc_url($icon_left['url']); ?>" 
                         alt="" 
                         class="block-two-tab-right__icon">
                </div>
            <?php else: ?>
                <div class="block-two-tab-right__icon-wrapper">
                    <svg class="block-two-tab-right__icon" fill="none" preserveAspectRatio="none" viewBox="0 0 42 42">
                        <path d="M26.0877 8.71566L31.7938 3.00961L38.9901 10.2059L33.285 15.911H41.3543V26.0877H33.9549L39.3768 31.1229L32.451 38.5789L26.0877 32.6688V41.3543H15.911V33.284L10.2049 38.9901L3.00863 31.7948L8.71566 26.0877H0.646327V15.911H8.04379L2.62289 10.8768L9.54867 3.42074L15.911 9.32894V0.646327H26.0877V8.71566Z" fill="black" />
                    </svg>
                </div>
            <?php endif; ?>

            <!-- Content -->
            <div class="block-two-tab-right__content" 
                 data-tab1-heading="<?php echo esc_attr($tab1_heading); ?>"
                 data-tab2-heading="<?php echo esc_attr($tab2_heading); ?>">
                <!-- Single Heading that changes -->
                <h1 class="block-two-tab-right__title" data-dynamic-heading>
                    <?php echo esc_html($tab1_heading); ?>
                </h1>
                
                <!-- Tab 1 Text - shown by default -->
                <?php if ($tab1_text): ?>
                    <div class="block-two-tab-right__text" data-tab-content="tab1">
                        <?php echo wp_kses_post(wpautop($tab1_text)); ?>
                    </div>
                <?php endif; ?>
                
                <!-- Tab 2 Text -->
                <?php if ($tab2_text): ?>
                    <div class="block-two-tab-right__text" data-tab-content="tab2" style="display: none;">
                        <?php echo wp_kses_post(wpautop($tab2_text)); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Tab 1 (Middle Panel) -->
        <div class="block-two-tab-right__tab" 
             data-tab="tab1">
            <div class="block-two-tab-right__tab-content">
                <!-- Icon -->
                <?php if ($tab1_icon): ?>
                    <div class="block-two-tab-right__tab-icon-wrapper">
                        <img src="<?php echo esc_url($tab1_icon['url']); ?>" 
                             alt="" 
                             class="block-two-tab-right__tab-icon">
                    </div>
                <?php else: ?>
                    <div class="block-two-tab-right__tab-icon-wrapper">
                        <svg class="block-two-tab-right__tab-icon" fill="none" preserveAspectRatio="none" viewBox="0 0 42.0003 42.0003">
                            <path d="M21.0001 0.000135629L21.0042 20.9795L29.0365 1.59866L21.0118 20.9827L35.8493 6.1509L21.0176 20.9885L40.4016 12.9637L21.0208 20.9961L42.0001 21.0001L21.0208 21.0042L40.4016 29.0365L21.0176 21.0118L35.8493 35.8493L21.0118 21.0176L29.0365 40.4016L21.0042 21.0208L21.0001 42.0001L20.9961 21.0208L12.9637 40.4016L20.9885 21.0176L6.1509 35.8493L20.9827 21.0118L1.59866 29.0365L20.9795 21.0042L0.000135629 21.0001L20.9795 20.9961L1.59866 12.9637L20.9827 20.9885L6.1509 6.1509L20.9885 20.9827L12.9637 1.59866L20.9961 20.9795L21.0001 0.000135629Z" stroke="black" stroke-width="1.4" />
                        </svg>
                    </div>
                <?php endif; ?>

                <p class="block-two-tab-right__tab-title"><?php echo esc_html($tab1_title); ?></p>
            </div>
        </div>

        <!-- Tab 2 (Right Panel) -->
        <div class="block-two-tab-right__tab" 
             data-tab="tab2">
            <div class="block-two-tab-right__tab-content">
                <!-- Icon -->
                <?php if ($tab2_icon): ?>
                    <div class="block-two-tab-right__tab-icon-wrapper">
                        <img src="<?php echo esc_url($tab2_icon['url']); ?>" 
                             alt="" 
                             class="block-two-tab-right__tab-icon">
                    </div>
                <?php else: ?>
                    <div class="block-two-tab-right__tab-icon-wrapper">
                        <svg class="block-two-tab-right__tab-icon" fill="none" preserveAspectRatio="none" viewBox="0 0 42.0003 42.0003">
                            <path d="M21.0001 0.000135629L21.0042 20.9795L29.0365 1.59866L21.0118 20.9827L35.8493 6.1509L21.0176 20.9885L40.4016 12.9637L21.0208 20.9961L42.0001 21.0001L21.0208 21.0042L40.4016 29.0365L21.0176 21.0118L35.8493 35.8493L21.0118 21.0176L29.0365 40.4016L21.0042 21.0208L21.0001 42.0001L20.9961 21.0208L12.9637 40.4016L20.9885 21.0176L6.1509 35.8493L20.9827 21.0118L1.59866 29.0365L20.9795 21.0042L0.000135629 21.0001L20.9795 20.9961L1.59866 12.9637L20.9827 20.9885L6.1509 6.1509L20.9885 20.9827L12.9637 1.59866L20.9961 20.9795L21.0001 0.000135629Z" stroke="white" stroke-width="1.4" />
                        </svg>
                    </div>
                <?php endif; ?>

                <p class="block-two-tab-right__tab-title"><?php echo esc_html($tab2_title); ?></p>
            </div>
        </div>
    </div>
</section>

<script>
(function() {
    function initTwoTabRight() {
        const section = document.querySelector('#<?php echo esc_js($anchor); ?>');
        if (!section) return;
        
        const tabs = section.querySelectorAll('[data-tab]');
        const content = section.querySelector('.block-two-tab-right__content');
        const dynamicHeading = section.querySelector('[data-dynamic-heading]');
        const tab1Content = section.querySelector('[data-tab-content="tab1"]');
        const tab2Content = section.querySelector('[data-tab-content="tab2"]');
        
        if (!content) return;
        
        const tab1Heading = content.getAttribute('data-tab1-heading');
        const tab2Heading = content.getAttribute('data-tab2-heading');
        
        tabs.forEach(tab => {
            const tabName = tab.getAttribute('data-tab');
            
            tab.addEventListener('mouseenter', function() {
                // Update heading text
                if (dynamicHeading) {
                    if (tabName === 'tab1') {
                        dynamicHeading.textContent = tab1Heading;
                    } else if (tabName === 'tab2') {
                        dynamicHeading.textContent = tab2Heading;
                    }
                }
                
                // Hide all content
                if (tab1Content) tab1Content.style.display = 'none';
                if (tab2Content) tab2Content.style.display = 'none';
                
                // Show corresponding content
                if (tabName === 'tab1' && tab1Content) {
                    tab1Content.style.display = 'block';
                } else if (tabName === 'tab2' && tab2Content) {
                    tab2Content.style.display = 'block';
                }
            });
            
            tab.addEventListener('mouseleave', function() {
                // Reset to default
                if (dynamicHeading) {
                    dynamicHeading.textContent = tab1Heading;
                }
                if (tab1Content) tab1Content.style.display = 'block';
                if (tab2Content) tab2Content.style.display = 'none';
            });
        });
    }
    
    // Initialize on load
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initTwoTabRight);
    } else {
        initTwoTabRight();
    }
    
    // Re-initialize for Gutenberg editor
    if (window.acf) {
        window.acf.addAction('render_block_preview/type=two-tab-right', initTwoTabRight);
    }
})();
</script>
