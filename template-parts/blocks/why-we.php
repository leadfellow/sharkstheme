<?php
/**
 * Block Name: Why We
 * Description: Miks meie blokk koos animeeritud numbritega
 * Category: sharks-blocks
 * Icon: chart-line
 * Keywords: why we statistics stats numbrid
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'why-we-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'why-we-block';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$heading = get_field('heading') ?: 'miks meie';
$main_description = get_field('main_description') ?: '';
$sub_description = get_field('sub_description') ?: '';
$stats = get_field('stats') ?: [];
$image_top_left = get_field('image_top_left');
$image_bottom_right = get_field('image_bottom_right');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="why-we-container">
        <div class="why-we-content-wrapper">
            <?php if ($heading): ?>
                <p class="why-we-heading"><?php echo esc_html($heading); ?></p>
            <?php endif; ?>

            <div class="why-we-description-section">
                <?php if ($main_description): ?>
                    <p class="why-we-main-description"><?php echo esc_html($main_description); ?></p>
                <?php endif; ?>

                <?php if ($sub_description): ?>
                    <div class="why-we-sub-description">
                        <p><?php echo esc_html($sub_description); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php if ($stats && count($stats) > 0): ?>
            <div class="why-we-stats-container">
                <?php foreach ($stats as $stat): ?>
                    <div class="why-we-stat-item">
                        <p class="why-we-stat-number" data-target="<?php echo esc_attr($stat['number']); ?>">
                            <?php echo esc_html($stat['number']); ?>
                        </p>
                        <div class="why-we-stat-label">
                            <p><?php echo esc_html($stat['label']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($image_top_left): ?>
            <div class="why-we-image-wrapper why-we-image-wrapper-top-left">
                <div class="why-we-image-bg"></div>
                <img src="<?php echo esc_url($image_top_left['url']); ?>" 
                     alt="<?php echo esc_attr($image_top_left['alt'] ?: ''); ?>" 
                     class="why-we-laptop-image-1">
            </div>
        <?php endif; ?>

        <?php if ($image_bottom_right): ?>
            <div class="why-we-image-wrapper why-we-image-wrapper-bottom-right">
                <div class="why-we-image-bg"></div>
                <img src="<?php echo esc_url($image_bottom_right['url']); ?>" 
                     alt="<?php echo esc_attr($image_bottom_right['alt'] ?: ''); ?>" 
                     class="why-we-laptop-image-2">
            </div>
        <?php endif; ?>
    </div>
</div>
