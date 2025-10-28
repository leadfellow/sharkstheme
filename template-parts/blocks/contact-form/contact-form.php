<?php
/**
 * Contact Form Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields with placeholder defaults
$title = get_field('title') ?: 'Get In Touch';
$text = get_field('text') ?: 'Have a question or want to work together? We\'d love to hear from you. Send us a message and we\'ll respond within 24 hours.';
$cf7_shortcode = get_field('cf7_shortcode') ?: '';
$show_contact_info = get_field('show_contact_info') ?: true;
$email = get_field('email') ?: 'hello@example.com';
$phone = get_field('phone') ?: '+1 (555) 123-4567';
$address = get_field('address') ?: '123 Business Street, Suite 100, City, State 12345';

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = !empty($block['anchor']) ? $block['anchor'] : 'contact-' . $block['id'];
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';

// Two column class
$two_column_class = $show_contact_info ? ' block-contact__inner--two-column' : '';
?>

<section id="<?php echo esc_attr($anchor); ?>" class="block-contact<?php echo esc_attr($align_class . $class_name); ?>">
  <div class="container">
    <div class="block-contact__inner<?php echo esc_attr($two_column_class); ?>">
      <?php if ($show_contact_info && ($email || $phone || $address)): ?>
        <div class="block-contact__content">
          <h2 class="block-contact__title"><?php echo esc_html($title); ?></h2>
          
          <?php if ($text): ?>
            <p class="block-contact__text"><?php echo esc_html($text); ?></p>
          <?php endif; ?>
          
          <div class="block-contact__info">
            <?php if ($email): ?>
              <div class="contact-info-item">
                <svg class="contact-info-item__icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <div class="contact-info-item__content">
                  <p class="contact-info-item__label">Email</p>
                  <p class="contact-info-item__value">
                    <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                  </p>
                </div>
              </div>
            <?php endif; ?>
            
            <?php if ($phone): ?>
              <div class="contact-info-item">
                <svg class="contact-info-item__icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
                <div class="contact-info-item__content">
                  <p class="contact-info-item__label">Phone</p>
                  <p class="contact-info-item__value">
                    <a href="tel:<?php echo esc_attr(str_replace(' ', '', $phone)); ?>"><?php echo esc_html($phone); ?></a>
                  </p>
                </div>
              </div>
            <?php endif; ?>
            
            <?php if ($address): ?>
              <div class="contact-info-item">
                <svg class="contact-info-item__icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <div class="contact-info-item__content">
                  <p class="contact-info-item__label">Address</p>
                  <p class="contact-info-item__value"><?php echo esc_html($address); ?></p>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      <?php else: ?>
        <div class="block-contact__content">
          <h2 class="block-contact__title"><?php echo esc_html($title); ?></h2>
          
          <?php if ($text): ?>
            <p class="block-contact__text"><?php echo esc_html($text); ?></p>
          <?php endif; ?>
        </div>
      <?php endif; ?>
      
      <div class="block-contact__form">
        <?php if ($cf7_shortcode): ?>
          <?php echo do_shortcode($cf7_shortcode); ?>
        <?php else: ?>
          <p><em>Please add a Contact Form 7 shortcode in the block settings.</em></p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

