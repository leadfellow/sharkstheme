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

    // Frontpage Hero Banner Block
    acf_register_block_type([
        'name'            => 'frontpage-hero-banner',
        'title'           => __('Frontpage Hero Banner', 'sharks2025'),
        'description'     => __('Large hero banner with title, description, CTA and portfolio card', 'sharks2025'),
        'render_template' => 'template-parts/blocks/frontpage-hero-banner/frontpage-hero-banner.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'cover-image',
        'keywords'        => ['hero', 'banner', 'frontpage', 'hungry', 'success'],
        'supports'        => [
            'align'   => ['full'],
            'anchor'  => true
        ],
        'mode'            => 'preview',
        'example'         => [
            'attributes' => [
                'mode' => 'preview',
                'data' => [
                    'main_title' => 'HUNGRY FOR YOUR SUCCESS',
                    'description' => 'Choose a service, send in your request, and your design journey starts tomorrow.'
                ]
            ]
        ],
        'enqueue_assets' => function() {
            wp_enqueue_script(
                'sharks-hero-title-color-wave',
                get_template_directory_uri() . '/assets/js/hero-title-color-wave.js',
                [],
                filemtime(get_template_directory() . '/assets/js/hero-title-color-wave.js'),
                true // Load in footer
            );
        }
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

    // Specialist Block
    acf_register_block_type([
        'name'            => 'specialist',
        'title'           => __('Specialist', 'sharks2025'),
        'description'     => __('Specialist profile with heading parts, bio, image, and LinkedIn link', 'sharks2025'),
        'render_template' => 'template-parts/blocks/specialist/specialist.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'admin-users',
        'keywords'        => ['specialist', 'profile', 'team', 'bio', 'linkedin'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview'
    ]);

    // Label Bar Block
    acf_register_block_type([
        'name'            => 'label-bar',
        'title'           => __('Label Bar', 'sharks2025'),
        'description'     => __('Horizontal bar with labels and X separators, customizable colors and optional links', 'sharks2025'),
        'render_template' => 'template-parts/blocks/label-bar/label-bar.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'menu',
        'keywords'        => ['label', 'bar', 'tags', 'services', 'navigation'],
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
        'mode'            => 'preview',
        'enqueue_assets'  => function() {
            wp_enqueue_script(
                'inquiry-js',
                get_template_directory_uri() . '/assets/js/inquiry.js',
                [],
                filemtime(get_template_directory() . '/assets/js/inquiry.js'),
                true
            );
        }
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
            wp_enqueue_style(
                'ten-steps-css',
                get_template_directory_uri() . '/assets/css/30-components/ten-steps.css',
                [],
                filemtime(get_template_directory() . '/assets/css/30-components/ten-steps.css')
            );
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

    // Content with Highlighted Block
    acf_register_block_type([
        'name'            => 'content-highlighted',
        'title'           => __('Content with Highlighted', 'sharks2025'),
        'description'     => __('Content section with icon and highlighted text in brackets', 'sharks2025'),
        'render_template' => 'template-parts/blocks/content-highlighted/content-highlighted.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'editor-textcolor',
        'keywords'        => ['content', 'highlighted', 'text', 'icon', 'brackets', 'color'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview'
    ]);

    // How to Start Block
    acf_register_block_type([
        'name'            => 'how-to-start',
        'title'           => __('How to Start', 'sharks2025'),
        'description'     => __('Two-column section with light and dark sides, icons, and tabs', 'sharks2025'),
        'render_template' => 'template-parts/blocks/how-to-start/how-to-start.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'columns',
        'keywords'        => ['how', 'start', 'two-column', 'split', 'tabs', 'icons'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true
        ],
        'mode'            => 'preview'
    ]);

    // Table 2 Block
    acf_register_block_type([
        'name'            => 'table-2',
        'title'           => __('Table 2', 'sharks2025'),
        'description'     => __('Simple table with customizable colors and flexible columns', 'sharks2025'),
        'render_template' => 'template-parts/blocks/table-2/table-2.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'table-row-after',
        'keywords'        => ['table', 'comparison', 'columns', 'rows', 'data'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview'
    ]);

    // Two Box CTA Block
    acf_register_block_type([
        'name'            => 'two-box-cta',
        'title'           => __('Two Box CTA', 'sharks2025'),
        'description'     => __('Two side-by-side cards with icons, features/text and CTA buttons', 'sharks2025'),
        'render_template' => 'template-parts/blocks/two-box-cta/two-box-cta.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'columns',
        'keywords'        => ['two', 'box', 'cta', 'cards', 'comparison', 'features'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview'
    ]);

    // What Includes Block
    acf_register_block_type([
        'name'            => 'what-includes',
        'title'           => __('What Includes', 'sharks2025'),
        'description'     => __('Features list with customizable title and column split', 'sharks2025'),
        'render_template' => 'template-parts/blocks/what-includes/what-includes.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'editor-ul',
        'keywords'        => ['what', 'includes', 'features', 'list', 'columns'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview'
    ]);

    // Two Tab Right Block
    acf_register_block_type([
        'name'            => 'two-tab-right',
        'title'           => __('Two Tab Right', 'sharks2025'),
        'description'     => __('Interactive layout with left content panel and two hoverable tabs on right', 'sharks2025'),
        'render_template' => 'template-parts/blocks/two-tab-right/two-tab-right.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'layout',
        'keywords'        => ['two', 'tab', 'tabs', 'hover', 'interactive', 'panels'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true
        ],
        'mode'            => 'preview'
    ]);

    // Who We Are Block
    acf_register_block_type([
        'name'            => 'who-we-are',
        'title'           => __('Who We Are', 'sharks2025'),
        'description'     => __('About section with sidebar title, heading, description and read more link', 'sharks2025'),
        'render_template' => 'template-parts/blocks/who-we-are/who-we-are.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'groups',
        'keywords'        => ['who', 'we', 'are', 'about', 'kes', 'me', 'oleme'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview'
    ]);

    // Our Facts Block
    acf_register_block_type([
        'name'            => 'our-facts',
        'title'           => __('Our Facts', 'sharks2025'),
        'description'     => __('Facts section with hero title, description, CTA and statistics cards', 'sharks2025'),
        'render_template' => 'template-parts/blocks/our-facts/our-facts.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'chart-bar',
        'keywords'        => ['facts', 'statistics', 'stats', 'numbers', 'achievements'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview',
        'enqueue_assets'  => function() {
            wp_enqueue_script(
                'our-facts-counter-js',
                get_template_directory_uri() . '/assets/js/our-facts-counter.js',
                [],
                SHARKS_VERSION,
                true
            );
        }
    ]);

    // Max Accordion Block
    acf_register_block_type([
        'name'            => 'max-accordion',
        'title'           => __('Max Accordion', 'sharks2025'),
        'description'     => __('Expandable accordion with numbered sections, description and service links', 'sharks2025'),
        'render_template' => 'template-parts/blocks/max-accordion/max-accordion.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'list-view',
        'keywords'        => ['accordion', 'services', 'expandable', 'collapse', 'sections'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin']
        ],
        'mode'            => 'preview',
        'enqueue_assets'  => function() {
            wp_enqueue_script(
                'max-accordion-js',
                get_template_directory_uri() . '/assets/js/max-accordion.js',
                [],
                filemtime(get_template_directory() . '/assets/js/max-accordion.js'),
                true
            );
        }
    ]);

    // Portfolio Block
    acf_register_block_type([
        'name'              => 'portfolio',
        'title'             => __('Portfolio / Tehtud Tööd', 'sharks2025'),
        'description'       => __('Filterable portfolio grid with categories', 'sharks2025'),
        'render_template'   => 'template-parts/blocks/portfolio/portfolio.php',
        'category'          => 'sharks-blocks',
        'icon'              => 'portfolio',
        'keywords'          => ['portfolio', 'gallery', 'work', 'tehtud tööd', 'filter'],
        'supports'          => [
            'align' => ['wide', 'full'],
            'mode' => true,
            'jsx' => true
        ],
        'enqueue_assets' => function() {
            wp_enqueue_script(
                'portfolio-js',
                get_template_directory_uri() . '/assets/js/portfolio.js',
                [],
                filemtime(get_template_directory() . '/assets/js/portfolio.js'),
                true
            );
        }
    ]);

    // Works5 Block
    acf_register_block_type([
        'name'            => 'works5',
        'title'           => __('Works5', 'sharks2025'),
        'description'     => __('Display 5 projects with customizable heading and colors (2 large + 3 small)', 'sharks2025'),
        'render_template' => 'template-parts/blocks/works5/works5.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'images-alt2',
        'keywords'        => ['works', 'projects', 'portfolio', 'gallery', '5', 'veebiprojektid'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview',
        'enqueue_assets'  => function() {
            wp_enqueue_script(
                'works5-js',
                get_template_directory_uri() . '/assets/js/works5.js',
                [],
                filemtime(get_template_directory() . '/assets/js/works5.js'),
                true
            );
        }
    ]);

    // Works3 Block
    acf_register_block_type([
        'name'            => 'works3',
        'title'           => __('Works3', 'sharks2025'),
        'description'     => __('Display 3 success story cards with customizable heading and colors', 'sharks2025'),
        'render_template' => 'template-parts/blocks/works3/works3.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'grid-view',
        'keywords'        => ['works', 'success', 'stories', 'cards', '3', 'edulood', 'turundus'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview',
        'enqueue_assets'  => function() {
            wp_enqueue_script(
                'works3-js',
                get_template_directory_uri() . '/assets/js/works3.js',
                [],
                filemtime(get_template_directory() . '/assets/js/works3.js'),
                true
            );
        }
    ]);

    // Works1 Block
    acf_register_block_type([
        'name'            => 'works1',
        'title'           => __('Works1', 'sharks2025'),
        'description'     => __('Display 1 large project image with customizable heading and colors', 'sharks2025'),
        'render_template' => 'template-parts/blocks/works1/works1.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'format-image',
        'keywords'        => ['works', 'project', 'image', '1', 'laptop', 'mockup', 'ux', 'ui'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview'
    ]);

    // Comparison Block (1vs2)
    acf_register_block_type([
        'name'            => 'comparison-1vs2',
        'title'           => __('Comparison (1vs2)', 'sharks2025'),
        'description'     => __('Comparison block with cards (e.g., Koduleht vs E-pood)', 'sharks2025'),
        'render_template' => 'template-parts/blocks/1vs2/1vs2.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'columns',
        'keywords'        => ['comparison', 'vs', 'versus', 'cards', 'koduleht', 'e-pood', '1vs2'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin']
        ],
        'mode'            => 'preview'
    ]);

    // Technology & Platforms Block
    acf_register_block_type([
        'name'            => 'tech-platforms',
        'title'           => __('Technology & Platforms', 'sharks2025'),
        'description'     => __('Technology comparison table with filtering', 'sharks2025'),
        'render_template' => 'template-parts/blocks/tech-platforms/tech-platforms.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'editor-table',
        'keywords'        => ['technology', 'platforms', 'table', 'comparison', 'filter', 'tehnoloogia'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin']
        ],
        'mode'            => 'preview',
        'enqueue_assets'  => function() {
            wp_enqueue_script(
                'tech-platforms-js',
                get_template_directory_uri() . '/assets/js/tech-platforms.js',
                [],
                SHARKS_VERSION,
                true
            );
        }
    ]);

    // Blog Posts Block
    acf_register_block_type([
        'name'            => 'blog-posts',
        'title'           => __('Blog Posts', 'sharks2025'),
        'description'     => __('Display blog posts with category filter and pagination/infinite scroll', 'sharks2025'),
        'render_template' => 'template-parts/blocks/blog-posts/blog-posts.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'admin-post',
        'keywords'        => ['blog', 'posts', 'articles', 'news', 'blogi', 'postitused'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin']
        ],
        'mode'            => 'preview',
        'enqueue_assets'  => function() {
            wp_enqueue_script(
                'blog-posts-js',
                get_template_directory_uri() . '/assets/js/blog-posts.js',
                [],
                filemtime(get_template_directory() . '/assets/js/blog-posts.js'),
                true
            );
            wp_localize_script('blog-posts-js', 'blogPostsAjax', [
                'ajaxurl' => admin_url('admin-ajax.php'),
                'nonce'   => wp_create_nonce('blog_posts_nonce')
            ]);
        }
    ]);

    // Why Sharks Block
    acf_register_block_type([
        'name'            => 'why-sharks',
        'title'           => __('Why Sharks', 'sharks2025'),
        'description'     => __('Why choose Marketing Sharks section with title and 5 numbered cards', 'sharks2025'),
        'render_template' => 'template-parts/blocks/why-sharks/why-sharks.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'awards',
        'keywords'        => ['why', 'sharks', 'about', 'features', 'benefits', 'meist'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview'
    ]);

    // Why Sharks 2 Block (with icons)
    acf_register_block_type([
        'name'            => 'why-sharks-2',
        'title'           => __('Why Sharks 2 (Icons)', 'sharks2025'),
        'description'     => __('Why choose Marketing Sharks section with icons - dark background version', 'sharks2025'),
        'render_template' => 'template-parts/blocks/why-sharks-2/why-sharks-2.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'star-filled',
        'keywords'        => ['why', 'sharks', 'about', 'features', 'benefits', 'icons', 'miks valida'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview'
    ]);

    // Team Block
    acf_register_block_type([
        'name'            => 'team',
        'title'           => __('Team', 'sharks2025'),
        'description'     => __('Team section with customizable heading and team member cards with hover effects', 'sharks2025'),
        'render_template' => 'template-parts/blocks/team/team.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'groups',
        'keywords'        => ['team', 'meeskond', 'people', 'staff', 'members', 'inimesed'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview'
    ]);

    // Why We Block
    acf_register_block_type([
        'name'            => 'why-we',
        'title'           => __('Why We', 'sharks2025'),
        'description'     => __('Miks meie blokk koos animeeritud numbritega', 'sharks2025'),
        'render_template' => 'template-parts/blocks/why-we.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'chart-line',
        'keywords'        => ['why we', 'statistics', 'stats', 'numbrid', 'miks meie'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview',
        'enqueue_assets'  => function() {
            wp_enqueue_script(
                'why-we-js',
                get_template_directory_uri() . '/assets/js/why-we.js',
                [],
                filemtime(get_template_directory() . '/assets/js/why-we.js'),
                true
            );
        }
    ]);

    // Wide Picture Block
    acf_register_block_type([
        'name'            => 'wide-picture',
        'title'           => __('Wide Picture', 'sharks2025'),
        'description'     => __('Full-width image with optional caption and customizable spacing', 'sharks2025'),
        'render_template' => 'template-parts/blocks/wide-picture/wide-picture.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'format-image',
        'keywords'        => ['picture', 'image', 'photo', 'wide', 'full', 'pilt', 'foto'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview'
    ]);

    // Four Steps Block
    acf_register_block_type([
        'name'            => 'four-steps',
        'title'           => __('Four Steps', 'sharks2025'),
        'description'     => __('Four steps section with customizable header icons, card with icon and steps list', 'sharks2025'),
        'render_template' => 'template-parts/blocks/four-steps/four-steps.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'editor-ol-rtl',
        'keywords'        => ['steps', 'process', 'neli', 'sammud', 'eduni', 'four'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview',
        'enqueue_assets'  => function() {
            wp_enqueue_script(
                'four-steps-js',
                get_template_directory_uri() . '/assets/js/four-steps.js',
                [],
                filemtime(get_template_directory() . '/assets/js/four-steps.js'),
                true
            );
        }
    ]);

    // Experience Block
    acf_register_block_type([
        'name'            => 'experience',
        'title'           => __('Experience', 'sharks2025'),
        'description'     => __('Experience section with headline, feature items, CTA button and images', 'sharks2025'),
        'render_template' => 'template-parts/blocks/experience/experience.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'star-filled',
        'keywords'        => ['experience', 'features', 'kogemus', 'benefits', 'cta'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview'
    ]);

    // Certificates Block
    acf_register_block_type([
        'name'            => 'certificates',
        'title'           => __('Certificates', 'sharks2025'),
        'description'     => __('Competencies and certificates section with grid layout', 'sharks2025'),
        'render_template' => 'template-parts/blocks/certificates/certificates.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'awards',
        'keywords'        => ['certificates', 'sertifikaadid', 'competence', 'kompetents', 'skills'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview',
        'enqueue_assets'  => function() {
            wp_enqueue_script(
                'certificates-js',
                get_template_directory_uri() . '/assets/js/certificates.js',
                [],
                filemtime(get_template_directory() . '/assets/js/certificates.js'),
                true
            );
        }
    ]);

    // Progress Block
    acf_register_block_type([
        'name'            => 'progress',
        'title'           => __('Progress', 'sharks2025'),
        'description'     => __('Accordion-style progress/process section with expandable items', 'sharks2025'),
        'render_template' => 'template-parts/blocks/progress/progress.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'list-view',
        'keywords'        => ['progress', 'process', 'protsess', 'accordion', 'steps', 'sammud'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview',
        'enqueue_assets'  => function() {
            wp_enqueue_style(
                'progress-css',
                get_template_directory_uri() . '/assets/css/progress.css',
                [],
                filemtime(get_template_directory() . '/assets/css/progress.css')
            );
            wp_enqueue_script(
                'progress-js',
                get_template_directory_uri() . '/assets/js/progress.js',
                [],
                filemtime(get_template_directory() . '/assets/js/progress.js'),
                true
            );
        }
    ]);

    // Portfolio1 Block
    acf_register_block_type([
        'name'            => 'portfolio1',
        'title'           => __('Portfolio1 (Auto-scroll)', 'sharks2025'),
        'description'     => __('Portfolio items with category filtering and auto-scrolling tall images on hover', 'sharks2025'),
        'render_template' => 'template-parts/blocks/portfolio1/portfolio1.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'portfolio',
        'keywords'        => ['portfolio', 'auto-scroll', 'scrollable', 'projects', 'case studies', 'tööd', 'filter'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview',
        'enqueue_assets'  => function() {
            wp_enqueue_style(
                'portfolio1-css',
                get_template_directory_uri() . '/assets/css/portfolio1.css',
                [],
                filemtime(get_template_directory() . '/assets/css/portfolio1.css')
            );
            wp_enqueue_script(
                'portfolio1-js',
                get_template_directory_uri() . '/assets/js/portfolio1.js',
                [],
                filemtime(get_template_directory() . '/assets/js/portfolio1.js'),
                true
            );
        }
    ]);

    // Roll Process Block
    acf_register_block_type([
        'name'            => 'roll-process',
        'title'           => __('Roll Process', 'sharks2025'),
        'description'     => __('Process section with main title, dividers, and hover effects that transform text to uppercase', 'sharks2025'),
        'render_template' => 'template-parts/blocks/roll-process/roll-process.php',
        'category'        => 'sharks-blocks',
        'icon'            => 'editor-ol',
        'keywords'        => ['process', 'roll', 'protsess', 'steps', 'timeline', 'divider', 'hover'],
        'supports'        => [
            'align'   => ['wide', 'full'],
            'anchor'  => true,
            'spacing' => ['padding', 'margin'],
            'color'   => ['background']
        ],
        'mode'            => 'preview',
        'enqueue_assets'  => function() {
            wp_enqueue_script(
                'roll-process-js',
                get_template_directory_uri() . '/assets/js/roll-process.js',
                [],
                filemtime(get_template_directory() . '/assets/js/roll-process.js'),
                true
            );
        }
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

/**
 * Helper function to get block anchor
 * 
 * @param array $block Block data
 * @param string $default_prefix Default prefix for auto-generated anchor
 * @return string Clean anchor ID
 */
function sharks_get_block_anchor($block, $default_prefix = 'block') {
    $anchor = '';
    
    // 1. Try to get custom anchor from ACF field
    $custom_anchor = get_field('block_anchor');
    if (!empty($custom_anchor)) {
        $anchor = $custom_anchor;
    }
    // 2. Try to get from block attributes (Gutenberg Advanced)
    elseif (!empty($block['anchor'])) {
        $anchor = $block['anchor'];
    }
    // 3. Generate default anchor
    else {
        $anchor = $default_prefix . '-' . $block['id'];
    }
    
    // Clean the anchor
    $anchor = strtolower(trim($anchor));
    $anchor = str_replace('#', '', $anchor);
    $anchor = preg_replace('/[^a-z0-9\-_]/', '-', $anchor);
    
    return $anchor;
}

/**
 * Get block class name with mobile visibility
 * 
 * @param array $block Block data
 * @param string $base_class Base class name for the block
 * @return string Complete class name with mobile visibility if needed
 */
function sharks_get_block_class($block, $base_class) {
    $class_name = $base_class;
    
    // Add custom className if exists
    if (!empty($block['className'])) {
        $class_name .= ' ' . $block['className'];
    }
    
    // Add mobile visibility class
    $mobile_class = sharks_get_mobile_visibility_class();
    if ($mobile_class) {
        $class_name .= ' ' . $mobile_class;
    }
    
    return $class_name;
}
