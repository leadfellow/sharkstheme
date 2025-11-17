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

    // Accordion Block
    acf_register_block_type([
        'name'            => 'accordion',
        'title'           => __('Accordion', 'sharks2025'),
        'description'     => __('Expandable accordion with custom content', 'sharks2025'),
        'render_template' => 'template-parts/blocks/accordion/accordion.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'list-view',
        'keywords'        => ['accordion', 'collapse', 'expand', 'toggle'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview'
    ]);

    // Comparison Table Block
    acf_register_block_type([
        'name'            => 'comparison-table',
        'title'           => __('Comparison Table', 'sharks2025'),
        'description'     => __('Comparison table with multiple columns and rows', 'sharks2025'),
        'render_template' => 'template-parts/blocks/comparison-table/comparison-table.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'table-row-before',
        'keywords'        => ['table', 'comparison', 'compare', 'grid'],
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

    // Testimonials Block
    acf_register_block_type([
        'name'            => 'testimonials',
        'title'           => __('Testimonials', 'sharks2025'),
        'description'     => __('Customer testimonials carousel', 'sharks2025'),
        'render_template' => 'template-parts/blocks/testimonials/testimonials.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'format-quote',
        'keywords'        => ['testimonials', 'reviews', 'feedback', 'carousel'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview'
    ]);

    // Why Us Block
    acf_register_block_type([
        'name'            => 'why-us',
        'title'           => __('Why Us', 'sharks2025'),
        'description'     => __('Why choose us section with features and highlight box', 'sharks2025'),
        'render_template' => 'template-parts/blocks/why-us/why-us.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'star-filled',
        'keywords'        => ['why us', 'features', 'benefits', 'about'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview'
    ]);

    // Sharks Headings Block
    acf_register_block_type([
        'name'            => 'sharks-headings',
        'title'           => __('Sharks Headings', 'sharks2025'),
        'description'     => __('Custom headings with mixed colors and icons', 'sharks2025'),
        'render_template' => 'template-parts/blocks/sharks-headings/sharks-headings.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'heading',
        'keywords'        => ['heading', 'title', 'icon', 'text', 'sharks'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview'
    ]);

    // Inquiry Block
    acf_register_block_type([
        'name'            => 'inquiry',
        'title'           => __('Inquiry', 'sharks2025'),
        'description'     => __('Contact inquiry section with Contact Form 7', 'sharks2025'),
        'render_template' => 'template-parts/blocks/inquiry/inquiry.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'email-alt',
        'keywords'        => ['inquiry', 'contact', 'form', 'cf7', 'saada päring'],
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
