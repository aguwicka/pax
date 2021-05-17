<?php

add_action( 'init', 'register_post_platforms' );
function register_post_platforms(){
    register_post_type( 'post_platforms', [
        'label'  => null,
        'labels' => [
            'name'               => 'Платформы',
            'singular_name'      => 'platforms',
            'add_new'            => 'Добавить платформу',
            'add_new_item'       => 'Добавить новую платформу',
            'edit_item'          => 'Редактировать платформу',
            'new_item'           => 'Новая платформа',
            'view_item'          => 'Посмотреть платформу',
            'search_items'       => 'Поиск платформы',
            'not_found'          => 'Ничего не найдено',
            'not_found_in_trash' => 'Ничего не найдено в корзине',
            'parent_item_colon' => 'Родительская страница',
            'menu_name'          => 'Платформы',
        ],
        'description'         => '',
        'public'              => true,
        'show_ui'             => true,
        'show_tagcloud' => false,
        'show_in_menu'        => null,
        'show_in_nav_menus'   => true,
        'sort'                => true,
        'show_in_rest'        => true,
        'menu_position'       => null,
        'show_count'          => true,
        'menu_icon'           => 'dashicons-sticky',
        'hierarchical'        => true,
        'supports'            => [ 'title', 'editor', 'author', 'thumbnail', 'page-attributes' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => ['platforms'],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
}