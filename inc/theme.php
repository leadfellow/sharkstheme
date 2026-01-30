<?php
/**
 * Theme setup and supports
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme setup
 */
add_action('after_setup_theme', function() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ]);
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    add_theme_support('wp-block-styles');
    add_theme_support('editor-color-palette');
    
    // Editor styles (WP 6.8+ iframe editor)
    add_theme_support('editor-styles');
    // Load all CSS files individually (iframe doesn't support @import)
    // NOTE: site.css is NOT loaded here because it contains @import directives
    // that don't work in iframe. All components are loaded individually instead.
    add_editor_style([
        'assets/css/00-settings/variables.css',
        'assets/css/20-elements/typography.css',
        'assets/css/30-components/1vs2.css',
        'assets/css/30-components/tech-platforms.css',
        'assets/css/30-components/button.css',
        'assets/css/30-components/hero.css',
        'assets/css/30-components/card.css',
        'assets/css/30-components/services.css',
        'assets/css/30-components/pricing.css',
        'assets/css/30-components/cta.css',
        'assets/css/30-components/contact-form.css',
        'assets/css/30-components/case-study.css',
        'assets/css/30-components/accordion.css',
        'assets/css/30-components/comparison-table.css',
        'assets/css/30-components/faq.css',
        'assets/css/30-components/testimonials.css',
        'assets/css/30-components/why-sharks-2.css',
        'assets/css/30-components/content-grey.css',
        'assets/css/30-components/service-cards.css',
        'assets/css/30-components/specialist.css',
        'assets/css/30-components/label-bar.css',
        'assets/css/30-components/works5.css',
        'assets/css/30-components/works3.css',
        'assets/css/30-components/works1.css',
        'assets/css/30-components/block-styles.css',
        'assets/css/30-components/mouse-trail.css',
        'assets/css/30-components/modal.css',
        'assets/css/40-layout/grid.css',
        'assets/css/40-layout/header.css',
        'assets/css/40-layout/footer.css',
        'assets/css/40-layout/blog.css',
        'assets/css/editor.css' // Editor-specific overrides + base styles
    ]);

    // Register navigation menus
    register_nav_menus([
        'primary' => __('Primary Menu', 'sharks2025'),
        'footer' => __('Footer Menu', 'sharks2025'),
    ]);
}, 10);

/**
 * Enqueue styles and scripts
 */
add_action('wp_enqueue_scripts', function() {
    // Google Fonts - Inter (Switzer alternative) and Manrope
    wp_enqueue_style(
        'sharks-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Manrope:wght@400;500;600;700&display=swap',
        [],
        null
    );
    
    // Main stylesheet
    wp_enqueue_style(
        'sharks-site',
        get_stylesheet_directory_uri() . '/assets/css/site.css',
        ['sharks-fonts'],
        SHARKS_VERSION
    );
    
    // Modal component
    wp_enqueue_script(
        'sharks-modal',
        get_stylesheet_directory_uri() . '/assets/js/modal.js',
        [],
        SHARKS_VERSION,
        true // Load in footer
    );
    
    // Mouse trail effect (desktop only via JS check)
    wp_enqueue_script(
        'sharks-mouse-trail',
        get_stylesheet_directory_uri() . '/assets/js/mouse-trail.js',
        [],
        SHARKS_VERSION,
        true // Load in footer
    );
}, 10);

/**
 * Enqueue editor assets (for editor UI, not iframe)
 * Note: Editor iframe styles are loaded via add_editor_style() above
 */
add_action('enqueue_block_editor_assets', function() {
    // Only load editor-specific JS or styles for the editor UI here
    // Editor iframe CSS is handled by add_editor_style()
}, 10);

/**
 * Register widget areas
 */
