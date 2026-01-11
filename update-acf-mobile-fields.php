<?php
/**
 * One-time script to add mobile visibility field to all ACF block JSON files
 * 
 * INSTRUCTIONS:
 * 1. Upload this file to your theme root directory
 * 2. Access it via browser: https://yoursite.com/wp-content/themes/sharks2025/update-acf-mobile-fields.php
 * 3. Delete this file after running
 */

// Security check - only allow in development
if (!defined('WP_DEBUG') || !WP_DEBUG) {
    // Uncomment the line below to allow running in production
    // die('This script can only run in development mode. Set WP_DEBUG to true or remove this check.');
}

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
        $content = file_get_contents($file_path);
        $data = json_decode($content, true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            return [
                'success' => false,
                'message' => 'JSON parse error: ' . json_last_error_msg()
            ];
        }
        
        // Skip if not a block group
        if (!isset($data['fields']) || !is_array($data['fields'])) {
            return [
                'success' => false,
                'message' => 'No fields array found'
            ];
        }
        
        // Check if it's a block
        $is_block = false;
        if (isset($data['location']) && is_array($data['location'])) {
            foreach ($data['location'] as $location_group) {
                foreach ($location_group as $rule) {
                    if (isset($rule['param']) && $rule['param'] === 'block') {
                        $is_block = true;
                        break 2;
                    }
                }
            }
        }
        
        if (!$is_block) {
            return [
                'success' => false,
                'message' => 'Not a block field group'
            ];
        }
        
        // Check if show_on_mobile field already exists
        foreach ($data['fields'] as $field) {
            if (isset($field['name']) && $field['name'] === 'show_on_mobile') {
                return [
                    'success' => false,
                    'message' => 'Field already exists'
                ];
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
        
        return [
            'success' => true,
            'message' => 'Mobile field added successfully'
        ];
        
    } catch (Exception $e) {
        return [
            'success' => false,
            'message' => 'Exception: ' . $e->getMessage()
        ];
    }
}

// HTML output
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update ACF Mobile Fields</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background: #f0f0f1;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        h1 {
            color: #1d2327;
            margin-top: 0;
        }
        .result {
            margin: 10px 0;
            padding: 12px;
            border-radius: 4px;
            border-left: 4px solid;
        }
        .success {
            background: #d4edda;
            border-color: #28a745;
            color: #155724;
        }
        .skip {
            background: #fff3cd;
            border-color: #ffc107;
            color: #856404;
        }
        .error {
            background: #f8d7da;
            border-color: #dc3545;
            color: #721c24;
        }
        .summary {
            margin-top: 30px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 4px;
        }
        .summary h2 {
            margin-top: 0;
            color: #1d2327;
        }
        .filename {
            font-weight: bold;
            font-family: monospace;
        }
        .warning {
            background: #fff3cd;
            border: 1px solid #ffc107;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔄 Update ACF Mobile Fields</h1>
        
        <div class="warning">
            <strong>⚠️ Important:</strong> This script will modify all ACF JSON files. Make sure you have a backup!
        </div>

<?php

if (!is_dir($acf_dir)) {
    echo '<div class="result error">❌ ACF JSON directory not found: ' . esc_html($acf_dir) . '</div>';
    echo '</div></body></html>';
    exit;
}

$files = glob($acf_dir . '/group_*.json');

if (empty($files)) {
    echo '<div class="result error">❌ No ACF JSON files found!</div>';
    echo '</div></body></html>';
    exit;
}

sort($files);

echo '<p>Found <strong>' . count($files) . '</strong> ACF JSON files</p>';
echo '<hr>';

$updated = 0;
$skipped = 0;
$errors = 0;

foreach ($files as $file) {
    $filename = basename($file);
    $result = add_mobile_field_to_json($file);
    
    if ($result['success']) {
        echo '<div class="result success">✅ <span class="filename">' . esc_html($filename) . '</span> - ' . esc_html($result['message']) . '</div>';
        $updated++;
    } else {
        if (strpos($result['message'], 'already exists') !== false || strpos($result['message'], 'Not a block') !== false) {
            echo '<div class="result skip">⏭️ <span class="filename">' . esc_html($filename) . '</span> - ' . esc_html($result['message']) . '</div>';
            $skipped++;
        } else {
            echo '<div class="result error">❌ <span class="filename">' . esc_html($filename) . '</span> - ' . esc_html($result['message']) . '</div>';
            $errors++;
        }
    }
}

?>

        <div class="summary">
            <h2>📊 Summary</h2>
            <p><strong>✅ Updated:</strong> <?php echo $updated; ?> files</p>
            <p><strong>⏭️ Skipped:</strong> <?php echo $skipped; ?> files</p>
            <p><strong>❌ Errors:</strong> <?php echo $errors; ?> files</p>
        </div>

        <?php if ($updated > 0): ?>
        <div class="result success">
            <strong>✅ Success!</strong> Mobile visibility field has been added to <?php echo $updated; ?> block(s).
            <br><br>
            <strong>Next steps:</strong>
            <ol>
                <li>Go to WordPress admin → Custom Fields</li>
                <li>Click "Sync available" if you see it</li>
                <li>Delete this file (update-acf-mobile-fields.php) from your theme directory</li>
                <li>Clear your browser cache</li>
                <li>Edit any block in Gutenberg to see the "Kuva mobiilis" field</li>
            </ol>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
<?php

function esc_html($text) {
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}
