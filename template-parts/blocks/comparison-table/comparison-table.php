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
$table_subtitle = get_field('table_subtitle');
$background_color = get_field('background_color') ?: 'dark';
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
// Add background color class
$class_name .= ' block-comparison-table--' . esc_attr($background_color);

// Block anchor
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Return if no data
if (empty($column_headers) || empty($table_rows)) {
    if (is_admin()) {
        echo '<div class="acf-block-preview"><p>Please add columns and rows...</p></div>';
    }
    return;
}
?>

<section <?php echo $anchor; ?>class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <div class="comparison-table">
            <?php if ($table_title || $table_subtitle): ?>
                <div class="comparison-table__header">
                    <?php if ($table_title): ?>
                        <h2 class="comparison-table__title comparison-table__title--line1"><?php echo esc_html($table_title); ?></h2>
                    <?php endif; ?>
                    <?php if ($table_subtitle): ?>
                        <h2 class="comparison-table__title comparison-table__title--line2"><?php echo esc_html($table_subtitle); ?></h2>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
            <div class="comparison-table__wrapper">
                <!-- Header Row -->
                <div class="comparison-table__row comparison-table__row--header">
                    <div class="comparison-table__cell comparison-table__cell--empty"></div>
                    <?php foreach ($column_headers as $header): ?>
                        <div class="comparison-table__cell comparison-table__cell--header">
                            <?php if (!empty($header['column_name_line1'])): ?>
                                <span class="comparison-table__header-line1"><?php echo esc_html($header['column_name_line1']); ?></span>
                            <?php endif; ?>
                            <?php if (!empty($header['column_name_line2'])): ?>
                                <span class="comparison-table__header-line2"><?php echo esc_html($header['column_name_line2']); ?></span>
                            <?php endif; ?>
                            <?php 
                            // Fallback for old single-line format
                            if (empty($header['column_name_line1']) && empty($header['column_name_line2']) && !empty($header['column_name'])): 
                                echo esc_html($header['column_name']); 
                            endif; 
                            ?>
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
                            foreach ($row['cells'] as $cell): 
                                // Convert + to checkmark and - to cross
                                $content = $cell['content'];
                                $cell_class = 'comparison-table__cell comparison-table__cell--data';
                                
                                // Check if content starts with + or -
                                if (trim($content) === '+') {
                                    // Just a plus sign - show box only
                                    $content = '';
                                    $cell_class .= ' comparison-table__cell--check';
                                } elseif (strpos(trim($content), '+') === 0) {
                                    // Starts with plus, show text after +
                                    $content = trim(substr(trim($content), 1));
                                    $cell_class .= ' comparison-table__cell--check-text';
                                } elseif (trim($content) === '-') {
                                    // Just a minus sign - show box only
                                    $content = '';
                                    $cell_class .= ' comparison-table__cell--cross';
                                } elseif (strpos(trim($content), '-') === 0) {
                                    // Starts with minus, show text after -
                                    $content = trim(substr(trim($content), 1));
                                    $cell_class .= ' comparison-table__cell--cross-text';
                                }
                                ?>
                                <div class="<?php echo esc_attr($cell_class); ?>">
                                    <?php echo wp_kses_post(nl2br($content)); ?>
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

