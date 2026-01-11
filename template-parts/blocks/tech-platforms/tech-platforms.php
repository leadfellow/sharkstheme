<?php
/**
 * Technology & Platforms Block Template
 * Comparison table with filtering functionality
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$title = get_field('title') ?: 'TEHNOLOOGIA & PLATVORMID';
$subtitle = get_field('subtitle') ?: 'WordPress, WooCommerce, Shopify, Laravel, Node.js, Framer. Milline valida?';
$show_icons = get_field('show_icons');
$filters = get_field('filters');
$platforms = get_field('platforms');

// Default filters if empty
if (empty($filters)) {
    $filters = [
        ['label' => 'Koduleht', 'value' => 'koduleht'],
        ['label' => 'E-pood', 'value' => 'epood'],
        ['label' => 'Mõlemale', 'value' => 'molemale']
    ];
}

// Default platforms if empty
if (empty($platforms)) {
    $platforms = [
        [
            'name' => 'WordPress',
            'category' => 'koduleht',
            'suitability' => "Ideaalne blogidele ja sisupõhistele lehtedele\nSobib e-poodidele (WooCommerce)\nParim valik, kui soovid palju kontrolli",
            'strengths' => "Tohutult palju teemasid ja pluginaid\nOdav hostingu lahendus\nLai kogukond ja toe võimalused\nSEO-sõbralik",
            'limitations' => "Vajab rohkem hooldust (uuendused, turvalisus)\nVõib olla aeglasem, kui pole optimeeritud\nNõuab tehnilisi teadmisi kohandamiseks"
        ],
        [
            'name' => 'Framer',
            'category' => 'koduleht',
            'suitability' => "Suurepärane visuaalselt kaunite lehtede jaoks\nIdeaalne portfoliodele ja väikestele kodulehtedele\nVähem sobiv keerukatele e-poodidele",
            'strengths' => "Lihtne kasutada, visuaalne disainer\nKiire ja moodne kujundus\nHea jõudlus ja kiirus\nEi vaja hooldust",
            'limitations' => "Piiratud pluginad ja integratsioonid\nKallim pikaajalises perspektiivis\nVähem kontrolli tehnilise kohandamise üle"
        ]
    ];
}

// Block attributes
$anchor = sharks_get_block_anchor($block, 'tech-platforms');
$class_name = 'block-tech-platforms';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Helper function to convert textarea to list items
function tech_platforms_textarea_to_list($text) {
    if (empty($text)) {
        return '';
    }
    
    $lines = array_filter(array_map('trim', explode("\n", $text)));
    if (empty($lines)) {
        return '';
    }
    
    $output = '<ul>';
    foreach ($lines as $line) {
        $output .= '<li>' . esc_html($line) . '</li>';
    }
    $output .= '</ul>';
    
    return $output;
}
?>

<section id="<?php echo esc_attr($anchor); ?>" class="<?php echo esc_attr($class_name); ?>">
    <div class="block-tech-platforms__container">
        <!-- Header -->
        <div class="block-tech-platforms__header">
            <?php if ($show_icons): ?>
                <div class="block-tech-platforms__icon">
                    <svg viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M38.5117 12.865L46.9346 4.44214L57.5576 15.0652L49.1348 23.488H61.0459V38.5115H50.126L58.1279 45.9431L47.9043 56.9509L38.5117 48.2273V61.0466H23.4883V49.1345L15.0654 57.5574L4.44336 46.9343L12.8662 38.5115H0.953125V23.488H11.875L3.87305 16.0564L14.0967 5.04858L23.4883 13.7703V0.953857H38.5117V12.865Z" fill="black"/>
                    </svg>
                </div>
            <?php endif; ?>
            
            <h2 class="block-tech-platforms__title">
                <?php echo esc_html($title); ?>
            </h2>
            
            <?php if ($show_icons): ?>
                <div class="block-tech-platforms__icon">
                    <svg viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M59.043 2.95701C57.4099 1.3239 54.7621 1.3239 53.129 2.95701L43.543 12.543C36.6157 19.4703 25.3843 19.4703 18.457 12.543L8.87103 2.95701C7.23792 1.3239 4.59012 1.3239 2.95701 2.95701C1.3239 4.59012 1.3239 7.23792 2.95701 8.87103L12.543 18.457C19.4703 25.3843 19.4703 36.6157 12.543 43.543L2.95701 53.129C1.3239 54.7621 1.3239 57.4099 2.95701 59.043C4.59012 60.6761 7.23792 60.6761 8.87103 59.043L18.457 49.457C25.3843 42.5297 36.6157 42.5297 43.543 49.457L53.129 59.043C54.7621 60.6761 57.4099 60.6761 59.043 59.043C60.6761 57.4099 60.6761 54.7621 59.043 53.129L49.457 43.543C42.5297 36.6157 42.5297 25.3843 49.457 18.457L59.043 8.87103C60.6761 7.23792 60.6761 4.59012 59.043 2.95701Z" fill="black"/>
                    </svg>
                </div>
            <?php endif; ?>
        </div>

        <!-- Subtitle -->
        <?php if (!empty($subtitle)): ?>
            <p class="block-tech-platforms__subtitle">
                <?php echo esc_html($subtitle); ?>
            </p>
        <?php endif; ?>

        <!-- Filters -->
        <?php if (!empty($filters)): ?>
            <div class="block-tech-platforms__filters">
                <?php foreach ($filters as $index => $filter): ?>
                    <button 
                        class="block-tech-platforms__filter-btn<?php echo $index === 0 ? ' active' : ''; ?>" 
                        data-filter="<?php echo esc_attr($filter['value']); ?>"
                    >
                        <?php echo esc_html($filter['label']); ?>
                    </button>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Table -->
        <?php if (!empty($platforms)): ?>
            <div class="block-tech-platforms__table-container">
                <table class="block-tech-platforms__table">
                    <thead>
                        <tr>
                            <th>Platvorm</th>
                            <th>Sobivus</th>
                            <th>Tugevused</th>
                            <th>Piirangud</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($platforms as $platform): ?>
                            <tr class="block-tech-platforms__row" data-category="<?php echo esc_attr($platform['category']); ?>">
                                <td class="block-tech-platforms__platform-name">
                                    <?php echo esc_html($platform['name']); ?>
                                </td>
                                <td>
                                    <?php echo tech_platforms_textarea_to_list($platform['suitability']); ?>
                                </td>
                                <td>
                                    <?php echo tech_platforms_textarea_to_list($platform['strengths']); ?>
                                </td>
                                <td>
                                    <?php echo tech_platforms_textarea_to_list($platform['limitations']); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</section>

