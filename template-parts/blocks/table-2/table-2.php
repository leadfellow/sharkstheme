<?php
/**
 * Table 2 Block Template
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$background_color = get_field('background_color') ?: '#FFFFFF';
$border_color = get_field('border_color') ?: '#BBBAB6';
$header_text_color = get_field('header_text_color') ?: '#000000';
$body_text_color = get_field('body_text_color') ?: '#000000';
$label_text_color = get_field('label_text_color') ?: '#000000';
$column_headers = get_field('column_headers');
$table_rows = get_field('table_rows');

// Block attributes
$align_class = !empty($block['align']) ? ' align' . $block['align'] : '';
$anchor = !empty($block['anchor']) ? $block['anchor'] : 'table-2-' . $block['id'];
$class_name = !empty($block['className']) ? ' ' . $block['className'] : '';

// Return if no data
if (empty($column_headers) || empty($table_rows)) {
    if (is_admin()) {
        echo '<div class="acf-block-preview"><p>Please add column headers and table rows...</p></div>';
    }
    return;
}
?>

<section 
    id="<?php echo esc_attr($anchor); ?>" 
    class="block-table-2<?php echo esc_attr($align_class . $class_name); ?>" 
    style="background-color: <?php echo esc_attr($background_color); ?>;">
    <div class="block-table-2__container">
        <div class="block-table-2__wrapper">
            
            <!-- Header Row -->
            <div class="block-table-2__row block-table-2__row--header" style="border-bottom: 1px solid <?php echo esc_attr($border_color); ?>;">
                <div class="block-table-2__cell block-table-2__cell--empty"></div>
                <?php foreach ($column_headers as $header): ?>
                    <div class="block-table-2__cell block-table-2__cell--header" style="color: <?php echo esc_attr($header_text_color); ?>;">
                        <?php echo esc_html($header['header_text']); ?>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <!-- Data Rows -->
            <?php foreach ($table_rows as $index => $row): 
                $is_last_row = ($index === count($table_rows) - 1);
                $border_style = $is_last_row ? '' : 'border-bottom: 1px solid ' . esc_attr($border_color) . ';';
            ?>
                <div class="block-table-2__row" style="<?php echo $border_style; ?>">
                    <div class="block-table-2__cell block-table-2__cell--label" style="color: <?php echo esc_attr($label_text_color); ?>;">
                        <?php echo esc_html($row['row_label']); ?>
                    </div>
                    <?php 
                    if (!empty($row['row_cells'])):
                        foreach ($row['row_cells'] as $cell): 
                    ?>
                        <div class="block-table-2__cell block-table-2__cell--data" style="color: <?php echo esc_attr($body_text_color); ?>;">
                            <?php echo wp_kses_post(nl2br($cell['cell_content'])); ?>
                        </div>
                    <?php 
                        endforeach;
                    endif;
                    ?>
                </div>
            <?php endforeach; ?>
            
        </div>
    </div>
</section>

