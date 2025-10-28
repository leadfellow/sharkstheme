<?php
/**
 * ACF Blocks registration
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register ACF Blocks
 */
add_action('acf/init', function() {
    // Check if ACF Pro is active
    if (!function_exists('acf_register_block_type')) {
        return;
    }

    // Hero Block
    acf_register_block_type([
        'name'            => 'hero',
        'title'           => __('Hero', 'sharks2025'),
        'description'     => __('Hero section with headline, text, CTA and media', 'sharks2025'),
        'render_template' => 'template-parts/blocks/hero/hero.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'cover-image',
        'keywords'        => ['hero', 'banner', 'header'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['text', 'background', 'link']
        ],
        'mode'            => 'preview',
        'example'         => [
            'attributes' => [
                'mode' => 'preview',
                'data' => [
                    'headline' => 'Welcome to Sharks 2025',
                    'subheadline' => 'Your trusted partner in success'
                ]
            ]
        ]
    ]);

    // Services Block
    acf_register_block_type([
        'name'            => 'services',
        'title'           => __('Services', 'sharks2025'),
        'description'     => __('Services grid with icons and descriptions', 'sharks2025'),
        'render_template' => 'template-parts/blocks/services/services.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'screenoptions',
        'keywords'        => ['services', 'features', 'grid'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview'
    ]);

    // Pricing Block
    acf_register_block_type([
        'name'            => 'pricing',
        'title'           => __('Pricing', 'sharks2025'),
        'description'     => __('Pricing table with multiple plans', 'sharks2025'),
        'render_template' => 'template-parts/blocks/pricing/pricing.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'money-alt',
        'keywords'        => ['pricing', 'plans', 'price'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview'
    ]);

    // CTA Block
    acf_register_block_type([
        'name'            => 'cta',
        'title'           => __('CTA', 'sharks2025'),
        'description'     => __('Call to action section', 'sharks2025'),
        'render_template' => 'template-parts/blocks/cta/cta.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'megaphone',
        'keywords'        => ['cta', 'call to action', 'button'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['text', 'background']
        ],
        'mode'            => 'preview'
    ]);

    // Contact Form Block
    acf_register_block_type([
        'name'            => 'contact-form',
        'title'           => __('Contact Form', 'sharks2025'),
        'description'     => __('Contact section with CF7 form', 'sharks2025'),
        'render_template' => 'template-parts/blocks/contact-form/contact-form.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'email',
        'keywords'        => ['contact', 'form', 'cf7'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview'
    ]);

    // Case Study Detail Block
    acf_register_block_type([
        'name'            => 'case-study-detail',
        'title'           => __('Case Study Detail', 'sharks2025'),
        'description'     => __('Single case study showcase with hero, content, and metrics', 'sharks2025'),
        'render_template' => 'template-parts/blocks/case-study-detail/case-study-detail.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'portfolio',
        'keywords'        => ['case study', 'project', 'portfolio', 'work'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview'
    ]);

    // Case Studies Grid Block
    acf_register_block_type([
        'name'            => 'case-studies-grid',
        'title'           => __('Case Studies Grid', 'sharks2025'),
        'description'     => __('Display case studies in a grid layout', 'sharks2025'),
        'render_template' => 'template-parts/blocks/case-studies-grid/case-studies-grid.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'grid-view',
        'keywords'        => ['case studies', 'portfolio', 'projects', 'grid'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview'
    ]);

    // FAQ Block
    acf_register_block_type([
        'name'            => 'faq',
        'title'           => __('FAQ', 'sharks2025'),
        'description'     => __('Frequently Asked Questions with accordion', 'sharks2025'),
        'render_template' => 'template-parts/blocks/faq/faq.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'editor-help',
        'keywords'        => ['faq', 'questions', 'accordion', 'help'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview'
    ]);
});

/**
 * Register custom block category
 */
add_filter('block_categories_all', function($categories) {
    // Add our custom category at the beginning
    array_unshift($categories, [
        'slug'  => 'sharks-blocks',
        'title' => __('Sharks Blocks', 'sharks2025'),
        'icon'  => 'admin-site-alt3',
    ]);
    
    return $categories;
}, 10, 1);
