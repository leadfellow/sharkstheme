<?php
/**
 * Label Bar Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$labels = get_field('labels');
$background_color = get_field('background_color') ?: '#e1ff04';
$text_color = get_field('text_color') ?: '#000000';
$separator_icon = get_field('separator_icon') ?: 'x';

// Separator icon mapping
$separator_map = [
    'x' => '<svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M15.2369 0.7631C14.8155 0.341651 14.1322 0.341651 13.7107 0.7631L11.2369 3.2369C9.44921 5.02459 6.55079 5.02459 4.7631 3.2369L2.2893 0.7631C1.86785 0.341651 1.18455 0.341651 0.7631 0.7631C0.341651 1.18455 0.341651 1.86785 0.763099 2.2893L3.2369 4.7631C5.02459 6.55079 5.02459 9.44921 3.2369 11.2369L0.7631 13.7107C0.341651 14.1322 0.341651 14.8155 0.7631 15.2369C1.18455 15.6583 1.86785 15.6583 2.2893 15.2369L4.7631 12.7631C6.55079 10.9754 9.44921 10.9754 11.2369 12.7631L13.7107 15.2369C14.1322 15.6583 14.8155 15.6583 15.2369 15.2369C15.6583 14.8155 15.6583 14.1322 15.2369 13.7107L12.7631 11.2369C10.9754 9.44921 10.9754 6.55079 12.7631 4.7631L15.2369 2.2893C15.6583 1.86785 15.6583 1.18455 15.2369 0.7631Z" fill="currentColor"/></svg>',
    'asterisk' => '<svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M9.92969 3.31641L12.082 1.14258L14.8398 3.90039L12.666 6.05273H15.7344V9.92969H12.9004L15.0039 11.8262L12.3633 14.6572L9.92969 12.4199V15.7578H6.05273V12.7129L3.90039 14.8398L1.14258 12.082L3.31641 9.92969H0.246094V6.05273H3.07812L1.00195 4.13867L3.64258 1.30664L6.05273 3.54492V0.246094H9.92969V3.31641Z" fill="currentColor"/></svg>',
    'star' => '<svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M8.00002 0.00012207L8.00313 7.99223L11.0228 0.607747L8.00879 7.9935L13.6052 2.39746L8.0067 7.99562L15.3915 4.93555L8.00786 7.99597L16 8.00002L8.00786 8.00313L15.3915 11.0228L8.0067 8.00879L13.6052 13.6052L8.00879 8.0067L11.0228 15.3915L8.00313 8.00786L8.00002 16L7.99692 8.00786L4.97747 15.3915L7.99145 8.0067L2.39746 13.6052L7.99562 8.00879L0.607747 11.0228L7.99223 8.00313L0.00012207 8.00002L7.99223 7.99692L0.607747 4.97747L7.99562 7.99145L2.39746 2.39746L7.99145 7.99562L4.97747 0.607747L7.99692 7.99223L8.00002 0.00012207Z" stroke="currentColor" stroke-width="0.533333"/></svg>',
    'plus' => '<svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M8 2.66667V13.3333M2.66667 8H13.3333" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
    'dot' => '<svg width="16" height="16" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="2.5" fill="currentColor"/></svg>'
];

$separator_svg = isset($separator_map[$separator_icon]) ? $separator_map[$separator_icon] : $separator_map['x'];

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = sharks_get_block_anchor($block, 'label-bar');
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';
?>

<section id="<?php echo esc_attr($anchor); ?>" class="block-label-bar<?php echo esc_attr($align_class . $class_name); ?>" style="background-color: <?php echo esc_attr($background_color); ?>">
    <div class="block-label-bar__container">
        <div class="block-label-bar__inner">
            <?php if ($labels && is_array($labels) && count($labels) > 0): ?>
                <?php foreach ($labels as $index => $label): ?>
                    <?php if (!empty($label['label_text'])): ?>
                        <?php if (!empty($label['label_url'])): ?>
                            <a href="<?php echo esc_url($label['label_url']); ?>" class="block-label-bar__label" style="color: <?php echo esc_attr($text_color); ?>">
                                <?php echo esc_html($label['label_text']); ?>
                            </a>
                        <?php else: ?>
                            <span class="block-label-bar__label" style="color: <?php echo esc_attr($text_color); ?>">
                                <?php echo esc_html($label['label_text']); ?>
                            </span>
                        <?php endif; ?>
                        
                        <?php if ($index < count($labels) - 1): ?>
                            <span class="block-label-bar__separator" style="color: <?php echo esc_attr($text_color); ?>">
                                <?php echo $separator_svg; ?>
                            </span>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Default placeholder -->
                <span class="block-label-bar__label" style="color: <?php echo esc_attr($text_color); ?>">UX/UI</span>
                <span class="block-label-bar__separator" style="color: <?php echo esc_attr($text_color); ?>">
                    <?php echo $separator_svg; ?>
                </span>
                <span class="block-label-bar__label" style="color: <?php echo esc_attr($text_color); ?>">WP ARENDUS</span>
                <span class="block-label-bar__separator" style="color: <?php echo esc_attr($text_color); ?>">
                    <?php echo $separator_svg; ?>
                </span>
                <span class="block-label-bar__label" style="color: <?php echo esc_attr($text_color); ?>">SEO</span>
            <?php endif; ?>
        </div>
    </div>
</section>

