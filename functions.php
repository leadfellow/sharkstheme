<?php
/**
 * Sharks 2025 Theme
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Theme version
define('SHARKS_VERSION', '1.5.6');

// Theme directory path
define('SHARKS_DIR', get_stylesheet_directory());

// Theme directory URI
define('SHARKS_URI', get_stylesheet_directory_uri());

// Require theme files
require_once SHARKS_DIR . '/inc/theme.php';
require_once SHARKS_DIR . '/inc/post-types.php';
require_once SHARKS_DIR . '/inc/blocks.php';
require_once SHARKS_DIR . '/inc/patterns.php';
require_once SHARKS_DIR . '/inc/block-styles.php';
require_once SHARKS_DIR . '/inc/admin-settings.php';

// ACF JSON save/load points
add_filter('acf/settings/save_json', function($path) {
    return SHARKS_DIR . '/acf-json';
});

add_filter('acf/settings/load_json', function($paths) {
    unset($paths[0]);
    $paths[] = SHARKS_DIR . '/acf-json';
    return $paths;
});

