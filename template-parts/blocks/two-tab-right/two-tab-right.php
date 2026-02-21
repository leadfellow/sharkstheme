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
            <div class="block-two-tab-right__content">
                <!-- Tab 1 Heading - shown by default -->
                <h1 class="block-two-tab-right__title" data-tab-heading="tab1" style="font-family: Switzer, Arial Black, sans-serif !important; font-weight: 500 !important; font-size: 82px !important; line-height: 1.1 !important; letter-spacing: -4.1px !important; text-transform: uppercase !important; color: #000 !important; margin: 0 !important; padding: 0 !important; text-align: left !important;"><?php echo esc_html(trim($tab1_heading)); ?></h1>
                
                <!-- Tab 2 Heading - hidden by default -->
                <h1 class="block-two-tab-right__title" data-tab-heading="tab2" style="display: none; font-family: Switzer, Arial Black, sans-serif !important; font-weight: 500 !important; font-size: 82px !important; line-height: 1.1 !important; letter-spacing: -4.1px !important; text-transform: uppercase !important; color: #000 !important; margin: 0 !important; padding: 0 !important; text-align: left !important;"><?php echo esc_html(trim($tab2_heading)); ?></h1>
                
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
                    <svg class="block-two-tab-right__tab-icon" width="42" height="42" viewBox="0 0 42 42" fill="none">
                        <path d="M21 0L21.0041 20.9793L29.0364 1.59852L21.0117 20.9826L35.8492 6.15076L21.0174 20.9883L40.4015 12.9636L21.0207 20.9959L42 21L21.0207 21.0041L40.4015 29.0364L21.0174 21.0117L35.8492 35.8492L21.0117 21.0174L29.0364 40.4015L21.0041 21.0207L21 42L20.9959 21.0207L12.9636 40.4015L20.9883 21.0174L6.15076 35.8492L20.9826 21.0117L1.59852 29.0364L20.9793 21.0041L0 21L20.9793 20.9959L1.59852 12.9636L20.9826 20.9883L6.15076 6.15076L20.9883 20.9826L12.9636 1.59852L20.9959 20.9793L21 0Z" stroke="black" stroke-width="1.4"/>
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
                    <svg class="block-two-tab-right__tab-icon" width="42" height="42" viewBox="0 0 42 42" fill="none">
                        <path d="M21 0L21.0041 20.9793L29.0364 1.59852L21.0117 20.9826L35.8492 6.15076L21.0174 20.9883L40.4015 12.9636L21.0207 20.9959L42 21L21.0207 21.0041L40.4015 29.0364L21.0174 21.0117L35.8492 35.8492L21.0117 21.0174L29.0364 40.4015L21.0041 21.0207L21 42L20.9959 21.0207L12.9636 40.4015L20.9883 21.0174L6.15076 35.8492L20.9826 21.0117L1.59852 29.0364L20.9793 21.0041L0 21L20.9793 20.9959L1.59852 12.9636L20.9826 20.9883L6.15076 6.15076L20.9883 20.9826L12.9636 1.59852L20.9959 20.9793L21 0Z" stroke="white" stroke-width="1.4"/>
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
        const tab1Heading = section.querySelector('[data-tab-heading="tab1"]');
        const tab2Heading = section.querySelector('[data-tab-heading="tab2"]');
        const tab1Content = section.querySelector('[data-tab-content="tab1"]');
        const tab2Content = section.querySelector('[data-tab-content="tab2"]');
        
        tabs.forEach(tab => {
            const tabName = tab.getAttribute('data-tab');
            
            tab.addEventListener('mouseenter', function() {
                // Hide all headings and content
                if (tab1Heading) tab1Heading.style.display = 'none';
                if (tab2Heading) tab2Heading.style.display = 'none';
                if (tab1Content) tab1Content.style.display = 'none';
                if (tab2Content) tab2Content.style.display = 'none';
                
                // Show corresponding heading and content
                if (tabName === 'tab1') {
                    if (tab1Heading) tab1Heading.style.display = 'block';
                    if (tab1Content) tab1Content.style.display = 'block';
                } else if (tabName === 'tab2') {
                    if (tab2Heading) tab2Heading.style.display = 'block';
                    if (tab2Content) tab2Content.style.display = 'block';
                }
            });
            
            tab.addEventListener('mouseleave', function() {
                // Reset to default (show tab1 heading and content)
                if (tab1Heading) tab1Heading.style.display = 'block';
                if (tab2Heading) tab2Heading.style.display = 'none';
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
