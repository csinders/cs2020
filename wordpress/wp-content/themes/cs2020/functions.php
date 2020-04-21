<?php

function load_stylesheets() {
    wp_register_style('cs', get_template_directory_uri() . '/css/cs.css', array(), false, 'all');
    wp_enqueue_style('cs');
}
add_action('wp_enqueue_scripts', 'load_stylesheets');

function loadjs() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-3.4.1.min.js', '', 1, true);
    wp_enqueue_script('jquery');

    wp_register_script('luxon', get_template_directory_uri() . '/js/luxon.min.js', '', 1, true);
    wp_enqueue_script('luxon');

    wp_register_script('cs', get_template_directory_uri() . '/js/cs.js', '', 1, true);
    wp_enqueue_script('cs');
}
add_action('wp_enqueue_scripts', 'loadjs');

