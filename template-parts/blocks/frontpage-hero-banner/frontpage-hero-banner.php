<?php
/**
 * Frontpage Hero Banner Block Template
 * Large hero banner with title, description, CTA and portfolio card
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$main_title = get_field('main_title') ?: 'HUNGRY FOR YOUR SUCCESS';
$description = get_field('description') ?: 'Choose a service, send in your request, and your design journey starts tomorrow.';
$cta_text = get_field('cta_text') ?: 'Küsi pakkumist';
$cta_url = get_field('cta_url') ?: '#contact';
$portfolio_text = get_field('portfolio_text') ?: 'Tehtud tööd';
$portfolio_url = get_field('portfolio_url') ?: '#portfolio';
$portfolio_image = get_field('portfolio_image');

// Block attributes
$anchor = !empty($block['anchor']) ? 'id="' . esc_attr($block['anchor']) . '"' : '';
$class_name = 'block-frontpage-hero-banner';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo $anchor; ?> class="<?php echo esc_attr($class_name); ?>">
    <!-- Background -->
    <div class="block-frontpage-hero-banner__background"></div>

    <!-- Union Shape -->
    <div class="block-frontpage-hero-banner__union-shape">
        <svg width="860.292" height="860.292" viewBox="0 0 860.292 860.292" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="Union">
                <mask id="path-1-inside-1_1_99" fill="white">
                    <path d="M537.684 170.525L658.265 49.9443L810.344 202.023L689.761 322.606H860.292V537.68H703.95L818.503 644.068L672.143 801.66L537.684 676.783V860.292H322.61V689.757L202.026 810.342L49.9463 658.263L170.529 537.68H0V322.606H156.329L41.7773 216.219L188.138 58.6279L322.61 183.517V0H537.684V170.525Z" />
                </mask>
                <path d="M537.684 170.525H536.684V172.94L538.391 171.232L537.684 170.525ZM658.265 49.9443L658.972 49.2372L658.265 48.5301L657.558 49.2372L658.265 49.9443ZM810.344 202.023L811.051 202.731L811.758 202.023L811.051 201.316L810.344 202.023ZM689.761 322.606L689.054 321.899L687.347 323.606H689.761V322.606ZM860.292 322.606H861.292V321.606H860.292V322.606ZM860.292 537.68V538.68H861.292V537.68H860.292ZM703.95 537.68V536.68H701.404L703.27 538.412L703.95 537.68ZM818.503 644.068L819.236 644.749L819.916 644.016L819.183 643.336L818.503 644.068ZM672.143 801.66L671.462 802.393L672.195 803.073L672.875 802.341L672.143 801.66ZM537.684 676.783L538.364 676.05L536.684 674.49V676.783H537.684ZM537.684 860.292V861.292H538.684V860.292H537.684ZM322.61 860.292H321.61V861.292H322.61V860.292ZM322.61 689.757H323.61V687.343L321.903 689.05L322.61 689.757ZM202.026 810.342L201.319 811.049L202.026 811.756L202.733 811.049L202.026 810.342ZM49.9463 658.263L49.2392 657.556L48.5321 658.263L49.2392 658.97L49.9463 658.263ZM170.529 537.68L171.236 538.387L172.944 536.68H170.529V537.68ZM0 537.68H-1V538.68H0V537.68ZM0 322.606V321.606H-1V322.606H0ZM156.329 322.606V323.606H158.875L157.01 321.874L156.329 322.606ZM41.7773 216.219L41.0446 215.538L40.3641 216.271L41.0968 216.951L41.7773 216.219ZM188.138 58.6279L188.818 57.8952L188.085 57.2147L187.405 57.9474L188.138 58.6279ZM322.61 183.517L321.93 184.249L323.61 185.81V183.517H322.61ZM322.61 0V-1H321.61V0H322.61ZM537.684 0H538.684V-1H537.684V0ZM537.684 170.525L538.391 171.232L658.972 50.6514L658.265 49.9443L657.558 49.2372L536.976 169.818L537.684 170.525ZM658.265 49.9443L657.558 50.6514L809.637 202.731L810.344 202.023L811.051 201.316L658.972 49.2372L658.265 49.9443ZM810.344 202.023L809.637 201.316L689.054 321.899L689.761 322.606L690.468 323.314L811.051 202.731L810.344 202.023ZM689.761 322.606V323.606H860.292V322.606V321.606H689.761V322.606ZM860.292 322.606H859.292V537.68H860.292H861.292V322.606H860.292ZM860.292 537.68V536.68H703.95V537.68V538.68H860.292V537.68ZM703.95 537.68L703.27 538.412L817.822 644.801L818.503 644.068L819.183 643.336L704.631 536.947L703.95 537.68ZM818.503 644.068L817.77 643.388L671.41 800.98L672.143 801.66L672.875 802.341L819.236 644.749L818.503 644.068ZM672.143 801.66L672.823 800.927L538.364 676.05L537.684 676.783L537.003 677.516L671.462 802.393L672.143 801.66ZM537.684 676.783H536.684V860.292H537.684H538.684V676.783H537.684ZM537.684 860.292V859.292H322.61V860.292V861.292H537.684V860.292ZM322.61 860.292H323.61V689.757H322.61H321.61V860.292H322.61ZM322.61 689.757L321.903 689.05L201.319 809.635L202.026 810.342L202.733 811.049L323.317 690.464L322.61 689.757ZM202.026 810.342L202.733 809.635L50.6534 657.556L49.9463 658.263L49.2392 658.97L201.319 811.049L202.026 810.342ZM49.9463 658.263L50.6534 658.97L171.236 538.387L170.529 537.68L169.822 536.973L49.2392 657.556L49.9463 658.263ZM170.529 537.68V536.68H0V537.68V538.68H170.529V537.68ZM0 537.68H1V322.606H0H-1V537.68H0ZM0 322.606V323.606H156.329V322.606V321.606H0V322.606ZM156.329 322.606L157.01 321.874L42.4579 215.486L41.7773 216.219L41.0968 216.951L155.649 323.339L156.329 322.606ZM41.7773 216.219L42.5101 216.899L188.87 59.3084L188.138 58.6279L187.405 57.9474L41.0446 215.538L41.7773 216.219ZM188.138 58.6279L187.457 59.3607L321.93 184.249L322.61 183.517L323.291 182.784L188.818 57.8952L188.138 58.6279ZM322.61 183.517H323.61V0H322.61H321.61V183.517H322.61ZM322.61 0V1H537.684V0V-1H322.61V0ZM537.684 0H536.684V170.525H537.684H538.684V0H537.684Z" fill="#757472" mask="url(#path-1-inside-1_1_99)" />
            </g>
        </svg>
    </div>

    <!-- Container -->
    <div class="block-frontpage-hero-banner__container">
        <!-- Main Title -->
        <h1 class="block-frontpage-hero-banner__title"><?php echo esc_html($main_title); ?></h1>

        <!-- Bottom Section -->
        <div class="block-frontpage-hero-banner__bottom">
            <!-- Left Section: Description + CTA -->
            <div class="block-frontpage-hero-banner__left">
                <p class="block-frontpage-hero-banner__description">
                    <?php echo esc_html($description); ?>
                </p>
                
                <a href="<?php echo esc_url($cta_url); ?>" class="block-frontpage-hero-banner__cta">
                    <span class="block-frontpage-hero-banner__cta-text"><?php echo esc_html($cta_text); ?></span>
                    <div class="block-frontpage-hero-banner__cta-icon">
                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="26" height="26" fill="white"/>
                            <path d="M8.9375 13H17.0625" stroke="black" stroke-width="1.15104" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M13.8125 9.75L17.0625 13L13.8125 16.25" stroke="black" stroke-width="1.15104" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </a>
            </div>

            <!-- Right Section: Portfolio Card -->
            <div class="block-frontpage-hero-banner__portfolio">
                <div class="block-frontpage-hero-banner__portfolio-image">
                    <?php if ($portfolio_image && !empty($portfolio_image['url'])): ?>
                        <img src="<?php echo esc_url($portfolio_image['url']); ?>" 
                             alt="<?php echo esc_attr($portfolio_image['alt'] ?: 'Portfolio'); ?>">
                    <?php else: ?>
                        <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=600&h=400&fit=crop" 
                             alt="Portfolio work">
                    <?php endif; ?>
                </div>
                
                <a href="<?php echo esc_url($portfolio_url); ?>" class="block-frontpage-hero-banner__portfolio-button">
                    <span class="block-frontpage-hero-banner__portfolio-text"><?php echo esc_html($portfolio_text); ?></span>
                    <div class="block-frontpage-hero-banner__portfolio-icon">
                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="26" height="26" fill="black"/>
                            <path d="M8.9375 13H17.0625" stroke="white" stroke-width="1.15104" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M13.8125 9.75L17.0625 13L13.8125 16.25" stroke="white" stroke-width="1.15104" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

