<?php
/**
 * Menu Icons Generator
 * 
 * Generates SVG icons for submenu items based on Sharks Settings
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get SVG icon for menu item
 * 
 * @param string $menu_item_text Menu item text to match
 * @param int $index Fallback index if no match found
 * @return string SVG markup
 */
function sharks_get_menu_icon($menu_item_text, $index = 0) {
    // Get menu icons settings
    $menu_icons = get_field('menu_icons', 'option');
    
    if (!$menu_icons || !is_array($menu_icons)) {
        // Return default asterisk if no settings
        return sharks_generate_asterisk_svg('#000000', $index);
    }
    
    // Find matching menu item
    $icon_config = null;
    foreach ($menu_icons as $config) {
        if (isset($config['menu_item_id']) && 
            strtolower(trim($config['menu_item_id'])) === strtolower(trim($menu_item_text))) {
            $icon_config = $config;
            break;
        }
    }
    
    // If no match found, return default
    if (!$icon_config) {
        return sharks_generate_asterisk_svg('#000000', $index);
    }
    
    $icon_type = isset($icon_config['icon_type']) ? $icon_config['icon_type'] : 'asterisk';
    $icon_color = isset($icon_config['icon_color']) ? $icon_config['icon_color'] : '#000000';
    
    // Handle custom SVG
    if ($icon_type === 'custom' && !empty($icon_config['custom_svg'])) {
        $svg_url = $icon_config['custom_svg'];
        $svg_path = str_replace(wp_upload_dir()['baseurl'], wp_upload_dir()['basedir'], $svg_url);
        
        if (file_exists($svg_path)) {
            return file_get_contents($svg_path);
        }
    }
    
    // Generate built-in icon
    switch ($icon_type) {
        case 'cross':
            return sharks_generate_cross_svg($icon_color, $index);
        case 'circle':
            return sharks_generate_circle_svg($icon_color, $index);
        case 'square':
            return sharks_generate_square_svg($icon_color, $index);
        case 'triangle':
            return sharks_generate_triangle_svg($icon_color, $index);
        case 'asterisk':
        default:
            return sharks_generate_asterisk_svg($icon_color, $index);
    }
}

/**
 * Generate Asterisk SVG
 */
