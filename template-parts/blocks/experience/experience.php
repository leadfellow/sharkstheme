<?php
/**
 * Experience Block Template
 * Experience section with headline, feature items, CTA button and images
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$headline_gray = get_field('headline_gray') ?: 'Vaatamata aastatepikkusele kogemusele';
$headline_black = get_field('headline_black') ?: 'oleme paindlik ja värske';

// Get individual feature fields
$feature_1 = get_field('feature_1') ?: '95% klientidest soovitavad meid edasi';
$feature_2 = get_field('feature_2') ?: 'oleme loonud üle 250 kodulehekülje ja e-poe';
$feature_3 = get_field('feature_3') ?: 'turundame igapäevaselt rohkem kui 50 klienti';
$feature_4 = get_field('feature_4') ?: 'teekond meiega on lihtne ja kasumlik';
$feature_5 = get_field('feature_5') ?: 'teeme tööd hingega ja kvaliteediga';

$cta_text = get_field('cta_text') ?: 'küsi pakkimust';
$cta_url = get_field('cta_url') ?: '#';
$image_1 = get_field('image_1');
$image_2 = get_field('image_2');

// Block attributes
$anchor = sharks_get_block_anchor($block, 'experience');
$class_name = 'block-experience';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}
?>

<section id="<?php echo esc_attr($anchor); ?>" class="<?php echo esc_attr($class_name); ?>">
    <div class="block-experience__container">
        <!-- Headline -->
        <h2 class="block-experience__headline">
            <span class="block-experience__headline-gray"><?php echo esc_html($headline_gray); ?> </span>
            <span class="block-experience__headline-black"><?php echo esc_html($headline_black); ?></span>
        </h2>

        <!-- Content Wrapper -->
        <div class="block-experience__content-wrapper">
            <!-- Left Section -->
            <div class="block-experience__left-section">
                <!-- Features -->
                <div class="block-experience__features">
                    <!-- First Row (3 items) -->
                    <div class="block-experience__features-row">
                        <?php if (!empty($feature_1)): ?>
                            <div class="block-experience__feature-item">
                                <svg class="block-experience__feature-icon" fill="none" preserveAspectRatio="none" viewBox="0 0 32.0002 32.0002">
                                    <path d="M16.0001 0.000103336L16.0032 15.9844L22.1231 1.21803L16.009 15.9868L27.3138 4.6864L16.0134 15.9912L30.7822 9.87713L16.0158 15.997L32.0001 16.0001L16.0158 16.0032L30.7822 22.1231L16.0134 16.009L27.3138 27.3138L16.009 16.0134L22.1231 30.7822L16.0032 16.0158L16.0001 32.0001L15.997 16.0158L9.87713 30.7822L15.9912 16.0134L4.6864 27.3138L15.9868 16.009L1.21803 22.1231L15.9844 16.0032L0.000103336 16.0001L15.9844 15.997L1.21803 9.87713L15.9868 15.9912L4.6864 4.6864L15.9912 15.9868L9.87713 1.21803L15.997 15.9844L16.0001 0.000103336Z" 
                                          stroke="black" 
                                          stroke-width="1.06667" />
                                </svg>
                                <p class="block-experience__feature-text"><?php echo esc_html($feature_1); ?></p>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($feature_2)): ?>
                            <div class="block-experience__feature-item">
                                <svg class="block-experience__feature-icon" fill="none" preserveAspectRatio="none" viewBox="0 0 32.0002 32.0002">
                                    <path d="M16.0001 0.000103336L16.0032 15.9844L22.1231 1.21803L16.009 15.9868L27.3138 4.6864L16.0134 15.9912L30.7822 9.87713L16.0158 15.997L32.0001 16.0001L16.0158 16.0032L30.7822 22.1231L16.0134 16.009L27.3138 27.3138L16.009 16.0134L22.1231 30.7822L16.0032 16.0158L16.0001 32.0001L15.997 16.0158L9.87713 30.7822L15.9912 16.0134L4.6864 27.3138L15.9868 16.009L1.21803 22.1231L15.9844 16.0032L0.000103336 16.0001L15.9844 15.997L1.21803 9.87713L15.9868 15.9912L4.6864 4.6864L15.9912 15.9868L9.87713 1.21803L15.997 15.9844L16.0001 0.000103336Z" 
                                          stroke="black" 
                                          stroke-width="1.06667" />
                                </svg>
                                <p class="block-experience__feature-text"><?php echo esc_html($feature_2); ?></p>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($feature_3)): ?>
                            <div class="block-experience__feature-item">
                                <svg class="block-experience__feature-icon" fill="none" preserveAspectRatio="none" viewBox="0 0 32.0002 32.0002">
                                    <path d="M16.0001 0.000103336L16.0032 15.9844L22.1231 1.21803L16.009 15.9868L27.3138 4.6864L16.0134 15.9912L30.7822 9.87713L16.0158 15.997L32.0001 16.0001L16.0158 16.0032L30.7822 22.1231L16.0134 16.009L27.3138 27.3138L16.009 16.0134L22.1231 30.7822L16.0032 16.0158L16.0001 32.0001L15.997 16.0158L9.87713 30.7822L15.9912 16.0134L4.6864 27.3138L15.9868 16.009L1.21803 22.1231L15.9844 16.0032L0.000103336 16.0001L15.9844 15.997L1.21803 9.87713L15.9868 15.9912L4.6864 4.6864L15.9912 15.9868L9.87713 1.21803L15.997 15.9844L16.0001 0.000103336Z" 
                                          stroke="black" 
                                          stroke-width="1.06667" />
                                </svg>
                                <p class="block-experience__feature-text"><?php echo esc_html($feature_3); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Second Row (2 items) -->
                    <div class="block-experience__features-row">
                        <?php if (!empty($feature_4)): ?>
                            <div class="block-experience__feature-item">
                                <svg class="block-experience__feature-icon" fill="none" preserveAspectRatio="none" viewBox="0 0 32.0002 32.0002">
                                    <path d="M16.0001 0.000103336L16.0032 15.9844L22.1231 1.21803L16.009 15.9868L27.3138 4.6864L16.0134 15.9912L30.7822 9.87713L16.0158 15.997L32.0001 16.0001L16.0158 16.0032L30.7822 22.1231L16.0134 16.009L27.3138 27.3138L16.009 16.0134L22.1231 30.7822L16.0032 16.0158L16.0001 32.0001L15.997 16.0158L9.87713 30.7822L15.9912 16.0134L4.6864 27.3138L15.9868 16.009L1.21803 22.1231L15.9844 16.0032L0.000103336 16.0001L15.9844 15.997L1.21803 9.87713L15.9868 15.9912L4.6864 4.6864L15.9912 15.9868L9.87713 1.21803L15.997 15.9844L16.0001 0.000103336Z" 
                                          stroke="black" 
                                          stroke-width="1.06667" />
                                </svg>
                                <p class="block-experience__feature-text"><?php echo esc_html($feature_4); ?></p>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($feature_5)): ?>
                            <div class="block-experience__feature-item">
                                <svg class="block-experience__feature-icon" fill="none" preserveAspectRatio="none" viewBox="0 0 32.0002 32.0002">
                                    <path d="M16.0001 0.000103336L16.0032 15.9844L22.1231 1.21803L16.009 15.9868L27.3138 4.6864L16.0134 15.9912L30.7822 9.87713L16.0158 15.997L32.0001 16.0001L16.0158 16.0032L30.7822 22.1231L16.0134 16.009L27.3138 27.3138L16.009 16.0134L22.1231 30.7822L16.0032 16.0158L16.0001 32.0001L15.997 16.0158L9.87713 30.7822L15.9912 16.0134L4.6864 27.3138L15.9868 16.009L1.21803 22.1231L15.9844 16.0032L0.000103336 16.0001L15.9844 15.997L1.21803 9.87713L15.9868 15.9912L4.6864 4.6864L15.9912 15.9868L9.87713 1.21803L15.997 15.9844L16.0001 0.000103336Z" 
                                          stroke="black" 
                                          stroke-width="1.06667" />
                                </svg>
                                <p class="block-experience__feature-text"><?php echo esc_html($feature_5); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- CTA Button -->
                <a href="<?php echo esc_url($cta_url); ?>" class="block-experience__cta-button">
                    <div class="block-experience__cta-content">
                        <p class="block-experience__cta-text"><?php echo esc_html($cta_text); ?></p>
                        <svg class="block-experience__arrow-icon" fill="none" preserveAspectRatio="none" viewBox="0 0 62 62">
                            <rect height="60.3243" rx="30.1622" stroke="white" stroke-width="1.67568" width="60.3243" x="0.837838" y="0.837838" />
                            <path d="M24.1504 37.8506L37.8506 24.1504" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.74479" />
                            <path d="M26.8906 24.1494L37.8508 24.1494L37.8508 35.1096" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.74479" />
                        </svg>
                    </div>
                </a>
            </div>

            <!-- Right Section (Images) -->
            <div class="block-experience__right-section">
                <?php if ($image_1): ?>
                    <?php echo wp_get_attachment_image($image_1, 'large', false, ['class' => 'block-experience__image block-experience__image-1']); ?>
                <?php else: ?>
                    <img src="https://images.unsplash.com/photo-1586864387634-f8875a4e6b4c?w=800" alt="Product packaging 1" class="block-experience__image block-experience__image-1">
                <?php endif; ?>
                
                <?php if ($image_2): ?>
                    <?php echo wp_get_attachment_image($image_2, 'large', false, ['class' => 'block-experience__image block-experience__image-2']); ?>
                <?php else: ?>
                    <img src="https://images.unsplash.com/photo-1612198188060-c7c2a3b66eae?w=800" alt="Product packaging 2" class="block-experience__image block-experience__image-2">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
