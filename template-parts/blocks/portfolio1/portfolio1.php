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

<section id="<?php echo esc_attr($anchor); ?>" class="<?php echo esc_attr($class_name); ?>">
    <div class="portfolio1-container">
        
        <?php if ($categories && count($categories) > 0): ?>
            <!-- Category Filter -->
            <div class="portfolio1-filter">
                <?php foreach ($categories as $index => $category): ?>
                    <button 
                        class="portfolio1-filter-btn <?php echo $index === 0 ? 'active' : ''; ?>" 
                        data-category="<?php echo esc_attr($category['slug']); ?>"
                    >
                        <?php echo esc_html($category['name']); ?>
                    </button>
                <?php endforeach; ?>
            </div>
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
                        <!-- Header Section -->
                        <div class="portfolio1-header">
                            <div class="portfolio1-header-left">
                                <p class="portfolio1-category"><?php echo esc_html($item['category_label']); ?></p>
                                <div class="portfolio1-title-wrapper">
                                    <p class="portfolio1-main-title"><?php echo esc_html($item['title']); ?></p>
                                    <?php if (!empty($item['logo_svg'])): ?>
                                        <div class="portfolio1-logo-icon">
                                            <svg fill="none" preserveAspectRatio="none" viewBox="0 0 62 62">
                                                <g>
                                                    <?php echo $item['logo_svg']; ?>
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

                        <!-- MacBook Mockup Section -->
                        <?php if (!empty($item['main_image'])): ?>
                            <div class="portfolio1-macbook-section">
                                <div class="portfolio1-macbook-wrapper">
                                    <div class="portfolio1-macbook-container">
                                        <div class="portfolio1-macbook-bezel">
                                            <img 
                                                src="<?php echo esc_url($item['main_image']['url']); ?>" 
                                                alt="<?php echo esc_attr($item['main_image']['alt'] ?: $item['title']); ?>" 
                                                class="portfolio1-macbook-image"
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Project Details Section (Collapsible) -->
                        <div class="portfolio1-details-wrapper">
                            <!-- Read More Header -->
                            <div class="portfolio1-read-more-section">
                                <button class="portfolio1-read-more-btn" data-target="<?php echo esc_attr($item_id); ?>">
                                    <p class="portfolio1-read-more-title">loe lähemalt projektist</p>
                                    <div class="portfolio1-toggle-icon">
                                        <svg class="icon-plus" fill="none" preserveAspectRatio="none" viewBox="0 0 22.6274 22.6274">
                                            <g>
                                                <path d="M11.3137 0V22.6274M0 11.3137H22.6274" stroke="black" stroke-width="2"/>
                                            </g>
                                        </svg>
                                        <svg class="icon-close" fill="none" preserveAspectRatio="none" viewBox="0 0 22.6274 22.6274">
                                            <g>
                                                <path d="M22.6274 20.469L13.4721 11.3137L22.6274 2.15837L20.469 0L11.3137 9.15534L2.15837 0L0 2.15837L9.15534 11.3137L0 20.469L2.15837 22.6274L11.3137 13.4721L20.469 22.6274L22.6274 20.469Z" fill="black" />
                                            </g>
                                        </svg>
                                    </div>
                                </button>
                            </div>

                            <!-- Content Section (Initially Hidden) -->
                            <div class="portfolio1-content-section" data-content-id="<?php echo esc_attr($item_id); ?>">
                                <div class="portfolio1-content-inner">
                                    <div class="portfolio1-content-left">
                                        <!-- Task Section -->
                                        <?php if (!empty($item['task_list']) && count($item['task_list']) > 0): ?>
                                            <div class="portfolio1-task-section">
                                                <p class="portfolio1-section-title"><?php echo esc_html($item['task_title'] ?: 'Lähteülesanne'); ?></p>
                                                <div class="portfolio1-section-text">
                                                    <?php if (!empty($item['task_intro'])): ?>
                                                        <p><?php echo esc_html($item['task_intro']); ?></p>
                                                    <?php endif; ?>
                                                    <ol>
                                                        <?php foreach ($item['task_list'] as $task): ?>
                                                            <li><?php echo esc_html($task['item']); ?></li>
                                                        <?php endforeach; ?>
                                                    </ol>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <!-- Solution Section -->
                                        <?php if (!empty($item['solution_text'])): ?>
                                            <div class="portfolio1-solution-section">
                                                <p class="portfolio1-section-title"><?php echo esc_html($item['solution_title'] ?: 'Lahendus'); ?></p>
                                                <div class="portfolio1-section-text">
                                                    <p><?php echo esc_html($item['solution_text']); ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Screenshot Section -->
                                    <div class="portfolio1-content-right">
                                        <?php if (!empty($item['screenshot_image'])): ?>
                                            <div class="portfolio1-screenshot-wrapper">
                                                <img 
                                                    src="<?php echo esc_url($item['screenshot_image']['url']); ?>" 
                                                    alt="<?php echo esc_attr($item['screenshot_image']['alt'] ?: 'Screenshot'); ?>" 
                                                    class="portfolio1-screenshot-image"
                                                >
                                            </div>
                                        <?php endif; ?>

                                        <!-- Stats Section -->
                                        <?php if (!empty($item['stats_before']) || !empty($item['stats_after'])): ?>
                                            <div class="portfolio1-stats-section">
                                                <div class="portfolio1-stats-chart">
                                                    <?php if (!empty($item['stats_before'])): ?>
                                                        <div class="portfolio1-stat-bar before">
                                                            <div class="portfolio1-stat-label">Enne</div>
                                                            <div class="portfolio1-stat-value"><?php echo esc_html($item['stats_before']); ?></div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if (!empty($item['stats_after'])): ?>
                                                        <div class="portfolio1-stat-bar after">
                                                            <div class="portfolio1-stat-label">Pärast</div>
                                                            <div class="portfolio1-stat-value"><?php echo esc_html($item['stats_after']); ?></div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <?php if (!empty($item['stats_label'])): ?>
                                                    <p class="portfolio1-stats-description"><?php echo esc_html($item['stats_label']); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
