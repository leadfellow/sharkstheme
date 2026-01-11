<?php
/**
 * Case Story Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$main_title = get_field('main_title') ?: 'RAHVUSVAHELINE EDULUGU';
$subtitle = get_field('subtitle') ?: 'Spordistatistika tööriist Jalgpallis - UK turg';
$cards = get_field('cards'); // Repeater for cards 1-6
$card_7_type = get_field('card_7_type') ?: 'table'; // 'table' or 'images'
$card_7_title = get_field('card_7_title') ?: 'Tulemused';
$card_7_description = get_field('card_7_description');
$stats_table = get_field('stats_table');
$card_7_images = get_field('card_7_images');
$images_section = get_field('images_section');
$hover_color = get_field('hover_color') ?: '#F237A6';

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = sharks_get_block_anchor($block, 'case-story');
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';
?>

<section id="<?php echo esc_attr($anchor); ?>" class="block-case-story<?php echo esc_attr($align_class . $class_name); ?>">
    <div class="block-case-story__container">
        <!-- Header -->
        <div class="block-case-story__header">
            <h2 class="block-case-story__title"><?php echo esc_html($main_title); ?></h2>
            <div class="block-case-story__icon-circle">
                <svg width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M38.5117 12.8652L46.9346 4.44238L57.5576 15.0654L49.1348 23.4883H61.0469L61.0459 38.5117H50.126L58.1279 45.9434L47.9043 56.9512L38.5117 48.2275V61.0469H23.4883V49.1348L15.0654 57.5576L4.44238 46.9346L12.8652 38.5117H0.954102V23.4883H11.873L3.87207 16.0576L14.0957 5.04883L23.4883 13.7715V0.954102H38.5117V12.8652Z" fill="black"/>
                </svg>
            </div>
        </div>

        <!-- Content -->
        <div class="block-case-story__content">
            <h3 class="block-case-story__subtitle"><?php echo esc_html($subtitle); ?></h3>

            <!-- Cards Grid -->
            <div class="block-case-story__cards-grid">
                <?php if ($cards && is_array($cards)): ?>
                    <?php foreach ($cards as $index => $card): ?>
                        <div class="block-case-story__card">
                            <div class="block-case-story__card-number">(<?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?>)</div>
                            <div>
                                <h4 class="block-case-story__card-title"><?php echo esc_html($card['title']); ?></h4>
                                <p class="block-case-story__card-content"><?php echo esc_html($card['content']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <!-- Card 07 - Full Width with Table or Images -->
                <div class="block-case-story__card block-case-story__card--full">
                    <div class="block-case-story__card-number">(07)</div>
                    <div>
                        <h4 class="block-case-story__card-title"><?php echo esc_html($card_7_title); ?></h4>
                        <?php if ($card_7_description): ?>
                            <p class="block-case-story__card-content"><?php echo esc_html($card_7_description); ?></p>
                        <?php endif; ?>
                    </div>

                    <?php if ($card_7_type === 'table' && $stats_table): ?>
                        <!-- Stats Table -->
                        <div class="block-case-story__stats-container">
                            <div class="block-case-story__stats-table">
                                <!-- Header Row -->
                                <?php if ($stats_table['headers']): ?>
                                    <div class="block-case-story__stats-header">
                                        <?php foreach ($stats_table['headers'] as $header): ?>
                                            <div class="block-case-story__stats-cell"><?php echo esc_html($header['header_text']); ?></div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <!-- Data Rows -->
                                <?php if ($stats_table['rows']): ?>
                                    <?php foreach ($stats_table['rows'] as $row): ?>
                                        <div class="block-case-story__stats-row">
                                            <?php if ($row['cells']): ?>
                                                <?php foreach ($row['cells'] as $cell): ?>
                                                    <div class="block-case-story__stats-cell">
                                                        <?php if ($cell['show_legend']): ?>
                                                            <div class="block-case-story__legend-box"></div>
                                                        <?php endif; ?>
                                                        <span class="block-case-story__stats-label"><?php echo esc_html($cell['cell_text']); ?></span>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php elseif ($card_7_type === 'images' && $card_7_images): ?>
                        <!-- Images in Card -->
                        <div class="block-case-story__card-images">
                            <?php foreach ($card_7_images as $img): ?>
                                <?php 
                                $card_image_id = $img['image'];
                                $card_image_url = wp_get_attachment_image_url($card_image_id, 'full');
                                ?>
                                <a href="<?php echo esc_url($card_image_url); ?>" class="block-case-story__card-image" data-lightbox="case-story">
                                    <?php echo wp_get_attachment_image($card_image_id, 'large'); ?>
                                    <div class="block-case-story__card-image-overlay" style="background: <?php echo esc_attr($hover_color); ?>cc;">
                                        <div class="block-case-story__cta-circle">
                                            <p class="block-case-story__cta-text">vaata lähemalt</p>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Images Section -->
        <?php if ($images_section && is_array($images_section)): ?>
            <div class="block-case-story__images-section">
                <?php foreach ($images_section as $img_item): ?>
                    <?php 
                    $image_id = $img_item['image'];
                    $image_url = wp_get_attachment_image_url($image_id, 'full');
                    $overlay_text = $img_item['overlay_text'] ?: 'vaata lähemalt';
                    ?>
                    <a href="<?php echo esc_url($image_url); ?>" class="block-case-story__image-container" data-lightbox="case-story">
                        <?php if ($image_id): ?>
                            <?php echo wp_get_attachment_image($image_id, 'large'); ?>
                        <?php endif; ?>
                        
                        <div class="block-case-story__image-overlay" style="background: <?php echo esc_attr($hover_color); ?>cc;">
                            <div class="block-case-story__cta-circle">
                                <p class="block-case-story__cta-text"><?php echo esc_html($overlay_text); ?></p>
                                <div class="block-case-story__arrow-icon">→</div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
    .block-case-story__image-overlay {
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .block-case-story__image-container:hover .block-case-story__image-overlay {
        opacity: 1;
    }
    
    /* Lightbox */
    .case-story-lightbox {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.9);
        align-items: center;
        justify-content: center;
    }
    .case-story-lightbox.active {
        display: flex;
    }
    .case-story-lightbox__content {
        max-width: 90%;
        max-height: 90%;
        position: relative;
    }
    .case-story-lightbox__image {
        max-width: 100%;
        max-height: 90vh;
        display: block;
    }
    .case-story-lightbox__close {
        position: absolute;
        top: -40px;
        right: 0;
        color: white;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
        background: none;
        border: none;
        padding: 0;
        line-height: 1;
    }
    .case-story-lightbox__close:hover {
        color: #ccc;
    }
