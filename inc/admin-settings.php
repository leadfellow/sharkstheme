<?php
/**
 * Sharks Admin Settings Page
 * 
 * Figma Design Tokens import and management
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get system information for debug display
 */
function sharks_get_system_info() {
    $acf_installed = class_exists('ACF') || defined('ACF_VERSION');
    $acf_version = defined('ACF_VERSION') ? ACF_VERSION : 'Unknown';
    $acf_block_func = function_exists('acf_register_block_type');
    $acf_init_fired = did_action('acf/init');
    
    $info = '<div style="background: #f0f0f1; padding: 15px; border-radius: 4px; margin-bottom: 20px;">';
    $info .= '<h3 style="margin-top: 0;">🔧 Sharks Theme Debug</h3>';
    $info .= '<table style="width: 100%;">';
    $info .= '<tr><td><strong>ACF Installed:</strong></td><td>' . ($acf_installed ? '✅ Yes' : '❌ No') . '</td></tr>';
    $info .= '<tr><td><strong>ACF Version:</strong></td><td>' . esc_html($acf_version) . '</td></tr>';
    $info .= '<tr><td><strong>acf_register_block_type exists:</strong></td><td>' . ($acf_block_func ? '✅ Yes' : '❌ No') . '</td></tr>';
    $info .= '<tr><td><strong>acf/init hook fired:</strong></td><td>' . ($acf_init_fired ? '✅ Yes (' . $acf_init_fired . 'x)' : '❌ No') . '</td></tr>';
    $info .= '<tr><td><strong>WordPress Version:</strong></td><td>' . get_bloginfo('version') . '</td></tr>';
    $info .= '<tr><td><strong>PHP Version:</strong></td><td>' . phpversion() . '</td></tr>';
    $info .= '<tr><td><strong>Theme Version:</strong></td><td>' . (defined('SHARKS_VERSION') ? SHARKS_VERSION : 'Unknown') . '</td></tr>';
    $info .= '<tr><td><strong>WP Debug:</strong></td><td>' . (defined('WP_DEBUG') && WP_DEBUG ? '✅ Enabled' : '❌ Disabled') . '</td></tr>';
    $info .= '<tr><td><strong>WP Debug Log:</strong></td><td>' . (defined('WP_DEBUG_LOG') && WP_DEBUG_LOG ? '✅ Enabled' : '❌ Disabled') . '</td></tr>';
    $info .= '</table>';
    $info .= '</div>';
    
    // Add Error Log
    $info .= sharks_get_error_log();
    
    return $info;
}

/**
 * Get last 50 lines from error log
 */
function sharks_get_error_log() {
    $log_file = WP_CONTENT_DIR . '/debug.log';
    
    $log_html = '<div style="background: #fff; border: 1px solid #c3c4c7; border-radius: 4px; padding: 15px;">';
    $log_html .= '<h3 style="margin-top: 0; display: flex; align-items: center; justify-content: space-between;">';
    $log_html .= '<span>📋 Error Log (Last 50 lines)</span>';
    
    if (file_exists($log_file)) {
        $file_size = filesize($log_file);
        $log_html .= '<span style="font-size: 12px; font-weight: normal; color: #666;">File size: ' . size_format($file_size) . '</span>';
    }
    
    $log_html .= '</h3>';
    
    if (!file_exists($log_file)) {
        $log_html .= '<p style="color: #50575e;">✅ No error log file found. This is good - no errors logged!</p>';
        $log_html .= '<p style="font-size: 12px; color: #666;">Error log location: <code>' . esc_html($log_file) . '</code></p>';
        $log_html .= '<p style="font-size: 12px; color: #666;">To enable error logging, add to <code>wp-config.php</code>:</p>';
        $log_html .= '<pre style="background: #f0f0f1; padding: 10px; border-radius: 4px; overflow-x: auto;">define(\'WP_DEBUG\', true);<br>define(\'WP_DEBUG_LOG\', true);<br>define(\'WP_DEBUG_DISPLAY\', false);</pre>';
    } else {
        // Read last 50 lines
        $lines = file($log_file);
        $total_lines = count($lines);
        $last_50 = array_slice($lines, -50);
        
        if (empty($last_50)) {
            $log_html .= '<p style="color: #50575e;">✅ Error log is empty. No errors logged!</p>';
        } else {
            $log_html .= '<p style="font-size: 12px; color: #666; margin-bottom: 10px;">Showing last ' . count($last_50) . ' of ' . $total_lines . ' total lines</p>';
            $log_html .= '<div style="background: #1e1e1e; color: #d4d4d4; padding: 15px; border-radius: 4px; overflow-x: auto; max-height: 500px; overflow-y: auto; font-family: Consolas, Monaco, monospace; font-size: 12px; line-height: 1.5;">';
            
            foreach ($last_50 as $line) {
                $line = esc_html($line);
                
                // Highlight error types
                if (stripos($line, 'Fatal error') !== false || stripos($line, 'PHP Fatal') !== false) {
                    $log_html .= '<div style="color: #f48771; margin-bottom: 2px;">🔴 ' . $line . '</div>';
                } elseif (stripos($line, 'Warning') !== false || stripos($line, 'PHP Warning') !== false) {
                    $log_html .= '<div style="color: #ff9800; margin-bottom: 2px;">⚠️ ' . $line . '</div>';
                } elseif (stripos($line, 'Notice') !== false || stripos($line, 'PHP Notice') !== false) {
                    $log_html .= '<div style="color: #4fc3f7; margin-bottom: 2px;">ℹ️ ' . $line . '</div>';
                } elseif (stripos($line, 'Deprecated') !== false) {
                    $log_html .= '<div style="color: #ffb74d; margin-bottom: 2px;">⏰ ' . $line . '</div>';
                } else {
                    $log_html .= '<div style="color: #d4d4d4; margin-bottom: 2px;">' . $line . '</div>';
                }
            }
            
            $log_html .= '</div>';
            
            // Add clear log button
            $log_html .= '<div style="margin-top: 15px;">';
            $log_html .= '<button type="button" class="button" onclick="if(confirm(\'Are you sure you want to clear the error log?\')) { sharksAdminClearLog(); }">🗑️ Clear Error Log</button>';
            $log_html .= '<button type="button" class="button" onclick="window.location.reload();" style="margin-left: 10px;">🔄 Refresh</button>';
            $log_html .= '<a href="' . admin_url('admin.php?page=sharks-settings-download-log') . '" class="button" style="margin-left: 10px;">💾 Download Full Log</a>';
            $log_html .= '</div>';
        }
    }
    
    $log_html .= '</div>';
    
    return $log_html;
}

