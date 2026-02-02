<?php
/**
 * Progress Block Template
 * Accordion-style progress/process section with expandable items
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get block fields
$left_icon = get_field('left_icon') ?: 'asterisk';
$right_icon = get_field('right_icon') ?: 'squares';
$main_title = get_field('main_title') ?: 'DIGITURUNDUSE PROTSESS';
$subtitle = get_field('subtitle');
$progress_items = get_field('progress_items');

// Block attributes
$block_id = 'progress-' . ($block['id'] ?? uniqid());
$class_name = 'block-progress';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $class_name .= ' align' . $block['align'];
}

// Block anchor
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Icon mapping
$icon_map = [
    'asterisk' => '<svg fill="none" preserveAspectRatio="none" viewBox="0 0 62 62"><path d="M38.5116 12.8651L46.9344 4.44225L57.5575 15.0653L49.1346 23.4882H61.0467L61.0458 38.5116H50.1258L58.1278 45.9432L47.9042 56.951L38.5116 48.2274V61.0467H23.4882V49.1346L15.0653 57.5575L4.44225 46.9344L12.8651 38.5116H0.953974V23.4882H11.8729L3.87194 16.0575L14.0956 5.0487L23.4882 13.7714V0.953974H38.5116V12.8651Z" fill="black" /></svg>',
    'star' => '<svg fill="none" preserveAspectRatio="none" viewBox="0 0 62.0004 62.0004"><path d="M31.0002 0.000200214L31.0062 30.9697L42.8635 2.35993L31.0175 30.9745L52.9205 9.0799L31.0259 30.983L59.6405 19.1369L31.0307 30.9942L62.0002 31.0002L31.0307 31.0062L59.6405 42.8635L31.0259 31.0175L52.9205 52.9205L31.0175 31.0259L42.8635 59.6405L31.0062 31.0307L31.0002 62.0002L30.9942 31.0307L19.1369 59.6405L30.983 31.0259L9.0799 52.9205L30.9745 31.0175L2.35993 42.8635L30.9697 31.0062L0.000200214 31.0002L30.9697 30.9942L2.35993 19.1369L30.9745 30.983L9.0799 9.0799L30.983 30.9745L19.1369 2.35993L30.9942 30.9697L31.0002 0.000200214Z" stroke="black" stroke-width="2.06667"/></svg>',
    'x' => '<svg fill="none" preserveAspectRatio="none" viewBox="0 0 62 62"><path d="M59.043 2.95701C57.4099 1.3239 54.7621 1.3239 53.129 2.95701L43.543 12.543C36.6157 19.4703 25.3843 19.4703 18.457 12.543L8.87103 2.95701C7.23792 1.3239 4.59012 1.3239 2.95701 2.95701C1.3239 4.59012 1.3239 7.23792 2.95701 8.87103L12.543 18.457C19.4703 25.3843 19.4703 36.6157 12.543 43.543L2.95701 53.129C1.3239 54.7621 1.3239 57.4099 2.95701 59.043C4.59012 60.6761 7.23792 60.6761 8.87103 59.043L18.457 49.457C25.3843 42.5297 36.6157 42.5297 43.543 49.457L53.129 59.043C54.7621 60.6761 57.4099 60.6761 59.043 59.043C60.6761 57.4099 60.6761 54.7621 59.043 53.129L49.457 43.543C42.5297 36.6157 42.5297 25.3843 49.457 18.457L59.043 8.87103C60.6761 7.23792 60.6761 4.59012 59.043 2.95701Z" fill="black"/></svg>',
    'squares' => '<svg fill="none" preserveAspectRatio="none" viewBox="0 0 62 62"><path d="M62 62H20.667V41.333H41.333V20.667H62V62ZM41.333 20.667H20.667V41.333H0V0H41.333V20.667Z" fill="black" /></svg>',
];

// Return if no items
if (empty($progress_items)) {
    if (is_admin()) {
        echo '<div class="acf-block-preview"><p>Please add progress items...</p></div>';
    }
    return;
}
?>

<section <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>" id="<?php echo esc_attr($block_id); ?>">
    <div class="container">
        <div class="progress-container">
            
            <!-- Header Section -->
            <div class="progress-header-section">
                <div class="progress-title-wrapper">
                    <!-- Left Icon -->
                    <div class="progress-icon-wrapper">
                        <?php echo $icon_map[$left_icon]; ?>
                    </div>
                    
                    <!-- Title -->
                    <h1 class="progress-main-title"><?php echo esc_html($main_title); ?></h1>
                    
                    <!-- Right Icon -->
                    <div class="progress-icon-wrapper">
                        <?php echo $icon_map[$right_icon]; ?>
                    </div>
                </div>
            </div>

            <!-- Subtitle -->
            <?php if ($subtitle): ?>
                <p class="progress-subtitle"><?php echo esc_html($subtitle); ?></p>
            <?php endif; ?>

            <!-- Accordion Section -->
            <div class="progress-accordion-wrapper">
                <?php foreach ($progress_items as $index => $item): 
                    $number = str_pad($index + 1, 2, '0', STR_PAD_LEFT);
                    $is_expanded = !empty($item['default_open']) ? ' progress-accordion-item-expanded' : '';
                ?>
                    <div class="progress-accordion-item<?php echo esc_attr($is_expanded); ?>">
                        <div class="progress-accordion-header">
                            <div class="progress-accordion-title-wrapper">
                                <p class="progress-accordion-number">(<?php echo esc_html($number); ?>)</p>
                                <p class="progress-accordion-title"><?php echo esc_html($item['title']); ?></p>
                            </div>
                            <div class="progress-icon-plus">
                                <svg class="progress-plus-svg" fill="none" preserveAspectRatio="none" viewBox="0 0 32 32">
                                    <path d="M30.4738 14.4739H17.5262V1.52627H14.4738V14.4739H1.52617L1.52618 17.5263L14.4738 17.5263L14.4738 30.4739H17.5262L17.5262 17.5263L30.4738 17.5263L30.4738 14.4739Z" fill="black" />
                                </svg>
                            </div>
                        </div>
                        <?php if (!empty($item['content'])): ?>
                            <div class="progress-accordion-content">
                                <div class="progress-content-inner">
                                    <p><?php echo nl2br(esc_html($item['content'])); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            
        </div>
    </div>
</section>
