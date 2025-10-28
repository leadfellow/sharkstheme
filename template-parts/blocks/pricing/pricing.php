<?php
/**
 * Pricing Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields with placeholder defaults
$section_title = get_field('section_title') ?: 'Choose Your Plan';
$section_text = get_field('section_text') ?: 'Flexible pricing options for businesses of all sizes';
$pricing_plans = get_field('pricing_plans');

// Add dummy pricing plans if empty
if (empty($pricing_plans)) {
    $pricing_plans = [
        [
            'plan_name' => 'Starter',
            'description' => 'Perfect for small projects and startups',
            'price' => '29',
            'currency' => '$',
            'period' => 'month',
            'button_text' => 'Get Started',
            'button_url' => '#',
            'featured' => false,
            'features' => [
                ['feature_text' => '5 Projects', 'disabled' => false],
                ['feature_text' => '10 GB Storage', 'disabled' => false],
                ['feature_text' => 'Email Support', 'disabled' => false],
                ['feature_text' => 'Advanced Analytics', 'disabled' => true],
                ['feature_text' => 'Priority Support', 'disabled' => true],
            ]
        ],
        [
            'plan_name' => 'Professional',
            'description' => 'For growing businesses and teams',
            'price' => '79',
            'currency' => '$',
            'period' => 'month',
            'button_text' => 'Get Started',
            'button_url' => '#',
            'featured' => true,
            'features' => [
                ['feature_text' => 'Unlimited Projects', 'disabled' => false],
                ['feature_text' => '100 GB Storage', 'disabled' => false],
                ['feature_text' => 'Priority Email Support', 'disabled' => false],
                ['feature_text' => 'Advanced Analytics', 'disabled' => false],
                ['feature_text' => '24/7 Phone Support', 'disabled' => true],
            ]
        ],
        [
            'plan_name' => 'Enterprise',
            'description' => 'For large organizations',
            'price' => '199',
            'currency' => '$',
            'period' => 'month',
            'button_text' => 'Contact Sales',
            'button_url' => '#',
            'featured' => false,
            'features' => [
                ['feature_text' => 'Unlimited Everything', 'disabled' => false],
                ['feature_text' => 'Unlimited Storage', 'disabled' => false],
                ['feature_text' => 'Dedicated Account Manager', 'disabled' => false],
                ['feature_text' => 'Custom Analytics', 'disabled' => false],
                ['feature_text' => '24/7 Priority Support', 'disabled' => false],
            ]
        ]
    ];
}

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = !empty($block['anchor']) ? $block['anchor'] : 'pricing-' . $block['id'];
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';
?>

<section id="<?php echo esc_attr($anchor); ?>" class="block-pricing<?php echo esc_attr($align_class . $class_name); ?>">
  <div class="container">
    <div class="block-pricing__header">
      <h2 class="block-pricing__title"><?php echo esc_html($section_title); ?></h2>
      
      <?php if ($section_text): ?>
        <p class="block-pricing__text"><?php echo esc_html($section_text); ?></p>
      <?php endif; ?>
    </div>
    
    <?php if (!empty($pricing_plans)): ?>
      <div class="block-pricing__grid">
        <?php foreach ($pricing_plans as $plan): ?>
          <?php
          $is_featured = !empty($plan['featured']);
          $featured_class = $is_featured ? ' pricing-card--featured' : '';
          ?>
          <article class="pricing-card<?php echo esc_attr($featured_class); ?>">
            <h3 class="pricing-card__name"><?php echo esc_html($plan['plan_name'] ?? ''); ?></h3>
            
            <?php if (!empty($plan['description'])): ?>
              <p class="pricing-card__description"><?php echo esc_html($plan['description']); ?></p>
            <?php endif; ?>
            
            <div class="pricing-card__price">
              <?php if (!empty($plan['currency'])): ?>
                <span class="pricing-card__currency"><?php echo esc_html($plan['currency']); ?></span>
              <?php endif; ?>
              
              <span class="pricing-card__amount"><?php echo esc_html($plan['price'] ?? '0'); ?></span>
              
              <?php if (!empty($plan['period'])): ?>
                <span class="pricing-card__period">/<?php echo esc_html($plan['period']); ?></span>
              <?php endif; ?>
            </div>
            
            <?php if (!empty($plan['features'])): ?>
              <ul class="pricing-card__features">
                <?php foreach ($plan['features'] as $feature): ?>
                  <?php
                  $is_disabled = !empty($feature['disabled']);
                  $disabled_class = $is_disabled ? ' pricing-card__feature--disabled' : '';
                  ?>
                  <li class="pricing-card__feature<?php echo esc_attr($disabled_class); ?>">
                    <?php echo esc_html($feature['feature_text'] ?? ''); ?>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
            
            <?php if (!empty($plan['button_text']) && !empty($plan['button_url'])): ?>
              <a href="<?php echo esc_url($plan['button_url']); ?>" class="btn btn--primary btn--block pricing-card__button">
                <?php echo esc_html($plan['button_text']); ?>
              </a>
            <?php endif; ?>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>