add_action('widgets_init', function() {
    // Blog Sidebars (check if enabled in Sharks Settings)
    $enable_primary = function_exists('get_field') ? get_field('enable_primary_sidebar', 'option') : null;
    $enable_secondary = function_exists('get_field') ? get_field('enable_secondary_sidebar', 'option') : null;
    
    // Default to true if not set
    if ($enable_primary === null || $enable_primary === '') {
        $enable_primary = true;
    }
    
    if ($enable_secondary === null || $enable_secondary === '') {
        $enable_secondary = false;
    }
    
    if ($enable_primary) {
        register_sidebar([
            'name'          => __('Blog Primary Sidebar', 'sharks2025'),
            'id'            => 'blog-primary',
            'description'   => __('Main sidebar for blog posts and archives', 'sharks2025'),
            'before_widget' => '<div class="sidebar__widget widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="sidebar__widget-title widget-title">',
            'after_title'   => '</h3>',
        ]);
    }
    
    if ($enable_secondary) {
        register_sidebar([
            'name'          => __('Blog Secondary Sidebar', 'sharks2025'),
            'id'            => 'blog-secondary',
            'description'   => __('Secondary sidebar for both-sidebars layout', 'sharks2025'),
            'before_widget' => '<div class="sidebar__widget widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="sidebar__widget-title widget-title">',
            'after_title'   => '</h3>',
        ]);
    }
    
    // Footer Widgets
    register_sidebar([
        'name'          => __('Footer Widget 1', 'sharks2025'),
        'id'            => 'footer-1',
        'before_widget' => '<div class="footer__widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer__widget-title">',
        'after_title'   => '</h3>',
    ]);

    register_sidebar([
        'name'          => __('Footer Widget 2', 'sharks2025'),
        'id'            => 'footer-2',
        'before_widget' => '<div class="footer__widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer__widget-title">',
        'after_title'   => '</h3>',
    ]);

    register_sidebar([
        'name'          => __('Footer Widget 3', 'sharks2025'),
        'id'            => 'footer-3',
        'before_widget' => '<div class="footer__widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="footer__widget-title">',
        'after_title'   => '</h3>',
    ]);
});

/**
 * Enable SVG upload support
 */
add_filter('upload_mimes', function($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
});

/**
 * Check SVG file content for security
 */
add_filter('wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
    $filetype = wp_check_filetype($filename, $mimes);
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4);

/**
 * Fix SVG display in media library
 */
add_filter('wp_prepare_attachment_for_js', function($response, $attachment, $meta) {
    if ($response['mime'] === 'image/svg+xml' && empty($response['sizes'])) {
        $svg_path = get_attached_file($attachment->ID);
        if (file_exists($svg_path)) {
            $svg_content = file_get_contents($svg_path);
            // Simple sanitization - remove scripts
            $svg_content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $svg_content);
            
            // Extract dimensions from SVG viewBox or width/height
            if (preg_match('/viewBox=["\']([0-9.\s-]+)["\']/', $svg_content, $matches)) {
                $viewBox = explode(' ', $matches[1]);
                $width = isset($viewBox[2]) ? intval($viewBox[2]) : 200;
                $height = isset($viewBox[3]) ? intval($viewBox[3]) : 200;
            } elseif (preg_match('/width=["\']([0-9.]+)["\']/', $svg_content, $w_matches) && 
                      preg_match('/height=["\']([0-9.]+)["\']/', $svg_content, $h_matches)) {
                $width = intval($w_matches[1]);
                $height = intval($h_matches[1]);
            } else {
                $width = 200;
                $height = 200;
            }
            
            $response['sizes'] = [
                'full' => [
                    'url' => $response['url'],
                    'width' => $width,
                    'height' => $height,
                    'orientation' => $width > $height ? 'landscape' : 'portrait'
                ]
            ];
            $response['icon'] = $response['url'];
            $response['width'] = $width;
            $response['height'] = $height;
        }
    }
    return $response;
}, 10, 3);

/**
 * Display SVG thumbnails in media library
 */
add_action('admin_head', function() {
    echo '<style>
        .attachment-preview[class*="subtype-svg"] .thumbnail img,
        .media-modal img[src$=".svg"],
        img[src$=".svg"].attachment-post-thumbnail {
            width: 100% !important;
            height: auto !important;
        }
    </style>';
});

/**
 * Get blog layout based on Sharks Settings
 */
function sharks_get_blog_layout($context = 'single') {
    $field_name = $context === 'single' ? 'single_post_layout' : 'archive_layout';
    $layout = get_field($field_name, 'option');
    
    // Default to right sidebar if not set
    if (empty($layout)) {
        $layout = 'right-sidebar';
    }
    
    return $layout;
}

/**
 * Add body class for blog layout
 */
add_filter('body_class', function($classes) {
    if (is_single()) {
        $layout = sharks_get_blog_layout('single');
        $classes[] = 'layout-' . $layout;
    } elseif (is_home() || is_archive() || is_search()) {
        $layout = sharks_get_blog_layout('archive');
        $classes[] = 'layout-' . $layout;
    }
    
    return $classes;
});

/**
 * Custom excerpt length from Sharks Settings
 */
add_filter('excerpt_length', function($length) {
    $custom_length = get_field('excerpt_length', 'option');
    return $custom_length ? intval($custom_length) : $length;
}, 999);

/**
 * Custom posts per page from Sharks Settings
 */
add_action('pre_get_posts', function($query) {
    if (!is_admin() && $query->is_main_query() && (is_home() || is_archive())) {
        $posts_per_page = get_field('posts_per_page', 'option');
        if ($posts_per_page && $posts_per_page > 0) {
            $query->set('posts_per_page', intval($posts_per_page));
        }
    }
});

