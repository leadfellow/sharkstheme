<?php
/**
 * Single Case Study Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

get_header();

while (have_posts()) : the_post();
    
    // Get case study data
    $client_name = get_field('client_name');
    $project_timeline = get_field('project_timeline');
    $project_year = get_field('project_year');
    $hero_image = get_field('hero_image');
    $challenge = get_field('challenge');
    $solution = get_field('solution');
    $results = get_field('results');
    $key_features = get_field('key_features');
    $technologies = get_field('technologies');
    $metrics = get_field('metrics');
    $testimonial = get_field('testimonial');
    $gallery = get_field('gallery');
    $website_url = get_field('website_url');
    ?>

    <article id="case-study-<?php the_ID(); ?>" <?php post_class('case-study-detail'); ?>>
        
        <?php if ($hero_image) : ?>
            <section class="case-study-detail__hero">
                <img src="<?php echo esc_url($hero_image['url']); ?>" 
                     alt="<?php echo esc_attr($hero_image['alt'] ?: get_the_title()); ?>" 
                     class="case-study-detail__hero-image">
            </section>
        <?php endif; ?>

        <div class="container section">
            
            <section class="case-study-detail__overview">
                <div class="case-study-detail__overview-content">
                    <h1 class="case-study-detail__title"><?php the_title(); ?></h1>
                    <?php if (has_excerpt()) : ?>
                        <p class="case-study-detail__lead"><?php echo get_the_excerpt(); ?></p>
                    <?php endif; ?>
                </div>
                
                <div class="case-study-detail__meta">
                    <?php if ($client_name) : ?>
                        <div class="case-study-detail__meta-item">
                            <span class="case-study-detail__meta-label">Client</span>
                            <span class="case-study-detail__meta-value"><?php echo esc_html($client_name); ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($project_timeline) : ?>
                        <div class="case-study-detail__meta-item">
                            <span class="case-study-detail__meta-label">Timeline</span>
                            <span class="case-study-detail__meta-value"><?php echo esc_html($project_timeline); ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($project_year) : ?>
                        <div class="case-study-detail__meta-item">
                            <span class="case-study-detail__meta-label">Year</span>
                            <span class="case-study-detail__meta-value"><?php echo esc_html($project_year); ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($website_url) : ?>
                        <div class="case-study-detail__meta-item">
                            <a href="<?php echo esc_url($website_url); ?>" target="_blank" rel="noopener" class="btn btn--secondary btn--sm">
                                Visit Website →
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </section>

            <?php if ($challenge) : ?>
                <section class="case-study-detail__section">
                    <h2 class="case-study-detail__section-title">The Challenge</h2>
                    <div class="case-study-detail__section-content">
                        <p><?php echo nl2br(esc_html($challenge)); ?></p>
                    </div>
                </section>
            <?php endif; ?>

            <?php if ($solution) : ?>
                <section class="case-study-detail__section">
                    <h2 class="case-study-detail__section-title">The Solution</h2>
                    <div class="case-study-detail__section-content">
                        <p><?php echo nl2br(esc_html($solution)); ?></p>
                    </div>
                </section>
            <?php endif; ?>

            <?php if (!empty($key_features)) : ?>
                <section class="case-study-detail__section">
                    <h2 class="case-study-detail__section-title">Key Features</h2>
                    <ul class="case-study-detail__features">
                        <?php foreach ($key_features as $feature) : ?>
                            <li class="case-study-detail__feature">
                                ✓ <?php echo esc_html($feature['feature_text']); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </section>
            <?php endif; ?>

            <?php if ($results) : ?>
                <section class="case-study-detail__section">
                    <h2 class="case-study-detail__section-title">The Results</h2>
                    <div class="case-study-detail__section-content">
                        <p><?php echo nl2br(esc_html($results)); ?></p>
                    </div>
                </section>
            <?php endif; ?>

            <?php if (!empty($metrics)) : ?>
                <section class="case-study-detail__metrics">
                    <div class="case-study-detail__metrics-grid">
                        <?php foreach ($metrics as $metric) : ?>
                            <div class="case-study-detail__metric">
                                <div class="case-study-detail__metric-value"><?php echo esc_html($metric['metric_value']); ?></div>
                                <div class="case-study-detail__metric-label"><?php echo esc_html($metric['metric_label']); ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>

            <?php if (!empty($technologies)) : ?>
                <section class="case-study-detail__section">
                    <h2 class="case-study-detail__section-title">Technologies Used</h2>
                    <div class="case-study-detail__technologies">
                        <?php foreach ($technologies as $tech) : ?>
                            <span class="case-study-detail__tech-badge"><?php echo esc_html($tech['tech_name']); ?></span>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>

            <?php if (!empty($testimonial['text'])) : ?>
                <section class="case-study-detail__testimonial">
                    <blockquote class="case-study-detail__quote">
                        <p>"<?php echo esc_html($testimonial['text']); ?>"</p>
                        <?php if (!empty($testimonial['author'])) : ?>
                            <footer class="case-study-detail__quote-author">
                                <strong><?php echo esc_html($testimonial['author']); ?></strong>
                                <?php if (!empty($testimonial['position'])) : ?>
                                    <span><?php echo esc_html($testimonial['position']); ?></span>
                                <?php endif; ?>
                            </footer>
                        <?php endif; ?>
                    </blockquote>
                </section>
            <?php endif; ?>

            <?php if (!empty($gallery)) : ?>
                <section class="case-study-detail__gallery">
                    <h2 class="case-study-detail__section-title">Project Gallery</h2>
                    <div class="case-study-detail__gallery-grid">
                        <?php foreach ($gallery as $image) : ?>
                            <a href="<?php echo esc_url($image['url']); ?>" class="case-study-detail__gallery-item">
                                <img src="<?php echo esc_url($image['sizes']['medium']); ?>" 
                                     alt="<?php echo esc_attr($image['alt']); ?>">
                            </a>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>

            <?php
            // Show main content if there is any
            if (get_the_content()) :
                ?>
                <section class="case-study-detail__content">
                    <?php the_content(); ?>
                </section>
            <?php endif; ?>

            <?php
            // Navigation to next/previous case studies
            $prev_post = get_previous_post();
            $next_post = get_next_post();
            
            if ($prev_post || $next_post) :
                ?>
                <nav class="case-study-detail__navigation">
                    <?php if ($prev_post) : ?>
                        <a href="<?php echo get_permalink($prev_post); ?>" class="case-study-detail__nav-link case-study-detail__nav-link--prev">
                            <span class="case-study-detail__nav-label">← Previous Project</span>
                            <span class="case-study-detail__nav-title"><?php echo get_the_title($prev_post); ?></span>
                        </a>
                    <?php endif; ?>
                    
                    <?php if ($next_post) : ?>
                        <a href="<?php echo get_permalink($next_post); ?>" class="case-study-detail__nav-link case-study-detail__nav-link--next">
                            <span class="case-study-detail__nav-label">Next Project →</span>
                            <span class="case-study-detail__nav-title"><?php echo get_the_title($next_post); ?></span>
                        </a>
                    <?php endif; ?>
                </nav>
            <?php endif; ?>

        </div>
    </article>

<?php endwhile; ?>

<?php get_footer(); ?>

