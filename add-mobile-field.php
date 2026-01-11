<?php
/**
 * Script to add 'show_on_mobile' field to all ACF block JSON files
 * Run this from command line: php add-mobile-field.php
 */

// ACF JSON directory
$acf_dir = __DIR__ . '/acf-json';

// Mobile visibility field template
function create_mobile_field($group_key) {
    return [
        'key' => $group_key . '_show_on_mobile',
        'label' => 'Kuva mobiilis',
        'name' => 'show_on_mobile',
        'type' => 'true_false',
        'instructions' => 'Määra, kas see blokk kuvatakse mobiilseadmetes (alla 768px)',
        'required' => 0,
        'default_value' => 1,
        'ui' => 1,
        'ui_on_text' => 'Jah',
        'ui_off_text' => 'Ei',
        'wrapper' => [
            'width' => '50'
        ]
    ];
}

function add_mobile_field_to_json($file_path) {
    try {
        $data = json_decode(file_get_contents($file_path), true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo "❌ Error parsing " . basename($file_path) . ": " . json_last_error_msg() . "\n";
            return false;
        }
        
        // Skip if not a block group or if field already exists
        if (!isset($data['fields']) || !is_array($data['fields'])) {
            echo "⏭️  Skipping " . basename($file_path) . " (no fields)\n";
            return false;
        }
        
        // Check if show_on_mobile field already exists
        foreach ($data['fields'] as $field) {
            if (isset($field['name']) && $field['name'] === 'show_on_mobile') {
                echo "✓ " . basename($file_path) . " already has mobile field\n";
                return false;
            }
        }
        
        // Find anchor field index
        $anchor_index = -1;
        foreach ($data['fields'] as $index => $field) {
            if (isset($field['name']) && $field['name'] === 'block_anchor') {
                $anchor_index = $index;
                break;
            }
        }
        
        // Create mobile field with unique key
        $group_key = isset($data['key']) ? $data['key'] : 'group';
        $mobile_field = create_mobile_field($group_key);
        
        // Insert after anchor or at the beginning
        $insert_pos = $anchor_index >= 0 ? $anchor_index + 1 : 0;
        array_splice($data['fields'], $insert_pos, 0, [$mobile_field]);
        
        // Write back to file with proper formatting
        $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        file_put_contents($file_path, $json . "\n");
        
        echo "✅ Added mobile field to " . basename($file_path) . "\n";
        return true;
        
    } catch (Exception $e) {
        echo "❌ Error processing " . basename($file_path) . ": " . $e->getMessage() . "\n";
        return false;
    }
}

function main() {
    global $acf_dir;
    
    if (!is_dir($acf_dir)) {
        echo "❌ Directory $acf_dir not found!\n";
        return;
    }
    
    $files = glob($acf_dir . '/group_*.json');
    
    if (empty($files)) {
        echo "❌ No ACF JSON files found!\n";
        return;
    }
    
    sort($files);
    
    echo "Found " . count($files) . " ACF JSON files\n\n";
    
    $updated = 0;
    foreach ($files as $file) {
        if (add_mobile_field_to_json($file)) {
            $updated++;
        }
    }
    
    echo "\n✅ Updated $updated files\n";
    echo "⏭️  Skipped " . (count($files) - $updated) . " files\n";
}

main();
