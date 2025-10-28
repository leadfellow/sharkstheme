<?php
/**
 * Sidebar Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get layout
$context = is_single() ? 'single' : 'archive';
$layout = sharks_get_blog_layout($context);

// Don't show sidebar if layout is no-sidebar
if ($layout === 'no-sidebar') {
    return;
}

// Primary Sidebar
if (in_array($layout, ['left-sidebar', 'right-sidebar', 'both-sidebars']) && is_active_sidebar('blog-primary')) : ?>
    <aside class="sidebar sidebar--primary" role="complementary">
        <?php dynamic_sidebar('blog-primary'); ?>
    </aside>
<?php endif;

// Secondary Sidebar (only for both-sidebars layout)
if ($layout === 'both-sidebars' && is_active_sidebar('blog-secondary')) : ?>
    <aside class="sidebar sidebar--secondary" role="complementary">
        <?php dynamic_sidebar('blog-secondary'); ?>
    </aside>
<?php endif;

