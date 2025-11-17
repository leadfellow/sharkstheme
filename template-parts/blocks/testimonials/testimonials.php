<?php
/**
 * Testimonials Block Template
 *
 * @package sharks2025
 */

// Get block fields
$title = get_field('title') ?: 'TAGASISIDE';
$subtitle = get_field('subtitle') ?: 'not just a words but proof';
$testimonials = get_field('testimonials') ?: [];
$style_variant = get_field('style_variant') ?: 'default';

// Block classes
$class_name = 'block-testimonials';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Style variant
$class_name .= ' block-testimonials--' . $style_variant;

// Unique ID for carousel
$carousel_id = 'testimonials-' . uniqid();
?>

<section class="<?php echo esc_attr($class_name); ?>" id="<?php echo esc_attr($carousel_id); ?>">
    <div class="block-testimonials__inner">
        <?php if (!empty($testimonials)): ?>
            <!-- Header with counter, title, subtitle -->
            <div class="block-testimonials__header">
                <div class="block-testimonials__counter">
                    <span class="current">1</span> / <span class="total"><?php echo count($testimonials); ?></span>
                </div>
                
                <div class="block-testimonials__title-wrapper">
                    <?php if ($title): ?>
                        <h2 class="block-testimonials__title"><?php echo esc_html($title); ?></h2>
                    <?php endif; ?>
                </div>
                
                <?php if ($subtitle): ?>
                    <div class="block-testimonials__subtitle"><?php echo esc_html($subtitle); ?></div>
                <?php endif; ?>
            </div>
            
            <!-- Separator line -->
            <div class="block-testimonials__separator"></div>
            
            <div class="block-testimonials__carousel">
                <!-- Slides with Navigation -->
                <div class="block-testimonials__slides-wrapper">
                    <?php if (count($testimonials) > 1): ?>
                        <button class="block-testimonials__nav block-testimonials__nav--prev" aria-label="Previous">
                            <svg width="26" height="21" viewBox="0 0 26 21" fill="none" stroke="currentColor">
                                <path d="M1 10.5H25M13 1L25 10.5L13 20" stroke-width="2.22" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    <?php endif; ?>
                    
                    <div class="block-testimonials__slides">
                        <?php foreach ($testimonials as $index => $testimonial): ?>
                            <div class="block-testimonials__slide <?php echo $index === 0 ? 'is-active' : ''; ?>" data-slide="<?php echo $index; ?>">
                                <div class="block-testimonials__content">
                                    <?php if (!empty($testimonial['text'])): ?>
                                        <p class="block-testimonials__text"><?php echo esc_html($testimonial['text']); ?></p>
                                    <?php endif; ?>
                                    
                                    <div class="block-testimonials__author">
                                        <?php if (!empty($testimonial['author_image'])): ?>
                                            <img src="<?php echo esc_url($testimonial['author_image']['url']); ?>" 
                                                 alt="<?php echo esc_attr($testimonial['author_name']); ?>" 
                                                 class="block-testimonials__author-image">
                                        <?php endif; ?>
                                        
                                        <div class="block-testimonials__author-info">
                                            <?php if (!empty($testimonial['author_name']) || !empty($testimonial['author_position'])): ?>
                                                <div class="block-testimonials__author-name">
                                                    <?php echo esc_html($testimonial['author_name']); ?>
                                                    <?php if (!empty($testimonial['author_position'])): ?>
                                                        , <?php echo esc_html($testimonial['author_position']); ?>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                            
                                            <?php if (!empty($testimonial['author_company'])): ?>
                                                <div class="block-testimonials__author-company">
                                                    <?php echo esc_html($testimonial['author_company']); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <?php if (count($testimonials) > 1): ?>
                        <button class="block-testimonials__nav block-testimonials__nav--next" aria-label="Next">
                            <svg width="26" height="21" viewBox="0 0 26 21" fill="none" stroke="currentColor">
                                <path d="M1 10.5H25M13 1L25 10.5L13 20" stroke-width="2.22" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php if (!empty($testimonials) && count($testimonials) > 1): ?>
<script>
(function() {
    const carousel = document.getElementById('<?php echo $carousel_id; ?>');
    if (!carousel) return;
    
    const slides = carousel.querySelectorAll('.block-testimonials__slide');
    const prevBtn = carousel.querySelector('.block-testimonials__nav--prev');
    const nextBtn = carousel.querySelector('.block-testimonials__nav--next');
    const counter = carousel.querySelector('.block-testimonials__counter .current');
    let currentSlide = 0;
    
    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('is-active', i === index);
        });
        if (counter) {
            counter.textContent = index + 1;
        }
        currentSlide = index;
    }
    
    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            const newIndex = currentSlide > 0 ? currentSlide - 1 : slides.length - 1;
            showSlide(newIndex);
        });
    }
    
    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            const newIndex = currentSlide < slides.length - 1 ? currentSlide + 1 : 0;
            showSlide(newIndex);
        });
    }
})();
</script>
<?php endif; ?>

