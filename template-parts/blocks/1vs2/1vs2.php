<?php
/**
 * 1vs2 Block Template
 * Comparison block with cards (e.g., Koduleht vs E-pood)
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$title = get_field('title') ?: 'Koduleht vs E-pood';
$title_highlight = get_field('title_highlight') ?: 'vs';
$subtitle = get_field('subtitle') ?: 'Või hoopis kombineeritud lahendus?';
$cards = get_field('cards');
$links = get_field('links');

// Default cards if empty
if (empty($cards)) {
    $cards = [
        [
            'icon_svg' => '<svg viewBox="0 0 42 42" fill="none"><path d="M39.9969 2.00314C38.8906 0.896835 37.0969 0.896835 35.9906 2.00314L29.4969 8.49687C24.8042 13.1896 17.1958 13.1896 12.5031 8.49686L6.00941 2.00314C4.90311 0.896834 3.10944 0.896835 2.00314 2.00314C0.896835 3.10944 0.896835 4.90311 2.00314 6.00941L8.49687 12.5031C13.1896 17.1958 13.1896 24.8042 8.49686 29.4969L2.00314 35.9906C0.896834 37.0969 0.896835 38.8906 2.00314 39.9969C3.10944 41.1032 4.90311 41.1032 6.00941 39.9969L12.5031 33.5031C17.1958 28.8104 24.8042 28.8104 29.4969 33.5031L35.9906 39.9969C37.0969 41.1032 38.8906 41.1032 39.9969 39.9969C41.1032 38.8906 41.1032 37.0969 39.9969 35.9906L33.5031 29.4969C28.8104 24.8042 28.8104 17.1958 33.5031 12.5031L39.9969 6.00941C41.1032 4.90311 41.1032 3.10944 39.9969 2.00314Z" fill="white"/></svg>',
            'label' => 'koduleht',
            'description' => 'brändi nägu ja mainekujundaja'
        ],
        [
            'icon_svg' => '<svg viewBox="0 0 42 42" fill="none"><path d="M20.8906 41.7803L14.917 27.6758L20.8896 30.3936L27.4229 27.4209L20.8906 41.7803ZM12.043 20.8896L14.917 27.6758L0 20.8896L14.6748 14.6738L12.043 20.8896ZM41.7793 20.8896L27.4229 27.4209L30.3945 20.8896L27.6768 14.917L41.7793 20.8896ZM27.6768 14.917L20.8896 12.043L14.6748 14.6738L20.8906 0L27.6768 14.917Z" fill="white"/></svg>',
            'label' => 'e-pood',
            'description' => 'müügi- ja konversioonimasin'
        ],
        [
            'icon_svg' => '<svg viewBox="0 0 42 42" fill="none"><path d="M26.0889 8.71533L31.7949 3.01025L38.9912 10.2065L33.2861 15.9106L41.3535 15.9116V26.0884H33.9561L39.377 31.1226L32.4512 38.5796L26.0889 32.6704V41.354H15.9121V33.2847L10.2061 38.9907L3.00977 31.7944L8.71582 26.0884H0.645508V15.9106H8.04297L2.62305 10.8774L9.54883 3.42041L15.9121 9.32959V0.645996H26.0889V8.71533Z" fill="white"/></svg>',
            'label' => 'veebiarendus',
            'description' => 'tervik, mis ühendab mõlemad'
        ]
    ];
}

// Default links if empty
if (empty($links)) {
    $links = [
        ['text' => 'Vaata kodulehtede arendust', 'url' => '#'],
        ['text' => 'Vaata e-poe arendust', 'url' => '#']
    ];
}

// Block attributes
$anchor = !empty($block['anchor']) ? 'id="' . esc_attr($block['anchor']) . '"' : '';
$class_name = 'block-1vs2';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Process title with highlight
function process_title_with_highlight($title, $highlight) {
    if (empty($highlight)) {
        return esc_html($title);
    }
    
    $parts = explode($highlight, $title);
    $output = '';
    
    foreach ($parts as $index => $part) {
        $output .= '<span>' . esc_html($part) . '</span>';
        if ($index < count($parts) - 1) {
            $output .= '<span class="highlight">' . esc_html($highlight) . '</span>';
        }
    }
    
    return $output;
}
?>

<section <?php echo $anchor; ?> class="<?php echo esc_attr($class_name); ?>">
    <div class="block-1vs2__container">
        <div class="block-1vs2__content">
            <!-- Header Section -->
            <div class="block-1vs2__header">
                <p class="block-1vs2__title">
                    <?php echo process_title_with_highlight($title, $title_highlight); ?>
                </p>
                <?php if (!empty($subtitle)): ?>
                    <p class="block-1vs2__subtitle">
                        <?php echo esc_html($subtitle); ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Cards Section -->
            <?php if (!empty($cards)): ?>
                <div class="block-1vs2__cards">
                    <?php foreach ($cards as $card): ?>
                        <div class="block-1vs2__card">
                            <div class="block-1vs2__card-border"></div>
                            <div class="block-1vs2__card-content">
                                <?php if (!empty($card['icon_svg'])): ?>
                                    <div class="block-1vs2__card-icon">
                                        <?php echo $card['icon_svg']; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="block-1vs2__card-text">
                                    <?php if (!empty($card['label'])): ?>
                                        <p class="block-1vs2__card-label">
                                            <?php echo esc_html($card['label']); ?>
                                        </p>
                                    <?php endif; ?>
                                    <?php if (!empty($card['description'])): ?>
                                        <p class="block-1vs2__card-description">
                                            <?php echo esc_html($card['description']); ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- Links Section -->
            <?php if (!empty($links)): ?>
                <div class="block-1vs2__links">
                    <?php foreach ($links as $link): ?>
                        <a href="<?php echo esc_url($link['url'] ?? '#'); ?>" class="block-1vs2__link">
                            <span><?php echo esc_html($link['text'] ?? ''); ?></span>
                            <div class="block-1vs2__arrow-icon">
                                <svg viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect fill="white" width="26" height="26"/>
                                    <path d="M8.9375 13H17.0625" stroke="black" stroke-width="1.15104" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M13.8125 9.75L17.0625 13L13.8125 16.25" stroke="black" stroke-width="1.15104" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

