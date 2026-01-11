<?php
/**
 * Theme Helper Functions
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Calculate reading time for post content
 * 
 * @param string $content Post content
 * @return int Reading time in minutes
 */
function sharks_get_reading_time($content) {
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // Average reading speed: 200 words per minute
    return max(1, $reading_time); // Minimum 1 minute
}

/**
 * Check if block should be hidden on mobile
 * Returns CSS class to hide block on mobile if show_on_mobile is false
 * 
 * @return string CSS class or empty string
 */
function sharks_get_mobile_visibility_class() {
    $show_on_mobile = get_field('show_on_mobile');
    
    // If field doesn't exist or is true (default), show on mobile
    if ($show_on_mobile === null || $show_on_mobile === true || $show_on_mobile === 1) {
        return '';
    }
    
    // If explicitly set to false, hide on mobile
    return 'hide-on-mobile';
}
