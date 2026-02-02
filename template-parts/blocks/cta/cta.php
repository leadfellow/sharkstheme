<?php
/**
 * CTA Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields with placeholder defaults
$subheadline = get_field('subheadline');
$use_heading_parts = get_field('use_heading_parts');
$heading_parts = get_field('heading_parts');
$title = get_field('title') ?: 'Ready to Take Your Business to the Next Level?';
$text = get_field('text') ?: 'Join thousands of satisfied clients who have transformed their business with our solutions. Get started today and see results in days, not months.';
$primary_button_text = get_field('primary_button_text');
$primary_button_type = get_field('primary_button_type') ?: 'link';
$primary_button_url = get_field('primary_button_url');
$primary_modal_title = get_field('primary_modal_title');
$primary_modal_description = get_field('primary_modal_description');
$primary_modal_content = get_field('primary_modal_content');
$secondary_button_text = get_field('secondary_button_text');
$secondary_button_type = get_field('secondary_button_type') ?: 'link';
$secondary_button_url = get_field('secondary_button_url');
$secondary_modal_title = get_field('secondary_modal_title');
$secondary_modal_description = get_field('secondary_modal_description');
$secondary_modal_content = get_field('secondary_modal_content');
$show_icon = get_field('show_icon');
$style_variant = get_field('style_variant') ?: 'default';
$show_marquee = get_field('show_marquee');
$marquee_text = get_field('marquee_text') ?: 'Astu turundusteadlik samm ja tule konsultatsioonile';
$marquee_bg_color = get_field('marquee_bg_color') ?: '#f237a6';

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = sharks_get_block_anchor($block, 'cta');
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';

// Style variant class
$variant_class = $style_variant !== 'default' ? ' block-cta--' . $style_variant : '';
?>

<section id="<?php echo esc_attr($anchor); ?>" class="block-cta<?php echo esc_attr($align_class . $variant_class . $class_name); ?>">
  <?php if ($style_variant === 'centered-dark'): ?>
    <!-- Circle decorations -->
    <div class="block-cta__circles">
      <div class="block-cta__circle block-cta__circle--1"></div>
      <div class="block-cta__circle block-cta__circle--2"></div>
      <div class="block-cta__circle block-cta__circle--3"></div>
    </div>
  <?php endif; ?>
  
  <?php if ($style_variant === 'dark'): ?>
    <!-- Corner decorations -->
    <div class="block-cta__corners">
      <div class="block-cta__corner block-cta__corner--tl"></div>
      <div class="block-cta__corner block-cta__corner--tr"></div>
      <div class="block-cta__corner block-cta__corner--bl"></div>
      <div class="block-cta__corner block-cta__corner--br"></div>
    </div>
  <?php endif; ?>
  
  <?php if ($style_variant === 'dark-pattern'): ?>
    <!-- Pattern decorations (Star grid) -->
    <div class="block-cta__pattern">
      <svg class="block-cta__pattern-svg" width="861" height="627" viewBox="0 0 861 627" fill="none" xmlns="http://www.w3.org/2000/svg">
        <mask id="path-1-inside-1_241_2114" fill="white">
          <path d="M537.683 54.2334L658.265 -66.3477L810.344 85.7314L689.761 206.314H860.292L860.291 421.388H703.951L818.504 527.776L672.144 685.368L537.683 560.489V744H322.61V573.465L202.025 694.05L49.9463 541.97L170.528 421.388H0V206.314H156.329L41.7773 99.9268L188.138 -57.6641L322.61 67.2246V-116.292H537.683V54.2334Z"/>
        </mask>
        <path d="M537.683 54.2334H536.683V56.6476L538.39 54.9405L537.683 54.2334ZM658.265 -66.3477L658.972 -67.0548L658.265 -67.7619L657.558 -67.0548L658.265 -66.3477ZM810.344 85.7314L811.051 86.4386L811.758 85.7314L811.051 85.0243L810.344 85.7314ZM689.761 206.314L689.054 205.607L687.347 207.314H689.761V206.314ZM860.292 206.314H861.292V205.314H860.292V206.314ZM860.291 421.388V422.388H861.291V421.388H860.291ZM703.951 421.388V420.388H701.405L703.271 422.12L703.951 421.388ZM818.504 527.776L819.237 528.457L819.917 527.724L819.184 527.044L818.504 527.776ZM672.144 685.368L671.463 686.101L672.196 686.781L672.876 686.049L672.144 685.368ZM537.683 560.489L538.363 559.757L536.683 558.196V560.489H537.683ZM537.683 744V745H538.683V744H537.683ZM322.61 744H321.61V745H322.61V744ZM322.61 573.465H323.61V571.051L321.903 572.758L322.61 573.465ZM202.025 694.05L201.318 694.757L202.025 695.464L202.732 694.757L202.025 694.05ZM49.9463 541.97L49.2392 541.263L48.5321 541.97L49.2392 542.677L49.9463 541.97ZM170.528 421.388L171.235 422.095L172.943 420.388H170.528V421.388ZM0 421.388H-1V422.388H0V421.388ZM0 206.314V205.314H-1V206.314H0ZM156.329 206.314V207.314H158.875L157.01 205.582L156.329 206.314ZM41.7773 99.9268L41.0446 99.2462L40.3641 99.979L41.0968 100.66L41.7773 99.9268ZM188.138 -57.6641L188.818 -58.3968L188.085 -59.0773L187.405 -58.3446L188.138 -57.6641ZM322.61 67.2246L321.93 67.9574L323.61 69.5181V67.2246H322.61ZM322.61 -116.292V-117.292H321.61V-116.292H322.61ZM537.683 -116.292H538.683V-117.292H537.683V-116.292ZM537.683 54.2334L538.39 54.9405L658.972 -65.6405L658.265 -66.3477L657.558 -67.0548L536.976 53.5263L537.683 54.2334ZM658.265 -66.3477L657.558 -65.6405L809.637 86.4386L810.344 85.7314L811.051 85.0243L658.972 -67.0548L658.265 -66.3477ZM810.344 85.7314L809.637 85.0243L689.054 205.607L689.761 206.314L690.468 207.022L811.051 86.4386L810.344 85.7314ZM689.761 206.314V207.314H860.292V206.314V205.314H689.761V206.314ZM860.292 206.314H859.292L859.291 421.388H860.291H861.291L861.292 206.314H860.292ZM860.291 421.388V420.388H703.951V421.388V422.388H860.291V421.388ZM703.951 421.388L703.271 422.12L817.823 528.509L818.504 527.776L819.184 527.044L704.632 420.655L703.951 421.388ZM818.504 527.776L817.771 527.096L671.411 684.688L672.144 685.368L672.876 686.049L819.237 528.457L818.504 527.776ZM672.144 685.368L672.824 684.635L538.363 559.757L537.683 560.489L537.002 561.222L671.463 686.101L672.144 685.368ZM537.683 560.489H536.683V744H537.683H538.683V560.489H537.683ZM537.683 744V743H322.61V744V745H537.683V744ZM322.61 744H323.61V573.465H322.61H321.61V744H322.61ZM322.61 573.465L321.903 572.758L201.318 693.343L202.025 694.05L202.732 694.757L323.317 574.172L322.61 573.465ZM202.025 694.05L202.732 693.343L50.6534 541.263L49.9463 541.97L49.2392 542.677L201.318 694.757L202.025 694.05ZM49.9463 541.97L50.6534 542.677L171.235 422.095L170.528 421.388L169.821 420.681L49.2392 541.263L49.9463 541.97ZM170.528 421.388V420.388H0V421.388V422.388H170.528V421.388ZM0 421.388H1V206.314H0H-1V421.388H0ZM0 206.314V207.314H156.329V206.314V205.314H0V206.314ZM156.329 206.314L157.01 205.582L42.4579 99.194L41.7773 99.9268L41.0968 100.66L155.649 207.047L156.329 206.314ZM41.7773 99.9268L42.5101 100.607L188.87 -56.9835L188.138 -57.6641L187.405 -58.3446L41.0446 99.2462L41.7773 99.9268ZM188.138 -57.6641L187.457 -56.9313L321.93 67.9574L322.61 67.2246L323.291 66.4919L188.818 -58.3968L188.138 -57.6641ZM322.61 67.2246H323.61V-116.292H322.61H321.61V67.2246H322.61ZM322.61 -116.292V-115.292H537.683V-116.292V-117.292H322.61V-116.292ZM537.683 -116.292H536.683V54.2334H537.683H538.683V-116.292H537.683Z" fill="#ABABAA" mask="url(#path-1-inside-1_241_2114)"/>
      </svg>
    </div>
  <?php endif; ?>
  
  <div class="container">
    <div class="block-cta__inner">
      <?php if ($show_icon): ?>
        <div class="block-cta__icon">
          <svg width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M30.8379 61.6748L22.0195 40.8555L30.8379 44.8672L40.4795 40.4795L30.8379 61.6748ZM17.7773 30.8379L22.0195 40.8555L0 30.8379L21.6621 21.6631L17.7773 30.8379ZM61.6748 30.8379L40.4795 40.4795L44.8672 30.8379L40.8555 22.0205L61.6748 30.8379ZM40.8555 22.0205L30.8379 17.7783L21.6621 21.6631L30.8379 0L40.8555 22.0205Z" fill="white"/>
          </svg>
        </div>
      <?php endif; ?>
      
      <?php if ($subheadline): ?>
        <p class="block-cta__subheadline"><?php echo esc_html($subheadline); ?></p>
      <?php endif; ?>
      
      <?php if ($use_heading_parts && $heading_parts): ?>
        <h2 class="block-cta__title block-cta__title--parts">
          <?php foreach ($heading_parts as $part): ?>
            <?php if ($part['part_type'] === 'text' && !empty($part['text'])): ?>
              <span class="block-cta__title-part block-cta__title-part--<?php echo esc_attr($part['color'] ?: 'white'); ?>">
                <?php echo esc_html($part['text']); ?>
              </span>
            <?php elseif ($part['part_type'] === 'line_break'): ?>
              <br class="block-cta__title-break">
            <?php endif; ?>
          <?php endforeach; ?>
        </h2>
      <?php else: ?>
        <h2 class="block-cta__title"><?php echo esc_html($title); ?></h2>
      <?php endif; ?>
      
      <?php if ($text): ?>
        <p class="block-cta__text"><?php echo esc_html($text); ?></p>
      <?php endif; ?>
      
      <?php if ($primary_button_text || $secondary_button_text): ?>
        <div class="block-cta__buttons">
          <?php if ($primary_button_text): ?>
            <?php if ($primary_button_type === 'modal'): ?>
              <?php
              // Process shortcodes in modal content
              $processed_content = do_shortcode($primary_modal_content);
              ?>
              <a href="#" 
                 class="btn btn--accent btn--lg<?php echo $style_variant === 'dark-pattern' ? ' btn--cta-white' : ''; ?>"
                 data-modal-trigger
                 data-modal-title="<?php echo esc_attr($primary_modal_title); ?>"
                 data-modal-description="<?php echo esc_attr($primary_modal_description); ?>"
                 data-modal-content="<?php echo esc_attr($processed_content); ?>">
                <?php echo esc_html($primary_button_text); ?>
                <?php if ($style_variant === 'dark-pattern'): ?>
                  <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g transform="translate(10.5, 11.5)">
                      <path d="M0.708333 4.70827L10.7083 4.70827" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.41667"/>
                      <path d="M6.70833 0.708333L10.7083 4.70833L6.70833 8.70833" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.41667"/>
                    </g>
                  </svg>
                <?php endif; ?>
              </a>
            <?php elseif ($primary_button_type === 'calendly' && $primary_button_url): ?>
              <a href="<?php echo esc_url($primary_button_url); ?>" target="_blank" rel="noopener noreferrer" class="btn btn--accent btn--lg<?php echo $style_variant === 'dark-pattern' ? ' btn--cta-white' : ''; ?>">
                <?php echo esc_html($primary_button_text); ?>
                <?php if ($style_variant === 'dark-pattern'): ?>
                  <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g transform="translate(10.5, 11.5)">
                      <path d="M0.708333 4.70827L10.7083 4.70827" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.41667"/>
                      <path d="M6.70833 0.708333L10.7083 4.70833L6.70833 8.70833" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.41667"/>
                    </g>
                  </svg>
                <?php endif; ?>
              </a>
            <?php elseif ($primary_button_url): ?>
              <a href="<?php echo esc_url($primary_button_url); ?>" class="btn btn--accent btn--lg<?php echo $style_variant === 'dark-pattern' ? ' btn--cta-white' : ''; ?>">
                <?php echo esc_html($primary_button_text); ?>
                <?php if ($style_variant === 'dark-pattern'): ?>
                  <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g transform="translate(10.5, 11.5)">
                      <path d="M0.708333 4.70827L10.7083 4.70827" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.41667"/>
                      <path d="M6.70833 0.708333L10.7083 4.70833L6.70833 8.70833" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.41667"/>
                    </g>
                  </svg>
                <?php endif; ?>
              </a>
            <?php endif; ?>
          <?php endif; ?>
          
          <?php if ($secondary_button_text): ?>
            <?php if ($secondary_button_type === 'modal'): ?>
              <?php
              // Process shortcodes in modal content
              $processed_secondary_content = do_shortcode($secondary_modal_content);
              ?>
              <a href="#" 
                 class="btn btn--ghost btn--lg"
                 data-modal-trigger
                 data-modal-title="<?php echo esc_attr($secondary_modal_title); ?>"
                 data-modal-description="<?php echo esc_attr($secondary_modal_description); ?>"
                 data-modal-content="<?php echo esc_attr($processed_secondary_content); ?>">
                <?php echo esc_html($secondary_button_text); ?>
              </a>
            <?php elseif ($secondary_button_type === 'calendly' && $secondary_button_url): ?>
              <a href="<?php echo esc_url($secondary_button_url); ?>" target="_blank" rel="noopener noreferrer" class="btn btn--ghost btn--lg">
                <?php echo esc_html($secondary_button_text); ?>
              </a>
            <?php elseif ($secondary_button_url): ?>
              <a href="<?php echo esc_url($secondary_button_url); ?>" class="btn btn--ghost btn--lg">
                <?php echo esc_html($secondary_button_text); ?>
              </a>
            <?php endif; ?>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
  
  <?php if ($show_marquee && $style_variant === 'dark-pattern'): ?>
    <!-- Marquee Bar -->
    <div class="block-cta__marquee" style="background-color: <?php echo esc_attr($marquee_bg_color); ?>;">
      <div class="block-cta__marquee-track">
        <?php for ($i = 0; $i < 4; $i++): ?>
          <div class="block-cta__marquee-item">
            <span class="block-cta__marquee-text"><?php echo esc_html($marquee_text); ?></span>
            <svg class="block-cta__marquee-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M15.2369 0.7631C14.8155 0.341651 14.1322 0.341651 13.7107 0.7631L11.2369 3.2369C9.44921 5.02459 6.55079 5.02459 4.7631 3.2369L2.2893 0.7631C1.86785 0.341651 1.18455 0.341651 0.7631 0.7631C0.341651 1.18455 0.341651 1.86785 0.763099 2.2893L3.2369 4.7631C5.02459 6.55079 5.02459 9.44921 3.2369 11.2369L0.7631 13.7107C0.341651 14.1322 0.341651 14.8155 0.7631 15.2369C1.18455 15.6583 1.86785 15.6583 2.2893 15.2369L4.7631 12.7631C6.55079 10.9754 9.44921 10.9754 11.2369 12.7631L13.7107 15.2369C14.1322 15.6583 14.8155 15.6583 15.2369 15.2369C15.6583 14.8155 15.6583 14.1322 15.2369 13.7107L12.7631 11.2369C10.9754 9.44921 10.9754 6.55079 12.7631 4.7631L15.2369 2.2893C15.6583 1.86785 15.6583 1.18455 15.2369 0.7631Z" fill="white"/>
            </svg>
          </div>
        <?php endfor; ?>
      </div>
    </div>
  <?php endif; ?>
</section>

