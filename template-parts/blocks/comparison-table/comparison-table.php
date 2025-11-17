<?php
/**
 * Comparison Table Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get block fields
$table_title = get_field('table_title');
$column_headers = get_field('column_headers');
$table_rows = get_field('table_rows');

// Block attributes
$block_id = 'comparison-table-' . ($block['id'] ?? uniqid());
$class_name = 'block-comparison-table';
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

// Return if no data
if (empty($table_title) || empty($column_headers) || empty($table_rows)) {
    if (is_admin()) {
        echo '<div class="acf-block-preview"><p>Please add table title, columns and rows...</p></div>';
    }
    return;
}
?>

<section <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <div class="comparison-table">
            <?php if ($table_title): ?>
                <h2 class="comparison-table__title"><?php echo esc_html($table_title); ?></h2>
            <?php endif; ?>
            
            <div class="comparison-table__wrapper">
                <!-- Header Row -->
                <div class="comparison-table__row comparison-table__row--header">
                    <div class="comparison-table__cell comparison-table__cell--empty"></div>
                    <?php foreach ($column_headers as $header): ?>
                        <div class="comparison-table__cell comparison-table__cell--header">
                            <?php echo esc_html($header['column_name']); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <!-- Data Rows -->
                <?php foreach ($table_rows as $row): ?>
                    <div class="comparison-table__row">
                        <div class="comparison-table__cell comparison-table__cell--label">
                            <?php echo esc_html($row['row_label']); ?>
                        </div>
                        <?php 
                        if (!empty($row['cells'])):
                            foreach ($row['cells'] as $cell): ?>
                                <div class="comparison-table__cell comparison-table__cell--data">
                                    <?php echo wp_kses_post(nl2br($cell['content'])); ?>
                                </div>
                            <?php endforeach;
                        endif;
                        ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

