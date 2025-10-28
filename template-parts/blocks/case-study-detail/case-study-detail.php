<?php
/**
 * Case Study Detail Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get block settings
$selected_case_study = get_field('select_case_study');
$show_sections = get_field('show_sections');

// Determine which post to display
if ($selected_case_study) {
    $post_id = $selected_case_study;
    $post = get_post($post_id);
} else {
    global $post;
    $post_id = $post->ID;
}

// If no valid post and we're in admin, show dummy data
$is_preview = isset($block['data']['is_preview']) || (is_admin() && !$post_id);

// Block attributes
$block_id = 'case-study-detail-' . $block['id'];
if (!empty($block['anchor'])) {
    $block_id = $block['anchor'];
}

$class_name = 'case-study-detail';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Get case study data
if ($post_id && !$is_preview) {
    $client_name = get_field('client_name', $post_id) ?: 'Acme Corporation';
    $project_timeline = get_field('project_timeline', $post_id) ?: '3 months';
    $project_year = get_field('project_year', $post_id) ?: '2024';
    $hero_image = get_field('hero_image', $post_id);
    $challenge = get_field('challenge', $post_id);
    $solution = get_field('solution', $post_id);
    $results = get_field('results', $post_id);
    $key_features = get_field('key_features', $post_id);
    $technologies = get_field('technologies', $post_id);
    $metrics = get_field('metrics', $post_id);
    $testimonial = get_field('testimonial', $post_id);
    $gallery = get_field('gallery', $post_id);
    $website_url = get_field('website_url', $post_id);
    $title = get_the_title($post_id);
    $excerpt = get_the_excerpt($post_id);
} else {
    // Dummy data for preview
    $client_name = 'TechCorp Industries';
    $project_timeline = '4 months';
    $project_year = '2024';
    $hero_image = null;
    $title = 'E-Commerce Platform Transformation';
    $excerpt = 'A complete digital transformation resulting in 150% increase in online revenue';
    $challenge = 'The client\'s existing e-commerce platform was outdated, slow, and difficult to use. Mobile conversion rates were below 1%, and cart abandonment was at 75%. The site couldn\'t handle peak traffic during sales events.';
    $solution = 'We designed and built a modern, mobile-first e-commerce platform using headless architecture. Implemented advanced search with AI recommendations, streamlined checkout process, and integrated with their existing inventory management system.';
    $results = 'Within 6 months of launch, the new platform achieved remarkable results: 150% increase in conversion rates, 60% reduction in cart abandonment, 3x faster page load times, and 99.9% uptime during peak sales events.';
    $key_features = [
        ['feature_text' => 'AI-powered product recommendations'],
        ['feature_text' => 'One-click checkout'],
        ['feature_text' => 'Real-time inventory sync'],
        ['feature_text' => 'Advanced search and filters'],
        ['feature_text' => 'Mobile-optimized design']
    ];
    $technologies = [
        ['tech_name' => 'React'],
        ['tech_name' => 'Node.js'],
        ['tech_name' => 'WordPress'],
        ['tech_name' => 'AWS']
    ];
    $metrics = [
        ['metric_value' => '150%', 'metric_label' => 'Increase in conversions'],
        ['metric_value' => '60%', 'metric_label' => 'Reduction in cart abandonment'],
        ['metric_value' => '3x', 'metric_label' => 'Faster page load'],
        ['metric_value' => '99.9%', 'metric_label' => 'Uptime during sales']
    ];
    $testimonial = [
        'text' => 'The new platform exceeded our expectations. The team delivered on time and the results speak for themselves. Our online revenue has never been higher.',
        'author' => 'Sarah Johnson',
        'position' => 'CEO, TechCorp Industries'
    ];
    $gallery = null;
    $website_url = 'https://example.com';
}

// Default sections if none selected
if (empty($show_sections)) {
    $show_sections = ['hero', 'overview', 'challenge', 'solution', 'results', 'metrics'];
}
?>

<article id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr($class_name); ?>">
    
    <?php if (in_array('hero', $show_sections) && ($hero_image || $is_preview)) : ?>
        <section class="case-study-detail__hero">
            <?php if ($hero_image) : ?>
                <img src="<?php echo esc_url($hero_image['url']); ?>" 
                     alt="<?php echo esc_attr($hero_image['alt'] ?: $title); ?>" 
                     class="case-study-detail__hero-image">
            <?php else : ?>
                <div class="case-study-detail__hero-placeholder">
                    <span>Hero Image</span>
                </div>
            <?php endif; ?>
        </section>
    <?php endif; ?>

    <div class="container">
        
        <?php if (in_array('overview', $show_sections)) : ?>
            <section class="case-study-detail__overview">
                <div class="case-study-detail__overview-content">
                    <h1 class="case-study-detail__title"><?php echo esc_html($title); ?></h1>
                    <?php if ($excerpt) : ?>
                        <p class="case-study-detail__lead"><?php echo esc_html($excerpt); ?></p>
                    <?php endif; ?>
                </div>
                
                <div class="case-study-detail__meta">
                    <div class="case-study-detail__meta-item">
                        <span class="case-study-detail__meta-label">Client</span>
                        <span class="case-study-detail__meta-value"><?php echo esc_html($client_name); ?></span>
                    </div>
                    <div class="case-study-detail__meta-item">
                        <span class="case-study-detail__meta-label">Timeline</span>
                        <span class="case-study-detail__meta-value"><?php echo esc_html($project_timeline); ?></span>
                    </div>
                    <div class="case-study-detail__meta-item">
                        <span class="case-study-detail__meta-label">Year</span>
                        <span class="case-study-detail__meta-value"><?php echo esc_html($project_year); ?></span>
                    </div>
                    <?php if ($website_url) : ?>
                        <div class="case-study-detail__meta-item">
                            <a href="<?php echo esc_url($website_url); ?>" target="_blank" rel="noopener" class="btn btn--secondary btn--sm">
                                Visit Website →
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>

        <?php if (in_array('challenge', $show_sections) && $challenge) : ?>
            <section class="case-study-detail__section">
                <h2 class="case-study-detail__section-title">The Challenge</h2>
                <div class="case-study-detail__section-content">
                    <p><?php echo nl2br(esc_html($challenge)); ?></p>
                </div>
            </section>
        <?php endif; ?>

        <?php if (in_array('solution', $show_sections) && $solution) : ?>
            <section class="case-study-detail__section">
                <h2 class="case-study-detail__section-title">The Solution</h2>
                <div class="case-study-detail__section-content">
                    <p><?php echo nl2br(esc_html($solution)); ?></p>
                </div>
            </section>
        <?php endif; ?>

        <?php if (in_array('features', $show_sections) && !empty($key_features)) : ?>
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

        <?php if (in_array('results', $show_sections) && $results) : ?>
            <section class="case-study-detail__section">
                <h2 class="case-study-detail__section-title">The Results</h2>
                <div class="case-study-detail__section-content">
                    <p><?php echo nl2br(esc_html($results)); ?></p>
                </div>
            </section>
        <?php endif; ?>

        <?php if (in_array('metrics', $show_sections) && !empty($metrics)) : ?>
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

        <?php if (in_array('technologies', $show_sections) && !empty($technologies)) : ?>
            <section class="case-study-detail__section">
                <h2 class="case-study-detail__section-title">Technologies Used</h2>
                <div class="case-study-detail__technologies">
                    <?php foreach ($technologies as $tech) : ?>
                        <span class="case-study-detail__tech-badge"><?php echo esc_html($tech['tech_name']); ?></span>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>

        <?php if (in_array('testimonial', $show_sections) && !empty($testimonial['text'])) : ?>
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

        <?php if (in_array('gallery', $show_sections) && !empty($gallery)) : ?>
            <section class="case-study-detail__gallery">
                <h2 class="case-study-detail__section-title">Project Gallery</h2>
                <div class="case-study-detail__gallery-grid">
                    <?php foreach ($gallery as $image) : ?>
                        <a href="<?php echo esc_url($image['url']); ?>" class="case-study-detail__gallery-item" data-lightbox="case-study">
                            <img src="<?php echo esc_url($image['sizes']['medium']); ?>" 
                                 alt="<?php echo esc_attr($image['alt']); ?>">
                        </a>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endif; ?>

    </div>
</article>

