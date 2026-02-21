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
define('SHARKS_VERSION', '2.6.0');

// Theme directory path
define('SHARKS_DIR', get_stylesheet_directory());

// Theme directory URI
define('SHARKS_URI', get_stylesheet_directory_uri());

// Require theme files
require_once SHARKS_DIR . '/inc/theme.php';
require_once SHARKS_DIR . '/inc/theme-helpers.php';
require_once SHARKS_DIR . '/inc/post-types.php';
require_once SHARKS_DIR . '/inc/blocks.php';
require_once SHARKS_DIR . '/inc/patterns.php';
require_once SHARKS_DIR . '/inc/block-styles.php';
require_once SHARKS_DIR . '/inc/admin-settings.php';
require_once SHARKS_DIR . '/inc/menu-icons.php';
require_once SHARKS_DIR . '/inc/schema.php';

// ACF JSON save/load points
add_filter('acf/settings/save_json', function ($path) {
    return SHARKS_DIR . '/acf-json';
});

add_filter('acf/settings/load_json', function ($paths) {
    unset($paths[0]);
    $paths[] = SHARKS_DIR . '/acf-json';
    return $paths;
});

/**
 * AJAX: Load more blog posts (infinite scroll)
 */
add_action('wp_ajax_load_more_blog_posts', 'sharks_load_more_blog_posts');
add_action('wp_ajax_nopriv_load_more_blog_posts', 'sharks_load_more_blog_posts');

function sharks_load_more_blog_posts()
{
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $posts_per_page = isset($_POST['posts_per_page']) ? intval($_POST['posts_per_page']) : 6;
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';
    $hover_color = isset($_POST['hover_color']) ? sanitize_hex_color($_POST['hover_color']) : '#f237a6';

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $posts_per_page,
        'paged' => $page,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC'
    );

    if ($category && $category !== 'all') {
        $args['category_name'] = $category;
    }

    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()) {
        $post_index = 0;
        while ($query->have_posts()) {
            $query->the_post();

            if ($post_index % 2 === 0) {
                echo '<div class="blog-posts-row">';
            }

            $categories = get_the_category();
            $category_name = !empty($categories) ? $categories[0]->name : 'Muu';
            $post_url = get_permalink();
            $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
            ?>

            <article class="blog-post-card">
                <div class="blog-post-image">
                    <?php if ($featured_image): ?>
                        <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                    <?php else: ?>
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&h=800&fit=crop"
                            alt="<?php echo esc_attr(get_the_title()); ?>">
                    <?php endif; ?>
                </div>
                <span class="blog-post-category"><?php echo esc_html($category_name); ?></span>
                <h2 class="blog-post-title"><?php the_title(); ?></h2>
                <a href="<?php echo esc_url($post_url); ?>" class="blog-post-link">
                    <span class="blog-post-link-text">Vaata lähemalt</span>
                    <svg class="blog-arrow-icon" fill="none" viewBox="0 0 26 26">
                        <rect class="arrow-bg" fill="black" width="26" height="26" />
                        <path d="M8.9375 13H17.0625" stroke="white" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.15104" />
                        <path d="M13.8125 9.75L17.0625 13L13.8125 16.25" stroke="white" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="1.15104" />
                    </svg>
                </a>
            </article>

            <?php
            $post_index++;

            if ($post_index % 2 === 0 || $post_index === $query->post_count) {
                echo '</div>';
            }
        }
    }

    wp_reset_postdata();

    $html = ob_get_clean();

    wp_send_json_success(array(
        'html' => $html,
        'max_pages' => $query->max_num_pages
    ));
}

/**
 * AJAX: Filter blog posts by category
 */
add_action('wp_ajax_filter_blog_posts', 'sharks_filter_blog_posts');
add_action('wp_ajax_nopriv_filter_blog_posts', 'sharks_filter_blog_posts');

function sharks_filter_blog_posts()
{
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';
    $posts_per_page = isset($_POST['posts_per_page']) ? intval($_POST['posts_per_page']) : 6;
    $hover_color = isset($_POST['hover_color']) ? sanitize_hex_color($_POST['hover_color']) : '#f237a6';
    $loading_type = isset($_POST['loading_type']) ? sanitize_text_field($_POST['loading_type']) : 'pagination';

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $posts_per_page,
        'paged' => 1,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC'
    );

    if ($category && $category !== 'all') {
        $args['category_name'] = $category;
    }

    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            $categories = get_the_category();
            $category_name = !empty($categories) ? $categories[0]->name : 'Muu';
            $post_url = get_permalink();
            $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
            ?>

            <article class="blog-post-card">
                <div class="blog-post-image">
                    <?php if ($featured_image): ?>
                        <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                    <?php else: ?>
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&h=800&fit=crop"
                            alt="<?php echo esc_attr(get_the_title()); ?>">
                    <?php endif; ?>
                </div>
                <span class="blog-post-category"><?php echo esc_html($category_name); ?></span>
                <h2 class="blog-post-title"><?php the_title(); ?></h2>
                <a href="<?php echo esc_url($post_url); ?>" class="blog-post-link">
                    <span class="blog-post-link-text">Vaata lähemalt</span>
                    <svg class="blog-arrow-icon" fill="none" viewBox="0 0 26 26">
                        <rect class="arrow-bg" fill="black" width="26" height="26" />
                        <path d="M8.9375 13H17.0625" stroke="white" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.15104" />
                        <path d="M13.8125 9.75L17.0625 13L13.8125 16.25" stroke="white" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="1.15104" />
                    </svg>
                </a>
            </article>

            <?php
        }
    } else {
        echo '<p class="blog-no-posts">Postitusi ei leitud.</p>';
    }

    wp_reset_postdata();

    $html = ob_get_clean();

    wp_send_json_success(array(
        'html' => $html,
        'max_pages' => $query->max_num_pages
    ));
}
