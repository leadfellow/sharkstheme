<?php
/**
 * Author Archive Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

get_header();

global $wp_query;

// Get the queried author object
$author = get_queried_object();
$author_id = $author->ID;
$author_name = get_the_author_meta('display_name', $author_id);
$author_description = get_the_author_meta('description', $author_id);
$author_avatar = get_avatar_url($author_id, ['size' => 160]);

// Blog index page settings for consistency
$posts_page_id = get_option('page_for_posts');
$hover_color = get_field('blog_hover_color', $posts_page_id) ?: '#f237a6';

?>

<section class="author-profile">
    <div class="author-profile-container">
        <div class="author-profile-header">
            <div class="author-avatar">
                <img src="<?php echo esc_url($author_avatar); ?>" alt="<?php echo esc_attr($author_name); ?>">
            </div>
            <h1 class="author-name">
                <?php echo esc_html($author_name); ?>
            </h1>
            <?php if ($author_description): ?>
                <div class="author-bio">
                    <?php echo wp_kses_post(wpautop($author_description)); ?>
                </div>
            <?php endif; ?>

            <div class="author-email">
                <a href="mailto:<?php echo esc_attr(get_the_author_meta('user_email', $author_id)); ?>">
                    <?php echo esc_html(get_the_author_meta('user_email', $author_id)); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<div class="blog-posts-block author-posts" data-hover-color="<?php echo esc_attr($hover_color); ?>">
    <div class="blog-posts-container">
        <div class="author-posts-header">
            <h2 class="author-posts-title">Autori postitused</h2>
        </div>

        <!-- Posts Grid -->
        <div class="blog-posts-grid">
            <?php if (have_posts()): ?>
                <?php
                $post_index = 0;
                while (have_posts()):
                    the_post();
                    // Start new row every 3 posts
                    if ($post_index % 3 === 0) {
                        echo '<div class="blog-posts-row">';
                    }

                    // Get post data
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
                        <span class="blog-post-category">
                            <?php echo esc_html($category_name); ?>
                        </span>
                        <h2 class="blog-post-title">
                            <?php the_title(); ?>
                        </h2>
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

                    // Close row after 3 posts or if it's the last post
                    if ($post_index % 3 === 0 || $post_index === $wp_query->post_count) {
                        echo '</div>';
                    }
                endwhile;
                ?>
            <?php else: ?>
                <p class="blog-no-posts">Autori postitusi ei leitud.</p>
            <?php endif; ?>
        </div>

        <?php if ($wp_query->max_num_pages > 1): ?>
            <!-- Pagination -->
            <div class="blog-pagination">
                <?php
                echo paginate_links(array(
                    'total' => $wp_query->max_num_pages,
                    'current' => max(1, get_query_var('paged')),
                    'prev_text' => '← Eelmine',
                    'next_text' => 'Järgmine →',
                    'type' => 'list',
                ));
                ?>
            </div>
        <?php endif; ?>

    </div>
</div>

<style>
    .author-posts {
        --hover-color:
            <?php echo esc_attr($hover_color); ?>
        ;
    }
</style>

<?php
get_footer();
?>