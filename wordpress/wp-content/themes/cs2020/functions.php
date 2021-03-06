<?php

function wpb_custom_new_menu() {
    register_nav_menu('my-custom-menu',__( 'My Custom Menu' ));
}
add_action( 'init', 'wpb_custom_new_menu' );

function load_stylesheets() {
    wp_register_style('cs', get_template_directory_uri() . '/css/cs.css?date=20-05-2020v3', array(), false, 'all');
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

function get_projects() {
	
	$posts = get_posts(array(
		'posts_per_page'	=> -1
	));

    $projects = array();

    foreach($posts as $post) {
        $post_id = $post->ID;

        $start_date = DateTime::createFromFormat('Ymd', get_post_meta($post_id, 'project_start_date')[0]);
        if( $start_date == '') {
            continue;
        }
        $start_date = $start_date->format('Y-m-d');

        $end_date = DateTime::createFromFormat('Ymd', get_post_meta($post_id, 'project_end_date')[0]);
        if( $end_date == '') {
            $end_date = date('Y-m-d');
        } else {
            $end_date = $end_date->format('Y-m-d');
        }

        $topics = get_the_category($post_id);
        $topics_array = array();
        $topics_array = wp_get_object_terms($post_id, 'category', array('fields' => 'slugs'));
        $topics = implode(',', $topics_array);
        $post_data = array(
            'title'         => get_the_title($post),
            'excerpt'       => get_the_excerpt($post),
            'link'          => get_post_permalink($post),
            'start_date'    => $start_date,
            'end_date'      => $end_date,
            'topics'        => $topics
        );
        array_push($projects, $post_data);
    }

    return $projects;

}

function get_project_date_range() {

    global $post;
    $post_id = $post->ID;

    $start_date = DateTime::createFromFormat('Ymd', get_post_meta($post_id, 'project_start_date')[0]);
    if( $start_date == '') {
        $start_date = date('Y');
    } else {
        $start_date = $start_date->format('Y');
    }

    $end_date = DateTime::createFromFormat('Ymd', get_post_meta($post_id, 'project_end_date')[0]);
    if( $end_date == '') {
        $end_date = 'Current';
    } else {
        $end_date = $end_date->format('Y');
    }


    $date_range_str = $start_date . ' — ' . $end_date;

    echo $date_range_str;

}

function get_project_categories() {

    global $post;

    $category_detail = get_the_category($post->ID);
    
    $cat_str = '';
    foreach($category_detail as $cd) {
        $cat_str .= $cd->cat_name . ', ';
    }

    echo rtrim($cat_str, ', ');

}