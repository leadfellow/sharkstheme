<?php
/**
 * Portfolio Block Template
 * Filterable portfolio grid with categories
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$categories = get_field('categories');
$portfolio_items = get_field('portfolio_items');

// Block attributes
$anchor = sharks_get_block_anchor($block, 'portfolio');
$class_name = 'block-portfolio';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Default data if empty
if (empty($categories)) {
    $categories = [
        ['name' => 'Kõik tööd'],
        ['name' => 'Veebilehed'],
        ['name' => 'Turunduskampaaniad']
    ];
}

if (empty($portfolio_items)) {
    $portfolio_items = [
        [
            'image' => '',
            'link' => '#',
            'button_text' => 'Vaata lähemalt',
            'category' => 'Kõik tööd',
            'yellow_bg' => false
        ]
    ];
}
?>

<section id="<?php echo esc_attr($anchor); ?>" class="<?php echo esc_attr($class_name); ?>">
    <div class="block-portfolio__container">
        <div class="block-portfolio__content-wrapper">
            <!-- Header Section -->
            <div class="block-portfolio__header-section">
                <div class="block-portfolio__header-content">
                    <!-- Left Icon -->
                    <div class="block-portfolio__icon-container">
                        <svg class="block-portfolio__icon" fill="none" preserveAspectRatio="none" viewBox="0 0 62 62">
                            <path d="M59.043 2.95701C57.4099 1.3239 54.7621 1.3239 53.129 2.95701L43.543 12.543C36.6157 19.4703 25.3843 19.4703 18.457 12.543L8.87103 2.95701C7.23792 1.3239 4.59012 1.3239 2.95701 2.95701C1.3239 4.59012 1.3239 7.23792 2.95701 8.87103L12.543 18.457C19.4703 25.3843 19.4703 36.6157 12.543 43.543L2.95701 53.129C1.3239 54.7621 1.3239 57.4099 2.95701 59.043C4.59012 60.6761 7.23792 60.6761 8.87103 59.043L18.457 49.457C25.3843 42.5297 36.6157 42.5297 43.543 49.457L53.129 59.043C54.7621 60.6761 57.4099 60.6761 59.043 59.043C60.6761 57.4099 60.6761 54.7621 59.043 53.129L49.457 43.543C42.5297 36.6157 42.5297 25.3843 49.457 18.457L59.043 8.87103C60.6761 7.23792 60.6761 4.59012 59.043 2.95701Z" fill="black"/>
                        </svg>
                    </div>
                    
                    <!-- Title -->
                    <h1 class="block-portfolio__main-title">TEHTUD TÖÖD</h1>
                    
                    <!-- Right Icon -->
                    <div class="block-portfolio__icon-container">
                        <svg class="block-portfolio__icon" fill="none" preserveAspectRatio="none" viewBox="0 0 62 62">
                            <path d="M38.5117 12.865L46.9346 4.44214L57.5576 15.0652L49.1348 23.488H61.0459V38.5115H50.126L58.1279 45.9431L47.9043 56.9509L38.5117 48.2273V61.0466H23.4883V49.1345L15.0654 57.5574L4.44336 46.9343L12.8662 38.5115H0.953125V23.488H11.875L3.87305 16.0564L14.0967 5.04858L23.4883 13.7703V0.953857H38.5117V12.865Z" fill="black"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Navigation/Filter Section -->
            <nav class="block-portfolio__nav-section">
                <?php foreach ($categories as $index => $category): ?>
                    <div class="block-portfolio__nav-item <?php echo $index === 0 ? 'active' : ''; ?>" 
                         data-category="<?php echo esc_attr($category['name']); ?>">
                        <?php if ($index === 0): ?>
                            <div class="block-portfolio__nav-dot"></div>
                        <?php endif; ?>
                        <span><?php echo esc_html($category['name']); ?></span>
                    </div>
                <?php endforeach; ?>
            </nav>

            <!-- Portfolio Grid -->
            <div class="block-portfolio__grid">
                <?php 
                $row_items = [];
                foreach ($portfolio_items as $index => $item): 
                    $row_items[] = $item;
                    
                    // Output row every 2 items or at the end
                    if (count($row_items) === 2 || $index === count($portfolio_items) - 1):
                ?>
                    <div class="block-portfolio__row">
                        <?php foreach ($row_items as $row_item): 
                            $image = $row_item['image'];
                            $link = $row_item['link'] ?? '#';
                            $button_text = $row_item['button_text'] ?? 'Vaata lähemalt';
                            $category = $row_item['category'] ?? 'Kõik tööd';
                            $yellow_bg = !empty($row_item['yellow_bg']);
                        ?>
                            <div class="block-portfolio__item" data-category="<?php echo esc_attr($category); ?>">
                                <div class="block-portfolio__image <?php echo $yellow_bg ? 'yellow-bg' : ''; ?>">
                                    <?php if ($image): ?>
                                        <img src="<?php echo esc_url($image['url']); ?>" 
                                             alt="<?php echo esc_attr($image['alt'] ?: 'Portfolio item'); ?>">
                                    <?php endif; ?>
                                </div>
                                <a href="<?php echo esc_url($link); ?>" class="block-portfolio__button">
                                    <span><?php echo esc_html($button_text); ?></span>
                                    <div class="block-portfolio__arrow-icon">
                                        <svg fill="none" preserveAspectRatio="none" viewBox="0 0 26 26">
                                            <rect fill="black" height="26" width="26"/>
                                            <path d="M8.9375 13H17.0625" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.15104"/>
                                            <path d="M13.8125 9.75L17.0625 13L13.8125 16.25" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.15104"/>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php 
                        $row_items = [];
                    endif;
                endforeach; 
                ?>
            </div>
        </div>
    </div>
</section>




