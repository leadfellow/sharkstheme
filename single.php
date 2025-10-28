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

get_header();

// Get layout setting
$layout = sharks_get_blog_layout('single');
?>

<div class="container section">
    <div class="blog-layout blog-layout--<?php echo esc_attr($layout); ?>">
        
        <?php if ($layout === 'left-sidebar' || $layout === 'both-sidebars') : ?>
            <?php get_sidebar(); ?>
        <?php endif; ?>
        
        <main class="blog-content">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        
                        <?php
                        $post_meta = get_field('post_meta_display', 'option');
                        if (empty($post_meta)) {
                            $post_meta = ['author', 'date', 'categories'];
                        }
                        
                        if (!empty($post_meta)) : ?>
                            <div class="entry-meta">
                                <?php if (in_array('date', $post_meta)) : ?>
                                    <time class="entry-date" datetime="<?php echo get_the_date('c'); ?>">
                                        📅 <?php echo get_the_date(); ?>
                                    </time>
                                <?php endif; ?>
                                
                                <?php if (in_array('author', $post_meta)) : ?>
                                    <span class="entry-author">
                                        👤 <?php the_author(); ?>
                                    </span>
                                <?php endif; ?>
                                
                                <?php if (in_array('categories', $post_meta) && has_category()) : ?>
                                    <span class="entry-categories">
                                        📁 <?php the_category(', '); ?>
                                    </span>
                                <?php endif; ?>
                                
                                <?php if (in_array('comments', $post_meta)) : ?>
                                    <span class="entry-comments">
                                        💬 <?php comments_number('0 Comments', '1 Comment', '% Comments'); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </header>

                    <?php if (has_post_thumbnail()) : ?>
                        <div class="entry-thumbnail">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>

                    <?php
                    wp_link_pages([
                        'before' => '<div class="page-links">' . __('Pages:', 'sharks2025'),
                        'after'  => '</div>',
                    ]);
                    ?>
                    
                    <?php if (in_array('tags', $post_meta) && has_tag()) : ?>
                        <footer class="entry-footer">
                            <div class="entry-tags">
                                🏷️ <?php the_tags('', ', '); ?>
                            </div>
                        </footer>
                    <?php endif; ?>
                </article>

                <?php
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
            <?php endwhile; ?>
        </main>
        
        <?php if ($layout === 'right-sidebar' || $layout === 'both-sidebars') : ?>
            <?php get_sidebar(); ?>
        <?php endif; ?>
        
    </div>
</div>

<?php get_footer(); ?>

