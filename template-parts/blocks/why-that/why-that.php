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
    'diamond' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.8896 41.7803L14.916 27.6758L20.8896 30.3936L27.4209 27.4209L20.8896 41.7803ZM12.043 20.8896L14.916 27.6758L0 20.8896L14.6748 14.6748L12.043 20.8896ZM41.7803 20.8896L27.4209 27.4209L30.3936 20.8896L27.6758 14.916L41.7803 20.8896ZM27.6758 14.916L20.8896 12.043L14.6748 14.6748L20.8896 0L27.6758 14.916Z" fill="white"/></svg>',
    'plus' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M26.0884 8.71533L31.7944 3.01025L38.9907 10.2065L33.2856 15.9106L41.354 15.9116L41.353 26.0884H33.9556L39.3765 31.1226L32.4507 38.5796L26.0884 32.6704V41.354H15.9116V33.2847L10.2056 38.9907L3.00928 31.7944L8.71533 26.0884H0.645996V15.9106H8.04248L2.62354 10.8774L9.54834 3.42041L15.9116 9.32959V0.645996H26.0884V8.71533Z" fill="white"/></svg>',
    'wave' => '<svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M39.9969 2.00314C38.8906 0.896835 37.0969 0.896835 35.9906 2.00314L29.4969 8.49687C24.8042 13.1896 17.1958 13.1896 12.5031 8.49686L6.00941 2.00314C4.90311 0.896834 3.10944 0.896835 2.00314 2.00314C0.896835 3.10944 0.896835 4.90311 2.00314 6.00941L8.49687 12.5031C13.1896 17.1958 13.1896 24.8042 8.49686 29.4969L2.00314 35.9906C0.896834 37.0969 0.896835 38.8906 2.00314 39.9969C3.10944 41.1032 4.90311 41.1032 6.00941 39.9969L12.5031 33.5031C17.1958 28.8104 24.8042 28.8104 29.4969 33.5031L35.9906 39.9969C37.0969 41.1032 38.8906 41.1032 39.9969 39.9969C41.1032 38.8906 41.1032 37.0969 39.9969 35.9906L33.5031 29.4969C28.8104 24.8042 28.8104 17.1958 33.5031 12.5031L39.9969 6.00941C41.1032 4.90311 41.1032 3.10944 39.9969 2.00314Z" fill="white"/></svg>'
];

// Position classes
$position_classes = ['card-top-left', 'card-top-right', 'card-bottom'];
?>

<section id="<?php echo esc_attr($anchor); ?>" class="block-why-that<?php echo esc_attr($align_class . $class_name); ?>">
    <div class="block-why-that__container">
        <h2 class="block-why-that__title"><?php echo esc_html($main_title); ?></h2>

        <?php if ($cards && is_array($cards)): ?>
            <?php foreach ($cards as $index => $card): 
                $icon_type = $card['icon'] ?? 'diamond';
                $icon_svg = isset($icon_map[$icon_type]) ? $icon_map[$icon_type] : $icon_map['diamond'];
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
                    <?php echo $icon_map['diamond']; ?>
                </div>
                <div class="block-why-that__content">
                    <h3 class="block-why-that__card-title">Strateegiline fookus</h3>
                    <p class="block-why-that__card-description">Meie digiturunduse agentuur koondab teadmised ja oskused, et luua toimivad kampaaniad</p>
                </div>
            </div>

            <div class="block-why-that__card card-top-right">
                <div class="block-why-that__icon">
                    <?php echo $icon_map['plus']; ?>
                </div>
                <div class="block-why-that__content">
                    <h3 class="block-why-that__card-title">Ressursside kokkuhoid</h3>
                    <p class="block-why-that__card-description">Ei mingeid kalleid värbamisi, vaid täielik tugi ühes kohas</p>
                </div>
            </div>

            <div class="block-why-that__card card-bottom">
                <div class="block-why-that__icon">
                    <?php echo $icon_map['wave']; ?>
                </div>
                <div class="block-why-that__content">
                    <h3 class="block-why-that__card-title">Mõõdetavate tulemuste lubadus</h3>
                    <p class="block-why-that__card-description">Andmepõhine lähenemine tagab, et investeering on arusaadav ja jälgitav</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

