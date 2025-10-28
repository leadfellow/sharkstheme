<?php
/**
 * Block Styles
 * 
 * Block Styles lisavad olemasolevatele blokkidele stiilivariante.
 * Kasutaja saab valida neid block'i sidebar'ist "Styles" sektsioonis.
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Block Styles for ACF Blocks
 */
add_action('init', function() {
    
    // Hero Block Styles
    register_block_style('acf/hero', [
        'name'  => 'default',
        'label' => __('Default', 'sharks2025'),
        'is_default' => true,
    ]);

    register_block_style('acf/hero', [
        'name'  => 'centered',
        'label' => __('Centered', 'sharks2025'),
    ]);

    register_block_style('acf/hero', [
        'name'  => 'dark',
        'label' => __('Dark Background', 'sharks2025'),
    ]);

    register_block_style('acf/hero', [
        'name'  => 'gradient',
        'label' => __('Gradient Background', 'sharks2025'),
    ]);

    // Services Block Styles
    register_block_style('acf/services', [
        'name'  => 'default',
        'label' => __('Default', 'sharks2025'),
        'is_default' => true,
    ]);

    register_block_style('acf/services', [
        'name'  => 'alternate',
        'label' => __('Alternate (Centered)', 'sharks2025'),
    ]);

    register_block_style('acf/services', [
        'name'  => 'minimal',
        'label' => __('Minimal', 'sharks2025'),
    ]);

    // Pricing Block Styles
    register_block_style('acf/pricing', [
        'name'  => 'default',
        'label' => __('Default', 'sharks2025'),
        'is_default' => true,
    ]);

    register_block_style('acf/pricing', [
        'name'  => 'compact',
        'label' => __('Compact', 'sharks2025'),
    ]);

    register_block_style('acf/pricing', [
        'name'  => 'highlighted',
        'label' => __('Highlighted Featured', 'sharks2025'),
    ]);

    // CTA Block Styles
    register_block_style('acf/cta', [
        'name'  => 'default',
        'label' => __('Default', 'sharks2025'),
        'is_default' => true,
    ]);

    register_block_style('acf/cta', [
        'name'  => 'accent',
        'label' => __('Accent', 'sharks2025'),
    ]);

    register_block_style('acf/cta', [
        'name'  => 'gradient',
        'label' => __('Gradient', 'sharks2025'),
    ]);

    register_block_style('acf/cta', [
        'name'  => 'dark',
        'label' => __('Dark', 'sharks2025'),
    ]);

    register_block_style('acf/cta', [
        'name'  => 'light',
        'label' => __('Light', 'sharks2025'),
    ]);

    // Contact Form Block Styles
    register_block_style('acf/contact-form', [
        'name'  => 'default',
        'label' => __('Default', 'sharks2025'),
        'is_default' => true,
    ]);

    register_block_style('acf/contact-form', [
        'name'  => 'boxed',
        'label' => __('Boxed', 'sharks2025'),
    ]);

    register_block_style('acf/contact-form', [
        'name'  => 'side-by-side',
        'label' => __('Side by Side', 'sharks2025'),
    ]);
});

/**
 * Unregister default WordPress block styles (optional)
 * Uncomment if you want to remove some default styles
 */
// add_action('init', function() {
//     // Remove default "Outline" style from buttons
//     unregister_block_style('core/button', 'outline');
//     
//     // Remove default "Fill" style from buttons
//     unregister_block_style('core/button', 'fill');
// });

