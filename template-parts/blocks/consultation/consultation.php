<?php
/**
 * Consultation Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$heading = get_field('heading') ?: 'Soovid nõu digiturunduses?';
$description = get_field('description') ?: 'Oleme avatud ka tasuta 30-minutiliseks konsultatsiooniks – broneeri aeg endale sobival hetkel.';
$button_text = get_field('button_text') ?: 'Broneeri konsultatsioon';
$button_url = get_field('button_url') ?: '#';
$ticker_enabled = get_field('ticker_enabled');
$ticker_text = get_field('ticker_text') ?: 'Astu turundusteadlik samm ja tule konsultatsioonile';
$ticker_bg_color = get_field('ticker_bg_color') ?: '#f237a6';

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = !empty($block['anchor']) ? $block['anchor'] : 'consultation-' . $block['id'];
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';
?>

<section id="<?php echo esc_attr($anchor); ?>" class="block-consultation<?php echo esc_attr($align_class . $class_name); ?>">
  <!-- Hero Section -->
  <div class="block-consultation__hero">
    <!-- Background Pattern -->
    <svg class="block-consultation__background-pattern" fill="none" preserveAspectRatio="none" viewBox="0 0 748 748">
      <mask fill="white" id="path-consultation-<?php echo esc_attr($anchor); ?>">
        <path d="M467.316 148.209L572.117 43.4082L704.295 175.585L599.493 280.387H747.706V467.313H611.825L711.387 559.779L584.181 696.747L467.316 588.211V747.706H280.39V599.489L175.587 704.292L43.4102 572.115L148.212 467.313H0V280.387H135.87L36.3105 187.923L163.517 50.9551L280.39 159.498V0H467.316V148.209Z" />
      </mask>
      <path d="M467.316 148.209H466.316V150.623L468.024 148.916L467.316 148.209ZM572.117 43.4082L572.824 42.7011L572.117 41.994L571.41 42.7011L572.117 43.4082ZM704.295 175.585L705.002 176.292L705.709 175.585L705.002 174.878L704.295 175.585ZM599.493 280.387L598.786 279.68L597.079 281.387H599.493V280.387ZM747.706 280.387H748.706V279.387H747.706V280.387ZM747.706 467.313V468.313H748.706V467.313H747.706ZM611.825 467.313V466.313H609.279L611.145 468.046L611.825 467.313ZM711.387 559.779L712.119 560.46L712.8 559.727L712.067 559.047L711.387 559.779ZM584.181 696.747L583.5 697.48L584.233 698.16L584.913 697.428L584.181 696.747ZM467.316 588.211L467.997 587.478L466.316 585.917V588.211H467.316ZM467.316 747.706V748.706H468.316V747.706H467.316ZM280.39 747.706H279.39V748.706H280.39V747.706ZM280.39 599.489H281.39V597.075L279.683 598.782L280.39 599.489ZM175.587 704.292L174.88 704.999L175.587 705.706L176.294 704.999L175.587 704.292ZM43.4102 572.115L42.703 571.408L41.9959 572.115L42.703 572.822L43.4102 572.115ZM148.212 467.313L148.919 468.021L150.626 466.313H148.212V467.313ZM0 467.313H-1V468.313H0V467.313ZM0 280.387V279.387H-1V280.387H0ZM135.87 280.387V281.387H138.416L136.551 279.654L135.87 280.387ZM36.3105 187.923L35.5778 187.242L34.8973 187.975L35.63 188.656L36.3105 187.923ZM163.517 50.9551L164.197 50.2223L163.464 49.5418L162.784 50.2746L163.517 50.9551ZM280.39 159.498L279.709 160.231L281.39 161.792V159.498H280.39ZM280.39 0V-1H279.39V0H280.39ZM467.316 0H468.316V-1H467.316V0Z" fill="#757472" mask="url(#path-consultation-<?php echo esc_attr($anchor); ?>)" />
    </svg>

    <div class="block-consultation__hero-content">
      <!-- Star Icon -->
      <svg class="block-consultation__star-icon" fill="none" preserveAspectRatio="none" viewBox="0 0 62 62">
        <path d="M30.8379 61.6748L22.0195 40.8555L30.8379 44.8672L40.4795 40.4795L30.8379 61.6748ZM17.7773 30.8379L22.0195 40.8555L0 30.8379L21.6621 21.6631L17.7773 30.8379ZM61.6748 30.8379L40.4795 40.4795L44.8672 30.8379L40.8555 22.0205L61.6748 30.8379ZM40.8555 22.0205L30.8379 17.7783L21.6621 21.6631L30.8379 0L40.8555 22.0205Z" fill="white" />
      </svg>

      <!-- Text Content -->
      <div class="block-consultation__text-content">
        <h2 class="block-consultation__heading"><?php echo esc_html($heading); ?></h2>
        <div class="block-consultation__description">
          <?php echo wpautop(esc_html($description)); ?>
        </div>
      </div>

      <!-- CTA Button -->
      <a href="<?php echo esc_url($button_url); ?>" class="block-consultation__button">
        <span class="block-consultation__button-text"><?php echo esc_html($button_text); ?></span>
        <div class="block-consultation__arrow-icon">
          <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
            <g transform="translate(10, 11)">
              <path d="M0.708333 4.70827L10.7083 4.70827" stroke="black" stroke-width="1.41667" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M6.70833 0.708333L10.7083 4.70833L6.70833 8.70833" stroke="black" stroke-width="1.41667" stroke-linecap="round" stroke-linejoin="round" />
            </g>
          </svg>
        </div>
      </a>
    </div>
  </div>

  <!-- Ticker Banner -->
  <?php if ($ticker_enabled): ?>
    <div class="block-consultation__ticker" style="background-color: <?php echo esc_attr($ticker_bg_color); ?>;">
      <div class="block-consultation__ticker-wrapper">
        <div class="block-consultation__ticker-content">
          <?php 
          // Repeat ticker content multiple times for seamless loop
          for ($i = 0; $i < 10; $i++): 
          ?>
            <span class="block-consultation__ticker-text"><?php echo esc_html($ticker_text); ?></span>
            <svg class="block-consultation__ticker-icon" viewBox="0 0 16 16" fill="none">
              <path d="M15.2369 0.7631C14.8155 0.341651 14.1322 0.341651 13.7107 0.7631L11.2369 3.2369C9.44921 5.02459 6.55079 5.02459 4.7631 3.2369L2.2893 0.7631C1.86785 0.341651 1.18455 0.341651 0.7631 0.7631C0.341651 1.18455 0.341651 1.86785 0.763099 2.2893L3.2369 4.7631C5.02459 6.55079 5.02459 9.44921 3.2369 11.2369L0.7631 13.7107C0.341651 14.1322 0.341651 14.8155 0.7631 15.2369C1.18455 15.6583 1.86785 15.6583 2.2893 15.2369L4.7631 12.7631C6.55079 10.9754 9.44921 10.9754 11.2369 12.7631L13.7107 15.2369C14.1322 15.6583 14.8155 15.6583 15.2369 15.2369C15.6583 14.8155 15.6583 14.1322 15.2369 13.7107L12.7631 11.2369C10.9754 9.44921 10.9754 6.55079 12.7631 4.7631L15.2369 2.2893C15.6583 1.86785 15.6583 1.18455 15.2369 0.7631Z" fill="white" />
            </svg>
          <?php endfor; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
</section>
