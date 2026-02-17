<?php
/**
 * Portfolio1 Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get block fields
$anchor = sharks_get_block_anchor($block, 'portfolio1');
$class_name = sharks_get_block_class($block, 'portfolio1-block');
$show_on_mobile = get_field('show_on_mobile');
$categories = get_field('categories');
$portfolio_items = get_field('portfolio_items');

// Enqueue block assets
wp_enqueue_style(
    'portfolio1-css',
    get_template_directory_uri() . '/assets/css/portfolio1.css',
    [],
    filemtime(get_template_directory() . '/assets/css/portfolio1.css')
);

wp_enqueue_script(
    'portfolio1-js',
    get_template_directory_uri() . '/assets/js/portfolio1.js',
    [],
    filemtime(get_template_directory() . '/assets/js/portfolio1.js'),
    true
);
?>

<section id="<?php echo esc_attr($anchor); ?>" class="<?php echo esc_attr($class_name); ?>" data-show-mobile="<?php echo $show_on_mobile ? 'true' : 'false'; ?>">
    <div class="portfolio1-container">
        
        <?php if ($categories && count($categories) > 0): ?>
            <!-- Category Filter -->
            <div class="portfolio1-filter">
                <!-- Kõik nupp (alati esimene) -->
                <button 
                    class="portfolio1-filter-btn active" 
                    data-category="all"
                >
                    Kõik Kodulehed
                </button>
                
                <!-- Kategooriad -->
                <?php foreach ($categories as $index => $category): ?>
                    <button 
                        class="portfolio1-filter-btn" 
                        data-category="<?php echo esc_attr($category['slug']); ?>"
                    >
                        <?php echo esc_html($category['name']); ?>
                    </button>
                <?php endforeach; ?>
            </div><!-- .portfolio1-filter -->
        <?php endif; ?>

        <?php if ($portfolio_items && count($portfolio_items) > 0): ?>
            <!-- Portfolio Items -->
            <div class="portfolio1-items">
                <?php foreach ($portfolio_items as $index => $item): 
                    $is_even = ($index % 2 === 0);
                    $bg_class = $is_even ? 'bg-white' : 'bg-gray';
                    $item_id = 'portfolio-item-' . $index;
                ?>
                    <div 
                        class="portfolio1-item <?php echo esc_attr($bg_class); ?>" 
                        data-category="<?php echo esc_attr($item['category']); ?>"
                        data-item-id="<?php echo esc_attr($item_id); ?>"
                    >
                        <div class="portfolio1-item-inner">
                            <!-- Header Section -->
                            <div class="portfolio1-header">
                            <div class="portfolio1-header-left">
                                <p class="portfolio1-category"><?php echo esc_html($item['category_label']); ?></p>
                                <div class="portfolio1-title-wrapper">
                                    <p class="portfolio1-main-title"><?php echo esc_html($item['title']); ?></p>
                                    <?php 
                                    $logo_type = isset($item['logo_type']) ? $item['logo_type'] : 'none';
                                    $logo_svg = '';
                                    
                                    // Predefined icons
                                    if ($logo_type === 'icon1') {
                                        // X-pattern icon
                                        $logo_svg = '<path d="M59.043 2.95701C57.4099 1.3239 54.7621 1.3239 53.129 2.95701L43.543 12.543C36.6157 19.4703 25.3843 19.4703 18.457 12.543L8.87103 2.95701C7.23792 1.3239 4.59012 1.3239 2.95701 2.95701C1.3239 4.59012 1.3239 7.23792 2.95701 8.87103L12.543 18.457C19.4703 25.3843 19.4703 36.6157 12.543 43.543L2.95701 53.129C1.3239 54.7621 1.3239 57.4099 2.95701 59.043C4.59012 60.6761 7.23792 60.6761 8.87103 59.043L18.457 49.457C25.3843 42.5297 36.6157 42.5297 43.543 49.457L53.129 59.043C54.7621 60.6761 57.4099 60.6761 59.043 59.043C60.6761 57.4099 60.6761 54.7621 59.043 53.129L49.457 43.543C42.5297 36.6157 42.5297 25.3843 49.457 18.457L59.043 8.87103C60.6761 7.23792 60.6761 4.59012 59.043 2.95701Z" fill="black"/>';
                                    } elseif ($logo_type === 'icon2') {
                                        // Star icon
                                        $logo_svg = '<path d="M38.5107 12.864L46.9326 4.44214L57.5557 15.0652L49.1328 23.488H61.0459V38.5115H50.126L58.1279 45.9431L47.9043 56.9509L38.5107 48.2263V61.0466H23.4873V49.1335L15.0635 57.5574L4.44141 46.9343L12.8643 38.5115H0.953125V23.488H11.875L3.87305 16.0564L14.0967 5.04858L23.4873 13.7693V0.953857H38.5107V12.864Z" fill="black"/>';
                                    } elseif ($logo_type === 'custom' && !empty($item['logo_svg'])) {
                                        // Custom SVG code
                                        $logo_svg = $item['logo_svg'];
                                    }
                                    
                                    if (!empty($logo_svg)): ?>
                                        <div class="portfolio1-logo-icon">
                                            <svg fill="none" preserveAspectRatio="none" viewBox="0 0 62 62" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                    <?php echo $logo_svg; ?>
                                                </g>
                                            </svg>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="portfolio1-header-right">
                                <div class="portfolio1-description">
                                    <p><?php echo esc_html($item['description']); ?></p>
                                </div>
                                <?php if (!empty($item['button_link'])): ?>
                                    <a href="<?php echo esc_url($item['button_link']); ?>" class="portfolio1-cta-button" target="_blank" rel="noopener">
                                        <p class="portfolio1-cta-text"><?php echo esc_html($item['button_text'] ?: 'Vaata lehte'); ?></p>
                                        <div class="portfolio1-arrow-icon">
                                            <svg fill="none" preserveAspectRatio="none" viewBox="0 0 26 26">
                                                <g>
                                                    <rect fill="black" height="26" width="26" />
                                                    <path d="M8.9375 13H17.0625" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.15104" />
                                                    <path d="M13.8125 9.75L17.0625 13L13.8125 16.25" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.15104" />
                                                </g>
                                            </svg>
                                        </div>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Scrollable Image Section with MacBook Mockup -->
                        <?php if (!empty($item['main_image'])): 
                            $image_id = $item['main_image']['ID'];
                            
                            // Get the original uploaded file path (not scaled version)
                            $image_meta = wp_get_attachment_metadata($image_id);
                            $upload_dir = wp_upload_dir();
                            
                            // Check if there's an original_image in meta (WordPress stores this when it creates scaled version)
                            if (isset($image_meta['original_image'])) {
                                // Use the original file, not the scaled version
                                $file_path = pathinfo($image_meta['file']);
                                $image_url = $upload_dir['baseurl'] . '/' . $file_path['dirname'] . '/' . $image_meta['original_image'];
                            } else {
                                // No scaled version exists, use the full size
                                $image_url = wp_get_attachment_image_url($image_id, 'full');
                            }
                            
                            $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true) ?: $item['title'];
                        ?>
                            <div class="portfolio1-image-section">
                                <div class="portfolio1-image-wrapper">
                                    <div class="portfolio1-image-container" data-item-id="<?php echo esc_attr($item_id); ?>">
                                        <!-- MacBook Frame -->
                                        <div class="portfolio1-macbook-frame">
                                            <!-- Screen Bezel -->
                                            <div class="portfolio1-screen-bezel">
                                                <!-- Screen Content -->
                                                <div class="portfolio1-screen-content">
                                                    <img 
                                                        src="<?php echo esc_url($image_url); ?>" 
                                                        alt="<?php echo esc_attr($image_alt); ?>" 
                                                        class="portfolio1-scroll-image"
                                                        loading="eager"
                                                        decoding="sync"
                                                        fetchpriority="high"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <!-- MacBook Base (keyboard area) -->
                                        <div class="portfolio1-macbook-base"></div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        </div><!-- .portfolio1-item-inner -->
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
