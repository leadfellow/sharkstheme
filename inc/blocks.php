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

    // Case Story Block
    acf_register_block_type([
        'name'            => 'case-story',
        'title'           => __('Case Story', 'sharks2025'),
        'description'     => __('Flexible case study with 7 cards, stats table and images', 'sharks2025'),
        'render_template' => 'template-parts/blocks/case-story/case-story.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'media-document',
        'keywords'        => ['case', 'story', 'success', 'cards', 'stats', 'results'],
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

    // Closed Accordion Block
    acf_register_block_type([
        'name'            => 'closed-accordion',
        'title'           => __('Closed Accordion', 'sharks2025'),
        'description'     => __('Non-clickable list styled like an accordion', 'sharks2025'),
        'render_template' => 'template-parts/blocks/closed-accordion/closed-accordion.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'editor-ol',
        'keywords'        => ['list', 'closed', 'accordion', 'static', 'numbered'],
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

    // Why That Block
    acf_register_block_type([
        'name'            => 'why-that',
        'title'           => __('Why That', 'sharks2025'),
        'description'     => __('Why section with title and 3 feature cards with icons', 'sharks2025'),
        'render_template' => 'template-parts/blocks/why-that/why-that.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'star-half',
        'keywords'        => ['why', 'features', 'cards', 'benefits', 'reasons'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview',
        'enqueue_assets'  => function() {
            wp_enqueue_script(
                'why-that-js',
                get_template_directory_uri() . '/assets/js/why-that.js',
                [],
                filemtime(get_template_directory() . '/assets/js/why-that.js'),
                true
            );
        }
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

    // Content Grey Block
    acf_register_block_type([
        'name'            => 'content-grey',
        'title'           => __('Content Grey', 'sharks2025'),
        'description'     => __('Two-column content section with heading parts, subtitle, content text, and optional CTA/image', 'sharks2025'),
        'render_template' => 'template-parts/blocks/content-grey/content-grey.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'columns',
        'keywords'        => ['content', 'grey', 'heading', 'icons', 'two column', 'cta'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview'
    ]);

    // Service Cards Block
    acf_register_block_type([
        'name'            => 'service-cards',
        'title'           => __('Service Cards', 'sharks2025'),
        'description'     => __('Grid of 4-10 service cards with hover effects, heading parts, and intro text', 'sharks2025'),
        'render_template' => 'template-parts/blocks/service-cards/service-cards.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'grid-view',
        'keywords'        => ['service', 'cards', 'grid', 'hover', 'seo'],
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

    // Inquiry 2 Block (Static Title)
    acf_register_block_type([
        'name'            => 'inquiry-2',
        'title'           => __('Inquiry 2 (Static)', 'sharks2025'),
        'description'     => __('Contact inquiry with static title - no scrolling animation', 'sharks2025'),
        'render_template' => 'template-parts/blocks/inquiry-2/inquiry-2.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'email-alt2',
        'keywords'        => ['inquiry', 'contact', 'form', 'cf7', 'static', 'saada päring'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview'
    ]);

    // Consultation Block
    acf_register_block_type([
        'name'            => 'consultation',
        'title'           => __('Consultation', 'sharks2025'),
        'description'     => __('Consultation CTA with heading, text and button', 'sharks2025'),
        'render_template' => 'template-parts/blocks/consultation/consultation.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'admin-comments',
        'keywords'        => ['consultation', 'cta', 'button', 'konsultatsioon'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview'
    ]);

    // Ten Steps Block
    acf_register_block_type([
        'name'            => 'ten-steps',
        'title'           => __('10 Steps', 'sharks2025'),
        'description'     => __('10 steps carousel with navigation arrows', 'sharks2025'),
        'render_template' => 'template-parts/blocks/ten-steps/ten-steps.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'slides',
        'keywords'        => ['steps', 'process', 'carousel', '10 sammu'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview',
        'enqueue_assets'  => function() {
            wp_enqueue_script(
                'ten-steps-js',
                get_template_directory_uri() . '/assets/js/ten-steps.js',
                [],
                filemtime(get_template_directory() . '/assets/js/ten-steps.js'),
                true
            );
        }
    ]);

    // Heading Half Block
    acf_register_block_type([
        'name'            => 'heading-half',
        'title'           => __('Heading Half', 'sharks2025'),
        'description'     => __('Half-width heading with colored words and icons', 'sharks2025'),
        'render_template' => 'template-parts/blocks/heading-half/heading-half.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'format-aside',
        'keywords'        => ['heading', 'half', 'icons', 'colors', 'pealkiri'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview'
    ]);

    // Select Text Block
    acf_register_block_type([
        'name'            => 'select-text',
        'title'           => __('Select Text (Tabs)', 'sharks2025'),
        'description'     => __('Tabbed content block with icon and custom backgrounds', 'sharks2025'),
        'render_template' => 'template-parts/blocks/select-text/select-text.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'table-col-after',
        'keywords'        => ['select', 'text', 'tabs', 'tabbed', 'toggle', 'icon'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview'
    ]);

    // Sharks Heading 2 Block
    acf_register_block_type([
        'name'            => 'sharks-heading-2',
        'title'           => __('Sharks Heading 2', 'sharks2025'),
        'description'     => __('Advanced heading with colored words, SVG icons and right-aligned paragraphs', 'sharks2025'),
        'render_template' => 'template-parts/blocks/sharks-heading-2/sharks-heading-2.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'editor-textcolor',
        'keywords'        => ['heading', 'title', 'svg', 'icon', 'color', 'sharks'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview'
    ]);

    // Spacer Block
    acf_register_block_type([
        'name'            => 'spacer',
        'title'           => __('Spacer', 'sharks2025'),
        'description'     => __('Add vertical spacing with optional background color', 'sharks2025'),
        'render_template' => 'template-parts/blocks/spacer/spacer.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'minus',
        'keywords'        => ['spacer', 'spacing', 'gap', 'margin', 'padding'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true
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
