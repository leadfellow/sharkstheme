<?php
/**
 * Specialist Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$heading_parts = get_field('heading_parts');
$bio_text = get_field('bio_text');
$image = get_field('image');
$name = get_field('name');
$position = get_field('position');
$linkedin_url = get_field('linkedin_url');

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = !empty($block['anchor']) ? $block['anchor'] : 'specialist-' . $block['id'];
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';

// Icon mapping
$icon_map = [
    'x' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><path d="M59.043 2.95701C57.4099 1.3239 54.7621 1.3239 53.129 2.95701L43.543 12.543C36.6157 19.4703 25.3843 19.4703 18.457 12.543L8.87103 2.95701C7.23792 1.3239 4.59012 1.3239 2.95701 2.95701C1.3239 4.59012 1.3239 7.23792 2.95701 8.87103L12.543 18.457C19.4703 25.3843 19.4703 36.6157 12.543 43.543L2.95701 53.129C1.3239 54.7621 1.3239 57.4099 2.95701 59.043C4.59012 60.6761 7.23792 60.6761 8.87103 59.043L18.457 49.457C25.3843 42.5297 36.6157 42.5297 43.543 49.457L53.129 59.043C54.7621 60.6761 57.4099 60.6761 59.043 59.043C60.6761 57.4099 60.6761 54.7621 59.043 53.129L49.457 43.543C42.5297 36.6157 42.5297 25.3843 49.457 18.457L59.043 8.87103C60.6761 7.23792 60.6761 4.59012 59.043 2.95701Z" fill="black"/></svg>',
    'asterisk' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><path d="M38.5116 12.8651L46.9344 4.44225L57.5575 15.0653L49.1346 23.4882H61.0467L61.0458 38.5116H50.1258L58.1278 45.9432L47.9042 56.951L38.5116 48.2274V61.0467H23.4882V49.1337L15.0653 57.5565L4.44323 46.9335L12.8651 38.5116H0.953974V23.4882H11.8729L3.87194 16.0575L14.0956 5.04968L23.4882 13.7723V0.953974H38.5116V12.8651Z" fill="black"/></svg>',
    'star' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><path d="M31.0002 0.000244141L31.0062 30.9697L42.8635 2.35997L31.0175 30.9745L52.9205 9.07994L31.026 30.983L59.6405 19.137L31.0307 30.9942L62.0002 31.0002L31.0307 31.0062L59.6405 42.8635L31.026 31.0175L52.9205 52.9205L31.0175 31.026L42.8635 59.6405L31.0062 31.0307L31.0002 62.0002L30.9942 31.0307L19.137 59.6405L30.983 31.026L9.07994 52.9205L30.9745 31.0175L2.35997 42.8635L30.9697 31.0062L0.000244141 31.0002L30.9697 30.9942L2.35997 19.137L30.9745 30.983L9.07994 9.07994L30.983 30.9745L19.137 2.35997L30.9942 30.9697L31.0002 0.000244141Z" stroke="black" stroke-width="2.06667"/></svg>',
    'circle' => '<svg width="62" height="62" viewBox="0 0 62 62" fill="none"><circle cx="31" cy="31" r="30" fill="black"/></svg>'
];
?>

<section id="<?php echo esc_attr($anchor); ?>" class="block-specialist<?php echo esc_attr($align_class . $class_name); ?>">
    <div class="block-specialist__container">
        <div class="block-specialist__content">
            <!-- Left Column -->
            <div class="block-specialist__left">
                <!-- Heading with parts -->
                <?php if ($heading_parts && is_array($heading_parts)): ?>
                    <div class="block-specialist__heading-wrapper">
                        <h2 class="block-specialist__heading"><?php 
                            foreach ($heading_parts as $part): 
                                if ($part['part_type'] === 'text' && !empty($part['text'])): 
                                    ?><span class="block-specialist__heading-part block-specialist__heading-part--<?php echo esc_attr($part['color'] ?: 'black'); ?>"><?php echo esc_html($part['text']); ?></span><?php
                                elseif ($part['part_type'] === 'icon' && !empty($part['icon'])): 
                                    ?><span class="block-specialist__heading-icon"><?php echo isset($icon_map[$part['icon']]) ? $icon_map[$part['icon']] : $icon_map['x']; ?></span><?php
                                elseif ($part['part_type'] === 'line_break'): 
                                    ?><br class="block-specialist__heading-break"><?php
                                endif;
                            endforeach; 
                        ?></h2>
                    </div>
                <?php endif; ?>
                
                <!-- Bio Text -->
                <?php if ($bio_text): ?>
                    <div class="block-specialist__bio">
                        <?php echo wpautop($bio_text); ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Right Column -->
            <div class="block-specialist__right">
                <!-- Profile Image -->
                <?php if ($image && !empty($image['url'])): ?>
                    <div class="block-specialist__image">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?: $name); ?>">
                    </div>
                <?php else: ?>
                    <div class="block-specialist__image block-specialist__image--placeholder"></div>
                <?php endif; ?>
                
                <!-- Name & LinkedIn -->
                <div class="block-specialist__info">
                    <div class="block-specialist__name-wrapper">
                        <?php if ($name): ?>
                            <p class="block-specialist__name"><?php echo esc_html($name); ?></p>
                        <?php endif; ?>
                        <?php if ($position): ?>
                            <p class="block-specialist__position"><?php echo esc_html($position); ?></p>
                        <?php endif; ?>
                    </div>
                    
                    <?php if ($linkedin_url): ?>
                        <a href="<?php echo esc_url($linkedin_url); ?>" target="_blank" rel="noopener" class="block-specialist__linkedin">
                            <span class="block-specialist__linkedin-text">LinkedIn</span>
                            <span class="block-specialist__linkedin-icon">
                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none">
                                    <rect fill="black" height="26" width="26"/>
                                    <path d="M8.9375 13H17.0625" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.15104"/>
                                    <path d="M13.8125 9.75L17.0625 13L13.8125 16.25" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.15104"/>
                                </svg>
                            </span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>


