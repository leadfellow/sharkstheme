<?php
/**
 * Front Page Template (Homepage)
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<?php
// Display page content (ACF Blocks)
if (have_posts()) :
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
endif;
?>

<?php get_footer(); ?>

