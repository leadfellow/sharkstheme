<?php
/**
 * Single Post Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Reading time helper function
if (!function_exists('sharks_get_reading_time')) {
    function sharks_get_reading_time($content) {
        $word_count = str_word_count(strip_tags($content));
        $reading_time = ceil($word_count / 200);
        return max(1, $reading_time);
    }
}

get_header();

while (have_posts()) : the_post();
    
    // Get post data
    $categories = get_the_category();
    $category_name = !empty($categories) ? $categories[0]->name : '';
    $category_slug = !empty($categories) ? $categories[0]->slug : '';
    $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
    $post_date = get_the_date('d.m.Y');
    $reading_time = sharks_get_reading_time(get_the_content());
    
    ?>
    
    <!-- Post Header -->
    <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
        <div class="single-post-header">
            <h1 class="single-post-title"><?php the_title(); ?></h1>
            
            <div class="single-post-meta-row">
                <div class="single-post-meta">
                    <div class="single-post-meta-item">
                        <span class="single-post-meta-label">(PUBLISHED)</span>
                        <span class="single-post-meta-value"><?php echo esc_html($post_date); ?></span>
                    </div>
                    <div class="single-post-meta-item">
                        <span class="single-post-meta-label">(WRITER)</span>
                        <span class="single-post-meta-value"><?php the_author(); ?></span>
                    </div>
                </div>
                
                <div class="single-post-share">
                    <button class="single-post-share-btn" aria-label="Share" title="Share">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="18" cy="5" r="3"></circle>
                            <circle cx="6" cy="12" r="3"></circle>
                            <circle cx="18" cy="19" r="3"></circle>
                            <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                            <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                        </svg>
                    </button>
                    <button class="single-post-share-btn" aria-label="Copy link" title="Copy link">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                            <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                        </svg>
                    </button>
                </div>
            </div>
            
            <?php if ($featured_image) : ?>
                <div class="single-post-hero-image">
                    <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Post Content with TOC -->
        <div class="single-post-content-wrapper">
            <!-- Table of Contents (Left) -->
            <nav class="single-post-toc" id="post-toc">
                <!-- Will be populated by JavaScript -->
            </nav>
            
            <!-- Main Content (Right) -->
            <div class="single-post-content">
                <?php the_content(); ?>
            </div>
        </div>
        
        <!-- Post Tags -->
        <?php if (has_tag()) : ?>
            <div class="single-post-tags">
                <?php the_tags('<span class="tags-label">Märksõnad:</span> ', ', ', ''); ?>
            </div>
        <?php endif; ?>
    </article>
    
    <?php
    
    // Get related posts by category (3 posts)
    $related_args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'post__not_in' => array(get_the_ID()),
        'orderby' => 'rand',
        'post_status' => 'publish'
    );
    
    if (!empty($categories)) {
        $related_args['category__in'] = array($categories[0]->term_id);
    }
    
    $related_query = new WP_Query($related_args);
    
    if ($related_query->have_posts()) : ?>
        
        <!-- Related Posts -->
        <section class="related-posts">
            <div class="related-posts-container">
                <div class="related-posts-header">
                    <h2 class="related-posts-title">Seotud artiklid</h2>
                    <div class="related-posts-icon">
                        <svg width="62" height="62" viewBox="0 0 62 62" fill="none">
                            <path d="M31 0L38.5 23.5L62 31L38.5 38.5L31 62L23.5 38.5L0 31L23.5 23.5L31 0Z" fill="black"/>
                        </svg>
                    </div>
                </div>
                
                <div class="related-posts-grid">
                    <?php
                    while ($related_query->have_posts()) : $related_query->the_post();
                        $rel_categories = get_the_category();
                        $rel_category_name = !empty($rel_categories) ? $rel_categories[0]->name : 'Muu';
                        $rel_featured_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
                        ?>
                        
                        <article class="related-post-card">
                            <a href="<?php the_permalink(); ?>" class="related-post-image">
                                <?php if ($rel_featured_image) : ?>
                                    <img src="<?php echo esc_url($rel_featured_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                                <?php else : ?>
                                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&h=800&fit=crop" alt="<?php echo esc_attr(get_the_title()); ?>">
                                <?php endif; ?>
                            </a>
                            <div class="related-post-category"><?php echo esc_html($rel_category_name); ?></div>
                            <h3 class="related-post-title"><?php the_title(); ?></h3>
                            <a href="<?php the_permalink(); ?>" class="related-post-link">
                                Vaata lähemalt
                                <svg class="related-arrow-icon" fill="none" viewBox="0 0 26 26">
                                    <rect class="arrow-bg" fill="black" width="26" height="26"/>
                                    <path d="M8.9375 13H17.0625" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.15104"/>
                                    <path d="M13.8125 9.75L17.0625 13L13.8125 16.25" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.15104"/>
                                </svg>
                            </a>
                        </article>
                        
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
        
    <?php
    endif;
    wp_reset_postdata();
    
endwhile;

get_footer();
?>
