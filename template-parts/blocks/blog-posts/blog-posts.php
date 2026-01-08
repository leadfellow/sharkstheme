<?php
/**
 * Blog Posts Block
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param int|string $post_id The post ID this block is saved to.
 */

// Get block fields
$posts_per_page = get_field('posts_per_page') ?: 6;
$hover_color = get_field('hover_color') ?: '#f237a6';
$loading_type = get_field('loading_type') ?: 'pagination';
$show_categories = get_field('show_categories');

// Get current page for pagination
// Support both standard pagination and custom 'blog_page' query var
$paged = 1;
if (get_query_var('paged')) {
    $paged = get_query_var('paged');
} elseif (get_query_var('page')) {
    $paged = get_query_var('page');
} elseif (isset($_GET['blog_page'])) {
    $paged = intval($_GET['blog_page']);
}

// Get category filter from URL
$current_category = isset($_GET['blog_category']) ? sanitize_text_field($_GET['blog_category']) : '';

// Query args
$args = array(
    'post_type' => 'post',
    'posts_per_page' => $posts_per_page,
    'paged' => $paged,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC'
);

// Add category filter if set
if ($current_category && $current_category !== 'all') {
    $args['category_name'] = $current_category;
}

$blog_query = new WP_Query($args);

// Get all categories for navigation
$categories = get_categories(array(
    'taxonomy' => 'category',
    'hide_empty' => true,
    'orderby' => 'name',
    'order' => 'ASC'
));

// Generate unique ID for this block
$block_id = 'blog-posts-' . $block['id'];
?>

<div id="<?php echo esc_attr($block_id); ?>" class="blog-posts-block" data-loading-type="<?php echo esc_attr($loading_type); ?>" data-posts-per-page="<?php echo esc_attr($posts_per_page); ?>" data-hover-color="<?php echo esc_attr($hover_color); ?>">
    <div class="blog-posts-container">
        
        <?php if ($show_categories && !empty($categories)) : ?>
            <!-- Category Navigation -->
            <nav class="blog-nav">
                <div class="blog-nav-item <?php echo empty($current_category) || $current_category === 'all' ? 'active' : ''; ?>">
                    <a href="?blog_category=all" data-category="all">Kõik postitused</a>
                </div>
                <?php foreach ($categories as $category) : ?>
                    <div class="blog-nav-item <?php echo $current_category === $category->slug ? 'active' : ''; ?>">
                        <a href="?blog_category=<?php echo esc_attr($category->slug); ?>" data-category="<?php echo esc_attr($category->slug); ?>">
                            <?php echo esc_html($category->name); ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </nav>
        <?php endif; ?>

        <!-- Posts Grid -->
        <div class="blog-posts-grid">
            <?php if ($blog_query->have_posts()) : ?>
                <?php
                while ($blog_query->have_posts()) : $blog_query->the_post();
                    // Get post data
                    $categories = get_the_category();
                    $category_name = !empty($categories) ? $categories[0]->name : 'Muu';
                    $post_url = get_permalink();
                    $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    ?>
                    
                    <article class="blog-post-card">
                        <div class="blog-post-image">
                            <?php if ($featured_image) : ?>
                                <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                            <?php else : ?>
                                <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&h=800&fit=crop" alt="<?php echo esc_attr(get_the_title()); ?>">
                            <?php endif; ?>
                        </div>
                        <span class="blog-post-category"><?php echo esc_html($category_name); ?></span>
                        <h2 class="blog-post-title"><?php the_title(); ?></h2>
                        <a href="<?php echo esc_url($post_url); ?>" class="blog-post-link">
                            <span class="blog-post-link-text">Vaata lähemalt</span>
                            <svg class="blog-arrow-icon" fill="none" viewBox="0 0 26 26">
                                <rect class="arrow-bg" fill="black" width="26" height="26"/>
                                <path d="M8.9375 13H17.0625" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.15104"/>
                                <path d="M13.8125 9.75L17.0625 13L13.8125 16.25" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.15104"/>
                            </svg>
                        </a>
                    </article>
                    
                    <?php
                endwhile;
                ?>
            <?php else : ?>
                <p class="blog-no-posts">Postitusi ei leitud.</p>
            <?php endif; ?>
        </div>

        <?php if ($loading_type === 'pagination' && $blog_query->max_num_pages > 1) : ?>
            <!-- Pagination -->
            <div class="blog-pagination">
                <?php
                // Custom pagination for blocks (uses blog_page parameter to avoid conflicts)
                $pagination_args = array(
                    'total' => $blog_query->max_num_pages,
                    'current' => $paged,
                    'prev_text' => '← Eelmine',
                    'next_text' => 'Järgmine →',
                    'type' => 'list',
                    'format' => '?blog_page=%#%',
                    'add_args' => $current_category ? array('blog_category' => $current_category) : array()
                );
                
                // Generate pagination links
                $pagination = paginate_links($pagination_args);
                
                // Replace blog_page with proper format in URLs
                if ($pagination) {
                    echo $pagination;
                }
                ?>
            </div>
        <?php elseif ($loading_type === 'infinite' && $blog_query->max_num_pages > 1) : ?>
            <!-- Load More Button (for infinite scroll) -->
            <div class="blog-load-more-container">
                <button class="blog-load-more" data-page="<?php echo $paged; ?>" data-max-pages="<?php echo $blog_query->max_num_pages; ?>" data-category="<?php echo esc_attr($current_category); ?>">
                    <span class="load-more-text">Laadi veel</span>
                    <span class="load-more-spinner" style="display: none;">Laadimine...</span>
                </button>
            </div>
        <?php endif; ?>

    </div>
</div>

<style>
    #<?php echo esc_attr($block_id); ?> {
        --hover-color: <?php echo esc_attr($hover_color); ?>;
    }
</style>

<?php
wp_reset_postdata();
?>