</style>

<div id="case-story-lightbox-<?php echo esc_attr($anchor); ?>" class="case-story-lightbox">
    <div class="case-story-lightbox__content">
        <button class="case-story-lightbox__close">&times;</button>
        <img src="" alt="" class="case-story-lightbox__image">
    </div>
</div>

<script>
(function() {
    const lightbox = document.getElementById('case-story-lightbox-<?php echo esc_js($anchor); ?>');
    const lightboxImg = lightbox.querySelector('.case-story-lightbox__image');
    const closeBtn = lightbox.querySelector('.case-story-lightbox__close');
    const imageLinks = document.querySelectorAll('#<?php echo esc_js($anchor); ?> [data-lightbox="case-story"]');
    
    imageLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const imgSrc = this.getAttribute('href');
            const imgAlt = this.querySelector('img')?.getAttribute('alt') || '';
            
            lightboxImg.src = imgSrc;
            lightboxImg.alt = imgAlt;
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    });
    
    closeBtn.addEventListener('click', function() {
        lightbox.classList.remove('active');
        document.body.style.overflow = '';
    });
    
    lightbox.addEventListener('click', function(e) {
        if (e.target === lightbox) {
            lightbox.classList.remove('active');
            document.body.style.overflow = '';
        }
    });
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && lightbox.classList.contains('active')) {
            lightbox.classList.remove('active');
            document.body.style.overflow = '';
        }
    });
})();
</script>