/**
 * Create ACF Options Page for Sharks Settings
 */
add_action('acf/init', function() {
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title'    => __('Sharks Theme Settings', 'sharks2025'),
            'menu_title'    => __('Sharks Settings', 'sharks2025'),
            'menu_slug'     => 'sharks-settings',
            'capability'    => 'manage_options',
            'icon_url'      => 'dashicons-admin-customizer',
            'position'      => 59,
            'autoload'      => true,
            'update_button' => __('Save Settings', 'sharks2025'),
            'updated_message' => __('Settings saved! CSS variables updated.', 'sharks2025'),
        ]);

        // Add sub-pages
        acf_add_options_sub_page([
            'page_title'    => __('Logo Settings', 'sharks2025'),
            'menu_title'    => __('Logo', 'sharks2025'),
            'parent_slug'   => 'sharks-settings',
        ]);
        
        acf_add_options_sub_page([
            'page_title'    => __('Blog Settings', 'sharks2025'),
            'menu_title'    => __('Blog Settings', 'sharks2025'),
            'parent_slug'   => 'sharks-settings',
        ]);
        
        acf_add_options_sub_page([
            'page_title'    => __('System Status', 'sharks2025'),
            'menu_title'    => __('System Status', 'sharks2025'),
            'parent_slug'   => 'sharks-settings',
        ]);
        
        acf_add_options_sub_page([
            'page_title'    => __('Import Figma Tokens', 'sharks2025'),
            'menu_title'    => __('Figma Import', 'sharks2025'),
            'parent_slug'   => 'sharks-settings',
        ]);

        acf_add_options_sub_page([
            'page_title'    => __('Preview & Export', 'sharks2025'),
            'menu_title'    => __('Preview', 'sharks2025'),
            'parent_slug'   => 'sharks-settings',
        ]);
    }
});

/**
 * Register ACF Fields for Sharks Settings
 */
