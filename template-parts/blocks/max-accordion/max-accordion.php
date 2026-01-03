<?php
/**
 * Max Accordion Block Template
 * Expandable accordion with numbered sections, description and service links
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$background_color = get_field('background_color') ?: '#000000';
$text_color = get_field('text_color') ?: '#ffffff';
$number_color = get_field('number_color') ?: '#bbbab6';
$border_color = get_field('border_color') ?: '#bbbab6';
$accordion_items = get_field('accordion_items');

// Default accordion items if empty
if (empty($accordion_items)) {
    $accordion_items = [
        [
            'number' => '01',
            'title' => 'Turundus',
            'description' => '',
            'services' => []
        ],
        [
            'number' => '02',
            'title' => 'Veebiarendus',
            'description' => 'Hea koduleht on digitaalne visiitkaart ja hea e-pood lausa ärimootor. Oleme 13+ aastat keskendunud WordPressi lahendustele, luues veebilehti, mis on kiired, pilkupüüdvad ja tulemuslikud.',
            'services' => [
                ['text' => 'Strateegia', 'url' => '#'],
                ['text' => 'SEO', 'url' => '#'],
                ['text' => 'Framer', 'url' => '#']
            ]
        ],
        [
            'number' => '03',
            'title' => 'Disain',
            'description' => '',
            'services' => []
        ]
    ];
}

// Block attributes
$anchor = !empty($block['anchor']) ? 'id="' . esc_attr($block['anchor']) . '"' : '';
$class_name = 'block-max-accordion';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}
?>

<section <?php echo $anchor; ?> class="<?php echo esc_attr($class_name); ?>" 
         style="background-color: <?php echo esc_attr($background_color); ?>; color: <?php echo esc_attr($text_color); ?>;"
         data-text-color="<?php echo esc_attr($text_color); ?>"
         data-bg-color="<?php echo esc_attr($background_color); ?>">
    <div class="block-max-accordion__container">
        <?php if (!empty($accordion_items)): ?>
            <?php foreach ($accordion_items as $index => $item): ?>
                <?php 
                // Check if this item should be expanded by default
                $is_expanded = !empty($item['is_expanded']) ? 'is-expanded' : '';
                ?>
                <div class="block-max-accordion__item <?php echo esc_attr($is_expanded); ?>" style="border-bottom: 1px solid <?php echo esc_attr($border_color); ?>;">
                    <!-- Header -->
                    <div class="block-max-accordion__header">
                        <div class="block-max-accordion__header-content-wrapper">
                            <div class="block-max-accordion__header-title-wrapper">
                                <span class="block-max-accordion__number" style="color: <?php echo esc_attr($number_color); ?>;">
                                    (<?php echo esc_html($item['number'] ?? sprintf('%02d', $index + 1)); ?>)
                                </span>
                                <h3 class="block-max-accordion__title" style="color: <?php echo esc_attr($text_color); ?>;">
                                    <?php echo esc_html($item['title'] ?? ''); ?>
                                </h3>
                            </div>
                            
                            <!-- Content (right of title) -->
                            <?php if (!empty($item['description']) || !empty($item['services'])): ?>
                                <div class="block-max-accordion__content">
                                    <div class="block-max-accordion__content-wrapper">
                                <?php if (!empty($item['description'])): ?>
                                    <div class="block-max-accordion__description">
                                        <p style="color: <?php echo esc_attr($text_color); ?>;">
                                            <?php echo esc_html($item['description']); ?>
                                        </p>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($item['services'])): ?>
                                    <div class="block-max-accordion__services-grid">
                                        <?php 
                                        // Split services into 3 columns
                                        $services = $item['services'];
                                        $per_column = ceil(count($services) / 3);
                                        $columns = array_chunk($services, $per_column);
                                        ?>
                                        <?php foreach ($columns as $column): ?>
                                            <div class="block-max-accordion__services-column">
                                                <?php foreach ($column as $service): ?>
                                                    <a href="<?php echo esc_url($service['url'] ?? '#'); ?>" 
                                                       class="block-max-accordion__service-link"
                                                       style="color: <?php echo esc_attr($text_color); ?>;">
                                                        <span><?php echo esc_html($service['text'] ?? ''); ?></span>
                                                        <svg class="block-max-accordion__arrow-icon" viewBox="0 0 26 26" fill="none">
                                                            <rect fill="<?php echo esc_attr($text_color); ?>" width="26" height="26"/>
                                                            <path d="M8.9375 13H17.0625" stroke="<?php echo esc_attr($background_color); ?>" stroke-width="1.15" stroke-linecap="round"/>
                                                            <path d="M13 8.9375L17.0625 13L13 17.0625" stroke="<?php echo esc_attr($background_color); ?>" stroke-width="1.15" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                    </a>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Icon (right side of header) -->
                        <div class="block-max-accordion__icon-wrapper">
                            <svg class="block-max-accordion__icon block-max-accordion__icon--plus" viewBox="0 0 32 32" fill="none">
                                <path d="M16 8L16 24M8 16L24 16" stroke="<?php echo esc_attr($text_color); ?>" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                            <svg class="block-max-accordion__icon block-max-accordion__icon--minus" viewBox="0 0 32 32" fill="none" style="display: none;">
                                <path d="M8 16L24 16" stroke="<?php echo esc_attr($text_color); ?>" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>

