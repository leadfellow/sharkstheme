<?php
/**
 * Select Text Block Template (Tabs)
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields - tabs repeater
$tabs = get_field('tabs');
$background_color = get_field('background_color') ?: '#ffffff';
$show_icon = get_field('show_icon') !== false; // Default true

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = sharks_get_block_anchor($block, 'select-text');
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';

// Starburst icon SVG
$starburst_icon = '<svg viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M21 0.000244141L21.0041 20.9796L29.0364 1.59877L21.0117 20.9828L35.8492 6.15101L21.0174 20.9886L40.4015 12.9638L21.0207 20.9962L42 21.0002L21.0207 21.0043L40.4015 29.0366L21.0174 21.0119L35.8492 35.8494L21.0117 21.0177L29.0364 40.4017L21.0041 21.0209L21 42.0002L20.9959 21.0209L12.9636 40.4017L20.9883 21.0177L6.15076 35.8494L20.9826 21.0119L1.59852 29.0366L20.9793 21.0043L0 21.0002L20.9793 20.9962L1.59852 12.9638L20.9826 20.9886L6.15076 6.15101L20.9883 20.9828L12.9636 1.59877L20.9959 20.9796L21 0.000244141Z" stroke="black" stroke-width="1.4"/></svg>';

if (!$tabs || empty($tabs)) {
    // Default content for preview
    $tabs = [
        [
            'title' => 'Platvorm ja arenduse tase',
            'content' => 'WordPress on ühtaegu sobiv valik nii lihtsatele kui ka keerukatele projektidele – see on turuliidri valik. Framer on disainipõhine platvorm ning sobib visuaalsetele ja lihtsamatele lehtedele'
        ],
        [
            'title' => 'Kujundus ja bränd',
            'content' => 'Add your content here...'
        ],
        [
            'title' => 'Kiirus ja mobilsus',
            'content' => 'Add your content here...'
        ]
    ];
}
?>

<div id="<?php echo esc_attr($anchor); ?>" class="select-text<?php echo esc_attr($align_class . $class_name); ?>" style="background-color: <?php echo esc_attr($background_color); ?>;">
    <div class="select-text__container">
        
        <!-- Frame 99: Content wrapper -->
        <div>
            <?php if ($show_icon): ?>
            <div class="select-text__icon-top">
                <?php echo $starburst_icon; ?>
            </div>
            <?php endif; ?>
            
            <div class="select-text__content-area">
                <?php foreach ($tabs as $index => $tab): ?>
                    <div class="select-text__content" data-tab="<?php echo $index; ?>" <?php echo $index !== 0 ? 'style="display: none;"' : ''; ?>>
                        <?php echo $tab['content'] ? wp_kses_post(wpautop($tab['content'])) : '<p>Add your content here...</p>'; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <!-- Frame 97: Tabs -->
        <div class="select-text__tabs">
            <?php foreach ($tabs as $index => $tab): ?>
                <button 
                    class="select-text__tab<?php echo $index === 0 ? ' select-text__tab--active' : ''; ?>" 
                    data-tab="<?php echo $index; ?>"
                    aria-selected="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                    <?php echo esc_html($tab['title'] ?: 'Tab ' . ($index + 1)); ?>
                </button>
            <?php endforeach; ?>
        </div>
        
    </div>
</div>

<script>
(function() {
    document.querySelectorAll('.select-text').forEach(block => {
        const tabs = block.querySelectorAll('.select-text__tab');
        const contents = block.querySelectorAll('.select-text__content');
        
        tabs.forEach(tab => {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                
                const tabIndex = this.getAttribute('data-tab');
                
                // Remove active class from all tabs
                tabs.forEach(t => {
                    t.classList.remove('select-text__tab--active');
                    t.setAttribute('aria-selected', 'false');
                });
                
                // Hide all content
                contents.forEach(c => {
                    c.style.display = 'none';
                });
                
                // Activate clicked tab
                this.classList.add('select-text__tab--active');
                this.setAttribute('aria-selected', 'true');
                
                // Show corresponding content
                const activeContent = block.querySelector(`.select-text__content[data-tab="${tabIndex}"]`);
                if (activeContent) {
                    activeContent.style.display = 'block';
                }
            });
        });
    });
})();
</script>