add_action('acf/init', function() {
    if (function_exists('acf_add_local_field_group')) {
        
        // Main Settings Group
        acf_add_local_field_group([
            'key' => 'group_sharks_settings',
            'title' => 'Design Tokens',
            'fields' => [
                // Instructions
                [
                    'key' => 'field_tokens_instructions',
                    'label' => 'How to Use',
                    'name' => '',
                    'type' => 'message',
                    'message' => '<h3>🎨 Figma Design Tokens</h3>
                        <p>Import your design tokens from Figma to automatically update your theme\'s colors, typography, and spacing.</p>
                        <ol>
                            <li><strong>Figma:</strong> Export your Color/Text Styles as JSON or CSS Variables</li>
                            <li><strong>Upload:</strong> Use the Figma Import tab to upload JSON or paste CSS</li>
                            <li><strong>Or Enter Manually:</strong> Fill in the fields below</li>
                            <li><strong>Save:</strong> Click "Save Settings" to update your theme</li>
                        </ol>',
                    'new_lines' => 'wpautop',
                ],
                
                // Colors Tab
                [
                    'key' => 'field_colors_tab',
                    'label' => 'Colors',
                    'name' => '',
                    'type' => 'tab',
                    'placement' => 'top',
                ],
                
                // Primary Color
                [
                    'key' => 'field_color_primary',
                    'label' => 'Primary Color',
                    'name' => 'color_primary',
                    'type' => 'color_picker',
                    'instructions' => 'Main brand color',
                    'default_value' => '#0066CC',
                    'enable_opacity' => false,
                ],
                
                // Secondary Color
                [
                    'key' => 'field_color_secondary',
                    'label' => 'Secondary Color',
                    'name' => 'color_secondary',
                    'type' => 'color_picker',
                    'default_value' => '#00A3E0',
                    'enable_opacity' => false,
                ],
                
                // Accent Color
                [
                    'key' => 'field_color_accent',
                    'label' => 'Accent Color',
                    'name' => 'color_accent',
                    'type' => 'color_picker',
                    'default_value' => '#FF6B35',
                    'enable_opacity' => false,
                ],
                
                // Success Color
                [
                    'key' => 'field_color_success',
                    'label' => 'Success Color',
                    'name' => 'color_success',
                    'type' => 'color_picker',
                    'default_value' => '#00C853',
                    'enable_opacity' => false,
                ],
                
                // Text Color
                [
                    'key' => 'field_color_text',
                    'label' => 'Text Color',
                    'name' => 'color_text',
                    'type' => 'color_picker',
                    'default_value' => '#1A1A1A',
                    'enable_opacity' => false,
                ],
                
                // Text Light
                [
                    'key' => 'field_color_text_light',
                    'label' => 'Text Light',
                    'name' => 'color_text_light',
                    'type' => 'color_picker',
                    'default_value' => '#666666',
                    'enable_opacity' => false,
                ],
                
                // Background Color
                [
                    'key' => 'field_color_bg',
                    'label' => 'Background Color',
                    'name' => 'color_bg',
                    'type' => 'color_picker',
                    'default_value' => '#FFFFFF',
                    'enable_opacity' => false,
                ],
                
                // Background Light
                [
                    'key' => 'field_color_bg_light',
                    'label' => 'Background Light',
                    'name' => 'color_bg_light',
                    'type' => 'color_picker',
                    'default_value' => '#F8F9FA',
                    'enable_opacity' => false,
                ],
                
                // Background Dark
                [
                    'key' => 'field_color_bg_dark',
                    'label' => 'Background Dark',
                    'name' => 'color_bg_dark',
                    'type' => 'color_picker',
                    'default_value' => '#1A1A1A',
                    'enable_opacity' => false,
                ],
                
                // Typography Tab
                [
                    'key' => 'field_typography_tab',
                    'label' => 'Typography',
                    'name' => '',
                    'type' => 'tab',
                ],
                
                // Font Family - Sans
                [
                    'key' => 'field_font_sans',
                    'label' => 'Sans Serif Font',
                    'name' => 'font_sans',
                    'type' => 'text',
                    'instructions' => 'Body font (e.g., "Inter", sans-serif)',
                    'default_value' => '"Inter", system-ui, sans-serif',
                ],
                
                // Font Family - Heading
                [
                    'key' => 'field_font_heading',
                    'label' => 'Heading Font',
                    'name' => 'font_heading',
                    'type' => 'text',
                    'instructions' => 'Heading font (leave empty to use Sans Serif)',
                    'default_value' => '',
                ],
                
                // Font Size - H1
                [
                    'key' => 'field_fs_h1',
                    'label' => 'H1 Font Size',
                    'name' => 'fs_h1',
                    'type' => 'text',
                    'instructions' => 'Responsive clamp (e.g., clamp(2rem, 4vw, 3rem))',
                    'default_value' => 'clamp(2rem, 4vw, 3rem)',
                ],
                
                // Font Size - H2
                [
                    'key' => 'field_fs_h2',
                    'label' => 'H2 Font Size',
                    'name' => 'fs_h2',
                    'type' => 'text',
                    'default_value' => 'clamp(1.5rem, 3vw, 2.25rem)',
                ],
                
                // Font Size - H3
                [
                    'key' => 'field_fs_h3',
                    'label' => 'H3 Font Size',
                    'name' => 'fs_h3',
                    'type' => 'text',
                    'default_value' => 'clamp(1.25rem, 2.5vw, 1.75rem)',
                ],
                
                // Font Size - Body
                [
                    'key' => 'field_fs_body',
                    'label' => 'Body Font Size',
                    'name' => 'fs_body',
                    'type' => 'text',
                    'default_value' => '1rem',
                ],
                
                // Line Height - Normal
                [
                    'key' => 'field_lh_normal',
                    'label' => 'Normal Line Height',
                    'name' => 'lh_normal',
                    'type' => 'text',
                    'default_value' => '1.6',
                ],
                
                // Line Height - Tight
                [
                    'key' => 'field_lh_tight',
                    'label' => 'Tight Line Height',
                    'name' => 'lh_tight',
                    'type' => 'text',
                    'instructions' => 'For headings',
                    'default_value' => '1.2',
                ],
                
                // Spacing Tab
                [
                    'key' => 'field_spacing_tab',
                    'label' => 'Spacing',
                    'name' => '',
                    'type' => 'tab',
                ],
                
                // Space 1
                [
                    'key' => 'field_space_1',
                    'label' => 'Space 1 (XS)',
                    'name' => 'space_1',
                    'type' => 'text',
                    'default_value' => '0.5rem',
                ],
                
                // Space 2
                [
                    'key' => 'field_space_2',
                    'label' => 'Space 2 (S)',
                    'name' => 'space_2',
                    'type' => 'text',
                    'default_value' => '1rem',
                ],
                
                // Space 3
                [
                    'key' => 'field_space_3',
                    'label' => 'Space 3 (M)',
                    'name' => 'space_3',
                    'type' => 'text',
                    'default_value' => '1.5rem',
                ],
                
                // Space 4
                [
                    'key' => 'field_space_4',
                    'label' => 'Space 4 (L)',
                    'name' => 'space_4',
                    'type' => 'text',
                    'default_value' => '2rem',
                ],
                
                // Space 5
                [
                    'key' => 'field_space_5',
                    'label' => 'Space 5 (XL)',
                    'name' => 'space_5',
                    'type' => 'text',
                    'default_value' => '3rem',
                ],
                
                // Container Max Width
                [
                    'key' => 'field_container_max',
                    'label' => 'Container Max Width',
                    'name' => 'container_max',
                    'type' => 'text',
                    'default_value' => '1200px',
                ],
                
                // Container Padding
                [
                    'key' => 'field_container_padding',
                    'label' => 'Container Padding',
                    'name' => 'container_padding',
                    'type' => 'text',
                    'default_value' => '1rem',
                ],
                
                // Border Radius Tab
                [
                    'key' => 'field_radius_tab',
                    'label' => 'Border Radius',
                    'name' => '',
                    'type' => 'tab',
                ],
                
                // Radius SM
                [
                    'key' => 'field_radius_sm',
                    'label' => 'Small Radius',
                    'name' => 'radius_sm',
                    'type' => 'text',
                    'default_value' => '4px',
                ],
                
                // Radius M
                [
                    'key' => 'field_radius_m',
                    'label' => 'Medium Radius',
                    'name' => 'radius_m',
                    'type' => 'text',
                    'default_value' => '8px',
                ],
                
                // Radius LG
                [
                    'key' => 'field_radius_lg',
                    'label' => 'Large Radius',
                    'name' => 'radius_lg',
                    'type' => 'text',
                    'default_value' => '12px',
                ],
                
                // Radius XL
                [
                    'key' => 'field_radius_xl',
                    'label' => 'Extra Large Radius',
                    'name' => 'radius_xl',
                    'type' => 'text',
                    'default_value' => '16px',
                ],
                
                // Radius 2XL
                [
                    'key' => 'field_radius_2xl',
                    'label' => '2XL Radius',
                    'name' => 'radius_2xl',
                    'type' => 'text',
                    'default_value' => '24px',
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'sharks-settings',
                    ],
                ],
            ],
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'seamless',
        ]);

        // Figma Import Group
        acf_add_local_field_group([
            'key' => 'group_figma_import',
            'title' => 'Figma Tokens Import',
            'fields' => [
                // Instructions
                [
                    'key' => 'field_figma_instructions',
                    'label' => 'Import from Figma',
                    'name' => '',
                    'type' => 'message',
                    'message' => '<h3>📥 Import Design Tokens</h3>
                        <p><strong>Option 1: Paste JSON</strong></p>
                        <ol>
                            <li>Open Figma file</li>
                            <li>Use plugin: "Design Tokens" or "Tokens Studio"</li>
                            <li>Export as JSON</li>
                            <li>Paste below</li>
                        </ol>
                        <p><strong>Option 2: Paste CSS Variables</strong></p>
                        <ol>
                            <li>Open Figma → Inspect panel</li>
                            <li>Copy CSS custom properties</li>
                            <li>Paste in CSS textarea</li>
                        </ol>',
                ],
                
                // JSON Import
                [
                    'key' => 'field_figma_json',
                    'label' => 'Figma Tokens (JSON)',
                    'name' => 'figma_json',
                    'type' => 'textarea',
                    'instructions' => 'Paste JSON from Figma Tokens plugin',
                    'rows' => 10,
                ],
                
                // CSS Import
                [
                    'key' => 'field_figma_css',
                    'label' => 'CSS Variables',
                    'name' => 'figma_css',
                    'type' => 'textarea',
                    'instructions' => 'Paste CSS custom properties from Figma Inspect',
                    'rows' => 10,
                ],
                
                // Import Button (handled via JavaScript)
                [
                    'key' => 'field_import_notice',
                    'label' => 'Import Action',
                    'name' => '',
                    'type' => 'message',
                    'message' => '<button type="button" class="button button-primary" id="sharks-import-tokens">Parse & Import Tokens</button>
                        <div id="sharks-import-result" style="margin-top:10px;"></div>',
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'acf-options-figma-import',
                    ],
                ],
            ],
        ]);
        
        // Logo Settings Group
        acf_add_local_field_group([
            'key' => 'group_logo_settings',
            'title' => 'Logo Settings',
            'fields' => [
                // Instructions
                [
                    'key' => 'field_logo_instructions',
                    'label' => 'Upload Logo',
                    'name' => '',
                    'type' => 'message',
                    'message' => '<h3>🎨 Site Logo</h3>
                        <p>Upload your site logo here. The logo will appear in the header navigation.</p>
                        <ul>
                            <li><strong>Recommended size:</strong> 200x60px (width x height)</li>
                            <li><strong>Format:</strong> PNG with transparency or SVG</li>
                            <li><strong>File size:</strong> Keep under 100KB for best performance</li>
                        </ul>',
                    'new_lines' => 'wpautop',
                ],
                
                // Logo
                [
                    'key' => 'field_site_logo',
                    'label' => 'Site Logo',
                    'name' => 'site_logo',
                    'type' => 'image',
                    'instructions' => 'Upload your site logo',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'library' => 'all',
                ],
                
                // Logo Width
                [
                    'key' => 'field_logo_width',
                    'label' => 'Logo Width (Desktop)',
                    'name' => 'logo_width',
                    'type' => 'number',
                    'instructions' => 'Logo width in pixels for desktop screens',
                    'default_value' => 160,
                    'min' => 80,
                    'max' => 400,
                    'step' => 10,
                    'append' => 'px',
                ],
                
                // Logo Mobile Width
                [
                    'key' => 'field_logo_mobile_width',
                    'label' => 'Logo Width (Mobile)',
                    'name' => 'logo_mobile_width',
                    'type' => 'number',
                    'instructions' => 'Logo width in pixels for mobile screens',
                    'default_value' => 120,
                    'min' => 60,
                    'max' => 300,
                    'step' => 10,
                    'append' => 'px',
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'acf-options-logo',
                    ],
                ],
            ],
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'seamless',
        ]);
        
        // Blog Settings Group
        acf_add_local_field_group([
            'key' => 'group_blog_settings',
            'title' => 'Blog Layout & Sidebar Settings',
            'fields' => [
                // Instructions
                [
                    'key' => 'field_blog_instructions',
                    'label' => 'Blog Layout Configuration',
                    'name' => '',
                    'type' => 'message',
                    'message' => '<h3>📰 Blog & Archive Settings</h3>
                        <p>Configure the layout and sidebar settings for your blog posts and archives.</p>
                        <ul>
                            <li><strong>Single Posts:</strong> Individual blog post pages</li>
                            <li><strong>Blog Archive:</strong> Main blog listing page</li>
                            <li><strong>Sidebars:</strong> Add widgets in <a href="' . admin_url('widgets.php') . '">Appearance → Widgets</a></li>
                        </ul>',
                    'new_lines' => 'wpautop',
                ],
                
                // Single Post Layout
                [
                    'key' => 'field_single_post_layout',
                    'label' => 'Single Post Layout',
                    'name' => 'single_post_layout',
                    'type' => 'select',
                    'instructions' => 'Choose sidebar layout for individual blog posts',
                    'choices' => [
                        'no-sidebar' => 'No Sidebar (Full Width)',
                        'left-sidebar' => 'Left Sidebar',
                        'right-sidebar' => 'Right Sidebar',
                        'both-sidebars' => 'Both Sidebars (Left + Right)',
                    ],
                    'default_value' => 'right-sidebar',
                    'allow_null' => 0,
                    'return_format' => 'value',
                ],
                
                // Archive Layout
                [
                    'key' => 'field_archive_layout',
                    'label' => 'Blog Archive Layout',
                    'name' => 'archive_layout',
                    'type' => 'select',
                    'instructions' => 'Choose sidebar layout for blog archive pages',
                    'choices' => [
                        'no-sidebar' => 'No Sidebar (Full Width)',
                        'left-sidebar' => 'Left Sidebar',
                        'right-sidebar' => 'Right Sidebar',
                        'both-sidebars' => 'Both Sidebars (Left + Right)',
                    ],
                    'default_value' => 'right-sidebar',
                    'allow_null' => 0,
                    'return_format' => 'value',
                ],
                
                // Enable Primary Sidebar
                [
                    'key' => 'field_enable_primary_sidebar',
                    'label' => 'Enable Primary Sidebar',
                    'name' => 'enable_primary_sidebar',
                    'type' => 'true_false',
                    'instructions' => 'Enable the main sidebar widget area',
                    'default_value' => 1,
                    'ui' => 1,
                    'ui_on_text' => 'Enabled',
                    'ui_off_text' => 'Disabled',
                ],
                
                // Enable Secondary Sidebar
                [
                    'key' => 'field_enable_secondary_sidebar',
                    'label' => 'Enable Secondary Sidebar',
                    'name' => 'enable_secondary_sidebar',
                    'type' => 'true_false',
                    'instructions' => 'Enable the secondary sidebar widget area (for both-sidebars layout)',
                    'default_value' => 0,
                    'ui' => 1,
                    'ui_on_text' => 'Enabled',
                    'ui_off_text' => 'Disabled',
                ],
                
                // Sidebar Width
                [
                    'key' => 'field_sidebar_width',
                    'label' => 'Sidebar Width',
                    'name' => 'sidebar_width',
                    'type' => 'select',
                    'instructions' => 'Choose the width of the sidebar',
                    'choices' => [
                        '25%' => '25% (Narrow)',
                        '30%' => '30% (Default)',
                        '33.333%' => '33% (1/3 width)',
                        '40%' => '40% (Wide)',
                    ],
                    'default_value' => '30%',
                    'allow_null' => 0,
                    'return_format' => 'value',
                ],
                
                // Post Meta Display
                [
                    'key' => 'field_post_meta_display',
                    'label' => 'Post Meta Display',
                    'name' => 'post_meta_display',
                    'type' => 'checkbox',
                    'instructions' => 'Select which post meta to display',
                    'choices' => [
                        'author' => 'Author',
                        'date' => 'Date',
                        'categories' => 'Categories',
                        'tags' => 'Tags',
                        'comments' => 'Comment Count',
                    ],
                    'default_value' => ['author', 'date', 'categories'],
                    'layout' => 'vertical',
                    'return_format' => 'value',
                ],
                
                // Excerpt Length
                [
                    'key' => 'field_excerpt_length',
                    'label' => 'Excerpt Length (words)',
                    'name' => 'excerpt_length',
                    'type' => 'number',
                    'instructions' => 'Number of words in post excerpts on archive pages',
                    'default_value' => 55,
                    'min' => 10,
                    'max' => 200,
                    'step' => 5,
                    'append' => 'words',
                ],
                
                // Posts Per Page
                [
                    'key' => 'field_posts_per_page',
                    'label' => 'Posts Per Page',
                    'name' => 'posts_per_page',
                    'type' => 'number',
                    'instructions' => 'Number of posts to show on archive pages (0 = use WordPress default)',
                    'default_value' => 0,
                    'min' => 0,
                    'max' => 50,
                    'step' => 1,
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'acf-options-blog-settings',
                    ],
                ],
            ],
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'seamless',
        ]);
        
        // System Status Group
        acf_add_local_field_group([
            'key' => 'group_system_status',
            'title' => 'System Information',
            'fields' => [
                // System Info
                [
                    'key' => 'field_system_info',
                    'label' => 'System Status',
                    'name' => '',
                    'type' => 'message',
                    'message' => sharks_get_system_info(),
                    'new_lines' => '',
                ],
            ],
            'location' => [
                [
                    [
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'acf-options-system-status',
                    ],
                ],
            ],
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'seamless',
        ]);
    }
});

