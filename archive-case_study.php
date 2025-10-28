<?php
/**
 * Archive Case Studies Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<div class="container section">
    <header class="archive-header">
        <h1 class="archive-title">
            <?php
            if (is_tax('case_study_category')) {
                single_term_title();
            } elseif (is_tax('case_study_tag')) {
                single_term_title();
            } else {
                _e('Our Work', 'sharks2025');
            }
            ?>
        </h1>
        
        <?php if (is_tax() && term_description()) : ?>
            <div class="archive-description">
                <?php echo term_description(); ?>
            </div>
        <?php else : ?>
            <p class="archive-description">
                <?php _e('Explore our portfolio of successful projects and client success stories', 'sharks2025'); ?>
            </p>
        <?php endif; ?>
    </header>

    <?php if (have_posts()) : ?>
        
        <div class="case-studies-grid__grid case-studies-grid__grid--3-col">
            
            <?php while (have_posts()) : the_post(); ?>
                <?php
                $client_name = get_field('client_name');
                $project_year = get_field('project_year');
                $project_timeline = get_field('project_timeline');
                ?>
                
                <article class="case-study-card">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" class="case-study-card__image">
                            <?php the_post_thumbnail('large'); ?>
                            <div class="case-study-card__overlay">
                                <span class="case-study-card__view">View Project →</span>
                            </div>
                        </a>
                    <?php else : ?>
                        <a href="<?php the_permalink(); ?>" class="case-study-card__image case-study-card__image--placeholder">
                            <div class="case-study-card__overlay">
                                <span class="case-study-card__view">View Project →</span>
                            </div>
                        </a>
                    <?php endif; ?>
                    
                    <div class="case-study-card__content">
                        <?php if ($client_name || $project_year) : ?>
                            <div class="case-study-card__meta">
                                <?php if ($client_name) : ?>
                                    <span class="case-study-card__client"><?php echo esc_html($client_name); ?></span>
                                <?php endif; ?>
                                <?php if ($project_year) : ?>
                                    <span class="case-study-card__year"><?php echo esc_html($project_year); ?></span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        
                        <h2 class="case-study-card__title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        
                        <?php if (has_excerpt()) : ?>
                            <p class="case-study-card__excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        <?php endif; ?>
                        
                        <?php
                        // Show categories
                        $categories = get_the_terms(get_the_ID(), 'case_study_category');
                        if ($categories && !is_wp_error($categories)) :
                            ?>
                            <div class="case-study-card__categories">
                                <?php foreach ($categories as $category) : ?>
                                    <a href="<?php echo get_term_link($category); ?>" class="case-study-card__category">
                                        <?php echo esc_html($category->name); ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        
                        <a href="<?php the_permalink(); ?>" class="case-study-card__link">
                            View Case Study →
                        </a>
                    </div>
                </article>
                
            <?php endwhile; ?>
            
        </div>

        <?php
        // Pagination
        the_posts_pagination([
            'mid_size'  => 2,
            'prev_text' => __('← Previous', 'sharks2025'),
            'next_text' => __('Next →', 'sharks2025'),
        ]);
        ?>

    <?php else : ?>
        
        <div class="no-results">
            <h2><?php _e('No Case Studies Found', 'sharks2025'); ?></h2>
            <p><?php _e('Sorry, no case studies match your criteria. Please try again later.', 'sharks2025'); ?></p>
        </div>

    <?php endif; ?>
</div>

<?php get_footer(); ?>

