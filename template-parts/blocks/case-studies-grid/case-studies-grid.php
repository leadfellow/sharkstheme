<?php
/**
 * Case Studies Grid Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get block settings
$section_title = get_field('section_title') ?: 'Our Work';
$section_subtitle = get_field('section_subtitle') ?: 'Explore our latest projects and success stories';
$posts_to_show = get_field('posts_to_show') ?: 6;
$filter_category = get_field('filter_category');
$grid_layout = get_field('grid_layout') ?: '3-col';
$show_excerpt = get_field('show_excerpt');
$show_cta = get_field('show_cta');

// Block attributes
$block_id = 'case-studies-grid-' . $block['id'];
if (!empty($block['anchor'])) {
    $block_id = $block['anchor'];
}

$class_name = 'case-studies-grid';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Query args
$args = [
    'post_type'      => 'case_study',
    'posts_per_page' => $posts_to_show,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC'
];

if ($filter_category) {
    $args['tax_query'] = [
        [
            'taxonomy' => 'case_study_category',
            'field'    => 'term_id',
            'terms'    => $filter_category,
        ]
    ];
}

$case_studies = new WP_Query($args);

// If no case studies found, show dummy data in editor
if (!$case_studies->have_posts() && is_admin()) {
    $dummy_studies = [
        [
            'title' => 'E-Commerce Platform Redesign',
            'excerpt' => 'Complete overhaul of an online retail platform resulting in 150% increase in conversions.',
            'thumbnail' => null,
            'link' => '#',
            'client' => 'TechRetail Inc.',
            'year' => '2024'
        ],
        [
            'title' => 'Mobile Banking App',
            'excerpt' => 'Modern mobile-first banking solution serving over 100,000 active users.',
            'thumbnail' => null,
            'link' => '#',
            'client' => 'FinanceFirst',
            'year' => '2024'
        ],
        [
            'title' => 'Healthcare Management System',
            'excerpt' => 'Comprehensive patient management and scheduling system for multi-location clinics.',
            'thumbnail' => null,
            'link' => '#',
            'client' => 'HealthCare Plus',
            'year' => '2023'
        ],
        [
            'title' => 'Real Estate Portal',
            'excerpt' => 'Advanced property listing and search platform with virtual tours and AI recommendations.',
            'thumbnail' => null,
            'link' => '#',
            'client' => 'PropFinder',
            'year' => '2023'
        ],
        [
            'title' => 'Restaurant Booking Platform',
            'excerpt' => 'Seamless reservation system connecting diners with 500+ restaurants.',
            'thumbnail' => null,
            'link' => '#',
            'client' => 'DineEasy',
            'year' => '2024'
        ],
        [
            'title' => 'Educational Learning Platform',
            'excerpt' => 'Interactive e-learning platform with live classes and progress tracking.',
            'thumbnail' => null,
            'link' => '#',
            'client' => 'EduLearn',
            'year' => '2023'
        ]
    ];
}
?>

<section id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        
        <?php if ($section_title || $section_subtitle) : ?>
            <header class="case-studies-grid__header">
                <?php if ($section_title) : ?>
                    <h2 class="case-studies-grid__title"><?php echo esc_html($section_title); ?></h2>
                <?php endif; ?>
                
                <?php if ($section_subtitle) : ?>
                    <p class="case-studies-grid__subtitle"><?php echo esc_html($section_subtitle); ?></p>
                <?php endif; ?>
            </header>
        <?php endif; ?>

        <div class="case-studies-grid__grid case-studies-grid__grid--<?php echo esc_attr($grid_layout); ?>">
            
            <?php if ($case_studies->have_posts()) : ?>
                <?php while ($case_studies->have_posts()) : $case_studies->the_post(); ?>
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
                            
                            <h3 class="case-study-card__title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            
                            <?php if ($show_excerpt) : ?>
                                <p class="case-study-card__excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            <?php endif; ?>
                            
                            <a href="<?php the_permalink(); ?>" class="case-study-card__link">
                                View Case Study →
                            </a>
                        </div>
                    </article>
                    
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                
            <?php elseif (isset($dummy_studies)) : ?>
                <?php foreach ($dummy_studies as $study) : ?>
                    <article class="case-study-card">
                        <div class="case-study-card__image case-study-card__image--placeholder">
                            <div class="case-study-card__overlay">
                                <span class="case-study-card__view">View Project →</span>
                            </div>
                        </div>
                        
                        <div class="case-study-card__content">
                            <div class="case-study-card__meta">
                                <span class="case-study-card__client"><?php echo esc_html($study['client']); ?></span>
                                <span class="case-study-card__year"><?php echo esc_html($study['year']); ?></span>
                            </div>
                            
                            <h3 class="case-study-card__title">
                                <a href="<?php echo esc_url($study['link']); ?>"><?php echo esc_html($study['title']); ?></a>
                            </h3>
                            
                            <?php if ($show_excerpt) : ?>
                                <p class="case-study-card__excerpt"><?php echo esc_html($study['excerpt']); ?></p>
                            <?php endif; ?>
                            
                            <a href="<?php echo esc_url($study['link']); ?>" class="case-study-card__link">
                                View Case Study →
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
            
        </div>

        <?php if ($show_cta) : ?>
            <div class="case-studies-grid__cta">
                <a href="<?php echo esc_url(get_post_type_archive_link('case_study')); ?>" class="btn btn--primary">
                    View All Case Studies
                </a>
            </div>
        <?php endif; ?>
        
    </div>
</section>