/**
 * Generate CSS variables file when settings are saved
 */
add_action('acf/save_post', function($post_id) {
    // Only run on options pages
    if ($post_id !== 'options') {
        return;
    }
    
    // Generate and save CSS
    sharks_generate_css_variables();
    
    // Also update theme.json colors
    sharks_update_theme_json();
});

/**
 * Generate CSS variables file from ACF options
 */
function sharks_generate_css_variables() {
    // Get values from ACF
    $colors = [
        'primary'       => get_field('color_primary', 'option') ?: '#0066CC',
        'secondary'     => get_field('color_secondary', 'option') ?: '#00A3E0',
        'accent'        => get_field('color_accent', 'option') ?: '#FF6B35',
        'success'       => get_field('color_success', 'option') ?: '#00C853',
        'text'          => get_field('color_text', 'option') ?: '#1A1A1A',
        'text-light'    => get_field('color_text_light', 'option') ?: '#666666',
        'bg'            => get_field('color_bg', 'option') ?: '#FFFFFF',
        'bg-light'      => get_field('color_bg_light', 'option') ?: '#F8F9FA',
        'bg-dark'       => get_field('color_bg_dark', 'option') ?: '#1A1A1A',
    ];
    
    $typography = [
        'font-sans'     => get_field('font_sans', 'option') ?: '"Inter", system-ui, sans-serif',
        'font-heading'  => get_field('font_heading', 'option') ?: '',
        'fs-h1'         => get_field('fs_h1', 'option') ?: 'clamp(2rem, 4vw, 3rem)',
        'fs-h2'         => get_field('fs_h2', 'option') ?: 'clamp(1.5rem, 3vw, 2.25rem)',
        'fs-h3'         => get_field('fs_h3', 'option') ?: 'clamp(1.25rem, 2.5vw, 1.75rem)',
        'fs-body'       => get_field('fs_body', 'option') ?: '1rem',
        'lh-normal'     => get_field('lh_normal', 'option') ?: '1.6',
        'lh-tight'      => get_field('lh_tight', 'option') ?: '1.2',
    ];
    
    $spacing = [
        'space-1'       => get_field('space_1', 'option') ?: '0.5rem',
        'space-2'       => get_field('space_2', 'option') ?: '1rem',
        'space-3'       => get_field('space_3', 'option') ?: '1.5rem',
        'space-4'       => get_field('space_4', 'option') ?: '2rem',
        'space-5'       => get_field('space_5', 'option') ?: '3rem',
        'container-max' => get_field('container_max', 'option') ?: '1200px',
        'container-padding' => get_field('container_padding', 'option') ?: '1rem',
    ];
    
    $radius = [
        'radius-sm'     => get_field('radius_sm', 'option') ?: '4px',
        'radius-m'      => get_field('radius_m', 'option') ?: '8px',
        'radius-lg'     => get_field('radius_lg', 'option') ?: '12px',
        'radius-xl'     => get_field('radius_xl', 'option') ?: '16px',
        'radius-2xl'    => get_field('radius_2xl', 'option') ?: '24px',
    ];
    
    // Generate CSS content
    $css = "/**\n * Design Tokens - Generated from Sharks Settings\n";
    $css .= " * Last updated: " . current_time('mysql') . "\n";
    $css .= " * DO NOT EDIT THIS FILE MANUALLY - Use Sharks Settings in WordPress Admin\n */\n\n";
    $css .= ":root {\n";
    $css .= "  /* Colors */\n";
    foreach ($colors as $name => $value) {
        $css .= "  --color-{$name}: {$value};\n";
    }
    $css .= "\n  /* Typography */\n";
    foreach ($typography as $name => $value) {
        if (!empty($value)) {
            $css .= "  --{$name}: {$value};\n";
        }
    }
    $css .= "\n  /* Spacing */\n";
    foreach ($spacing as $name => $value) {
        $css .= "  --{$name}: {$value};\n";
    }
    $css .= "\n  /* Border Radius */\n";
    foreach ($radius as $name => $value) {
        $css .= "  --{$name}: {$value};\n";
    }
    $css .= "}\n";
    
    // Save to file
    $file_path = get_stylesheet_directory() . '/assets/css/00-settings/variables.css';
    
    // Create backup
    if (file_exists($file_path)) {
        $backup_path = get_stylesheet_directory() . '/assets/css/00-settings/variables.backup.css';
        copy($file_path, $backup_path);
    }
    
    // Write new file
    $result = file_put_contents($file_path, $css);
    
    return $result !== false;
}