function sharks_generate_asterisk_svg($color = '#000000', $index = 0) {
    $unique_id = 'asterisk-mask-' . $index;
    
    return '<svg width="316" height="316" viewBox="0 0 316 316" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="316" height="316" fill="' . esc_attr($color) . '"/>
        <mask id="' . esc_attr($unique_id) . '" fill="white">
            <path d="M185.375 93.6172L215.511 63.4814L253.518 101.488L223.381 131.625H266V185.375H226.93L255.558 211.963L218.98 251.347L185.375 220.136V266H131.625V223.381L101.49 253.517L63.4824 215.51L93.6172 185.375H51V131.625H90.0713L61.4424 105.036L98.0205 65.6523L131.625 96.8613V51H185.375V93.6172Z"/>
        </mask>
        <path d="M185.375 93.6172H184.375V96.0314L186.082 94.3243L185.375 93.6172ZM215.511 63.4814L216.218 62.7743L215.511 62.0672L214.804 62.7743L215.511 63.4814ZM253.518 101.488L254.225 102.195L254.932 101.488L254.225 100.781L253.518 101.488ZM223.381 131.625L222.674 130.918L220.967 132.625H223.381V131.625ZM266 131.625H267V130.625H266V131.625ZM266 185.375V186.375H267V185.375H266ZM226.93 185.375V184.375H224.383L226.249 186.108L226.93 185.375ZM255.558 211.963L256.29 212.643L256.971 211.911L256.238 211.23L255.558 211.963ZM218.98 251.347L218.3 252.079L219.033 252.76L219.713 252.027L218.98 251.347ZM185.375 220.136L186.056 219.403L184.375 217.842V220.136H185.375ZM185.375 266V267H186.375V266H185.375ZM131.625 266H130.625V267H131.625V266ZM131.625 223.381H132.625V220.967L130.918 222.674L131.625 223.381ZM101.49 253.517L100.783 254.224L101.49 254.931L102.197 254.224L101.49 253.517ZM63.4824 215.51L62.7753 214.803L62.0682 215.51L62.7753 216.217L63.4824 215.51ZM93.6172 185.375L94.3243 186.082L96.0314 184.375H93.6172V185.375ZM51 185.375H50V186.375H51V185.375ZM51 131.625V130.625H50V131.625H51ZM90.0713 131.625V132.625H92.6175L90.7518 130.892L90.0713 131.625ZM61.4424 105.036L60.7097 104.356L60.0291 105.088L60.7619 105.769L61.4424 105.036ZM98.0205 65.6523L98.701 64.9196L97.9683 64.2391L97.2878 64.9718L98.0205 65.6523ZM131.625 96.8613L130.944 97.5941L132.625 99.1548V96.8613H131.625ZM131.625 51V50H130.625V51H131.625ZM185.375 51H186.375V50H185.375V51ZM185.375 93.6172L186.082 94.3243L216.218 64.1886L215.511 63.4814L214.804 62.7743L184.668 92.9101L185.375 93.6172ZM215.511 63.4814L214.804 64.1886L252.81 102.195L253.518 101.488L254.225 100.781L216.218 62.7743L215.511 63.4814ZM253.518 101.488L252.81 100.781L222.674 130.918L223.381 131.625L224.088 132.332L254.225 102.195L253.518 101.488ZM223.381 131.625V132.625H266V131.625V130.625H223.381V131.625ZM266 131.625H265V185.375H266H267V131.625H266ZM266 185.375V184.375H226.93V185.375V186.375H266V185.375ZM226.93 185.375L226.249 186.108L254.877 212.696L255.558 211.963L256.238 211.23L227.61 184.642L226.93 185.375ZM255.558 211.963L254.825 211.282L218.248 250.666L218.98 251.347L219.713 252.027L256.29 212.643L255.558 211.963ZM218.98 251.347L219.661 250.614L186.056 219.403L185.375 220.136L184.694 220.868L218.3 252.079L218.98 251.347ZM185.375 220.136H184.375V266H185.375H186.375V220.136H185.375ZM185.375 266V265H131.625V266V267H185.375V266ZM131.625 266H132.625V223.381H131.625H130.625V266H131.625ZM131.625 223.381L130.918 222.674L100.783 252.81L101.49 253.517L102.197 254.224L132.332 224.088L131.625 223.381ZM101.49 253.517L102.197 252.809L64.1895 214.803L63.4824 215.51L62.7753 216.217L100.783 254.224L101.49 253.517ZM63.4824 215.51L64.1895 216.217L94.3243 186.082L93.6172 185.375L92.9101 184.668L62.7753 214.803L63.4824 215.51ZM93.6172 185.375V184.375H51V185.375V186.375H93.6172V185.375ZM51 185.375H52V131.625H51H50V185.375H51ZM51 131.625V132.625H90.0713V131.625V130.625H51V131.625ZM90.0713 131.625L90.7518 130.892L62.1229 104.303L61.4424 105.036L60.7619 105.769L89.3908 132.358L90.0713 131.625ZM61.4424 105.036L62.1751 105.717L98.7532 66.3329L98.0205 65.6523L97.2878 64.9718L60.7097 104.356L61.4424 105.036ZM98.0205 65.6523L97.34 66.3851L130.944 97.5941L131.625 96.8613L132.306 96.1286L98.701 64.9196L98.0205 65.6523ZM131.625 96.8613H132.625V51H131.625H130.625V96.8613H131.625ZM131.625 51V52H185.375V51V50H131.625V51ZM185.375 51H184.375V93.6172H185.375H186.375V51H185.375Z" fill="#757472" mask="url(#' . esc_attr($unique_id) . ')"/>
    </svg>';
}

/**
 * Generate Cross/Plus SVG
 */
function sharks_generate_cross_svg($color = '#000000', $index = 0) {
    return '<svg width="316" height="316" viewBox="0 0 316 316" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="316" height="316" fill="' . esc_attr($color) . '"/>
        <path d="M158 50V266M50 158H266" stroke="#757472" stroke-width="20" stroke-linecap="round"/>
    </svg>';
}

/**
 * Generate Circle SVG
 */
function sharks_generate_circle_svg($color = '#000000', $index = 0) {
    return '<svg width="316" height="316" viewBox="0 0 316 316" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="316" height="316" fill="' . esc_attr($color) . '"/>
        <circle cx="158" cy="158" r="100" stroke="#757472" stroke-width="20" fill="none"/>
    </svg>';
}

/**
 * Generate Square SVG
 */
function sharks_generate_square_svg($color = '#000000', $index = 0) {
    return '<svg width="316" height="316" viewBox="0 0 316 316" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="316" height="316" fill="' . esc_attr($color) . '"/>
        <rect x="58" y="58" width="200" height="200" stroke="#757472" stroke-width="20" fill="none"/>
    </svg>';
}

/**
 * Generate Triangle SVG
 */
function sharks_generate_triangle_svg($color = '#000000', $index = 0) {
    return '<svg width="316" height="316" viewBox="0 0 316 316" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect width="316" height="316" fill="' . esc_attr($color) . '"/>
        <path d="M158 60L258 240H58L158 60Z" stroke="#757472" stroke-width="20" fill="none" stroke-linejoin="round"/>
    </svg>';
}
