<?php
/**
 * Custom Post Types
 * 
 * @package sharks2025
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Case Study Post Type
 */
add_action('init', function() {
    $labels = [
        'name'                  => _x('Case Studies', 'Post Type General Name', 'sharks2025'),
        'singular_name'         => _x('Case Study', 'Post Type Singular Name', 'sharks2025'),
        'menu_name'             => __('Case Studies', 'sharks2025'),
        'name_admin_bar'        => __('Case Study', 'sharks2025'),
        'archives'              => __('Case Study Archives', 'sharks2025'),
        'attributes'            => __('Case Study Attributes', 'sharks2025'),
        'parent_item_colon'     => __('Parent Case Study:', 'sharks2025'),
        'all_items'             => __('All Case Studies', 'sharks2025'),
        'add_new_item'          => __('Add New Case Study', 'sharks2025'),
        'add_new'               => __('Add New', 'sharks2025'),
        'new_item'              => __('New Case Study', 'sharks2025'),
        'edit_item'             => __('Edit Case Study', 'sharks2025'),
        'update_item'           => __('Update Case Study', 'sharks2025'),
        'view_item'             => __('View Case Study', 'sharks2025'),
        'view_items'            => __('View Case Studies', 'sharks2025'),
        'search_items'          => __('Search Case Study', 'sharks2025'),
        'not_found'             => __('Not found', 'sharks2025'),
        'not_found_in_trash'    => __('Not found in Trash', 'sharks2025'),
        'featured_image'        => __('Featured Image', 'sharks2025'),
        'set_featured_image'    => __('Set featured image', 'sharks2025'),
        'remove_featured_image' => __('Remove featured image', 'sharks2025'),
        'use_featured_image'    => __('Use as featured image', 'sharks2025'),
        'insert_into_item'      => __('Insert into case study', 'sharks2025'),
        'uploaded_to_this_item' => __('Uploaded to this case study', 'sharks2025'),
        'items_list'            => __('Case Studies list', 'sharks2025'),
        'items_list_navigation' => __('Case Studies list navigation', 'sharks2025'),
        'filter_items_list'     => __('Filter case studies list', 'sharks2025'),
    ];
    
    $args = [
        'label'                 => __('Case Study', 'sharks2025'),
        'description'           => __('Portfolio and project case studies', 'sharks2025'),
        'labels'                => $labels,
        'supports'              => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
        'taxonomies'            => ['case_study_category', 'case_study_tag'],
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-portfolio',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true, // Gutenberg support
        'rewrite'               => ['slug' => 'case-studies', 'with_front' => false],
    ];
    
    register_post_type('case_study', $args);
});

/**
 * Register Case Study Category Taxonomy
 */
add_action('init', function() {
    $labels = [
        'name'                       => _x('Categories', 'Taxonomy General Name', 'sharks2025'),
        'singular_name'              => _x('Category', 'Taxonomy Singular Name', 'sharks2025'),
        'menu_name'                  => __('Categories', 'sharks2025'),
        'all_items'                  => __('All Categories', 'sharks2025'),
        'parent_item'                => __('Parent Category', 'sharks2025'),
        'parent_item_colon'          => __('Parent Category:', 'sharks2025'),
        'new_item_name'              => __('New Category Name', 'sharks2025'),
        'add_new_item'               => __('Add New Category', 'sharks2025'),
        'edit_item'                  => __('Edit Category', 'sharks2025'),
        'update_item'                => __('Update Category', 'sharks2025'),
        'view_item'                  => __('View Category', 'sharks2025'),
        'separate_items_with_commas' => __('Separate categories with commas', 'sharks2025'),
        'add_or_remove_items'        => __('Add or remove categories', 'sharks2025'),
        'choose_from_most_used'      => __('Choose from the most used', 'sharks2025'),
        'popular_items'              => __('Popular Categories', 'sharks2025'),
        'search_items'               => __('Search Categories', 'sharks2025'),
        'not_found'                  => __('Not Found', 'sharks2025'),
        'no_terms'                   => __('No categories', 'sharks2025'),
        'items_list'                 => __('Categories list', 'sharks2025'),
        'items_list_navigation'      => __('Categories list navigation', 'sharks2025'),
    ];
    
    $args = [
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'               => true,
        'rewrite'                    => ['slug' => 'case-study-category'],
    ];
    
    register_taxonomy('case_study_category', ['case_study'], $args);
});

/**
 * Register Case Study Tags Taxonomy
 */
add_action('init', function() {
    $labels = [
        'name'                       => _x('Tags', 'Taxonomy General Name', 'sharks2025'),
        'singular_name'              => _x('Tag', 'Taxonomy Singular Name', 'sharks2025'),
        'menu_name'                  => __('Tags', 'sharks2025'),
        'all_items'                  => __('All Tags', 'sharks2025'),
        'parent_item'                => __('Parent Tag', 'sharks2025'),
        'parent_item_colon'          => __('Parent Tag:', 'sharks2025'),
        'new_item_name'              => __('New Tag Name', 'sharks2025'),
        'add_new_item'               => __('Add New Tag', 'sharks2025'),
        'edit_item'                  => __('Edit Tag', 'sharks2025'),
        'update_item'                => __('Update Tag', 'sharks2025'),
        'view_item'                  => __('View Tag', 'sharks2025'),
        'separate_items_with_commas' => __('Separate tags with commas', 'sharks2025'),
        'add_or_remove_items'        => __('Add or remove tags', 'sharks2025'),
        'choose_from_most_used'      => __('Choose from the most used', 'sharks2025'),
        'popular_items'              => __('Popular Tags', 'sharks2025'),
        'search_items'               => __('Search Tags', 'sharks2025'),
        'not_found'                  => __('Not Found', 'sharks2025'),
        'no_terms'                   => __('No tags', 'sharks2025'),
        'items_list'                 => __('Tags list', 'sharks2025'),
        'items_list_navigation'      => __('Tags list navigation', 'sharks2025'),
    ];
    
    $args = [
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'               => true,
        'rewrite'                    => ['slug' => 'case-study-tag'],
    ];
    
    register_taxonomy('case_study_tag', ['case_study'], $args);
});

