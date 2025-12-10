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
$subtitle = get_field('subtitle');
$description = get_field('description');
$read_more_text = get_field('read_more_text');
$read_more_url = get_field('read_more_url');

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = !empty($block['anchor']) ? $block['anchor'] : 'sharks-headings-' . $block['id'];
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';

// Alignment class
$align_text_class = ' sharks-headings--' . $alignment;

// Icon mapping (SVG)
$icon_map = [
    'x' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M59.043 2.95701C57.4099 1.3239 54.7621 1.3239 53.129 2.95701L43.543 12.543C36.6157 19.4703 25.3843 19.4703 18.457 12.543L8.87103 2.95701C7.23792 1.3239 4.59012 1.3239 2.95701 2.95701C1.3239 4.59012 1.3239 7.23792 2.95701 8.87103L12.543 18.457C19.4703 25.3843 19.4703 36.6157 12.543 43.543L2.95701 53.129C1.3239 54.7621 1.3239 57.4099 2.95701 59.043C4.59012 60.6761 7.23792 60.6761 8.87103 59.043L18.457 49.457C25.3843 42.5297 36.6157 42.5297 43.543 49.457L53.129 59.043C54.7621 60.6761 57.4099 60.6761 59.043 59.043C60.6761 57.4099 60.6761 54.7621 59.043 53.129L49.457 43.543C42.5297 36.6157 42.5297 25.3843 49.457 18.457L59.043 8.87103C60.6761 7.23792 60.6761 4.59012 59.043 2.95701Z" fill="black"/></svg>',
    'asterisk' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M38.5117 12.8651L46.9346 4.44226L57.5576 15.0653L49.1348 23.4882H61.0459V38.5116H50.126L58.1279 45.9432L47.9043 56.951L38.5117 48.2274V61.0468H23.4883V49.1346L15.0654 57.5575L4.44336 46.9344L12.8662 38.5116H0.953125V23.4882H11.874L3.87305 16.0575L14.0967 5.04871L23.4883 13.7704V0.953979H38.5117V12.8651Z" fill="black"/></svg>',
    'star' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M31.0002 0.000244141L31.0062 30.9697L42.8635 2.35997L31.0175 30.9745L52.9205 9.07994L31.026 30.983L59.6405 19.137L31.0307 30.9942L62.0002 31.0002L31.0307 31.0062L59.6405 42.8635L31.026 31.0175L52.9205 52.9205L31.0175 31.026L42.8635 59.6405L31.0062 31.0307L31.0002 62.0002L30.9942 31.0307L19.137 59.6405L30.983 31.026L9.07994 52.9205L30.9745 31.0175L2.35997 42.8635L30.9697 31.0062L0.000244141 31.0002L30.9697 30.9942L2.35997 19.137L30.9745 30.983L9.07994 9.07994L30.983 30.9745L19.137 2.35997L30.9942 30.9697L31.0002 0.000244141Z" stroke="black" stroke-width="2.06667"/></svg>',
    'circle' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="31" cy="31" r="30" fill="black"/></svg>',
    'arrow' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 31H52M52 31L31 10M52 31L31 52" stroke="black" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg>',
    'check' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M52 15L23 50L10 37" stroke="black" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg>',
    'plus' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M31 10V52M10 31H52" stroke="black" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/></svg>'
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
        $icon_svg = isset($icon_map[$part['icon']]) ? $icon_map[$part['icon']] : $icon_map['x'];
        ?>
        <span class="sharks-headings__icon">
          <?php echo $icon_svg; ?>
        </span>
      <?php elseif ($part['part_type'] === 'line_break'): ?>
        <br class="sharks-headings__break">
      <?php endif;
    endforeach;
  else: 
    // Default placeholder
    ?>
    <span class="sharks-headings__part sharks-headings__part--light">MIDAPEAD</span>
    <span class="sharks-headings__icon">
      <?php echo $icon_map['x']; ?>
    </span>
    <span class="sharks-headings__part sharks-headings__part--light">TEADMA</span>
  <?php endif;
  
  echo $tag_close;
  ?>
  
  <?php if ($subtitle): ?>
    <p class="sharks-headings__subtitle"><?php echo esc_html($subtitle); ?></p>
  <?php endif; ?>
  
  <?php if ($description): ?>
    <p class="sharks-headings__description"><?php echo nl2br(esc_html($description)); ?></p>
  <?php endif; ?>
  
  <?php if ($read_more_text && $read_more_url): ?>
    <a href="<?php echo esc_url($read_more_url); ?>" class="sharks-headings__read-more">
      <span class="sharks-headings__read-more-text"><?php echo esc_html($read_more_text); ?></span>
      <span class="sharks-headings__read-more-icon">
        <svg width="26" height="26" viewBox="0 0 26 26" fill="none">
          <rect fill="black" height="26" width="26"/>
          <path d="M8.9375 13H17.0625" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.15104"/>
          <path d="M13.8125 9.75L17.0625 13L13.8125 16.25" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.15104"/>
        </svg>
      </span>
    </a>
  <?php endif; ?>
</div>

