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
