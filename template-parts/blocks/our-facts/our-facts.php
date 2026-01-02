<?php
/**
 * Our Facts Block Template
 * Facts section with hero title, description, CTA and statistics cards
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$hero_title = get_field('hero_title') ?: 'Paneme 13+ aastat turunduskogemust sinu äri jaoks tööle.';
$description = get_field('description') ?: 'Meie turunduspaketid võivad järgmiseks käivitada just sinu äri. Marketing Sharksi tugevus on kvaliteetne kollektiiv, kes pingutab ka siis, kui teised alla annavad. Oleme partner, kes lähtub alati kliendist ja pakub tervikliku lahenduse.';
$cta_text = get_field('cta_text') ?: 'Kas oled koostööks valmis? Hüppa pardale!';
$cta_url = get_field('cta_url') ?: '#';
$stats = get_field('stats');

// Default stats if empty
if (empty($stats)) {
    $stats = [
        ['number' => '95%', 'description' => 'klientidest soovitavad meid edasi'],
        ['number' => '250+', 'description' => 'kodulehekülge ja e-poodi'],
        ['number' => '50', 'description' => 'Igapäevast turundusklienti'],
        ['number' => '13', 'description' => 'aastat kogemust']
    ];
}

// Block attributes
$anchor = !empty($block['anchor']) ? 'id="' . esc_attr($block['anchor']) . '"' : '';
$class_name = 'block-our-facts';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}
?>

<section <?php echo $anchor; ?> class="<?php echo esc_attr($class_name); ?>">
    <div class="block-our-facts__container">
        <!-- Hero Section -->
        <div class="block-our-facts__hero">
            <h2 class="block-our-facts__hero-title">
                <?php echo esc_html($hero_title); ?>
            </h2>
            
            <div class="block-our-facts__hero-content">
                <p class="block-our-facts__description">
                    <?php echo esc_html($description); ?>
                </p>
                
                <a href="<?php echo esc_url($cta_url); ?>" class="block-our-facts__cta">
                    <span><?php echo esc_html($cta_text); ?></span>
                    <div class="block-our-facts__arrow-icon">
                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="26" height="26" fill="black"/>
                            <path d="M8.9375 13H17.0625" stroke="white" stroke-width="1.15104" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M13.8125 8.9375L17.875 13L13.8125 17.0625" stroke="white" stroke-width="1.15104" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </a>
            </div>

            <!-- X Icon -->
            <div class="block-our-facts__x-icon">
                <svg width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M31 0L36.9294 25.0706L62 31L36.9294 36.9294L31 62L25.0706 36.9294L0 31L25.0706 25.0706L31 0Z" fill="black"/>
                </svg>
            </div>
        </div>

        <!-- Stats Section -->
        <?php if (!empty($stats)): ?>
            <div class="block-our-facts__stats">
                <?php foreach ($stats as $stat): ?>
                    <div class="block-our-facts__stat-card">
                        <div class="block-our-facts__stat-number">
                            <?php echo esc_html($stat['number'] ?? ''); ?>
                        </div>
                        <div class="block-our-facts__stat-divider"></div>
                        <p class="block-our-facts__stat-description">
                            <?php echo esc_html($stat['description'] ?? ''); ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

