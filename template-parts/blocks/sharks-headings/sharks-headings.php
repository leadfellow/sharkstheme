<?php
/**
 * Sharks Headings Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$small_label = get_field('small_label');
$heading_parts = get_field('heading_parts');
$heading_tag = get_field('heading_tag') ?: 'h2';
$alignment = get_field('alignment') ?: 'left';
$description = get_field('description');
$read_more_text = get_field('read_more_text');
$read_more_url = get_field('read_more_url');

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = !empty($block['anchor']) ? $block['anchor'] : 'sharks-headings-' . $block['id'];
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';

// Alignment class
$align_text_class = ' sharks-headings--' . $alignment;

// Icon mapping  
$icon_map = [
    'x' => '✕',
    'asterisk' => '✱',
    'star' => '◆',
    'circle' => '●',
    'arrow' => '→',
    'check' => '✓',
    'plus' => '+'
];
?>

<div id="<?php echo esc_attr($anchor); ?>" class="sharks-headings<?php echo esc_attr($align_class . $align_text_class . $class_name); ?>">
  <?php if ($small_label): ?>
    <p class="sharks-headings__label"><?php echo esc_html($small_label); ?></p>
  <?php endif; ?>
  
  <?php 
  $tag_open = '<' . esc_attr($heading_tag) . ' class="sharks-headings__title">';
  $tag_close = '</' . esc_attr($heading_tag) . '>';
  
  echo $tag_open;
  
  if ($heading_parts): 
    foreach ($heading_parts as $part):
      if ($part['part_type'] === 'text'):
        $color_class = !empty($part['color']) ? ' sharks-headings__part--' . $part['color'] : '';
        ?>
        <span class="sharks-headings__part<?php echo esc_attr($color_class); ?>">
          <?php echo esc_html($part['text']); ?>
        </span>
      <?php elseif ($part['part_type'] === 'icon'): 
        $icon_symbol = isset($icon_map[$part['icon']]) ? $icon_map[$part['icon']] : '✕';
        ?>
        <span class="sharks-headings__icon">
          <?php echo esc_html($icon_symbol); ?>
        </span>
      <?php elseif ($part['part_type'] === 'line_break'): ?>
        <br class="sharks-headings__break">
      <?php endif;
    endforeach;
  else: 
    // Default placeholder
    ?>
    <span class="sharks-headings__part sharks-headings__part--light">MIDAPEAD</span>
    <span class="sharks-headings__icon">✕</span>
    <span class="sharks-headings__part sharks-headings__part--light">TEADMA</span>
  <?php endif;
  
  echo $tag_close;
  ?>
  
  <?php if ($description): ?>
    <p class="sharks-headings__description"><?php echo nl2br(esc_html($description)); ?></p>
  <?php endif; ?>
  
  <?php if ($read_more_text && $read_more_url): ?>
    <a href="<?php echo esc_url($read_more_url); ?>" class="sharks-headings__read-more">
      <?php echo esc_html($read_more_text); ?>
      <span class="sharks-headings__read-more-icon">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M10 5V15M10 15L5 10M10 15L15 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </span>
    </a>
  <?php endif; ?>
</div>

