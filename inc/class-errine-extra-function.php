<?php
// Custom Footer Builder

function errin_footer_builder()
{

    $labels = array(
        'name' => _x('Errin Footer Builder', 'Post Type General Name', 'errin-extra'),
        'singular_name' => _x('Errin Footer', 'Post Type Singular Name', 'errin-extra'),
        'menu_name' => _x('Errin Footer', 'Admin Menu text', 'errin-extra'),
        'name_admin_bar' => _x('Errin Footer', 'Add New on Toolbar', 'errin-extra'),
        'archives' => __('Errin Footer Archives', 'errin-extra'),
        'attributes' => __('Errin Footer Attributes', 'errin-extra'),
        'parent_item_colon' => __('Parent Errin Footer:', 'errin-extra'),
        'all_items' => __('All Footers', 'errin-extra'),
        'add_new_item' => __('Add New Errin Footer', 'errin-extra'),
        'add_new' => __('Add New', 'errin-extra'),
        'new_item' => __('New Errin Footer', 'errin-extra'),
        'edit_item' => __('Edit Errin Footer', 'errin-extra'),
        'update_item' => __('Update Errin Footer', 'errin-extra'),
        'view_item' => __('View Errin Footer', 'errin-extra'),
        'view_items' => __('View Errin Footers', 'errin-extra'),
        'search_items' => __('Search Errin Footer', 'errin-extra'),
        'not_found' => __('Not found', 'errin-extra'),
        'not_found_in_trash' => __('Not found in Trash', 'errin-extra'),
        'featured_image' => __('Featured Image', 'errin-extra'),
        'set_featured_image' => __('Set featured image', 'errin-extra'),
        'remove_featured_image' => __('Remove featured image', 'errin-extra'),
        'use_featured_image' => __('Use as featured image', 'errin-extra'),
        'insert_into_item' => __('Insert into Errin Footer', 'errin-extra'),
        'uploaded_to_this_item' => __('Uploaded to this Errin Footer', 'errin-extra'),
        'items_list' => __('Errin Footers list', 'errin-extra'),
        'items_list_navigation' => __('Errin Footers list navigation', 'errin-extra'),
        'filter_items_list' => __('Filter Errin Footers list', 'errin-extra'),
    );

    $args = array(
        'label' => __('Errin Footer', 'errin-extra'),
        'description' => __('', 'errin-extra'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-table-row-before',
        'supports' => array('title', 'editor'),
        'taxonomies' => array(),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 4,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => false,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => false,
    );
    register_post_type('errin_footer', $args);
}
add_action('init', 'errin_footer_builder', 0);