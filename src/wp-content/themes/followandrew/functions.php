<?php

function theme_support() {
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'theme_support');

function menus() {
    $locations = [
        'primary' => 'Main menu on the left side',
        'footer' => 'Menu at the bottom of the page'
    ];

    register_nav_menus($locations);
}

add_action('init', 'menus');

function register_styles()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('testsite-style', 
        get_template_directory_uri() . '/style.css', ['testsite-bootstrap'], $version);
    wp_enqueue_style('testsite-bootstrap', 
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', [], '5.3.2');
    wp_enqueue_style('testsite-fontawesome', 
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', [], '6.5.1');
}

add_action('wp_enqueue_scripts', 'register_styles');

function register_scripts()
{
    wp_enqueue_script('testsite-jquery', 
        'https://code.jquery.com/jquery-3.7.1.slim.min.js', [], '3.7.1', true);
    wp_enqueue_script('testsite-popper', 
        'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', [], '1.16.1', true);
    wp_enqueue_script('testsite-bootstrap', 
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js', [], '5.3.2', true);
    wp_enqueue_script('testsite-main', 
        get_template_directory_uri() . '/assets/js/main.js', [], '1.0', true);
}

add_action('wp_enqueue_scripts', 'register_scripts');

function widget_areas() {
    register_sidebar(
        [
            'name' => 'Sidebar Area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar Widget Area',
            'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">',
            'after_widget' => '</ul>',
            'before_title' => '',
            'after_title' => '',
        ]
    );

    register_sidebar(
        [
            'name' => 'Footer Area',
            'id' => 'footer-1',
            'description' => 'Footer Widget Area',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => '',
        ]
    );
}

add_action('widgets_init', 'widget_areas');