/**
 * Update theme.json colors
 */
function sharks_update_theme_json() {
    $theme_json_path = get_stylesheet_directory() . '/theme.json';
    
    if (!file_exists($theme_json_path)) {
        return false;
    }
    
    // Read current theme.json
    $theme_json = json_decode(file_get_contents($theme_json_path), true);
    
    // Update color palette
    $colors = [
        ['slug' => 'primary', 'name' => 'Primary', 'color' => get_field('color_primary', 'option') ?: '#0066CC'],
        ['slug' => 'secondary', 'name' => 'Secondary', 'color' => get_field('color_secondary', 'option') ?: '#00A3E0'],
        ['slug' => 'accent', 'name' => 'Accent', 'color' => get_field('color_accent', 'option') ?: '#FF6B35'],
        ['slug' => 'success', 'name' => 'Success', 'color' => get_field('color_success', 'option') ?: '#00C853'],
        ['slug' => 'text', 'name' => 'Text', 'color' => get_field('color_text', 'option') ?: '#1A1A1A'],
        ['slug' => 'text-light', 'name' => 'Text Light', 'color' => get_field('color_text_light', 'option') ?: '#666666'],
        ['slug' => 'background', 'name' => 'Background', 'color' => get_field('color_bg', 'option') ?: '#FFFFFF'],
        ['slug' => 'background-light', 'name' => 'Background Light', 'color' => get_field('color_bg_light', 'option') ?: '#F8F9FA'],
        ['slug' => 'background-dark', 'name' => 'Background Dark', 'color' => get_field('color_bg_dark', 'option') ?: '#1A1A1A'],
    ];
    
    $theme_json['settings']['color']['palette'] = $colors;
    
    // Create backup
    $backup_path = get_stylesheet_directory() . '/theme.backup.json';
    copy($theme_json_path, $backup_path);
    
    // Write updated theme.json
    $result = file_put_contents(
        $theme_json_path,
        json_encode($theme_json, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
    );
    
    return $result !== false;
}

/**
 * AJAX: Clear error log
 */
add_action('wp_ajax_sharks_clear_log', function() {
    check_ajax_referer('sharks_admin', 'nonce');
    
    if (!current_user_can('manage_options')) {
        wp_send_json_error('Insufficient permissions');
    }
    
    $log_file = WP_CONTENT_DIR . '/debug.log';
    
    if (file_exists($log_file)) {
        $result = file_put_contents($log_file, '');
        if ($result !== false) {
            wp_send_json_success('Error log cleared successfully');
        } else {
            wp_send_json_error('Failed to clear error log');
        }
    } else {
        wp_send_json_success('Error log does not exist');
    }
});

/**
 * Admin page: Download error log
 */
add_action('admin_init', function() {
    if (isset($_GET['page']) && $_GET['page'] === 'sharks-settings-download-log') {
        if (!current_user_can('manage_options')) {
            wp_die('Insufficient permissions');
        }
        
        $log_file = WP_CONTENT_DIR . '/debug.log';
        
        if (file_exists($log_file)) {
            header('Content-Type: text/plain');
            header('Content-Disposition: attachment; filename="wordpress-debug-' . date('Y-m-d-His') . '.log"');
            readfile($log_file);
            exit;
        } else {
            wp_die('Error log file not found');
        }
    }
});

/**
 * Add admin JavaScript for Figma import
 */
add_action('acf/input/admin_footer', function() {
    $screen = get_current_screen();
    
    if ($screen && strpos($screen->id, 'sharks-settings') !== false) {
        ?>
        <script>
        jQuery(document).ready(function($) {
            // Clear log function
            window.sharksAdminClearLog = function() {
                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'sharks_clear_log',
                        nonce: '<?php echo wp_create_nonce('sharks_admin'); ?>'
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('✅ ' + response.data);
                            window.location.reload();
                        } else {
                            alert('❌ ' + response.data);
                        }
                    },
                    error: function() {
                        alert('❌ Failed to clear error log');
                    }
                });
            };
            
            $('#sharks-import-tokens').on('click', function() {
                var $button = $(this);
                var $result = $('#sharks-import-result');
                var json = $('[name="acf[field_figma_json]"]').val();
                var css = $('[name="acf[field_figma_css]"]').val();
                
                $button.prop('disabled', true).text('Parsing...');
                $result.html('<p>Processing tokens...</p>');
                
                // Simple CSS parser (example)
                if (css) {
                    var colors = parseCSSColors(css);
                    if (colors) {
                        applyColors(colors);
                        $result.html('<div class="notice notice-success"><p>✅ Tokens imported! Scroll up to review and click "Save Settings".</p></div>');
                    }
                }
                
                // JSON parser
                if (json) {
                    try {
                        var tokens = JSON.parse(json);
                        parseTokensJSON(tokens, $result);
                    } catch(e) {
                        $result.html('<div class="notice notice-error"><p>❌ Invalid JSON: ' + e.message + '</p></div>');
                    }
                }
                
                $button.prop('disabled', false).text('Parse & Import Tokens');
            });
            
            function parseCSSColors(css) {
                var colors = {};
                var regex = /--color-(\w+):\s*([^;]+);/g;
                var match;
                while ((match = regex.exec(css)) !== null) {
                    colors[match[1]] = match[2].trim();
                }
                return Object.keys(colors).length > 0 ? colors : null;
            }
            
            function applyColors(colors) {
                // Map to ACF fields
                var mapping = {
                    'primary': 'acf[field_color_primary]',
                    'secondary': 'acf[field_color_secondary]',
                    'accent': 'acf[field_color_accent]',
                    'text': 'acf[field_color_text]',
                };
                
                $.each(colors, function(key, value) {
                    if (mapping[key]) {
                        $('[name="' + mapping[key] + '"]').val(value).trigger('change');
                    }
                });
            }
            
            function parseTokensJSON(tokens, $result) {
                console.log('Parsing Figma tokens...', tokens);
                
                var importedCount = 0;
                
                // Parse Colors
                if (tokens.color) {
                    // Neutral colors
                    if (tokens.color['neutral colors']) {
                        var neutrals = tokens.color['neutral colors'];
                        if (neutrals['50']) { setColorField('bg', neutrals['50'].value); importedCount++; }
                        if (neutrals['100']) { setColorField('bg_light', neutrals['100'].value); importedCount++; }
                        if (neutrals['600']) { setColorField('text_light', neutrals['600'].value); importedCount++; }
                        if (neutrals['900']) { setColorField('text', neutrals['900'].value); importedCount++; }
                    }
                    
                    // Accent colors - map to theme colors
                    if (tokens.color['accent colors']) {
                        var accents = tokens.color['accent colors'];
                        if (accents['lime']) { setColorField('primary', accents['lime'].value); importedCount++; }
                        if (accents['pink']) { setColorField('secondary', accents['pink'].value); importedCount++; }
                        if (accents['purple']) { setColorField('accent', accents['purple'].value); importedCount++; }
                    }
                }
                
                // Parse Typography
                if (tokens.typography) {
                    if (tokens.typography.headings) {
                        var h = tokens.typography.headings;
                        if (h['h1 - switzer medium']) {
                            var h1 = h['h1 - switzer medium'];
                            if (h1.fontSize) { setTextField('fs_h1', pxToRem(h1.fontSize.value)); importedCount++; }
                            if (h1.fontFamily) { setTextField('font_heading', h1.fontFamily.value); importedCount++; }
                        }
                        if (h['h2 - switzer medium'] && h['h2 - switzer medium'].fontSize) {
                            setTextField('fs_h2', pxToRem(h['h2 - switzer medium'].fontSize.value));
                            importedCount++;
                        }
                        if (h['h3 - switzer medium'] && h['h3 - switzer medium'].fontSize) {
                            setTextField('fs_h3', pxToRem(h['h3 - switzer medium'].fontSize.value));
                            importedCount++;
                        }
                    }
                    
                    if (tokens.typography['body text']) {
                        var body = tokens.typography['body text'];
                        if (body['body m - manrope medium']) {
                            var bodyText = body['body m - manrope medium'];
                            if (bodyText.fontSize) { setTextField('fs_body', pxToRem(bodyText.fontSize.value)); importedCount++; }
                            if (bodyText.fontFamily) { setTextField('font_sans', bodyText.fontFamily.value); importedCount++; }
                            if (bodyText.lineHeight) {
                                var lh = bodyText.lineHeight.value / bodyText.fontSize.value;
                                setTextField('lh_normal', lh.toFixed(2));
                                importedCount++;
                            }
                        }
                    }
                }
                
                if (importedCount > 0) {
                    $result.html('<div class="notice notice-success"><p>✅ Imported ' + importedCount + ' tokens from Figma! Scroll up to review colors and fonts, then click "Save Settings".</p></div>');
                } else {
                    $result.html('<div class="notice notice-warning"><p>⚠️ No tokens found. Check your JSON format.</p></div>');
                }
            }
            
            function setColorField(field, hexValue) {
                // Convert #ffffffff to #ffffff (remove alpha if present)
                var cleanHex = hexValue.substring(0, 7);
                var fieldName = 'acf[field_color_' + field + ']';
                $('[name="' + fieldName + '"]').val(cleanHex).trigger('change');
                console.log('Set color:', field, '=', cleanHex);
            }
            
            function setTextField(field, value) {
                var fieldName = 'acf[field_' + field + ']';
                $('[name="' + fieldName + '"]').val(value).trigger('change');
                console.log('Set text:', field, '=', value);
            }
            
            function pxToRem(px) {
                // Convert px to rem (base 16px) with clamp for responsiveness
                var rem = (px / 16).toFixed(2);
                var minRem = (rem * 0.7).toFixed(2);
                var vw = (px / 14.4).toFixed(1); // For 1440px viewport
                return 'clamp(' + minRem + 'rem, ' + vw + 'vw, ' + rem + 'rem)';
            }
        });
        </script>
        <?php
    }
});

