<?php
/**
 * Services Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields with placeholder defaults
$section_title = get_field('section_title') ?: 'Our Services';
$section_text = get_field('section_text') ?: 'Comprehensive solutions tailored to your business needs';
$services = get_field('services');

// Add dummy services if empty
if (empty($services)) {
    $services = [
        [
            'title' => 'Web Development',
            'description' => 'Custom websites and web applications built with modern technologies and best practices.',
            'icon' => null,
            'link_text' => 'Learn More',
            'link_url' => '#'
        ],
        [
            'title' => 'Digital Marketing',
            'description' => 'Strategic marketing campaigns that drive traffic, engagement, and conversions.',
            'icon' => null,
            'link_text' => 'Learn More',
            'link_url' => '#'
        ],
        [
            'title' => 'Consulting',
            'description' => 'Expert guidance to help your business grow and adapt to changing markets.',
            'icon' => null,
            'link_text' => 'Learn More',
            'link_url' => '#'
        ]
    ];
}

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = sharks_get_block_anchor($block, 'services');
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';
?>

<section id="<?php echo esc_attr($anchor); ?>" class="block-services section<?php echo esc_attr($align_class . $class_name); ?>">
  <div class="container">
    <?php if ($section_title || $section_text): ?>
      <div class="block-services__header">
        <?php if ($section_title): ?>
          <h2 class="block-services__title"><?php echo esc_html($section_title); ?></h2>
        <?php endif; ?>
        
        <?php if ($section_text): ?>
          <p class="block-services__text"><?php echo esc_html($section_text); ?></p>
        <?php endif; ?>
      </div>
    <?php endif; ?>
    
    <?php if (!empty($services)): ?>
      <div class="grid grid--3">
        <?php foreach ($services as $service): ?>
          <article class="card">
            <?php if (!empty($service['icon'])): ?>
              <div class="card__icon">
                <?php echo wp_get_attachment_image($service['icon'], 'thumbnail'); ?>
              </div>
            <?php endif; ?>
            
            <h3 class="card__title"><?php echo esc_html($service['title'] ?? ''); ?></h3>
            
            <?php if (!empty($service['description'])): ?>
              <p class="card__text"><?php echo esc_html($service['description']); ?></p>
            <?php endif; ?>
            
            <?php if (!empty($service['link_url']) && !empty($service['link_text'])): ?>
              <a href="<?php echo esc_url($service['link_url']); ?>" class="card__link">
                <?php echo esc_html($service['link_text']); ?>
                <span aria-hidden="true">→</span>
              </a>
            <?php endif; ?>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>

