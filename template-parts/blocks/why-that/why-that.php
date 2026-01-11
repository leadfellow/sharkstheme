<?php
/**
 * Why That Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$main_title = get_field('main_title') ?: 'Miks on vaja digiturundus-agentuuri?';
$cards = get_field('cards');

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = sharks_get_block_anchor($block, 'why-that');
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';

// Icon options mapping
$icon_map = [
    'star' => '<svg fill="none" viewBox="0 0 42 42"><path d="M21 4L24.5 17.5L38 21L24.5 24.5L21 38L17.5 24.5L4 21L17.5 17.5L21 4Z" fill="white"/></svg>',
    'x' => '<svg fill="none" viewBox="0 0 42 42"><path d="M21 7L28 14L21 21L28 28L21 35L14 28L21 21L14 14L21 7Z" fill="white"/></svg>',
    'circles' => '<svg fill="none" viewBox="0 0 42 42"><circle cx="21" cy="21" r="3" fill="white"/><circle cx="21" cy="21" r="8" stroke="white" stroke-width="2" fill="none"/><circle cx="21" cy="21" r="14" stroke="white" stroke-width="2" fill="none"/></svg>',
    'target' => '<svg fill="none" viewBox="0 0 42 42"><circle cx="21" cy="21" r="3" fill="white"/><circle cx="21" cy="21" r="8" stroke="white" stroke-width="2" fill="none"/><circle cx="21" cy="21" r="14" stroke="white" stroke-width="2" fill="none"/></svg>',
    'asterisk' => '<svg fill="none" viewBox="0 0 42 42"><path d="M26 7.7L31.5 3L38.5 10.1L32.2 15.8H41V25H33.6L40.1 30.9L33.5 38.4L26 31.3V41H16V33.6L10.1 40.1L2.97 33.5L9.14 26H0V16H8L2 10.1L8.7 3.4L16 9.2V0H26V7.7Z" fill="white"/></svg>'
];

// Position classes
$position_classes = ['card-top-left', 'card-top-right', 'card-bottom'];
?>

<section id="<?php echo esc_attr($anchor); ?>" class="block-why-that<?php echo esc_attr($align_class . $class_name); ?>">
    <div class="block-why-that__container">
        <h2 class="block-why-that__title"><?php echo esc_html($main_title); ?></h2>

        <?php if ($cards && is_array($cards)): ?>
            <?php foreach ($cards as $index => $card): 
                $icon_type = $card['icon'] ?? 'star';
                $icon_svg = isset($icon_map[$icon_type]) ? $icon_map[$icon_type] : $icon_map['star'];
                $position_class = isset($position_classes[$index]) ? $position_classes[$index] : '';
            ?>
                <div class="block-why-that__card <?php echo esc_attr($position_class); ?>">
                    <div class="block-why-that__icon">
                        <?php echo $icon_svg; ?>
                    </div>
                    <div class="block-why-that__content">
                        <h3 class="block-why-that__card-title"><?php echo esc_html($card['title']); ?></h3>
                        <p class="block-why-that__card-description"><?php echo esc_html($card['description']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- Default cards -->
            <div class="block-why-that__card card-top-left">
                <div class="block-why-that__icon">
                    <svg fill="none" viewBox="0 0 42 42">
                        <path d="M21 4L24.5 17.5L38 21L24.5 24.5L21 38L17.5 24.5L4 21L17.5 17.5L21 4Z" fill="white"/>
                    </svg>
                </div>
                <div class="block-why-that__content">
                    <h3 class="block-why-that__card-title">Strateegiline fookus</h3>
                    <p class="block-why-that__card-description">Meie digiturunduse agentuur koondab teadmised ja oskused, et luua toimivad kampaaniad</p>
                </div>
            </div>

            <div class="block-why-that__card card-top-right">
                <div class="block-why-that__icon">
                    <svg fill="none" viewBox="0 0 42 42">
                        <path d="M21 7L28 14L21 21L28 28L21 35L14 28L21 21L14 14L21 7Z" fill="white"/>
                    </svg>
                </div>
                <div class="block-why-that__content">
                    <h3 class="block-why-that__card-title">Ressursside kokkuhoid</h3>
                    <p class="block-why-that__card-description">Ei mingeid kalleid värbamisi, vaid täielik tugi ühes kohas</p>
                </div>
            </div>

            <div class="block-why-that__card card-bottom">
                <div class="block-why-that__icon">
                    <svg fill="none" viewBox="0 0 42 42">
                        <circle cx="21" cy="21" r="3" fill="white"/>
                        <circle cx="21" cy="21" r="8" stroke="white" stroke-width="2" fill="none"/>
                        <circle cx="21" cy="21" r="14" stroke="white" stroke-width="2" fill="none"/>
                    </svg>
                </div>
                <div class="block-why-that__content">
                    <h3 class="block-why-that__card-title">Mõõdetavate tulemuste lubadus</h3>
                    <p class="block-why-that__card-description">Andmepõhine lähenemine tagab, et investeering on arusaadav ja jälgitav</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

