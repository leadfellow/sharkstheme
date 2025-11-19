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
                                $content = $cell['content'];
                                // Handle both newlines and <br> tags
                                $content = str_replace(['<br />', '<br/>', '<br>'], "\n", $content);
                                $lines = array_filter(array_map('trim', explode("\n", $content)));
                                
                                // Check if content has multiple lines with +/- markers
                                $hasMultipleMarkers = false;
                                $markerCount = 0;
                                foreach ($lines as $line) {
                                    if (preg_match('/^[+\-]/', $line)) {
                                        $markerCount++;
                                    }
                                }
                                // Only treat as multi-line if there are 2+ lines with markers
                                $hasMultipleMarkers = $markerCount >= 2;
                                
                                if ($hasMultipleMarkers && count($lines) > 0) {
                                    // Multiple lines with markers - render each separately
                                    ?>
                                    <div class="comparison-table__cell comparison-table__cell--data comparison-table__cell--multi">
                                        <?php foreach ($lines as $line): 
                                            $line = trim($line);
                                            if (empty($line)) continue;
                                            
                                            $line_class = '';
                                            $line_content = $line;
                                            
                                            if ($line === '+') {
                                                $line_class = 'comparison-table__cell-item--check';
                                                $line_content = '';
                                            } elseif (strpos($line, '+') === 0) {
                                                $line_class = 'comparison-table__cell-item--check-text';
                                                $line_content = trim(substr($line, 1));
                                            } elseif ($line === '-') {
                                                $line_class = 'comparison-table__cell-item--cross';
                                                $line_content = '';
                                            } elseif (strpos($line, '-') === 0) {
                                                $line_class = 'comparison-table__cell-item--cross-text';
                                                $line_content = trim(substr($line, 1));
                                            }
                                            ?>
                                            <div class="comparison-table__cell-item <?php echo esc_attr($line_class); ?>">
                                                <?php echo wp_kses_post($line_content); ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php
                                } else {
                                    // Single line - original logic
                                    $cell_class = 'comparison-table__cell comparison-table__cell--data';
                                    
                                    if (trim($content) === '+') {
                                        $content = '';
                                        $cell_class .= ' comparison-table__cell--check';
                                    } elseif (strpos(trim($content), '+') === 0) {
                                        $content = trim(substr(trim($content), 1));
                                        $cell_class .= ' comparison-table__cell--check-text';
                                    } elseif (trim($content) === '-') {
                                        $content = '';
                                        $cell_class .= ' comparison-table__cell--cross';
                                    } elseif (strpos(trim($content), '-') === 0) {
                                        $content = trim(substr(trim($content), 1));
                                        $cell_class .= ' comparison-table__cell--cross-text';
                                    }
                                    ?>
                                    <div class="<?php echo esc_attr($cell_class); ?>">
                                        <?php echo wp_kses_post(nl2br($content)); ?>
                                    </div>
                                    <?php
                                }
                            endforeach;
                        endif;
                        ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

